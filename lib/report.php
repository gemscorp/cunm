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

