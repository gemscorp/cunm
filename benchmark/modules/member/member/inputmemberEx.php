
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
      <form name="inputmember"  action="{ACTION}"  method=post onsubmit="return chkvalid()" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >
<input type="hidden" id="p1" name="emp_id" value="{EMP_ID}" >
<input type="hidden" id="p4" name="com_id" value="{COM_ID}" >
<input type="hidden" id="p5"  name="brance_id" value="{BRANCE_ID}" >
          

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="38">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#00C632">
          <font face="MS Sans Serif" size="2">
          <b>&nbsp;</b></font><b><span lang="th">ป้อนรายชื่อผู้ใช้</span></b></td>
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;ชื่อ</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <font face="MS Sans Serif" size="2"><span lang="en-us">
          <input type="text" id="p2" name="name" size="20" value="{NAME}">
           <input type="button" value="Browse..." name="B4" onclick="window.open('{POPUP}>','editor_popup','width=660,height=470,scrollbars=no,resizable=yes,status=yes'); return false" >
          </span></font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2"><span lang="en-us">&nbsp;</span>นามสกุล</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" id="p3" name="lastname" size="20" value="{LASTNAME}"></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;<span lang="en-us">U</span>sername</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="username" size="20" value="{USERNAME}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;<span lang="en-us">P</span>assword</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="password" size="20" value="{PASSWORD}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;member_of</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <select size="1" name="member_of">{MEMBER_OF}</select></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;active</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="active" size="20" value="{ACTIVE}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"> </span>
		  <input type="hidden" name="mem_id" value="{MEM_ID}" >

          <input type="submit" value="Save" name="B2"></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
 if (document.inputmember.username.value ==0)
	{
alert("Please enter a valid username")
document.inputmember.username.focus();
return false;
  } 
    else if (document.inputmember.password.value ==0)
	{
alert("Please enter a valid password")
document.inputmember.password.focus();
return false;
  } 
    else if (document.inputmember.com_id.value ==0)
	{
alert("Please enter a valid com_id")
document.inputmember.com_id.focus();
return false;
  } 
        else if (document.inputmember.member_of.value ==0)
	{
alert("Please enter a valid member_of")
document.inputmember.member_of.focus();
return false;
  } 
    else if (document.inputmember.active.value =="")
	{
alert("Please enter a valid active")
document.inputmember.active.focus();
return false;
  }else{
 		 return true;
 		 }
		  } 

  
//--> 
 </SCRIPT>