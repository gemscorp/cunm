<?php


if (eregi("config.php",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.html");
    die();
}


$dbhost = "localhost";
$dbname = "accubench";
$dbuname = "accu";
$dbpass = "accu";



$dbtype = "MySQL";




$index_file="index.php";
$admin_file="admin.php";

$mainframe = Array("frame.html","frame1.html");
// ถ้า Upload ไปบน host แล้ว ให้แก้ ที่ บันทัดข้างล่างนี้
$Host="AACCU/benchmark";

$admin_home="movie";

// Set Path Upload รูป   และอย่าลืม ไป chom mode  777 ไดเร็กโทรี่ นี้ด้วย

      if(strstr( PHP_OS, 'WIN') )
	{
	$SaveSMPath="products\\small";
	$SaveBGPath="products\\big";
	$SaveFilePath="lib";
    $file_slash="\\";
	}else{
	$SaveSMPath="products/small";
	$SaveBGPath="products/big";
   $file_slash="/";
		$SaveFilePath="lib";

	}



$SENDMAIL=ture;

define("ADMINISTRATOR",1000);
define("SUPER_USER",100);
define("MEMBER_USER",10);


?>
