
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

	function OnFormSubmit(pid,name,lastname,com_id,brance_id) {
		
			if(confirm("This Document is about to be submitted  Are you sure you have finished Selecting?")) {
			
				window.opener.document.getElementById("p1").value = pid;
				window.opener.document.getElementById("p2").value = name;
				window.opener.document.getElementById("p3").value = lastname;
				window.opener.document.getElementById("p4").value = com_id;
				window.opener.document.getElementById("p5").value = brance_id;
				
				 self.close(); 			
			}

	
	}
	
//--> 
 </SCRIPT>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    <p align="center"><b><span lang="th"><font face="Microsoft Sans Serif">
    รายชื่อพนักงาน</font></span></b></td>
  </tr>
  <tr>
    <td width="100%"><span lang="en-us">&nbsp;</span></td>
  </tr>
</table>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#00C632" width="164">
      <p align="center"><span lang="th"><font face="MS Sans Serif" size="2">
      บริษัท</font></span></td>
	   <td  bgcolor="#00C632" width="164">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;  </span><span lang="th">สาขา</span></font></td>
	   <td  bgcolor="#00C632" width="164">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; </span><span lang="th">ชื่อ</span></font></td>
	   <td  bgcolor="#00C632" width="165">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;  </span><span lang="th">นามสกุล</span></font></td>
	   <td  bgcolor="#00C632" width="165">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; </span><span lang="th">มือถือ</span></font></td>
	  <td width="36" bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;</span>เลือก</font></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#CCFFCC" align="left" width="164">
      <p><font face="MS Sans Serif" size="2">
      <span lang="en-us">{listrow.COM_ID}</span></font></td>
	   <td  bgcolor="#CCFFCC" align="left" width="164">
      <p><font face="MS Sans Serif" size="2">
      <span lang="en-us">{listrow.BRANCE_ID}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="164">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">{listrow.NAME}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="165">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">{listrow.LASTNAME}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="165">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;{listrow.MOBILE}</span></font></td>
	  <td width="36" bgcolor="#CCFFCC">
      <p align="center">
	 <a href="{listrow.U_SEL}">
      <img border="0" src="images/edit.gif" ></a></td>
    </tr>
<!-- END listrow -->
  </table>
  </center>
</div>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7">
  <tr>
    <td width="100%">&nbsp;{PAGE_LIST}</td>
  </tr>
</table>