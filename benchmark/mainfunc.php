<?php
function GetMenu()
{

  global $MEMBER,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;


				$cookie = cookieMemberdecode($MEMBER);
				//$mem_id=$cookie[0];
				//$username=$cookie[1];
				//$password=$cookie[2];
				$member_ofck=$cookie[3];
				$com_idck=$cookie[4];
				//$brance_id=$cookie[5];

	 $module_file = "includes/menu.htm";
	 $template->SetImagePath("");
		

	 $template->set_filenames(array(
		'menu' => $module_file)
		);

	if(empty($page))
		{
		$page=1;
		}
		$page_list=50;
		$table="modules";
		$fieldArr ="modules_id,name,menu_name,index_file,gr,active,icon,mainframe,security_level,config_file,menu_order,url";
		$searchkey="and active    order by menu_order";

		list($totalpage,$result)=SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list);
		 if($db->sql_numrows())
		{
		while($v= $db->sql_fetchrow($result) )
		{

				$dmodules_id=$v["modules_id"];
				$dname=$v["name"];
				$dmenu_name=$v["menu_name"];
				$dindex_file=$v["index_file"];
				$dgr=$v["gr"];
				$dactive=$v["active"];
				$dicon=$v["icon"];
				$dmainframe=$v["mainframe"];
				$dsecurity_level=$v["security_level"];
				$dconfig_file=$v["config_file"];
				$dmenu_order=$v["menu_order"];
				$url = $v["url"];
				$URL="$dindex_file?m=$dname&$url&d=".$_GET['d'];

		$template->assign_block_vars('menur', array(

			    'NAME'=>$dname,
			    'MENU_NAME'=>$dmenu_name,
				'URL'=>$URL

		)	);
	} // end while
}// end if

return $template->pparse_str('menu');
}


function GetTopMenu()
{

  global $MEMBER,$db,$index_file,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;
  global $mem_id;

	 $module_file = "includes/topmenu.htm";
	 $template->SetImagePath("");
	 $template->set_filenames(array(
		'topmenu' => $module_file)
		);
	$module_name="detail";
		$template->assign_vars(array(
			'ga'=>"$index_file?m=$module_name&op=member&mem_id=$mem_id&d=".$_GET['d'],
			'pe'=>"$index_file?m=$module_name&op=pearls&mem_id=$mem_id&d=".$_GET['d'],
			'ba'=>"$index_file?m=$module_name&op=balance&mem_id=$mem_id&d=".$_GET['d'],
			'ra'=>"$index_file?m=$module_name&op=rating&mem_id=$mem_id&d=".$_GET['d'],
			'li'=>"$index_file?m=$module_name&op=libraly&mem_id=$mem_id&d=".$_GET['d'],
			'be'=>"$index_file?m=bench&mem_id=$mem_id&d=".$_GET['d'],
			'link1'=>"download/Balance_Sheet_&_Income_Statement_revised_Jan_2009.xls",
			'link2'=>"download/Chart_of_ACCUNT_Final_Forma_as_of_2011.xls",
			));

	
	return $template->pparse_str('topmenu');

}

function GetTopMenuMM()
{

  global $MEMBER,$db,$index_file,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;
  global $mem_id;

	 $module_file = "includes/topmenu_mm.htm";
	 $template->SetImagePath("");
	 $template->set_filenames(array(
		'topmenu' => $module_file)
		);
	$module_name="detail";
		$template->assign_vars(array(
			'ga'=>"$index_file?m=$module_name&op=member&mem_id=$mem_id&d=".$_GET['d'],
			'pe'=>"$index_file?m=$module_name&op=pearls&mem_id=$mem_id&d=".$_GET['d'],
			'ba'=>"$index_file?m=$module_name&op=balance&mem_id=$mem_id&d=".$_GET['d'],
			'ra'=>"$index_file?m=$module_name&op=rating&mem_id=$mem_id&d=".$_GET['d'],
			'li'=>"$index_file?m=$module_name&op=libraly&mem_id=$mem_id&d=".$_GET['d'],
				'com'=>"$index_file?m=community&mem_id=$mem_id&d=".$_GET['d'],
				'be'=>"$index_file?m=bench&mem_id=$mem_id&d=".$_GET['d'],
				'link1'=>"download/Balance_Sheet_&_Income_Statement_revised_Jan_2009.xls",
				'link2'=>"download/Chart_of_ACCUNT_Final_Forma_as_of_2011.xls",
			));

	
	return $template->pparse_str('topmenu');

}


function DeleteFileDB($db_table,$db_field,$search_key, $File_path)
{
  global $db,$_SERVER;
				
				 $pic =  SearchSingleDB($search_key,$db_table,$db_field);
			 if($_SERVER['OS']=="Windows_NT")
				{
				$picpath="$File_path\\$pic";
				}else{
				$picpath="$File_path/$pic";
				}

					  if (file_exists($picpath) && !empty($pic) ) {
						unlink($picpath);
						 }

}


