<?php 
$app->get('/edit', function () use ($app, $smarty) {
	$pdo = getDbHandler();
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$sql = "SELECT up.id, up.site_id, up.username, up.password, up.sex FROM user_profiles AS up LEFT JOIN sites AS s ON s.id = up.site_id WHERE profiler_id = :user_id AND login_count = 0 AND s.status = 'true' ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $_SESSION['user_id']));;
	
	$profiles = $sth->fetchAll();
	
	$smarty->assign('profiles', $profiles);
	
	$sql = "SELECT id, name FROM sites WHERE status = 'true' ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	
	$sites = $sth->fetchAll();
	
	$site_list = array();
	
	foreach ($sites as $site) {
		$site_list[$site['id']] = $site['name'];	
	}
	
	$smarty->assign('sites', $site_list);
	
	$smarty->display('edit.tpl');
	
});

$app->get('/viewsitenote/:id/:user/:day', function ($id, $user, $day) use ($app, $smarty) {
	$note = getSiteUserNote($id, $user, $day);
	
	echo nl2br($note['note']);
});

$app->get('/sitenote/:id(/:user_id)', function ($id, $user_id = null) use ($app, $smarty) {
	
	if ($user_id === null) $user_id = $_SESSION['user_id'];
	
	$note = getSiteUserNote($id, $user_id);
	
	if ($note === null) $note = array('note' => '');
	
	
	$smarty->assign('sites', getSitesList());
	$smarty->assign('note', $note);
	$smarty->assign('site_id', $id);
	
	$smarty->display('sitenote.tpl');
	
});

$app->get('/health(/:start(/:finish))', function ($start = null, $finish = null) use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();
	
	foreach ($users as &$user) {
		$user['profile_count'] = getTotalProfiles($user['id'], $start, $finish);
		$user['profile_not'] = getProfilesBad($user['id'], $start, $finish);
		$user['percent'] = 0;
		if ($user['profile_count'] > 0) {
			$user['percent'] = $user['profile_not'] / $user['profile_count'] * 100;
		}
		  
		$m_user = getProfileHealthBySite($user['id'], $start, $finish);
		$user = array_merge($user, $m_user);
	}
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$smarty->assign('sites', $sites);
	$smarty->assign('users', $users);
	$smarty->assign('start', $start);
	$smarty->assign('finish', $finish);
	$smarty->display('health.tpl');
});

$app->post('/sitenote', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$user_id = $_SESSION['user_id'];
	$id = $_POST['site_id'];
	
	$note = getSiteUserNote($id, $user_id);
	
	if ($note === null) {
		
		$sql = "INSERT INTO user_sitenote (user_id, site_id, note_date, note) VALUES (:user_id, :site_id, :note_date, :note) ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':user_id' => $_SESSION['user_id'], ':site_id' => $_POST['site_id'], ':note_date' => date("Y-m-d"), ':note' => $_POST['note']));
		
	} else {
		
		$sql = "UPDATE user_sitenote SET note = :note WHERE id = :id ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':note' => $_POST['note'], ':id' => $note['id']));
	}
	
	$json = array();
	$app->contentType('application/json');
	echo json_encode($json);
	
});

$app->get('/edit/:id', function ($id) use ($app, $smarty) {
	$pdo = getDbHandler();

	$sql = "SELECT up.id, up.site_id, up.username, up.password, up.sex FROM user_profiles AS up WHERE profiler_id = :user_id AND login_count = 0 AND id = :id ";

	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $_SESSION['user_id'], ':id' => $id));;

	$profile = $sth->fetch();

	$smarty->assign('profile', $profile);

	$sql = "SELECT s.name, uq.quota, uq.site_id FROM user_quota AS uq LEFT JOIN sites AS s ON s.id = uq.site_id WHERE uq.user_id = :user_id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $_SESSION['user_id']));
	
	$rows = $sth->fetchAll();
	
	foreach ($rows as &$row) {
		$row['override'] = getDailyOverride($row['site_id'], $_SESSION['user_id']);
		$row['created'] = getDailyCreated($row['site_id'], $_SESSION['user_id']);
		$row['required'] = ($row['override'] > $row['quota']) ? $row['override'] : $row['quota'];
	}
	
	$sites = array();
	
	$all = isDailyQuotaMet($_SESSION['user_id']);
	
	foreach ($rows as $site) {
		if ($site['quota'] > 0 || $site['override'] > 0 || $all) $sites[$site['site_id']] = $site['name'];
		if ($site['required'] == $site['created'] && !$all && $profile['site_id'] != $site['site_id']) unset($sites[$site['site_id']]);
	}

	$smarty->assign('sites', $sites);
	$smarty->assign('all', $all);
	
	$sex = array('Male', 'Female', 'Gay', 'Lesbian');
	$smarty->assign('sex', $sex);

	$smarty->display('editprofile.tpl');

});

