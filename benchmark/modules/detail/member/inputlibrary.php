
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
<SCRIPT language=javascript src="includes/dateScript.js"></SCRIPT>
    <div align="center">
      <center>
      <form name="inputlibrary"  action="{ACTION}"  method=post onsubmit="return chkvalid()" enctype="multipart/form-data" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >

    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="96%" id="AutoNumber3">
      <tr>
        <td width="100%"><b><font face="Arial" size="2"><span lang="en-us">&nbsp;</span>{MEMBER_NAME}<br>
&nbsp;</font></b></td>
      </tr>
      <tr>
        <td width="100%">
                <p align="center"><font face="Arial" size="2">{TOPMENU}<br>
&nbsp;</font></td>
      </tr>
      <tr>
        <td width="100%" bgcolor="#111111">
          <b><font face="Arial" size="2" color="#FFFFFF">&nbsp;Library</font></b></td>
      </tr>
      <tr>
        <td width="100%">
                &nbsp;</td>
      </tr>
    </table>

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="32">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#324F5D">
          <b><font face="Arial" size="2" color="#FFFFFF">Add/Edit Library</font></b></td>
        </tr>
        <!--
        <tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;mem_id</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="mem_id" size="20" value="{MEM_ID}" ></td> 
        </tr>
        -->
        <tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="Arial" size="2">&nbsp;Date</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <font face="Arial">         
          <input type="text" name="pdate" size="20"  id=pdate readOnly 
                        onclick="popUpCalendar(document.all.pdate ,document.all.pdate , 'yyyy-mm-dd')"  value="{PDATE}" ></font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="Arial" size="2">&nbsp;Name</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <font face="Arial">         
          <input type="text" name="name" size="44" value="{NAME}" ></font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="Arial" size="2">&nbsp;file</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <font face="Arial">         
          <input type="file" name="file" size="32"><font size="2"><br>
          </font><input type="checkbox" name="C1" value="ON"><font size="2"> Del 
          old file</font></font></td> 
        </tr>
        <!--
        <tr>
          <td width="145" height="13" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;remark</font></td>
          <td width="352" height="13" bgcolor="#CCFFCC">         
          <textarea rows="8" name="remark" cols="35">{REMARK}</textarea></td> 
        </tr>
        -->
        <tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <font face="Arial">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"><font size="2">
          </font> </span>
		  <input type="hidden" name="lib" value="{LIB}" >

          <input type="submit" value="Save" name="B2"></font></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
     if (document.inputlibrary.mem_id.value ==0)
	{
alert("Please enter a valid mem_id")
document.inputlibrary.mem_id.focus();
return false;
  } 
    else if (document.inputlibrary.pdate.value ==0)
	{
alert("Please enter a valid pdate")
document.inputlibrary.pdate.focus();
return false;
  } 
    else if (document.inputlibrary.name.value ==0)
	{
alert("Please enter a valid name")
document.inputlibrary.name.focus();
return false;
  } 
    else if (document.inputlibrary.file.value ==0)
	{
alert("Please enter a valid file")
document.inputlibrary.file.focus();
return false;
  } /*
    else if (document.inputlibrary.remark.value ==0)
	{
alert("Please enter a valid remark")
document.inputlibrary.remark.focus();
return false;
  }
  */else{
 		 return true;
 		 }
		  } 
//--> 
 </SCRIPT>