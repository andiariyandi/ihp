<?php
include 'conn.php';

$idTicket = $_POST['idticket'];
$max_id = $_POST['max_id'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$deskripsi = $_POST['deskripsi'];
$id_user = $_POST['id_user'];

function getkodeticket($maxid){
	$max_fix = (int) substr($maxid,9,4);
	$max_nik = $max_fix+1;
	$tgl = $time = date('d');
	$bln = $time = date('m');
	$thn = $time = date('Y');

	$nik = 'T'.$thn.$bln.$tgl.sprintf('%04s', $max_nik);
	return $nik;
};

$id_ticket = getkodeticket($max_id);

if($idTicket == 'null'){
	$connect -> query( "INSERT INTO tracking (id_ticket,tanggal,status,deskripsi,id_user) VALUES ('".$id_ticket."','".$tanggal."','".$status."','".$deskripsi."','".$id_user."')" );
}else{
	$connect -> query( "INSERT INTO tracking (id_ticket,tanggal,status,deskripsi,id_user) VALUES ('".$idTicket."','".$tanggal."','".$status."','".$deskripsi."','".$id_user."')" );
}



?>