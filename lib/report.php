<?php 

function getCuByFedId($federation_id = 0)
{
	$dbo = getDbHandler();
	$sql = "SELECT id FROM primary_union WHERE federation_id = :id ";
	
	$sth = $dbo->prepare($sql);
	$sth->execute(array(':id' => $federation_id));
	
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
}

function getAllCuIds()
{
	$dbo = getDbHandler();
	$sql = "SELECT id FROM primary_union ";
	
	$sth = $dbo->prepare($sql);
	$sth->execute();
	
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
}

function getCuByCountry($country_id = 0)
{
	$dbo = getDbHandler();
	$sql = "SELECT id FROM primary_union WHERE federation_id IN ( SELECT id FROM federation WHERE country_id = :id ) ";
	$sth = $dbo->prepare($sql);
	$sth->execute(array(':id' => $country_id));
	
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);	
}

function getLatestDataSheetByCuId($cu_ids)
{
	$dbo = getDbHandler();
	$sql = "SELECT t1.id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $cu_ids) . ") AND t1.date = (SELECT MAX(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id) GROUP BY t1.primary_union_id";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
}

function getLatestDataSheetByCuIdByMonth($cu_ids, $month, $year)
{
	$dbo = getDbHandler();
	$sql = "SELECT t1.id, t1.primary_union_id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $cu_ids) . ") "
		 . "     AND t1.date = (SELECT MAX(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id AND MONTH(t2.date) = :month AND YEAR(t2.date) = :year) GROUP BY t1.primary_union_id";
	$sth = $dbo->prepare($sql);
	$sth->execute(array(':month' => $month, ':year' => $year));
	$fdids = $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
	$sth->execute(array(':month' => $month, ':year' => $year));
	$fcuids = $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 1);
	$fdids1 = array();
	$fdids2 = array();
	
	$missing_ids = array_diff($cu_ids, $fcuids);
	
	if (count($missing_ids) > 0) {
		
		$sql = "SELECT t1.id, t1.primary_union_id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $missing_ids) . ") "
		     . "     AND t1.date = (SELECT MIN(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id AND MONTH(t2.date) > :month AND YEAR(t2.date) = :year) GROUP BY t1.primary_union_id";
		$sth = $dbo->prepare($sql);
		$sth->execute(array(':month' => $month, ':year' => $year));
		
		$fdids1 = $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
		$sth->execute(array(':month' => $month, ':year' => $year));
		$fcuids1 = $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 1);
		
		$missing_ids2 = array_diff($missing_ids, $fcuids1);
		
		if (count($missing_ids2) > 0) {

			$sql = "SELECT t1.id, t1.primary_union_id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $missing_ids) . ") "
					. "     AND t1.date = (SELECT MAX(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id AND MONTH(t2.date) < :month AND YEAR(t2.date) = :year) GROUP BY t1.primary_union_id";
			$sth = $dbo->prepare($sql);
			$sth->execute(array(':month' => $month, ':year' => $year));
			$fdids2 = $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
		}
	}
	return array_merge($fdids, $fdids1, $fdids2);
}