$app->get('/ureport/:username', function ($username) use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$sql = "SELECT id FROM user WHERE username = :username ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $username));
	
	$user = $sth->fetch();
	
	$start = date("Y-m-d", strtotime("-7 day"));
	
	$report = array();
	$days = array();
	$summary = array();
	
	do {
		
		$days[] = $start;
		$summary[$start]['quota'] = 0;
		$summary[$start]['created'] = 0;
		
		foreach ($sites as $site) {
			$report[$start][$site['id']]['quota'] = GetSiteQuota($site['id'], $user['id']);
			$report[$start][$site['id']]['override'] = getDailyOverride($site['id'], $user['id'], $start);
			$report[$start][$site['id']]['created'] = getDailyCreated($site['id'], $user['id'], $start);

			$summary[$start]['quota'] += $report[$start][$site['id']]['quota']; 
			$summary[$start]['created'] += $report[$start][$site['id']]['created'];  
		}
		
		$start = date("Y-m-d", strtotime($start) + (60 * 60 * 24));
		
	} while (strtotime($start) < strtotime("now"));
	
	$smarty->assign('summary', $summary);
	$smarty->assign('report', $report);
	$smarty->assign('days', $days);
	$smarty->assign('sites', $sites);
	$smarty->display('ureport.tpl');
	
});

$app->get('/mandashboard(/:day)', function($day = null) use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();
	
	$summary = array('profile_req' => 0, 'profile_quota' => 0, 'profile_created' => 0);
	
	foreach ($sites as &$site) {
		$site['created'] = 0;
		$site['assigned'] = 0;
		$summary['profile_req'] += $site['profile_req'];
		foreach ($users as $user) {
			$site_quota = $site[$user['id']] = GetSiteQuota($site['id'], $user['id']);
			$site[$user['id']] = $site_quota;
			$daily_override = getDailyOverride($site['id'], $user['id'], $day);
			$site_note = getSiteUserNote($site['id'], $user['id'], $day);
			
			if (!isset($summary['quota_' . $user['id']])) $summary['quota_' . $user['id']] = 0;
			
			if ($daily_override > $site_quota) {
				$summary['profile_quota'] += $daily_override;
				$summary['quota_' . $user['id']] += $daily_override;
				$site['assigned'] += $daily_override;
			} else {
				$summary['profile_quota'] += $site_quota;
				$summary['quota_' . $user['id']] += $site_quota;
				$site['assigned'] += $site_quota;
			}
			
			if (!isset($summary['create_' . $user['id']])) $summary['create_' . $user['id']] = 0;
			
			$site['do_' . $user['id']] = $daily_override;
			$user_total = getDailyCreated($site['id'], $user['id'], $day);
			$site['create_' . $user['id'] ] = $user_total;
			$site['created'] += $user_total;
			$summary['profile_created'] += $user_total;
			
			$summary['create_' . $user['id']] += $user_total;
			
			$site['sn_' . $user['id']] = 0;
			
			if ($site_note !== null) {
				$site['sn_' . $user['id']] = 1;
			}
			
		}
	}
	
	$day_start = $day;
	if ($day === null) $day_start = date("Y-m-d");
	
	$smarty->assign('day_start', $day_start);
	
	$smarty->assign('summary', $summary);
	$smarty->assign('sites', $sites);
	$smarty->assign('users', $users);
	$smarty->display('mandashboard.tpl');
	
});

$app->get('/addemail', function () use ($app, $smarty) {
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	
	$smarty->display('addemail.tpl');
});

