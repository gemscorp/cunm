<?php
//###############################################################
//### Gen Code  By phpform V 4.012  
//###  Module For db table  member
//###
//###  By Mr. Piya Pimchankam
//###  email : a_piya_p@hotmail.com
//###############################################################
				$MEMBER = $_GET['d'];
				$smem_id = $_GET['smem_id'];
				$mem_id = $_GET['mem_id'];
				//echo $MEMBER; //exit;
				
				//$cookie = cookieAdmindecode($ADMIN);
				$cookie = cookieMemberdecode($MEMBER);
				//$mem_id=$cookie[0];
				//$username=$cookie[1];
				//$password=$cookie[2];
				$member_ofck=$cookie[3];
				//$name=$cookie[4];
				//$brance_id=$cookie[5];

				if( $member_ofck!=ADMINISTRATOR )
				{
					//echo $index_file;
					Header("Refresh: 0;url=$index_file?m=member&op=login");
					exit();
				}
				
$m		=	isset( $_GET['m'])?$_GET['m']:$_POST['m'];
$op		=	isset( $_GET['op'])?$_GET['op']:$_POST['op'];
$url	=	isset( $_GET['url'])?$_GET['url']:$_POST['url'];


$inputmember	=	isset( $_POST['inputmember'])?$_POST['inputmember']:$_GET['inputmember'];
$title			=	isset( $_POST['title'])?$_POST['title']:$_GET['title'];
$firstname		=	isset( $_POST['firstname'])?$_POST['firstname']:$_GET['firstname'];
$lastname		=	isset( $_POST['lastname'])?$_POST['lastname']:$_GET['lastname'];
$email			=	isset( $_POST['email'])?$_POST['email']:$_GET['email'];
$email_confirmation	=	isset( $_POST['email_confirmation'])?$_POST['email_confirmation']:$_GET['email_confirmation'];
$organization	=	isset( $_POST['organization'])?$_POST['m']:$_GET['organization'];
$addresstype	=	isset( $_POST['addresstype'])?$_POST['addresstype']:$_GET['addresstype'];
$street			=	isset( $_POST['street'])?$_POST['street']:$_GET['street'];
$street2		=	isset( $_POST['street2'])?$_POST['street2']:$_GET['street2'];
$city			=	isset( $_POST['city'])?$_POST['city']:$_GET['city'];
$state			=	isset( $_POST['state'])?$_POST['state']:$_GET['state'];
$zip			=	isset( $_POST['zip'])?$_POST['zip']:$_GET['zip'];
$country		=	isset( $_POST['country'])?$_POST['country']:$_GET['country'];
$area_code		=	isset( $_POST['area_code'])?$_POST['area_code']:$_GET['area_code'];
$phone			=	isset( $_POST['phone'])?$_POST['phone']:$_GET['phone'];
$fax			=	isset( $_POST['fax'])?$_POST['fax']:$_GET['fax'];
$username		=	isset( $_POST['username'])?$_POST['username']:$_GET['username'];
$password1		=	isset( $_POST['password1'])?$_POST['password1']:$_GET['password1'];
$password2		=	isset( $_POST['password2'])?$_POST['password2']:$_GET['password2'];
$player			=	isset( $_POST['player'])?$_POST['player']:$_GET['player'];
$player_other	=	isset( $_POST['player_other'])?$_POST['player_other']:$_GET['player_other'];
$interests_other	=	isset( $_POST['interests_other'])?$_POST['interests_other']:$_GET['interests_other'];
$member_name	=	isset( $_POST['member_name'])?$_POST['member_name']:$_GET['member_name'];
$m_address		=	isset( $_POST['m_address'])?$_POST['m_address']:$_GET['m_address'];
$m_country		=	isset( $_POST['m_country'])?$_POST['m_country']:$_GET['m_country'];
$m_area			=	isset( $_POST['m_area'])?$_POST['m_area']:$_GET['m_area'];
$m_tel			=	isset( $_POST['m_tel'])?$_POST['m_tel']:$_GET['m_tel'];
$m_fax			=	isset( $_POST['m_fax'])?$_POST['m_fax']:$_GET['m_fax'];
$m_email		=	isset( $_POST['m_email'])?$_POST['m_email']:$_GET['m_email'];
$m_homepage		=	isset( $_POST['m_homepage'])?$_POST['m_homepage']:$_GET['m_homepage'];
$m_establish	=	isset( $_POST['m_establish'])?$_POST['m_establish']:$_GET['m_establish'];
$m_vision		=	isset( $_POST['m_vision'])?$_POST['m_vision']:$_GET['m_vision'];
$m_mission		=	isset( $_POST['m_mission'])?$_POST['m_mission']:$_GET['m_mission'];
$m_profile_as	=	isset( $_POST['m_profile_as'])?$_POST['m_profile_as']:$_GET['m_profile_as'];
$members_urban	=	isset( $_POST['members_urban'])?$_POST['members_urban']:$_GET['members_urban'];
$members_urban_low	=	isset( $_POST['members_urban_low'])?$_POST['members_urban_low']:$_GET['members_urban_low'];
$members_rural	=	isset( $_POST['members_rural'])?$_POST['members_rural']:$_GET['members_rural'];
$members_rural_low	=	isset( $_POST['members_rural_low'])?$_POST['members_rural_low']:$_GET['members_rural_low'];

