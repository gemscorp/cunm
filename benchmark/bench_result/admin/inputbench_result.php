
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
      <form name="inputbench_result"  action="{ACTION}"  method=post onsubmit="return chkvalid()" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="38">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#00C632">
          <b><font face="MS Sans Serif" size="2">&nbsp;</font></b></td>
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;resu</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="resu" size="20" value="{RESU}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;bench_id</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="bench_id" size="20" value="{BENCH_ID}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;mem_id</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="mem_id" size="20" value="{MEM_ID}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P1" size="20" value="{P1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P2" size="20" value="{P2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P3" size="20" value="{P3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P4" size="20" value="{P4}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P5" size="20" value="{P5}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;P6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="P6" size="20" value="{P6}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E1" size="20" value="{E1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E2" size="20" value="{E2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E3" size="20" value="{E3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E4" size="20" value="{E4}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E5" size="20" value="{E5}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E6" size="20" value="{E6}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E7</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E7" size="20" value="{E7}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E8</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E8" size="20" value="{E8}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;E9</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="E9" size="20" value="{E9}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;A1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="A1" size="20" value="{A1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;A2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="A2" size="20" value="{A2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;A3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="A3" size="20" value="{A3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R1" size="20" value="{R1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R2" size="20" value="{R2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R3" size="20" value="{R3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R4" size="20" value="{R4}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R5" size="20" value="{R5}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R6" size="20" value="{R6}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R7</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R7" size="20" value="{R7}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R8</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R8" size="20" value="{R8}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R9</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R9" size="20" value="{R9}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R10</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R10" size="20" value="{R10}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R11</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R11" size="20" value="{R11}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;R12</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="R12" size="20" value="{R12}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;L1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="L1" size="20" value="{L1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;L2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="L2" size="20" value="{L2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;L3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="L3" size="20" value="{L3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S1" size="20" value="{S1}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S2" size="20" value="{S2}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S3" size="20" value="{S3}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S4" size="20" value="{S4}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S5" size="20" value="{S5}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S6" size="20" value="{S6}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S7</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S7" size="20" value="{S7}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S8</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S8" size="20" value="{S8}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S9</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S9" size="20" value="{S9}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S10</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S10" size="20" value="{S10}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;S11</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
          <input type="text" name="S11" size="20" value="{S11}" ></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"> </span>
		  <input type="hidden" name="resu" value="{RESU}" >

          <input type="submit" value="Save" name="B2"></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
     if (document.inputbench_result.resu.value ==0)
	{
alert("Please enter a valid resu")
document.inputbench_result.resu.focus();
return false;
  } 
    else if (document.inputbench_result.bench_id.value ==0)
	{
alert("Please enter a valid bench_id")
document.inputbench_result.bench_id.focus();
return false;
  } 
    else if (document.inputbench_result.mem_id.value ==0)
	{
alert("Please enter a valid mem_id")
document.inputbench_result.mem_id.focus();
return false;
  } 
    else if (document.inputbench_result.P1.value ==0)
	{
alert("Please enter a valid P1")
document.inputbench_result.P1.focus();
return false;
  } 
    else if (document.inputbench_result.P2.value ==0)
	{
alert("Please enter a valid P2")
document.inputbench_result.P2.focus();
return false;
  } 
    else if (document.inputbench_result.P3.value ==0)
	{
alert("Please enter a valid P3")
document.inputbench_result.P3.focus();
return false;
  } 
    else if (document.inputbench_result.P4.value ==0)
	{
alert("Please enter a valid P4")
document.inputbench_result.P4.focus();
return false;
  } 
    else if (document.inputbench_result.P5.value ==0)
	{
alert("Please enter a valid P5")
document.inputbench_result.P5.focus();
return false;
  } 
    else if (document.inputbench_result.P6.value ==0)
	{
alert("Please enter a valid P6")
document.inputbench_result.P6.focus();
return false;
  } 
    else if (document.inputbench_result.E1.value ==0)
	{
alert("Please enter a valid E1")
document.inputbench_result.E1.focus();
return false;
  } 
    else if (document.inputbench_result.E2.value ==0)
	{
alert("Please enter a valid E2")
document.inputbench_result.E2.focus();
return false;
  } 
    else if (document.inputbench_result.E3.value ==0)
	{
alert("Please enter a valid E3")
document.inputbench_result.E3.focus();
return false;
  } 
    else if (document.inputbench_result.E4.value ==0)
	{
alert("Please enter a valid E4")
document.inputbench_result.E4.focus();
return false;
  } 
    else if (document.inputbench_result.E5.value ==0)
	{
alert("Please enter a valid E5")
document.inputbench_result.E5.focus();
return false;
  } 
    else if (document.inputbench_result.E6.value ==0)
	{
alert("Please enter a valid E6")
document.inputbench_result.E6.focus();
return false;
  } 
    else if (document.inputbench_result.E7.value ==0)
	{
alert("Please enter a valid E7")
document.inputbench_result.E7.focus();
return false;
  } 
    else if (document.inputbench_result.E8.value ==0)
	{
alert("Please enter a valid E8")
document.inputbench_result.E8.focus();
return false;
  } 
    else if (document.inputbench_result.E9.value ==0)
	{
alert("Please enter a valid E9")
document.inputbench_result.E9.focus();
return false;
  } 
    else if (document.inputbench_result.A1.value ==0)
	{
alert("Please enter a valid A1")
document.inputbench_result.A1.focus();
return false;
  } 
    else if (document.inputbench_result.A2.value ==0)
	{
alert("Please enter a valid A2")
document.inputbench_result.A2.focus();
return false;
  } 
    else if (document.inputbench_result.A3.value ==0)
	{
alert("Please enter a valid A3")
document.inputbench_result.A3.focus();
return false;
  } 
    else if (document.inputbench_result.R1.value ==0)
	{
alert("Please enter a valid R1")
document.inputbench_result.R1.focus();
return false;
  } 
    else if (document.inputbench_result.R2.value ==0)
	{
alert("Please enter a valid R2")
document.inputbench_result.R2.focus();
return false;
  } 
    else if (document.inputbench_result.R3.value ==0)
	{
alert("Please enter a valid R3")
document.inputbench_result.R3.focus();
return false;
  } 
    else if (document.inputbench_result.R4.value ==0)
	{
alert("Please enter a valid R4")
document.inputbench_result.R4.focus();
return false;
  } 
    else if (document.inputbench_result.R5.value ==0)
	{
alert("Please enter a valid R5")
document.inputbench_result.R5.focus();
return false;
  } 
    else if (document.inputbench_result.R6.value ==0)
	{
alert("Please enter a valid R6")
document.inputbench_result.R6.focus();
return false;
  } 
    else if (document.inputbench_result.R7.value ==0)
	{
alert("Please enter a valid R7")
document.inputbench_result.R7.focus();
return false;
  } 
    else if (document.inputbench_result.R8.value ==0)
	{
alert("Please enter a valid R8")
document.inputbench_result.R8.focus();
return false;
  } 
    else if (document.inputbench_result.R9.value ==0)
	{
alert("Please enter a valid R9")
document.inputbench_result.R9.focus();
return false;
  } 
    else if (document.inputbench_result.R10.value ==0)
	{
alert("Please enter a valid R10")
document.inputbench_result.R10.focus();
return false;
  } 
    else if (document.inputbench_result.R11.value ==0)
	{
alert("Please enter a valid R11")
document.inputbench_result.R11.focus();
return false;
  } 
    else if (document.inputbench_result.R12.value ==0)
	{
alert("Please enter a valid R12")
document.inputbench_result.R12.focus();
return false;
  } 
    else if (document.inputbench_result.L1.value ==0)
	{
alert("Please enter a valid L1")
document.inputbench_result.L1.focus();
return false;
  } 
    else if (document.inputbench_result.L2.value ==0)
	{
alert("Please enter a valid L2")
document.inputbench_result.L2.focus();
return false;
  } 
    else if (document.inputbench_result.L3.value ==0)
	{
alert("Please enter a valid L3")
document.inputbench_result.L3.focus();
return false;
  } 
    else if (document.inputbench_result.S1.value ==0)
	{
alert("Please enter a valid S1")
document.inputbench_result.S1.focus();
return false;
  } 
    else if (document.inputbench_result.S2.value ==0)
	{
alert("Please enter a valid S2")
document.inputbench_result.S2.focus();
return false;
  } 
    else if (document.inputbench_result.S3.value ==0)
	{
alert("Please enter a valid S3")
document.inputbench_result.S3.focus();
return false;
  } 
    else if (document.inputbench_result.S4.value ==0)
	{
alert("Please enter a valid S4")
document.inputbench_result.S4.focus();
return false;
  } 
    else if (document.inputbench_result.S5.value ==0)
	{
alert("Please enter a valid S5")
document.inputbench_result.S5.focus();
return false;
  } 
    else if (document.inputbench_result.S6.value ==0)
	{
alert("Please enter a valid S6")
document.inputbench_result.S6.focus();
return false;
  } 
    else if (document.inputbench_result.S7.value ==0)
	{
alert("Please enter a valid S7")
document.inputbench_result.S7.focus();
return false;
  } 
    else if (document.inputbench_result.S8.value ==0)
	{
alert("Please enter a valid S8")
document.inputbench_result.S8.focus();
return false;
  } 
    else if (document.inputbench_result.S9.value ==0)
	{
alert("Please enter a valid S9")
document.inputbench_result.S9.focus();
return false;
  } 
    else if (document.inputbench_result.S10.value ==0)
	{
alert("Please enter a valid S10")
document.inputbench_result.S10.focus();
return false;
  } 
    else if (document.inputbench_result.S11.value ==0)
	{
alert("Please enter a valid S11")
document.inputbench_result.S11.focus();
return false;
  }else{
 		 return true;
 		 }
		  } 
//--> 
</SCRIPT>