function SaveFile($filename,$SaveFilePath,$newname="")
{
   global $_FILES;

   if(!empty($_FILES[$filename]['name'])){


				$uploaddir = $SaveFilePath;

				$path_parts = pathinfo($_FILES[$filename]['name']);
				$savefilename = $newname."-t".time().".".$path_parts["extension"];

			 if(strstr( PHP_OS, 'WIN') )
				{
						$uploadfile = $uploaddir ."\\".$savefilename ;  // windows
				}else{
						$uploadfile = $uploaddir ."/". $savefilename;  // unix
				}

			//print "<pre>";
			if (move_uploaded_file($_FILES[$filename]['tmp_name'], $uploadfile)) {
			/* print "File is valid, and was successfully uploaded. ";
				print "Here's some more debugging info:\n";
				print "Upload File: $uploadfile\n";
				print_r($_FILES);*/
				chmod($uploadfile, 0755);

			} else {
			//  print "Possible file upload attack!  Here's some debugging info:\n";
			// print_r($_FILES);
				//exit();
			}
			//print "</pre>";
   }else{
		$savefilename="";
   }
			return $savefilename;

}


function Counter()
{
global $db,$CNT;

if($CNT)
	{
	$sql ="UPDATE counter SET value=value+1  WHERE cntid=1";
	$result = $db->sql_query($sql);
	$CNT=0;// 1= alway count , 0 = first count
	}

$table="counter";
$fieldArr ="value";
$searchkey=" and cntid=1  ";
$result=SearchDB( $searchkey,$table,$fieldArr);
 if($db->sql_numrows())
	{
				$row = $db->sql_fetchrow($result);
				$counter =$row["value"]; 
			 
	}else{
	$sql = "INSERT INTO counter (cntid, value) VALUES (1, 1)";
	$result = $db->sql_query($sql);
	$counter=1;
	}
return  $counter;
}


function GetModule()
{
	global $index_file;
$template = new Template;
$cur_dir = getcwd();
$module_dir="modules";
     if($_SERVER['OS']=="Windows_NT")
	{
	 $slash="\\";
	}else{
	$slash="/";
	}

      $module_file = "includes/getmodule.htm";
	$template->set_filenames(array(
		'getmodule' => $module_file)
	);

$dir="$cur_dir$slash$module_dir";

$str="";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
       $filename=$dir.$slash.$file.$slash.'modules_info.cfg';
		  if (file_exists($filename))
			{
			   include($filename);
			   $str=$$file;
			   if(is_array($str)) {
			   $template->assign_block_vars('module', array(
				'MODULE_NAME' =>$str[0]['module_name'],
                'U_MODULE'=>"$index_file?m=$file"
			   ));
			   }
			}
			

        }
        closedir($dh);
    }

}else{
			   $template->assign_block_vars('nomodule', array(
				'#' =>1
			   ));

}

$template->pparse('getmodule');

}


function MakeJavaSelectEx($FormName,$MasterTable,$KeyIndex ,$DetailTable,$DetailKey,$DetailField,$SelectName="----กรุณาเลือก---")
{
	global $db;

 $str="";
 $str.= $MasterTable.$DetailTable."= new Array() ; \n";

		
		$fieldArr ="$KeyIndex";
		$searchkey=" order by $KeyIndex";
		$result=SearchDB( $searchkey,$MasterTable,$fieldArr);

		while($v= $db->sql_fetchrow($result) )
		{
				$first_id=$v["$KeyIndex"];
				

				$str.= $MasterTable.$DetailTable."[$first_id]=new Array(2); \n";

				$fieldArr ="$DetailKey,$DetailField";
				$searchkey=" and $KeyIndex=$first_id  order by  $KeyIndex";
				
					$name = "new Array('$SelectName'";
					$id = " new Array('0'";
						$prow=SearchDB( $searchkey,$DetailTable,$fieldArr);
						while($vv= $db->sql_fetchrow($prow) )
						{
						$name .=	",'".$vv["$DetailField"]."' ";	
						 $id .=",'".$vv["$DetailKey"]."' ";
						}

				$name.=" );";
				$id.=" ); ";
$str.= $MasterTable.$DetailTable."[".$first_id."][0]=$name \n";
$str.= $MasterTable.$DetailTable."[".$first_id."][1]=$id \n";
			
     }
//===== Java Script Code ===
$str.='
function Update'.$MasterTable.$DetailTable.'()
{
	var makeSelect = document.'.$FormName.'.'.$KeyIndex.';
	var modelSelect = document.'.$FormName.'.'.$DetailKey.';
	modelSelect.options.length = 0; // Clear the popup
	index = makeSelect.options[makeSelect.selectedIndex].value;
 if (index >0)
	{
		var name =  '.$MasterTable.$DetailTable.'[index][0];
		var index =  '.$MasterTable.$DetailTable.'[index][1];
          var x=0;
		for( var i in name)
		{
		 modelSelect.options[x] = new Option(name[i],index[i] );
		 x++;
		}
	}
}

function Select'.$MasterTable.$DetailTable.'(pv,am )
{
	var makeSelect = document.'.$FormName.'.'.$KeyIndex.';
	var modelSelect = document.'.$FormName.'.'.$DetailKey.';
	modelSelect.options.length = 0; // Clear the popup
		var name =  '.$MasterTable.$DetailTable.'[pv][0];
		var index =  '.$MasterTable.$DetailTable.'[pv][1];
          var x=0;
		for( var i in name)
		{
		 modelSelect.options[x] = new Option(name[i],index[i] );
		 if(am==index[i] )
		 {
		 modelSelect.selectedIndex = x;
		 }
		 	 x++;
		}

} ';



return $str;
}

?>