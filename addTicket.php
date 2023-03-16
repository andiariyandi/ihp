<?php
include 'conn.php';

$max_id = $_POST['max_id'];
$nopen = $_POST['nopen'];
$tanggal = $_POST['tanggal'];
$tanggal_p = $_POST['tanggal_p'];
$tanggal_s = $_POST['tanggal_s'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nopen = $_POST['nopen'];
$ruang = $_POST['ruang'];
$id_subkategori = $_POST['id_subkategori'];
$summary = $_POST['subject'];
$detail = $_POST['detail'];

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


$connect -> query( "INSERT INTO ticket (id_ticket,tanggal,tanggal_proses,tanggal_solved,reported_name,reported_mail,nopen,ruangan,id_sub_kategori,problem_summary,problem_detail,id_teknisi,status,progress) VALUES ('".$id_ticket."','".$tanggal."','".$tanggal_p."','".$tanggal_s."','".$nama."','".$email."','".$nopen."','".$ruang."','".$id_subkategori."','".$summary."','".$detail."','0','1','0')" );

?>