$market_segmentation =	isset( $_POST['market_segmentation'])?$_POST['market_segmentation']:$_GET['market_segmentation'];
$urban_male		=	isset( $_POST['urban_male'])?$_POST['urban_male']:$_GET['urban_male'];
$urban_female	=	isset( $_POST['urban_female'])?$_POST['urban_female']:$_GET['urban_female'];
$members_urban_18_19 =	isset( $_POST['members_urban_18_19'])?$_POST['members_urban_18_19']:$_GET['members_urban_18_19'];
$members_urban_30_45 =	isset( $_POST['members_urban_30_45'])?$_POST['members_urban_30_45']:$_GET['members_urban_30_45'];
$members_urban_45_60 =	isset( $_POST['members_urban_45_60'])?$_POST['members_urban_45_60']:$_GET['members_urban_45_60'];
$members_urban_60  	 =	isset( $_POST['members_urban_60'])?$_POST['members_urban_60']:$_GET['members_urban_60'];
$rural_male			 =	isset( $_POST['rural_male'])?$_POST['rural_male']:$_GET['rural_male'];
$rural_female		 =	isset( $_POST['rural_female'])?$_POST['rural_female']:$_GET['rural_female'];
$members_rural_18_19 =	isset( $_POST['members_rural_18_19'])?$_POST['members_rural_18_19']:$_GET['members_rural_18_19'];
$members_rural_30_45 =	isset( $_POST['members_rural_30_45'])?$_POST['members_rural_30_45']:$_GET['members_rural_30_45'];
$members_rural_45_60 =	isset( $_POST['members_rural_45_60'])?$_POST['members_rural_45_60']:$_GET['members_rural_45_60'];
$members_rural_60 	 =	isset( $_POST['members_rural_60'])?$_POST['members_rural_60']:$_GET['members_rural_60'];
$assets_total  		 =	isset( $_POST['assets_total'])?$_POST['assets_total']:$_GET['assets_total'];
$Core_Business       =	isset( $_POST['Core_Business'])?$_POST['Core_Business']:$_GET['Core_Business'];
$savings_amount		 =	isset( $_POST['savings_amount'])?$_POST['savings_amount']:$_GET['savings_amount'];
$savings_male 		 =	isset( $_POST['savings_male'])?$_POST['savings_male']:$_GET['savings_male'];
$savings_female		 =	isset( $_POST['savings_female'])?$_POST['savings_female']:$_GET['savings_female'];
$savings_youth		 =	isset( $_POST['savings_youth'])?$_POST['savings_youth']:$_GET['savings_youth'];
$savings_nonmember	 =	isset( $_POST['savings_nonmember'])?$_POST['savings_nonmember']:$_GET['savings_nonmember'];
$share_amount		 =	isset( $_POST['share_amount'])?$_POST['share_amount']:$_GET['share_amount'];
$share_male			 =	isset( $_POST['share_male'])?$_POST['share_male']:$_GET['share_male'];
$share_female		 =	isset( $_POST['share_female'])?$_POST['share_female']:$_GET['share_female'];
$share_nonmember	 =	isset( $_POST['share_nonmember'])?$_POST['share_nonmember']:$_GET['share_nonmember'];
$loan_total			 =	isset( $_POST['loan_total'])?$_POST['loan_total']:$_GET['loan_total'];
$loan_male  		 =	isset( $_POST['loan_male'])?$_POST['loan_male']:$_GET['loan_male'];
$loan_female		 =	isset( $_POST['loan_female'])?$_POST['loan_female']:$_GET['loan_female'];
$loan_youth 		 =	isset( $_POST['loan_youth'])?$_POST['loan_youth']:$_GET['loan_youth'];
$loan_nonmember		 =	isset( $_POST['loan_nonmember'])?$_POST['loan_nonmember']:$_GET['loan_nonmember'];
$reserve_total		 =	isset( $_POST['reserve_total'])?$_POST['reserve_total']:$_GET['reserve_total'];
$board_name_1		 =	isset( $_POST['board_name_1'])?$_POST['board_name_1']:$_GET['board_name_1'];
$board_pos_1 		 =	isset( $_POST['board_pos_1'])?$_POST['board_pos_1']:$_GET['board_pos_1'];
$board_name_2		 =	isset( $_POST['board_name_2'])?$_POST['board_name_2']:$_GET['board_name_2'];
$board_pos_2	     =	isset( $_POST['board_pos_2'])?$_POST['board_pos_2']:$_GET['board_pos_2'];
$board_name_3 		 =	isset( $_POST['board_name_3'])?$_POST['board_name_3']:$_GET['board_name_3'];
$board_pos_3		 =	isset( $_POST['board_pos_3'])?$_POST['board_pos_3']:$_GET['board_pos_3'];
$board_name_4		 =	isset( $_POST['board_name_4'])?$_POST['board_name_4']:$_GET['board_name_4'];
$board_pos_4		 =	isset( $_POST['board_pos_4'])?$_POST['board_pos_4']:$_GET['board_pos_4'];
$board_name_5		 =	isset( $_POST['board_name_5'])?$_POST['board_name_5']:$_GET['board_name_5'];
$board_pos_5		 =	isset( $_POST['board_pos_5'])?$_POST['board_pos_5']:$_GET['board_pos_5'];
$board_name_6		 =	isset( $_POST['board_name_6'])?$_POST['board_name_6']:$_GET['board_name_6'];
$board_pos_6		 =	isset( $_POST['board_pos_6'])?$_POST['board_pos_6']:$_GET['board_pos_6'];
$board_name_7		 =	isset( $_POST['board_name_7'])?$_POST['board_name_7']:$_GET['board_name_7'];
$board_pos_7		 =	isset( $_POST['board_pos_7'])?$_POST['board_pos_7']:$_GET['board_pos_7'];
$board_name_8		 =	isset( $_POST['board_name_8'])?$_POST['board_name_8']:$_GET['board_name_8'];
$board_pos_8		 =	isset( $_POST['board_pos_8'])?$_POST['board_pos_8']:$_GET['board_pos_8'];
$board_name_9		 =	isset( $_POST['board_name_9'])?$_POST['board_name_9']:$_GET['board_name_9'];
$board_pos_9		 =	isset( $_POST['board_pos_9'])?$_POST['board_pos_9']:$_GET['board_pos_9'];
$board_name_10		 =	isset( $_POST['board_name_10'])?$_POST['board_name_10']:$_GET['board_name_10'];
$board_pos_10		 =	isset( $_POST['board_pos_10'])?$_POST['board_pos_10']:$_GET['board_pos_10'];
$manage_name_1		 =	isset( $_POST['manage_name_1'])?$_POST['manage_name_1']:$_GET['manage_name_1'];
$manage_pos_1		 =	isset( $_POST['manage_pos_1'])?$_POST['manage_pos_1']:$_GET['manage_pos_1'];
$manage_name_2		 =	isset( $_POST['manage_name_2'])?$_POST['manage_name_2']:$_GET['manage_name_2'];
$manage_pos_2		 =	isset( $_POST['manage_pos_2'])?$_POST['manage_pos_2']:$_GET['manage_pos_2'];
$manage_name_3		 =	isset( $_POST['manage_name_3'])?$_POST['manage_name_3']:$_GET['manage_name_3'];
$manage_pos_3		 =	isset( $_POST['manage_pos_3'])?$_POST['manage_pos_3']:$_GET['manage_pos_3'];
$manage_name_4		 =	isset( $_POST['manage_name_4'])?$_POST['manage_name_4']:$_GET['manage_name_4'];
$manage_pos_4		 =	isset( $_POST['manage_pos_4'])?$_POST['manage_pos_4']:$_GET['manage_pos_4'];
$manage_name_5		 =	isset( $_POST['manage_name_5'])?$_POST['manage_name_5']:$_GET['manage_name_5'];
$manage_pos_5		 =	isset( $_POST['manage_pos_5'])?$_POST['manage_pos_5']:$_GET['manage_pos_5'];
$Iagree				 =	isset( $_POST['Iagree'])?$_POST['Iagree']:$_GET['Iagree'];


$module_name = "member";
$gr = "admin";
$index_file = "admin.php";

$template->set_filenames(array(
		'body' => $mainframe[1])
	);
//######################

if(empty($op)){$op="";}

switch($op)
{
	    //#####   member #########
		case "savemember":
			Savemember($mem_id,$title,$firstname,$lastname,$email,$email_confirmation,$organization,$addresstype,$street,$street2,$city,$state,$zip,$country,$phone,$fax,$username,$password1,$password2,$player,$player_other,$interests1,$interests2,$interests3,$interests4,$interests5,$interests_other,$newsletter,$member_name,$m_address,$m_country,$m_tel,$m_fax,$m_email,$m_homepage,$m_establish,$m_vision,$m_mission,$m_profile_as,$members_urban,$members_urban_low,$members_rural,$members_rural_low,$market_segmentation,$urban_male,$urban_female,$members_urban_18_19,$members_urban_30_45,$members_urban_45_60,$members_urban_60,$rural_male,$rural_female,$members_rural_18_19,$members_rural_30_45,$members_rural_45_60,$members_rural_60,$assets_total,$Core_Business,$savings_amount,$savings_male,$savings_female,$savings_youth,$savings_nonmember,$share_amount,$share_male,$share_female,$share_youth,$share_nonmember,$loan_total,$loan_male,$loan_female,$loan_youth,$loan_nonmember,$reserve_total,$board_name_1,$board_pos_1,$board_name_2,$board_pos_2,$board_name_3,$board_pos_3,$board_name_4,$board_pos_4,$board_name_5,$board_pos_5,$board_name_6,$board_pos_6,$board_name_7,$board_pos_7,$board_name_8,$board_pos_8,$board_name_9,$board_pos_9,$board_name_10,$board_pos_10,$manage_name_1,$manage_pos_1,$manage_name_2,$manage_pos_2,$manage_name_3,$manage_pos_3,$manage_name_4,$manage_pos_4,$manage_name_5,$manage_pos_5,$Iagree,$member_of,$active,$area_code,$m_area);
			break;
		case "inputmember":
			Inputmember($mem_id);
			break;
		case "listmember":
			AListmember();
			break;
		case "detailmember":
			Detailmember($mem_id);
			break;
		//###########################
		case "del":
			Del($tb,$key,$id,$bk,$rt,$page);
			break;
	default :
AListmember();
		break;

}

function Del($tb,$key,$id,$bk,$rt,$page)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;


		unset($query);
		unset($result);

		$query="DELETE FROM $tb WHERE $key=$id ";
		$db->sql_query($query);
			if(!empty($rt))
			{
			$goto = "$index_file?m=$module_name&op=$rt&gr=$gr";
			}else{
			$goto="$index_file?m=$module_name&op=game&page=$page&gr=$gr#$bk";
			}
	Header("Refresh: 0;url=$goto");

	
}


