<?php
$module_name = basename(dirname(__FILE__));


$template->set_filenames(array(
		'body' => $mainframe[0])
	);
if(empty($op)){$op="";}

switch($op)
{
case "contactcomplete":
Complete();
break;

	default :
Home();
		break;

}


function Home()
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;
	

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

  

}

function Complete()
{

  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;
   $template->set_filenames(array(
		'body' => $mainframe[0])
	);
	
	

	 $module_file = "modules/$module_name/contact_complete.html";
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
}


?>