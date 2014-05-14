<?php
//###############################################################
//### Gen Code  By phpform V 4.012  
//###  Module For db table  member
//###
//###  By Mr. Piya Pimchankam
//###  email : a_piya_p@hotmail.com
//###############################################################
$m		=	isset( $_GET['m'])?$_GET['m']:$_POST['m'];
$op		=	isset( $_GET['op'])?$_GET['op']:$_POST['op'];
$url	=	isset( $_GET['url'])?$_GET['url']:$_POST['url'];
$MEMBER = $_GET['d'];


				//$cookie = cookieAdmindecode($ADMIN);
				$cookie = cookieMemberdecode($MEMBER);
				$mem_id=$cookie[0];
				$username=$cookie[1];
				$password=$cookie[2];
				$member_ofck=$cookie[3];
				$name=$cookie[4];
				$member_name=$cookie[5];

				if( $member_ofck!=MEMBER_USER )
				{
					Header("Refresh: 0;url=$index_file?m=member&op=login");
					exit();
				}

$module_name = "history";
$gr = "member";
$index_file = "member.php";

$template->set_filenames(array(
		'body' => $mainframe[0])
	);
//######################

if(empty($op)){$op="";}

switch($op)
{

		case "listmember":
			MemberHome();
			break;
	default :
MemberHome();
		break;

}


function MemberHome()
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;
  global $mem_id,$username,$password,$member_ofck,$name,$member_name,$next;


	 if(empty($next))
	{	
		 $module_file = "modules/$module_name/$gr/memberhome.htm";
	}else{
         $module_file = "modules/$module_name/$gr/memberhome1.htm";
	}
		 $template->set_filenames(array(
		'listform' => $module_file)
		); 
	$template->assign_vars(array(
      'NAME'=> $name ,
	  'MEMBER_NAME'=>$member_name,
		'LOGOUT'=>"index.php?m=member&op=logout",
		'EDIT_PROFILE'=>"member.php?m=member&op=inputmember",
		'HISTORY'=>"member.php?m=history",
		'COMMUNITY'=>"member.php?m=community",
		'PEARSL'=>"member.php?m=fearsl",
		'BENCH'=>"member.php?m=bench",
		)	);


if(empty($page))
		{
		$page=1;
		}