function Savemember($mem_id,$title,$firstname,$lastname,$email,$email_confirmation,$organization,$addresstype,$street,$street2,$city,$state,$zip,$country,$phone,$fax,$username,$password1,$password2,$player,$player_other,$interests1,$interests2,$interests3,$interests4,$interests5,$interests_other,$newsletter,$member_name,$m_address,$m_country,$m_tel,$m_fax,$m_email,$m_homepage,$m_establish,$m_vision,$m_mission,$m_profile_as,$members_urban,$members_urban_low,$members_rural,$members_rural_low,$market_segmentation,$urban_male,$urban_female,$members_urban_18_19,$members_urban_30_45,$members_urban_45_60,$members_urban_60,$rural_male,$rural_female,$members_rural_18_19,$members_rural_30_45,$members_rural_45_60,$members_rural_60,$assets_total,$Core_Business,$savings_amount,$savings_male,$savings_female,$savings_youth,$savings_nonmember,$share_amount,$share_male,$share_female,$share_youth,$share_nonmember,$loan_total,$loan_male,$loan_female,$loan_youth,$loan_nonmember,$reserve_total,$board_name_1,$board_pos_1,$board_name_2,$board_pos_2,$board_name_3,$board_pos_3,$board_name_4,$board_pos_4,$board_name_5,$board_pos_5,$board_name_6,$board_pos_6,$board_name_7,$board_pos_7,$board_name_8,$board_pos_8,$board_name_9,$board_pos_9,$board_name_10,$board_pos_10,$manage_name_1,$manage_pos_1,$manage_name_2,$manage_pos_2,$manage_name_3,$manage_pos_3,$manage_name_4,$manage_pos_4,$manage_name_5,$manage_pos_5,$Iagree,$member_of,$active,$area_code,$m_area)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath,$gr;

		$table="member";
		if(empty($mem_id))
		{
		  $member_of = 10;
	  $active = 1;
	  $register_date = Date("Y-m-d");
	  $field="mem_id,title,firstname,lastname,email,email_confirmation,organization,addresstype,street,street2,city,state,zip,country,phone,fax,username,password1,password2,player,player_other,interests1,interests2,interests3,interests4,interests5,interests_other,newsletter,member_name,m_address,m_country,m_tel,m_fax,m_email,m_homepage,m_establish,m_vision,m_mission,m_profile_as,members_urban,members_urban_low,members_rural,members_rural_low,market_segmentation,urban_male,urban_female,members_urban_18_19,members_urban_30_45,members_urban_45_60,members_urban_60,rural_male,rural_female,members_rural_18_19,members_rural_30_45,members_rural_45_60,members_rural_60,assets_total,Core_Business,savings_amount,savings_male,savings_female,savings_youth,savings_nonmember,share_amount,share_male,share_female,share_youth,share_nonmember,loan_total,loan_male,loan_female,loan_youth,loan_nonmember,reserve_total,board_name_1,board_pos_1,board_name_2,board_pos_2,board_name_3,board_pos_3,board_name_4,board_pos_4,board_name_5,board_pos_5,board_name_6,board_pos_6,board_name_7,board_pos_7,board_name_8,board_pos_8,board_name_9,board_pos_9,board_name_10,board_pos_10,manage_name_1,manage_pos_1,manage_name_2,manage_pos_2,manage_name_3,manage_pos_3,manage_name_4,manage_pos_4,manage_name_5,manage_pos_5,Iagree,member_of,active, area_code , m_area , register_date";
		$data="NULL,'$title','$firstname','$lastname','$email','$email_confirmation','$organization','$addresstype','$street','$street2','$city','$state','$zip','$country','$phone','$fax','$username','$password1','$password2','$player','$player_other','$interests1','$interests2','$interests3','$interests4','$interests5','$interests_other','$newsletter','$member_name','$m_address','$m_country','$m_tel','$m_fax','$m_email','$m_homepage','$m_establish','$m_vision','$m_mission','$m_profile_as','$members_urban','$members_urban_low','$members_rural','$members_rural_low','$market_segmentation','$urban_male','$urban_female','$members_urban_18_19','$members_urban_30_45','$members_urban_45_60','$members_urban_60','$rural_male','$rural_female','$members_rural_18_19','$members_rural_30_45','$members_rural_45_60','$members_rural_60','$assets_total','$Core_Business','$savings_amount','$savings_male','$savings_female','$savings_youth','$savings_nonmember','$share_amount','$share_male','$share_female','$share_youth','$share_nonmember','$loan_total','$loan_male','$loan_female','$loan_youth','$loan_nonmember','$reserve_total','$board_name_1','$board_pos_1','$board_name_2','$board_pos_2','$board_name_3','$board_pos_3','$board_name_4','$board_pos_4','$board_name_5','$board_pos_5','$board_name_6','$board_pos_6','$board_name_7','$board_pos_7','$board_name_8','$board_pos_8','$board_name_9','$board_pos_9','$board_name_10','$board_pos_10','$manage_name_1','$manage_pos_1','$manage_name_2','$manage_pos_2','$manage_name_3','$manage_pos_3','$manage_name_4','$manage_pos_4','$manage_name_5','$manage_pos_5','$Iagree','$member_of','$active'   , '$area_code' , '$m_area' , '$register_date' ";
		SaveDB( $table,$field,$data);
		}else{
		$dataset="title='$title' ,firstname='$firstname' ,lastname='$lastname' ,email='$email' ,email_confirmation='$email_confirmation' ,organization='$organization' ,addresstype='$addresstype' ,street='$street' ,street2='$street2' ,city='$city' ,state='$state' ,zip='$zip' ,country='$country' ,phone='$phone' ,fax='$fax' ,username='$username' ,password1='$password1' ,password2='$password2' ,player='$player' ,player_other='$player_other' ,interests1='$interests1' ,interests2='$interests2' ,interests3='$interests3' ,interests4='$interests4' ,interests5='$interests5' ,interests_other='$interests_other' ,newsletter='$newsletter' ,member_name='$member_name' ,m_address='$m_address' ,m_country='$m_country' ,m_tel='$m_tel' ,m_fax='$m_fax' ,m_email='$m_email' ,m_homepage='$m_homepage' ,m_establish='$m_establish' ,m_vision='$m_vision' ,m_mission='$m_mission' ,m_profile_as='$m_profile_as' ,members_urban='$members_urban' ,members_urban_low='$members_urban_low' ,members_rural='$members_rural' ,members_rural_low='$members_rural_low' ,market_segmentation='$market_segmentation' ,urban_male='$urban_male' ,urban_female='$urban_female' ,members_urban_18_19='$members_urban_18_19' ,members_urban_30_45='$members_urban_30_45' ,members_urban_45_60='$members_urban_45_60' ,members_urban_60='$members_urban_60' ,rural_male='$rural_male' ,rural_female='$rural_female' ,members_rural_18_19='$members_rural_18_19' ,members_rural_30_45='$members_rural_30_45' ,members_rural_45_60='$members_rural_45_60' ,members_rural_60='$members_rural_60' ,assets_total='$assets_total' ,Core_Business='$Core_Business' ,savings_amount='$savings_amount' ,savings_male='$savings_male' ,savings_female='$savings_female' ,savings_youth='$savings_youth' ,savings_nonmember='$savings_nonmember' ,share_amount='$share_amount' ,share_male='$share_male' ,share_female='$share_female' ,share_youth='$share_youth' ,share_nonmember='$share_nonmember' ,loan_total='$loan_total' ,loan_male='$loan_male' ,loan_female='$loan_female' ,loan_youth='$loan_youth' ,loan_nonmember='$loan_nonmember' ,reserve_total='$reserve_total' ,board_name_1='$board_name_1' ,board_pos_1='$board_pos_1' ,board_name_2='$board_name_2' ,board_pos_2='$board_pos_2' ,board_name_3='$board_name_3' ,board_pos_3='$board_pos_3' ,board_name_4='$board_name_4' ,board_pos_4='$board_pos_4' ,board_name_5='$board_name_5' ,board_pos_5='$board_pos_5' ,board_name_6='$board_name_6' ,board_pos_6='$board_pos_6' ,board_name_7='$board_name_7' ,board_pos_7='$board_pos_7' ,board_name_8='$board_name_8' ,board_pos_8='$board_pos_8' ,board_name_9='$board_name_9' ,board_pos_9='$board_pos_9' ,board_name_10='$board_name_10' ,board_pos_10='$board_pos_10' ,manage_name_1='$manage_name_1' ,manage_pos_1='$manage_pos_1' ,manage_name_2='$manage_name_2' ,manage_pos_2='$manage_pos_2' ,manage_name_3='$manage_name_3' ,manage_pos_3='$manage_pos_3' ,manage_name_4='$manage_name_4' ,manage_pos_4='$manage_pos_4' ,manage_name_5='$manage_name_5' ,manage_pos_5='$manage_pos_5' ,Iagree='$Iagree'   , area_code='$area_code' , m_area='$m_area' ";
		$condition=" mem_id='$mem_id' ";
		SaveEditDB( $table,$dataset,$condition);
		}
		Header("Refresh: 0;url=$index_file?m=$module_name&op=listmember&gr=$gr");

}



