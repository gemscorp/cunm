<?php
include("mainfile.php");
include("mainfunc.php");

$PAGE_TITLE="Welcome";
$m	=	isset( $_GET['m'])?$_GET['m']:$_POST['m'];
$op	=	isset( $_GET['op'])?$_GET['op']:$_POST['op'];
if (!isset($mod_file)) { $mod_file="index";
}
if(!isset($m)){ $m="home";}
		
    $modpath  = "modules/$m/$mod_file.php";

    if (file_exists($modpath)) {
	//echo $modpath; exit;
	include($modpath);
	 
    } else {
			$template->set_filenames(array(
		'body' => $mainframe[0])
			);
		$template->assign_vars(array(
      'HTML_CODE'=>'<br><p align="center" ><b><font color="#FF0000" face="Arial">Under Construction</font></b></p>'
		)	);
   $template->pparse('body');
	}

?>