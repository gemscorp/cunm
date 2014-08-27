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
		
		if ($_POST['federation_id'] != 0) {
			$cu_ids = getCuByFedId($_POST['federation_id']);
		} else {
			$cu_ids = getCuByCountry($_POST['country_id']);
		}
		
		$dids = getLatestDataSheetByCuId($cu_ids);
		
		$less_member = getLessMemberAggr($dids);
		$market = getMarketAgeAggr($dids);
		//$age = getAgeAggr($dids);
		$gender = getGenderAggr($dids);
		$memcnt = getMemberCountGroup($dids);
		$bl = getBalAggr($dids);
		$is = getIsAggr($dids);
		
		$smarty->assign('less_member', $less_member);
		$smarty->assign('market', $market);
		//$smarty->assign('age', $age);
		$smarty->assign('gender', $gender);
		$smarty->assign('memcnt', $memcnt);
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
	
	$app->get("/detail/:id", function ($idx) use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$smarty->assign('pid', $idx);
		
		$sql = "SELECT area_id FROM pu_operations_area WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$oparea = array();
		$area_ids = $sth->fetchAll();
		$gender_groups = array();
		$group_template = array('total' => '', 'male' => '', 'female' => '', 'farmer' => '', 'employee' => '', 
					'microb' => '', 'group1' => '', 'group2' => '', 'group3' => '', 'group4' => '',
					'less_male' => '', 'less_female' => '', 'less_savings' => '', 'less_outstand' => '', 'less_totalg' => '', 'less_total' => '');
		foreach ($area_ids as $id) {
			$oparea[] = $id['area_id'];
			$gender_groups[$id['area_id']] = $group_template;
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
		
		$sql = "SELECT b.id, b.name, bg.name AS group_name, bsg.name AS subgroup_name "
				. "FROM balancesheet AS b "
				. "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
				. "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id "
				. " ORDER BY bg.id, bsg.id, b.sort_order ";
		
		$sth = $db->prepare($sql);
		$sth->execute();
		$bslines = $sth->fetchAll();
		$smarty->assign('bslines', $bslines);
		$smarty->assign('group', "");
		$smarty->assign('subgroup', "");
		
		//income statement
		$sql = "SELECT i.id, i.name, ig.name AS group_name, isg.name AS subgroup_name "
			 . "FROM `is` AS i "
			 . "JOIN is_group AS ig ON ig.id = i.group_id "
			 . "JOIN is_sub_group AS isg ON isg.id = i.sub_group_id "
			 . " ORDER BY ig.id, isg.id, i.sort_order ";
		
		$sth = $db->prepare($sql);
		$sth->execute();
		$islines = $sth->fetchAll();
		$smarty->assign('islines', $islines);
		$smarty->assign('igroup', "");
		$smarty->assign('isubgroup', "");
		
		
		$sql = "SELECT id, name FROM asset_group ";
		$sth = $db->prepare($sql);
		$sth->execute();
		$assetgroups = $sth->fetchAll();
		
		$smarty->assign('assetgroups', $assetgroups);
		
		$sql = "SELECT pug.area_id, pug.total, pug.male, pug.female, pum.farmer, pum.employee, pum.microb, "
			 . "         pua.group1, pua.group2, pua.group3, pua.group4, "
			 . "         pulms.male AS less_male, pulms.female AS less_female, pulms.savings AS less_savings, pulms.outstanding AS less_outstand, pulms.total_granted AS less_totalg, pulms.total AS less_total "
			 . "FROM pu_gender AS pug "
			 . "LEFT JOIN pu_age AS pua ON pua.area_id = pug.area_id AND pua.pu_datasheet_id = pug.pu_datasheet_id "
			 . "LEFT JOIN pu_market AS pum ON pum.area_id = pug.area_id AND pum.pu_datasheet_id = pug.pu_datasheet_id "
			 . "LEFT JOIN pu_less_member_service AS pulms ON pulms.area_id = pug.area_id AND pulms.pu_datasheet_id = pug.pu_datasheet_id "
			 . "WHERE pug.primary_union_id = :pid AND pug.pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));
		$pu_genders = $sth->fetchAll();
		
		$gender_total = $group_template;
		
		foreach ($pu_genders as $pu_gender) {
			$gender_groups[$pu_gender['area_id']] = array_merge($gender_groups[$pu_gender['area_id']], $pu_gender);
			
			$gkeys = array_keys($pu_gender);
			foreach ($gkeys as $key) {
				if (!isset($gender_total[$key])) continue;
				$gender_total[$key] += $pu_gender[$key];
			}			
		}
		
		$smarty->assign('gender_groups', $gender_groups);
		$smarty->assign('gender_total', $gender_total);
		
		
		$sql = "SELECT asset_group_id FROM pu_datasheet WHERE primary_union_id = :pid AND id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));
		
		$asset_group_id = 0;
		
		$row = $sth->fetch();
		if ($row['asset_group_id'] != null) $asset_group_id = $row['asset_group_id'];
		$smarty->assign('asset_group_id', $asset_group_id);
		
		$sql = "SELECT balancesheet_id, amount FROM pu_balancesheet WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));
		
		$bl_sheet = array();
		foreach ($bslines as $blt) {
			$bl_sheet[$blt['id']] = array('amount' => '');
		}
		
		$bl = $sth->fetchAll();
		
		foreach ($bl as $b) {
			$bl_sheet[$b['balancesheet_id']] = array('amount' => $b['amount']);
		}
		
		$smarty->assign('bsvals', $bl_sheet);
		
		//income statement
		$sql = "SELECT is_id, amount FROM pu_is WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));
		
		$is_sheet = array();
		foreach ($islines as $ist) {
			$is_sheet[$ist['id']] = array('amount' => '');
		}
		
		$is = $sth->fetchAll();
		
		foreach ($is as $i) {
			$is_sheet[$i['is_id']] = array('amount' => $i['amount']);
		}
		
		$smarty->assign('isvals', $is_sheet);
		
		//income statement end
		
		
		
		$sql = "SELECT id, name FROM service ";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$services = $sth->fetchAll();
		$smarty->assign('services', $services);
		
		$serval = array();
		foreach ($services as $serv) {
			$serval[$serv['id']] = array('total' => '', 'male' => '', 'female' => '', 'youth' => '', 'none_member' => '');
		}
		
		$sql = "SELECT service_id, total, male, female, youth, none_member FROM pu_service_distribution WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));

		$ss = $sth->fetchAll();
		foreach ($ss as $s) {
			$serval[$s['service_id']] = $s;
		}
		
		$smarty->assign('serval', $serval);
		
		$sql = "SELECT * FROM pu_datasheet WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $idx));
				
		$smarty->assign('ds', $sth->fetch());
		
		$smarty->display('member/detail.tpl');
	});
	
	$app->post("/detail", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "SELECT * FROM pu_datasheet WHERE id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_POST['dsid']));
		
		$ds = $sth->fetch();
		
		if ($ds['saved'] == 0) {
			$sql = "UPDATE pu_datasheet SET saved = 1 WHERE id = :id ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':id' => $_POST['dsid']));
		}
		
		if (isset($_POST['lock'])) {
			$sql = "UPDATE pu_datasheet SET locked = 1 WHERE id = :id ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':id' => $_POST['dsid']));
		}
		
		$sql = "DELETE FROM pu_gender WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		$sql = "DELETE FROM pu_market WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		$sql = "DELETE FROM pu_age WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		$sql = "DELETE FROM pu_less_member_service WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		$total = 0;
		
		foreach ($_POST['area'] as $area_id => $val) {
			
			$total += $val['total'];
			
			$sql = "INSERT INTO pu_gender (primary_union_id, pu_datasheet_id, area_id, male, female, total) "
				 . "VALUES (:pid, :dsid, :area_id, :male, :female, :total) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'], 
				':area_id' => $area_id, ':male' => $val['male'], ':female' => $val['female'], ':total' => $val['total']));	
			
			$sql = "INSERT INTO pu_market (primary_union_id, pu_datasheet_id, area_id, farmer, employee, microb) "
					. "VALUES (:pid, :dsid, :area_id, :farmer, :employee, :microb) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':farmer' => $val['farmer'], ':employee' => $val['employee'], ':microb' => $val['microb']));			
			
			$sql = "INSERT INTO pu_age (primary_union_id, pu_datasheet_id, area_id, group1, group2, group3, group4) "
					. "VALUES (:pid, :dsid, :area_id, :group1, :group2, :group3, :group4) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':group1' => $val['group1'], ':group2' => $val['group2'], ':group3' => $val['group3'], ':group4' => $val['group4']));
			
			$sql = "INSERT INTO pu_less_member_service (primary_union_id, pu_datasheet_id, area_id, male, female, savings, outstanding, total_granted, total) "
					. "VALUES (:pid, :dsid, :area_id, :male, :female, :savings, :outstanding, :total_granted, :total) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':male' => $val['less_male'], ':female' => $val['less_female'], ':savings' => $val['less_savings'], ':outstanding' => $val['less_outstand'], ':total_granted' => $val['less_totalg'], ':total' => $val['less_total']));
		}
		
		$sql = "DELETE FROM pu_balancesheet WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		foreach ($_POST['bsline'] as $bs_id => $val) {
			
			$sql = "INSERT INTO pu_balancesheet (primary_union_id, pu_datasheet_id, balancesheet_id, amount) "
					. "VALUES (:pid, :dsid, :bs_id, :amount) "; 
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':bs_id' => $bs_id, ':amount' => $val['amount']));
		}
		
		//income statement
		$sql = "DELETE FROM pu_is WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		foreach ($_POST['isline'] as $is_id => $val) {
				
			$sql = "INSERT INTO pu_is (primary_union_id, pu_datasheet_id, is_id, amount) "
					. "VALUES (:pid, :dsid, :bs_id, :amount) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':bs_id' => $is_id, ':amount' => $val['amount']));
		}
		//income statement end
		
		$sql = "DELETE FROM pu_service_distribution WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		foreach ($_POST['service'] as $s_id => $val) {
			
			$sql = "INSERT INTO pu_service_distribution (primary_union_id, pu_datasheet_id, service_id, total, male, female, youth, none_member) "
				. "VALUES (:pid, :dsid, :s_id, :total, :male, :female, :youth, :none_member) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':s_id' => $s_id, ':total' => $val['total'], ':male' => $val['male'], ':female' => $val['female'], ':youth' => $val['youth'], ':none_member' => $val['none_member']));			
		}
		
		$asset_group_id = isset($_POST['optionsRadios']) ? $_POST['optionsRadios'] : 0;
		
		$sql = "UPDATE pu_datasheet SET asset_group_id = :asset_id, total_members = :total_members WHERE primary_union_id = :pid AND id = :dsid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':asset_id' => $asset_group_id, ':total_members' => $total,  ':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid']));
		
		setSuccessMessage('Datasheet Saved');
		$app->redirect(APP_PATH . "/member/detail/" . $_POST['dsid']);
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
		
		$sql = "SELECT primary_union_id, establishment, address, city, contact_person, position, phone, fax, email, saved, locked  FROM pu_profile WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$secondary = array_fill_keys(array('establishment', 'address', 'city', 'contact_person', 'position', 'phone', 'fax', 'email'), '');
		$secondary = array_merge($secondary, array('primary_union_id' => 0, 'saved' => 0, 'locked' => 0));
		
		if ($sth->rowCount() == 1) {
			$secondary = $sth->fetch();
		}
		
		$primarycu = array_merge($primarycu, $secondary);
		
		
		$smarty->assign('primarycu', $primarycu);
		
		$smarty->display('member/profile.tpl');
	});
	
	$app->post('/profile', function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "SELECT id FROM pu_profile WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$lock = 0;
		if (isset($_POST['lock'])) $lock = 1;
		
		if ($sth->rowCount() == 0) {
			
			$sql = "INSERT INTO pu_profile (primary_union_id, establishment, address, city, contact_person, position, phone, fax, email, saved) "
				 . "VALUES (:pid, :doe, :address, :city, :contact_person, :position, :phone, :fax, :email, 1) ";
			
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':doe' => $_POST['doe'], ':address' => $_POST['address'], 
				':city' => $_POST['city'], ':contact_person' => $_POST['contact_person'], ':position' => $_POST['position'], 
				':phone' => $_POST['phone'], ':fax' => $_POST['fax'], ':email' => $_POST['email']));
			
			
		} else {
			
			$row = $sth->fetch();
			
			$sql = "UPDATE pu_profile SET establishment = :doe, address = :address, city = :city, contact_person = :contact_person, position = :position, 
						phone = :phone, fax = :fax, email = :email, locked = :lock, saved = 1 "
				. "WHERE id = :id ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':doe' => $_POST['doe'], ':address' => $_POST['address'], 
				':city' => $_POST['city'], ':contact_person' => $_POST['contact_person'], ':position' => $_POST['position'], 
				':phone' => $_POST['phone'], ':fax' => $_POST['fax'], ':email' => $_POST['email'], ':lock' => $lock,
				':id' => $row['id']));
			
		}
		
		setSuccessMessage("Profile Saved");
		
		$app->redirect(APP_PATH . "/member/profile", 301);
		
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
		
		$db = getDbHandler();
		
		$sql = "SELECT * FROM pu_datasheet WHERE primary_union_id = :pid ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id']));
		
		$datasheets = $sth->fetchAll();
		$smarty->assign('ds', $datasheets);
		
		$sql = "SELECT * FROM pu_operations_area WHERE primary_union_id = :id ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));
		
		$op_area_set = 0;
		if ($sth->rowCount() != 0) $op_area_set = 1;
		$smarty->assign('op_area_set', $op_area_set);
		
		$smarty->display('member/datasheet.tpl');
	});
	
	$app->post("/datasheet", function () use ($app, $smarty) {
		
		$db = getDbHandler();
		
		$sql = "SELECT id FROM pu_datasheet WHERE primary_union_id = :pid AND date = :date ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':date' => $_POST['date']));
		
		if ($sth->rowCount() == 1) {
			setErrorMessage("Datasheet Already Exists");
			$app->redirect(APP_PATH . "/member/datasheet");
			return;
		}
		
		$sql = "INSERT INTO	pu_datasheet (primary_union_id, date, created_date) "
			 . "VALUES (:pid, :date, NOW()) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':date' => $_POST['date']));
		
		$id = $db->lastInsertId();
		
		$app->redirect(APP_PATH . "/member/detail/" . $id);
		
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
