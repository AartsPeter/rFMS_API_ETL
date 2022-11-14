<?php
session_start();

$abs_us_root=$_SERVER['DOCUMENT_ROOT'];

$self_path=explode("/", $_SERVER['PHP_SELF']);
$self_path_length=count($self_path);
$file_found=FALSE;

for($i = 1; $i < $self_path_length; $i++){
	array_splice($self_path, $self_path_length-$i, $i);
	$us_url_root=implode("/",$self_path)."/";
	
	if (file_exists($abs_us_root.$us_url_root.'z_us_root.php')){
		$file_found=TRUE;
		break;
	}else{
		$file_found=FALSE;
	}
}
// Set config
error_reporting(3);
$GLOBALS['config'] = array(
'mysql'      => array(
'host'         => '127.0.0.1',
'username'     => 'rfmsreader',
'password'     => 'DAFConn3ct2018!',
'db'           => 'rfms_reading',
),
'remember'        => array(
  'cookie_name'   => 'pmqesoxiw318374csb',
  'cookie_expiry' => 3600  // in seconds, One week, feel free to make it longer
),
'session' => array(
  'session_name' => 'user',
  'token_name' => 'token'
)
);



//If you changed your rFMSReader database prefix
//put it here.
$db_table_prefix = "uc_";  //Old database prefix
$timezone_string = 'Europe/Amsterdam';
$copyright_message = 'Peter Aarts - 2022';
$your_private_key = '6Lc_MDcUAAAAAGebttI8IiLVnHyImncT9Yp4WSrO';
$your_public_key = '6Lc_MDcUAAAAAC-B1arvynIOLRjJw20HCjzkTgk0';
$publickey = $your_public_key;
$privatekey = $your_private_key;

date_default_timezone_set($timezone_string);

//adding more ids to this array allows people to access everything, whether offline or not. Use caution.
$master_account = [1];

//Put Your o Here (if you have them)
$test_secret = "Insert_Your_Own_Key_Here";
$test_public = "Insert_Your_Own_Key_Here";
$live_secret = "Insert_Your_Own_Key_Here";
$live_public = "Insert_Your_Own_Key_Here";

require_once $abs_us_root.$us_url_root.'classes/DB.php';
require_once $abs_us_root.$us_url_root.'classes/config.php';
?>
