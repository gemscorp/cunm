
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
    <p align="center"><span lang="en-us"><b><font face="MS Sans Serif" size="2">
    Member List</font></b></span></td>
  </tr>
  <tr>
    <td width="100%"><span lang="en-us">&nbsp;<a href="{U_ADD}"><font face="MS Sans Serif" size="2">Add 
    Member</font></a></span></td>
  </tr>
</table>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#00C632" width="153">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; title</span></font></td>
	   <td  bgcolor="#00C632" width="219">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; firstname</span></font></td>
	   <td  bgcolor="#00C632" width="211">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; lastname</span></font></td>
	   <td  bgcolor="#00C632" width="193">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; email</span></font></td>
	   <td  bgcolor="#00C632" width="37" align="center">
      <span lang="en-us"><font face="MS Sans Serif" size="2">Detail</font></span></td>
	  <td width="41" bgcolor="#00C632" align="center">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;</span>Edit</font></td>
      <td width="31" bgcolor="#00C632" align="center">
      <p align="center"><font face="MS Sans Serif" size="2">Del</font></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#CCFFCC" width="153">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.TITLE}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="219">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.FIRSTNAME}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="211">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.LASTNAME}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="193">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.EMAIL}</span></font></td>
	   <td  bgcolor="#CCFFCC" width="37" align="center">
      <p align="center">
	 <a href="{listrow.U_DETAIL}">
      <img border="0" src="images/edit.gif" ></a></td>
	  <td width="41" bgcolor="#CCFFCC" align="center">
      <p align="center">
	 <a href="{listrow.U_EDIT}">
      <img border="0" src="images/edit.gif" ></a></td>
      <td width="31" bgcolor="#CCFFCC" align="center">
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