<?php

function OptionDBCK( $selectvalue,$table,$fieldID,$fieldArr,$condition)
{
		global $db;
		
       	 unset($query);
		 unset($result);
		$str="";
   		$Narray=array();
  		$marray = explode(",",$fieldArr);
   
   for($a=0;$a<count($marray);$a++)
	{
         $Narray[$a] = trim($marray[$a]);
	}

		 $query ="SELECT *  from $table where 1 $condition ";
		
		$result = $db->sql_query($query);
		if($db->sql_numrows())
		{
				while($row = $db->sql_fetchrow($result))
			{
				$id = $row["$fieldID"];
				$title="";
						for($a=0;$a<count($marray);$a++)
						{
						$title = $title."". $row["$Narray[$a]"];
						}
					   if($id==$selectvalue )
							{
							$str.="<OPTION value=\"$id\"  selected> $title </OPTION>\n";
							}else
							{
							$str.="<OPTION value=\"$id\"> $title  </OPTION>\n ";
               
							}
				}
			}
		return $str;
		}


function CheckBox($name,$value)
{
	$check="";
	if($value){
		$check = "checked";
	}

    $str= "<INPUT type=checkbox value=1 name=$name $check >";
	return $str;

}

function RadioDB($name,$FieldID,$FieldName,$query,$SelectValue)
{
	global $db;
	 //$query ="SELECT *  from $table where 1 $condition ";
 $str="";
		$result = $db->sql_query($query);
		if($db->sql_numrows())
		{
				while($row = $db->sql_fetchrow($result))
			{
					$id = $row["$FieldID"];
					$name_value = $row["$FieldName"];

				if($SelectValue==$id)
				{
					$check = "checked";
				}else{
					$check ="";
				}
        		$str= "<input type=\"radio\" name=\"$name\" value=\"$id\"  $check size=\"20\"> $name_value \n";
				//	<input type="radio" name="payment_option" value="credit" checked> Credit Card
			}
		}
return $str;
}

function RadioText($name,$FieldID,$FieldName,$query,$SelectValue)
{
	global $db;
	$result = $db->sql_query($query);
		if($db->sql_numrows())
		{
				while($row = $db->sql_fetchrow($result))
			{
					$id = $row["$FieldID"];
					$name_value = $row["$FieldName"];

				if($SelectValue==$id)
				{
					$check = "_X_";
				}else{
					$check ="___";
				}
        		echo "$check  $name_value <br> \n";
				 
			}
		}

}

function OptionCK($st,$ed,$value,$arrayname)
{
for($a=$st;$a<=$ed;$a++)
						{ 
							   if($a==$value )
							{
							echo"<OPTION value=\"$a\"  selected> $arrayname[$a] </OPTION>\n";
							}else
							{
							echo"<OPTION value= \"$a\" >$arrayname[$a] </OPTION>\n ";
               
							}
						}

}

function OptionV($st,$ed,$value,$arrayname,$str="")
{
	$msg="";
for($a=$st;$a<=$ed;$a++)
						{ 
				
							if(empty($arrayname[$a])){
							$msg.="<OPTION value= \"0\" >$str </OPTION>\n ";
							}else{

							 if($arrayname[$a]==$value )
							{
							$msg.="<OPTION value=\"$arrayname[$a]\"  selected> $arrayname[$a] </OPTION>\n";
							}else
							{
							$msg.="<OPTION value= \"$arrayname[$a]\" >$arrayname[$a] </OPTION>\n ";
							}

							}
						}
return $msg;
}

function OptionInArray($value,$arrayname,$str="")
{
	$msg="";
   while(list($k,$v)= each($arrayname))
	{
					
				
							if(empty($v)){
							$msg.="<OPTION value= \"0\" >$str </OPTION>\n ";
							}else{

							 if($k==$value )
							{
							$msg.="<OPTION value=\"$k\"  selected> $v </OPTION>\n";
							}else
							{
							$msg.="<OPTION value= \"$k\" >$v </OPTION>\n ";
							}

							}
						}
return $msg;
}


