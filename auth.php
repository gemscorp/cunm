<?php 

$app->get("/mandashboard", function () use ($app, $smarty) {
	$smarty->display('mandashboard.tpl');
});

$app->get("/dashboard", function () use ($app, $smarty) {
	$smarty->display('dashboard.tpl');
});

$app->get("/password", function () use ($app, $smarty) {
	$smarty->display('password.tpl');
});

$app->post("/password", function () use ($app, $smarty) {
	
	$db = getDbHandler();
	
	$sql = "UPDATE user SET password = PASSWORD(:password_new) WHERE id = :id AND password = PASSWORD(:password_current) ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':password_new' => $_POST['new_password'], ':id' => $_SESSION['user_id'], ':password_current' => $_POST['current_password']));
	
	if ($sth->rowCount() == 0) {
		setErrorMessage("Password Not Saved, Maybe current password not match");
	} else {
		setSuccessMessage("Password changed");
	}
	
	$app->redirect(APP_PATH . '/password', 301);
	return;
});

$app->group("/report", function () use ($app, $smarty) {
	
	$app->get('/', function () use ($app, $smarty) {
		$db = getDbHandler();
		
		$sql = "SELECT id, name FROM country";
		$sth = $db->prepare($sql);
		$sth->execute();
		$c = $sth->fetchAll();
		$country = array();
		foreach ($c as $ct) {
			$country[$ct['id']] = $ct['name'];
		}
		$smarty->assign('country', $country);
		
		$sql = "SELECT id, name FROM federation ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$f = $sth->fetchAll();
		$fed = array();
		foreach ($f as $fd) {
			$fed[$fd['id']] = $fd['name'];
		}
		$smarty->assign('federation', $fed);
		
		$smarty->display('member/report_search.tpl');
	});
	
	$app->post("/main", function () use ($app, $smarty) {
		$db = getDbHandler();
		
		require_once 'lib/report.php';
		
		$exchange = $_POST['exchange'];
		
		if ($_POST['federation_id'] != 0) {
			$cu_ids = getCuByFedId($_POST['federation_id']);
		} else {
			$cu_ids = getCuByCountry($_POST['country_id']);
		}
		
		if (count($cu_ids) == 0) {
			$smarty->display('member/nodata.tpl');
			return;
		}
		
		
		$sql = "SELECT DISTINCT area_id FROM pu_operations_area WHERE primary_union_id IN (" . implode(",", $cu_ids) . ") ";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$oparea = array();
		$area_ids = $sth->fetchAll();
		$gender_groups = array();
		$genders = array(1, 2);
		$group_template = array('total' => '', 'male' => '', 'female' => '', 'farmer' => '', 'employee' => '',
				'microb' => '', 'group1' => '', 'group2' => '', 'group3' => '', 'group4' => '',
				'less_male' => '', 'less_female' => '', 'less_savings' => '', 'less_outstand' => '', 'less_totalg' => '', 'less_total' => '');
		foreach ($area_ids as $id) {
			$oparea[] = $id['area_id'];
			foreach ($genders as $gender_id) {
				$gender_groups[$id['area_id']][$gender_id] = $group_template;
			}
		}
		
		$gtext = array('1' => 'Male', '2' => 'Female');
		
		
		$smarty->assign('gtxt', $gtext);
		$smarty->assign('genders', $genders);
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
		
		$dids = getLatestDataSheetByCuId($cu_ids);
		$pdids = getPreviousDataSheetIds($cu_ids);
		
		if (count($dids) == 0) {
			$smarty->display('member/nodata.tpl');
			return;
		}
		
		$pu_genders = getReportData($dids);
		
		$gender_total = $group_template;
		
		foreach ($pu_genders as $pu_gender) {
			$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']] = $pu_gender;
				
			$gkeys = array_keys($pu_gender);
			foreach ($gkeys as $key) {
				if (!isset($gender_total[$key])) continue;
				$gender_total[$key] += $pu_gender[$key];
			}
		}
		
		$smarty->assign('gender_groups', $gender_groups);
		$smarty->assign('gender_total', $gender_total);
		
		$bl = getBalAggr($dids, $exchange);
		$is = getIsAggr($dids, $exchange);
		
		$pearls = array();
		$pearls['P1'] = $bl[15]['amount'] / $bl[18]['amount'];
		$pearls['P2'] = $bl[12]['amount'] / $bl[19]['amount'];
		
		$pearls['E1'] = $bl[17]['amount'] / $bl[28]['amount'];
		$pearls['E5'] = $bl[31]['amount'] / $bl[28]['amount'];
		$pearls['E9'] = $bl[37]['amount'] / $bl[28]['amount'];
		
		$pearls['A1'] = $bl[16]['amount'] / $bl[17]['amount'];
		$pearls['A2'] = $bl[25]['amount'] / $bl[28]['amount'];
		
		$pearls['S10'] = getTotalMember($dids) / getTotalMember($pdids);
		$pearls['S11'] = getAggrBlItem($dids, 28) / getAggrBlItem($pdids, 28);
		
		$smarty->assign('pearls', $pearls);
				
		$smarty->assign('bsvals', $bl);
		$smarty->assign('isvals', $is);
		$smarty->assign('bslines', getBsLines());
		$smarty->assign('islines', getIsLines());
		
		$smarty->assign('group', "");
		$smarty->assign('subgroup', "");
		$smarty->assign('igroup', "");
		$smarty->assign('isubgroup', "");
		
		
		
		$smarty->display('member/report.tpl');
	});
});

