<?php
//###############################################################
//### Gen Code  By phpform V 4.020  
//###  Module For db table  bench_result
//###
//###  By Mr. Piya Pimchankam
//###  email : a_piya_p@hotmail.com
//###############################################################
				$cookie = cookieAdmindecode($ADMIN);
				$cookie = cookieMemberdecode($MEMBER);
				$mem_id=$cookie[0];
				$username=$cookie[1];
				$password=$cookie[2];
				$member_of=$cookie[3];
				$com_id=$cookie[4];
				$brance_id=$cookie[5];
				
				if( $member_of!=ADMINISTRATOR )
				{
					Header("Refresh: 0;url=$index_file?m=member&op=login");
					exit();
				}

$module_name = "bench_result";
$gr = "admin";
$index_file = "admin.php";

$template->set_filenames(array(
		'body' => $mainframe[0])
	);
//######################

if(empty($op)){$op="";}

switch($op)
{
	    //#####   bench_result #########
		case "savebench_result":
			Savebench_result($resu,$bench_id,$mem_id,$P1,$P2,$P3,$P4,$P5,$P6,$E1,$E2,$E3,$E4,$E5,$E6,$E7,$E8,$E9,$A1,$A2,$A3,$R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$L1,$L2,$L3,$S1,$S2,$S3,$S4,$S5,$S6,$S7,$S8,$S9,$S10,$S11);
			break;
		case "inputbench_result":
			Inputbench_result($resu);
			break;
		case "listbench_result":
			AListbench_result();
			break;
		case "detailbench_result":
			Detailbench_result($resu);
			break;
		//###########################
		case "del":
			Del($tb,$key,$id,$bk,$rt,$page);
			break;
	default :
AListbench_result();
		break;

}

function Del($tb,$key,$id,$bk,$rt,$page)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;


		unset($query);
		unset($result);

		$query="DELETE FROM $tb WHERE $key=$id ";
		$db->sql_query($query);
			if(!empty($rt))
			{
			$goto = "$index_file?m=$module_name&op=$rt&gr=$gr";
			}else{
			$goto="$index_file?m=$module_name&op=game&page=$page&gr=$gr#$bk";
			}
	Header("Refresh: 0;url=$goto");

	
}


function Savebench_result($resu,$bench_id,$mem_id,$P1,$P2,$P3,$P4,$P5,$P6,$E1,$E2,$E3,$E4,$E5,$E6,$E7,$E8,$E9,$A1,$A2,$A3,$R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$L1,$L2,$L3,$S1,$S2,$S3,$S4,$S5,$S6,$S7,$S8,$S9,$S10,$S11)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath,$gr;

		$table="bench_result";
		if(empty($resu))
		{
		$field="resu,bench_id,mem_id,P1,P2,P3,P4,P5,P6,E1,E2,E3,E4,E5,E6,E7,E8,E9,A1,A2,A3,R1,R2,R3,R4,R5,R6,R7,R8,R9,R10,R11,R12,L1,L2,L3,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11";
		$data="'$resu','$bench_id','$mem_id','$P1','$P2','$P3','$P4','$P5','$P6','$E1','$E2','$E3','$E4','$E5','$E6','$E7','$E8','$E9','$A1','$A2','$A3','$R1','$R2','$R3','$R4','$R5','$R6','$R7','$R8','$R9','$R10','$R11','$R12','$L1','$L2','$L3','$S1','$S2','$S3','$S4','$S5','$S6','$S7','$S8','$S9','$S10','$S11'";
		SaveDB( $table,$field,$data);
		}else{
		$dataset="resu='$resu' ,bench_id='$bench_id' ,mem_id='$mem_id' ,P1='$P1' ,P2='$P2' ,P3='$P3' ,P4='$P4' ,P5='$P5' ,P6='$P6' ,E1='$E1' ,E2='$E2' ,E3='$E3' ,E4='$E4' ,E5='$E5' ,E6='$E6' ,E7='$E7' ,E8='$E8' ,E9='$E9' ,A1='$A1' ,A2='$A2' ,A3='$A3' ,R1='$R1' ,R2='$R2' ,R3='$R3' ,R4='$R4' ,R5='$R5' ,R6='$R6' ,R7='$R7' ,R8='$R8' ,R9='$R9' ,R10='$R10' ,R11='$R11' ,R12='$R12' ,L1='$L1' ,L2='$L2' ,L3='$L3' ,S1='$S1' ,S2='$S2' ,S3='$S3' ,S4='$S4' ,S5='$S5' ,S6='$S6' ,S7='$S7' ,S8='$S8' ,S9='$S9' ,S10='$S10' ,S11='$S11' ";
		$condition=" resu='$resu' ";
		SaveEditDB( $table,$dataset,$condition);
		}
		Header("Refresh: 0;url=$index_file?m=$module_name&op=listbench_result&gr=$gr");

}



