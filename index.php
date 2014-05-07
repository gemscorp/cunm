<?php

session_start();
require_once('config.php');
require_once 'vendor/autoload.php';
require_once('db.php');
require_once('smarty3/Smarty.class.php');

date_default_timezone_set('Asia/Bangkok');

$app = new \Slim\Slim();

$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setConfigDir('configs/');
$smarty->setCacheDir('cache/');

$app->get('/ping', function () use ($app, $smarty) {
	echo "pong";
});

$app->get('/', function () use ($app, $smarty) {
	
	if (isset($_SESSION['user_id'])) {
		$app->redirect('/bot/op/dashboard');
		return;
	}
	
	$error = "";
	
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	$smarty->assign('error', $error);
	
	$smarty->display('home.tpl');
});

$app->post('/login', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, user_type FROM user WHERE username = :username AND password = PASSWORD(:password) AND status = 1";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));
	
	if ($sth->rowCount() == 0) {
		
		$_SESSION['error'] = 'Invalid Username or Password';
		
		$app->redirect('.');
		return;
	}
	
	$user = $sth->fetch();
	
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['user_level'] = $user['user_type'];
	
	$sql = "UPDATE user SET lastlogin = NOW() WHERE id = :id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':id' => $user['id']));
	
	if ($_SESSION['user_level'] == 3) {
		$app->redirect('/bot/op/mandashboard');
	} else {
		$app->redirect('/bot/op/dashboard');
	}
});

if (isset($_SESSION['user_id'])) {
	require_once "auth.php";
}

$app->notFound(function () use ($app) {
	$app->redirect("/bot/op");
});

$app->run();

function getTotalProfiles($user_id, $start, $finish)
{
	$pdo = getDbHandler();
	
	$sql = "SELECT COUNT(*) AS cnt FROM user_profiles WHERE profiler_id = :user_id ";
	
	if ($start !== null) {
		$sql .= " AND created_datetime BETWEEN :start AND :finish ";
	}
	
	$sth = $pdo->prepare($sql);
	if ($start === null) {
		$sth->execute(array(':user_id' => $user_id));
	} else {
		$sth->execute(array(':user_id' => $user_id, ':start' => $start . " 00:00:00", ':finish' => $finish . ' 23:59:59'));
	}
	
	$row = $sth->fetch();
	
	return $row['cnt'];
}

function getProfileHealthBySite($user_id, $start, $finish)
{
	$pdo = getDbHandler();
	
	$sql = "SELECT site_id, COUNT(*) AS cnt, SUM(IF(login_count=0,1,0)) AS bad FROM user_profiles WHERE profiler_id = :user_id ";
	
	if ($start !== null) {
		$sql .= " AND created_datetime BETWEEN :start AND :finish ";
	}
	
	$sql .= " GROUP BY site_id ";
	
	$sth = $pdo->prepare($sql);
	
	if ($start === null) {
		$sth->execute(array(':user_id' => $user_id));
	} else {
		$sth->execute(array(':user_id' => $user_id, ':start' => $start . " 00:00:00", ':finish' => $finish . ' 23:59:59'));
	}
	
	$rows = $sth->fetchAll();
	
	$user = array();
	
	$sql = "SELECT id, name, profile_req FROM sites WHERE status = 'true' ORDER BY name ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	$sites = $sth->fetchAll();
	
	foreach ($sites as $site) {
		$user['all_' . $site['id']] = 0;
		$user['bad_' . $site['id']] = 0;
		$user['percent_' . $site['id']] = 0;
	}
		
	foreach ($rows as $row) {
		$user['all_' . $row['site_id']] = $row['cnt'];
		$user['bad_' . $row['site_id']] = $row['bad'];
		$user['percent_' . $row['site_id']] = $user['bad_' . $row['site_id']] / $user['all_' . $row['site_id']] * 100;  
	}
	
	return $user;
}

function getProfilesBad($user_id, $start, $finish)
{
	$pdo = getDbHandler();
	
	$sql = "SELECT COUNT(*) AS cnt FROM user_profiles WHERE profiler_id = :user_id AND login_count = 0 ";
	
	if ($start !== null) {
		$sql .= " AND created_datetime BETWEEN :start AND :finish ";
	}
	
	$sth = $pdo->prepare($sql);
	
	if ($start === null) {
		$sth->execute(array(':user_id' => $user_id));
	} else {
		$sth->execute(array(':user_id' => $user_id, ':start' => $start . " 00:00:00", ':finish' => $finish . ' 23:59:59'));
	}
	
	$row = $sth->fetch();
	
	return $row['cnt'];
}