$app->post('/addemail', function () use ($app, $smarty) {

	$pdo = getDbHandler();
	
	$sql = "INSERT INTO email (user, password, created, profiler_id) VALUES (:username, :password, NOW(), :profiler_id) ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password'], ':profiler_id' => $_SESSION['user_id']));
	
	$email_id = $pdo->lastInsertId();
	
	foreach($_POST['alias'] as $alias) {
		if (trim($alias) == '') continue;
		
		$sql = "INSERT INTO email_alias (email_id, alias) VALUES (:email_id, :alias) ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':email_id' => $email_id, ':alias' => $alias));
	}
	
	$_SESSION['success'] = 'Email Added';
	$app->redirect('/bot/op/addemail');
});

$app->post('/edit', function() use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "UPDATE user_profiles SET site_id = :site_id, username = :username, password = :password, sex = :sex WHERE id = :id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':site_id' => $_POST['site_id'], ':username' => $_POST['username'], ':password' => $_POST['password'], ':sex' => $_POST['sex'], ':id' => $_POST['id']));

	$_SESSION['success'] = 'Profile Updated';
	$app->redirect('/bot/op/edit');
});

$app->get('/delete/:id', function ($id) use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "DELETE FROM user_profiles WHERE id = :id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':id' => $id));
	
	$app->redirect('/bot/op/edit');
});

$app->get('/password', function () use ($app, $smarty) {
	
	$error = '';
	$success = '';
	
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	$smarty->assign('error', $error);
	$smarty->display('password.tpl');
});

$app->post('/password', function () use ($app, $smarty) {
	$pdo = getDbHandler();
	
	$sql = "SELECT id FROM user WHERE id = :id AND password = PASSWORD(:password) ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':id' => $_SESSION['user_id'], ':password' => $_POST['current_password']));
	
	if ($sth->rowCount() == 0) {
		$_SESSION['error'] = "Current Password Didn't Match";
		$app->redirect('/bot/op/password');
		return;
	}
	
	$sql = "UPDATE user SET password = PASSWORD(:newpass) WHERE id = :id AND password = PASSWORD(:password) ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':newpass' => $_POST['new_password'], ':id' => $_SESSION['user_id'], ':password' => $_POST['current_password']));
	
	$_SESSION['success'] = 'Password Changed';
	$app->redirect('/bot/op/password');
});

$app->get('/listuser', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	$sql = "SELECT id, username, lastlogin FROM user WHERE user_type = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	
	$profilers = $sth->fetchAll();
	
	$smarty->assign('users', $profilers);
	
	$smarty->display('users.tpl');
	
});

$app->get('/dashboard', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	$sql = "SELECT s.name, uq.quota, uq.site_id FROM user_quota AS uq LEFT JOIN sites AS s ON s.id = uq.site_id WHERE uq.user_id = :user_id ORDER BY s.name ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $_SESSION['user_id']));
	
	$sites = $sth->fetchAll();
	
	foreach ($sites as &$site) {
		$site['override'] = getDailyOverride($site['site_id'], $_SESSION['user_id']);
		$site['created'] = getDailyCreated($site['site_id'], $_SESSION['user_id']);
	}
	
	$smarty->assign('sites', $sites);
	
	$smarty->display('dashboard.tpl');
});

$app->get('/adduser', function () use ($app, $smarty) {
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	
	$smarty->display('adduser.tpl');
});

$app->get('/add', function () use ($app, $smarty) {

	$pdo = getDbHandler();
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	
	$sql = "SELECT s.name, uq.quota, uq.site_id FROM user_quota AS uq LEFT JOIN sites AS s ON s.id = uq.site_id WHERE uq.user_id = :user_id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $_SESSION['user_id']));
	
	$rows = $sth->fetchAll();
	
	foreach ($rows as &$row) {
		$row['override'] = getDailyOverride($row['site_id'], $_SESSION['user_id']);
		$row['created'] = getDailyCreated($row['site_id'], $_SESSION['user_id']);
		$row['required'] = ($row['override'] > $row['quota']) ? $row['override'] : $row['quota'];
	}
	
	$sites = array();
	
	$all = isDailyQuotaMet($_SESSION['user_id']);
	$remove = 0;
	
	foreach ($rows as $site) {
		if ($site['quota'] > 0 || $site['override'] > 0 || $all) $sites[$site['site_id']] = $site['name'];
		if ($site['required'] == $site['created'] && !$all) {
			$remove = 1;
			unset($sites[$site['site_id']]);
		}
	}
	
	$smarty->assign('sites', $sites);
	
	$site_id = 0;
	if (isset($_SESSION['site_id'])) {
		$site_id = $_SESSION['site_id'];
		//unset($_SESSION['site_id']);
	}
	
	$smarty->assign('all', $all);
	$smarty->assign('remove', $remove);
	$smarty->assign('site_id', $site_id);
	
	$smarty->display('add.tpl');
});

