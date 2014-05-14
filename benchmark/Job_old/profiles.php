<?php
    /* 
        1. List profiles associate with the current login
        2. show option to view/edit/add profiles 
        3. SECURITY: check user association when editing profiles
    */
    $phpbb_root_path = './';
    include($phpbb_root_path . 'include/config.inc');   
    if (! $MAX_FILE_SIZE) {
?>
<html> <head> <title> Profiles </title> 
<link rel=stylesheet type=text/css href=/pearls/style.css>
</head> 
<body>
<?php
    }
    // we are in upload page
    if ($upload) {
        // we are handling an upload
        if ($MAX_FILE_SIZE) {
            $uploaddir = "/home/aaccu02/public_html/pearls/data/$cu_id";
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir);
            }
            /***** 
             *
             *  If uploading an excel file get the date, quator information 
             *  redirect to the excel read file
             *  update the tables to show recent data 
             *
            */
            $uploadfile = $uploaddir . "/" . $_FILES['FILE1']['name'];
            //print "<pre>";
            if (move_uploaded_file($_FILES['FILE1']['tmp_name'], $uploadfile)) {
                $filename = $_FILES['FILE1']['name'];
                $today = date('j-m-y');
                $year = date('y');
                /* USE THE SAME QUERY STRING */
                $query = "update pearls_cus set f". $category ." = '$filename', 
                                cmt". $category ." = '$comments', 
                                dt". $category ." = '$today'
                            where id = '$cu_id'";
                $result = mysql_query($query) or die ("Query Failed " . mysql_error());
                if ($category == "financial") {
                    $query = "insert into pearls_financial (cu_id, period, file_date, year)
                            VALUES ('$cu_id','$quator', '$today', '$year')";
                    $result = mysql_query($query) or die ("Query Failed : ". mysql_error());
                    $auto_id = mysql_result((mysql_query("SELECT LAST_INSERT_ID()")), 0 , 0);
                    header("Location: http://www.aaccu.net/cgi-bin/read_excel.cgi?file=$filename&id=$cu_id&fid=$auto_id");
                }
                /* print "File is valid, and was successfully uploaded. ";
                print "Here's some more debugging info:\n"; */
                print_r($_FILES);
            } else {
                print "Possible file upload attack!  Here's some debugging info:\n";
                print_r($_FILES);
            }
            print "</pre>";
        } else {
?>  

<form method=post action="/pearls/profiles.php" ENCTYPE="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <?php
        if ($flag == "DNF") {
           echo "<div align=center style='font-color: red;' width=100px> Pearls Data Not Found </div>";
        }
    ?>
    <table align=center class=stripe width=600>
        <tr>
            <th colspan=2 class=heading>New Document</th>
        </tr>
        <tr>
            <td colspan=2>&nbsp;</td>
        </tr>
        <tr>
            <td align=left class=heading>Category: </td> 
            <td>
                <select name=category> 
                    <option value=general> General Documentation </option>
                    <option value=audit> Audited Financial Statments </option>
                    <option value=policy> New Policies </option>
                    <option value=financial> Financial Data </option>
            </td>
        </tr>
        <tr>
            <td align=left class=label> Quator: </td>
            <td>
                <select name=quator>
                    <option value=1> First Quator
                    <option value=2> Second Quator
                    <option value=3> Third Quator
                    <option value=4> Forth Quator
                </select>
            </td>
        </tr>
        <input type=hidden name=debug value=0>
        <input type=hidden name=upload value=1>
        <input type=hidden name=cu_id value=<?=$id?>>
        <tr>
            <td align=left class=heading>File:</td>
            <td><input type=file name='FILE1' size=60></td>
        </tr>
        <tr>
            <td align=left class=heading valign=middle>Description:</td>
            <td valign=middle> <textarea name=description cols=60 rows=5 onFocus="if(this.value == '--Enter Description--')this.value='';">--Enter Description--</textarea> 
        <tr>
            <td align=center colspan=2><input type=submit value='Upload'></td>
        </tr>
        <tr>
            <td colspan=2>&nbsp;&nbsp;</td>
        </tr>
        <tr><td colspan=2 align=center><font color=red><B>*** NOTE ***<B></font> If you are uploading a Excel Data Sheet please use the Template provided.</td></tr>        
    </table>        
    
<?php   
        }
    }

    if ($ACTION == "UPDATE") {
               // WHERE cu_id = '$id'
        $query = "UPDATE pearls_profiles
                            SET credit_union = '$credit_union', address = '$address',country = '$country',
                                phone = '$phone', fax = '$fax', email = '$email', home_page = '$home_page',
                                e_year = '$e_year', vision = '$vision', mission = '$mission',
                                members_urban = '$members_urban', members_rural= '$members_rural',
                                members_urban_low = '$members_urban_low', members_rural_low = '$members_rural_low',
                                members_urban_male = '$members_urban_male', members_rural_male = '$members_rural_male',
                                members_urban_female = '$members_urban_female', members_rural_female = '$members_rural_female',
                                members_urban_g1 = '$members_urban_g1', members_urban_g2 = '$members_urban_g2',
                                members_urban_g3 = '$members_urban_g3', members_urban_g4 = '$members_urban_g4',
                                members_rural_g1 = '$members_rural_g1', members_rural_g2 = '$members_rural_g2',
                                members_rural_g3 = '$members_rural_g3', members_rural_g4 = '$members_rural_g4',
                                assets_total = '$assets_total', savings_total = '$savings_total,
                                savings_male = '$savings_male', savings_female = '$savings_female,
                                savings_youth = '$savings_youth', saving_nonmember = '$saving_nonmember',
                                share_total = '$share_total', share_male = '$share_male',
                                share_female = '$share_female', share_youth = '$share_youth',
                                loan_total = '$loan_total', loan_male = '$loan_male',
                                loan_female = '$loan_female', loan_youth = '$loan_youth',
                                reserve_total = '$reserve_total', board_name_1 = '$board_name_1',
                                board_name_2='$board_name_2', board_name_3='$board_name_3',
                                board_name_4='$board_name_4', board_name_5='$board_name_5',
                                board_name_6='$board_name_6', board_name_7='$board_name_7',
                                board_name_8='$board_name_8', board_name_9='$board_name_9',
                                board_name_10='$board_name_10', board_pos_1='$board_pos_1',
                                board_pos_2='$board_pos_2', board_pos_3='$board_pos_3',
                                board_pos_4='$board_pos_4', board_pos_5='$board_pos_5',
                                board_pos_6='$board_pos_6', board_pos_7='$board_pos_7',
                                board_pos_8='$board_pos_8', board_pos_9='$board_pos_9',
                                board_pos_10='$board_pos_10', manage_name_1='$manage_name_1',
                                manage_name_2='$manage_name_2', manage_name_3='$manage_name_3',
                                manage_name_4='$manage_name_4', manage_name_5='$manage_name_5',
                                manage_pos_1='$manage_pos_1', manage_pos_2='$manage_pos_2',
                                manage_pos_3='$manage_pos_3', manage_pos_4='$manage_pos_4',
                                manage_pos_5='$manage_pos_5'
                          WHERE cu_id = '$cu_id'";
        $result = mysql_query($query) or die ("Query Failed ". mysql_error());
    } elseif ($ACTION == "SAVE") {
        /* create new profile */
        /* check for the update flag */
        $query = "insert into pearls_cus (user_id,credit_union) values ('$user_id', '$credit_union')";
               $result = mysql_query($query) or die ("Query Failed :" . mysql_error());
               //$result = mysql_query("SELECT LAST_INSERT_ID()") or die ("Query Failed : ". mysql_error());
               $auto_id = mysql_result((mysql_query("SELECT LAST_INSERT_ID()")), 0 , 0);
               echo $auto_id;
               $query = "INSERT INTO pearls_profiles
                                  (credit_union, cu_id, address, country, phone,
                                   fax, email, home_page, e_year, vision, mission,
                                   members_urban, members_rural, members_urban_low,
                                   members_rural_low, members_urban_male, members_rural_male,
                                   members_urban_female, members_rural_female, members_urban_g1,
                                   members_rural_g1, members_urban_g2, members_rural_g2,
                                   members_urban_g3, members_rural_g3, members_urban_g4,
                                   members_rural_g4, assets_total, savings_total, savings_male,
                                   savings_female, savings_youth, saving_nonmember, share_total,
                                   share_male, share_female, share_youth, loan_total, loan_male,
                                   loan_female, loan_youth, reserve_total, board_name_1, board_name_2,
                                   board_name_3, board_name_4, board_name_5, board_name_6, board_name_7,
                                   board_name_8, board_name_9, board_name_10, board_pos_1, board_pos_2,
                                   board_pos_3, board_pos_4, board_pos_5, board_pos_6, board_pos_7,
                                   board_pos_8, board_pos_9, board_pos_10, manage_name_1, manage_name_2,
                                   manage_name_3, manage_name_4, manage_name_5, manage_pos_1, manage_pos_2,
                                   manage_pos_3, manage_pos_4, manage_pos_5,userid )
                         VALUES
                                 ('$credit_union', '$auto_id', '$address', '$country', '$phone', '$fax',
                                  '$email', '$home_page', '$e_year', '$vision', '$mission', '$members_urban',
                                  '$members_rural', '$members_urban_low', '$members_rural_low', '$members_urban_male',
                                  '$members_rural_male', '$members_urban_female', '$members_rural_female','$members_urban_g1',
                                  '$members_rural_g1', '$members_urban_g2', '$members_rural_g2', '$members_urban_g3', '$members_rural_g3',
                                  '$members_urban_g4', '$members_rural_g4', '$assets_total', '$savings_total', '$savings_male',
                                  '$savings_female', '$savings_youth', '$saving_nonmember', '$share_total', '$share_male',
                                  '$share_female', '$share_youth', '$loan_total', '$loan_male', '$loan_female', '$loan_youth',
                                  '$reserve_total', '$board_name_1', '$board_name_2', '$board_name_3', '$board_name_4',
                                  '$board_name_5', '$board_name_6', '$board_name_7', '$board_name_8', '$board_name_9',
                                  '$board_name_10', '$board_pos_1', '$board_pos_2', '$board_pos_3', '$board_pos_4', '$board_pos_5',
                                  '$board_pos_6', '$board_pos_7', '$board_pos_8', '$board_pos_9', '$board_pos_10',
                                  '$manage_name_1','$manage_name_2', '$manage_name_3','$manage_name_4', '$manage_name_5',
                                  '$manage_pos_1', '$manage_pos_2', '$manage_pos_3', '$manage_pos_4', '$manage_pos_5','$user_id')";

               $result = mysql_query($query) or die ("Query Failed : ". mysql_error());
    }

    if ($list) {
        /* display profile list */
        echo "<div align=center> Profile Manager </div>";
        $query = "select credit_union,id from pearls_cus where user_id = '$userid'";
        $result = mysql_query($query) or die ("Query Failed :" . mysql_error());
        if (mysql_num_rows($result) == 0) {
            /* no profiles */
            echo "<h4 align=center> You have no profiles associated with this login </h4>";
        } else {
?>
        <table class=stripe align=center cellpadding=5>
            <tr> 
                <th class=heading>Credit Union </th> 
                <th class=heading>View </th> 
                <th class=heading>Edit</th> 
                <th class=heading>Delete</th> 
                <th class=heading>Upload</th>
            </tr>
<?php
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
?>
            <tr>
                <td class=label> <?=$row["credit_union"]?> </td>
                <td> [<a href=/pearls/profiles.php?view=1&id=<?=$row["id"]?>>View</a>]</td>
                <td> [<a href=/pearls/profiles.php?edit=1&id=<?=$row["id"]?>&userid=<?=$userid?>>Edit</a>]</td>
                <td> [<a href=/pearls/profiles.php?delete=1&id=<?=$row["id"]?>>Delete</a>]</td>
                <td> [<a href=/pearls/profiles.php?upload=1&id=<?=$row["id"]?>>Upload</a>]</td>
            </tr>
<?php           } 
        }