$app->get("/adduser", function () use ($app, $smarty) {
	
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
	require_once 'controller/member.php';
});

$app->group("/federation", function () use ($app, $smarty) {
	
	$app->get("/primarycu", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT id, federation_id, name FROM primary_union WHERE federation_id = :federation_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));
		
		$primarycus = $sth->fetchAll();
		$smarty->assign('primarycus', $primarycus);
		
		$sql = "SELECT id, federation_id, name FROM chapter WHERE federation_id = :federation_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));
		
		$chapters = $sth->fetchAll();
		$smarty->assign('chapters', $chapters);
		
		$smarty->display('federation/primarycu.tpl');
	});
	
	$app->post("/primarycu", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "INSERT INTO primary_union (federation_id, chapter_id, name) VALUES (:federation_id, :chapter_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_POST['federation_id'], ':chapter_id' => $_POST['chapter_id'], ':name' => $_POST['name']));
		
		setSuccessMessage('Primary Credit Union Added');
		
		$app->redirect(APP_PATH . '/federation/primarycu');
		
	});
	
	$app->get("/chapter", function () use ($app, $smarty) {
	
		$db = getDbHandler();
		$sql = "SELECT id, federation_id, name FROM chapter WHERE federation_id = :federation_id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_SESSION['user_federation_id']));
	
		$chapters = $sth->fetchAll();
		$smarty->assign('chapters', $chapters);
	
		$smarty->display('federation/chapter.tpl');
	});
	
	$app->post("/chapter", function () use ($app, $smarty) {

		$db = getDbHandler();
		$sql = "INSERT INTO chapter (federation_id, name) VALUES (:federation_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':federation_id' => $_POST['federation_id'], ':name' => $_POST['name']));

		setSuccessMessage('Region/Chapter Added');

		$app->redirect(APP_PATH . '/federation/chapter');

	});
	
});

$app->group("/ajax", function () use ($app, $smarty) {
	require_once 'controller/ajax.php';
});