//echo $page;

	$template->assign_vars(array(
		'LINK1'=>"$index_file?m=$module_name&op=listbench&page=$page",
		'LINK2'=>"$index_file?m=$module_name&op=listbench&page=$page&next=1"
		)	);

		//echo $page;
		$page_list=1;
		$table="bench";
		/*$fieldArr ="bench_id,mem_id,balance_sheet,C6,C7,C8,C11,C14,C15,C16,C19,C20,C21,C22,C23,C26,C27,C28,C29,C32,C33,C34,C35,C36,C37,C40,C41,C42,C43,C46,C47,C48,C49,C52,C53,C54,C55,C56,income_month,income_ended,C63,C64,C65,C66,C67,C68,C69,C72,C73,C74,C75,C76,C78,C79,C80,C81,C82,C83,C84,C85,C86,C87,C88,C91,C92,C93,C94,C95,C96,C98,C99,C100,C101,C102,C103,C104,C105,C106,C107,C108,C109,C110,C111,C112,C113,ANS6,ANS7,ANS8,ANS16,ANS21,ANS22,ANS23,ANS26,ANS27,ANS29,ANS32,ANS33,ANS35,ANS36,ANS37,ANS40,ANS41,ANS43,ANS46,ANS48,ANS52,ANS53,ANS54,ANS65,ANS66,ANS67,ANS68,ANS72,ANS73,ANS75,ANS83,ANS84,ANS87,ANS88,ANS92,ANS98,ANS99,ANS100,ANS101,ANS102,ANS103,ANS104,ANS105,ANS106,ANS107,ANS108,ANS109,ANS110,ANS111,ANS112,ANS113,remark6,remark7,remark8,remark16,remark21,remark22,remark23,remark26,remark27,remark29,remark32,remark33,remark35,remark36,remark37,remark40,remark41,remark43,remark46,remark48,remark52,remark53,remark54,remark65,remark66,remark67,remark68,remark72,remark73,remark75,remark83,remark84,remark87,remark88,remark92,remark98,remark99,remark100,remark101,remark102,remark103,remark104,remark105,remark106,remark107,remark108,remark109,remark110,remark111,remark112,remark113";
		*/
		$fieldArr=" * ";
		$searchkey=" and mem_id='$mem_id'   order by bench_id ASC ";

		list($totalpage,$result)=SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list);

		$link="$index_file?m=$module_name&op=listbench&next=$next";
			$template->assign_vars(array(
				'PAGE_LIST'=>List_PageStr($page,$totalpage,$link)
				));

		 if($db->sql_numrows())
		{
		while($v= $db->sql_fetchrow($result) )
		{

						$bench_id=$v["bench_id"];
				$mem_id=$v["mem_id"];
				$balance_sheet=$v["balance_sheet"];
				$C6=$v["C6"];
				$C7=$v["C7"];
				$C8=$v["C8"];
				$C11=$v["C11"];
				$C14=$v["C14"];
				$C15=$v["C15"];
				$C16=$v["C16"];
				$C19=$v["C19"];
				$C20=$v["C20"];
				$C21=$v["C21"];
				$C22=$v["C22"];
				$C23=$v["C23"];
				$C26=$v["C26"];
				$C27=$v["C27"];
				$C28=$v["C28"];
				$C29=$v["C29"];
				$C32=$v["C32"];
				$C33=$v["C33"];
				$C34=$v["C34"];
				$C35=$v["C35"];
				$C36=$v["C36"];
				$C37=$v["C37"];
				$C40=$v["C40"];
				$C41=$v["C41"];
				$C42=$v["C42"];
				$C43=$v["C43"];
				$C46=$v["C46"];
				$C47=$v["C47"];
				$C48=$v["C48"];
				$C49=$v["C49"];
				$C52=$v["C52"];
				$C53=$v["C53"];
				$C54=$v["C54"];
				$C55=$v["C55"];
				$C56=$v["C56"];
				$income_month=$v["income_month"];
				$income_ended=$v["income_ended"];
				$C63=$v["C63"];
				$C64=$v["C64"];
				$C65=$v["C65"];
				$C66=$v["C66"];
				$C67=$v["C67"];
				$C68=$v["C68"];
				$C69=$v["C69"];
				$C72=$v["C72"];
				$C73=$v["C73"];
				$C74=$v["C74"];
				$C75=$v["C75"];
				$C76=$v["C76"];
				$C78=$v["C78"];
				$C79=$v["C79"];
				$C80=$v["C80"];
				$C81=$v["C81"];
				$C82=$v["C82"];
				$C83=$v["C83"];
				$C84=$v["C84"];
				$C85=$v["C85"];
				$C86=$v["C86"];
				$C87=$v["C87"];
				$C88=$v["C88"];
				$C91=$v["C91"];
				$C92=$v["C92"];
				$C93=$v["C93"];
				$C94=$v["C94"];
				$C95=$v["C95"];
				$C96=$v["C96"];
				$C98=$v["C98"];
				$C99=$v["C99"];
				$C100=$v["C100"];
				$C101=$v["C101"];
				$C102=$v["C102"];
				$C103=$v["C103"];
				$C104=$v["C104"];
				$C105=$v["C105"];
				$C106=$v["C106"];
				$C107=$v["C107"];
				$C108=$v["C108"];
				$C109=$v["C109"];
				$C110=$v["C110"];
				$C111=$v["C111"];
				$C112=$v["C112"];
				$C113=$v["C113"];
				$ANS6=$v["ANS6"];
				$ANS7=$v["ANS7"];
				$ANS8=$v["ANS8"];
				$ANS16=$v["ANS16"];
				$ANS21=$v["ANS21"];
				$ANS22=$v["ANS22"];
				$ANS23=$v["ANS23"];
				$ANS26=$v["ANS26"];
				$ANS27=$v["ANS27"];
				$ANS29=$v["ANS29"];
				$ANS32=$v["ANS32"];
				$ANS33=$v["ANS33"];
				$ANS35=$v["ANS35"];
				$ANS36=$v["ANS36"];
				$ANS37=$v["ANS37"];
				$ANS40=$v["ANS40"];
				$ANS41=$v["ANS41"];
				$ANS43=$v["ANS43"];
				$ANS46=$v["ANS46"];
				$ANS48=$v["ANS48"];
				$ANS52=$v["ANS52"];
				$ANS53=$v["ANS53"];
				$ANS54=$v["ANS54"];
				$ANS65=$v["ANS65"];
				$ANS66=$v["ANS66"];
				$ANS67=$v["ANS67"];
				$ANS68=$v["ANS68"];
				$ANS72=$v["ANS72"];
				$ANS73=$v["ANS73"];
				$ANS75=$v["ANS75"];
				$ANS83=$v["ANS83"];
				$ANS84=$v["ANS84"];
				$ANS87=$v["ANS87"];
				$ANS88=$v["ANS88"];
				$ANS92=$v["ANS92"];
				$ANS98=$v["ANS98"];
				$ANS99=$v["ANS99"];
				$ANS100=$v["ANS100"];
				$ANS101=$v["ANS101"];
				$ANS102=$v["ANS102"];
				$ANS103=$v["ANS103"];
				$ANS104=$v["ANS104"];
				$ANS105=$v["ANS105"];
				$ANS106=$v["ANS106"];
				$ANS107=$v["ANS107"];
				$ANS108=$v["ANS108"];
				$ANS109=$v["ANS109"];
				$ANS110=$v["ANS110"];
				$ANS111=$v["ANS111"];
				$ANS112=$v["ANS112"];
				$ANS113=$v["ANS113"];
				$remark6=$v["remark6"];
				$remark7=$v["remark7"];
				$remark8=$v["remark8"];
				$remark16=$v["remark16"];
				$remark21=$v["remark21"];
				$remark22=$v["remark22"];
				$remark23=$v["remark23"];
				$remark26=$v["remark26"];
				$remark27=$v["remark27"];
				$remark29=$v["remark29"];
				$remark32=$v["remark32"];
				$remark33=$v["remark33"];
				$remark35=$v["remark35"];
				$remark36=$v["remark36"];
				$remark37=$v["remark37"];
				$remark40=$v["remark40"];
				$remark41=$v["remark41"];
				$remark43=$v["remark43"];
				$remark46=$v["remark46"];
				$remark48=$v["remark48"];
				$remark52=$v["remark52"];
				$remark53=$v["remark53"];
				$remark54=$v["remark54"];
				$remark65=$v["remark65"];
				$remark66=$v["remark66"];
				$remark67=$v["remark67"];
				$remark68=$v["remark68"];
				$remark72=$v["remark72"];
				$remark73=$v["remark73"];
				$remark75=$v["remark75"];
				$remark83=$v["remark83"];
				$remark84=$v["remark84"];
				$remark87=$v["remark87"];
				$remark88=$v["remark88"];
				$remark92=$v["remark92"];
				$remark98=$v["remark98"];
				$remark99=$v["remark99"];
				$remark100=$v["remark100"];
				$remark101=$v["remark101"];
				$remark102=$v["remark102"];
				$remark103=$v["remark103"];
				$remark104=$v["remark104"];
				$remark105=$v["remark105"];
				$remark106=$v["remark106"];
				$remark107=$v["remark107"];
				$remark108=$v["remark108"];
				$remark109=$v["remark109"];
				$remark110=$v["remark110"];
				$remark111=$v["remark111"];
				$remark112=$v["remark112"];
				$remark113=$v["remark113"];

			$template->assign_block_vars('listrow', array(
		 'BENCH_ID'=>$bench_id,
			    'MEM_ID'=>$mem_id,
			    'BALANCE_SHEET'=>$balance_sheet,
		    'INCOME_MONTH'=>$income_month,
			    'INCOME_ENDED'=>$income_ended,

				));

/*

		$template->assign_block_vars('listrow', array(
		 'BENCH_ID'=>$bench_id,
			    'MEM_ID'=>$mem_id,
			    'BALANCE_SHEET'=>$balance_sheet,
			    'C6'=>number_format($C6,2,'.',','),
			    'C7'=>number_format($C7,2,'.',','),
			    'C8'=>number_format($C8,2,'.',','),
			    'C11'=>number_format($C11,2,'.',','),
			    'C14'=>number_format($C14,2,'.',','),
			    'C15'=>number_format($C15,2,'.',','),
			    'C16'=>number_format($C16,2,'.',','),
			    'C19'=>number_format($C19,2,'.',','),
			    'C20'=>number_format($C20,2,'.',','),
			    'C21'=>number_format($C21,2,'.',','),
			    'C22'=>number_format($C22,2,'.',','),
			    'C23'=>number_format($C23,2,'.',','),
			    'C26'=>number_format($C26,2,'.',','),
			    'C27'=>number_format($C27,2,'.',','),
			    'C28'=>number_format($C28,2,'.',','),
			    'C29'=>number_format($C29,2,'.',','),
			    'C32'=>number_format($C32,2,'.',','),
			    'C33'=>number_format($C33,2,'.',','),
			    'C34'=>number_format($C34,2,'.',','),
			    'C35'=>number_format($C35,2,'.',','),
			    'C36'=>number_format($C36,2,'.',','),
			    'C37'=>number_format($C37,2,'.',','),
			    'C40'=>number_format($C40,2,'.',','),
			    'C41'=>number_format($C41,2,'.',','),
			    'C42'=>number_format($C42,2,'.',','),
			    'C43'=>number_format($C43,2,'.',','),
			    'C46'=>number_format($C46,2,'.',','),
			    'C47'=>number_format($C47,2,'.',','),
			    'C48'=>number_format($C48,2,'.',','),
			    'C49'=>number_format($C49,2,'.',','),
			    'C52'=>number_format($C52,2,'.',','),
			    'C53'=>number_format($C53,2,'.',','),
			    'C54'=>number_format($C54,2,'.',','),
			    'C55'=>number_format($C55,2,'.',','),
			    'C56'=>number_format($C56,2,'.',','),
			    'INCOME_MONTH'=>$income_month,
			    'INCOME_ENDED'=>$income_ended,
			    'C63'=>number_format($C63,2,'.',','),
			    'C64'=>number_format($C64,2,'.',','),
			    'C65'=>number_format($C65,2,'.',','),
			    'C66'=>number_format($C66,2,'.',','),
			    'C67'=>number_format($C67,2,'.',','),
			    'C68'=>number_format($C68,2,'.',','),
			    'C69'=>number_format($C69,2,'.',','),
			    'C72'=>number_format($C72,2,'.',','),
			    'C73'=>number_format($C73,2,'.',','),
			    'C74'=>number_format($C74,2,'.',','),
			    'C75'=>number_format($C75,2,'.',','),
			    'C76'=>number_format($C76,2,'.',','),
			    'C78'=>number_format($C78,2,'.',','),
			    'C79'=>number_format($C79,2,'.',','),
			    'C80'=>number_format($C80,2,'.',','),
			    'C81'=>number_format($C81,2,'.',','),
			    'C82'=>number_format($C82,2,'.',','),
			    'C83'=>number_format($C83,2,'.',','),
			    'C84'=>number_format($C84,2,'.',','),
			    'C85'=>number_format($C85,2,'.',','),
			    'C86'=>number_format($C86,2,'.',','),
			    'C87'=>number_format($C87,2,'.',','),
			    'C88'=>number_format($C88,2,'.',','),
			    'C91'=>number_format($C91,2,'.',','),
			    'C92'=>number_format($C92,2,'.',','),
			    'C93'=>number_format($C93,2,'.',','),
			    'C94'=>number_format($C94,2,'.',','),
			    'C95'=>number_format($C95,2,'.',','),
			    'C96'=>number_format($C96,2,'.',','),
			    'C98'=>number_format($C98,2,'.',','),
			    'C99'=>number_format($C99,2,'.',','),
			    'C100'=>number_format($C100,2,'.',','),
			    'C101'=>number_format($C101,2,'.',','),
			    'C102'=>number_format($C102,2,'.',','),
			    'C103'=>number_format($C103,2,'.',','),
			    'C104'=>number_format($C104,2,'.',','),
			    'C105'=>number_format($C105,2,'.',','),
			    'C106'=>number_format($C106,2,'.',','),
			    'C107'=>number_format($C107,2,'.',','),
			    'C108'=>number_format($C108,2,'.',','),
			    'C109'=>number_format($C109,2,'.',','),
			    'C110'=>number_format($C110,2,'.',','),
			    'C111'=>number_format($C111,2,'.',','),
			    'C112'=>number_format($C112,2,'.',','),
			    'C113'=>number_format($C113,2,'.',','),

 'P6'=>number_format($P6,2,'.',','),
			    'P7'=>number_format($P7,2,'.',','),
			    'P8'=>number_format($P8,2,'.',','),
			    'P11'=>number_format($P11,2,'.',','),
			    'P14'=>number_format($P14,2,'.',','),
			    'P15'=>number_format($P15,2,'.',','),
			    'P16'=>number_format($P16,2,'.',','),
			    'P19'=>number_format($P19,2,'.',','),
			    'P20'=>number_format($P20,2,'.',','),
			    'P21'=>number_format($P21,2,'.',','),
			    'P22'=>number_format($P22,2,'.',','),
			    'P23'=>number_format($P23,2,'.',','),
			    'P26'=>number_format($P26,2,'.',','),
			    'P27'=>number_format($P27,2,'.',','),
			    'P28'=>number_format($P28,2,'.',','),
			    'P29'=>number_format($P29,2,'.',','),
			    'P32'=>number_format($P32,2,'.',','),
			    'P33'=>number_format($P33,2,'.',','),
			    'P34'=>number_format($P34,2,'.',','),
			    'P35'=>number_format($P35,2,'.',','),
			    'P36'=>number_format($P36,2,'.',','),
			    'P37'=>number_format($P37,2,'.',','),
			    'P40'=>number_format($P40,2,'.',','),
			    'P41'=>number_format($P41,2,'.',','),
			    'P42'=>number_format($P42,2,'.',','),
			    'P43'=>number_format($P43,2,'.',','),
			    'P46'=>number_format($P46,2,'.',','),
			    'P47'=>number_format($P47,2,'.',','),
			    'P48'=>number_format($P48,2,'.',','),
			    'P49'=>number_format($P49,2,'.',','),
			    'P52'=>number_format($P52,2,'.',','),
			    'P53'=>number_format($P53,2,'.',','),
			    'P54'=>number_format($P54,2,'.',','),
			    'P55'=>number_format($P55,2,'.',','),
			    'P56'=>number_format($P56,2,'.',','),
			    'P63'=>number_format($P63,2,'.',','),
			    'P64'=>number_format($P64,2,'.',','),
			    'P65'=>number_format($P65,2,'.',','),
			    'P66'=>number_format($P66,2,'.',','),
			    'P67'=>number_format($P67,2,'.',','),
			    'P68'=>number_format($P68,2,'.',','),
			    'P69'=>number_format($P69,2,'.',','),
			    'P72'=>number_format($P72,2,'.',','),
			    'P73'=>number_format($P73,2,'.',','),
			    'P74'=>number_format($P74,2,'.',','),
			    'P75'=>number_format($P75,2,'.',','),
			    'P76'=>number_format($P76,2,'.',','),
			    'P78'=>number_format($P78,2,'.',','),
			    'P79'=>number_format($P79,2,'.',','),
			    'P80'=>number_format($P80,2,'.',','),
			    'P81'=>number_format($P81,2,'.',','),
			    'P82'=>number_format($P82,2,'.',','),
			    'P83'=>number_format($P83,2,'.',','),
			    'P84'=>number_format($P84,2,'.',','),
			    'P85'=>number_format($P85,2,'.',','),
			    'P86'=>number_format($P86,2,'.',','),
			    'P87'=>number_format($P87,2,'.',','),
			    'P88'=>number_format($P88,2,'.',','),
			    'P91'=>number_format($P91,2,'.',','),
			    'P92'=>number_format($P92,2,'.',','),
			    'P93'=>number_format($P93,2,'.',','),
			    'P94'=>number_format($P94,2,'.',','),
			    'P95'=>number_format($P95,2,'.',','),
			    'P96'=>number_format($P96,2,'.',','),
			    'P98'=>number_format($P98,2,'.',','),
			    'P99'=>number_format($P99,2,'.',','),
			    'P100'=>number_format($P100,2,'.',','),
			    'P101'=>number_format($P101,2,'.',','),
			    'P102'=>number_format($P102,2,'.',','),
			    'P103'=>number_format($P103,2,'.',','),
			    'P104'=>number_format($P104,2,'.',','),
			    'P105'=>number_format($P105,2,'.',','),
			    'P106'=>number_format($P106,2,'.',','),
			    'P107'=>number_format($P107,2,'.',','),
			    'P108'=>number_format($P108,2,'.',','),
			    'P109'=>number_format($P109,2,'.',','),
			    'P110'=>number_format($P110,2,'.',','),
			    'P111'=>number_format($P111,2,'.',','),
			    'P112'=>number_format($P112,2,'.',','),
			    'P113'=>number_format($P113,2,'.',','),

			    'ANS6'=>$ANS6,
			    'ANS7'=>$ANS7,
			    'ANS8'=>$ANS8,
			    'ANS16'=>$ANS16,
			    'ANS21'=>$ANS21,
			    'ANS22'=>$ANS22,
			    'ANS23'=>$ANS23,
			    'ANS26'=>$ANS26,
			    'ANS27'=>$ANS27,
			    'ANS29'=>$ANS29,
			    'ANS32'=>$ANS32,
			    'ANS33'=>$ANS33,
			    'ANS35'=>$ANS35,
			    'ANS36'=>$ANS36,
			    'ANS37'=>$ANS37,
			    'ANS40'=>$ANS40,
			    'ANS41'=>$ANS41,
			    'ANS43'=>$ANS43,
			    'ANS46'=>$ANS46,
			    'ANS48'=>$ANS48,
			    'ANS52'=>$ANS52,
			    'ANS53'=>$ANS53,
			    'ANS54'=>$ANS54,
			    'ANS65'=>$ANS65,
			    'ANS66'=>$ANS66,
			    'ANS67'=>$ANS67,
			    'ANS68'=>$ANS68,
			    'ANS72'=>$ANS72,
			    'ANS73'=>$ANS73,
			    'ANS75'=>$ANS75,
			    'ANS83'=>$ANS83,
			    'ANS84'=>$ANS84,
			    'ANS87'=>$ANS87,
			    'ANS88'=>$ANS88,
			    'ANS92'=>$ANS92,
			    'ANS98'=>$ANS98,
			    'ANS99'=>$ANS99,
			    'ANS100'=>$ANS100,
			    'ANS101'=>$ANS101,
			    'ANS102'=>$ANS102,
			    'ANS103'=>$ANS103,
			    'ANS104'=>$ANS104,
			    'ANS105'=>$ANS105,
			    'ANS106'=>$ANS106,
			    'ANS107'=>$ANS107,
			    'ANS108'=>$ANS108,
			    'ANS109'=>$ANS109,
			    'ANS110'=>$ANS110,
			    'ANS111'=>$ANS111,
			    'ANS112'=>$ANS112,
			    'ANS113'=>$ANS113,
			    'REMARK6'=>$remark6,
			    'REMARK7'=>$remark7,
			    'REMARK8'=>$remark8,
			    'REMARK16'=>$remark16,
			    'REMARK21'=>$remark21,
			    'REMARK22'=>$remark22,
			    'REMARK23'=>$remark23,
			    'REMARK26'=>$remark26,
			    'REMARK27'=>$remark27,
			    'REMARK29'=>$remark29,
			    'REMARK32'=>$remark32,
			    'REMARK33'=>$remark33,
			    'REMARK35'=>$remark35,
			    'REMARK36'=>$remark36,
			    'REMARK37'=>$remark37,
			    'REMARK40'=>$remark40,
			    'REMARK41'=>$remark41,
			    'REMARK43'=>$remark43,
			    'REMARK46'=>$remark46,
			    'REMARK48'=>$remark48,
			    'REMARK52'=>$remark52,
			    'REMARK53'=>$remark53,
			    'REMARK54'=>$remark54,
			    'REMARK65'=>$remark65,
			    'REMARK66'=>$remark66,
			    'REMARK67'=>$remark67,
			    'REMARK68'=>$remark68,
			    'REMARK72'=>$remark72,
			    'REMARK73'=>$remark73,
			    'REMARK75'=>$remark75,
			    'REMARK83'=>$remark83,
			    'REMARK84'=>$remark84,
			    'REMARK87'=>$remark87,
			    'REMARK88'=>$remark88,
			    'REMARK92'=>$remark92,
			    'REMARK98'=>$remark98,
			    'REMARK99'=>$remark99,
			    'REMARK100'=>$remark100,
			    'REMARK101'=>$remark101,
			    'REMARK102'=>$remark102,
			    'REMARK103'=>$remark103,
			    'REMARK104'=>$remark104,
			    'REMARK105'=>$remark105,
			    'REMARK106'=>$remark106,
			    'REMARK107'=>$remark107,
			    'REMARK108'=>$remark108,
			    'REMARK109'=>$remark109,
			    'REMARK110'=>$remark110,
			    'REMARK111'=>$remark111,
			    'REMARK112'=>$remark112,
			    'REMARK113'=>$remark113,
			       
        'U_DEL'=>$del,
		'U_EDIT'=>$edit
		)	);

		*/
	} // end while
//------ Comment ------
		$table="formula";
		$fieldArr ="for_id,code,name,goals,formula,comment";
		$searchkey=" ";
	$result=SearchDB( $searchkey,$table,$fieldArr);
		while($v= $db->sql_fetchrow($result) )
		{

				//$for_id=$v["for_id"];
				$code=$v["code"];
				//$name=$v["name"];
				//$goals=$v["goals"];
				//$formula=$v["formula"];
				$comment=$v["comment"];

				if( substr($code,0,1)=="P")
				{
				
					$v_name="CP";
				}else{
						$v_name=$code;
					}
				@eval($v_name);

				$template->assign_vars(array("$v_name"=>nl2br($comment )  ));
		}


//***** Cal P =====
		$page=1;
		$page_list=500;
		$table="balancesheet";
		$fieldArr ="bal_id,NO,ASSETS,CVAL,P_FORMULA,PEARLS";
		$searchkey=" order by NO";

		list($totalpage1,$result)=SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list);
		 if($db->sql_numrows())
		{
		while($v= $db->sql_fetchrow($result) )
		{

				$bal_id=$v["bal_id"];
				$NO=$v["NO"];
				$ASSETS=$v["ASSETS"];
				$CVAL=$v["CVAL"];
				$P_FORMULA=$v["P_FORMULA"];
				$PEARLS=$v["PEARLS"];

				if(!empty($P_FORMULA))
			   {
				 @eval($P_FORMULA);

			   }
	} // end while
}// end if

