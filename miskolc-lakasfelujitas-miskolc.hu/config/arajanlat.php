<?php
session_start();
include ("connect.php");
include ("functions.php");

$server = "https://palatetozsindelyezes.hu/";


$to  = 'info@palatetozsindelyezes.hu'; 
$subject = 'Árajánlatkérés a weboldalról ('.$_SERVER['SERVER_NAME'].')';
$message = '
<html>
<body>
	
	<p>Kedves domain név tulajdonos!</p>
	<br />
	árajánlatkérés érkezett a weboldalról.<br /><br /> 
	<b>Domain: </b>'.$_SERVER['SERVER_NAME'].'<br>
	<b>Név: </b>'.$_POST['fullname'].'<br />
	<b>Telefonszám: </b>'.$_POST['phone_number'].'<br />
	<b>Cím: </b>'.$_POST['address'].'<br />
	<b>Üzenet: </b>'.$_POST['message'].'<br /><br /><br />
	

</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Péter <info@palatetozsindelyezes.hu>' . "\r\n";
$headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    // Sikeres e-mail küldés esetén
    header('Location: '.$server.'/?success=true');
    exit;
} else {
    // Sikertelen e-mail küldés esetén
    header('Location: '.$server.'/?success=false');
    exit;
}


?>