<?php 



$app->get("/logout", function () use ($app, $smarty) {
	session_destroy();
	$app->redirect("/bot/op");
});