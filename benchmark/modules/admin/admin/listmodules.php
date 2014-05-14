
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

 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   <tr>
     <td width="100%">
     <p align="center"><b><span lang="en-us">Not Install Modules</span></b></td>
   </tr>
 </table>
 <div align="center">
   <center>
   <table border="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="80%" cellspacing="1" cellpadding="2">
     <tr>
       <td width="37%" bgcolor="#00C632" align="center"><b><span lang="en-us">
       Name</span></b></td>
       <td width="13%" bgcolor="#00C632" align="center"><b><span lang="en-us">
       Install</span></b></td>
     </tr>
<!-- BEGIN morow -->  
     <tr>
       <td width="37%" bgcolor="#CCFFCC" align="center">
       <p align="left">{morow.name}</td>
       <td width="13%" bgcolor="#CCFFCC" align="center">
       <a href="{morow.install}">install</a></td>
     </tr>
  <!-- END morow  -->   
   </table>
   </center>
 </div>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    &nbsp;</td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center"><span lang="en-us"><b><font face="MS Sans Serif" size="2">
    Installed </font></b></span><b><font face="MS Sans Serif" size="2">&nbsp;<span lang="en-us">Modules</span></font></b></td>
  </tr>
  </table>
 <p>&nbsp;</p>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; name</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; menu_name</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; index_file</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; active</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; security_level</span></font></td>
	   <td  bgcolor="#00C632">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; Order</span></font></td>
	  <td width="35" bgcolor="#00C632"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;</span>·°È‰¢</font></td>
      <td width="25" bgcolor="#00C632"><font face="MS Sans Serif" size="2">≈∫</font></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.NAME}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.MENU_NAME}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.INDEX_FILE}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.ACTIVE}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.SECURITY_LEVEL}</span></font></td>
	   <td  bgcolor="#CCFFCC">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.MENU_ORDER}</span></font></td>
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