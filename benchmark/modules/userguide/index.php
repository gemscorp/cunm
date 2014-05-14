<?php
$module_name = basename(dirname(__FILE__));

$m		=	isset( $_GET['m'])?$_GET['m']:$_POST['m'];
$op		=	isset( $_GET['op'])?$_GET['op']:$_POST['op'];
$url	=	isset( $_GET['url'])?$_GET['url']:$_POST['url'];

 $template->set_filenames(array(
		'body' => $mainframe[0])
	);
	
	

	 $module_file = "modules/$module_name/home.htm";
	 $template->SetImagePath("modules/$module_name/");

	 $template->set_filenames(array(
		'home' => $module_file)
		);


    $menu=GetMenu();

	$html_code =  $template->pparse_str('home');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code,
		'COUNT'=>Counter()
		)	);
	 $template->SetImagePath("");
   $template->pparse('body');



?>