function getLessMemberAggr($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(pu_datasheet_id) AS ncu, area_id, SUM(male) AS male, SUM(female) AS female, SUM(savings) AS savings, SUM(outstanding) AS outstanding, SUM(total_granted) AS total_granted "
		 . "FROM pu_less_member_service "
		 . "WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") "
		 . "GROUP BY area_id ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getMarketAggr($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(M.pu_datasheet_id) AS ncu, m.area_id, SUM(m.farmer) AS farmer, SUM(m.employee) AS employee, SUM(m.microb) AS microb "
	     . "FROM pu_market AS m "
	     . "WHERE m.pu_datasheet_id IN (" . implode(",", $dids) . ") "
	     . "GROUP BY m.area_id ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getReportData($dids)
{
	$db = getDbHandler();
	$sql = "SELECT pug.area_id, pug.gender_id, SUM(pug.total) AS total, SUM(pug.male) AS male, SUM(pug.female) AS female, SUM(pum.farmer) AS farmer, 
					SUM(pum.employee) AS employee, SUM(pum.microb) AS microb, "
		. "         SUM(pua.group1) AS group1, SUM(pua.group2) AS group2, SUM(pua.group3) AS group3, SUM(pua.group4) AS group4, "
		. "         SUM(pulms.male) AS less_male, SUM(pulms.female) AS less_female, pulms.gender_id, 
				    SUM(pulms.savings) AS less_savings, SUM(pulms.savings_us) AS less_savings_us,
					SUM(pulms.outstanding) AS less_outstand, SUM(pulms.outstanding_us) AS less_outstand_us,
					SUM(pulms.total_granted) AS less_totalg, SUM(pulms.total_granted_us) AS less_totalg_us,  
					SUM(pulms.total) AS less_total "
		. "FROM pu_gender AS pug "
		. "LEFT JOIN pu_age AS pua ON pua.area_id = pug.area_id AND pua.gender_id = pug.gender_id AND pua.pu_datasheet_id = pug.pu_datasheet_id "
		. "LEFT JOIN pu_market AS pum ON pum.area_id = pug.area_id AND pum.gender_id = pug.gender_id AND pum.pu_datasheet_id = pug.pu_datasheet_id "
		. "LEFT JOIN pu_less_member_service AS pulms ON pulms.area_id = pug.area_id AND pulms.gender_id = pug.gender_id AND pulms.pu_datasheet_id = pug.pu_datasheet_id "
		. "WHERE pug.pu_datasheet_id IN (" . implode(",", $dids) . ") "
		. "GROUP BY pug.area_id, pug.gender_id ";
	$sth = $db->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getPreviousDataSheetIds($cu_ids)
{
	$dbo = getDbHandler();
	$sql = "SELECT t1.id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $cu_ids) . ") AND t1.date = (SELECT MAX(t3.date) FROM pu_datasheet AS t3 WHERE t3.primary_union_id = t1.primary_union_id AND t3.date < (SELECT MAX(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id)) GROUP BY t1.primary_union_id";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
}

function getPreviousDataSheetIdsByMonth($cu_ids, $month, $year)
{
	$dbo = getDbHandler();
	$sql = "SELECT t1.id FROM pu_datasheet AS t1 WHERE t1.primary_union_id IN (" . implode(',', $cu_ids) . ") AND "
		 . " t1.date = (SELECT MAX(t3.date) FROM pu_datasheet AS t3 WHERE t3.primary_union_id = t1.primary_union_id AND t3.date < "
		 . " (SELECT MAX(t2.date) FROM pu_datasheet AS t2 WHERE t2.primary_union_id = t1.primary_union_id AND MONTH(t2.date) = :month AND YEAR(t2.date) = :year)) GROUP BY t1.primary_union_id";
	$sth = $dbo->prepare($sql);
	$sth->execute(array(':month' => $month, ':year' => $year));
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
}

function getTotalMember($dids)
{
	$db = getDbHandler();
	$sql = "SELECT SUM(pug.total) AS total "
		 . "FROM pu_gender AS pug "
		 . "WHERE pug.pu_datasheet_id IN (" . implode(",", $dids) . ") ";
	$sth = $db->prepare($sql);
	$sth->execute();
	if ($sth->rowCount() == 0) return 0;
	$row = $sth->fetch();
	return $row['total'];
}

function getAggrBlItem($dids, $blid)
{
	$db = getDbHandler();
	$sql = "SELECT balancesheet_id, SUM(amount) AS amount FROM pu_balancesheet WHERE pu_datasheet_id IN (" . implode(",", $dids) .") AND balancesheet_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $blid));
	if ($sth->rowCount() == 0) return 0;
	$row = $sth->fetch();
	return $row['amount'];
}

function getMarketAgeAggr($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(m.pu_datasheet_id) AS ncu, m.area_id, SUM(m.farmer) AS farmer, SUM(m.employee) AS employee, SUM(m.microb) AS microb, SUM(a.group1) AS group1, SUM(a.group2) AS group2, SUM(a.group3) AS group3, SUM(a.group4) AS group4 "
		. "FROM pu_market AS m, pu_age AS a "
		. "WHERE m.pu_datasheet_id = a.pu_datasheet_id AND m.area_id = a.area_id AND m.pu_datasheet_id IN (" . implode(",", $dids) . ") "
		. "GROUP BY m.area_id ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getAgeAggr($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(pu_datasheet_id) AS ncu, area_id, SUM(group1) AS group1, SUM(group2) AS group2, SUM(group3) AS group3, SUM(group4) AS group4  "
		 . "FROM pu_age "
		 . "WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") "
		 . "GROUP BY area_id ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getGenderAggr($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(pu_datasheet_id) AS ncu, area_id, SUM(male) AS male, SUM(female) AS female, SUM(total) AS total "
		 . "FROM pu_gender "
		 . "WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") "
		 . "GROUP BY area_id ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);	 		 
}

