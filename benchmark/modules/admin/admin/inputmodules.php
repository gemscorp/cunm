
 <SCRIPT language=JavaScript> 
<!-- 
function Del(url,caption) { 
 
 txt = " Are you sure you want to delete ?\n";
 txt +=caption;
 
  var rs=confirm(txt);
     
 if(rs==true)
 {
  location.href="{JAVA_URL}&"+url;
 }    
     
} 
//--> 
 </SCRIPT>

    <div align="center">
      <center>
      <form name="inputmodules"  action="{ACTION}"  method=post onsubmit="return chkvalid()" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="38">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#00C632">
          <b><font face="MS Sans Serif" size="2">&nbsp;</font></b></td>
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;name</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="name" size="20" value="{NAME}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;menu_name</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="menu_name" size="20" value="{MENU_NAME}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;index_file</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="e_index_file" size="20" value="{INDEX_FILE}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;gr</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="e_gr" size="20" value="{GR}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;active</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="active" size="20" value="{ACTIVE}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;icon</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="icon" size="20" value="{ICON}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;mainframe</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="mainframe" size="20" value="{MAINFRAME}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;security_level</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="security_level" size="20" value="{SECURITY_LEVEL}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;config_file</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="config_file" size="20" value="{CONFIG_FILE}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;menu_order</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="menu_order" size="20" value="{MENU_ORDER}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"> </span>
		  <input type="hidden" name="modules_id" value="{MODULES_ID}" >

          <input type="submit" value="Save" name="B2"></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
     if (document.inputmodules.name.value =="")
	{
alert("Please enter a valid name")
document.inputmodules.name.focus();
return false;
  } 
    else if (document.inputmodules.menu_name.value =="")
	{
alert("Please enter a valid menu_name")
document.inputmodules.menu_name.focus();
return false;
  } 
    else if (document.inputmodules.e_index_file.value =="")
	{
alert("Please enter a valid index_file")
document.inputmodules.e_index_file.focus();
return false;
  } 
    else if (document.inputmodules.e_gr.value =="")
	{
alert("Please enter a valid gr")
document.inputmodules.e_gr.focus();
return false;
  } 
    else if (document.inputmodules.active.value =="")
	{
alert("Please enter a valid active")
document.inputmodules.active.focus();
return false;
  } 
    else if (document.inputmodules.icon.value =="")
	{
alert("Please enter a valid icon")
document.inputmodules.icon.focus();
return false;
  } 
    else if (document.inputmodules.mainframe.value =="")
	{
alert("Please enter a valid mainframe")
document.inputmodules.mainframe.focus();
return false;
  } 
    else if (document.inputmodules.security_level.value =="")
	{
alert("Please enter a valid security_level")
document.inputmodules.security_level.focus();
return false;
  } 
    else if (document.inputmodules.config_file.value =="")
	{
alert("Please enter a valid config_file")
document.inputmodules.config_file.focus();
return false;
  } 
    else if (document.inputmodules.menu_order.value =="")
	{
alert("Please enter a valid menu_order")
document.inputmodules.menu_order.focus();
return false;
  }else{
 		 return true;
 		 }
		  } 
//--> 
 </SCRIPT>