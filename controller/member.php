<?php 

$app->get("/detail/:id", function ($idx) use ($app, $smarty) {

	$db = getDbHandler();

	$smarty->assign('pid', $idx);

	$sql = "SELECT area_id FROM pu_operations_area WHERE primary_union_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));

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
					. "         pulms.male AS less_male, pulms.female AS less_female, pulms.gender_id, pulms.savings AS less_savings, pulms.outstanding AS less_outstand, pulms.total_granted AS less_totalg, pulms.total AS less_total "
							. "FROM pu_gender AS pug "
									. "LEFT JOIN pu_age AS pua ON pua.area_id = pug.area_id AND pua.gender_id = pug.gender_id AND pua.pu_datasheet_id = pug.pu_datasheet_id "
											. "LEFT JOIN pu_market AS pum ON pum.area_id = pug.area_id AND pum.gender_id = pug.gender_id AND pum.pu_datasheet_id = pug.pu_datasheet_id "
													. "LEFT JOIN pu_less_member_service AS pulms ON pulms.area_id = pug.area_id AND pulms.gender_id = pug.gender_id AND pulms.pu_datasheet_id = pug.pu_datasheet_id "
															. "WHERE pug.primary_union_id = :pid AND pug.pu_datasheet_id = :dsid ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $idx));
	$pu_genders = $sth->fetchAll();

	$gender_total = $group_template;

	foreach ($pu_genders as $pu_gender) {
		$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']] = array_merge($gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']], $pu_gender);
			
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
		$serval[$serv['id']] = array('total' => '', 'male' => '', 'male_ratio' => '', 'female' => '', 'female_ratio' => '', 'youth' => '', 'youth_ratio' => '', 'none_member' => '', 'none_member_ratio' => '');
	}

	$sql = "SELECT service_id, total, male, male_ratio, female, female_ratio, youth, youth_ratio,  none_member, none_member_ratio FROM pu_service_distribution WHERE primary_union_id = :pid AND pu_datasheet_id = :dsid ";
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

	foreach ($_POST['area'] as $area_id => $vx) {
			
		foreach ($vx as $gender_id => $val) {
				
			$total += $val['total'];

			$sql = "INSERT INTO pu_gender (primary_union_id, pu_datasheet_id, area_id, gender_id, total) "
				 . "VALUES (:pid, :dsid, :area_id, :gender_id, :total) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':gender_id' => $gender_id, ':total' => $val['total']));

			$sql = "INSERT INTO pu_market (primary_union_id, pu_datasheet_id, area_id, gender_id, farmer, employee, microb) "
					. "VALUES (:pid, :dsid, :area_id, :gender_id, :farmer, :employee, :microb) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':gender_id' => $gender_id, ':farmer' => $val['farmer'], ':employee' => $val['employee'], ':microb' => $val['microb']));

			$sql = "INSERT INTO pu_age (primary_union_id, pu_datasheet_id, area_id, gender_id, group1, group2, group3, group4) "
					. "VALUES (:pid, :dsid, :area_id, :gender_id, :group1, :group2, :group3, :group4) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, 'gender_id' => $gender_id, ':group1' => $val['group1'], ':group2' => $val['group2'], ':group3' => $val['group3'], ':group4' => $val['group4']));

			$sql = "INSERT INTO pu_less_member_service (primary_union_id, pu_datasheet_id, area_id, gender_id, savings, outstanding, total_granted, total) "
					. "VALUES (:pid, :dsid, :area_id, :gender_id, :savings, :outstanding, :total_granted, :total) ";
			$sth = $db->prepare($sql);
			$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
					':area_id' => $area_id, ':gender_id' => $gender_id, ':savings' => $val['less_savings'], ':outstanding' => $val['less_outstand'], ':total_granted' => $val['less_totalg'], ':total' => $val['less_total']));
		}
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
			
		$sql = "INSERT INTO pu_service_distribution (primary_union_id, pu_datasheet_id, service_id, total, male, male_ratio, female, female_ratio, youth, youth_ratio,  none_member, none_member_ratio) "
				. "VALUES (:pid, :dsid, :s_id, :total, :male, :male_ratio, :female, :female_ratio, 
						:youth, :youth_ratio, :none_member, :none_member_ratio) ";
		$sth = $db->prepare($sql);
		$sth->execute(array(':pid' => $_SESSION['user_primary_union_id'], ':dsid' => $_POST['dsid'],
				':s_id' => $s_id, ':total' => $val['total'], 
				':male' => $val['male'], ':male_ratio' => $val['male_ratio'],
				':female' => $val['female'], ':female_ratio' => $val['female_ratio'], 
				':youth' => $val['youth'], ':youth_ratio' => $val['youth_ratio'], 
				':none_member' => $val['none_member'], ':none_member_ratio' => $val['none_member_ratio'],
			));
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

	$sql = "SELECT name, chapter_id FROM primary_union WHERE id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $_SESSION['user_primary_union_id']));

	$primarycu = $sth->fetch();
	
	$sth = $db->prepare("SELECT name FROM chapter WHERE id = :id");
	$sth->execute(array(':id' => $primarycu['chapter_id']));
	
	$primarycu['chapter_name'] = $sth->fetch()['name'];

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

	$sql = "SELECT * FROM pu_operations WHERE primary_union_id = :id ";
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

	$sql = "INSERT INTO pu_operations (primary_union_id, males, females, gtotal, manager_male, manager_female, manager_total, 
			ops_male, ops_female, ops_total, gm_male, gm_female, gm_total, 
			lm_male, lm_female, lm_total, 
			hr_male, hr_female, hr_total, 
			fa_male, fa_female, fa_total, 
			audit_male, audit_female, audit_total, 
			other_male, other_female, other_total, 
			bod_male, bod_female, bod_total, 
			bodmale, bodfemale, bodtotal, 
			edumale, edufemale, edutotal,
			creditmale, creditfemale, credittotal,
			auditmale, auditfemale, audittotal,
			othermale, otherfemale, othertotal) "
			. "VALUES (:id, :male, :female, :gtotal, 
				:manager_male, :manager_female, :manager_total, 
				:ops_male, :ops_female, :ops_total, 
				:gm_male, :gm_female, :gm_total, 
				:lm_male, :lm_female, :lm_total, 
				:hr_male, :hr_female, :hr_total, 
				:fa_male, :fa_female, :fa_total, 
				:audit_male, :audit_female, :audit_total, 
				:other_male, :other_female, :other_total,
				:bod_male, :bod_female, :bod_total, 
				:bodmale, :bodfemale, :bodtotal,
				:edumale, :edufemale, :edutotal,
				:creditmale, :creditfemale, :credittotal, 
				:auditmale, :auditfemale, :audittotal,
				:othermale, :otherfemale, :othertotal) ";
	
	$sth = $db->prepare($sql);
	$sth->execute(array(
			':id' => $_SESSION['user_primary_union_id'],
			':male' => $_POST['male'],
			':female' => $_POST['female'],
			':gtotal' => $_POST['gtotal'],
			':manager_male' => $_POST['manager_male'],
			':manager_female' => $_POST['manager_female'],
			':manager_total' => $_POST['manager_total'],
			':ops_male' => $_POST['ops_male'],
			':ops_female' => $_POST['ops_female'],
			':ops_total' => $_POST['ops_total'],
			':gm_male' => $_POST['gm_male'],
			':gm_female' => $_POST['gm_female'],
			':gm_total' => $_POST['gm_total'],
			':lm_male' => $_POST['lm_male'],
			':lm_female' => $_POST['lm_female'],
			':lm_total' => $_POST['lm_total'],
			':hr_male' => $_POST['hr_male'],
			':hr_female' => $_POST['hr_female'],
			':hr_total' => $_POST['hr_total'],
			':fa_male' => $_POST['fa_male'],
			':fa_female' => $_POST['fa_female'],
			':fa_total' => $_POST['fa_total'],
			':audit_male' => $_POST['audit_male'],
			':audit_female' => $_POST['audit_female'],
			':audit_total' => $_POST['audit_total'],
			':other_male' => $_POST['other_male'],
			':other_female' => $_POST['other_female'],
			':other_total' => $_POST['other_total'],
			':bod_male' => $_POST['bod_male'],
			':bod_female' => $_POST['bod_female'],
			':bod_total' => $_POST['bod_total'],
			':bodmale' => $_POST['bodmale'],
			':bodfemale' => $_POST['bodfemale'],
			':bodtotal' => $_POST['bodtotal'],
			':edumale' => $_POST['edumale'],
			':edufemale' => $_POST['edufemale'],
			':edutotal' => $_POST['edutotal'],
			':creditmale' => $_POST['creditmale'],
			':creditfemale' => $_POST['creditfemale'],
			':credittotal' => $_POST['credittotal'],
			':auditmale' => $_POST['auditmale'],
			':auditfemale' => $_POST['auditfemale'],
			':audittotal' => $_POST['audittotal'],
			':othermale' => $_POST['othermale'],
			':otherfemale' => $_POST['otherfemale'],
			':othertotal' => $_POST['othertotal'],
	));

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