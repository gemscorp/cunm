<?php

/**
 * PDO handler function 
 */

function getDbHandler()
{
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	$dbo = new PDO("mysql:host=localhost;dbname=cunm", "root", "", $options);
	$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbo;
}
