
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

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber1">
  <tr>
    <td width="100%">
    <p align="center"><span lang="en-us"><b>
    <font face="MS Sans Serif" size="2" color="#000080">
    <br>
    -
    Member List -<br>
&nbsp;</font></b></span></td>
  </tr>
  </table>
   </center>
 </div>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#4777CF" width="229">
      <p align="center"><b><font face="Arial" size="2">Name</font></b></td>
	   <td  bgcolor="#4777CF" width="308">
      <p align="center"><b>
            <span style="font-size: 10pt; color: #111111; font-family: Arial">
            Name of Credit Union</span></b></td>
	   <td  bgcolor="#4777CF" width="239">
      <p align="center">
      <span lang="en-us"><font face="MS Sans Serif" size="2">
      &nbsp; </font><b><font face="Arial" size="2">
      email</font></b></span></td>
	   <td  bgcolor="#4777CF" width="54" align="center">
      <span lang="en-us"><font face="MS Sans Serif" size="2">Detail</font></span></td>
	  <td width="59" bgcolor="#4777CF" align="center">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp;</span>Edit</font></td>
      <td width="45" bgcolor="#4777CF" align="center">
      <p align="center"><font face="MS Sans Serif" size="2">Del</font></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#66CCFF" width="229">
      <p align="left"><font face="Arial" size="2">
      <span lang="en-us">&nbsp; {listrow.TITLE} {listrow.FIRSTNAME}&nbsp; {listrow.LASTNAME}</span></font></td>
	   <td  bgcolor="#66CCFF" width="308">
      <p align="left"><font face="Arial" size="2"><a href="{listrow.U_VIEW}">
      {listrow.MEMBER_NAME}</a></font></td>
	   <td  bgcolor="#66CCFF" width="239">
      <p align="center"><font face="Arial" size="2">
      <span lang="en-us">&nbsp; {listrow.EMAIL}</span></font></td>
	   <td  bgcolor="#66CCFF" width="54" align="center">
      <p align="center">
	 <a href="{listrow.U_DETAIL}">
      <img border="0" src="images/edit.gif" ></a></td>
	  <td width="59" bgcolor="#66CCFF" align="center">
      <p align="center">
	 <a  href="{listrow.U_EDIT}">
      <img border="0" src="images/edit.gif" ></a></td>
      <td width="45" bgcolor="#66CCFF" align="center">
      <p align="center">
	 <a href="{listrow.U_DEL}">
      <img border="0" src="images/del.gif" ></a></td>
    </tr>
<!-- END listrow -->
  </table>
  </center>
</div>
 <div align="center">
   <center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber7">
  <tr>
    <td width="100%">&nbsp;{PAGE_LIST}</td>
  </tr>
</table></center>
 </div>
 