function OptionCKR($st,$ed,$value,$arrayname)
{
for($a=$st;$a<=$ed;$a++)
						{ 
							   if($arrayname[$a]==$value )
							{
							echo"<OPTION value=\"$arrayname[$a]\"  selected> $arrayname[$a] </OPTION>\n";
							}else
							{
							echo"<OPTION value= \"$arrayname[$a]\" >$arrayname[$a] </OPTION>\n ";
               
							}
						}

}

//---------------------------------------------------------------------------------------------------------------
function RadioCK($st,$ed,$value,$name,$arrayname,$js="",$is_br="")
{
		if(empty($is_br))
	{
		$br="";
	}else{
		$br="<br>";
	}
$str="";
				for($a=$st;$a<=$ed;$a++)
								{
										if($value==$a)
									{
	 $str.= " <font face=\"MS Sans Serif\">	\n";					
	$str.=  "<input type=\"radio\" value=\"$a\" name=\"$name\"  checked  $js ><font size=\"2\"> $arrayname[$a] $br</font>\n";  
									}else
									{
			 $str.=  " <font face=\"MS Sans Serif\">	\n";		
			$str.=  "<input type=\"radio\" value=\"$a\" name=\"$name\"  size=\"20\"  $js ><font size=\"2\"> $arrayname[$a]  $br</font>\n"; 								
									}
										
								}
return $str;
}
//---------------------------------------------------------------------------------------------------------------
function RadioV($st,$ed,$value,$name,$arrayname,$is_br="")
{
	 $msg="";
		if(empty($is_br))
	{
		$br="";
	}else{
		$br="<br>";
	}

				for($a=$st;$a<=$ed;$a++)
								{
										if($value==$a)
									{
	 $msg.= " <font face=\"MS Sans Serif\">	\n";					
	$msg.= "<input type=\"radio\" value=\"$a\" name=\"$name\" style=\"color: #EFE7F7; background-color: #EFE7F7\" checked><font size=\"2\"> $arrayname[$a] $br</font>\n";  
									}else
									{
			 $msg.= " <font face=\"MS Sans Serif\">	\n";		
			$msg.= "<input type=\"radio\" value=\"$a\" name=\"$name\" style=\"color: #EFE7F7; background-color: #EFE7F7\" size=\"20\" ><font size=\"2\"> $arrayname[$a]  $br</font>\n"; 								
									}
										
								}
return $msg;
}

//---------------------------------------------------------------------------------------------------------------
function RadioCKV($st,$ed,$value,$name,$arrayname,$arrayvalue, $is_br="")
{
	if(empty($is_br))
	{
		$br="";
	}else{
		$br="<br>";
	}
				for($a=$st;$a<=$ed;$a++)
								{
										if($value==$arrayvalue[$a])
									{
	 echo " <font face=\"MS Sans Serif\">	\n";					
	echo "<input type=\"radio\" value=\"$arrayvalue[$a]\" name=\"$name\" style=\"color: #EFE7F7; background-color: #EFE7F7\" checked><font size=\"2\"> $arrayname[$a] $br</font>\n";  
									}else
									{
			 echo " <font face=\"MS Sans Serif\">	\n";		
			echo "<input type=\"radio\" value=\"$arrayvalue[$a]\" name=\"$name\" style=\"color: #EFE7F7; background-color: #EFE7F7\" size=\"20\" ><font size=\"2\"> $arrayname[$a] $br</font>\n"; 								
									}
										
								}

}


//------------------------------------------------------------------------------------------------------------------
function CheckBoxCK($st,$ed,$array,$name,$arrayname,$str="")
{
	for($a=$st;$a<=$ed;$a++)
								{
             
				$ck=SearchArr($array,$a );
				//$ck = array_search ($a, $array);

				//echo $ck;
              if($ck==1 )
									{
                      echo"<font face=\"MS Sans Serif\" size=\"1\">\n";
                      echo"<INPUT   type=checkbox value=$a\n"; 
                      echo" name=$name"."[$a] style=\"background-color: #EFE7F7\" checked $str ></font><font face=\"MS Sans Serif\" size=\"2\"><span lang=\"th\">\n";
                     echo" </span>$arrayname[$a]<BR>\n";
                     echo" </font>\n";
									}else
									{
						echo"<font face=\"MS Sans Serif\" size=\"1\">\n";
                      echo"<INPUT type=checkbox value=$a\n"; 
                      echo" name=$name"."[$a] style=\"background-color: #EFE7F7\"  $str ></font><font face=\"MS Sans Serif\" size=\"2\"><span lang=\"th\">\n";
                     echo" </span>$arrayname[$a]<BR>\n";
                     echo" </font>\n";
									}
								}
}


