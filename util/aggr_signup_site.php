<?php 

date_default_timezone_set('Asia/Bangkok');

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$pdo = new PDO("mysql:host=192.168.1.203;dbname=bot", "bot", "bot", $options);

$sql = "SELECT id, name FROM sites WHERE status = 'true' ";

$sth = $pdo->prepare($sql);
$sth->execute();

$sites = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($sites as $site) {

	if ($site['name'] == 'single') $site['name'] = 'single.de';
	if ($site['name'] == 'spin') $site['name'] = 'spin.de';
	if ($site['name'] == 'gay') $site['name'] = 'gay.de'; //wieich
	if ($site['name'] == 'wieich') $site['name'] = 'wie-ich'; //wieich
	
	flog(sprintf("Checking %s", $site['name']));
	
	$start = date("Y-m-d", strtotime("-2 day"));
	
	do {
		
		flog(sprintf("Trying site %s on date %s", $site['name'], $start));
		
		$json = json_decode(file_get_contents("http://status.cklerz.com/api/site/" . $site['name'] . "/" . $start));
		
		$sql = "SELECT id FROM signup_site_date WHERE site_id = :id AND report_date = :date ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':id' => $site['id'], ':date' => $start));
		
		if ($sth->rowCount() == 0) {
			$sql = "INSERT INTO signup_site_date (site_id, report_date, count) VALUES (:id, :date, :count) ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':id' => $site['id'], ':date' => $start, ':count' => $json->cnt));
		} else {
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			$sql = "UPDATE signup_site_date SET count = :count WHERE id = :id ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':count' => $json->cnt, ':id' => $row['id']));
		}

		$start = date("Y-m-d", strtotime($start) + (60 * 60 * 24));
		
	} while (strtotime("now") > strtotime($start));
}

function flog($log) 
{
	$time=date("Y-m-d H:i:s");
	printf("[%s] - %s\n", $time, $log);
}