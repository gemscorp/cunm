<?php

$mysql_host = 'localhost';
$mysql_db = 'benchmark';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_port = '3306';

$db_link = mysql_connect($mysql_host,$mysql_user,$mysql_pass) 
    or die ("Error connecting: " . mysql_error());
mysql_select_db($mysql_db) or die ("Error opening db: " . mysql_error());

 function print_header() {
          echo "<html> <head> <title> Profiles </title><link rel=stylesheet type=text/css href=/pearls/style.css></head>
                <body>";
 }
    
?>