<?php
include("mainfile.php");
include("mainfunc.php");

$PAGE_TITLE="Welcome to aaccu";
$m = $_GET['m'];

if (!isset($mod_file)) { $mod_file="index"; }
if(!isset($m)){ $m="home";}

    $modpath  = "modules/$m/admin/$mod_file.php";
	
	//echo $modpath; exit;

    if (file_exists($modpath)) {
		include($modpath);
    } else {
		$template->set_filenames(array(
		'body' => $mainframe[0]));
		$template->assign_vars(array(
      'HTML_CODE'=>'<br><p align="center"><b><font color="#FF0000" face="Arial">Under Construction</font></b></p>'
		)	);
   $template->pparse('body');
	}



?>