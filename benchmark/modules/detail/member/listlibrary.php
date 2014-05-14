
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

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    <p align="center"><b><font face="MS Sans Serif" size="2"><span lang="en-us">
    TABLENAME</span></font></b></td>
  </tr>
  <tr>
    <td width="100%"><span lang="en-us">&nbsp;</span><font face="MS Sans Serif" size="2"><a href="{U_ADD}">เพิ่มข้อมูล</a></font></td>
  </tr>
</table>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; mem_id</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; pdate</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; name</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; file</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; remark</span></font></td>      
	  <td width="35" bgcolor="#00C632"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;</span>แก้ไข</font></td>
      <td width="25" bgcolor="#00C632"><font face="MS Sans Serif" size="2">ลบ</font></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.MEM_ID}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.PDATE}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.NAME}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.FILE}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.REMARK}</span></font></td>
	  <td width="35" bgcolor="#CCFFCC">
      <p align="center">
	 <a href="{listrow.U_EDIT}">
      <img border="0" src="images/edit.gif" ></a></td>
      <td width="25" bgcolor="#CCFFCC">
      <p align="center">
	 <a href="{listrow.U_DEL}">
      <img border="0" src="images/del.gif" ></a></td>
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