function getMemberCountGroup($dids)
{
	$dbo = getDbHandler();
	$sql = "SELECT COUNT(pu_datasheet_id) AS ncu, SUM(IF(total <= 300, 1, 0)) AS s1, SUM(IF(total >= 301 AND total <= 1000, 1, 0)) AS s2, SUM(IF(total >= 1001 AND total <= 3000, 1, 0)) AS s3, SUM(IF(total >= 3001 AND total <= 5000, 1, 0)) AS s4, SUM(IF(total >= 5001, 1, 0)) AS s5 "
		 . "FROM pu_gender "
		 . "WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);		
}

function getBsLines()
{
	$db = getDbHandler();
	$sql = "SELECT b.id, b.name, bg.name AS group_name, bsg.name AS subgroup_name, b.total, b.bold "
			. "FROM balancesheet AS b "
			. "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
					. "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id "
							. " ORDER BY bg.id, bsg.id, b.sort_order ";
	
	$sth = $db->prepare($sql);
	$sth->execute();
	$bslines = $sth->fetchAll();
	return $bslines;
}

function getBalAggr($dids, $period = null, $bl_sheet = null)
{
	$db = getDbHandler();
	$sql = "SELECT b.id, b.name, bg.name AS group_name, bsg.name AS subgroup_name "
			. "FROM balancesheet AS b "
			. "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
					. "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id "
							. " ORDER BY bg.id, bsg.id, b.sort_order ";
	
	$sth = $db->prepare($sql);
	$sth->execute();
	$bslines = $sth->fetchAll();
	
	$sql = "SELECT balancesheet_id, SUM(amount) AS amount, SUM(us_amount) AS us_amount FROM pu_balancesheet WHERE pu_datasheet_id IN (" . implode(",", $dids) .") GROUP BY balancesheet_id ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	if (is_null($bl_sheet)) $bl_sheet = array();
	foreach ($bslines as $blt) {
		if (is_null($period)) {
			$bl_sheet[$blt['id']] = array('amount' => '', 'us_amount' => '');
		} else {
			$bl_sheet[$blt['id']][$period] = array('amount' => '', 'us_amount' => '');
		}
	}
	
	$bl = $sth->fetchAll();
	
	foreach ($bl as $b) {
		if (is_null($period)) {
			$bl_sheet[$b['balancesheet_id']] = array('amount' => $b['amount'], 'us_amount' => $b['us_amount']);
		} else {
			$bl_sheet[$b['balancesheet_id']][$period] = array('amount' => $b['amount'], 'us_amount' => $b['us_amount']);
		}
	}
	
	return $bl_sheet;
}

function getIsLines()
{
	$db = getDbHandler();
	
	//income statement
	$sql = "SELECT i.id, i.name, ig.name AS group_name, isg.name AS subgroup_name, i.total, i.bold "
			. "FROM `is` AS i "
			. "JOIN is_group AS ig ON ig.id = i.group_id "
					. "JOIN is_sub_group AS isg ON isg.id = i.sub_group_id "
							. " ORDER BY ig.id, isg.id, i.sort_order ";
	
	$sth = $db->prepare($sql);
	$sth->execute();
	$islines = $sth->fetchAll();
	
	return $islines;
}

function getIsAggr($dids, $period = null, $is_sheet = null) 
{

	$db = getDbHandler();
	
	//income statement
	$sql = "SELECT i.id, i.name, ig.name AS group_name, isg.name AS subgroup_name "
			. "FROM `is` AS i "
			. "JOIN is_group AS ig ON ig.id = i.group_id "
					. "JOIN is_sub_group AS isg ON isg.id = i.sub_group_id "
							. " ORDER BY ig.id, isg.id, i.sort_order ";
	
	$sth = $db->prepare($sql);
	$sth->execute();
	$islines = $sth->fetchAll();

	//income statement
	$sql = "SELECT is_id, SUM(amount) AS amount, SUM(us_amount) AS us_amount FROM pu_is WHERE pu_datasheet_id IN (" . implode(',', $dids) .") GROUP BY is_id ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	if ($is_sheet === null) $is_sheet = array();
	foreach ($islines as $ist) {
		if (is_null($period)) {
			$is_sheet[$ist['id']] = array('amount' => '', 'us_amount' => '');
		} else {
			$is_sheet[$ist['id']][$period] = array('amount' => '', 'us_amount' => '');
		}
	}
	
	$is = $sth->fetchAll();
	
	foreach ($is as $i) {
		if (is_null($period)) {
			$is_sheet[$i['is_id']] = array('amount' => $i['amount'], 'us_amount' => $i['us_amount']);
		} else {
			$is_sheet[$i['is_id']][$period] = array('amount' => $i['amount'], 'us_amount' => $i['us_amount']);
		}
	}
	
	return $is_sheet;
}

