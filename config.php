<?php 
date_default_timezone_set('Asia/Bangkok');

define('APP_PASSWORD', '1234');

define('SMS_DB', 'bot');

define('SMS_DBHOST', '192.168.1.203');

define('SMS_DBUSER', 'bot');

define('SMS_DBPASS', 'bot');

define("ADMIN_PASSWORD", "KuhMaler$83");
define("ADMIN_REPORT_PASSWORD", "Flensburg1");
define("ADMIN_LOGS_PASSWORD", "LogFilesChecking");
define("ADMIN_TEST_PASSWORD", "BotTestProcess");

error_reporting(E_ALL);

ini_set('display_errors', 1);
ini_set('error_log', '/var/log/php.log');
ini_set('memory_limit', '-1');

define('APP_PATH', '/cunm/cunm');