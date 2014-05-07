<?php 

date_default_timezone_set('Asia/Bangkok');

$start = date("Y-m-d", strtotime("-14 day"));

do {
	
	$finish = $start;
	
	getSignupStats($start, $finish);
	
	$start = date("Y-m-d", strtotime($start) + (60 * 60 * 24));
	
} while (strtotime("now") > strtotime($start));



function getSignupStats($start = null, $finish = null) {

	
	flog(sprintf("Start %s to %s", $start, $finish));
	
	$pdo = new PDO("mysql:host=192.168.1.203;dbname=bot", "bot", "bot");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "SELECT * FROM server AS s WHERE s.provID IN (778,779) ORDER BY s.ID ASC";
	$sth = $pdo->prepare($sql);
	
	$sth->execute();
	
	$servers = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	$fromdate = $start;
	$todate = $finish;
	
	if ($start == null) {
		$fromdate = date("Y-m-d", strtotime("-1 day"));
		$todate = date("Y-m-d");
	}
	
	foreach ($servers as $server) {
		try
		{
			$client = new SoapClient(null, array('location' => $server['profile_url'], 'uri' => "urn://kontaktmarkt"));
			$statisticsResult = $client->getCountStatistics(array('fromdate' => $fromdate, 'todate' => $todate));
			
			if (!isset($statisticsResult['refSignups'])) {
				$statisticsResult['refSignups'] = 0;
				$statisticsResult['refSignupsPayment'] = 0;
				$statisticsResult['refSignupsPaymentAttempt'] = 0;
				$statisticsResult['refSignupsPaymentCount'] = 0;
				$statisticsResult['refSignupsPaymentAttemptCount'] = 0;
				$statisticsResult['newMobileTotal'] = 0;
				$statisticsResult['newMobileActive'] = 0;
			} else {
				//print_r($statisticsResult);
			}

			if (isset($statisticsResult['refSignupsPayment']) && is_null($statisticsResult['refSignupsPayment'])) $statisticsResult['refSignupsPayment'] = 0;
			if (isset($statisticsResult['refSignupsPaymentAttempt']) && is_null($statisticsResult['refSignupsPaymentAttempt'])) $statisticsResult['refSignupsPaymentAttempt'] = 0;
			if (isset($statisticsResult['refSignupsPaymentCount']) && is_null($statisticsResult['refSignupsPaymentCount'])) $statisticsResult['refSignupsPaymentCount'] = 0;
			if (isset($statisticsResult['refSignupsPaymentAttemptCount']) && is_null($statisticsResult['refSignupsPaymentAttemptCount'])) $statisticsResult['refSignupsPaymentAttemptCount'] = 0;
			if (isset($statisticsResult['newMobileTotal']) && is_null($statisticsResult['newMobileTotal'])) $statisticsResult['newMobileTotal'] = 0;
			if (isset($statisticsResult['newMobileActive']) && is_null($statisticsResult['newMobileActive'])) $statisticsResult['newMobileActive'] = 0;

			

			$sql = "SELECT * FROM signup WHERE portal_id = :portal_id AND report_date = :report_date ";
			$sth = $pdo->prepare($sql);
			$sth->execute(array(':portal_id' => $server['ID'], ':report_date' => $fromdate));
			
			if ($sth->rowCount() == 0) {
			
				$sql = "INSERT INTO signup (portal_id, report_date, member_count, member_active, payment, currency, ref, ref_payment, ref_payment_attempt, ref_payment_count, ref_payment_attempt_count, mobile_count, mobile_active) "
				     . " VALUES (:portal_id, :report_date, :member_count, :member_active, :payment, :currency, :ref, 
					:ref_payment, :ref_payment_attempt, :ref_payment_count, :ref_payment_attempt_count, :mobile_count, :mobile_active) ";
				$sth = $pdo->prepare($sql);
				try {	
					$sth->execute(array(':portal_id' => $server['ID'], ':report_date' => $fromdate, ':member_count' => $statisticsResult['newMemberTotal'], 
							':member_active' => $statisticsResult['newMemberActive'], ':payment' => $statisticsResult['newPaymentTotalAmount'], ':currency' => $statisticsResult['currency'], 
							':ref' => $statisticsResult['refSignups'], ':ref_payment' => $statisticsResult['refSignupsPayment'], 
							':ref_payment_attempt' => $statisticsResult['refSignupsPaymentAttempt'], 
							':ref_payment_count' => $statisticsResult['refSignupsPaymentCount'], 
							':ref_payment_attempt_count' => $statisticsResult['refSignupsPaymentAttemptCount'], 
							':mobile_count' => $statisticsResult['newMobileTotal'], 
							':mobile_active' => $statisticsResult['newMobileActive']));
				} catch (Exception $e) {
					echo $e->getMessage();
					print_r($statisticsResult);
				}
			
			} else {
				
				$row = $sth->fetch(PDO::FETCH_ASSOC);
				
				$sql = "UPDATE signup SET member_count = :member_count, member_active = :member_active, 
					payment = :payment, ref = :ref, 
					ref_payment = :ref_payment, 
					ref_payment_attempt = :ref_payment_attempt,
					ref_payment_count = :ref_payment_count, 
					ref_payment_attempt_count = :ref_payment_attempt_count,
					mobile_count = :mobile_count,
					mobile_active = :mobile_active "
				  . "WHERE id = :id ";
				$sth = $pdo->prepare($sql);
				$sth->execute(array(':member_count' => $statisticsResult['newMemberTotal'], 
						':member_active' => $statisticsResult['newMemberActive'], 
						':payment' => $statisticsResult['newPaymentTotalAmount'], 
						':ref' => $statisticsResult['refSignups'], 
						':ref_payment' => $statisticsResult['refSignupsPayment'], 
						':ref_payment_attempt' => $statisticsResult['refSignupsPaymentAttempt'], 
						':ref_payment_count' => $statisticsResult['refSignupsPaymentCount'],
						':ref_payment_attempt_count' => $statisticsResult['refSignupsPaymentAttemptCount'],
						':mobile_count' => $statisticsResult['newMobileTotal'],
						':mobile_active' => $statisticsResult['newMobileActive'],
						':id' => $row['id']));
				
			}
		}
		catch (SoapFault $e)
		{
			$statisticsResult = array();
			echo $val['info']." error.<br/>";
		}
	}
}

function flog($log) 
{
	$time=date("Y-m-d H:i:s");
	printf("[%s] - %s\n", $time, $log);
}
