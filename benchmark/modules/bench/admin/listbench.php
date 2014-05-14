
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
    <p align="center"><span lang="en-us"><b>
    <font face="MS Sans Serif" size="2" color="#000080">
    <br>
    - ALL
    BENCHMARKING -</font></b></span></td>
  </tr>
  <tr>
    <td width="100%"><span lang="en-us">&nbsp;</span></td>
  </tr>
</table>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#4777CF">
      <p align="center"><font color="#111111"><b><font face="Arial" size="2">
      <span lang="en-us">&nbsp;</span></font><span lang="en-us"><font face="Arial" size="2">Name</font></span></b></font></td>
	   <td  bgcolor="#4777CF">
      <p align="center"><b><font face="Arial" size="2" color="#111111">Period ended</font></b></td>
	   <td  bgcolor="#4777CF">
      <p align="center"><b><font color="#111111" face="Arial" size="2">INCOME STATEMENT</font></b></td>
	  <td width="35" bgcolor="#4777CF"><b>
      <font face="Arial" size="2" color="#111111">
      <span lang="en-us">&nbsp;</span>VIEW</font></b></td>
      <td width="25" bgcolor="#4777CF"><b>
      <font face="Arial" size="2" color="#111111">DEL</font></b></td>
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#84C1FF">
      <p align="left"><font face="Arial" size="2">
      <span lang="en-us">&nbsp; {listrow.M_NAME}</span></font></td>
	   <td  bgcolor="#84C1FF">
      <p align="center"><font face="Arial" size="2">
      <span lang="en-us">&nbsp; {listrow.BALANCE_SHEET}</span></font></td>
	   <td  bgcolor="#84C1FF">
      <p align="center">
      <span lang="en-us"><font face="MS Sans Serif" size="2">
      &nbsp;</font><font face="Arial" size="2"> </font></span>
      <font color="#044673" face="Arial" size="2">for the</font><font face="Arial" size="2">
      <span lang="en-us">{listrow.INCOME_MONTH}</span></font><font color="#044673" face="Arial" size="2"> months 
      ended </font><font face="Arial" size="2">
      <span lang="en-us">{listrow.INCOME_ENDED}</span></font></td>
	  <td width="35" bgcolor="#84C1FF">
      <p align="center">
	 <a href="{listrow.U_EDIT}">
      <img border="0" src="images/edit.gif" ></a></td>
      <td width="25" bgcolor="#84C1FF">
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