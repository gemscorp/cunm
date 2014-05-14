
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
      <form name="inputformula"  action="{ACTION}"  method=post onsubmit="return chkvalid()" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="38">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#00C632">
          <b><font face="MS Sans Serif" size="2">&nbsp;</font></b></td>
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;code</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="code" size="20" value="{CODE}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;name</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="name" size="20" value="{NAME}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;goals</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="goals" size="20" value="{GOALS}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;formula</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="formula" size="20" value="{FORMULA}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;comment</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="comment" size="20" value="{COMMENT}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"> </span>
		  <input type="hidden" name="for_id" value="{FOR_ID}" >

          <input type="submit" value="Save" name="B2"></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
     if (document.inputformula.code.value ==0)
	{
alert("Please enter a valid code")
document.inputformula.code.focus();
return false;
  } 
    else if (document.inputformula.name.value ==0)
	{
alert("Please enter a valid name")
document.inputformula.name.focus();
return false;
  } 
    else if (document.inputformula.goals.value ==0)
	{
alert("Please enter a valid goals")
document.inputformula.goals.focus();
return false;
  } 
    else if (document.inputformula.formula.value ==0)
	{
alert("Please enter a valid formula")
document.inputformula.formula.focus();
return false;
  } 
    else if (document.inputformula.comment.value ==0)
	{
alert("Please enter a valid comment")
document.inputformula.comment.focus();
return false;
  }else{
 		 return true;
 		 }
		  } 
//--> 
</SCRIPT>