$app->post('/add', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "INSERT INTO user_profiles (userid, username, password, status, usergroup, site_id, sex, created_datetime, profiler_id) "
	     . "VALUES (:userid, :username, :password, 'true', 1, :site_id, :sex, NOW(), :profiler_id) ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':userid' => '0', ':username' => $_POST['username'], ':password' => $_POST['password'], ':site_id' => $_POST['site_id'], ':sex' => $_POST['sex'], ':profiler_id' => $_SESSION['user_id']));;
	
	$_SESSION['success'] = 'Profile Added';
	$_SESSION['site_id'] = $_POST['site_id'];
	$app->redirect('add');
	
});

$app->post('/adduser', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "INSERT INTO user (username, password, user_type, created, status) VALUES (:username, PASSWORD(:password), 1, NOW(), 1) ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));

	$_SESSION['success'] = 'User Added';
	$app->redirect('/bot/op/adduser');
});

$app->get('/quota', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();
	
	foreach ($sites as &$site) {
		foreach ($users as $user) {
			$site[$user['id']] = GetSiteQuota($site['id'], $user['id']);
		}	
	}
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	$smarty->assign('sites', $sites);
	$smarty->assign('users', $users);
	$smarty->display('quota.tpl');
	
});

$app->post('/quota', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();
	
	foreach ($sites as &$site) {
		foreach ($users as $user) {
			if (isset($_POST['site'][$site['id']][$user['id']])) {
				setSiteQuota($site['id'], $user['id'], $_POST['site'][$site['id']][$user['id']]);
			}
		}
	}
	
	$_SESSION['success'] = 'Quota Updated';
	$app->redirect('/bot/op/quota');
	
});

$app->get('/dayquota', function () use ($app, $smarty) {

	$pdo = getDbHandler();

	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();

	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();

	foreach ($sites as &$site) {
		foreach ($users as $user) {
			$site[$user['id']] = GetSiteQuota($site['id'], $user['id']);
			$site['day_' . $user['id']] = getDailyOverride($site['id'], $user['id']);
		}
	}
	
	$day = date("Y-m-d");
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);

	$smarty->assign('day', $day);
	$smarty->assign('sites', $sites);
	$smarty->assign('users', $users);
	$smarty->display('dayquota.tpl');

});

$app->post('/dayquota', function () use ($app, $smarty) {

	$pdo = getDbHandler();

	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();

	$sql = "SELECT id, username FROM user WHERE user_type IN (1,2) AND status = 1 ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$users = $sth->fetchAll();

	foreach ($sites as &$site) {
		foreach ($users as $user) {
			if (isset($_POST['site'][$site['id']][$user['id']])) {
				setSiteQuotaDay($site['id'], $user['id'], date("Y-m-d"), $_POST['site'][$site['id']][$user['id']]);
			}
		}
	}

	$_SESSION['success'] = 'Daily Quota Updated';
	$app->redirect('/bot/op/dayquota');

});

$app->get("/sitequota", function () use ($app, $smarty) {
	
	$success = "";
	
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	$smarty->assign('sites', $sites);
	$smarty->display('sitequota.tpl');
	
});

$app->post("/sitequota", function () use ($app, $smarty) {
	$pdo = getDbHandler();

	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();

	foreach ($sites as $site) {
		
		$sql = "UPDATE sites SET profile_req = :profile_req WHERE id = :id ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':profile_req' => $_POST['site'][$site['id']], ':id' => $site['id']));
	}
	
	$_SESSION['success'] = 'Site Quota Updated';
	$app->redirect('/bot/op/sitequota');
});


$app->get("/logout", function () use ($app, $smarty) {
	session_destroy();
	$app->redirect("/bot/op");
});