//------------------------------------------------------------------------------------------------------------------
function CheckBoxV($st,$ed,$array,$name,$arrayname,$str="")
{
	 $msg="";
	for($a=$st;$a<=$ed;$a++)
								{
             
				$ck=SearchArr($array,$a );
				//$ck = array_search ($a, $array);

				//echo $ck;
              if($ck==1 )
									{
                      $msg.="<font face=\"MS Sans Serif\" size=\"1\">\n";
                      $msg.="<INPUT   type=checkbox value=$a\n"; 
                      $msg.=" name=$name"."[$a] style=\"background-color: #EFE7F7\" checked $str ></font><font face=\"MS Sans Serif\" size=\"2\"><span lang=\"th\">\n";
                     $msg.=" </span>$arrayname[$a]<BR>\n";
                     $msg.=" </font>\n";
									}else
									{
						$msg.="<font face=\"MS Sans Serif\" size=\"1\">\n";
                      $msg.="<INPUT type=checkbox value=$a\n"; 
                      $msg.=" name=$name"."[$a] style=\"background-color: #EFE7F7\"  $str ></font><font face=\"MS Sans Serif\" size=\"2\"><span lang=\"th\">\n";
                     $msg.=" </span>$arrayname[$a]<BR>\n";
                     $msg.=" </font>\n";
									}
								}
					return $msg;
}

function SearchArr($array,$val)
{  
     $ck=0;
for($a=0;$a< count($array);$a++)
	{
     $inarr = $array[$a] +0;
	// echo $inarr;
	 if($inarr == $val) 
		{
		 $ck=1;
		
	       }

	}

return($ck);

}

function ArrayDecode($array,$arrayname)
{
foreach ($array as $val) { 
    if (isset($val)) { 
    // whatever you want to do goes here 
	echo $arrayname[$val]."&nbsp;&nbsp;";
        } 
    else { 
        echo "fill out my form\n"; 
        } 
    } 
}

function DecodeLink($namelink,$valuelink)
{
$goto="";
if(!empty($namelink))
{
	
$nl = explode("*",$namelink);
$l = explode("*",$weblink);
$pl="";
  for($a=0;$a<count($nl);$a++)
	{
     $pl = $pl."&$nl[$a]=$l[$a]";
	}
$goto =$goto."$pl"; 


 }
return $goto;
}


function SavePicture($Var ,$FilePath)
{
global $HTTP_POST_FILES,$_SERVER;
 $Var = trim($Var);
$savefilename="";
if (is_uploaded_file($HTTP_POST_FILES[$Var]['tmp_name'])) {
	$filename = $Var."_name";
	$path_parts = pathinfo($$filename);
  $savefilename = time().$path_parts["extension"];
  //$path= getcwd();
  if($_SERVER['OS']=="Windows_NT")
	{
  $filename = "$FilePath\\$savefilename";  // windows
	}else{
  $filename = "$FilePath/$savefilename";   // unix
	}
move_uploaded_file($HTTP_POST_FILES[$Var]['tmp_name'], $filename);
}

return $savefilename;

}

function Radio($name,$value,$cmp)
{
	if($cmp==$value)
	{
	$check="checked";
	}else{
	$check ="";
	}

   return "<input type=\"radio\" value=\"$value\" $check name=\"$name\">";
}


Function Readln(&$INPUT,$webname){
 $fp = fopen($webname,"r");
 while (!feof($fp)) {
   $BUFFER = fgetc($fp);
   $INPUT .= $BUFFER;
   if ($BUFFER == "\n")
     break;
 }
 fclose($fp);
}




?>