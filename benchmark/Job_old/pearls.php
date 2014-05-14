<?php
    /* 
        1. List profiles associate with the current login
        2. show option to view/edit/add profiles 
        3. SECURITY: check user association when editing profiles
    */
    $phpbb_root_path = './';
    include($phpbb_root_path . 'include/config.inc');   

    if ($id) {

       print_header();
       $query = "select * from pearls_cus where user_id = '$id'";
       $result = mysql_query($query) or die ("Query Failed " . mysql_error());
       $num_rows = mysql_num_rows($result);
       //echo $num_rows;
       print_header();
       echo "<table align=center class=stripe> <th colspan=2> Credit Unions </th> </tr>";
       while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
              echo "<tr><td>".$row["credit_union"]."</td><td><a href=/pearls/pearls.php?cu_id=".$row["id"]."> View </a></td></tr>\n";
        }
       echo "</table>";

    }
    if ($cu_id) {
        $query = "select fmain.*,fdata.* from pearls_financial as fmain left outer join pearls_fdata as fdata on fdata.uniq_id = fmain.uniq_id where fmain.cu_id = '$cu_id'";
        $result = mysql_query($query) or die ("Query Failed " . mysql_error());
        $data = array();
        if (mysql_num_rows($result) != 0 ) {
                print_header();
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    #echo $row["fkey"]." --- ".$row["value"]."\n";
                    $data[$row["fkey"]] = $row["value"];
                }
        } else {
               //TODO: Pears data not found sent to the file upload page.
                header("Location: http://www.aaccu.net/pearls/profiles.php?upload=1&id=$cu_id&flag=DNF");
        }
