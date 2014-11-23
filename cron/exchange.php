<?php 

require_once '../db.php';

$json = json_decode(file_get_contents("http://openexchangerates.org/api/latest.json?app_id=3a73e685199048c6a7f28d5d30371b24"), true);

$db = getDbHandler();

$sql = "SELECT primary_union_id FROM pu_datasheet GROUP BY primary_union_id ";
$sth = $db->prepare($sql);
$sth->execute();

$ds = $sth->fetchAll();
$updates = array();

foreach ($ds as $d) {
	
	$cur = getCurrency($d['primary_union_id']);
	
	if (!isset($json['rates'][$cur])) continue;
	
	$rate = $json['rates'][$cur];
	if (!in_array($cur, $updates)) {
		setCurrency($cur, $rate);
		$updates[] = $cur;
	}
	
	$sql = "UPDATE pu_balancesheet SET us_amount = (amount / $rate) WHERE primary_union_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $d['primary_union_id']));
	
	$sql = "UPDATE pu_is SET us_amount = (amount / $rate) WHERE primary_union_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $d['primary_union_id']));
	
	$sql = "UPDATE pu_less_member_service SET 
				savings_us = (savings / $rate), 
				outstanding_us = (outstanding / $rate),
				total_granted_us = (total_granted / $rate)
			 WHERE primary_union_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $d['primary_union_id']));
	
	$sql = "UPDATE pu_service_distribution SET
	total_us = (total / $rate),
	male_us = (male / $rate),
	female_us = (female / $rate),
	youth_us = (youth / $rate),
	none_member_us = (none_member / $rate)
	WHERE primary_union_id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $d['primary_union_id']));
}

function setCurrency($cur, $rate)
{
	$db = getDbHandler();
	$sql = "UPDATE country SET exchange_rate = :exchange_rate WHERE currency = :currency";
	$sth = $db->prepare($sql);
	$sth->execute(array(':exchange_rate' => $rate, ':currency' => $cur));

	return true;
}

function getCurrency($primary_union_id)
{
	$db = getDbHandler();
	$sql = "SELECT c.currency "
	     . "FROM primary_union AS p "
	     . "LEFT JOIN federation AS f ON p.federation_id = f.id "
	     . "LEFT JOIN country AS c ON c.id = f.country_id "
	     . "WHERE p.id = :id ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':id' => $primary_union_id));
	
	return $sth->fetch(PDO::FETCH_COLUMN  | PDO::FETCH_NUM, 0);
}
