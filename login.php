<?php 
include 'conn.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);
$queryResult = $connect->query("SELECT*FROM user WHERE username = '".$user."' and password = '".$pass."'" );

$result=array();

while($fetchData = $queryResult->fetch_assoc()){
	$result[]=$fetchData;
}

echo json_encode($result);

?>