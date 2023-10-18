<?php
error_reporting(0);
function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function GetStr($string, $cookies, $end)
{
    $str = explode($cookies, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$password_string = 'abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';

$info = strip_tags($_GET['info']);
list($whm_ip, $whm_user, $whm_pass, $package) = explode('|', $info);

$user     = strtolower(generateRandomString());
$whm      = $whm_ip . ":2087";
$pass     = substr(str_shuffle($password_string), 0, 12);
$plan     = "default";

// Get Security Token {}
$domain = strip_tags($_GET['domain']);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://'.$whm.'/login/?login_only=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS,'user='.$whm_user.'&pass='.$whm_pass.'&goto_uri=%2F');
$url = curl_exec($ch);
$token = trim(strip_tags(GetStr($url,'"security_token":"','"')));
// End Get Security Token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://'.$whm.'/'.$token.'/scripts5/wwwacct');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS,'sign=&plan='.$package.'&domain='.$domain.'&username='.$user.'&password='.$pass.'&contactemail=&dbuser='.$user.'&msel=n%2Cy%2C200%2C%2Cpaper_lantern%2C5%2C200%2C5%2C5%2C5%2C200%2Cn%2C0%2C0%2Cdefault%2Cen%2C20%2C20%2C%2Cn%2C200%2Cdefault&pkgname='.$package.'&featurelist=default');

 $url = curl_exec($ch);
 if (strpos($url, 'Account Creation Ok')) {

	$arr = array("success"=>"true","err_msg"=>"https://$domain:2083|$user|$pass");
	echo json_encode($arr);
	exit();
	
	} else{
	$arr = array("success"=>"false","err_msg"=>"$domain");
	echo json_encode($arr);
	exit();	}