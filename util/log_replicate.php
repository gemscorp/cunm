<?php 

date_default_timezone_set('Asia/Bangkok');

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$pdo = new PDO("mysql:host=192.168.1.203;dbname=bot", "bot", "bot", $options);

	
$start = date("Y-m-d", strtotime("-2 day"));
	
do {

	$tstart = urlencode($start . " 00:00:00");
	$tend = urlencode($start . " 23:59:59");
	
	$json = json_decode(file_get_contents("http://www.haallo.net/log/" . $tstart . "/" . $tend), true);

	foreach ($json as $row) {
		
		$sql = "SELECT id FROM log WHERE id = :id";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':id' => $row['id']));
		
		if ($sth->rowCount() == 0) {
			$sql = "INSERT INTO log (id, ip, browser, cookie, host, created_date) VALUES (:id, :ip, :browser, :cookie, :host, :created_date) ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':id' => $row['id'], ':ip' => $row['ip'], ':browser' => $row['browser'], ':cookie' => $row['cookie'], ':host' => $row['host'], ':created_date' => $row['created_date']));
		} 
	}
	
	$start = date("Y-m-d", strtotime($start) + (60 * 60 * 24));
		
} while (strtotime("now") > strtotime($start));

function flog($log) 
{
	$time=date("Y-m-d H:i:s");
	printf("[%s] - %s\n", $time, $log);
}