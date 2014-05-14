<?php

$subject  = $_POST['subject'];
$yourname = $_POST['yourname'];
$address  = $_POST['address'];
$tel 	  = $_POST['tel'];
$fax	  = $_POST['fax'];
$mobile   = $_POST['mobile'];
$message  = $_POST['message'];
$email	  = $_POST['email'];

$youremail="infor@aaccu.coop";

$emailsubject="Contact www.aaccu.asia !";

$from_who="$email";

$pagetitle="Thank You!";


$to = "accu@aaccu.coop";
								$subj = "Inquiry From - www.aaccu.com Website Bench Mark Service";
								$msg = " <table>
									<tr>
									  <td colspan=3><font size=2 face=Trebuchet MS-><strong> Inquiry From - www.aaccu.com Website</strong></font></td>
  </tr>
									<tr>
										<td><font size=2 face=Trebuchet MS><strong>Name</strong></font></td>
									  <td><font size=2 face=Trebuchet MS><strong>:</strong></font></td>
										<td><font size=2 face=Trebuchet MS><strong>".$yourname."</strong></font></td>
									</tr>
									<tr>
										<td><font size=2 face=Trebuchet>Address</font></td>
									  <td><font size=2 face=Trebuchet MS>:</font></td>
										<td><font size=2 face=Trebuchet MS>".$address."</font></td>
  </tr>									
									<tr>
										<td><font size=2 face=Trebuchet MS>Telephone</font></td>
									  <td><font size=2 face=Trebuchet MS>:</font></td>
										<td><font size=2 face=Trebuchet MS>".$tel."</font></td>
  </tr>									
									<tr>
										<td><font size=2 face=Trebuchet MS>Fax </font></td>
									  <td><font size=2 face=Trebuchet MS>:</font></td>
										<td><font size=2 face=Trebuchet MS>".$fax."</font></td>
  </tr>									
									<tr>
									  <td><font size=2 face=Trebuchet ms>Mobile</font></td>
									  <td>&nbsp;</td>
									  <td><font size=2 face=Trebuchet ms>".$mobile."</font></td>
  </tr>
									<tr>
										<td>Message</td>
									  <td><font size=2 face=Trebuchet MS>:</font></td>
										<td><font size=2 face=Trebuchet MS>".str_replace("\n", "<br>", $message)."</font></td>
  </tr>
									<tr>
										<td><font size=2 face=Trebuchet MS>Email</font></td>
										<td><font size=2 face=Trebuchet MS>:</font></td>
										<td><font size=2 face=Trebuchet MS>".$email."</font></td>
									</tr>
</table>";
								$head = "MIME-Version: 1.0\r\nContent-Type: text/html; charset=ISO-8859-1\r\nFrom:".$youremail."\r\nBcc:ranjith61@hotmail.com";
				   				mail($to, $subj, $msg, $head); 
								
												
$goto= "../../index.php?m=contactus&op=contactcomplete"; Header("Location: $goto");
?>

