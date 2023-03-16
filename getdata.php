<?php 
include 'conn.php';

$dbquery = $_POST['query'];
$queryResult = $connect->query($dbquery);

$result=array();

while($fetchData = $queryResult->fetch_assoc()){
	$result[]=$fetchData;
}

echo json_encode($result);

?>