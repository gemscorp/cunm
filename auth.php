<?php 

$app->get("/mandashboard", function () use ($app, $smarty) {
	$smarty->display('mandashboard.tpl');
});

$app->get("/dashboard", function () use ($app, $smarty) {
	$smarty->display('dashboard.tpl');
});

$app->get("/password", function () use ($app, $smarty) {
	
	$error = ""; $success = "";
	
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	if (isset($_SESSION['success'])) {
		$error = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('error', $error);
	$smarty->assign('success', $success);
	
	$smarty->display('password.tpl');
});

$app->post("/password", function () use ($app, $smarty) {
	
	$db = getDbHandler();
	
	$sql = "UPDATE user SET password = PASSWORD(:password_new) WHERE id = :id AND password = PASSWORD(:password_current) ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':password_new' => $_POST['new_password'], ':id' => $_SESSION['user_id'], ':password_current' => $_POST['current_password']));
	
	if ($sth->rowCount() == 0) {
		
	}
	
	$app->redirect(APP_PATH . '/password');
});

$app->get("/adduser", function () use ($app, $smarty) {
	
	$error = getErrorMessage();
	$smarty->assign('error', $error);
	
	$success = getSuccessMessage();
	$smarty->assign('success', $success);
	
	$db = getDbHandler();
	
	$sql = "SELECT id,name FROM country ";
	$sth = $db->prepare($sql);
	$sth->execute();
	$countries = $sth->fetchAll();
	
	$sql = "SELECT id,name FROM federation ";
	$sth = $db->prepare($sql);
	$sth->execute();
	$federations = $sth->fetchAll();
	
	$smarty->assign('countries', $countries);
	
	$smarty->assign('federations', $federations);
	
	if ($_SESSION['user_level'] == 1) {
		$sql = "SELECT id, name FROM primary_union WHERE federation_id = :federation_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));

		$primarycus = $sth->fetchAll();
		$smarty->assign('primarycus', $primarycus);
		
	}
	
	
	$smarty->display('adduser.tpl');	
});

$app->post('/adduser', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "INSERT INTO user (email, password, level, status, federation_id, primary_union_id, country_id) "
	     . " VALUES (:email, PASSWORD(:password), :level, :status, :federation_id, :primary_union_id, :country_id) ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':email' => $_POST['username'], ':password' => $_POST['password'], 
			':level' => $_POST['level'], ':status' => 1, ':federation_id' => $_POST['federation_id'],
			':primary_union_id' => $_POST['primary_union_id'], ':country_id' => $_POST['country_id']));
	
	setSuccessMessage('User Added');
	
	$app->redirect(APP_PATH . "/admin/users");
	
});

$app->group("/member", function () use ($app, $smarty) {
	
	$app->get("/detail", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "SELECT area_id FROM pu_operations_area WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$oparea = array();
		$area_ids = $sth->fetchAll();
		foreach ($area_ids as $id) {
			$oparea[] = $id['area_id'];
		}
		
		$smarty->assign('opareas', $oparea);
		
		$sql = "SELECT id, name FROM area ";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$areast = $sth->fetchAll();
		$areas = array();
		
		foreach ($areast as $a) {
			$areas[$a['id']] = $a['name'];
		}
		
		$smarty->assign('areas', $areas);
		
		$sql = "SELECT b.name, bg.name AS group_name, bsg.name AS subgroup_name "
				. "FROM balancesheet AS b "
				. "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
				. "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id "
				. " ORDER BY bg.id, bsg.id ";
		
		$sth = $db->prepare($sql);
		$sth->execute();
		$bslines = $sth->fetchAll();
		$smarty->assign('bslines', $bslines);
		$smarty->assign('group', "");
		$smarty->assign('subgroup', "");
		
		$sql = "SELECT id, name FROM asset_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$assetgroups = $sth->fetchAll();
		
		$smarty->assign('assetgroups', $assetgroups);
		
		$smarty->display('member/detail.tpl');
	});
	
	$app->get("/profile", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT name FROM country WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_country_id']));
		
		$country = $sth->fetch();
		$smarty->assign('country', $country);
		
		$sql = "SELECT name FROM primary_union WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$primarycu = $sth->fetch();
		$smarty->assign('primarycu', $primarycu);
		
		$smarty->display('member/profile.tpl');
	});
	
	$app->get("/operations", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT id, name FROM area ";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$areas = $sth->fetchAll();
		
		$smarty->assign('areas', $areas);
		
		$sql = "SELECT males, females FROM pu_operations WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$operations = $sth->fetch();
		$smarty->assign('operations', $operations);
			
		$sql = "SELECT area_id FROM pu_operations_area WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$oparea = array();
		$area_ids = $sth->fetchAll();
		foreach ($area_ids as $id) {
			$oparea[] = $id['area_id'];
		}
		
		$smarty->assign('oparea', $oparea);
		
		$smarty->display('member/operations.tpl');
	});
	
	$app->post("/operations", function () use ($app, $smarty) {
		$db = getDbHandler();
		
		$sql = "DELETE FROM pu_operations WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$sql = "DELETE FROM pu_operations_area WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$sql = "INSERT INTO pu_operations (primary_union_id, males, females) VALUES (:id, :male, :female) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id'], ':male' => $_POST['male'], ':female' => $_POST['female']));
		
		foreach ($_POST['area'] as $area_id) {
			$sql = "INSERT INTO pu_operations_area (primary_union_id, area_id) VALUES (:id, :area_id) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':id' => $_SESSION['user_primary_union_id'], ':area_id' => $area_id));
		}
		
		setSuccessMessage('Operations Area and Employees Updated');
		
		$app->redirect(APP_PATH . '/member/operations');
	});
	
	$app->get("/datasheet", function () use ($app, $smarty) {
		$smarty->display('member/datasheet.tpl');
	});
});