function RunComparisonReport($app, $smarty)
{
	$db = getDbHandler();
	
	$exchange = 0; //$_POST['exchange'];
	
	if ($_POST['federation_id'] != 0) {
			
		if ($_SESSION['user_level'] == 2) {
			$cu_ids = array($_SESSION['user_federation_id']);
		} else {
			$cu_ids = getCuByFedId($_POST['federation_id']);
		}
	} else if ($_POST['country_id'] == 0) {
		$cu_ids = getAllCuIds();
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
	$periods = array(1, 2);
	$group_template = array('total' => 0, 'male' => 0, 'female' => 0, 'farmer' => 0, 'employee' => 0,
			'microb' => 0, 'group1' => 0, 'group2' => 0, 'group3' => 0, 'group4' => 0,
			'less_male' => 0, 'less_female' => 0, 'less_savings' => 0, 'less_outstand' => 0, 'less_totalg' => 0, 'less_total' => 0,
			'less_savings_us' => 0, 'less_outstand_us' => 0, 'less_totalg_us' => 0,);
	$group_template_change = array('total_change' => 0, 'male_change' => 0, 'female_change' => 0, 'farmer_change' => 0, 'employee_change' => 0,
			'microb_change' => 0, 'group1_change' => 0, 'group2_change' => 0, 'group3_change' => 0, 'group4_change' => 0,
			'less_male_change' => 0, 'less_female_change' => 0, 'less_savings_change' => 0, 'less_outstand_change' => 0, 'less_totalg_change' => 0, 'less_total_change' => 0);
	foreach ($area_ids as $id) {
		$oparea[] = $id['area_id'];
		foreach ($genders as $gender_id) {
			$gender_groups[$id['area_id']][$gender_id] = $group_template_change;
			foreach ($periods as $period) {
				$gender_groups[$id['area_id']][$gender_id][$period] = $group_template;
			}
		}
	}
	
	$gtext = array('1' => 'Male', '2' => 'Female');
	$ptext = array('1' => 'Period 1', '2' => 'Period 2');
	
	
	$smarty->assign('gtxt', $gtext);
	$smarty->assign('genders', $genders);
	$smarty->assign('ptext', $ptext);
	$smarty->assign('periods', $periods);
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
	
	if ($_POST['date_type_comp'] == 3) {
		$dids = getLatestDataSheetByCuId($cu_ids);
		$pdids = getPreviousDataSheetIds($cu_ids);
	} else if ($_POST['date_type_comp'] == 0) {
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $_POST['dt_month_to'], $_POST['dt_year_to']);
		$pdids = getLatestDataSheetByCuIdByMonth($cu_ids, $_POST['dt_month_from'], $_POST['dt_year_from']);
		
		$dids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $_POST['dt_month_to'], $_POST['dt_year_to']);
		$pdids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $_POST['dt_month_from'], $_POST['dt_year_from']);
		
	} else if ($_POST['date_type_comp'] == 1) {
		$month_to = 3 * $_POST['dt_quater_to'];
		$month_from = 3 * $_POST['dt_quater_from'];
		
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $month_to, $_POST['dt_year_to']);
		$pdids = getLatestDataSheetByCuIdByMonth($cu_ids, $month_from, $_POST['dt_year_from']);
		
		$dids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $month_to, $_POST['dt_year_to']);
		$pdids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $month_from, $_POST['dt_year_from']);
		
	} else if ($_POST['date_type_comp'] == 2) {
		if (date("Y") > $_POST['dt_year_to']) $month_to = 12;
		else if (date("Y") == $_POST['dt_year_to']) $month_to = date("m");
		if (date("Y") > $_POST['dt_year_from']) $month_from = 12;
		else if (date("Y") == $_POST['dt_year_from']) $month_from = date("m");
		
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $month_to, $_POST['dt_year_to']);
		$pdids = getLatestDataSheetByCuIdByMonth($cu_ids, $month_from, $_POST['dt_year_from']);
		
		$dids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $month_to, $_POST['dt_year_to']);
		$pdids_previous = getPreviousDataSheetIdsByMonth($cu_ids, $month_from, $_POST['dt_year_from']);
		
	}
	
	if (count($dids) == 0 || count($pdids) == 0) {
		$smarty->display('member/nodata.tpl');
		return;
	}
	
	$pu_genders = getReportData($dids);
	$ppu_genders = getReportData($pdids);
	
	$gender_total = $group_template;
	
	foreach ($pu_genders as $pu_gender) {
		$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][2] = $pu_gender;
	}
	
	foreach ($ppu_genders as $pu_gender) {
		$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][1] = $pu_gender;
	}
	
	foreach ($pu_genders as $pu_gender) {
		foreach ($group_template_change as $k => $gt) {
			$p = preg_replace("/_change/", "", $k);
			if ($gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][1][$p] > 0) {
				$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][$k] = (($gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][2][$p] - $gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][1][$p]) / $gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][1][$p]) * 100;
			} else {
				$gender_groups[$pu_gender['area_id']][$pu_gender['gender_id']][$k] = 0;
			}   
		}
	}
	
	
	
	$smarty->assign('gender_groups', $gender_groups);
	
	
	$bl2 = getBalAggr($dids, 2);
	$bl = getBalAggr($pdids, 1, $bl2);
	$is2 = getIsAggr($dids, 2);
	$is = getIsAggr($pdids, 1, $is2);
	
	
	
	$bslines = getBsLines();

	foreach ($bslines as $bsline) {
		if ($bl[$bsline['id']][1]['amount'] > 0) {
			$bl[$bsline['id']]['amount_change'] = (($bl[$bsline['id']][2]['amount'] - $bl[$bsline['id']][1]['amount']) / $bl[$bsline['id']][1]['amount']) * 100;
			$bl[$bsline['id']]['us_amount_change'] = (($bl[$bsline['id']][2]['amount'] - $bl[$bsline['id']][1]['amount']) / $bl[$bsline['id']][1]['amount']) * 100;
		} else {
			$bl[$bsline['id']]['amount_change'] = 0;
			$bl[$bsline['id']]['us_amount_change'] = 0;
		}     
	}
	
	$lslines = getIsLines();
	foreach ($lslines as $isline) {
		if ($is[$isline['id']][1]['amount'] > 0) {
			$is[$isline['id']]['amount_change'] = (($is[$isline['id']][2]['amount'] - $is[$isline['id']][1]['amount']) / $is[$isline['id']][1]['amount']) * 100;
			$is[$isline['id']]['us_amount_change'] = (($is[$isline['id']][2]['amount'] - $is[$isline['id']][1]['amount']) / $is[$isline['id']][1]['amount']) * 100;
		} else {
			$is[$isline['id']]['amount_change'] = 0;
			$is[$isline['id']]['us_amount_change'] = 0;
		}
	}
	
	
	
	$pearls = array();
	if ($bl[18][1]['amount'] == 0) {
		$pearls['P1_p1'] = '0';
	} else {
		$pearls['P1_p1'] = $bl[15][1]['amount'] / $bl[18][1]['amount'] * 100;
	}
	
	if ($bl[18][2]['amount'] == 0) {
		$pearls['P1_p2'] = '0';
	} else {
		$pearls['P1_p2'] = $bl[15][2]['amount'] / $bl[18][2]['amount'] * 100;
	}
	
	if ($pearls['P1_p1'] > 0) {
		$pearls['P1_change'] = (($pearls['P1_p2'] - $pearls['P1_p1']) / $pearls['P1_p1']) * 100;
	} else {
		$pearls['P1_change'] = 0;
	} 
	
	
	if ($bl[19][1]['amount'] == 0) {
		$pearls['P2_p1'] = '0';
	} else {
		$pearls['P2_p1'] = $bl[12][1]['amount'] / $bl[19][1]['amount'] * 100;
	}
	
	if ($bl[19][2]['amount'] == 0) {
		$pearls['P2_p2'] = '0';
	} else {
		$pearls['P2_p2'] = $bl[12][2]['amount'] / $bl[19][2]['amount'] * 100;
	}
	
	if ($pearls['P2_p1'] > 0) {
		$pearls['P2_change'] = (($pearls['P2_p2'] - $pearls['P2_p1']) / $pearls['P2_p1']) * 100;
	} else {
		$pearls['P2_change'] = 0;
	}
	
	if ($bl[28][1]['amount'] == 0) {
		$pearls['E1_p1'] = '0';
		$pearls['E5_p1'] = '0';
		$pearls['E9_p1'] = '0';
		$pearls['A2_p1'] = '0';
	} else {
		$pearls['E1_p1'] = $bl[17][1]['amount'] / $bl[28][1]['amount'] * 100;
		$pearls['E5_p1'] = $bl[31][1]['amount'] / $bl[28][1]['amount'] * 100;
		$pearls['E9_p1'] = $bl[37][1]['amount'] / $bl[28][1]['amount'] * 100;
		$pearls['A2_p1'] = $bl[25][1]['amount'] / $bl[28][1]['amount'] * 100;
	}
	
	if ($bl[28][2]['amount'] == 0) {
		$pearls['E1_p2'] = '0';
		$pearls['E5_p2'] = '0';
		$pearls['E9_p2'] = '0';
		$pearls['A2_p2'] = '0';
	} else {
		$pearls['E1_p2'] = $bl[17][2]['amount'] / $bl[28][2]['amount'] * 100;
		$pearls['E5_p2'] = $bl[31][2]['amount'] / $bl[28][2]['amount'] * 100;
		$pearls['E9_p2'] = $bl[37][2]['amount'] / $bl[28][2]['amount'] * 100;
		$pearls['A2_p2'] = $bl[25][2]['amount'] / $bl[28][2]['amount'] * 100;
	}
	
	if ($pearls['E1_p1'] > 0) {
		$pearls['E1_change'] = (($pearls['E1_p2'] - $pearls['E1_p1']) / $pearls['E1_p1']) * 100;
	} else {
		$pearls['E1_change'] = 0;
	}
	
	if ($pearls['E5_p1'] > 0) {
		$pearls['E5_change'] = (($pearls['E5_p2'] - $pearls['E5_p1']) / $pearls['E5_p1']) * 100;
	} else {
		$pearls['E5_change'] = 0;
	}
	
	if ($pearls['E9_p1'] > 0) {
		$pearls['E9_change'] = (($pearls['E9_p2'] - $pearls['E9_p1']) / $pearls['E9_p1']) * 100;
	} else {
		$pearls['E9_change'] = 0;
	}
	
	if ($pearls['A2_p1'] > 0) {
		$pearls['A2_change'] = (($pearls['A2_p2'] - $pearls['A2_p1']) / $pearls['A2_p1']) * 100;
	} else {
		$pearls['A2_change'] = 0;
	}
	
	
	if ($bl[17][1]['amount'] == 0) {
		$pearls['A1_p1'] = '0';
	} else {
		$pearls['A1_p1'] = $bl[16][1]['amount'] / $bl[17][1]['amount'] * 100;
	}
	
	if ($bl[17][2]['amount'] == 0) {
		$pearls['A1_p2'] = '0';
	} else {
		$pearls['A1_p2'] = $bl[16][2]['amount'] / $bl[17][2]['amount'] * 100;
	}
	
	if ($pearls['A1_p1'] > 0) {
		$pearls['A1_change'] = (($pearls['A1_p2'] - $pearls['A1_p1']) / $pearls['A1_p1']) * 100;
	} else {
		$pearls['A1_change'] = 0;
	}
	
	if (count($pdids_previous) == 0 || getTotalMember($pdids_previous) == 0) {
		$pearls['S10_p1'] = '0';
	} else {
		$pearls['S10_p1'] = getTotalMember($pdids) / getTotalMember($pdids_previous) * 100;
	}
	
	if (count($dids_previous) == 0 || getTotalMember($dids_previous) == 0) {
		$pearls['S10_p2'] = '0';
	} else {
		$pearls['S10_p2'] = getTotalMember($dids) / getTotalMember($dids_previous) * 100;
	}
	
	if ($pearls['S10_p1'] > 0) {
		$pearls['S10_change'] = (($pearls['S10_p2'] - $pearls['S10_p1']) / $pearls['S10_p1']) * 100;
	} else {
		$pearls['S10_change'] = 0;
	}
	
	if (count($pdids_previous) == 0 || getAggrBlItem($pdids_previous, 28) == 0) {
		$pearls['S11_p1'] = '0';
	} else {
		$pearls['S11_p1'] = getAggrBlItem($pdids, 28) / getAggrBlItem($pdids_previous, 28) * 100;
	}
	
	if (count($dids_previous) == 0 || getAggrBlItem($dids_previous, 28) == 0) {
		$pearls['S11_p2'] = '0';
	} else {
		$pearls['S11_p2'] = getAggrBlItem($dids, 28) / getAggrBlItem($dids_previous, 28) * 100;
	}
	
	if ($pearls['S11_p1'] > 0) {
		$pearls['S11_change'] = (($pearls['S11_p2'] - $pearls['S11_p1']) / $pearls['S11_p1']) * 100;
	} else {
		$pearls['S11_change'] = 0;
	}
	
	$smarty->assign('pearls', $pearls); 
	
	$smarty->assign('bsvals', $bl);
	$smarty->assign('isvals', $is);
	$smarty->assign('bslines', $bslines);
	$smarty->assign('islines', getIsLines());
	
	$smarty->assign('group', "");
	$smarty->assign('subgroup', "");
	$smarty->assign('igroup', "");
	$smarty->assign('isubgroup', "");
	
	
	$sql = "SELECT id, name FROM service ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	$services = $sth->fetchAll();
	$smarty->assign('services', $services);
	
	$serval = array();
	foreach ($services as $serv) {
		$serval[$serv['id']] = array('total' => 0, 'total_us' => 0, 'male' => 0, 'male_us' => 0,  'male_ratio' => 0,
				'female' => 0, 'female_us' => 0, 'female_ratio' => 0, 'youth' => 0, 'youth_us' => 0, 'youth_ratio' => 0, 'none_member' => 0, 'none_member_us' => 0,
				'none_member_ratio' => 0);
	}
	
	$sql = "SELECT service_id, SUM(total) AS total, SUM(total_us) AS total_us,
					SUM(male) AS male, SUM(male_us) AS male_us, (SUM(male) / SUM(total)) * 100 AS male_ratio,
					SUM(female) AS female, SUM(female_us) AS female_us, (SUM(female) / SUM(total)) * 100 AS female_ratio,
					SUM(youth) AS youth, SUM(youth_us) AS youth_us, (SUM(youth) / SUM(total)) * 100 AS youth_ratio,
					SUM(none_member) AS none_member, SUM(none_member_us) AS none_member_us, (SUM(none_member) / SUM(total)) * 100 AS none_member_ratio "
			. "FROM pu_service_distribution WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") GROUP BY service_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array());
	
	$ss = $sth->fetchAll();
	foreach ($ss as $s) {
		$serval[$s['service_id']][2] = $s;
	}
	
	$sql = "SELECT service_id, SUM(total) AS total, SUM(total_us) AS total_us,
					SUM(male) AS male, SUM(male_us) AS male_us, (SUM(male) / SUM(total)) * 100 AS male_ratio,
					SUM(female) AS female, SUM(female_us) AS female_us, (SUM(female) / SUM(total)) * 100 AS female_ratio,
					SUM(youth) AS youth, SUM(youth_us) AS youth_us, (SUM(youth) / SUM(total)) * 100 AS youth_ratio,
					SUM(none_member) AS none_member, SUM(none_member_us) AS none_member_us, (SUM(none_member) / SUM(total)) * 100 AS none_member_ratio "
			. "FROM pu_service_distribution WHERE pu_datasheet_id IN (" . implode(",", $pdids) . ") GROUP BY service_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array());
	
	$ss = $sth->fetchAll();
	foreach ($ss as $s) {
		$serval[$s['service_id']][1] = $s;
	}
	
	$s_change = array('total', 'male', 'male_ratio', 'female', 'female_ratio', 'youth', 'youth_ratio', 'none_member', 'none_member_ratio');
	
	foreach ($serval as $sid => $service) {
		foreach ($s_change as $s_val) {
			if ($serval[$sid][1][$s_val] > 0) {
				$serval[$sid][$s_val . '_change'] = (($serval[$sid][2][$s_val] - $serval[$sid][1][$s_val]) / $serval[$sid][1][$s_val]) * 100;
			} else {
				$serval[$sid][$s_val . '_change'] = 0;
			}  
		}
	}
	
	$smarty->assign('serval', $serval);
	
	if(isset($_POST['debug'])) {
		$smarty->display('member/report_debug.tpl');
	} else {
		$smarty->display('member/report_compare.tpl');
	}
}