function Inputbench_result($resu)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;

						$bench_id="";
				$mem_id="";
				$P1="";
				$P2="";
				$P3="";
				$P4="";
				$P5="";
				$P6="";
				$E1="";
				$E2="";
				$E3="";
				$E4="";
				$E5="";
				$E6="";
				$E7="";
				$E8="";
				$E9="";
				$A1="";
				$A2="";
				$A3="";
				$R1="";
				$R2="";
				$R3="";
				$R4="";
				$R5="";
				$R6="";
				$R7="";
				$R8="";
				$R9="";
				$R10="";
				$R11="";
				$R12="";
				$L1="";
				$L2="";
				$L3="";
				$S1="";
				$S2="";
				$S3="";
				$S4="";
				$S5="";
				$S6="";
				$S7="";
				$S8="";
				$S9="";
				$S10="";
				$S11="";
				
		if( 1 and  !empty($resu))
		{
			$table="bench_result";
			$fieldArr ="resu,bench_id,mem_id,P1,P2,P3,P4,P5,P6,E1,E2,E3,E4,E5,E6,E7,E8,E9,A1,A2,A3,R1,R2,R3,R4,R5,R6,R7,R8,R9,R10,R11,R12,L1,L2,L3,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11";
			$searchkey=" and resu='$resu' ";
			$result=SearchDB( $searchkey,$table,$fieldArr);
			if($db->sql_numrows())
			{
				$row = $db->sql_fetchrow($result);
								$resu=$row["resu"];
				$bench_id=$row["bench_id"];
				$mem_id=$row["mem_id"];
				$P1=$row["P1"];
				$P2=$row["P2"];
				$P3=$row["P3"];
				$P4=$row["P4"];
				$P5=$row["P5"];
				$P6=$row["P6"];
				$E1=$row["E1"];
				$E2=$row["E2"];
				$E3=$row["E3"];
				$E4=$row["E4"];
				$E5=$row["E5"];
				$E6=$row["E6"];
				$E7=$row["E7"];
				$E8=$row["E8"];
				$E9=$row["E9"];
				$A1=$row["A1"];
				$A2=$row["A2"];
				$A3=$row["A3"];
				$R1=$row["R1"];
				$R2=$row["R2"];
				$R3=$row["R3"];
				$R4=$row["R4"];
				$R5=$row["R5"];
				$R6=$row["R6"];
				$R7=$row["R7"];
				$R8=$row["R8"];
				$R9=$row["R9"];
				$R10=$row["R10"];
				$R11=$row["R11"];
				$R12=$row["R12"];
				$L1=$row["L1"];
				$L2=$row["L2"];
				$L3=$row["L3"];
				$S1=$row["S1"];
				$S2=$row["S2"];
				$S3=$row["S3"];
				$S4=$row["S4"];
				$S5=$row["S5"];
				$S6=$row["S6"];
				$S7=$row["S7"];
				$S8=$row["S8"];
				$S9=$row["S9"];
				$S10=$row["S10"];
				$S11=$row["S11"];
				
			}

		}else{
		     $resu="";
	
	
		}//end if

	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/inputbench_result.php";
	 $template->set_image_path(array('inputform' =>"modules/$module_name/$gr/"));
		}else{
	 $module_file = "modules/$module_name/inputbench_result.php";
	$template->set_image_path(array('inputform'  =>"modules/$module_name/"));
		}

	 $template->set_filenames(array(
		'inputform' => $module_file)
		);

	$template->assign_vars(array(
       'RESU'=>$resu,
			    'BENCH_ID'=>$bench_id,
			    'MEM_ID'=>$mem_id,
			    'P1'=>$P1,
			    'P2'=>$P2,
			    'P3'=>$P3,
			    'P4'=>$P4,
			    'P5'=>$P5,
			    'P6'=>$P6,
			    'E1'=>$E1,
			    'E2'=>$E2,
			    'E3'=>$E3,
			    'E4'=>$E4,
			    'E5'=>$E5,
			    'E6'=>$E6,
			    'E7'=>$E7,
			    'E8'=>$E8,
			    'E9'=>$E9,
			    'A1'=>$A1,
			    'A2'=>$A2,
			    'A3'=>$A3,
			    'R1'=>$R1,
			    'R2'=>$R2,
			    'R3'=>$R3,
			    'R4'=>$R4,
			    'R5'=>$R5,
			    'R6'=>$R6,
			    'R7'=>$R7,
			    'R8'=>$R8,
			    'R9'=>$R9,
			    'R10'=>$R10,
			    'R11'=>$R11,
			    'R12'=>$R12,
			    'L1'=>$L1,
			    'L2'=>$L2,
			    'L3'=>$L3,
			    'S1'=>$S1,
			    'S2'=>$S2,
			    'S3'=>$S3,
			    'S4'=>$S4,
			    'S5'=>$S5,
			    'S6'=>$S6,
			    'S7'=>$S7,
			    'S8'=>$S8,
			    'S9'=>$S9,
			    'S10'=>$S10,
			    'S11'=>$S11,
			    
	'ACTION'=>$index_file,
	 'M'=>$module_name,
	'OP'=>"savebench_result",
	'GR'=>$gr
	)	);

	   $menu=GetMenu();

	$html_code =  $template->pparse_str('inputform');
	$template->assign_vars(array(
	'BANNER'=>$banner,
	 'TITLE'=>$title,
	 'CAPTION'=>$caption,
		'CNT'=>Counter(),
      'HTML_CODE'=> $html_code,
		'MENU'=>$menu
		)	);
	 
   $template->pparse('body');
	
}