$app->group("/federation", function () use ($app, $smarty) {
	
	$app->get("/primarycu", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT id, federation_id, name FROM primary_union WHERE federation_id = :federation_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));
		
		$primarycus = $sth->fetchAll();
		$smarty->assign('primarycus', $primarycus);
		
		$smarty->display('federation/primarycu.tpl');
	});
	
	$app->post("/primarycu", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "INSERT INTO primary_union (federation_id, name) VALUES (:federation_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_POST['federation_id'], ':name' => $_POST['name']));
		
		setSuccessMessage('Primary Credit Union Added');
		
		$app->redirect(APP_PATH . '/federation/primarycu');
		
	});
	
});

$app->group("/ajax", function () use ($app, $smarty) {
	
	$app->post("/bsgroup", function () use ($app, $smarty) {
		$db = getDbHandler();
		
		$sql = "INSERT INTO balancesheet_group (name) VALUES (:name)";
		$sth = $db->prepare($sql);
		$sth->execute(array(':name' => $_POST['name']));
		
		$id = $db->lastInsertId();
		
		$json = array('id' => $id, 'name' => $_POST['name']);
		$app->contentType('application/json');
		echo json_encode($json);
		
	});
	
	$app->get("/bssubgroup/:group_id", function ($group_id) use ($app, $smarty) {
		$db = getDbHandler();
		
		$sql = "SELECT id, name FROM balancesheet_sub_group WHERE group_id = :group_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':group_id' => $group_id));
		
		$json['subgroups'] = $sth->fetchAll();
		
		$app->contentType('application/json');
		echo json_encode($json);
		
	});
	
	$app->post("/bssubgroup", function () use ($app, $smarty) {
		$db = getDbHandler();
	
		$sql = "INSERT INTO balancesheet_sub_group (group_id, name) VALUES (:group_id, :name)";
		$sth = $db->prepare($sql);
		$sth->execute(array(':group_id' => $_POST['mgroup_id'], ':name' => $_POST['name']));
	
		$id = $db->lastInsertId();
	
		$json = array('id' => $id, 'name' => $_POST['name']);
		$app->contentType('application/json');
		echo json_encode($json);
	
	});
});

