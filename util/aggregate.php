<?php 

date_default_timezone_set('Asia/Bangkok');

$pdo = new PDO("mysql:host=192.168.1.203;dbname=bot", "bot", "bot");

$sql = "SELECT id, name FROM sites WHERE status = 'true' ";

$sth = $pdo->prepare($sql);
$sth->execute();

$sites = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($sites as $site) {

	flog(sprintf("Checking %s", $site['name']));
	
	$tableName = $site['name'] . "_sent_messages";
	
	//check if site has message table
	if ($pdo->query("SHOW TABLES LIKE '" . $tableName . "'")->rowCount() != 1) {
		flog(sprintf("Message table not found for %s site.", $site['name']));
		continue;
	}
	
	//check the last counter in our transaction table
	$sql = "SELECT MAX(local_id) AS max_id FROM sent_message WHERE site_id = :site_id";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':site_id' => $site['id']));
	
	$local = $sth->fetch(PDO::FETCH_ASSOC);
	
	$sql = "SELECT id AS local_id, sent_datetime FROM " . $tableName;
	
	if ($local['max_id'] != null) {
		flog(sprintf("Found previous records for site %s", $site['name']));
		$sql .= " WHERE id > " . $local['max_id'];
	}
	
	$sth = $pdo->prepare($sql);
	$sth->execute();
	
	flog(sprintf("Found %d record(s) for site %s", $sth->rowCount(), $site['name']));
	
	$messages = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($messages as $message) {
		$sql = "INSERT INTO sent_message (site_id, local_id, sent_time) VALUES (:site_id, :local_id, :sent_time) ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':site_id' => $site['id'], ':local_id' => $message['local_id'], ':sent_time' => $message['sent_datetime']));	
	}	
}

flog(sprintf("Transaction table updated"));

$sql = "SELECT MAX(DATE(sent_time)) AS last_sent_date, MIN(DATE(sent_time)) AS first_sent_date FROM sent_message";
$sth = $pdo->prepare($sql);
$sth->execute();

$dates = $sth->fetch(PDO::FETCH_ASSOC);

$start_date = strtotime(date("Y-m-d 00:00:00", strtotime($dates['first_sent_date'])));

$start_date = strtotime(date("Y-m-d 00:00:00", strtotime("-1 day")));

$end_date = strtotime(date("Y-m-d 23:59:59", strtotime($dates['last_sent_date'])));

$days = array();

$current_date = $start_date;

flog(sprintf("Start Date is %s and End Date is %s", date("Y-m-d H:i:s", $start_date), date("Y-m-d H:i:s", $end_date)));

do {
		
	if (!isset($days[date("Y-m-d", $current_date)])) {
		
		flog(sprintf("Adding date aggregate for %s ", date("Y-m-d", $current_date)));
		$days[date("Y-m-d", $current_date)] = 1;
		
		$sql = "SELECT COUNT(*) AS message_count, site_id FROM sent_message WHERE sent_time BETWEEN :start AND :finish GROUP BY site_id ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':start' => date("Y-m-d 00:00:00", $current_date), ':finish' => date("Y-m-d 23:59:59", $current_date)));

		flog(sprintf("Found %d record(s)", $sth->rowCount()));
		$date_rows = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($date_rows as $date_row) {
			
			$sql = "SELECT id FROM sent_message_date WHERE site_id = :site_id AND report_date = :report_date ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':site_id' => $date_row['site_id'], ':report_date' => date("Y-m-d", $current_date)));
			
			if ($sth->rowCount() == 0) {			
				$sql = "INSERT INTO sent_message_date (site_id, report_date, count) VALUES (:site_id, :report_date, :count) ";
				$sth = $pdo->prepare($sql);
				$sth->execute(array(':site_id' => $date_row['site_id'], ':report_date' => date("Y-m-d", $current_date), ':count' => $date_row['message_count']));
			} else {
				$drow = $sth->fetch(PDO::FETCH_ASSOC);
				$sql = "UPDATE sent_message_date SET count = :count WHERE id = :id ";
				$sth = $pdo->prepare($sql);
				$sth->execute(array(':count' => $date_row['message_count'], ':id' => $drow['id']));
			}
		}
	}
	
	$next_hour = $current_date + 3600;
	
	flog(sprintf("Calculating hourly records between %s to %s", date("Y-m-d H:i:s", $current_date), date("Y-m-d H:i:s", $next_hour)));
	
	$sql = "SELECT COUNT(*) AS message_count, site_id FROM sent_message WHERE sent_time BETWEEN :start AND :finish GROUP BY site_id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':start' => date("Y-m-d H:i:s", $current_date), ':finish' => date("Y-m-d H:i:s", $next_hour)));
	
	$date_rows = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($date_rows as $date_row) {
		
		$sql = "SELECT id FROM sent_message_hour WHERE site_id = :site_id AND report_date = :report_date AND hour = :hour";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':site_id' => $date_row['site_id'], ':report_date' => date("Y-m-d", $current_date), ':hour' => date("H", $current_date)));
		
		if ($sth->rowCount() == 0) {
			$sql = "INSERT INTO sent_message_hour (site_id, report_date, hour, count) VALUES (:site_id, :report_date, :hour, :count) ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':site_id' => $date_row['site_id'], ':report_date' => date("Y-m-d", $current_date), ':hour' => date("H", $current_date), ':count' => $date_row['message_count']));
		} else {
			$drow = $sth->fetch(PDO::FETCH_ASSOC);
			$sql = "UPDATE sent_message_hour SET count = :count WHERE id = :id ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':count' => $date_row['message_count'], ':id' => $drow['id']));
		}
	}
	
	$current_date = $next_hour;
	
} while ($current_date <= $end_date);




function flog($log) 
{
	$time=date("Y-m-d H:i:s");
	printf("[%s] - %s\n", $time, $log);
}