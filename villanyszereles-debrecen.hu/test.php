<?php



include('config/connect.php');
require_once('config/functions.php');


$get_all_services = get_all_services();
foreach($get_all_services as $get_all_services) {
	echo $get_all_services['title'].'<br />';
} 


?>