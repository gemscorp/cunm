
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
      <form name="inputmember"  action="{ACTION}"  method=post onsubmit="return chkvalid()" >
<input type="hidden" name=m value="{M}" >
<input type="hidden" name=op value="{OP}" >
<input type="hidden" name=gr value="{GR}" >

      <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="38">
        <tr>
          <td width="498" colspan="2" align="center" height="18" bgcolor="#00C632">
          <b><font face="MS Sans Serif" size="2">&nbsp;</font></b></td>
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;title</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{TITLE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;firstname</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{FIRSTNAME}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;lastname</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LASTNAME}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;email</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{EMAIL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;email_confirmation</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{EMAIL_CONFIRMATION}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;organization</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{ORGANIZATION}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;addresstype</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{ADDRESSTYPE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;street</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{STREET}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;street2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{STREET2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;city</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{CITY}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;state</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{STATE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;zip</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{ZIP}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;country</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{COUNTRY}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;phone</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{PHONE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;fax</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{FAX}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;username</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{USERNAME}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;password1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{PASSWORD1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;password2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{PASSWORD2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;player</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{PLAYER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;player_other</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{PLAYER_OTHER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS3}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS4}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS5}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;interests_other</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{INTERESTS_OTHER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;newsletter</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{NEWSLETTER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;member_name</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBER_NAME}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_address</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_ADDRESS}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_country</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_COUNTRY}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_tel</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_TEL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_fax</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_FAX}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_email</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_EMAIL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_homepage</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_HOMEPAGE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_establish</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_ESTABLISH}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_vision</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_VISION}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_mission</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_MISSION}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;m_profile_as</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{M_PROFILE_AS}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban_low</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN_LOW}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural_low</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL_LOW}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;market_segmentation</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MARKET_SEGMENTATION}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;urban_male</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{URBAN_MALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;urban_female</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{URBAN_FEMALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban_18_19</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN_18_19}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban_30_45</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN_30_45}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban_45_60</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN_45_60}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_urban_60</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_URBAN_60}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;rural_male</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{RURAL_MALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;rural_female</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{RURAL_FEMALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural_18_19</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL_18_19}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural_30_45</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL_30_45}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural_45_60</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL_45_60}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;members_rural_60</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBERS_RURAL_60}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;assets_total</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{ASSETS_TOTAL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;Core_Business</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{CORE_BUSINESS}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;savings_amount</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SAVINGS_AMOUNT}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;savings_male</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SAVINGS_MALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;savings_female</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SAVINGS_FEMALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;savings_youth</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SAVINGS_YOUTH}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;savings_nonmember</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SAVINGS_NONMEMBER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;share_amount</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SHARE_AMOUNT}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;share_male</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SHARE_MALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;share_female</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SHARE_FEMALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;share_youth</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SHARE_YOUTH}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;share_nonmember</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{SHARE_NONMEMBER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;loan_total</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LOAN_TOTAL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;loan_male</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LOAN_MALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;loan_female</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LOAN_FEMALE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;loan_youth</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LOAN_YOUTH}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;loan_nonmember</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{LOAN_NONMEMBER}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;reserve_total</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{RESERVE_TOTAL}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_3}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_3}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_4}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_4}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_5}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_5}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_6}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_6</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_6}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_7</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_7}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_7</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_7}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_8</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_8}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_8</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_8}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_9</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_9}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_9</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_9}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_name_10</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_NAME_10}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;board_pos_10</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{BOARD_POS_10}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_name_1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_NAME_1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_pos_1</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_POS_1}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_name_2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_NAME_2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_pos_2</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_POS_2}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_name_3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_NAME_3}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_pos_3</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_POS_3}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_name_4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_NAME_4}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_pos_4</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_POS_4}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_name_5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_NAME_5}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;manage_pos_5</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MANAGE_POS_5}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;Iagree</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{IAGREE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;member_of</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{MEMBER_OF}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">
          <font face="MS Sans Serif" size="2">&nbsp;active</font></td>
          <td width="352" height="19" bgcolor="#CCFFCC">         
		  <font size="2" face="MS Sans Serif">{ACTIVE}</font></td> 
        </tr><tr>
          <td width="145" height="19" bgcolor="#CCFFCC">&nbsp;</td>
          <td width="352" height="19" bgcolor="#CCFFCC">
          <input type="reset" value="Reset" name="B1" ><span lang="en-us"> </span>
		  <input type="hidden" name="mem_id" value="{MEM_ID}" >

          <input type="submit" value="Save" name="B2"></td>
        </tr>
        </table>
		</form>
      </center>
    </div> <SCRIPT language="JavaScript"> 
<!--  
function chkvalid() {  
 
     if (document.inputmember.title.value ==0)
	{
alert("Please enter a valid title")
document.inputmember.title.focus();
return false;
  } 
    else if (document.inputmember.firstname.value ==0)
	{
alert("Please enter a valid firstname")
document.inputmember.firstname.focus();
return false;
  } 
    else if (document.inputmember.lastname.value ==0)
	{
alert("Please enter a valid lastname")
document.inputmember.lastname.focus();
return false;
  } 
    else if (document.inputmember.email.value ==0)
	{
alert("Please enter a valid email")
document.inputmember.email.focus();
return false;
  } 
    else if (document.inputmember.email_confirmation.value ==0)
	{
alert("Please enter a valid email_confirmation")
document.inputmember.email_confirmation.focus();
return false;
  } 
    else if (document.inputmember.organization.value ==0)
	{
alert("Please enter a valid organization")
document.inputmember.organization.focus();
return false;
  } 
    else if (document.inputmember.addresstype.value ==0)
	{
alert("Please enter a valid addresstype")
document.inputmember.addresstype.focus();
return false;
  } 
    else if (document.inputmember.street.value ==0)
	{
alert("Please enter a valid street")
document.inputmember.street.focus();
return false;
  } 
    else if (document.inputmember.street2.value ==0)
	{
alert("Please enter a valid street2")
document.inputmember.street2.focus();
return false;
  } 
    else if (document.inputmember.city.value ==0)
	{
alert("Please enter a valid city")
document.inputmember.city.focus();
return false;
  } 
    else if (document.inputmember.state.value ==0)
	{
alert("Please enter a valid state")
document.inputmember.state.focus();
return false;
  } 
    else if (document.inputmember.zip.value ==0)
	{
alert("Please enter a valid zip")
document.inputmember.zip.focus();
return false;
  } 
    else if (document.inputmember.country.value ==0)
	{
alert("Please enter a valid country")
document.inputmember.country.focus();
return false;
  } 
    else if (document.inputmember.phone.value ==0)
	{
alert("Please enter a valid phone")
document.inputmember.phone.focus();
return false;
  } 
    else if (document.inputmember.fax.value ==0)
	{
alert("Please enter a valid fax")
document.inputmember.fax.focus();
return false;
  } 
    else if (document.inputmember.username.value ==0)
	{
alert("Please enter a valid username")
document.inputmember.username.focus();
return false;
  } 
    else if (document.inputmember.password1.value ==0)
	{
alert("Please enter a valid password1")
document.inputmember.password1.focus();
return false;
  } 
    else if (document.inputmember.password2.value ==0)
	{
alert("Please enter a valid password2")
document.inputmember.password2.focus();
return false;
  } 
    else if (document.inputmember.player.value ==0)
	{
alert("Please enter a valid player")
document.inputmember.player.focus();
return false;
  } 
    else if (document.inputmember.player_other.value ==0)
	{
alert("Please enter a valid player_other")
document.inputmember.player_other.focus();
return false;
  } 
    else if (document.inputmember.interests1.value ==0)
	{
alert("Please enter a valid interests1")
document.inputmember.interests1.focus();
return false;
  } 
    else if (document.inputmember.interests2.value ==0)
	{
alert("Please enter a valid interests2")
document.inputmember.interests2.focus();
return false;
  } 
    else if (document.inputmember.interests3.value ==0)
	{
alert("Please enter a valid interests3")
document.inputmember.interests3.focus();
return false;
  } 
    else if (document.inputmember.interests4.value ==0)
	{
alert("Please enter a valid interests4")
document.inputmember.interests4.focus();
return false;
  } 
    else if (document.inputmember.interests5.value ==0)
	{
alert("Please enter a valid interests5")
document.inputmember.interests5.focus();
return false;
  } 
    else if (document.inputmember.interests_other.value ==0)
	{
alert("Please enter a valid interests_other")
document.inputmember.interests_other.focus();
return false;
  } 
    else if (document.inputmember.newsletter.value ==0)
	{
alert("Please enter a valid newsletter")
document.inputmember.newsletter.focus();
return false;
  } 
    else if (document.inputmember.member_name.value ==0)
	{
alert("Please enter a valid member_name")
document.inputmember.member_name.focus();
return false;
  } 
    else if (document.inputmember.m_address.value ==0)
	{
alert("Please enter a valid m_address")
document.inputmember.m_address.focus();
return false;
  } 
    else if (document.inputmember.m_country.value ==0)
	{
alert("Please enter a valid m_country")
document.inputmember.m_country.focus();
return false;
  } 
    else if (document.inputmember.m_tel.value ==0)
	{
alert("Please enter a valid m_tel")
document.inputmember.m_tel.focus();
return false;
  } 
    else if (document.inputmember.m_fax.value ==0)
	{
alert("Please enter a valid m_fax")
document.inputmember.m_fax.focus();
return false;
  } 
    else if (document.inputmember.m_email.value ==0)
	{
alert("Please enter a valid m_email")
document.inputmember.m_email.focus();
return false;
  } 
    else if (document.inputmember.m_homepage.value ==0)
	{
alert("Please enter a valid m_homepage")
document.inputmember.m_homepage.focus();
return false;
  } 
    else if (document.inputmember.m_establish.value ==0)
	{
alert("Please enter a valid m_establish")
document.inputmember.m_establish.focus();
return false;
  } 
    else if (document.inputmember.m_vision.value ==0)
	{
alert("Please enter a valid m_vision")
document.inputmember.m_vision.focus();
return false;
  } 
    else if (document.inputmember.m_mission.value ==0)
	{
alert("Please enter a valid m_mission")
document.inputmember.m_mission.focus();
return false;
  } 
    else if (document.inputmember.m_profile_as.value ==0)
	{
alert("Please enter a valid m_profile_as")
document.inputmember.m_profile_as.focus();
return false;
  } 
    else if (document.inputmember.members_urban.value ==0)
	{
alert("Please enter a valid members_urban")
document.inputmember.members_urban.focus();
return false;
  } 
    else if (document.inputmember.members_urban_low.value ==0)
	{
alert("Please enter a valid members_urban_low")
document.inputmember.members_urban_low.focus();
return false;
  } 
    else if (document.inputmember.members_rural.value ==0)
	{
alert("Please enter a valid members_rural")
document.inputmember.members_rural.focus();
return false;
  } 
    else if (document.inputmember.members_rural_low.value ==0)
	{
alert("Please enter a valid members_rural_low")
document.inputmember.members_rural_low.focus();
return false;
  } 
    else if (document.inputmember.market_segmentation.value ==0)
	{
alert("Please enter a valid market_segmentation")
document.inputmember.market_segmentation.focus();
return false;
  } 
    else if (document.inputmember.urban_male.value ==0)
	{
alert("Please enter a valid urban_male")
document.inputmember.urban_male.focus();
return false;
  } 
    else if (document.inputmember.urban_female.value ==0)
	{
alert("Please enter a valid urban_female")
document.inputmember.urban_female.focus();
return false;
  } 
    else if (document.inputmember.members_urban_18_19.value ==0)
	{
alert("Please enter a valid members_urban_18_19")
document.inputmember.members_urban_18_19.focus();
return false;
  } 
    else if (document.inputmember.members_urban_30_45.value ==0)
	{
alert("Please enter a valid members_urban_30_45")
document.inputmember.members_urban_30_45.focus();
return false;
  } 
    else if (document.inputmember.members_urban_45_60.value ==0)
	{
alert("Please enter a valid members_urban_45_60")
document.inputmember.members_urban_45_60.focus();
return false;
  } 
    else if (document.inputmember.members_urban_60.value ==0)
	{
alert("Please enter a valid members_urban_60")
document.inputmember.members_urban_60.focus();
return false;
  } 
    else if (document.inputmember.rural_male.value ==0)
	{
alert("Please enter a valid rural_male")
document.inputmember.rural_male.focus();
return false;
  } 
    else if (document.inputmember.rural_female.value ==0)
	{
alert("Please enter a valid rural_female")
document.inputmember.rural_female.focus();
return false;
  } 
    else if (document.inputmember.members_rural_18_19.value ==0)
	{
alert("Please enter a valid members_rural_18_19")
document.inputmember.members_rural_18_19.focus();
return false;
  } 
    else if (document.inputmember.members_rural_30_45.value ==0)
	{
alert("Please enter a valid members_rural_30_45")
document.inputmember.members_rural_30_45.focus();
return false;
  } 
    else if (document.inputmember.members_rural_45_60.value ==0)
	{
alert("Please enter a valid members_rural_45_60")
document.inputmember.members_rural_45_60.focus();
return false;
  } 
    else if (document.inputmember.members_rural_60.value ==0)
	{
alert("Please enter a valid members_rural_60")
document.inputmember.members_rural_60.focus();
return false;
  } 
    else if (document.inputmember.assets_total.value ==0)
	{
alert("Please enter a valid assets_total")
document.inputmember.assets_total.focus();
return false;
  } 
    else if (document.inputmember.Core_Business.value ==0)
	{
alert("Please enter a valid Core_Business")
document.inputmember.Core_Business.focus();
return false;
  } 
    else if (document.inputmember.savings_amount.value ==0)
	{
alert("Please enter a valid savings_amount")
document.inputmember.savings_amount.focus();
return false;
  } 
    else if (document.inputmember.savings_male.value ==0)
	{
alert("Please enter a valid savings_male")
document.inputmember.savings_male.focus();
return false;
  } 
    else if (document.inputmember.savings_female.value ==0)
	{
alert("Please enter a valid savings_female")
document.inputmember.savings_female.focus();
return false;
  } 
    else if (document.inputmember.savings_youth.value ==0)
	{
alert("Please enter a valid savings_youth")
document.inputmember.savings_youth.focus();
return false;
  } 
    else if (document.inputmember.savings_nonmember.value ==0)
	{
alert("Please enter a valid savings_nonmember")
document.inputmember.savings_nonmember.focus();
return false;
  } 
    else if (document.inputmember.share_amount.value ==0)
	{
alert("Please enter a valid share_amount")
document.inputmember.share_amount.focus();
return false;
  } 
    else if (document.inputmember.share_male.value ==0)
	{
alert("Please enter a valid share_male")
document.inputmember.share_male.focus();
return false;
  } 
    else if (document.inputmember.share_female.value ==0)
	{
alert("Please enter a valid share_female")
document.inputmember.share_female.focus();
return false;
  } 
    else if (document.inputmember.share_youth.value ==0)
	{
alert("Please enter a valid share_youth")
document.inputmember.share_youth.focus();
return false;
  } 
    else if (document.inputmember.share_nonmember.value ==0)
	{
alert("Please enter a valid share_nonmember")
document.inputmember.share_nonmember.focus();
return false;
  } 
    else if (document.inputmember.loan_total.value ==0)
	{
alert("Please enter a valid loan_total")
document.inputmember.loan_total.focus();
return false;
  } 
    else if (document.inputmember.loan_male.value ==0)
	{
alert("Please enter a valid loan_male")
document.inputmember.loan_male.focus();
return false;
  } 
    else if (document.inputmember.loan_female.value ==0)
	{
alert("Please enter a valid loan_female")
document.inputmember.loan_female.focus();
return false;
  } 
    else if (document.inputmember.loan_youth.value ==0)
	{
alert("Please enter a valid loan_youth")
document.inputmember.loan_youth.focus();
return false;
  } 
    else if (document.inputmember.loan_nonmember.value ==0)
	{
alert("Please enter a valid loan_nonmember")
document.inputmember.loan_nonmember.focus();
return false;
  } 
    else if (document.inputmember.reserve_total.value ==0)
	{
alert("Please enter a valid reserve_total")
document.inputmember.reserve_total.focus();
return false;
  } 
    else if (document.inputmember.board_name_1.value ==0)
	{
alert("Please enter a valid board_name_1")
document.inputmember.board_name_1.focus();
return false;
  } 
    else if (document.inputmember.board_pos_1.value ==0)
	{
alert("Please enter a valid board_pos_1")
document.inputmember.board_pos_1.focus();
return false;
  } 
    else if (document.inputmember.board_name_2.value ==0)
	{
alert("Please enter a valid board_name_2")
document.inputmember.board_name_2.focus();
return false;
  } 
    else if (document.inputmember.board_pos_2.value ==0)
	{
alert("Please enter a valid board_pos_2")
document.inputmember.board_pos_2.focus();
return false;
  } 
    else if (document.inputmember.board_name_3.value ==0)
	{
alert("Please enter a valid board_name_3")
document.inputmember.board_name_3.focus();
return false;
  } 
    else if (document.inputmember.board_pos_3.value ==0)
	{
alert("Please enter a valid board_pos_3")
document.inputmember.board_pos_3.focus();
return false;
  } 
    else if (document.inputmember.board_name_4.value ==0)
	{
alert("Please enter a valid board_name_4")
document.inputmember.board_name_4.focus();
return false;
  } 
    else if (document.inputmember.board_pos_4.value ==0)
	{
alert("Please enter a valid board_pos_4")
document.inputmember.board_pos_4.focus();
return false;
  } 
    else if (document.inputmember.board_name_5.value ==0)
	{
alert("Please enter a valid board_name_5")
document.inputmember.board_name_5.focus();
return false;
  } 
    else if (document.inputmember.board_pos_5.value ==0)
	{
alert("Please enter a valid board_pos_5")
document.inputmember.board_pos_5.focus();
return false;
  } 
    else if (document.inputmember.board_name_6.value ==0)
	{
alert("Please enter a valid board_name_6")
document.inputmember.board_name_6.focus();
return false;
  } 
    else if (document.inputmember.board_pos_6.value ==0)
	{
alert("Please enter a valid board_pos_6")
document.inputmember.board_pos_6.focus();
return false;
  } 
    else if (document.inputmember.board_name_7.value ==0)
	{
alert("Please enter a valid board_name_7")
document.inputmember.board_name_7.focus();
return false;
  } 
    else if (document.inputmember.board_pos_7.value ==0)
	{
alert("Please enter a valid board_pos_7")
document.inputmember.board_pos_7.focus();
return false;
  } 
    else if (document.inputmember.board_name_8.value ==0)
	{
alert("Please enter a valid board_name_8")
document.inputmember.board_name_8.focus();
return false;
  } 
    else if (document.inputmember.board_pos_8.value ==0)
	{
alert("Please enter a valid board_pos_8")
document.inputmember.board_pos_8.focus();
return false;
  } 
    else if (document.inputmember.board_name_9.value ==0)
	{
alert("Please enter a valid board_name_9")
document.inputmember.board_name_9.focus();
return false;
  } 
    else if (document.inputmember.board_pos_9.value ==0)
	{
alert("Please enter a valid board_pos_9")
document.inputmember.board_pos_9.focus();
return false;
  } 
    else if (document.inputmember.board_name_10.value ==0)
	{
alert("Please enter a valid board_name_10")
document.inputmember.board_name_10.focus();
return false;
  } 
    else if (document.inputmember.board_pos_10.value ==0)
	{
alert("Please enter a valid board_pos_10")
document.inputmember.board_pos_10.focus();
return false;
  } 
    else if (document.inputmember.manage_name_1.value ==0)
	{
alert("Please enter a valid manage_name_1")
document.inputmember.manage_name_1.focus();
return false;
  } 
    else if (document.inputmember.manage_pos_1.value ==0)
	{
alert("Please enter a valid manage_pos_1")
document.inputmember.manage_pos_1.focus();
return false;
  } 
    else if (document.inputmember.manage_name_2.value ==0)
	{
alert("Please enter a valid manage_name_2")
document.inputmember.manage_name_2.focus();
return false;
  } 
    else if (document.inputmember.manage_pos_2.value ==0)
	{
alert("Please enter a valid manage_pos_2")
document.inputmember.manage_pos_2.focus();
return false;
  } 
    else if (document.inputmember.manage_name_3.value ==0)
	{
alert("Please enter a valid manage_name_3")
document.inputmember.manage_name_3.focus();
return false;
  } 
    else if (document.inputmember.manage_pos_3.value ==0)
	{
alert("Please enter a valid manage_pos_3")
document.inputmember.manage_pos_3.focus();
return false;
  } 
    else if (document.inputmember.manage_name_4.value ==0)
	{
alert("Please enter a valid manage_name_4")
document.inputmember.manage_name_4.focus();
return false;
  } 
    else if (document.inputmember.manage_pos_4.value ==0)
	{
alert("Please enter a valid manage_pos_4")
document.inputmember.manage_pos_4.focus();
return false;
  } 
    else if (document.inputmember.manage_name_5.value ==0)
	{
alert("Please enter a valid manage_name_5")
document.inputmember.manage_name_5.focus();
return false;
  } 
    else if (document.inputmember.manage_pos_5.value ==0)
	{
alert("Please enter a valid manage_pos_5")
document.inputmember.manage_pos_5.focus();
return false;
  } 
    else if (document.inputmember.Iagree.value ==0)
	{
alert("Please enter a valid Iagree")
document.inputmember.Iagree.focus();
return false;
  } 
    else if (document.inputmember.member_of.value ==0)
	{
alert("Please enter a valid member_of")
document.inputmember.member_of.focus();
return false;
  } 
    else if (document.inputmember.active.value ==0)
	{
alert("Please enter a valid active")
document.inputmember.active.focus();
return false;
  }else{
 		 return true;
 		 }
		  } 
//--> 
</SCRIPT>