function AListbench_result()
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;

	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/listbench_result.php";
	 $template->set_image_path(array('listform' =>"modules/$module_name/$gr/"));
		}else{
	 $module_file = "modules/$module_name/listbench_result.php";
	 $template->set_image_path(array('listform'  =>"modules/$module_name/"));
		}

	 $template->set_filenames(array(
		'listform' => $module_file)
		);

		if(empty($page))
		{
		$page=1;
		}
		$page_list=50;
		$table="bench_result";
		$fieldArr ="resu,bench_id,mem_id,P1,P2,P3,P4,P5,P6,E1,E2,E3,E4,E5,E6,E7,E8,E9,A1,A2,A3,R1,R2,R3,R4,R5,R6,R7,R8,R9,R10,R11,R12,L1,L2,L3,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11";
		$searchkey=" ";

		list($totalpage,$result)=SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list);
		 if($db->sql_numrows())
		{
		while($v= $db->sql_fetchrow($result) )
		{

						$resu=$v["resu"];
				$bench_id=$v["bench_id"];
				$mem_id=$v["mem_id"];
				$P1=$v["P1"];
				$P2=$v["P2"];
				$P3=$v["P3"];
				$P4=$v["P4"];
				$P5=$v["P5"];
				$P6=$v["P6"];
				$E1=$v["E1"];
				$E2=$v["E2"];
				$E3=$v["E3"];
				$E4=$v["E4"];
				$E5=$v["E5"];
				$E6=$v["E6"];
				$E7=$v["E7"];
				$E8=$v["E8"];
				$E9=$v["E9"];
				$A1=$v["A1"];
				$A2=$v["A2"];
				$A3=$v["A3"];
				$R1=$v["R1"];
				$R2=$v["R2"];
				$R3=$v["R3"];
				$R4=$v["R4"];
				$R5=$v["R5"];
				$R6=$v["R6"];
				$R7=$v["R7"];
				$R8=$v["R8"];
				$R9=$v["R9"];
				$R10=$v["R10"];
				$R11=$v["R11"];
				$R12=$v["R12"];
				$L1=$v["L1"];
				$L2=$v["L2"];
				$L3=$v["L3"];
				$S1=$v["S1"];
				$S2=$v["S2"];
				$S3=$v["S3"];
				$S4=$v["S4"];
				$S5=$v["S5"];
				$S6=$v["S6"];
				$S7=$v["S7"];
				$S8=$v["S8"];
				$S9=$v["S9"];
				$S10=$v["S10"];
				$S11=$v["S11"];
				

		$edit="$index_file?m=$module_name&op=inputbench_result&resu=$resu&gr=$gr";
		$cap=str_replace("","",$cap);
		 $del="javascript:Del('tb=bench_result&key=resu&id=$resu&op=del&rt=listbench_result&gr=$gr','$cap')";

		$template->assign_block_vars('listrow', array(
		 'RESU'=>$resu,
			    'BENCH_ID'=>$bench_id,
			    'MEM_ID'=>$mem_id,
			    'P1'=>$P1,
			    'P2'=>$P2,
			    'P3'=>$P3,
			    'P4'=>$P4,
			    'P5'=>$P5,
			    'P6'=>$P6,
			    'E1'=>$E1,
			    'E2'=>$E2,
			    'E3'=>$E3,
			    'E4'=>$E4,
			    'E5'=>$E5,
			    'E6'=>$E6,
			    'E7'=>$E7,
			    'E8'=>$E8,
			    'E9'=>$E9,
			    'A1'=>$A1,
			    'A2'=>$A2,
			    'A3'=>$A3,
			    'R1'=>$R1,
			    'R2'=>$R2,
			    'R3'=>$R3,
			    'R4'=>$R4,
			    'R5'=>$R5,
			    'R6'=>$R6,
			    'R7'=>$R7,
			    'R8'=>$R8,
			    'R9'=>$R9,
			    'R10'=>$R10,
			    'R11'=>$R11,
			    'R12'=>$R12,
			    'L1'=>$L1,
			    'L2'=>$L2,
			    'L3'=>$L3,
			    'S1'=>$S1,
			    'S2'=>$S2,
			    'S3'=>$S3,
			    'S4'=>$S4,
			    'S5'=>$S5,
			    'S6'=>$S6,
			    'S7'=>$S7,
			    'S8'=>$S8,
			    'S9'=>$S9,
			    'S10'=>$S10,
			    'S11'=>$S11,
			       
        'U_DEL'=>$del,
		'U_EDIT'=>$edit
		)	);
	} // end while
}// end if

	$link="$index_file?m=$module_name&op=listbench_result";
	$template->assign_vars(array(
      'PAGE_LIST'=>List_PageStr($page,$totalpage,$link),
		'JAVA_URL'=>"$index_file?m=$module_name&op=del",
		'U_ADD'=>"$index_file?m=$module_name&op=inputbench_result&gr=$gr"
		)	);

	   $menu=GetMenu();

	$html_code =  $template->pparse_str('listform');
	$template->assign_vars(array(
	'BANNER'=>$banner,
	 'TITLE'=>$title,
	 'CAPTION'=>$caption,
		'CNT'=>Counter(),
      'HTML_CODE'=> $html_code,
		'MENU'=>$menu
		)	);
  
   $template->pparse('body');


}

