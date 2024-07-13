<?php
include ("connect.php");
include ("functions.php");
$server = "https://miskolc-ablak.hu";

print_r($_POST);

$to  = 'info@vargasoft.hu';
$subject = 'Visszahívást kértek ('.$_SERVER['SERVER_NAME'].')';
$message = '
<html>
<body>
	<p>Kedves domain név tulajdonos!</p>
	<br />
	Visszahívást kértek a weboldalról. 
	<br /><br /><b>Domain:</b>'.$_SERVER['SERVER_NAME'].'<br>
	<b>Telefonszám:</b><a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a><br /><br /><br />


</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: Péter <info@vargasoft.hu>' . "\r\n";
$headers .= 'From: ' . $_SERVER['SERVER_NAME'] . ' <no-reply@vargasoft.hu>' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    // Sikeres e-mail küldés esetén
   // header('Location: '.$server.'/?success=true');
    exit;
} else {
    // Sikertelen e-mail küldés esetén
    header('Location: '.$server.'/?success=false');
    exit;
}

?>