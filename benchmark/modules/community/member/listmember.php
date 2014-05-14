
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

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="96%" id="AutoNumber1">
  <tr>
        <td width="100%">
                <b><font face="Arial" size="2">&nbsp;{MEMBER_NAME}<br>
&nbsp;</font></b></td>
      </tr>
  <tr>
        <td width="100%">
                <p align="center"><font face="Arial" size="2">{TOPMENU}<br>
&nbsp;</font><div align="center">
                  <center>
                  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="38%" id="AutoNumber33" height="28">
                    <tr>
                      <td width="100%" bgcolor="#FFE9D2" height="28">
                      <p align="center">
              <span class="boldblack"><b>

                      <font color="#0000FF" face="Arial" style="font-weight: 700; font-size: 10pt">
                      <a style="text-decoration: none" href="{be}">
                      <font color="#FF0000">Stat 
              New<span lang="en-us"> </span>Benchmarking Services</font></a></font></b></span></td>
                    </tr>
                  </table>
                  </center>
                </div>
                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber34">
                  <tr>
                    <td width="100%">&nbsp;</td>
                  </tr>
                </table>
        </td>
      </tr>
  <tr>
    <td width="100%">
    <p align="center"><b><font size="2" face="Arial">Please select Credit Union</font></b></td>
  </tr>
  </table>
   </center>
 </div>
<div align="center">
  <center>
  
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="96%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#4777CF" align="center" width="45">
      <b><font face="Arial" size="2" color="#F4FFF4">No.</font></b></td>
	   <td  bgcolor="#4777CF" align="center" width="354">
      <p align="center"><b>
            <span style="font-size: 10pt; color: #FFFFFF; font-family: Arial">
            <a href="{n_s}" style="text-decoration: none"><font color="#FFFFFF">Name of Credit Union</font></a></span></b></td>
	   <td  bgcolor="#4777CF" align="center" width="170">
      <font size="2" color="#FFFFFF"><b><span style="font-family: Arial">
      <a href="{c_s}" style="text-decoration: none"><font color="#FFFFFF">Country</font></a></span></b></font></td>
	   <td  bgcolor="#4777CF" align="center" width="172">
      <p align="center">
      <font color="#FFFFFF">
      <span lang="en-us"><b><font face="Arial" size="2">
      &nbsp;
      <a href="{g_s}" style="text-decoration: none"><font color="#FFFFFF">Gross Loan</font></a></font></b></span></font></td>
	   <td  bgcolor="#4777CF" align="center" width="169">
      <span lang="en-us"><b><font face="Arial" size="2" color="#FFFFFF">
      <a href="{m_s}" style="text-decoration: none"><font color="#FFFFFF">Number 
      of Member</font></a></font></b></span></td>
    </tr>
<!-- BEGIN r -->
	<tr>
	   <td  bgcolor="#66CCFF" width="45">
      <p align="center"><font face="Arial" size="2">{r.CNT}</font></td>
	   <td  bgcolor="#66CCFF" width="354">
      <p align="left"><font face="Arial" size="2">
      <a style="text-decoration: none" target="_blank" href="{r.U_VIEW}">{r.MEMBER_NAME}</a></font></td>
	   <td  bgcolor="#66CCFF" width="170">
      <p align="center"><font face="Arial" size="2">&nbsp;{r.M_COUNTRY}</font></td>
	   <td  bgcolor="#66CCFF" width="172">
      <p align="right"><span lang="en-us"><font face="Arial" size="2">{r.ASSETS_TOTAL}&nbsp;&nbsp;&nbsp;
      </font></span></td>
	   <td  bgcolor="#66CCFF" width="169">
      <p align="right"><font face="Arial" size="2">&nbsp;{r.MEMBER}&nbsp;&nbsp;
      </font></td>
    </tr>
<!-- END r -->
<!-- BEGIN norow -->
	<tr>
	   <td  bgcolor="#66CCFF" colspan="5" width="930">
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