$app->group("/admin", function () use ($app, $smarty) {

	$error = getErrorMessage();
	$smarty->assign('error', $error);
	
	$success = getSuccessMessage();
	$smarty->assign('success', $success);
	
	$app->get("/servicearea", function () use ($app, $smarty) {

		$db = getDbHandler();
		$sql = "SELECT id, name FROM area ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$areas = $sth->fetchAll();
		
		$smarty->assign('areas', $areas);
		
		$smarty->display('admin/servicearea.tpl');
	});
	
	$app->post('/servicearea', function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "INSERT INTO area (name) VALUES (:name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':name' => $_POST['name']));
		
		setSuccessMessage('Service Area Added');
		
		$app->redirect(APP_PATH . '/admin/servicearea');
	});

	$app->get("/asset", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT id, name FROM asset_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$assetgroups = $sth->fetchAll();
		
		$smarty->assign('assetgroups', $assetgroups);
		
		$smarty->display('admin/asset.tpl');
	});
	
	$app->post('/asset', function () use ($app, $smarty) {
	
		$db = getDbHandler();
	
		$sql = "INSERT INTO asset_group (name) VALUES (:name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':name' => $_POST['name']));
	
		setSuccessMessage('Asset Group Added');
	
		$app->redirect(APP_PATH . '/admin/asset');
	});
	
	$app->get("/country", function () use ($app, $smarty) {
	
		$db = getDbHandler();
		$sql = "SELECT id, name FROM country ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$countries = $sth->fetchAll();
	
		$smarty->assign('countries', $countries);
	
		$smarty->display('admin/country.tpl');
	});
	
	$app->post('/country', function () use ($app, $smarty) {

		$db = getDbHandler();

		$sql = "INSERT INTO country (name) VALUES (:name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':name' => $_POST['name']));

		setSuccessMessage('Country Added');

		$app->redirect(APP_PATH . '/admin/country');
	});
	
	$app->get("/federation", function () use ($app, $smarty) {
	
		$db = getDbHandler();
		
		$sql = "SELECT f.id, f.name, c.name AS country_name FROM federation AS f JOIN country AS c ON c.id = f.country_id ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$federations = $sth->fetchAll();
		
		$sql = "SELECT id, name FROM country ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$countries = $sth->fetchAll();
	
		$smarty->assign('countries', $countries);
		$smarty->assign('federations', $federations);
	
		$smarty->display('admin/federation.tpl');
	});
		
	$app->post('/federation', function () use ($app, $smarty) {

		$db = getDbHandler();

		$sql = "INSERT INTO federation (country_id, name) VALUES (:country_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':country_id' => $_POST['country_id'], ':name' => $_POST['name']));

		setSuccessMessage('Federation Added');

		$app->redirect(APP_PATH . '/admin/federation');
	});
		

	$app->get("/service", function () use ($app, $smarty) {

		$db = getDbHandler();
		$sql = "SELECT id, name FROM service ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$services = $sth->fetchAll();
		
		$smarty->assign('services', $services);
		
		$smarty->display('admin/service.tpl');
	});
	
	$app->post('/service', function () use ($app, $smarty) {
	
		$db = getDbHandler();
	
		$sql = "INSERT INTO service (name) VALUES (:name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':name' => $_POST['name']));
	
		setSuccessMessage('Service Added');
	
		$app->redirect(APP_PATH . '/admin/service');
	});
	
	$app->get("/balancesheet", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "SELECT id, name FROM balancesheet_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$groups = $sth->fetchAll();
		$smarty->assign('groups', $groups);
		
		$sql = "SELECT id, name FROM balancesheet_sub_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$subgroups = $sth->fetchAll();
		$smarty->assign('subgroups', $subgroups);
		
		
		$sql = "SELECT b.name, bg.name AS group_name, bsg.name AS subgroup_name "
		     . "FROM balancesheet AS b "
		     . "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
		     . "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$bslines = $sth->fetchAll();
		$smarty->assign('bslines', $bslines);
		
		$smarty->display('admin/balancesheet.tpl');
	});
	
	$app->post('/balancesheet', function () use ($app, $smarty) {
	
		if (!isset($_POST['group_id']) || $_POST['group_id'] == '') {
			setErrorMessage('Select Group Name');
			$app->redirect(APP_PATH . '/admin/balancesheet');
			return;
		}
		
		if (!isset($_POST['subgroup_id']) || $_POST['subgroup_id'] == '') {
			setErrorMessage('Select Sub Group Name');
			$app->redirect(APP_PATH . '/admin/balancesheet');
			return;
		}
		
		$db = getDbHandler();
	
		$sql = "INSERT INTO balancesheet (group_id, sub_group_id, name) VALUES (:group_id, :sub_group_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':group_id' => $_POST['group_id'], ':sub_group_id' => $_POST['subgroup_id'], ':name' => $_POST['name']));
	
		setSuccessMessage('Balance Sheet Line Item Added');
	
		$app->redirect(APP_PATH . '/admin/balancesheet');
	});
	
	$app->get("/users", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT email, level, federation_id, primary_union_id, country_id "
		     . "FROM user ";
		
		if ($_SESSION['user_level'] == 1) {
			$sql .= " WHERE federation_id = :federation_id ";
		} 
		
		$sth = $db->prepare($sql);
		
		if ($_SESSION['user_level'] == 0) {
			$sth->execute();
		} else {
			$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));
		}
		
		$users = $sth->fetchAll();
		
		$smarty->assign('users', $users);
		
		$sql = "SELECT id, name FROM country ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$countries = $sth->fetchAll();
		
		$smarty->assign('countries', $countries);
		
		$smarty->display('admin/users.tpl');
	});
});


$app->get("/logout", function () use ($app, $smarty) {
	session_destroy();
	$app->redirect(APP_PATH);
});


function getErrorMessage() 
{
	return getSessionMessage('error_message');
}

function getSuccessMessage()
{
	return getSessionMessage('success_message');
}

function setSuccessMessage($message)
{
	setSessionMessage('success_message', $message);
}

function setErrorMessage($message)
{
	setSessionMessage('error_message', $message);
}

function setSessionMessage($key, $value)
{
	$_SESSION[$key] = $value;
}

function getSessionMessage($key)
{
	$msg = "";
	if (isset($_SESSION[$key])) {
		$msg = $_SESSION[$key];
		unset($_SESSION[$key]);
	}
	return $msg;
}