function Inputmember($mem_id)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;
  global $TitleArr,$AddressTypeArr,$PlayerArr,$CountryArr ;

						$title="";
				$firstname="";
				$lastname="";
				$email="";
				$email_confirmation="";
				$organization="";
				$addresstype="";
				$street="";
				$street2="";
				$city="";
				$state="";
				$zip="";
				$country="";
				$phone="";
				$fax="";
				$username="";
				$password1="";
				$password2="";
				$player="";
				$player_other="";
				$interests1="";
				$interests2="";
				$interests3="";
				$interests4="";
				$interests5="";
				$interests_other="";
				$newsletter="";
				$member_name="";
				$m_address="";
				$m_country="";
				$m_tel="";
				$m_fax="";
				$m_email="";
				$m_homepage="";
				$m_establish="";
				$m_vision="";
				$m_mission="";
				$m_profile_as="";
				$members_urban="";
				$members_urban_low="";
				$members_rural="";
				$members_rural_low="";
				$market_segmentation="";
				$urban_male="";
				$urban_female="";
				$members_urban_18_19="";
				$members_urban_30_45="";
				$members_urban_45_60="";
				$members_urban_60="";
				$rural_male="";
				$rural_female="";
				$members_rural_18_19="";
				$members_rural_30_45="";
				$members_rural_45_60="";
				$members_rural_60="";
				$assets_total="";
				$Core_Business="";
				$savings_amount="";
				$savings_male="";
				$savings_female="";
				$savings_youth="";
				$savings_nonmember="";
				$share_amount="";
				$share_male="";
				$share_female="";
				$share_youth="";
				$share_nonmember="";
				$loan_total="";
				$loan_male="";
				$loan_female="";
				$loan_youth="";
				$loan_nonmember="";
				$reserve_total="";
				$board_name_1="";
				$board_pos_1="";
				$board_name_2="";
				$board_pos_2="";
				$board_name_3="";
				$board_pos_3="";
				$board_name_4="";
				$board_pos_4="";
				$board_name_5="";
				$board_pos_5="";
				$board_name_6="";
				$board_pos_6="";
				$board_name_7="";
				$board_pos_7="";
				$board_name_8="";
				$board_pos_8="";
				$board_name_9="";
				$board_pos_9="";
				$board_name_10="";
				$board_pos_10="";
				$manage_name_1="";
				$manage_pos_1="";
				$manage_name_2="";
				$manage_pos_2="";
				$manage_name_3="";
				$manage_pos_3="";
				$manage_name_4="";
				$manage_pos_4="";
				$manage_name_5="";
				$manage_pos_5="";
				$Iagree="";
				$member_of="";
				$active="";
				
		if( 1 and  !empty($mem_id))
		{
			$table="member";
			$fieldArr ="mem_id,title,firstname,lastname,email,email_confirmation,organization,addresstype,street,street2,city,state,zip,country,phone,fax,username,password1,password2,player,player_other,interests1,interests2,interests3,interests4,interests5,interests_other,newsletter,member_name,m_address,m_country,m_tel,m_fax,m_email,m_homepage,m_establish,m_vision,m_mission,m_profile_as,members_urban,members_urban_low,members_rural,members_rural_low,market_segmentation,urban_male,urban_female,members_urban_18_19,members_urban_30_45,members_urban_45_60,members_urban_60,rural_male,rural_female,members_rural_18_19,members_rural_30_45,members_rural_45_60,members_rural_60,assets_total,Core_Business,savings_amount,savings_male,savings_female,savings_youth,savings_nonmember,share_amount,share_male,share_female,share_youth,share_nonmember,loan_total,loan_male,loan_female,loan_youth,loan_nonmember,reserve_total,board_name_1,board_pos_1,board_name_2,board_pos_2,board_name_3,board_pos_3,board_name_4,board_pos_4,board_name_5,board_pos_5,board_name_6,board_pos_6,board_name_7,board_pos_7,board_name_8,board_pos_8,board_name_9,board_pos_9,board_name_10,board_pos_10,manage_name_1,manage_pos_1,manage_name_2,manage_pos_2,manage_name_3,manage_pos_3,manage_name_4,manage_pos_4,manage_name_5,manage_pos_5,Iagree,member_of,active , area_code , m_area , register_date";
			$searchkey=" and mem_id='$mem_id' ";
			$result=SearchDB( $searchkey,$table,$fieldArr);
			if($db->sql_numrows())
			{
				$row = $db->sql_fetchrow($result);
								$mem_id=$row["mem_id"];
				$title=$row["title"];
				$firstname=$row["firstname"];
				$lastname=$row["lastname"];
				$email=$row["email"];
				$email_confirmation=$row["email_confirmation"];
				$organization=$row["organization"];
				$addresstype=$row["addresstype"];
				$street=$row["street"];
				$street2=$row["street2"];
				$city=$row["city"];
				$state=$row["state"];
				$zip=$row["zip"];
				$country=$row["country"];
				$phone=$row["phone"];
				$fax=$row["fax"];
				$username=$row["username"];
				$password1=$row["password1"];
				$password2=$row["password2"];
				$player=$row["player"];
				$player_other=$row["player_other"];
				$interests1=$row["interests1"];
				$interests2=$row["interests2"];
				$interests3=$row["interests3"];
				$interests4=$row["interests4"];
				$interests5=$row["interests5"];
				$interests_other=$row["interests_other"];
				$newsletter=$row["newsletter"];
				$member_name=$row["member_name"];
				$m_address=$row["m_address"];
				$m_country=$row["m_country"];
				$m_tel=$row["m_tel"];
				$m_fax=$row["m_fax"];
				$m_email=$row["m_email"];
				$m_homepage=$row["m_homepage"];
				$m_establish=$row["m_establish"];
				$m_vision=$row["m_vision"];
				$m_mission=$row["m_mission"];
				$m_profile_as=$row["m_profile_as"];
				$members_urban=$row["members_urban"];
				$members_urban_low=$row["members_urban_low"];
				$members_rural=$row["members_rural"];
				$members_rural_low=$row["members_rural_low"];
				$market_segmentation=$row["market_segmentation"];
				$urban_male=$row["urban_male"];
				$urban_female=$row["urban_female"];
				$members_urban_18_19=$row["members_urban_18_19"];
				$members_urban_30_45=$row["members_urban_30_45"];
				$members_urban_45_60=$row["members_urban_45_60"];
				$members_urban_60=$row["members_urban_60"];
				$rural_male=$row["rural_male"];
				$rural_female=$row["rural_female"];
				$members_rural_18_19=$row["members_rural_18_19"];
				$members_rural_30_45=$row["members_rural_30_45"];
				$members_rural_45_60=$row["members_rural_45_60"];
				$members_rural_60=$row["members_rural_60"];
				$assets_total=$row["assets_total"];
				$Core_Business=$row["Core_Business"];
				$savings_amount=$row["savings_amount"];
				$savings_male=$row["savings_male"];
				$savings_female=$row["savings_female"];
				$savings_youth=$row["savings_youth"];
				$savings_nonmember=$row["savings_nonmember"];
				$share_amount=$row["share_amount"];
				$share_male=$row["share_male"];
				$share_female=$row["share_female"];
				$share_youth=$row["share_youth"];
				$share_nonmember=$row["share_nonmember"];
				$loan_total=$row["loan_total"];
				$loan_male=$row["loan_male"];
				$loan_female=$row["loan_female"];
				$loan_youth=$row["loan_youth"];
				$loan_nonmember=$row["loan_nonmember"];
				$reserve_total=$row["reserve_total"];
				$board_name_1=$row["board_name_1"];
				$board_pos_1=$row["board_pos_1"];
				$board_name_2=$row["board_name_2"];
				$board_pos_2=$row["board_pos_2"];
				$board_name_3=$row["board_name_3"];
				$board_pos_3=$row["board_pos_3"];
				$board_name_4=$row["board_name_4"];
				$board_pos_4=$row["board_pos_4"];
				$board_name_5=$row["board_name_5"];
				$board_pos_5=$row["board_pos_5"];
				$board_name_6=$row["board_name_6"];
				$board_pos_6=$row["board_pos_6"];
				$board_name_7=$row["board_name_7"];
				$board_pos_7=$row["board_pos_7"];
				$board_name_8=$row["board_name_8"];
				$board_pos_8=$row["board_pos_8"];
				$board_name_9=$row["board_name_9"];
				$board_pos_9=$row["board_pos_9"];
				$board_name_10=$row["board_name_10"];
				$board_pos_10=$row["board_pos_10"];
				$manage_name_1=$row["manage_name_1"];
				$manage_pos_1=$row["manage_pos_1"];
				$manage_name_2=$row["manage_name_2"];
				$manage_pos_2=$row["manage_pos_2"];
				$manage_name_3=$row["manage_name_3"];
				$manage_pos_3=$row["manage_pos_3"];
				$manage_name_4=$row["manage_name_4"];
				$manage_pos_4=$row["manage_pos_4"];
				$manage_name_5=$row["manage_name_5"];
				$manage_pos_5=$row["manage_pos_5"];
				$Iagree=$row["Iagree"];
				$member_of=$row["member_of"];
				$active=$row["active"];
								$area_code=$row["area_code"];
				$m_area=$row["m_area"];
				$register_date=$row["register_date"];
			}

		}else{
		     $mem_id="";
	
	
		}//end if

	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/register.htm";
	 $template->SetImagePath("modules/$module_name/$gr/");
		}else{
	 $module_file = "modules/$module_name/register.htm";
	 $template->SetImagePath("modules/$module_name/");
		}

	 $template->set_filenames(array(
		'inputform' => $module_file)
		);

	$template->assign_vars(array(
				'AREA_CODE'=>$area_code,
		'M_AREA'=>$m_area,
		'REGISTER_DATE'=>$register_date,
       'MEM_ID'=>$mem_id,
			    'TITLE'=>OptionV(0,count($TitleArr)-1,$title,$TitleArr,"-- Select --"),
			    'FIRSTNAME'=>$firstname,
			    'LASTNAME'=>$lastname,
			    'EMAIL'=>$email,
			    'EMAIL_CONFIRMATION'=>$email_confirmation,
			    'ORGANIZATION'=>$organization,
			    'ADDRESSTYPE'=>OptionV(0,count($AddressTypeArr)-1,$addresstype,$AddressTypeArr,"-- Select --"),
			    'STREET'=>$street,
			    'STREET2'=>$street2,
			    'CITY'=>$city,
			    'STATE'=>$state,
			    'ZIP'=>$zip,
			    'COUNTRY'=>OptionV(0,count($CountryArr)-1,$country,$CountryArr,"-- Select --"),
			    'PHONE'=>$phone,
			    'FAX'=>$fax,
			    'USERNAME'=>$username,
			    'PASSWORD1'=>$password1,
			    'PASSWORD2'=>$password2,
			    'PLAYER'=>OptionV(0,count($PlayerArr)-1,$player,$PlayerArr,"-- Select --"),
			    'PLAYER_OTHER'=>$player_other,
			  	'INTERESTS1'=>CheckBox("interests1",$interests1),
			    'INTERESTS2'=>CheckBox("interests2",$interests2),
			    'INTERESTS3'=>CheckBox("interests3",$interests3),
			    'INTERESTS4'=>CheckBox("interests4",$interests4),
			    'INTERESTS5'=>CheckBox("interests5",$interests5),
			    'INTERESTS_OTHER'=>$interests_other,
			    'NEWSLETTER'=>CheckBox("newsletter",$newsletter),
			    'MEMBER_NAME'=>$member_name,
			    'M_ADDRESS'=>$m_address,
			    'M_COUNTRY'=>OptionV(0,count($CountryArr)-1,$m_country,$CountryArr,"-- Select --"),
			    'M_TEL'=>$m_tel,
			    'M_FAX'=>$m_fax,
			    'M_EMAIL'=>$m_email,
			    'M_HOMEPAGE'=>$m_homepage,
			    'M_ESTABLISH'=>$m_establish,
			    'M_VISION'=>$m_vision,
			    'M_MISSION'=>$m_mission,
			    'M_PROFILE_AS'=>$m_profile_as,
			    'MEMBERS_URBAN'=>$members_urban,
			    'MEMBERS_URBAN_LOW'=>$members_urban_low,
			    'MEMBERS_RURAL'=>$members_rural,
			    'MEMBERS_RURAL_LOW'=>$members_rural_low,
			    'MARKET_SEGMENTATION'=>$market_segmentation,
			    'URBAN_MALE'=>$urban_male,
			    'URBAN_FEMALE'=>$urban_female,
			    'MEMBERS_URBAN_18_19'=>$members_urban_18_19,
			    'MEMBERS_URBAN_30_45'=>$members_urban_30_45,
			    'MEMBERS_URBAN_45_60'=>$members_urban_45_60,
			    'MEMBERS_URBAN_60'=>$members_urban_60,
			    'RURAL_MALE'=>$rural_male,
			    'RURAL_FEMALE'=>$rural_female,
			    'MEMBERS_RURAL_18_19'=>$members_rural_18_19,
			    'MEMBERS_RURAL_30_45'=>$members_rural_30_45,
			    'MEMBERS_RURAL_45_60'=>$members_rural_45_60,
			    'MEMBERS_RURAL_60'=>$members_rural_60,
			    'ASSETS_TOTAL'=>$assets_total,
			    'CORE_BUSINESS'=>$Core_Business,
			    'SAVINGS_AMOUNT'=>$savings_amount,
			    'SAVINGS_MALE'=>$savings_male,
			    'SAVINGS_FEMALE'=>$savings_female,
			    'SAVINGS_YOUTH'=>$savings_youth,
			    'SAVINGS_NONMEMBER'=>$savings_nonmember,
			    'SHARE_AMOUNT'=>$share_amount,
			    'SHARE_MALE'=>$share_male,
			    'SHARE_FEMALE'=>$share_female,
			    'SHARE_YOUTH'=>$share_youth,
			    'SHARE_NONMEMBER'=>$share_nonmember,
			    'LOAN_TOTAL'=>$loan_total,
			    'LOAN_MALE'=>$loan_male,
			    'LOAN_FEMALE'=>$loan_female,
			    'LOAN_YOUTH'=>$loan_youth,
			    'LOAN_NONMEMBER'=>$loan_nonmember,
			    'RESERVE_TOTAL'=>$reserve_total,
			    'BOARD_NAME_1'=>$board_name_1,
			    'BOARD_POS_1'=>$board_pos_1,
			    'BOARD_NAME_2'=>$board_name_2,
			    'BOARD_POS_2'=>$board_pos_2,
			    'BOARD_NAME_3'=>$board_name_3,
			    'BOARD_POS_3'=>$board_pos_3,
			    'BOARD_NAME_4'=>$board_name_4,
			    'BOARD_POS_4'=>$board_pos_4,
			    'BOARD_NAME_5'=>$board_name_5,
			    'BOARD_POS_5'=>$board_pos_5,
			    'BOARD_NAME_6'=>$board_name_6,
			    'BOARD_POS_6'=>$board_pos_6,
			    'BOARD_NAME_7'=>$board_name_7,
			    'BOARD_POS_7'=>$board_pos_7,
			    'BOARD_NAME_8'=>$board_name_8,
			    'BOARD_POS_8'=>$board_pos_8,
			    'BOARD_NAME_9'=>$board_name_9,
			    'BOARD_POS_9'=>$board_pos_9,
			    'BOARD_NAME_10'=>$board_name_10,
			    'BOARD_POS_10'=>$board_pos_10,
			    'MANAGE_NAME_1'=>$manage_name_1,
			    'MANAGE_POS_1'=>$manage_pos_1,
			    'MANAGE_NAME_2'=>$manage_name_2,
			    'MANAGE_POS_2'=>$manage_pos_2,
			    'MANAGE_NAME_3'=>$manage_name_3,
			    'MANAGE_POS_3'=>$manage_pos_3,
			    'MANAGE_NAME_4'=>$manage_name_4,
			    'MANAGE_POS_4'=>$manage_pos_4,
			    'MANAGE_NAME_5'=>$manage_name_5,
			    'MANAGE_POS_5'=>$manage_pos_5,
			    'IAGREE'=>$Iagree,
			    'MEMBER_OF'=>$member_of,
			    'ACTIVE'=>$active,
			    
	 'M'=>$module_name,
	'OP'=>"savemember",
	'GR'=>$gr
	)	);

	   $menu=GetMenu();

	$html_code =  $template->pparse_str('inputform');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code,
		'MENU'=>$menu,
		'COUNT'=>Counter()
		)	);
	 $template->SetImagePath("");
   $template->pparse('body');
	
}

