<?php 
	$phpbb_root_path = './';
	include($phpbb_root_path . 'include/config.inc');	
	
	if ($add_user) {
		$query = "select id from pearls_users where username = '$username' or email = '$email'";
		$result = mysql_query($query) or die ("Query Failed " . mysql_error());
		$num_rows = mysql_num_rows($result);
		if ($num_rows > 0 ) {
			$login_exisit = 1;
			$register = 1; 
			/* redirect to the registration screen */
			/*
				TODO: should we display what they entered.. reduce typing
				suggest a username ???
			*/
		} elseif ($num_rows == 0) {
			/* add the user */
			$query = "insert into pearls_users (username,password,email,primary_cu) values ('$username','$password', '$email','$creditunion')";
			$result = mysql_query($query) or die ("Query Failed " . mysql_error()); 
			/*TODO: display user_added screen */
		}
	}
				
	
	if ($login) {
		$query = "select id from pearls_users where username = '$username' and password = '$password'";
		$result = mysql_query($query) or die ("Query Failed : " . mysql_error());
		$num_rows = mysql_num_rows($result);
		if ($num_rows == 1) {
			/* login sucessfull 
			   send http_response_redirect header
			*/
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$userid = $row["id"];
			header("Location: http://www.aaccu.net/cgi-bin/inframe?id=$userid");
		} else {
			$login_failed = 1;
		}
		mysql_free_result($result);
	}
?>

<html><head><title> P:E:A:R:L:S ACCU WEB PORTAL </title> </head> 
<link rel=stylesheet type=text/css href=/pearls/style.css>
<body>


<?php 
	if ($register) {
		if ($login_exisit) {
			echo "Error: login exisit";
		}
?>


<h3 align=center> Please Enter The Following Information to Register With P:E:A:R:L:S Web </h3>
<form action=/pearls/login.php>
<table class=stripe align=center>
<tr><th colspan=2 class=heading> Register </th> </tr>
<tr><td class=label> Name: </td><td> <input type=text name=name size=30>  </td></tr>	
<tr><td class=label> Credit Union: </td><td>
	<select name=creditunion> 
<?php
	$query = "SELECT * FROM pearls_profiles";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
?>
	<option value=<?=$line["id"]?>><?=$line["credit_union"]?>
      		
<?php
	   }
   
	mysql_free_result($result);
?>
<option value=0>Not Listed
</select>
</td></tr>

<tr><td class=label> Username: </td><td><input type=text name=username size=30> </td></tr>
<tr><td class=label> Password: </td><td> <input type=password name=password size=30> </td></tr>
<tr><td class=label> Verify Password: </td><td> <input type=password name=pass_verify size=30> </td></tr>
<tr><td class=label> E-mail: </td><td> <input type=text name=email size=30> </td></tr>
<input type=hidden name=add_user value=1>
<tr><td colspan=2 align=center> <input type=button class=pearls id=btnSave onClick=this.form.submit() value='Save'></td></tr>
</form>
</table>




<?php 
	} else {
?>

<h3 align=center> Welcome to P:E:A:R:L:S WEB, Please Enter Your Login Information </h3>
<table align=center class=stripe>
<tr><th colspan=2 align=center class=heading> Login </th></tr>

<form action=/pearls/login.php method=post>

<?php
	if ($login_failed) {
		echo "<tr><td colspan=2 align=center class=label> <font color=red> login failed!! $username - $password</font> </td></tr>";
	}
?>

<tr><td class=label>Username: </td><td><input type=text name=username size=30> </td></tr>
<tr><td class=label>Password: </td><td><input type=password name=password size=30> </td></tr>
<input type=hidden name=login value=1>
<tr><TD align=center colspan=2><input type=button class=pearls onclick=this.form.submit() value='Login'></td></tr>
</form>
</table>
<hr align=center width=40%>
<h3 align=center> If you are a first time user please Register to use P:E:A:R:L:S Web, <a href=/pearls/login.php?register=1> Click Here to 
Register </a> </h3>


<?php
	mysql_close($db_link);	
}
?>
</body> </html>