$app->group("/admin", function () use ($app, $smarty) {
	
	
	$app->get("/unlock", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT ur.*, pu.name AS pu_name, IF(ur.pu_datasheet_id IS NULL, 'Profile', 'Datasheet') AS type FROM unlock_request AS ur "
			 . "LEFT JOIN primary_union AS pu ON ur.primary_union_id = pu.id "
			 . "WHERE unlock_date IS NULL AND federation_id = :fid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':fid' => $_SESSION['user_federation_id']));
		$reqs = $sth->fetchAll();
		
		$smarty->assign('reqs', $reqs);
		
		$smarty->display('admin/unlocks.tpl');
		
	});
	
	$app->post('/unlock', function () use ($app) {
		
		$db = getDbHandler();
		
		$sql = "SELECT * FROM unlock_request WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_POST['id']));
		
		$req = $sth->fetch();
		
		if ($req['pu_profile_id'] !== null) {
			
			$sql = "UPDATE pu_profile SET locked = 0 WHERE id = :id ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':id' => $req['pu_profile_id']));
			
		} else if ($req['pu_datasheet_id'] !== null) {

			$sql = "UPDATE pu_datasheet SET locked = 0 WHERE id = :id ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':id' => $req['pu_datasheet_id']));
			
		}
		
		$sql = "UPDATE unlock_request SET unlock_date = NOW() WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_POST['id']));
		
		$app->contentType('application/json');
		echo json_encode(array());
		
	});
	
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
		$sql = "SELECT c.id, c.name, COUNT(*) AS fedcount FROM country AS c JOIN federation AS f ON f.country_id = c.id GROUP BY f.country_id ORDER BY c.name ";
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
		
		$sql = "SELECT f.id, f.name, c.name AS country_name, COUNT(pu.id) AS pucount FROM federation AS f JOIN country AS c ON c.id = f.country_id LEFT JOIN primary_union AS pu ON pu.federation_id = f.id GROUP BY f.id ORDER BY f.name ";
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
	
	
	$app->get("/incomestatement", function () use ($app, $smarty) {
	
		$db = getDbHandler();
	
		$sql = "SELECT id, name FROM is_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$groups = $sth->fetchAll();
		$smarty->assign('groups', $groups);
	
		$sql = "SELECT id, name FROM is_sub_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$subgroups = $sth->fetchAll();
		$smarty->assign('subgroups', $subgroups);
	
	
		$sql = "SELECT i.name, ig.name AS group_name, isg.name AS subgroup_name "
				. "FROM `is` AS i "
				. "JOIN is_group AS ig ON ig.id = i.group_id "
			    . "JOIN is_sub_group AS isg ON isg.id = i.sub_group_id ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$bslines = $sth->fetchAll();
		$smarty->assign('bslines', $bslines);
	
		$smarty->display('admin/incomestatement.tpl');
	});
		
	$app->post('/incomestatement', function () use ($app, $smarty) {

		if (!isset($_POST['group_id']) || $_POST['group_id'] == '') {
			setErrorMessage('Select Group Name');
			$app->redirect(APP_PATH . '/admin/incomestatement');
			return;
		}

		if (!isset($_POST['subgroup_id']) || $_POST['subgroup_id'] == '') {
			setErrorMessage('Select Sub Group Name');
			$app->redirect(APP_PATH . '/admin/incomestatement');
			return;
		}

		$db = getDbHandler();

		$sql = "INSERT INTO `is` (group_id, sub_group_id, name) VALUES (:group_id, :sub_group_id, :name) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':group_id' => $_POST['group_id'], ':sub_group_id' => $_POST['subgroup_id'], ':name' => $_POST['name']));

		setSuccessMessage('Income Statement Line Item Added');

		$app->redirect(APP_PATH . '/admin/incomestatement');
	});
	
	$app->get("/users", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		$sql = "SELECT u.email, u.level, u.federation_id, u.primary_union_id, u.country_id, f.name AS fedname, pu.name AS puname, c.name AS country_name  "
				. "FROM user AS u "
				. "JOIN federation AS f ON f.id = u.federation_id "
				. "JOIN primary_union AS pu ON pu.id = u.primary_union_id "
				. "JOIN country AS c ON c.id = u.country_id "
				. " WHERE 1=1 ";
		
		if ($_SESSION['user_level'] == 1) {
			$sql .= " AND u.federation_id = :federation_id ";
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
	
	$app->post('/users', function () use ($app, $smarty) {
		$db = getDbHandler();
		$sql = "SELECT u.email, u.level, u.federation_id, u.primary_union_id, u.country_id, f.name AS fedname, pu.name AS puname, c.name AS country_name  "
				. "FROM user AS u "
				. "JOIN federation AS f ON f.id = u.federation_id "
				. "JOIN primary_union AS pu ON pu.id = u.primary_union_id "
				. "JOIN country AS c ON c.id = u.country_id "
				. " WHERE 1=1 ";
		
		if ($_SESSION['user_level'] == 1) {
			$sql .= " AND u.federation_id = :federation_id ";
		}
		
		if (isset($_POST['country_id']) && $_POST['country_id'] != -1) {
			$sql .= " AND u.country_id = " . $_POST['country_id'] . " ";
		}
		
		$sql .= " ORDER BY u.email";
		
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
	$app->redirect(APP_PATH . "/");
});
