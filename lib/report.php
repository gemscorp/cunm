<?php 

function getCuByFedId($federation_id = 0)
{
	$dbo = getDbHandler();
	$sql = "SELECT id FROM primary_union WHERE federation_id = :id ";
	
	$sth = $dbo->prepare($sql);
	$sth->execute(array(':id' => $federation_id));
	
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
	$sql = "SELECT id FROM pu_datasheet WHERE primary_union_id IN (" . implode(',', $cu_ids) . ") GROUP BY primary_union_id ORDER BY `date` DESC ";
	$sth = $dbo->prepare($sql);
	$sth->execute();
	
	return $sth->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_NUM, 0);
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
	$sql = "SELECT b.id, b.name, bg.name AS group_name, bsg.name AS subgroup_name "
			. "FROM balancesheet AS b "
			. "JOIN balancesheet_group AS bg ON bg.id = b.group_id "
					. "JOIN balancesheet_sub_group AS bsg ON bsg.id = b.sub_group_id "
							. " ORDER BY bg.id, bsg.id, b.sort_order ";
	
	$sth = $db->prepare($sql);
	$sth->execute();
	$bslines = $sth->fetchAll();
	return $bslines;
}

function getBalAggr($dids)
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
	
	$sql = "SELECT balancesheet_id, SUM(amount) AS amount FROM pu_balancesheet WHERE pu_datasheet_id IN (" . implode(",", $dids) .") ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	$bl_sheet = array();
	foreach ($bslines as $blt) {
		$bl_sheet[$blt['id']] = array('amount' => '');
	}
	
	$bl = $sth->fetchAll();
	
	foreach ($bl as $b) {
		$bl_sheet[$b['balancesheet_id']] = array('amount' => $b['amount']);
	}
	
	return $bl_sheet;
}

function getIsLines()
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
	
	return $islines;
}

function getIsAggr($dids) 
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
	$sql = "SELECT is_id, SUM(amount) AS amount FROM pu_is WHERE pu_datasheet_id IN (" . implode(',', $dids) .") ";
	$sth = $db->prepare($sql);
	$sth->execute();
	
	$is_sheet = array();
	foreach ($islines as $ist) {
		$is_sheet[$ist['id']] = array('amount' => '');
	}
	
	$is = $sth->fetchAll();
	
	foreach ($is as $i) {
		$is_sheet[$i['is_id']] = array('amount' => $i['amount']);
	}
	
	return $is_sheet;
}