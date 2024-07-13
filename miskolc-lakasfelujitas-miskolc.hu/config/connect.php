<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'vargasoft_lakasfelujitas';
$GLOBALS['conn'] = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)or die("Error " . mysqli_error($conn));;

?>