function AListmember()
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$page,$gr;

	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/listmember.php";
	 $template->SetImagePath("modules/$module_name/$gr/");
		}else{
	 $module_file = "modules/$module_name/listmember.php";
	 $template->SetImagePath("modules/$module_name/");
		}

	 $template->set_filenames(array(
		'listform' => $module_file)
		);

		if(empty($page))
		{
		$page=1;
		}
		$page_list=50;
		$table="member";
		//$fieldArr ="mem_id,title,firstname,lastname,email,email_confirmation,organization,addresstype,street,street2,city,state,zip,country,phone,fax,username,password1,password2,player,player_other,interests1,interests2,interests3,interests4,interests5,interests_other,newsletter,member_name,m_address,m_country,m_tel,m_fax,m_email,m_homepage,m_establish,m_vision,m_mission,m_profile_as,members_urban,members_urban_low,members_rural,members_rural_low,market_segmentation,urban_male,urban_female,members_urban_18_19,members_urban_30_45,members_urban_45_60,members_urban_60,rural_male,rural_female,members_rural_18_19,members_rural_30_45,members_rural_45_60,members_rural_60,assets_total,Core_Business,savings_amount,savings_male,savings_female,savings_youth,savings_nonmember,share_amount,share_male,share_female,share_youth,share_nonmember,loan_total,loan_male,loan_female,loan_youth,loan_nonmember,reserve_total,board_name_1,board_pos_1,board_name_2,board_pos_2,board_name_3,board_pos_3,board_name_4,board_pos_4,board_name_5,board_pos_5,board_name_6,board_pos_6,board_name_7,board_pos_7,board_name_8,board_pos_8,board_name_9,board_pos_9,board_name_10,board_pos_10,manage_name_1,manage_pos_1,manage_name_2,manage_pos_2,manage_name_3,manage_pos_3,manage_name_4,manage_pos_4,manage_name_5,manage_pos_5,Iagree,member_of,active, area_code , m_area , register_date";
		$fieldArr=" * ";
		$searchkey="  and  member_of !=".ADMINISTRATOR;
		
		$searchkey.=" order by mem_id desc";

		list($totalpage,$result)=SearchDBListPage( $searchkey,$table,$fieldArr,$page,$page_list);
		 if($db->sql_numrows())
		{
		while($v= $db->sql_fetchrow($result) )
		{

						$mem_id=$v["mem_id"];
				$title=$v["title"];
				$firstname=$v["firstname"];
				$lastname=$v["lastname"];
				$email=$v["email"];
				$email_confirmation=$v["email_confirmation"];
				$organization=$v["organization"];
				$addresstype=$v["addresstype"];
				$street=$v["street"];
				$street2=$v["street2"];
				$city=$v["city"];
				$state=$v["state"];
				$zip=$v["zip"];
				$country=$v["country"];
				$phone=$v["phone"];
				$fax=$v["fax"];
				$username=$v["username"];
				$password1=$v["password1"];
				$password2=$v["password2"];
				$player=$v["player"];
				$player_other=$v["player_other"];
				$interests1=$v["interests1"];
				$interests2=$v["interests2"];
				$interests3=$v["interests3"];
				$interests4=$v["interests4"];
				$interests5=$v["interests5"];
				$interests_other=$v["interests_other"];
				$newsletter=$v["newsletter"];
				$member_name=$v["member_name"];
				$m_address=$v["m_address"];
				$m_country=$v["m_country"];
				$m_tel=$v["m_tel"];
				$m_fax=$v["m_fax"];
				$m_email=$v["m_email"];
				$m_homepage=$v["m_homepage"];
				$m_establish=$v["m_establish"];
				$m_vision=$v["m_vision"];
				$m_mission=$v["m_mission"];
				$m_profile_as=$v["m_profile_as"];
				$members_urban=$v["members_urban"];
				$members_urban_low=$v["members_urban_low"];
				$members_rural=$v["members_rural"];
				$members_rural_low=$v["members_rural_low"];
				$market_segmentation=$v["market_segmentation"];
				$urban_male=$v["urban_male"];
				$urban_female=$v["urban_female"];
				$members_urban_18_19=$v["members_urban_18_19"];
				$members_urban_30_45=$v["members_urban_30_45"];
				$members_urban_45_60=$v["members_urban_45_60"];
				$members_urban_60=$v["members_urban_60"];
				$rural_male=$v["rural_male"];
				$rural_female=$v["rural_female"];
				$members_rural_18_19=$v["members_rural_18_19"];
				$members_rural_30_45=$v["members_rural_30_45"];
				$members_rural_45_60=$v["members_rural_45_60"];
				$members_rural_60=$v["members_rural_60"];
				$assets_total=$v["assets_total"];
				$Core_Business=$v["Core_Business"];
				$savings_amount=$v["savings_amount"];
				$savings_male=$v["savings_male"];
				$savings_female=$v["savings_female"];
				$savings_youth=$v["savings_youth"];
				$savings_nonmember=$v["savings_nonmember"];
				$share_amount=$v["share_amount"];
				$share_male=$v["share_male"];
				$share_female=$v["share_female"];
				$share_youth=$v["share_youth"];
				$share_nonmember=$v["share_nonmember"];
				$loan_total=$v["loan_total"];
				$loan_male=$v["loan_male"];
				$loan_female=$v["loan_female"];
				$loan_youth=$v["loan_youth"];
				$loan_nonmember=$v["loan_nonmember"];
				$reserve_total=$v["reserve_total"];
				$board_name_1=$v["board_name_1"];
				$board_pos_1=$v["board_pos_1"];
				$board_name_2=$v["board_name_2"];
				$board_pos_2=$v["board_pos_2"];
				$board_name_3=$v["board_name_3"];
				$board_pos_3=$v["board_pos_3"];
				$board_name_4=$v["board_name_4"];
				$board_pos_4=$v["board_pos_4"];
				$board_name_5=$v["board_name_5"];
				$board_pos_5=$v["board_pos_5"];
				$board_name_6=$v["board_name_6"];
				$board_pos_6=$v["board_pos_6"];
				$board_name_7=$v["board_name_7"];
				$board_pos_7=$v["board_pos_7"];
				$board_name_8=$v["board_name_8"];
				$board_pos_8=$v["board_pos_8"];
				$board_name_9=$v["board_name_9"];
				$board_pos_9=$v["board_pos_9"];
				$board_name_10=$v["board_name_10"];
				$board_pos_10=$v["board_pos_10"];
				$manage_name_1=$v["manage_name_1"];
				$manage_pos_1=$v["manage_pos_1"];
				$manage_name_2=$v["manage_name_2"];
				$manage_pos_2=$v["manage_pos_2"];
				$manage_name_3=$v["manage_name_3"];
				$manage_pos_3=$v["manage_pos_3"];
				$manage_name_4=$v["manage_name_4"];
				$manage_pos_4=$v["manage_pos_4"];
				$manage_name_5=$v["manage_name_5"];
				$manage_pos_5=$v["manage_pos_5"];
				$Iagree=$v["Iagree"];
				$member_of=$v["member_of"];
				$active=$v["active"];

				$area_code =$v["area_code"];
				$m_area = $v["m_area"];
				$register_date = $v["register_date"];
				

		$edit="$index_file?m=$module_name&op=inputmember&mem_id=$mem_id&gr=$gr&d=".$_GET['d'];
		$detail="$index_file?m=$module_name&op=detailmember&mem_id=$mem_id&gr=$gr&d=".$_GET['d'];

		$cap=str_replace("","",$cap);
		 $del="javascript:Del('tb=member&key=mem_id&id=$mem_id&op=del&rt=listmember&gr=$gr&d=".$_GET['d']."','$cap')";

		$view ="$index_file?m=bench&op=listbench&mem_id=$mem_id&d=".$_GET['d'];
		$template->assign_block_vars('listrow', array(
					'AREA_CODE'=>$area_code,
		'M_AREA'=>$m_area,
		'REGISTER_DATE'=>$register_date,
			'U_VIEW'=>$view,
		 'MEM_ID'=>$mem_id,
			    'TITLE'=>$title,
			    'FIRSTNAME'=>$firstname,
			    'LASTNAME'=>$lastname,
			    'EMAIL'=>$email,
			    'EMAIL_CONFIRMATION'=>$email_confirmation,
			    'ORGANIZATION'=>$organization,
			    'ADDRESSTYPE'=>$addresstype,
			    'STREET'=>$street,
			    'STREET2'=>$street2,
			    'CITY'=>$city,
			    'STATE'=>$state,
			    'ZIP'=>$zip,
			    'COUNTRY'=>$country,
			    'PHONE'=>$phone,
			    'FAX'=>$fax,
			    'USERNAME'=>$username,
			    'PASSWORD1'=>$password1,
			    'PASSWORD2'=>$password2,
			    'PLAYER'=>$player,
			    'PLAYER_OTHER'=>$player_other,
			    'INTERESTS1'=>$interests1,
			    'INTERESTS2'=>$interests2,
			    'INTERESTS3'=>$interests3,
			    'INTERESTS4'=>$interests4,
			    'INTERESTS5'=>$interests5,
			    'INTERESTS_OTHER'=>$interests_other,
			    'NEWSLETTER'=>$newsletter,
			    'MEMBER_NAME'=>$member_name,
			    'M_ADDRESS'=>$m_address,
			    'M_COUNTRY'=>$m_country,
			    'M_TEL'=>$m_tel,
			    'M_FAX'=>$m_fax,
			    'M_EMAIL'=>$m_email,
			    'M_HOMEPAGE'=>$m_homepage,
			    'M_ESTABLISH'=>$m_establish,
			    'M_VISION'=>$m_vision,
			    'M_MISSION'=>$m_mission,
			    'M_PROFILE_AS'=>$m_profile_as,
			    'MEMBERS_URBAN'=>$members_urban,
			    'MEMBERS_URBAN_LOW'=>$members_urban_low,
			    'MEMBERS_RURAL'=>$members_rural,
			    'MEMBERS_RURAL_LOW'=>$members_rural_low,
			    'MARKET_SEGMENTATION'=>$market_segmentation,
			    'URBAN_MALE'=>$urban_male,
			    'URBAN_FEMALE'=>$urban_female,
			    'MEMBERS_URBAN_18_19'=>$members_urban_18_19,
			    'MEMBERS_URBAN_30_45'=>$members_urban_30_45,
			    'MEMBERS_URBAN_45_60'=>$members_urban_45_60,
			    'MEMBERS_URBAN_60'=>$members_urban_60,
			    'RURAL_MALE'=>$rural_male,
			    'RURAL_FEMALE'=>$rural_female,
			    'MEMBERS_RURAL_18_19'=>$members_rural_18_19,
			    'MEMBERS_RURAL_30_45'=>$members_rural_30_45,
			    'MEMBERS_RURAL_45_60'=>$members_rural_45_60,
			    'MEMBERS_RURAL_60'=>$members_rural_60,
			    'ASSETS_TOTAL'=>$assets_total,
			    'CORE_BUSINESS'=>$Core_Business,
			    'SAVINGS_AMOUNT'=>$savings_amount,
			    'SAVINGS_MALE'=>$savings_male,
			    'SAVINGS_FEMALE'=>$savings_female,
			    'SAVINGS_YOUTH'=>$savings_youth,
			    'SAVINGS_NONMEMBER'=>$savings_nonmember,
			    'SHARE_AMOUNT'=>$share_amount,
			    'SHARE_MALE'=>$share_male,
			    'SHARE_FEMALE'=>$share_female,
			    'SHARE_YOUTH'=>$share_youth,
			    'SHARE_NONMEMBER'=>$share_nonmember,
			    'LOAN_TOTAL'=>$loan_total,
			    'LOAN_MALE'=>$loan_male,
			    'LOAN_FEMALE'=>$loan_female,
			    'LOAN_YOUTH'=>$loan_youth,
			    'LOAN_NONMEMBER'=>$loan_nonmember,
			    'RESERVE_TOTAL'=>$reserve_total,
			    'BOARD_NAME_1'=>$board_name_1,
			    'BOARD_POS_1'=>$board_pos_1,
			    'BOARD_NAME_2'=>$board_name_2,
			    'BOARD_POS_2'=>$board_pos_2,
			    'BOARD_NAME_3'=>$board_name_3,
			    'BOARD_POS_3'=>$board_pos_3,
			    'BOARD_NAME_4'=>$board_name_4,
			    'BOARD_POS_4'=>$board_pos_4,
			    'BOARD_NAME_5'=>$board_name_5,
			    'BOARD_POS_5'=>$board_pos_5,
			    'BOARD_NAME_6'=>$board_name_6,
			    'BOARD_POS_6'=>$board_pos_6,
			    'BOARD_NAME_7'=>$board_name_7,
			    'BOARD_POS_7'=>$board_pos_7,
			    'BOARD_NAME_8'=>$board_name_8,
			    'BOARD_POS_8'=>$board_pos_8,
			    'BOARD_NAME_9'=>$board_name_9,
			    'BOARD_POS_9'=>$board_pos_9,
			    'BOARD_NAME_10'=>$board_name_10,
			    'BOARD_POS_10'=>$board_pos_10,
			    'MANAGE_NAME_1'=>$manage_name_1,
			    'MANAGE_POS_1'=>$manage_pos_1,
			    'MANAGE_NAME_2'=>$manage_name_2,
			    'MANAGE_POS_2'=>$manage_pos_2,
			    'MANAGE_NAME_3'=>$manage_name_3,
			    'MANAGE_POS_3'=>$manage_pos_3,
			    'MANAGE_NAME_4'=>$manage_name_4,
			    'MANAGE_POS_4'=>$manage_pos_4,
			    'MANAGE_NAME_5'=>$manage_name_5,
			    'MANAGE_POS_5'=>$manage_pos_5,
			    'IAGREE'=>$Iagree,
			    'MEMBER_OF'=>$member_of,
			    'ACTIVE'=>$active,
			     'U_DETAIL'=>$detail,  
        'U_DEL'=>$del,
		'U_EDIT'=>$edit
		)	);
	} // end while
}// end if

	$link="$index_file?m=$module_name&op=listmember&d=".$_GET['d'];
	$template->assign_vars(array(
      'PAGE_LIST'=>List_PageStr($page,$totalpage,$link),
		'JAVA_URL'=>"$index_file?m=$module_name&op=del",
		'U_ADD'=>"$index_file?m=$module_name&op=inputmember&gr=$gr"
		)	);

	   $menu=GetMenu();

	$html_code =  $template->pparse_str('listform');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code ,
	  'MENU'=>$menu,
		'COUNT'=>Counter()
		)	);
  $template->SetImagePath("");
   $template->pparse('body');


}

