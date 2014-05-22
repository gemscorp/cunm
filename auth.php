<?php 

$app->get("/mandashboard", function () use ($app, $smarty) {
	$smarty->display('mandashboard.tpl');
});

$app->get("/dashboard", function () use ($app, $smarty) {
	$smarty->display('dashboard.tpl');
});

$app->get("/password", function () use ($app, $smarty) {
	
	$error = ""; $success = "";
	
	if (isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
		unset($_SESSION['error']);
	}
	
	if (isset($_SESSION['success'])) {
		$error = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('error', $error);
	$smarty->assign('success', $success);
	
	$smarty->display('password.tpl');
});

$app->post("/password", function () use ($app, $smarty) {
	
	$db = getDbHandler();
	
	$sql = "UPDATE user SET password = PASSWORD(:password_new) WHERE id = :id AND password = PASSWORD(:password_current) ";
	$sth = $db->prepare($sql);
	$sth->execute(array(':password_new' => $_POST['new_password'], ':id' => $_SESSION['user_id'], ':password_current' => $_POST['current_password']));
	
	if ($sth->rowCount() == 0) {
		
	}
	
	$app->redirect(APP_PATH . '/password');
});

$app->get("/adduser", function () use ($app, $smarty) {
	
	$success = "";
	if (isset($_SESSION['success'])) {
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}
	
	$smarty->assign('success', $success);
	
	$smarty->display('adduser.tpl');	
});

$app->post('/adduser', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "INSERT INTO user (email, password, level, status, federation_id, primary_union_id) "
	     . " VALUES (:email, :password, :level, :status, :federation_id, :primary_union_id) ";
	
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));
	
});

$app->group("/member", function () use ($app, $smarty) {
	
	$app->get("/detail", function () use ($app, $smarty) {
		
		$smarty->display('member/detail.tpl');
		
	});
});

$app->get("/logout", function () use ($app, $smarty) {
	session_destroy();
	$app->redirect(APP_PATH);
});