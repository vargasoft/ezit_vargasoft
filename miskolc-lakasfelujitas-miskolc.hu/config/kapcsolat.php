<?php
session_start();
include ("connect.php");
include ("functions.php");

$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$datum = date('Y-m-d H:i:s');

//böngésző
$ua=getBrowser();
$_SESSION['browser'] = $ua['name'];

$_SESSION['os'] = getOS();

$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

// 1 próbálkozás
	$proba_1 = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip.'');
	$proba_1 = json_decode($proba_1);
	$city = $proba_1->city;
	$country = $proba_1->country_code;
	
	if (!EMPTY($city)){
		$_SESSION['city'] = $city;
		$_SESSION['visitor_country'] = $country;
	}else{
		// Próba 2
		$proba_3 = file_get_contents('http://ip-api.com/json/'.$ip.'');
		$proba_3 = json_decode($proba_3);
		$city = $proba_3->city;
		$country = $proba_3->countryCode;
		$_SESSION['city'] = $city;
		$_SESSION['visitor_country'] = $country;
		
	}

mysqli_query($GLOBALS['conn'], "SET NAMES 'utf8'");
if (mysqli_query($GLOBALS['conn'], "

INSERT INTO `contacts` (`cid`, `domain`, `contact_name`, `contact_type`, `contact_date`, `contact_address`, `contact_phone`, `contact_email`, `contact_message`, `contact_ip`, `contact_city`, `contact_browser`, `contact_os`, `status`) VALUES 
(NULL, '".$_SERVER['SERVER_NAME']."', '".$_GET['name']."', 'kapcsolat', current_timestamp(), '".$_GET['address']."', '".$_GET['phone']."', '".$_GET['email']."', '".$_GET['message']."', '".$ip."', '".$_SESSION['city']."', '".$_SESSION['browser']."', '".$_SESSION['os']."', '0');

"))

{



} else {
echo '<br />---------------------------------------------------------<br /><p style="color:red">Something went wrong:<b><br />';
var_dump(mysqli_error($GLOBALS['conn']));
$_SESSION["reason_no"] = var_dump(mysqli_error($GLOBALS['conn']));
echo '</b></p>';
echo $_SESSION["reason_no"];
}

$to  = 'info@eurokerszig.hu'; // note the comma
$subject = 'Új üzenet a weboldalról';
$message = '
<html>
<body>
	
	<p>Kedves Péter!</p>
	<br />
	Üzenet érkezett a weboldalról.<br /><br /> 
	<b>Domain: </b>'.$_SERVER['SERVER_NAME'].'<br>
	<b>Név: </b>'.$_GET['fullname'].'<br />
	<b>Telefonszám: </b>'.$_GET['phone_number'].'<br />
	<b>Email cím: </b>'.$_GET['email'].'<br />
	<b>Cím: </b>'.$_GET['address'].'<br />
	<b>Üzenet: </b>'.$_GET['message'].'<br /><br /><br />
	
	<small>
	Üzenet küldés ideje: '.$datum.'<br />
	IP cím: '.$ip.'<br />
	Látogató becsült települése: '.$_SESSION['city'].'<br />
	Böngésző: '.$ua['name'].'<br />
	Operációs rendszer: '.$_SESSION['os'].'<br />

	
	</small>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Péter <info@eurokerszig.hu>' . "\r\n";
$headers .= 'From: '.$_SERVER['SERVER_NAME'].' <no-reply@eurokerszig.hu>' . "\r\n";
mail($to, $subject, $message, $headers);

?>