function Detailbench_result($resu)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe;
						$bench_id="";
				$mem_id="";
				$P1="";
				$P2="";
				$P3="";
				$P4="";
				$P5="";
				$P6="";
				$E1="";
				$E2="";
				$E3="";
				$E4="";
				$E5="";
				$E6="";
				$E7="";
				$E8="";
				$E9="";
				$A1="";
				$A2="";
				$A3="";
				$R1="";
				$R2="";
				$R3="";
				$R4="";
				$R5="";
				$R6="";
				$R7="";
				$R8="";
				$R9="";
				$R10="";
				$R11="";
				$R12="";
				$L1="";
				$L2="";
				$L3="";
				$S1="";
				$S2="";
				$S3="";
				$S4="";
				$S5="";
				$S6="";
				$S7="";
				$S8="";
				$S9="";
				$S10="";
				$S11="";
				
		if( 1 and  !empty($resu))
		{
			$table="bench_result";
			$fieldArr ="resu,bench_id,mem_id,P1,P2,P3,P4,P5,P6,E1,E2,E3,E4,E5,E6,E7,E8,E9,A1,A2,A3,R1,R2,R3,R4,R5,R6,R7,R8,R9,R10,R11,R12,L1,L2,L3,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11";
			$searchkey=" and resu='$resu' ";
			$result=SearchDB( $searchkey,$table,$fieldArr);
			if($db->sql_numrows())
			{
				$row = $db->sql_fetchrow($result);
								$resu=$row["resu"];
				$bench_id=$row["bench_id"];
				$mem_id=$row["mem_id"];
				$P1=$row["P1"];
				$P2=$row["P2"];
				$P3=$row["P3"];
				$P4=$row["P4"];
				$P5=$row["P5"];
				$P6=$row["P6"];
				$E1=$row["E1"];
				$E2=$row["E2"];
				$E3=$row["E3"];
				$E4=$row["E4"];
				$E5=$row["E5"];
				$E6=$row["E6"];
				$E7=$row["E7"];
				$E8=$row["E8"];
				$E9=$row["E9"];
				$A1=$row["A1"];
				$A2=$row["A2"];
				$A3=$row["A3"];
				$R1=$row["R1"];
				$R2=$row["R2"];
				$R3=$row["R3"];
				$R4=$row["R4"];
				$R5=$row["R5"];
				$R6=$row["R6"];
				$R7=$row["R7"];
				$R8=$row["R8"];
				$R9=$row["R9"];
				$R10=$row["R10"];
				$R11=$row["R11"];
				$R12=$row["R12"];
				$L1=$row["L1"];
				$L2=$row["L2"];
				$L3=$row["L3"];
				$S1=$row["S1"];
				$S2=$row["S2"];
				$S3=$row["S3"];
				$S4=$row["S4"];
				$S5=$row["S5"];
				$S6=$row["S6"];
				$S7=$row["S7"];
				$S8=$row["S8"];
				$S9=$row["S9"];
				$S10=$row["S10"];
				$S11=$row["S11"];
				
			}

		}else{
		     $resu="";
	
		}//end if
		
	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/detailbench_result.php";
	 $template->set_image_path(array('detailform' =>"modules/$module_name/$gr/"));
		}else{
	 $module_file = "modules/$module_name/detailbench_result.php";
	 $template->set_image_path(array('detailform' =>"modules/$module_name/"));
		}


	 $template->set_filenames(array(
		'detailform' => $module_file)
		);

	$template->assign_vars(array(
       'RESU'=>$resu,
			    'BENCH_ID'=>$bench_id,
			    'MEM_ID'=>$mem_id,
			    'P1'=>$P1,
			    'P2'=>$P2,
			    'P3'=>$P3,
			    'P4'=>$P4,
			    'P5'=>$P5,
			    'P6'=>$P6,
			    'E1'=>$E1,
			    'E2'=>$E2,
			    'E3'=>$E3,
			    'E4'=>$E4,
			    'E5'=>$E5,
			    'E6'=>$E6,
			    'E7'=>$E7,
			    'E8'=>$E8,
			    'E9'=>$E9,
			    'A1'=>$A1,
			    'A2'=>$A2,
			    'A3'=>$A3,
			    'R1'=>$R1,
			    'R2'=>$R2,
			    'R3'=>$R3,
			    'R4'=>$R4,
			    'R5'=>$R5,
			    'R6'=>$R6,
			    'R7'=>$R7,
			    'R8'=>$R8,
			    'R9'=>$R9,
			    'R10'=>$R10,
			    'R11'=>$R11,
			    'R12'=>$R12,
			    'L1'=>$L1,
			    'L2'=>$L2,
			    'L3'=>$L3,
			    'S1'=>$S1,
			    'S2'=>$S2,
			    'S3'=>$S3,
			    'S4'=>$S4,
			    'S5'=>$S5,
			    'S6'=>$S6,
			    'S7'=>$S7,
			    'S8'=>$S8,
			    'S9'=>$S9,
			    'S10'=>$S10,
			    'S11'=>$S11,
			       
		)	);

	$menu=GetMenu();

	$html_code =  $template->pparse_str('detailform');
	$template->assign_vars(array(
	'BANNER'=>$banner,
	 'TITLE'=>$title,
	 'CAPTION'=>$caption,
		'CNT'=>Counter(),
      'HTML_CODE'=> $html_code,
		'MENU'=>$menu
		)	);
  
   $template->pparse('body');
	
}


?>