function setSiteQuota($site_id, $user_id, $quota)
{
	$pdo = getDbHandler();

	$sql = "SELECT quota FROM user_quota WHERE site_id = :site_id AND user_id = :user_id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id));

	if ($sth->rowCount() == 0) {
		$sql = "INSERT INTO user_quota (site_id, user_id, quota) VALUES (:site_id, :user_id, :quota) ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':quota' => $quota));	
	} else {
		$sql = "UPDATE user_quota SET quota = :quota WHERE site_id = :site_id AND user_id = :user_id ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':quota' => $quota));
	}

	$pdo = null;
	
	return true;	
}

function setSiteQuotaDay($site_id, $user_id, $day, $quota)
{
	$pdo = getDbHandler();

	$sql = "SELECT quota FROM user_quota_day WHERE site_id = :site_id AND user_id = :user_id AND quota_date = :quota_date ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':quota_date' => $day));

	if ($sth->rowCount() == 0) {
		$sql = "INSERT INTO user_quota_day (site_id, user_id, quota_date, quota) VALUES (:site_id, :user_id, :quota_date, :quota) ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':quota_date' => $day, ':quota' => $quota));
	} else {
		$sql = "UPDATE user_quota_day SET quota = :quota WHERE site_id = :site_id AND user_id = :user_id AND quota_date = :quota_date ";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':quota' => $quota, ':quota_date' => $day));
	}

	$pdo = null;
	
	return true;
}


function getSiteQuota($site_id, $user_id)
{
	$pdo = getDbHandler();

	$sql = "SELECT quota FROM user_quota WHERE site_id = :site_id AND user_id = :user_id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id));

	if ($sth->rowCount() == 0) return 0;

	$row = $sth->fetch();
	
	$pdo = null;

	return $row['quota'];
}

function getDailyOverride($site_id, $user_id, $day = null)
{
	$pdo = getDbHandler();
	
	if (is_null($day)) {
		$day = date("Y-m-d");
	}
	
	$sql = "SELECT quota FROM user_quota_day WHERE site_id = :site_id AND user_id = :user_id AND quota_date = :date ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':date' => $day));
	
	if ($sth->rowCount() == 0) return 0;
	
	$row = $sth->fetch();
	
	$pdo = null;
	
	return $row['quota'];
}

function isDailyQuotaMet($user_id, $day = null)
{
	$pdo = getDbHandler();
	
	if (is_null($day)) {
		$day = date("Y-m-d");
	}	
	
	$sql = "SELECT uq.user_id, SUM(uq.quota) AS quota, SUM(IF(uqd.quota = 0, uq.quota, uqd.quota)) AS total "
	     . "FROM user_quota AS uq "
	     . "LEFT JOIN user_quota_day AS uqd ON uqd.site_id = uq.site_id AND uq.user_id = uqd.user_id AND uqd.quota_date = :date "
	     . "WHERE uq.user_id = :user_id ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':date' => $day));
	$quota = $sth->fetch();
	
	$sql = "SELECT COUNT(*) AS cnt FROM user_profiles WHERE profiler_id = :user_id AND DATE(created_datetime) = :date ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':date' => $day));
	$created = $sth->fetch();
	
	$pdo = null;
	
	if (is_null($quota['total'])) {
		if ($quota['quota'] <= $created['cnt']) {
			return true;
		} else {
			return false;
		}
	}
	
	if ($quota['total'] <= $created['cnt']) {
		return true;
	}
	
	return false;
}

function getDailyCreated($site_id, $user_id, $day = null)
{
	$pdo = getDbHandler();
	
	if (is_null($day)) {
		$day = date("Y-m-d");
	}
	
	$sql = "SELECT COUNT(*) AS cnt FROM user_profiles WHERE site_id = :site_id AND profiler_id = :user_id AND DATE(created_datetime) = :date ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':user_id' => $user_id, ':site_id' => $site_id, ':date' => $day));
	
	if ($sth->rowCount() == 0) return 0;
	
	$row = $sth->fetch();
	
	$pdo = null;
	
	return $row['cnt'];
}

function getSiteUserNote($site_id, $user_id, $note_date = null)
{
	if ($note_date === null) $note_date = date("Y-m-d");
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, note FROM user_sitenote WHERE site_id = :site_id AND user_id = :user_id AND note_date = :note_date ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':site_id' => $site_id, ':user_id' => $user_id, ':note_date' => $note_date));
	
	if ($sth->rowCount() == 0) {
		return null;
	}
	
	$row = $sth->fetch();
	
	$pdo = null;
	
	return $row;
}

function getSitesList()
{
	$pdo = getDbHandler();
	
	$sql = "SELECT id, name FROM sites WHERE status = 'true' ";
	$sth = $pdo->prepare($sql);
	$sth->execute();
	
	$sites = $sth->fetchAll();
	
	$site_list = array();
	
	foreach ($sites as $site) {
		$site_list[$site['id']] = $site['name'];
	}
	
	$pdo = null;
	
	return $site_list;
}