function Detailmember($mem_id)
{
  global $admin,$db,$index_file,$module_name,$SaveSMPath,$SaveBGPath,$SaveFilePath, $template,$mainframe,$adminframe,$gr;
						$title="";
				$firstname="";
				$lastname="";
				$email="";
				$email_confirmation="";
				$organization="";
				$addresstype="";
				$street="";
				$street2="";
				$city="";
				$state="";
				$zip="";
				$country="";
				$phone="";
				$fax="";
				$username="";
				$password1="";
				$password2="";
				$player="";
				$player_other="";
				$interests1="";
				$interests2="";
				$interests3="";
				$interests4="";
				$interests5="";
				$interests_other="";
				$newsletter="";
				$member_name="";
				$m_address="";
				$m_country="";
				$m_tel="";
				$m_fax="";
				$m_email="";
				$m_homepage="";
				$m_establish="";
				$m_vision="";
				$m_mission="";
				$m_profile_as="";
				$members_urban="";
				$members_urban_low="";
				$members_rural="";
				$members_rural_low="";
				$market_segmentation="";
				$urban_male="";
				$urban_female="";
				$members_urban_18_19="";
				$members_urban_30_45="";
				$members_urban_45_60="";
				$members_urban_60="";
				$rural_male="";
				$rural_female="";
				$members_rural_18_19="";
				$members_rural_30_45="";
				$members_rural_45_60="";
				$members_rural_60="";
				$assets_total="";
				$Core_Business="";
				$savings_amount="";
				$savings_male="";
				$savings_female="";
				$savings_youth="";
				$savings_nonmember="";
				$share_amount="";
				$share_male="";
				$share_female="";
				$share_youth="";
				$share_nonmember="";
				$loan_total="";
				$loan_male="";
				$loan_female="";
				$loan_youth="";
				$loan_nonmember="";
				$reserve_total="";
				$board_name_1="";
				$board_pos_1="";
				$board_name_2="";
				$board_pos_2="";
				$board_name_3="";
				$board_pos_3="";
				$board_name_4="";
				$board_pos_4="";
				$board_name_5="";
				$board_pos_5="";
				$board_name_6="";
				$board_pos_6="";
				$board_name_7="";
				$board_pos_7="";
				$board_name_8="";
				$board_pos_8="";
				$board_name_9="";
				$board_pos_9="";
				$board_name_10="";
				$board_pos_10="";
				$manage_name_1="";
				$manage_pos_1="";
				$manage_name_2="";
				$manage_pos_2="";
				$manage_name_3="";
				$manage_pos_3="";
				$manage_name_4="";
				$manage_pos_4="";
				$manage_name_5="";
				$manage_pos_5="";
				$Iagree="";
				$member_of="";
				$active="";
				
		if( 1 and  !empty($mem_id))
		{
			$table="member";
			$fieldArr ="mem_id,title,firstname,lastname,email,email_confirmation,organization,addresstype,street,street2,city,state,zip,country,phone,fax,username,password1,password2,player,player_other,interests1,interests2,interests3,interests4,interests5,interests_other,newsletter,member_name,m_address,m_country,m_tel,m_fax,m_email,m_homepage,m_establish,m_vision,m_mission,m_profile_as,members_urban,members_urban_low,members_rural,members_rural_low,market_segmentation,urban_male,urban_female,members_urban_18_19,members_urban_30_45,members_urban_45_60,members_urban_60,rural_male,rural_female,members_rural_18_19,members_rural_30_45,members_rural_45_60,members_rural_60,assets_total,Core_Business,savings_amount,savings_male,savings_female,savings_youth,savings_nonmember,share_amount,share_male,share_female,share_youth,share_nonmember,loan_total,loan_male,loan_female,loan_youth,loan_nonmember,reserve_total,board_name_1,board_pos_1,board_name_2,board_pos_2,board_name_3,board_pos_3,board_name_4,board_pos_4,board_name_5,board_pos_5,board_name_6,board_pos_6,board_name_7,board_pos_7,board_name_8,board_pos_8,board_name_9,board_pos_9,board_name_10,board_pos_10,manage_name_1,manage_pos_1,manage_name_2,manage_pos_2,manage_name_3,manage_pos_3,manage_name_4,manage_pos_4,manage_name_5,manage_pos_5,Iagree,member_of,active  , area_code , m_area , register_date";
			$searchkey=" and mem_id='$mem_id' ";
			$result=SearchDB( $searchkey,$table,$fieldArr);
			if($db->sql_numrows())
			{
				$row = $db->sql_fetchrow($result);
								$mem_id=$row["mem_id"];
				$title=$row["title"];
				$firstname=$row["firstname"];
				$lastname=$row["lastname"];
				$email=$row["email"];
				$email_confirmation=$row["email_confirmation"];
				$organization=$row["organization"];
				$addresstype=$row["addresstype"];
				$street=$row["street"];
				$street2=$row["street2"];
				$city=$row["city"];
				$state=$row["state"];
				$zip=$row["zip"];
				$country=$row["country"];
				$phone=$row["phone"];
				$fax=$row["fax"];
				$username=$row["username"];
				$password1=$row["password1"];
				$password2=$row["password2"];
				$player=$row["player"];
				$player_other=$row["player_other"];
				$interests1=$row["interests1"];
				$interests2=$row["interests2"];
				$interests3=$row["interests3"];
				$interests4=$row["interests4"];
				$interests5=$row["interests5"];
				$interests_other=$row["interests_other"];
				$newsletter=$row["newsletter"];
				$member_name=$row["member_name"];
				$m_address=$row["m_address"];
				$m_country=$row["m_country"];
				$m_tel=$row["m_tel"];
				$m_fax=$row["m_fax"];
				$m_email=$row["m_email"];
				$m_homepage=$row["m_homepage"];
				$m_establish=$row["m_establish"];
				$m_vision=$row["m_vision"];
				$m_mission=$row["m_mission"];
				$m_profile_as=$row["m_profile_as"];
				$members_urban=$row["members_urban"];
				$members_urban_low=$row["members_urban_low"];
				$members_rural=$row["members_rural"];
				$members_rural_low=$row["members_rural_low"];
				$market_segmentation=$row["market_segmentation"];
				$urban_male=$row["urban_male"];
				$urban_female=$row["urban_female"];
				$members_urban_18_19=$row["members_urban_18_19"];
				$members_urban_30_45=$row["members_urban_30_45"];
				$members_urban_45_60=$row["members_urban_45_60"];
				$members_urban_60=$row["members_urban_60"];
				$rural_male=$row["rural_male"];
				$rural_female=$row["rural_female"];
				$members_rural_18_19=$row["members_rural_18_19"];
				$members_rural_30_45=$row["members_rural_30_45"];
				$members_rural_45_60=$row["members_rural_45_60"];
				$members_rural_60=$row["members_rural_60"];
				$assets_total=$row["assets_total"];
				$Core_Business=$row["Core_Business"];
				$savings_amount=$row["savings_amount"];
				$savings_male=$row["savings_male"];
				$savings_female=$row["savings_female"];
				$savings_youth=$row["savings_youth"];
				$savings_nonmember=$row["savings_nonmember"];
				$share_amount=$row["share_amount"];
				$share_male=$row["share_male"];
				$share_female=$row["share_female"];
				$share_youth=$row["share_youth"];
				$share_nonmember=$row["share_nonmember"];
				$loan_total=$row["loan_total"];
				$loan_male=$row["loan_male"];
				$loan_female=$row["loan_female"];
				$loan_youth=$row["loan_youth"];
				$loan_nonmember=$row["loan_nonmember"];
				$reserve_total=$row["reserve_total"];
				$board_name_1=$row["board_name_1"];
				$board_pos_1=$row["board_pos_1"];
				$board_name_2=$row["board_name_2"];
				$board_pos_2=$row["board_pos_2"];
				$board_name_3=$row["board_name_3"];
				$board_pos_3=$row["board_pos_3"];
				$board_name_4=$row["board_name_4"];
				$board_pos_4=$row["board_pos_4"];
				$board_name_5=$row["board_name_5"];
				$board_pos_5=$row["board_pos_5"];
				$board_name_6=$row["board_name_6"];
				$board_pos_6=$row["board_pos_6"];
				$board_name_7=$row["board_name_7"];
				$board_pos_7=$row["board_pos_7"];
				$board_name_8=$row["board_name_8"];
				$board_pos_8=$row["board_pos_8"];
				$board_name_9=$row["board_name_9"];
				$board_pos_9=$row["board_pos_9"];
				$board_name_10=$row["board_name_10"];
				$board_pos_10=$row["board_pos_10"];
				$manage_name_1=$row["manage_name_1"];
				$manage_pos_1=$row["manage_pos_1"];
				$manage_name_2=$row["manage_name_2"];
				$manage_pos_2=$row["manage_pos_2"];
				$manage_name_3=$row["manage_name_3"];
				$manage_pos_3=$row["manage_pos_3"];
				$manage_name_4=$row["manage_name_4"];
				$manage_pos_4=$row["manage_pos_4"];
				$manage_name_5=$row["manage_name_5"];
				$manage_pos_5=$row["manage_pos_5"];
				$Iagree=$row["Iagree"];
				$member_of=$row["member_of"];
				$active=$row["active"];

								$area_code =$row["area_code"];
				$m_area = $row["m_area"];
				$register_date = $row["register_date"];
			}

		}else{
		     $mem_id="";
	
		}//end if
		
	if(!empty($gr))
		{
	 $module_file = "modules/$module_name/$gr/memdetail.htm";
	 $template->SetImagePath("modules/$module_name/$gr/");
		}else{
	 $module_file = "modules/$module_name/memdetail.htm";
	 $template->SetImagePath("modules/$module_name/");
		}


	 $template->set_filenames(array(
		'detailform' => $module_file)
		);

	$template->assign_vars(array(
							'AREA_CODE'=>$area_code,
		'M_AREA'=>$m_area,
		'REGISTER_DATE'=>$register_date,
       'MEM_ID'=>$mem_id,
			    'TITLE'=>$title,
			    'FIRSTNAME'=>$firstname,
			    'LASTNAME'=>$lastname,
			    'EMAIL'=>$email,
			    'EMAIL_CONFIRMATION'=>$email_confirmation,
			    'ORGANIZATION'=>$organization,
			    'ADDRESSTYPE'=>$addresstype,
			    'STREET'=>$street,
			    'STREET2'=>$street2,
			    'CITY'=>$city,
			    'STATE'=>$state,
			    'ZIP'=>$zip,
			    'COUNTRY'=>$country,
			    'PHONE'=>$phone,
			    'FAX'=>$fax,
			    'USERNAME'=>$username,
			    'PASSWORD1'=>$password1,
			    'PASSWORD2'=>$password2,
			    'PLAYER'=>$player,
			    'PLAYER_OTHER'=>$player_other,
			  	'INTERESTS1'=>CheckBox("interests1",$interests1),
			    'INTERESTS2'=>CheckBox("interests2",$interests2),
			    'INTERESTS3'=>CheckBox("interests3",$interests3),
			    'INTERESTS4'=>CheckBox("interests4",$interests4),
			    'INTERESTS5'=>CheckBox("interests5",$interests5),
			    'INTERESTS_OTHER'=>$interests_other,
			    'NEWSLETTER'=>CheckBox("newsletter",$newsletter),
			    'MEMBER_NAME'=>$member_name,
			    'M_ADDRESS'=>$m_address,
			    'M_COUNTRY'=>$m_country,
			    'M_TEL'=>$m_tel,
			    'M_FAX'=>$m_fax,
			    'M_EMAIL'=>$m_email,
			    'M_HOMEPAGE'=>$m_homepage,
			    'M_ESTABLISH'=>$m_establish,
			    'M_VISION'=>$m_vision,
			    'M_MISSION'=>$m_mission,
			    'M_PROFILE_AS'=>$m_profile_as,
			    'MEMBERS_URBAN'=>$members_urban,
			    'MEMBERS_URBAN_LOW'=>$members_urban_low,
			    'MEMBERS_RURAL'=>$members_rural,
			    'MEMBERS_RURAL_LOW'=>$members_rural_low,
			    'MARKET_SEGMENTATION'=>$market_segmentation,
			    'URBAN_MALE'=>$urban_male,
			    'URBAN_FEMALE'=>$urban_female,
			    'MEMBERS_URBAN_18_19'=>$members_urban_18_19,
			    'MEMBERS_URBAN_30_45'=>$members_urban_30_45,
			    'MEMBERS_URBAN_45_60'=>$members_urban_45_60,
			    'MEMBERS_URBAN_60'=>$members_urban_60,
			    'RURAL_MALE'=>$rural_male,
			    'RURAL_FEMALE'=>$rural_female,
			    'MEMBERS_RURAL_18_19'=>$members_rural_18_19,
			    'MEMBERS_RURAL_30_45'=>$members_rural_30_45,
			    'MEMBERS_RURAL_45_60'=>$members_rural_45_60,
			    'MEMBERS_RURAL_60'=>$members_rural_60,
			    'ASSETS_TOTAL'=>$assets_total,
			    'CORE_BUSINESS'=>$Core_Business,
			    'SAVINGS_AMOUNT'=>$savings_amount,
			    'SAVINGS_MALE'=>$savings_male,
			    'SAVINGS_FEMALE'=>$savings_female,
			    'SAVINGS_YOUTH'=>$savings_youth,
			    'SAVINGS_NONMEMBER'=>$savings_nonmember,
			    'SHARE_AMOUNT'=>$share_amount,
			    'SHARE_MALE'=>$share_male,
			    'SHARE_FEMALE'=>$share_female,
			    'SHARE_YOUTH'=>$share_youth,
			    'SHARE_NONMEMBER'=>$share_nonmember,
			    'LOAN_TOTAL'=>$loan_total,
			    'LOAN_MALE'=>$loan_male,
			    'LOAN_FEMALE'=>$loan_female,
			    'LOAN_YOUTH'=>$loan_youth,
			    'LOAN_NONMEMBER'=>$loan_nonmember,
			    'RESERVE_TOTAL'=>$reserve_total,
			    'BOARD_NAME_1'=>$board_name_1,
			    'BOARD_POS_1'=>$board_pos_1,
			    'BOARD_NAME_2'=>$board_name_2,
			    'BOARD_POS_2'=>$board_pos_2,
			    'BOARD_NAME_3'=>$board_name_3,
			    'BOARD_POS_3'=>$board_pos_3,
			    'BOARD_NAME_4'=>$board_name_4,
			    'BOARD_POS_4'=>$board_pos_4,
			    'BOARD_NAME_5'=>$board_name_5,
			    'BOARD_POS_5'=>$board_pos_5,
			    'BOARD_NAME_6'=>$board_name_6,
			    'BOARD_POS_6'=>$board_pos_6,
			    'BOARD_NAME_7'=>$board_name_7,
			    'BOARD_POS_7'=>$board_pos_7,
			    'BOARD_NAME_8'=>$board_name_8,
			    'BOARD_POS_8'=>$board_pos_8,
			    'BOARD_NAME_9'=>$board_name_9,
			    'BOARD_POS_9'=>$board_pos_9,
			    'BOARD_NAME_10'=>$board_name_10,
			    'BOARD_POS_10'=>$board_pos_10,
			    'MANAGE_NAME_1'=>$manage_name_1,
			    'MANAGE_POS_1'=>$manage_pos_1,
			    'MANAGE_NAME_2'=>$manage_name_2,
			    'MANAGE_POS_2'=>$manage_pos_2,
			    'MANAGE_NAME_3'=>$manage_name_3,
			    'MANAGE_POS_3'=>$manage_pos_3,
			    'MANAGE_NAME_4'=>$manage_name_4,
			    'MANAGE_POS_4'=>$manage_pos_4,
			    'MANAGE_NAME_5'=>$manage_name_5,
			    'MANAGE_POS_5'=>$manage_pos_5,
			    'IAGREE'=>$Iagree,
			    'MEMBER_OF'=>$member_of,
			    'ACTIVE'=>$active,
			       
		)	);

	$menu=GetMenu();

	$html_code =  $template->pparse_str('detailform');
	$template->assign_vars(array(
      'HTML_CODE'=> $html_code,
	  'MENU'=>$menu,
		'COUNT'=>Counter()
		)	);
   $template->SetImagePath("");
   $template->pparse('body');
	
}


?>