?>
        </table>
        <br>
        <div align=center style='font:normal bolder 8pt Arial;'>
            <a href=/pearls/profiles.php?add=1&userid=<?=$userid?> style='font:normal bolder 8pt Arial;'>Add New Profile </div></a>
            &nbsp;&nbsp;
        </div>
            

<?php
    }
    /**** ADDING NEW PROFILES ****/
    if ($add or $edit) {

        if ($edit) {
            $query = "SELECT * FROM pearls_profiles WHERE cu_id = '$id'";
            $result = mysql_query($query) or die ("Query Failed ". mysql_error());
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
        }
    /** if edit mode then select the row and put the values in textboxes and flag the save as an update instead of an insert **/

    /** fill in the blocks for edit **/
?>

    <form action=/pearls/profiles.php method=post>
    <h3 align=center> Please enter the profile information for the credit union </h3>
    <h5 align=left> Fields in Yellow are mandatory </h5>
    <table class=noclass style=\"background-color: white\"> 
    <tr class=noclass style=\"background-color: white\"> 
    <td class=noclass style=\"background-color: white\">
    
    <table align=center class=stripe width=100%> 
        <tr><th colspan=2 class=heading>  Member Profile : <?=$row["credit_union"]?> </th> </tr>
        <tr class=grayStripe>
            <td class=label align=left> Credit Union: </th> 
            <td><input value='<?=$row["credit_union"]?>' class=mand size=50 type=text name=credit_union> </td> 
        </tr>
        <tr>
            <td class=label align=left> Address: </td>
            <td><input size=50 type=text name=address value='<?=$row["address"]?>'></td>
        </tr>
        <tr>
            <td class=label align=left> Country: </td>
            <td><input size=30 type=text name=country value='<?=$row["country"]?>'> </td>
        </tr>
        <tr>
            <td class=label align=left> Telephone: </td> 
            <td><input size=8 type=text name=phone> </td>
        </tr>
        <tr>
            <td class=label align=left> Fax: </td> 
            <td><input size=8 type=text name=fax> </td> 
        </tr>
        <tr>
            <td class=label align=left> Email: </td> 
            <td><input size=20 type=text name=email> </td> 
        </tr>
        <tr>
            <td class=label align=left> Homepage: </td> 
            <td><input size=30 type=text name=home_page> </td> 
        </tr>
        <tr>
            <td class=label align=left> Established: (YYYY) </td> 
            <td><input size=4 type=text name=e_year> </td>
        </tr>
        
        <tr>
            <td class=label align=left> Vision: </td> 
            <td><textarea name=vision rows=3 cols=100></textarea></td> 
        </tr>
        <tr>
            <td class=label align=left> Mission: </td>
            <td><textarea name=mission rows=3 cols=100></textarea></td> 
        </tr>
    </table> 
    </td> 
    </tr>
    <tr class=noclass style="background-color: white"> 
        <td class=noclass style=background-color: white>
            <hr align=center width=60% height=8px> 
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <table class=stripe align=center width=100%>
                <tr>
                    <th colspan=3 class=heading> Membership Profile </th> 
                </tr> 
                <tr>
                    <th rowspan=1 class=heading> Type of Credit Union </th> 
                    <th rowspan=1 class=heading> Number of members </th> 
                    <th rowspan=1 class=heading> Low income  less then \$30  per month members </th> 
                </tr>
                <tr> 
                    <td class=label> Urban </td> 
                    <td> <input type=text name=members_urban></td> 
                    <td> <input type=text name=members_urban_low></td> 
                </tr>
        
                <tr> 
                    <td class=label> Rural </td> 
                    <td><input type=text name=members_rural></td> 
                    <td> <input type=text name=members_rural_low></td>  
                </tr>
            </table>
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <table class=stripe align=left> 
                <tr>
                    <th colspan=7 class=heading> Market segmentation </th> 
                </tr>
                <tr>
                    <th rowspan=2 class=heading> Type of Credit Union </th> 
                    <th rowspan=2 class=heading> Male </th>
                    <th rowspan=2 class=heading> Female</th> 
                    <th colspan=4 class=heading> Age Segment of CU Membership</th> 
                </tr>
                <tr>
                    <th class=heading> <18-19 </th> 
                    <th class=heading> 30-45 </th> 
                    <th class=heading> 45-60 </th> 
                    <th class=heading> 60> </th> 
                </tr>
                <tr> 
                    <td class=label> Urban </td>  
                    <td><input type=text name=members_urban_male></td> 
                    <td><input type=text name=members_urban_female></td> 
                    <td><input type=text name=members_urban_g1></td> 
                    <td><input type=text name=members_urban_g2></td> 
                    <td><input type=text name=members_urban_g3></td> 
                    <td><input type=text name=members_urban_g4></td>
                </tr>
            
                <tr> 
                    <td class=label> Rural </td>  
                    <td><input type=text name=members_rural_male></td>
                    <td><input type=text name=members_rural_female></td>
                    <td><input type=text name=members_rural_g1></td> 
                    <td><input type=text name=members_rural_g2></td> 
                    <td><input type=text name=members_rural_g3></td> 
                    <td><input type=text name=members_rural_g4></td> 
                </tr>
            </table>
        </td>
    </tr>



    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <table class=stripe align=center> 
                <tr>
                    <th colspan=2 class=heading>Assets of the Movement </th>
                </tr> 
                <tr>
                    <th rowspan=1 class=heading> Type of Credit Union </th> 
                    <th rowspan=1 class=heading> Total Assets </th> 
                </tr>
                <tr> 
                    <td class=label> Total Number</td> 
                    <td> <input type=text name=assets_total></td> 
                </tr>
            </table>    
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>


    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <table class=stripe align=center> 
                <tr>
                    <th colspan=6 class=heading> Core Business </th>
                </tr>
                <tr>
                    <th rowspan=2 class=heading> Type of Credit Union </th> 
                    <th rowspan=2 class=heading> Amount in US\$ </th> 
                    <th colspan=4 class=heading> Usage of Service US\$ </th> 
                </tr>
                <tr>
                    <th class=heading> Male </th> 
                    <th class=heading> Female </th> 
                    <th class=heading> Youth </th> 
                    <th class=heading> Non-Members </th> 
                </tr>
                <tr> 
                    <td class=label> Savings</td> 
                    <td><input type=text name=savings_total></td> 
                    <td><input type=text name=savings_male></td> 
                    <td><input type=text name=savings_female></td> 
                    <td><input type=text name=savings_youth></td> 
                    <td><input type=text name=savings_nonmember></td> 
                </tr>
                <tr> 
                    <td class=label> Share</td> 
                    <td><input type=text name=share_total></td> 
                    <td><input type=text name=share_male></td> 
                    <td><input type=text name=share_female></td> 
                    <td><input type=text name=share_youth></td> 
                    <td><input type=text name=share_nonmember></td> 
                </tr>
                <tr> 
                    <td class=label> Loan Outstanding</td> 
                    <td><input type=text name=loan_total></td> 
                    <td><input type=text name=loan_male></td> 
                    <td><input type=text name=loan_female></td> 
                    <td><input type=text name=loan_youth></td> 
                    <td><input type=text name=loan_nonmember></td> 
                </tr>
                <tr> 
                    <td class=label> Total Reserve</td> 
                    <td><input type=text name=reserve_total></td>
                    <td colspan=4> &nbsp; </td> 
                </tr>
            </table>
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <table class=stripe align=center> 
                <tr>
                    <th class=heading colspan=2> Board Members and other committee </th>
                </tr>
                <tr>
                    <th rowspan=1 class=heading> Name </th> 
                    <th rowspan=1 class=heading> Position </th> 
                </tr>
<?php
        $DIRECTOR_LIMIT = 10;
        for ($iR=1;$iR<=$DIRECTOR_LIMIT;$iR++) {
?>
                <tr> 
                    <td><input type=text size=30 name=board_name_<?=$iR?>></td> 
                    <td><input type=text size=30 name=board_pos_<?=$iR?>></td> 
                </tr>
<?php   } ?>
            </table>
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>

    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <!-- loop limit 10 -->
            <table class=stripe align=center> 
                <tr>
                    <th colspan=2 class=heading> Senior Management </th>
                </tr>
                <tr>
                    <th rowspan=1 class=heading> Name </th> 
                    <th rowspan=1 class=heading> Position </th> 
                </tr>
<?php
        $MANAGER_LIMIT = 5;
        for($iR=1; $iR<=$MANAGER_LIMIT; $iR++) {
?>
                <tr> 
                    <td><input type=text size=30 name=manage_name_<?=$iR?>></td> 
                    <td> <input type=text size=30 name=manage_pos_<?=$iR?>></td> 
                </tr>
<?php       }   ?>
            </table>
        </td>
    </tr>


    <tr class=noclass style="background-color: white"> 
        <td class=noclass style="background-color: white">
            <hr align=center width=60%> 
        </td>
    </tr>
    <tr> 
        <td align=center><input type=button class=button value='Save' onclick=doSubmit(this.form)></td> 
    </tr>

    <input type=hidden name=user_id value=<?=$userid?>>
    <?php if ($edit) {
       echo "<input type=hidden name=cu_id value='$id'>
             <input type=hidden name=ACTION value=UPDATE>";
    } else {
       echo "<input type=hidden name=ACTION value=SAVE>";
    }
    ?>
    </form>

    <script language=JScript>

    function doSubmit(oForm) {
        var myarray = document.all;
        //alert(myarray.length);
        for (i=0;i<myarray.length; i++) {
            if (myarray[i].className == 'mand' && myarray[i].value == '') {
                alert('** ERROR ** Missing Required Field');
                myarray[i].focus();
                return false;
            }
        }
        oForm.submit(); 
    }

    </script>

    </table>


<?php
    }
    if ($view) {
        $query = "select profile.*,cu.* from pearls_profiles as profile,pearls_cus as cu where profile.cu_id = '$id' and cu.id = profile.cu_id ";
        $result = mysql_query($query) or die ("Query Failed: " . mysql_error());
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
                        
        $members_total = $row["members_urban"] + $row["members_rural"];
        $members_total_low = $row["members_rural_low"] + $row["members_urban_low"];

        if ($row["members_urban"] <= 300) { $mu_1 = "X"; }
        elseif ($row["members_urban"] > 300 && $members_urban <= 1000) { $mu_2 = "X"; }
        elseif ($row["members_urban"] > 1000 && $members_urban <= 3000) { $mu_3 = "X"; }
        elseif ($row["members_urban"] > 3000 && $members_urban <= 5000) { $mu_4 = "X"; }
        elseif ($row["members_urban"] > 5000 ) { $mu_5 = "X"; }

        if ($row["members_rural"] <= 300) { $mr_1 = "X"; }
        elseif ($row["members_rural"] > 300 && $row["members_rural"] <= 1000) { $mr_2 = "X"; }
        elseif ($row["members_rural"] > 1000 && $row["members_rural"] <= 3000) { $mr_3 = "X"; }
        elseif ($row["members_rural"] > 3000 && $row["members_rural"] <= 5000) { $mr_4 = "X"; }
        elseif ($row["members_rural"] > 5000 ) { $mr_5 = "X"; }

        if ($row["assets_total"] <= 100000) { $at_1 = "X"; }
        elseif ($row["assets_total"] > 100000 && $row["assets_total"] <= 500000) { $at_2 = "X"; }
        elseif ($row["assets_total"] > 500000 && $row["assets_total"] <= 1000000) { $at_3 = "X"; }
        elseif ($row["assets_total"] > 1000000) { $at_4 = "X"; } 


$share_total = CommaFormatted(CurrencyFormatted($row["share_total"]));
$assets_total = CommaFormatted(CurrencyFormatted($row["assets_total"]));
$savings_total = CommaFormatted(CurrencyFormatted($row["savings_total"]));
$savings_male = CommaFormatted(CurrencyFormatted($row["savings_male"]));
$savings_female = CommaFormatted(CurrencyFormatted($row["savings_female"]));
$savings_youth = CommaFormatted(CurrencyFormatted($row["savings_youth"]));
$savings_nonmember = CommaFormatted(CurrencyFormatted($row["savings_nonmember"]));
$share_total = CommaFormatted(CurrencyFormatted($row["share_total"]));
$share_male = CommaFormatted(CurrencyFormatted($row["share_male"]));
$share_female = CommaFormatted(CurrencyFormatted($row["share_female"])); 
$share_youth = CommaFormatted(CurrencyFormatted($row["share_youth"]));
$loan_total = CommaFormatted(CurrencyFormatted($row["loan_total"]));
$loan_male = CommaFormatted(CurrencyFormatted($row["loan_male"]));
$loan_female = CommaFormatted(CurrencyFormatted($row["loan_female"]));
$loan_youth = CommaFormatted(CurrencyFormatted($row["loan_youth"]));
$reserve_total = CommaFormatted(CurrencyFormatted($row["reserve_total"])); 


?>

<table class=noclass style=\"background-color: white\" align=center> 
    <tr class=noclass style=\"background-color: white\" height=30> 
        <td class=noclass style=\"background-color: white\" >
            <li> 
                <font face=arial size=+1> Member Details </font> 
            </li>
        </td>
    </tr>
    <tr class=noclass style=\"background-color: blue\"> 
        <td class=noclass style=\"background-color: blue\">
            <table class=stripe width=750 align=center> 
                <tr>
                    <th colspan=2 class=heading> Member Profile : <?=$row["credit_union"]?></th> 
                </tr>
                <tr class=grayStripe>
                    <th class=heading align=left> Credit Union: </th> 
                    <td> <?=$row["credit_union"]?></td> 
                </tr>
                <tr class=whiteStripe>
                    <th class=heading align=left> Address: </th>
                    <td> <?=$row["address"]?> </td>
                </tr>
                <tr class=grayStripe>
                    <th class=heading align=left> Country: </th>
                    <td> <?=$row["country"]?> </td>
                </tr>
                <tr class=whiteStripe>
                    <th class=heading align=left> Telephone: </th> 
                    <td> <?=$row["telephone"]?> </td>
                </tr>
                <tr class=grayStripe>
                    <th class=heading align=left> Fax: </th> 
                    <td> <?=$row["fax"]?> </td> 
                </tr>
                <tr class=whiteStripe>
                    <th class=heading align=left> Email: </th> 
                    <td> <?=$row["email"]?> </td> 
                </tr>
                <tr class=grayStripe>
                    <th class=heading align=left> Homepage: </th> 
                    <td> <?=$row["home_page"]?> </td> 
                </tr>
                <tr class=whiteStripe>
                    <th class=heading align=left> Established: </th> 
                    <td> <?=$row["e_year"]?> </td>
                </tr>
                <tr class=grayStripe>
                    <th class=heading align=left> Vision: </th> 
                    <td> <?=$row["vision"]?> </td> 
                </tr>
                <tr class=whiteStripe>
                    <th class=heading align=left> Mission: </th> 
                    <td> <?=$row["mission"]?> </td> 
                </tr>
            </table> 
        </td> 
    </tr>
    <tr class=noclass style=\"background-color: white\"> 
        <td class=noclass style=\"background-color: white\">
            <hr align=center width=60%> 
        </td>
        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: white\">
                <li><font face=arial size=+1> Membership Profile </font> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: blue\">
                <table class=stripe align=center width=750> 
                    <tr>
                        <th rowspan=2 class=heading> Type of <br>Credit Union </th> 
                        <th rowspan=2 class=heading> Number of <br>members </th> 
                        <th colspan=5 class=heading> Individual Membership Profile </th>
                        <th rowspan=2 class=heading> Low income <br> Members </th> 
                    </tr>
                    <tr>
                        <th class=heading> <300 <br>Members </th> 
                        <th class=heading> 300>1000 <br>Members </th> 
                        <th class=heading> 1001<3000 <br>Members </th> 
                        <th class=heading> 3001<5000 <br>Members </th> 
                        <th class=heading> 5000 <br>Above Members </th> 
                    </tr>
                    <tr> 
                        <th class=heading> Urban </th> 
                        <td align=right> <?=$row["members_urban"]?></td> 
                        <td align=center> <?=$mu_1?></td> 
                        <td align=center> <?=$mu_2?></td> 
                        <td align=center> <?=$mu_3?></td> 
                        <td align=center> <?=$mu_4?></td> 
                        <td align=center> <?=$mu_5?></td> 
                        <td align=right> <?=$members_urban_low?></td> 
                    </tr>
                    <tr> 
                        <th class=heading> Rural </th> 
                        <td align=right> <?=$row["members_rural"]?></td> 
                        <td align=center> <?=$mr_1?></td> 
                        <td align=center> <?=$mr_2?></td> 
                        <td align=center> <?=$mr_3?></td> 
                        <td align=center> <?=$mr_4?></td> 
                        <td align=center> <?=$mr_5?></td> 
                        <td align=right> <?=$row["members_rural_low"]?></td> 
                    </tr>
                    <tr> 
                        <th class=heading> Total </th> 
                        <td align=right> <?=$members_total?></td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td align=right> <?=$members_total_low?></td> 
                    </tr>
                </table>
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=center width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li> <font face=arial size=+1> Market segmentation </font> 
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: blue\">
                <table class=stripe align=center width=750> 
                    <tr>
                        <th rowspan=2 class=heading> Type of Credit Union </th> 
                        <th rowspan=2 class=heading> Members </th> 
                        <th rowspan=2 class=heading> Male </th>
                        <th rowspan=2 class=heading> Female</th> 
                        <th colspan=4 class=heading> Age Segment of CU Membership</th> 
                    </tr>
                    <tr>
                        <th class=heading> <18-19 </th> 
                        <th class=heading> 30-45 </th> 
                        <th class=heading> 45-60 </th> 
                        <th class=heading> 60> </th> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Urban </th> 
                        <td align=right> <?=$row["members_urban"]?></td> 
                        <td align=right> <?=$row["members_urban_male"]?></td> 
                        <td align=right> <?=$row["members_urban_female"]?></td> 
                        <td align=right> <?=$row["members_urban_g1"]?></td> 
                        <td align=right> <?=$row["members_urban_g2"]?></td> 
                        <td align=right> <?=$row["members_urban_g3"]?></td> 
                        <td align=right> <?=$row["members_urban_g4"]?></td> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Rural </th> 
                        <td align=right> <?=$row["members_rural"]?></td> 
                        <td align=right> <?=$row["members_rural_male"]?></td> 
                        <td align=right> <?=$row["members_rural_female"]?></td> 
                        <td align=right> <?=$row["members_rural_g1"]?></td> 
                        <td align=right> <?=$row["members_rural_g2"]?></td> 
                        <td align=right> <?=$row["members_rural_g3"]?></td> 
                        <td align=right> <?=$row["members_rural_g4"]?></td> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Total </th> 
                        <td align=right> <?=$members_total?></td> 
                        <td align=right> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                    </tr>
                </table>
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=center width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li><font face=arial size=+1> Assets of the Movement </font>
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: blue\">
                <table class=stripe align=center width=750> 
                    <tr>
                        <th rowspan=2 class=heading> Type of Credit Union </th> 
                        <th rowspan=2 class=heading> Total Assets </th> 
                        <th colspan=4 class=heading> Assets Group US\$ </th> 
                    </tr>
                    <tr>
                        <th class=heading> <  100,000 </th> 
                        <th class=heading> 100,001-500,000</th> 
                        <th class=heading> 500,001-1,000,000</th> 
                        <th class=heading> 1,000,000 > </th> 
                    </tr>
                    <tr> 
                        <th class=heading> Total Number</th> 
                        <td align=right> <?=$row["assets_total"]?> </td> 
                        <td align=center> <?=$at_1?></td> 
                        <td align=center> <?=$at_2?></td> 
                        <td align=center> <?=$at_3?></td> 
                        <td align=center> <?=$at_4?></td> 
                    </tr>
                </table>
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=center width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li><font face=arial size=+1> Core Business </font> 
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: blue\">
                <table class=stripe align=center width=750> 
                    <tr>
                        <th rowspan=2 class=heading> Type of Credit Union </th> 
                        <th rowspan=2 class=heading> Amount in US\$ </th> 
                        <th colspan=4 class=heading> Usage of Service US\$ </th> 
                    </tr>
                    <tr>
                        <th class=heading> Male </th> 
                        <th class=heading> Female </th> 
                        <th class=heading> Youth </th> 
                        <th class=heading> Non-Members </th> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Savings</th> 
                        <td align=right> <?=$savings_total?></td> 
                        <td align=right> <?=$savings_male?></td> 
                        <td align=right> <?=$savings_female?></td> 
                        <td align=right> <?=$savings_youth?></td> 
                        <td align=right> <?=$savings_nonmember?></td> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Share</th> 
                        <td align=right> <?=$share_total?></td> 
                        <td align=right> <?=$share_male?></td> 
                        <td align=right> <?=$share_female?></td> 
                        <td align=right> <?=$share_youth?></td> 
                        <td> </td> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Loan Outstanding</th> 
                        <td align=right> <?=$loan_total?></td> 
                        <td align=right> <?=$loan_male?></td> 
                        <td align=right> <?=$loan_female?></td> 
                        <td align=right> <?=$loan_youth?></td> 
                        <td> </td> 
                    </tr>
                    <tr> 
                        <th class=heading align=left> Total Reserve</th> 
                        <td align=right> <?=$reserve_total?></td> 
                        <td align=right> </td> 
                        <td> </td> 
                        <td> </td> 
                        <td> </td> 
                    </tr>
                </table>
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=center width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li><font face=arial size=+1> Board Members and other committee  </font> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: blue;\">
                <table class=stripe align=left width=750> 
                    <tr>
                        <th rowspan=1 class=heading> Name </th> 
                        <th rowspan=1 class=heading> Position </th> 
                    </tr>
                    <!-- USE A LOOP ???? -->
                    <tr> 
                        <td> <?=$row["board_name_1"]?> </td> 
                        <td> <?=$row["board_pos_1"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_2"]?></td> 
                        <td> <?=$row["board_pos_2"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_3"]?></td> 
                        <td> <?=$row["board_pos_3"]?> </td>
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_4"]?></td> 
                        <td> <?=$row["board_pos_4"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_5"]?></td> 
                        <td> <?=$row["board_pos_5"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_6"]?></td> 
                        <td> <?=$row["board_pos_6"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_7"]?></td> 
                        <td> <?=$row["board_pos_7"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_8"]?></td> 
                        <td> <?=$row["board_pos_8"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_9"]?></td> 
                        <td> <?=$row["board_pos_9"]?> </td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["board_name_10"]?></td> 
                        <td> <?=$row["board_pos_10"]?> </td> 
                    </tr>
                </table>
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=left width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li> <font size=+1 face=arial> Senior Management  </font> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\" height=30> 
            <td class=noclass style=\"background-color: blue\">
                <table class=stripe align=left width=750> 
                    <tr>
                        <th rowspan=1 class=heading> Name </th> 
                        <th rowspan=1 class=heading> Position </th> 
                    </tr>
                    <tr> 
                        <td> <?=$row["manage_name_1"]?> </td> 
                        <td> <?=$row["manage_pos_1"]?></td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["manage_name_2"]?></td> 
                        <td> <?=$row["manage_pos_2"]?></td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["manage_name_3"]?></td> 
                        <td> <?=$row["manage_pos_3"]?></td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["manage_name_4"]?></td> 
                        <td> <?=$row["manage_pos_4"]?></td> 
                    </tr>
                    <tr> 
                        <td> <?=$row["manage_name_5"]?></td> 
                        <td> <?=$row["manage_pos_5"]?></td> 
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=left width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li> <font face=arial> General Documentation  </font> 
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <table class=stripe align=left> 
                    <tr>
                        <th rowspan=1 class=heading> Document Name </th> 
                        <th rowspan=1 class=heading> Description </th> 
                        <th class=heading> Date </th>
                    </tr>
                    <tr> 
                        <td> <?=$row["fgeneral"]?> </td> 
                        <td> <?=$row["cmtgeneral"]?> </td> 
                        <td> <?=$row["dtgeneral"]?> </td> 
                    </tr>
                </table>
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=left width=60%> 
            </td>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li> <font face=arial> Audited Financial Statments  </font> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <table class=stripe align=left> 
                    <tr>
                        <th rowspan=1 class=heading> Document Name </th> 
                        <th rowspan=1 class=heading> Description </th> 
                        <th rowspan=1 class=heading> Posted Date </th> 
                    </tr>
                    <tr> 
                        <td> $faudit </td> 
                        <td> $cmtaudit</td> 
                        <td> $dtaudit </td> 
                    </tr>
                </table>
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <hr align=left width=60%> 
            </td>
        </tr>
        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <li> <font face=arial> new polices adapted /Innovation </font> 
            </td>
        </tr>

        <tr class=noclass style=\"background-color: white\"> 
            <td class=noclass style=\"background-color: white\">
                <table class=stripe align=left> 
                    <tr>
                        <th rowspan=1 class=heading> Document Name </th> 
                        <th rowspan=1 class=heading> Description </th> 
                        <th rowspan=1 class=heading> Posted Date </th> 
                    </tr>
                    <tr> 
                        <td> $fpolicy </td> 
                        <td> $cmtpolicy</td> 
                        <td> $dtpolicy</td> 
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
<?php
    }

function CurrencyFormatted($n){
    $minus = $n < 0 ? '-' : '';
    $n = abs($n);
    //$n = int(($n + .005) * 100) / 100;
    if (!(ereg("\.", $n))) {
        $n .= ".00";
    }
    if (substr($n,(strlen($n) - 2),1) == ".") {
        $n .= "0";
    }
    if (ereg("\.\d\d0$", $n)) {
        rtrim ($n, "0");
    }
    return "$minus$n";
}


function CommaFormatted($iNumber){
    $delimiter = ','; # replace comma if desired
    $myArray = split("\.",$iNumber,2);
    $n = $myArray[0];
    $a = array();
    while(ereg("[0-9][0-9][0-9][0-9]",$n)) {
        
        preg_match("/([0-9][0-9][0-9])$/", $n, $matches);
        array_unshift ($a,$matches[0]);
        $n = preg_replace("/[0-9][0-9][0-9]$/", "",$n);
    }
    array_unshift($a,$n);
    $n = implode($delimiter,$a);
    if (ereg("[0-9]+", $myArray[1])) {
        $n = "$n.$myArray[1]";
    }
    return $n;
}

?>