?>
    <table align=center>
        <tr>
            <th colspan=5 width=100%> Credit Union : $credit_union </th>
        </tr>
        <tr>
            <th colspan=5 width=100%> Period : $period </th>
        </tr>
        <tr>
            <th colspan=3 width=70%> P-E-A-R-L-S Ratios </th>
            <th width=15%> Goals </th>
            <th width=15%> Ratio </th>
        </tr>
        <tr>
            <td rowspan=7 width=5%> P </td>
            <td colspan=5 class=label align=left> PROTECTION </td>
        </tr>
        <tr>
            <td width=2%> 1 </td> 
            <td> Allowance for Loan Losses / Delinq. &gt 12 Mo. </td>    
            <td width=5%> 100% </td>
            <td width=5%> <?=pearls_func('P1', $data)?> </td>
        </tr>
        <tr>
            <td> 2 </td> 
            <td> Net Allowance for Loan Losses  / Delinq. 1-12 Mo. </td>     
            <td> 35% </td>
            <td> <?=pearls_func('P2', $data)?> </td>
        </tr>
        <tr>
            <td> 3 </td> 
            <td> Total Charge-Off of Delinquency > 12 Mo. </td>  
            <td> 100% </td>
            <td> <?=pearls_func('P3', $data)?> </td>
        </tr>
        <tr>
            <td> 4 </td> 
            <td> Quarterly Loan Charge-offs /Total Loan Portfolio </td>  
            <td> minimize  </td>
            <td> <?=pearls_func('P4', $data)?> </td>
        </tr>
        <tr>
            <td> 5 </td> 
            <td> Accum. Charge-Offs Recovered/ Accum Charge-Offs </td>   
            <td> 100% </td>
            <td> <?=pearls_func('P5', $data)?> </td>
        </tr>
        <tr>
            <td> 6 </td> 
            <td> Solvency </td>  
            <td> &gt=110% </td>
            <td> <?=pearls_func('P6', $data)?> </td>
        </tr>
        <tr class=whitestripe>
            <td colspan=5>&nbsp;  </td>
        </tr>
        <tr>
            <td rowspan=10 width=5%> E </td>
            <td colspan=5 align=left class=label> EFFECTIVE FINANCIAL STRUCTURE </td>
        </tr>
        <tr>
            <td> 1 </td> 
            <td> Net Loans / Total Assets </td>  
            <td> 100% </td>
            <td> <?=pearls_func('E1', $data)?> </td>
        </tr>
        <tr>
            <td> 2 </td> 
            <td> Liquid Investments / Total Assets </td>     
            <td> 100% </td>
            <td> <?=pearls_func('E2', $data)?> </td>
        </tr>

        <tr>
            <td> 3 </td> 
            <td> Financial Investments / Total Assets </td>  
            <td> 100% </td>
            <td> <?=pearls_func('E3', $data)?> </td>
        </tr>

        <tr>
            <td> 4 </td> 
            <td> Non-Financial Investments / Total Assets </td>  
            <td> 100% </td>
            <td> <?=pearls_func('E4', $data)?> </td>
        </tr>

        <tr>
            <td> 5 </td> 
            <td> Savings Deposits / Total Assets </td>   
            <td> 100% </td>
            <td> <?=pearls_func('E5', $data)?> </td>
        </tr>

        <tr>
            <td> 6 </td> 
            <td> External Credit / Total Assets </td>    
            <td> 100% </td>
            <td> <?=pearls_func('E6', $data)?> </td>
        </tr>

        <tr>
            <td> 7 </td> 
            <td> Member Share Capital / Total Assets </td>   
            <td> 100% </td>
            <td> <?=pearls_func('E7', $data)?> </td>
        </tr>

        <tr>
            <td> 8 </td> 
            <td> Institutional Capital / Total Assets </td>  
            <td> 100% </td>
            <td> <?=pearls_func('E8', $data)?> </td>
        </tr>

        <tr>
            <td> 9 </td> 
            <td> Net Institutional Capital / Total Assets </td>  
            <td> 100% </td>
            <td> <?=pearls_func('E9', $data)?> </td>
        </tr>
        <tr class=whitestripe>
            <td colspan=5>&nbsp;  </td>
        </tr>
        <tr>
            <td rowspan=4 width=5%> A </td>
            <td colspan=5 align=left class=label> ASSET QUALITY </td>
        </tr>
        <tr>
            <td> 1 </td> 
            <td> Total Delinquency / Total Loan Portfolio </td>
            <td> 100% </td>
            <td> <?=pearls_func('A1', $data)?> </td>
        </tr>
        <tr>
            <td> 2 </td> 
            <td> Non-Earning Assets / Total Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('A2', $data)?> </td>
        </tr>

        <tr>
            <td> 3 </td> 
            <td> Zero Cost Funds  / Non-earning. Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('A3', $data)?> </td>
        </tr>

        <tr class=whitestripe>
            <td colspan=5>&nbsp;  </td>
        </tr>

        <tr>
            <td rowspan=13 width=5%> R </td>
            <td colspan=5 align=left class=label> RATES OF RETURN AND COSTS </td>
        </tr>
        
        <tr>
            <td> 1 </td> 
            <td> Net Loan Income / Average Net Loan Portfolio </td>
            <td> 100% </td>
            <td> <?=pearls_func('R1', $data)?> </td>
        </tr>
        
        <tr>
            <td> 2 </td>
            <td> Liquid Assets Income /Avg. Liquid Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R2', $data)?> </td>
        </tr>
        
        <tr>
            <td> 3 </td>
            <td> Fin. Investment Income  / Avg. Fin. Investments </td>
            <td> 100% </td>
            <td> <?=pearls_func('R3', $data)?> </td>
        </tr>
        <tr>
            <td> 4 </td>
            <td> Non-Fin. Inv. Income / Avg. Non-Fin. Investments </td>
            <td> 100% </td>
            <td> <?=pearls_func('R4', $data)?> </td>
        </tr>
        <tr>
            <td> 5 </td>
            <td> Fin Costs: Savings Deposits / Avg. Savings Deposits </td>
            <td> 100% </td>
            <td> <?=pearls_func('R5', $data)?> </td>
        </tr>
        <tr>
            <td> 6 </td>
            <td> Fin Costs: External Credit / Avg. External Credit </td>
            <td> 100% </td>
            <td> <?=pearls_func('R6', $data)?> </td>
        </tr>
                <tr>
            <td> 7 </td>
            <td> Fin Costs: Member Shares / Avg. Member Shares </td>
            <td> 100% </td>
            <td> <?=pearls_func('R7', $data)?> </td>
        </tr>
        <tr>
            <td> 8 </td>
            <td> Gross Margin / Average Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R8', $data)?> </td>
        </tr>
        <tr>
            <td> 9 </td>
            <td> Operating Expenses / Average Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R9', $data)?> </td>
        </tr>
        <tr>
            <td> 10 </td>
            <td> Provisions for Risk Assets / Average Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R10', $data)?> </td>
        </tr>
        <tr>
            <td> 11 </td>
            <td> Other Income or Expense  / Average Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R11', $data)?> </td>
        </tr>
        <tr>
            <td> 12 </td>
            <td> Net Income / Average Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('R12', $data)?> </td>
        </tr>

        <tr class=whitestripe>
            <td colspan=5>&nbsp;  </td>
        </tr>

        <tr>
            <td rowspan=4 width=5%> L </td>
            <td colspan=5 align=left class=label> LIQUIDITY </td>
        </tr>

         <tr>
            <td> 1 </td>
            <td> Liquid Assets - ST Payables / Total Deposits </td>
            <td> 100% </td>
            <td> <?=pearls_func('L1', $data)?> </td>
        </tr>

         <tr>
            <td> 2 </td>
            <td> Liquidity Reserves / Total Savings Deposits </td>
            <td> 100% </td>
            <td> <?=pearls_func('L2', $data)?> </td>
        </tr>

         <tr>
            <td> 3 </td>
            <td> Non-Earning Liquid Assets / Total Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('L3', $data)?> </td>
        </tr>

        <tr class=whitestripe>
            <td colspan=5>&nbsp;  </td>
        </tr>

        <tr>
            <td rowspan=12 width=5%> S </td>
            <td colspan=5 align=left class=label> SIGNS OF GROWTH </td>
        </tr>

        <tr>
            <td> 1 </td>
            <td> Growth in Loans  </td>
            <td> 100% </td>
            <td> <?=pearls_func('S1', $data)?> </td>
        </tr>

        <tr>
            <td> 2 </td>
            <td> Growth in Liquid Investments   </td>
            <td> 100% </td>
            <td> <?=pearls_func('S2', $data)?> </td>
        </tr>

        <tr>
            <td> 3 </td>
            <td> Growth in Financial Investments   </td>
            <td> 100% </td>
            <td> <?=pearls_func('S3', $data)?> </td>
        </tr>
        <tr>
            <td> 4 </td>
            <td> Growth in Non-Financial Investments   </td>
            <td> 100% </td>
            <td> <?=pearls_func('S4', $data)?> </td>
        </tr>
        <tr>
            <td> 5 </td>
            <td> Growth in Savings Deposits   </td>
            <td> 100% </td>
            <td> <?=pearls_func('S5', $data)?> </td>
        </tr>
        <tr>
            <td> 6 </td>
            <td> Growth in Borrowed Funds   </td>
            <td> 100% </td>
            <td> <?=pearls_func('S6', $data)?> </td>
        </tr>
        <tr>
            <td> 7 </td>
            <td> Growth in Member Shares </td>
            <td> 100% </td>
            <td> <?=pearls_func('S7', $data)?> </td>
        </tr>
        <tr>
            <td> 8 </td>
            <td> Growth in Institutional Capital </td>
            <td> 100% </td>
            <td> <?=pearls_func('S8', $data)?> </td>
        </tr>
        <tr>
            <td> 10 </td>
            <td> Growth in Membership </td>
            <td> 100% </td>
            <td> <?=pearls_func('S9', $data)?> </td>
        </tr>
        <tr>
            <td> 11 </td>
            <td> Growth in Total Assets </td>
            <td> 100% </td>
            <td> <?=pearls_func('S10', $data)?> </td>
        </tr>
    </table>


