<?php
$connect = new mysqli('localhost','root','','helpdesk');

if($connect){
}else{
	echo "Connection Failed";
	exit();
}

?>