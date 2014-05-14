<html>

<head>
<meta http-equiv="Content-Language" content="th">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title><?=$title?></title>
</head>
<script language="Javascript">
function chkvalid() { 

if (document.FORM1.email.value ==0)
  {
  alert("Please enter a valid Email")
 document.FORM1.email.focus();
  return false;
    }
    
else if (document.FORM1.email.value.indexOf("@") < 0)
{
alert("Please enter a valid Email '@' ")
 document.FORM1.email.focus();
return false;
}
else if (document.FORM1.email.value.indexOf(".") < 0)
{
alert("Please enter a valid Email  '.(dot)'")
 document.FORM1.email.focus();
return false;
}else{
 return true;
}

}

 </script>
<body bgcolor="#F1F1F1" topmargin="0" leftmargin="0">

<div align="center">
  <center>
    <form action=index.php method=post name=FORM1 onsubmit="return chkvalid()" >
    <input type="hidden" name=m value="member">
    <input type="hidden" name=op value="requestpws">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7">
      <tr>
        <td width="100%">
        <p align="center"> 
                    <b><font size="2" face="Arial" color="#000080"><br>
                    <br>
                    FORGOT YOUR PASSWORD ?</font></b></td>
      </tr>
    </table>
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="94%" id="AutoNumber4" height="72">
      <tr>
        <td width="903" colspan="2" bgcolor="#83A3B0">
        <p align="center"><font size="2" face="Arial"><font color="#FF0000">*</font>
        <font color="#FFFFFF">Please enter your Email Address<br>
        <span lang="en-us">&nbsp;Y</span>our<span lang="en-us"> </span>Username and your Password will 
        be sent to <span lang="en-us">y</span>our<span lang="en-us"> </span>&nbsp;Email Address</font></font></td>
      </tr>
      <tr>
        <td width="451" bgcolor="#D5EAFF">
        <p align="right"><span lang="en-us"><b>
        <font face="MS Sans Serif" size="2" color="#000080"><br>
        Email </font></b></span><font color="#000080"><b><span lang="en-us"><font face="MS Sans Serif" size="2">&nbsp;</font></span><font face="MS Sans Serif" size="2">&nbsp;
        <br>
&nbsp;</font></b></font></td>
        <td width="452" bgcolor="#D5EAFF"><font face="MS Sans Serif">&nbsp;<br>
        <span lang="en-us">&nbsp;</span><input type="text" name="email" size="20">
        <br>
&nbsp;</font></td>
      </tr>
      <tr>
        <td width="903" bgcolor="#D5EAFF" colspan="2" align="center">
        <font face="MS Sans Serif">
 
        <input type="submit" value="SEND" name="B1"><br>
&nbsp;</font></td>
      </tr>
    </table>
    </form>
      </center>
</div>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
  <tr>
    <td width="100%" valign="top">
    &nbsp;</td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center"><font color="#000080" size="2" face="Arial">[</font><a href="javascript:window.close();" style="text-decoration: none; font-weight: 700"><font color="#000080" size="2" face="Arial">Close 
                this page</font></a><font color="#000080" size="2" face="Arial">]</font></td>
  </tr>
</table>

</body>

</html>