//----- Assign Value
 if(empty($next))
{	

for($i=6;$i<=113;$i++)
	{
	 $cval="C$i";
	 $pval ="P$i";
		$val ="ANS$i";

		 if($$cval!=0){ 
			 $C = number_format($$cval,2,'.',','); 
		 }else{
		$C="";
		 }


		 if($$pval!=0){ 
			 $P = number_format($$pval,2,'.',','); 
		 }else{
		$P="";
		 }
				if($$val!=0){
							$PEAR= number_format($$val,2,'.',','); 
				}else{
							$PEAR="";
				}

   $rem="remark$i";
		$template->assign_vars(array(
			"$cval"=>$C,
			"$pval"=>$P,
			"$val"=>$PEAR,
			"REMARK$i"=>$$rem
					));
	}



}// end if

		}// end if  (empty($next))

$table="bench_result";
			$fieldArr =" * ";
			$searchkey=" and mem_id='$mem_id'  and   bench_id =$bench_id ";
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
				$P1_SCORE=$row["P1_SCORE"];
				$P2_SCORE=$row["P2_SCORE"];
				$P5_SCORE=$row["P5_SCORE"];
				$P6_SCORE=$row["P6_SCORE"];
				$E1_SCORE=$row["E1_SCORE"];
				$E2_SCORE=$row["E2_SCORE"];
				$E3_SCORE=$row["E3_SCORE"];
				$E4_SCORE=$row["E4_SCORE"];
				$E5_SCORE=$row["E5_SCORE"];
				$E6_SCORE=$row["E6_SCORE"];
				$E7_SCORE=$row["E7_SCORE"];
				$E8_SCORE=$row["E8_SCORE"];
				$E9_SCORE=$row["E9_SCORE"];
				$A1_SCORE=$row["A1_SCORE"];
				$A2_SCORE=$row["A2_SCORE"];
				$A3_SCORE=$row["A3_SCORE"];
				$R9_SCORE=$row["R9_SCORE"];
				$L1_SCORE=$row["L1_SCORE"];
				$L2_SCORE=$row["L2_SCORE"];
				$L3_SCORE=$row["L3_SCORE"];
				
				$template->assign_vars(array(
			    'P1'=>number_format($P1,2,'.',','),
			    'P2'=>number_format($P2,2,'.',','),
			    'P3'=>number_format($P3,2,'.',','),
			    'P4'=>number_format($P4,2,'.',','),
			    'P5'=>number_format($P5,2,'.',','),
			    'P6'=>number_format($P6,2,'.',','),
			    'E1'=>number_format($E1,2,'.',','),
			    'E2'=>number_format($E2,2,'.',','),
			    'E3'=>number_format($E3,2,'.',','),
			    'E4'=>number_format($E4,2,'.',','),
			    'E5'=>number_format($E5,2,'.',','),
			    'E6'=>number_format($E6,2,'.',','),
			    'E7'=>number_format($E7,2,'.',','),
			    'E8'=>number_format($E8,2,'.',','),
			    'E9'=>number_format($E9,2,'.',','),
			    'A1'=>number_format($A1,2,'.',','),
			    'A2'=>number_format($A2,2,'.',','),
			    'A3'=>number_format($A3,2,'.',','),
			    'R1'=>number_format($R1,2,'.',','),
			    'R2'=>number_format($R2,2,'.',','),
			    'R3'=>number_format($R3,2,'.',','),
			    'R4'=>number_format($R4,2,'.',','),
			    'R5'=>number_format($R5,2,'.',','),
			    'R6'=>number_format($R6,2,'.',','),
			    'R7'=>number_format($R7,2,'.',','),
			    'R8'=>number_format($R8,2,'.',','),
			    'R9'=>number_format($R9,2,'.',','),
			    'R10'=>number_format($R10,2,'.',','),
			    'R11'=>number_format($R11,2,'.',','),
			    'R12'=>number_format($R12,2,'.',','),
			    'L1'=>number_format($L1,2,'.',','),
			    'L2'=>number_format($L2,2,'.',','),
			    'L3'=>number_format($L3,2,'.',','),
			    'S1'=>number_format($S1,2,'.',','),
			    'S2'=>number_format($S2,2,'.',','),
			    'S3'=>number_format($S3,2,'.',','),
			    'S4'=>number_format($S4,2,'.',','),
			    'S5'=>number_format($S5,2,'.',','),
			    'S6'=>number_format($S6,2,'.',','),
			    'S7'=>number_format($S7,2,'.',','),
			    'S8'=>number_format($S8,2,'.',','),
			    'S9'=>number_format($S9,2,'.',','),
			    'S10'=>number_format($S10,2,'.',','),
			    'S11'=>number_format($S11,2,'.',','),
			    'P1_SCORE'=>number_format($P1_SCORE,2,'.',','),
			    'P2_SCORE'=>number_format($P2_SCORE,2,'.',','),
			    'P5_SCORE'=>number_format($P5_SCORE,2,'.',','),
			    'P6_SCORE'=>number_format($P6_SCORE,2,'.',','),
			    'E1_SCORE'=>number_format($E1_SCORE,2,'.',','),
			    'E2_SCORE'=>number_format($E2_SCORE,2,'.',','),
			    'E3_SCORE'=>number_format($E3_SCORE,2,'.',','),
			    'E4_SCORE'=>number_format($E4_SCORE,2,'.',','),
			    'E5_SCORE'=>number_format($E5_SCORE,2,'.',','),
			    'E6_SCORE'=>number_format($E6_SCORE,2,'.',','),
			    'E7_SCORE'=>number_format($E7_SCORE,2,'.',','),
			    'E8_SCORE'=>number_format($E8_SCORE,2,'.',','),
			    'E9_SCORE'=>number_format($E9_SCORE,2,'.',','),
			    'A1_SCORE'=>number_format($A1_SCORE,2,'.',','),
			    'A2_SCORE'=>number_format($A2_SCORE,2,'.',','),
			    'A3_SCORE'=>number_format($A3_SCORE,2,'.',','),
			    'R9_SCORE'=>number_format($R9_SCORE,2,'.',','),
			    'L1_SCORE'=>number_format($L1_SCORE,2,'.',','),
			    'L2_SCORE'=>number_format($L2_SCORE,2,'.',','),
			    'L3_SCORE'=>number_format($L3_SCORE,2,'.',',')
			    

	)	);

			}


	
	$template->assign_vars(array(
		'link1'=>"$index_file?m=$module_name&op=listbench&page=$page",
		'link2'=>"$index_file?m=$module_name&op=listbench&page=$page&next=1",
		'JAVA_URL'=>"$index_file?m=$module_name&op=del",
		'U_ADD'=>"$index_file?m=$module_name&op=inputbench&gr=$gr"
		)	);

	


	   $menu=GetMenu();
	$template->SetImagePath("");
	$html_code =  $template->pparse_str('listform');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code ,
	  'COUNT'=>Counter()
		)	);
  $template->SetImagePath("");
   $template->pparse('body');


}

?>