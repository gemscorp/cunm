
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

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="36">
  <tr>
    <td width="100%" height="32">
    <p align="center"><b><font face="Arial" size="2" color="#000080"><br>
    - Edit Comment </font></b><font face="Arial" color="#000080" size="2"><b>&nbsp;(PEARLS&nbsp; RATIOS) 
    -</b></font></td>
  </tr>
  <tr>
    <td width="100%" height="4">
    <p align="center"></td>
  </tr>
</table>
<div align="center">
  <center>
       <form name="inputformula"  action="{ACTION}"  method=post  >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" > 
  <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="96%" id="AutoNumber6">
    <tr>
	   <td  bgcolor="#4777CF" width="96">
      <p align="center"><b><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; Code</span></font></b></td>
	   <td  bgcolor="#4777CF" width="410">
      <p align="center"><b><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; Name</span></font></b></td>
	   <td  bgcolor="#4777CF" width="375">
      <p align="center"><b><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; Comment</span></font></b></td>      
    </tr>
<!-- BEGIN listrow -->
	<tr>
	   <td  bgcolor="#AED7FF" width="96" valign="top">
      <p align="center"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.CODE}</span></font></td>
	   <td  bgcolor="#AED7FF" width="410" valign="top">
      <p align="left"><font face="MS Sans Serif" size="2">
      <span lang="en-us">&nbsp; {listrow.NAME}</span></font></td>
	   <td  bgcolor="#AED7FF" width="375">
      <p align="left"><font face="MS Sans Serif" size="2"><span lang="en-us">
          <input type="button" value="Edit" name="B4" onclick="window.open('pad/pad1.php?id={listrow.SN}','editor_popup','width=660,height=470,scrollbars=no,resizable=yes,status=yes'); return false" ></span></font><br>
          <textarea rows="8" name="{listrow.SN}" id="{listrow.SN}" cols="64" style="font-family: MS Sans Serif; font-size: 10px; background-color: #DDEBFF">{listrow.COMMENT}</textarea></td>
    </tr>
<!-- END listrow -->
	<tr>
	   <td  bgcolor="#AED7FF" width="881" valign="top" colspan="3" align="center">
      <p align="center"><input type="submit" value="Save" name="B1">&nbsp;
      <input type="reset" value="Reset" name="B2"></td>
    </tr>
  </table>
  </form>
  </center>
</div>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7">
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
</table>