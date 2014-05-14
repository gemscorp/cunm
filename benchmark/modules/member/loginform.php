<script language="JavaScript">
<!--
function  mloginck2()
{

 if (document.loginform.username.value ==0)
  {
  alert("Please enter username")
  document.loginform.username.focus();
  return false;
    }else if(document.loginform.password.value ==0)
    		{
    		  alert("Please enter password")
  		  document.loginform.password.focus();
  		    return false;
    		}else{
    		return true;
  		} 
    
}
//-->
</script>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="97%">&nbsp;
          </td>
  </tr>
  <tr>
    <td width="97%">
    <p align="center"><b><font color="#FF0000" size="2" face="Arial">&nbsp;{MSG}</font></b></td>
  </tr>
  <tr>
    <td width="97%">
    <div align="center">
      <center>
                     <form  action="index.php" method=post onsubmit="return mloginck2(this)" name="loginform">    
                   <input type="hidden" name=op value="{OP}">  
                <input type="hidden" name=m value="{M}">    
                <input type="hidden" name=next_name value="{NEXT_NAME}">
                <input type="hidden" name=next_op  value="{NEXT_OP}"> 
                <input type="hidden" name=f value="2"> 
                <input type="hidden" name="action" value="{ACTION}"> 
      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; font-family:MS Sans Serif; font-size:10pt" bordercolor="#FFFFFF" width="285" id="AutoNumber2" height="96">

        <tr>
          <td width="282" colspan="2" bgcolor="#759BDA" height="23">
          <p align="center"><b><font size="2" face="Arial">Please Login</font></b></td>
        </tr>
        <tr>
          <td width="77" bgcolor="#F1F1F1" height="22">
          <b>
          <font size="2" face="Arial">&nbsp;Username</font></b></td>
          <td width="205" bgcolor="#F1F1F1" height="22">
          <input type="text" name="username" size="18"></td>
        </tr>
        <tr>
          <td width="77" bgcolor="#F1F1F1" height="22">
          <b>
          <font size="2" face="Arial">&nbsp;Password</font></b></td>
          <td width="205" bgcolor="#F1F1F1" height="22">
          <input type="password" name="password" size="18"></td>
        </tr>
        <tr>
          <td width="282" height="26" bgcolor="#F1F1F1" colspan="2" align="center">
          <input type="reset" value="Reset" name="B1">
          <input type="submit" value="Submit" name="B2"></td>
        </tr>

      </table>
              </form>
      </center>
    </div>
    </td>
  </tr>
</table>