function RunIndividualReport($app, $smarty)
{
	$db = getDbHandler();
	
	$exchange = 0; //$_POST['exchange'];
	
	if ($_POST['federation_id'] != 0) {
			
		if ($_SESSION['user_level'] == 2) {
			$cu_ids = array($_SESSION['user_federation_id']);
		} else {
			$cu_ids = getCuByFedId($_POST['federation_id']);
		}
	} else if ($_POST['country_id'] == 0) {
		$cu_ids = getAllCuIds();
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
	$group_template = array('total' => 0, 'male' => 0, 'female' => 0, 'farmer' => 0, 'employee' => 0,
			'microb' => 0, 'group1' => 0, 'group2' => 0, 'group3' => 0, 'group4' => 0,
			'less_male' => 0, 'less_female' => 0, 'less_savings_us' => 0, 'less_outstand_us' => 0, 'less_totalg_us' => 0, 'less_total' => 0);
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
	
	if ($_POST['date_type'] == 3) {
		$dids = getLatestDataSheetByCuId($cu_ids);
		$pdids = getPreviousDataSheetIds($cu_ids);
	} else if ($_POST['date_type'] == 0) {
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $_POST['dt_month'], $_POST['dt_year']);
		$pdids = getPreviousDataSheetIdsByMonth($cu_ids, $_POST['dt_month'], $_POST['dt_year']);
	} else if ($_POST['date_type'] == 1) {
		$month = 3 * $_POST['dt_quater'];
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $month, $_POST['dt_year']);
		$pdids = getPreviousDataSheetIdsByMonth($cu_ids, $month, $_POST['dt_year']);
	} else if ($_POST['date_type'] == 2) {
		if (date("Y") > $_POST['dt_year']) $month = 12;
		else if (date("Y") == $_POST['dt_year']) $month = date("m");
		$dids = getLatestDataSheetByCuIdByMonth($cu_ids, $month, $_POST['dt_year']);
		$pdids = getPreviousDataSheetIdsByMonth($cu_ids, $month, $_POST['dt_year']);
	}
	
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
	
	$bl = getBalAggr($dids);
	$is = getIsAggr($dids);
	
	$pearls = array();
	if ($bl[18]['amount'] == 0) {
		$pearls['P1'] = '0';
	} else {
		$pearls['P1'] = $bl[15]['amount'] / $bl[18]['amount'] * 100;
	}
	
	if ($bl[19]['amount'] == 0) {
		$pearls['P2'] = '0';
	} else {
		$pearls['P2'] = $bl[12]['amount'] / $bl[19]['amount'] * 100;
	}
	
	if ($bl[28]['amount'] == 0) {
			
		$pearls['E1'] = '0';
		$pearls['E5'] = '0';
		$pearls['E9'] = '0';
	
		$pearls['A2'] = '0';
			
	} else {
		$pearls['E1'] = $bl[17]['amount'] / $bl[28]['amount'] * 100;
		$pearls['E5'] = $bl[31]['amount'] / $bl[28]['amount'] * 100;
		$pearls['E9'] = $bl[37]['amount'] / $bl[28]['amount'] * 100;
			
		$pearls['A2'] = $bl[25]['amount'] / $bl[28]['amount'] * 100;
	}
	
	if ($bl[17]['amount'] == 0) {
		$pearls['A1'] = '0';
	} else {
		$pearls['A1'] = $bl[16]['amount'] / $bl[17]['amount'] * 100;
	}
	
	
	if (count($pdids) == 0 || getTotalMember($pdids) == 0) {
		$pearls['S10'] = '0';
	} else {
		$pearls['S10'] = getTotalMember($dids) / getTotalMember($pdids) * 100;
	}
	
	if (count($pdids) == 0 || getAggrBlItem($pdids, 28) == 0) {
		$pearls['S11'] = '0';
	} else {
		$pearls['S11'] = getAggrBlItem($dids, 28) / getAggrBlItem($pdids, 28) * 100;
	}
	
	$smarty->assign('pearls', $pearls);
	
	$smarty->assign('bsvals', $bl);
	$smarty->assign('isvals', $is);
	$smarty->assign('bslines', getBsLines());
	$smarty->assign('islines', getIsLines());
	
	$smarty->assign('group', "");
	$smarty->assign('subgroup', "");
	$smarty->assign('igroup', "");
	$smarty->assign('isubgroup', "");
	
	
	$sql = "SELECT id, name FROM service ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	$services = $sth->fetchAll();
	$smarty->assign('services', $services);
	
	$serval = array();
	foreach ($services as $serv) {
		$serval[$serv['id']] = array('total' => 0, 'male' => 0, 'total_us' => 0, 'male_us' => 0, 'male_ratio' => 0,
				'female' => 0, 'female_us' => 0, 'female_ratio' => 0, 'youth' => 0, 'youth_us' => 0, 'youth_ratio' => 0, 
				'none_member' => 0, 'none_member_us' => 0,
				'none_member_ratio' => 0);
	}
	
	$sql = "SELECT service_id, SUM(total) AS total, SUM(total_us) AS total_us,
					SUM(male) AS male, SUM(male_us) AS male_us, (SUM(male) / SUM(total)) * 100 AS male_ratio,
					SUM(female) AS female, SUM(female_us) AS female_us, (SUM(female) / SUM(total)) * 100 AS female_ratio,
					SUM(youth) AS youth, SUM(youth_us) AS youth_us, (SUM(youth) / SUM(total)) * 100 AS youth_ratio,
					SUM(none_member) AS none_member, SUM(none_member_us) AS none_member_us, (SUM(none_member) / SUM(total)) * 100 AS none_member_ratio "
			. "FROM pu_service_distribution WHERE pu_datasheet_id IN (" . implode(",", $dids) . ") GROUP BY service_id ";
	$sth = $db->prepare($sql);
	$sth->execute(array());
	
	$ss = $sth->fetchAll();
	foreach ($ss as $s) {
		$serval[$s['service_id']] = $s;
	}
	
	$smarty->assign('serval', $serval);
	
	if(isset($_POST['debug'])) {
		$smarty->display('member/report_debug.tpl');
	} else {
		$smarty->display('member/report.tpl');
	}	
}