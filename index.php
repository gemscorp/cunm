<?php

session_start();

require_once('config.php');
require_once 'vendor/autoload.php';
require_once('db.php');
require_once('smarty3/Smarty.class.php');

date_default_timezone_set('Asia/Bangkok');

$app = new \Slim\Slim();

//$app->config('debug', false);
$app->config('mode', 'production');

$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setConfigDir('configs/');
$smarty->setCacheDir('cache/');

$error = getErrorMessage();
$smarty->assign('error', $error);

$success = getSuccessMessage();
$smarty->assign('success', $success);

$app->get('/ping', function () use ($app, $smarty) {
	echo "pong";
});

$app->get('/', function () use ($app, $smarty) {
	
	if (isset($_SESSION['user_id'])) {
		$app->redirect(APP_PATH . '/dashboard');
		return;
	}
	
	$smarty->display('home.tpl');
});

$app->post('/login', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT id, email, level, federation_id, country_id, primary_union_id FROM user WHERE email = :username AND password = PASSWORD(:password) AND status = 1";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));
	
	if ($sth->rowCount() == 0) {
		
		setErrorMessage("Invalid Username or Password");
		$app->redirect(APP_PATH . '/');
		return;
	}
	
	$user = $sth->fetch();
	
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['user_email'] = $user['email'];
	$_SESSION['user_level'] = (int) $user['level'];
	$_SESSION['user_federation_id'] = $user['federation_id'];
	$_SESSION['user_country_id'] = $user['country_id'];
	$_SESSION['user_primary_union_id'] = $user['primary_union_id'];
	
	$sql = "UPDATE user SET lastlogin = NOW() WHERE id = :id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':id' => $user['id']));
	
	if ($_SESSION['user_level'] === 0) {
		$app->redirect(APP_PATH . '/mandashboard');
	} else {
		$app->redirect(APP_PATH . '/dashboard');
	}
});

if (isset($_SESSION['user_id'])) {
	require_once "auth.php";
}

$app->notFound(function () use ($app) {
	$app->redirect(APP_PATH . "/");
});

$app->run();

function getErrorMessage()
{
	return getSessionMessage('error_message');
}

function getSuccessMessage()
{
	return getSessionMessage('success_message');
}

function setSuccessMessage($message)
{
	setSessionMessage('success_message', $message);
}

function setErrorMessage($message)
{
	setSessionMessage('error_message', $message);
}

function setSessionMessage($key, $value)
{
	$_SESSION[$key] = $value;
}

function clearSessionMessages(){
	$labels = array('error_message', 'success_message');
	foreach ($labels as $l) {
		if (isset($_SESSION[$l])) unset($_SESSION[$l]);
	}
}

function getSessionMessage($key)
{
	$msg = "";
	if (isset($_SESSION[$key])) {
		$msg = $_SESSION[$key];
		unset($_SESSION[$key]);
	}
	return $msg;
}