<?php

}
    function pearls_func($pfunc, $data) {
        $rfunc = "";
        switch ($pfunc) {
            case 'P1':
                if ($data["C21"] != 0 and $data["C21"] != "") {
                    $rfunc = $data["C26"] / $data["C21"] * 100;
                } else {
                    $rfunc = 0;
                }
                break;
            case 'P2':
                $rfunc = $data["C27"] / $data["C16"] * 100;
                break;
            case 'P3':
                if ($data["C21"] != 0 and $data["C21"] != "") {
                    $rfunc = $data["C98"] / $data["C21"] * 100;
                } else {
                    $rfunc = 0;
                }
                break;
            case 'P4':
                $rfunc = $data["C99"] / $data["C23"] * 100;
                break;
            case 'P5':
                //if ($data["C101"] != 0 and $data["C101"] != "") {
                    $rfunc = $data["C100"] / $data["C101"] * 100;
                //} else {
                //    $rfunc = 0;
                //}
                break;
            case 'P6':
                $rfunc = ($data["C37"] + $data["C28"] - $data["C21"] - ( 0.35 * $data["C16"]) - $data["C49"] + $data["C40"]) / ($data["C40"] + $data["C52"]) * 100;
                break;
            case 'E1':
                $rfunc = $data["C29"] / $data["C37"] * 100;
                break;
            case 'E2':
                $rfunc = $data["C7"] / $data["C37"] * 100;
                break;
            case 'E3':
                $rfunc = $data["C32"] / $data["C37"] * 100;
                break;
            case 'E4':
                $rfunc = $data["C33"] / $data["C37"] * 100;
                break;
            case 'E5':
                $rfunc = $data["C40"] / $data["C37"] * 100;
                break;
            case 'E6':
                $rfunc = $data["C48"] / $data["C37"] * 100;
                break;
            case 'E7':
                $rfunc = $data["C52"] / $data["C37"] * 100;
                break;
            case 'E8':
                $rfunc = $data["C53"] / $data["C37"] * 100;
                break;
            case 'E9':
				$x = .35 * $data["C16"];
				$y = $data[C53] + $data[C28] - $data[C21] - $x - $data[C36];
                $rfunc = ( $y / $data[C37]) *100;
                break;
            case 'A1':
                $rfunc = ($data["C22"] / $data["C23"]) * 100;
                break;
            case 'A2':
                $rfunc = ($data["C35"] + $data["C6"]) / $data["C37"] * 100;
                break;
            case 'A3':
                $rfunc = (($data["C53"] + $data["C28"] - $data["C21"] - (.35 * $data["C16"]) - $data["C36"] + $data["C54"] + $data["C43"]) / ($data["C35"] + $data["C6"])) * 100;
                break;
            case 'R1':
                $rfunc = $data["C65"] / (($data["C23"] + $data["C103"]) / 2) * 100;
                break;
            case 'R2':
                $rfunc = ($data["C66"] / (($data["C7"] + $data["C114"]) / 2)) * 100;
                break;
            case 'R3':
                $rfunc = $data["C67"] / (($data["C32"] + $data["C115"]) / 2) * 100;
                break;
            case 'R4':
                $rfunc = ($data["C68"] / (($data["C33"] + $data["C116"]) / 2)) * 100;
                break;
            case 'R5':
                $rfunc = ($data["C72"] / (($data["C40"] + $data["C117"]) / 2)) * 100;
                break;
            case 'R6':
                $rfunc = ($data["C73"] / (($data["C48"] + $data["C118"]) / 2)) * 100;
                break;
            case 'R7':
                $rfunc = ($data["C92"] / (($data["C52"] + $data["C119"]) / 2)) * 100;
                break;
            case 'R8':
                $rfunc = ($data["C75"] / (($data["C37"] + $data["C110"]) / 2)) * 100;
                break;
            case 'R9':
                $rfunc = ($data["C83"] / (($data["C37"] + $data["C110"]) / 2)) * 100;
                break;
            case 'R10': 
                $rfunc = ($data["C84"] / (($data["C37"] + $data["C110"]) / 2)) * 100;
                break;
            case 'R11':
                $rfunc = ($data["C87"] / (($data["C37"] + $data["C110"]) / 2)) * 100;
                break;  
            case 'R12':
				echo $data[C88];
				$x = $data[C88] - $data[C92];
				$y = ($data["C37"] + $data["C110"]) / 2;
                echo "($x / $y) * 100";
                break;
            case 'L1': 
                $rfunc = (($data["C8"] - $data["C41"] - $data["C46"]) / $data["C40"]) * 100;
                break;
            case 'L2':
                $rfunc = ($data["C8"] / $data["C40"]) * 100;
                break;
            case 'L3':
                $rfunc = ($data["C6"] / $data["C37"]) * 100;
                break;
            case 'S1':
                $rfunc = (($data["C23"] / $data["C103"]) - 1) * 100;
                break;
            case 'S2':
                $rfunc = (($data["C7"] / $data["C104"]) - 1) * 100;
                break;
            case 'S3':
                $rfunc = (($data["C32"] / $data["C105"]) - 1) * 100;
                break;
            case 'S4':
                $rfunc = (($data["C33"] / $data["C106"]) - 1) * 100;
                break;
            case 'S5':
                $rfunc = (($data["C40"] / $data["C107"]) - 1) * 100;
                break;
            case 'S6':
                $rfunc = (($data["C53"] / $data["C108"]) - 1) * 100;
                break;
            case 'S7':
                $rfunc = (($data["C57"] / $data["C109"]) - 1) * 100;
                break;
            case 'S8':
                $rfunc = (($data["C64"] / $data["C111"]) - 1) * 100;
                break;
            case 'S9':
                $rfunc = (($data["C112"] / $data["C113"]) - 1) * 100;
                break;
            case 'S10':
                $rfunc = (($data["C37"] / $data["C110"]) - 1) * 100;
                break;
        }
        return sprintf("%01.2f", $rfunc);
        //return $rfunc;
                
    }
?>