
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
    <p align="center"><font face="Arial"><b>Search Result <br>
    </b><span style="font-weight: 700; font-size: 9px">(click on column head to 
    sort)</span></font></td>
  </tr>
  </table>
   </center>
 </div>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#4777CF" align="center" width="44">
      <b><font face="Arial" size="2" color="#FFFFFF">No.</font></b></td>
	   <td  bgcolor="#4777CF" align="center" width="340">
      <p align="center"><b>
            <span style="font-size: 10pt; color: #FFFFFF; font-family: Arial">
            <a href="{n_s}" style="text-decoration: none"><font color="#FFFFFF">Name of Credit Union</font></a></span></b></td>
	   <td  bgcolor="#4777CF" align="center" width="132">
      <font size="2" color="#FFFFFF"><b><span style="font-family: Arial">
      <a href="{c_s}" style="text-decoration: none"><font color="#FFFFFF">Country</font></a></span></b></font></td>
	   <td  bgcolor="#4777CF" align="center" width="137">
      <p align="center">
      <font color="#FFFFFF">
      <span lang="en-us"><font face="MS Sans Serif" size="2">
      &nbsp; </font><b><font face="Arial" size="2">
      <a href="{g_s}" style="text-decoration: none"><font color="#FFFFFF">Gross Loan</font></a></font></b></span></font></td>
	   <td  bgcolor="#4777CF" align="center" width="144">
      <span lang="en-us"><b><font color="#FFFFFF" face="Arial" size="2">Number 
      of Member</font></b></span></td>
	   <td  bgcolor="#4777CF" align="center" width="108">
      <span lang="en-us"><b><font face="Arial" size="2" color="#FFFFFF">Ranking 
      Point</font></b></span></td>
    </tr>
<!-- BEGIN r -->
	<tr>
	   <td  bgcolor="#66CCFF" width="44">
      <p align="center"><font face="Arial" size="2">{r.CNT}</font></td>
	   <td  bgcolor="#66CCFF" width="340">
      <p align="left"><font face="Arial" size="2">
      <a style="text-decoration: none" target="_blank" href="{r.U_VIEW}">{r.MEMBER_NAME}</a></font></td>
	   <td  bgcolor="#66CCFF" width="132">
      <p align="center"><font face="Arial" size="2">&nbsp;{r.M_COUNTRY}</font></td>
	   <td  bgcolor="#66CCFF" width="137">
      <p align="right"><span lang="en-us"><font face="Arial" size="2">{r.ASSETS_TOTAL}&nbsp;&nbsp;&nbsp;
      </font></span></td>
	   <td  bgcolor="#66CCFF" width="144">
      <p align="right"><font face="Arial" size="2">&nbsp;{r.MEMBER}&nbsp;&nbsp;
      </font></td>
	   <td  bgcolor="#66CCFF" width="108">
      <p align="center"><b><font face="Arial" size="2" color="#FF0000">&nbsp;{r.P_Total}&nbsp;&nbsp;</font></b></td>
    </tr>
<!-- END r -->
<!-- BEGIN norow -->
	<tr>
	   <td  bgcolor="#66CCFF" colspan="6" width="930">
      <p align="center"><font face="Arial" size="2">No Data</font></td>
    </tr>
<!-- END norow -->

  </table>
  </center>
</div>
 <div align="center">
   <center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber7">
  <tr>
    <td width="100%">{PAGE_LIST}</td>
  </tr>
</table></center>
 </div>