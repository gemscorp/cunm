<?php
//##################################

// SESSion
if (eregi("mainfile.php",$_SERVER['PHP_SELF'])) {
    Header("Location: index.php");
    die();
}

session_start ( );
if (!isset($_SESSION['MEMBER'])) {
   $_SESSION["MEMBER"] = "";
   $MEMBER="";
}
if (!isset($_SESSION['ADMIN'])) {
   $_SESSION["ADMIN"] = "";
   $ADMIN="";
}


if (!isset($_SESSION['CNT'])) {
   $_SESSION["CNT"] = 1;
   $CNT=1;
}


//##################################

$phpver = phpversion();


$phpver = explode(".", $phpver);
$phpver = "$phpver[0]$phpver[1]";
if ($phpver >= 41) {
    $PHP_SELF = $_SERVER['PHP_SELF'];
}
/*
if (!ini_get("register_globals")) {
    import_request_variables('GPC');
}
*/

if (eregi("mainfile.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}

    require_once("includes/config.php");
    require_once("includes/db.php");
	
	require_once("includes/form.inc.php");
	require_once("includes/array.php");
	require_once("includes/template.php");
    require_once("includes/sql_layer.php");
    
	$dbi = sql_connect($dbhost, $dbuname, $dbpass, $dbname);

	$template = new Template;

//###############################################3
//#  Some Function
//###############################################

function is_user($member) {
    global  $db;
    if(!is_array($member)) {
	$member = base64_decode($member);
	$member = explode(":", $member);
	if (array_key_exists(0,$member)){$mid = "$member[0]"; }else{$mid="";}
    if (array_key_exists(2,$member)){$pwd = "$member[2]"; }else{$pwd="";}    

    } else {
        $mid = "$member[0]";
	   $pwd = "$member[2]";
    }

    if ($mid != "" AND $pwd != "") {
	$sql = "SELECT password FROM  member WHERE MID='$mid'";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$pass = $row["password"];
	if($pass == $pwd && $pass != "") {
	    return 1;
	}
    }
    return 0;
}


function is_admin($admin) {
    global $prefix, $db;
    if(!is_array($admin)) {
	$admin = base64_decode($admin);
	$admin = explode(":", $admin);
	  if (array_key_exists(0,$admin)){$aid = "$admin[0]"; }else{ $aid="";  }
          if (array_key_exists(2,$admin)){$pwd = "$admin[2]"; }else{$pwd="";}  

    } else {
        $aid = "$admin[0]";
	$pwd = "$admin[2]";
    }
    if ($aid != "" AND $pwd != "") {
	$sql = "SELECT password FROM member  where MID='$aid'  and admin=1";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$pass = $row["password"];
	if($pass == $pwd && $pass != "") {
	    return 1;
	}
    }
    return 0;
}

function getadmininfo($admin) {
    global $admininfo,  $db;
    $admin2 = base64_decode($admin);
    $admin3 = explode(":", $admin2);
    $sql = "SELECT * FROM  member   WHERE username='$admin3[1]' AND password='$admin3[2]' and admin=1";

    $result = $db->sql_query($sql);
    if ($db->sql_numrows($result) == 1) {
    	$admininfo = $db->sql_fetchrow($result);
    }
    return $admininfo;
}



function membercookie($mem_id, $username, $password,$member_of,$com_id,$brance_id) {
	global $MEMBER;
    $info = base64_encode("$mem_id:$username:$password:$member_of:$com_id:$brance_id");

   setcookie("member","$info",time()+3600);
   // Wriete Session
$MEMBER=$info;
return $info;
}


 function cookieMemberdecode($member) {
    global $cookie,  $db ;
    $member = base64_decode($member);
    $cookie = explode(":", $member);  

    $sql = "SELECT password1  FROM member  WHERE  username= '$cookie[1]'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $pass = $row["password1"];
    if ($cookie[2] == $pass && $pass != "") {
	return $cookie;
    } else {
	unset($member);
	unset($cookie);
    }
}

function admincookie($mem_id, $username, $password,$member_of,$com_id,$brance_id) {
	global $ADMIN;
    $info = base64_encode("$mem_id:$username:$password:$member_of:$com_id:$brance_id");
   setcookie("admin","$info",time()+3600);

   // Wriete Session
$ADMIN=$info;
return $info;
}
 
 function cookieAdmindecode($admin) {
    global $cookie,  $db ;
    $admin = base64_decode($admin);
    $cookie = explode(":", $admin);  
 if (array_key_exists(1,$cookie)){ $uname = $cookie[1];}else{$uname="";}
 if (array_key_exists(2,$cookie)){ $pws = $cookie[2];}else{$pws="";}

    $sql = "SELECT password FROM member  WHERE username='$uname' ";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $pass = $row["password"];

    if ($pws == $pass && $pass != "") {
	return $cookie;

    } else {
	unset($admin);
	unset($cookie);
    }
}



function docookie($setuid, $setusername, $setpass) {
    $info = base64_encode("$setuid:$setusername:$setpass");
    setcookie("user","$info",time()+3600);
}



function SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list)
{
			 global  $db;
       	 unset($query);
		 unset($result);
		 $query ="SELECT $fieldArr  from $table where 1  $searchkey ";
		 $result = $db->sql_query($query);

  if (empty($page)){
			$page=1;
			} 

$NRow =$db->sql_numrows($result); 

			$rt = $NRow%$page_list;
		if($rt!=0) { 
		$totalpage = floor($NRow/$page_list)+1; 
		}
		else {
		$totalpage = floor($NRow/$page_list); 
		}
		$goto = ($page-1)*$page_list;
		 unset($result);
          
          $query =$query." LIMIT $goto,$page_list";

		  $result = $db->sql_query($query);

return array($totalpage,$result);

}



function QueryListPage( $query,$page,$page_list)
{
			 global  $db;
       //	 unset($query);
		 	unset($result);
		 //$query ="SELECT $fieldArr  from $table where 1  $searchkey ";
		 	$result = $db->sql_query($query);

  if (empty($page)){
			$page=1;
			} 

$NRow =$db->sql_numrows($result); 

			$rt = $NRow%$page_list;
		if($rt!=0) { 
		$totalpage = floor($NRow/$page_list)+1; 
		}
		else {
		$totalpage = floor($NRow/$page_list); 
		}
		$goto = ($page-1)*$page_list;
		 unset($result);
          
          $query =$query." LIMIT $goto,$page_list";

		  $result = $db->sql_query($query);

return array($totalpage,$result);

}


function List_Page($page,$totalpage,$link)
{
 echo "<font face=\"Arial\" size=\"2\" color=\"#000080\">&nbsp;<span lang=\"th\"> Page No. &nbsp;</font>\n";
           echo "<font face=\"Arial\" size=\"2\" color=\"#000080\"> <b>";
        for($i=1 ; $i<$page ; $i++) {
			echo "\t  |&nbsp;<a style=\"text-decoration: none\"  href='$link&page=$i'>$i</a> \n";
		  }
        echo "\t  | </b></font><font size=2 color=red> <b>$page</b></font> \n";
        echo "<font face=\"Arial\" size=\"2\" color=\"#000080\"> <b>";
      for($i=$page+1 ; $i<=$totalpage ; $i++) {
			echo "\t  |&nbsp;<a style=\"text-decoration: none\" href='$link&page=$i'>$i</a> \n";

		    }
     echo "</b></font> \n";
    echo " </span> \n";
    echo "</font> \n";

}


function List_PageStr($page,$totalpage,$link)
{
 $str= "<font face=\"Arial\" size=\"2\" color=\"#000080\">&nbsp;<span lang=\"th\"> No. &nbsp;</font>\n";
           $str.="<font face=\"Arial\" size=\"2\" color=\"#000080\"> <b>";
        for($i=1 ; $i<$page ; $i++) {
			$str.= "\t  |&nbsp;<a style=\"text-decoration: none\"  href='$link&page=$i'>$i</a> \n";
		  }
        $str.= "\t  | </b></font><font size=2 color=red> <b>$page</b></font> \n";
        $str.= "<font face=\"Arial\" size=\"2\" color=\"#000080\"> <b>";
      for($i=$page+1 ; $i<=$totalpage ; $i++) {
			$str.= "\t  |&nbsp;<a style=\"text-decoration: none\" href='$link&page=$i'>$i</a> \n";

		    }
     $str.= "</b></font> \n";
    $str.= " </span> \n";
    $str.= "</font> \n";
return $str;
}


function SearchSingleDB( $searchkey,$table,$field)
{
	 global  $db;		
       	 unset($query);
		 unset($result);
		 $query ="SELECT  $field  from $table where 1  $searchkey ";

$result = $db->sql_query($query);
		
      //  $value=array();
$field= trim($field);
$value="";
      while ($row = $db->sql_fetchrow($result)) {
    //  id, username, password, name, lastname, address1, address2, address3, tel, fax, email
    //  $id = $row["id"];
      $value =  $row["$field"];
	  }

return $value;

}


function SaveDB( $table,$field,$data)
{
 global  $db;	
		 $query ="INSERT INTO  $table (  $field  )  VALUES (  $data  ) ";

$result = $db->sql_query($query);


}

function SaveEditDB( $table,$dataset,$condition)
{
 global  $db;	
       	 unset($query);
		 unset($result);

		 $query ="UPDATE $table  SET  $dataset  WHERE  $condition ";

			 $result = $db->sql_query($query);


}


function SearchDB( $searchkey,$table,$fieldArr)
{
		 global  $db;	
       	 unset($query);
		 unset($result);
		 $query ="SELECT $fieldArr  from $table where 1  $searchkey ";
$result = $db->sql_query($query);

//$NRow  =$db->sql_numrows($result); 


return $result;

}


//
function LoadPic($pathpic,$filename,$str="",$width="",$height="")
{
	 if(!empty($width) && !empty($height))
	{
	 $size="width=\"$width\" height=\"$height\"";
	}else{
	$size="";
	}

	 if(!empty($filename) ) {
		echo "<img border=\"0\" src=\"$pathpic/$filename\"  $size  > ";

		if($str=="br"){ echo"<br>"; }
	 }
}
function LoadHot($hot)
{
		$str="";
    if($hot)
	{
    $str= LoadPicStr("images","hot.gif");
	}

	return $str;
}

function LoadNew($new)
{
		$str="";
    if($new)
	{
    $str= LoadPicStr("images","new.gif");
	}

	return $str;
}

function LoadPicStr($pathpic,$filename,$str="",$width="",$height="")
{
	 if(!empty($width) && !empty($height))
	{
	 $size="width=\"$width\" height=\"$height\"";
	}else{
	$size="";
	}

	 if(!empty($filename) && file_exists("$pathpic/$filename") ) {
		$picstr= "<img border=\"0\" src=\"$pathpic/$filename\"  $size  > ";

		if($str=="br"){ $picstr.="<br>"; }
	 }
	 return $picstr;
}
function CheckURLFile($file)
{
	 $str="";
    if(file_exists($file) ) {
      $str=$file;
	}
	return $str;
}

function ShowLink($linkname,$filepath,$filelink)
{
    if(!empty($filelink)){
     echo"<br>";
	 echo "$linkname<a href=%22$filepath/$filelink/%22>$filelink</a>";

	}
}
function Chr2BR($str)
{
echo str_replace (chr(13), "<br>", $str);

}


function LoginForm($msg,$next_name="",$next_op="")
{
global $db,$member,$module_name,$mainframe,$template;

	$template->SetImagePath("modules/$module_name/");
	$module_file="modules/$module_name/loginform.php";
	$template->set_filenames(array(
		'login' => $module_file));

	$template->assign_vars(array(
      'ACTION'=> $index_file ,
		'M'=>$module_name,
		'OP'=>"loginck",
		'NEXT_NAME'=>$next_name,
		'NEXT_OP'=>$next_op,
		'MSG'=>$msg
		)	);

			$html_code =  $template->pparse_str('login');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code ,
		'COUNT'=>Counter()
		)	);
	$template->SetImagePath("");
   $template->pparse('body');


}


?>
