<?
$module_name = basename(dirname(__FILE__));

 $template->set_filenames(array(
		'body' => $mainframe[0])
	);
	
	
$CNT=1;

	 $module_file = "modules/$module_name/home.htm";
	 $template->SetImagePath("modules/$module_name/");

	 $template->set_filenames(array(
		'home' => $module_file)
		);

$template->assign_vars(array(
'COUNTRY'=>OptionV(0,count($CountryArr)-1,$country,$CountryArr,"--  All Country  --"),
	'ACTION'=>"index.php",
	 'M'=>"member",
	'OP'=>"search",
	'GR'=>$gr
));


    $menu=GetMenu();

	$html_code =  $template->pparse_str('home');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code,
		'COUNT'=>Counter()
		)	);
	 $template->SetImagePath("");
   $template->pparse('body');



?>