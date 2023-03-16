<?php
include 'conn.php';

$teknisi = $_POST['teknisi'];
$id_ticket = $_POST['id_ticket'];
$status = $_POST['status'];
$progress = $_POST['progress'];
$tgl_proses = $_POST['tgl_proses'];

$connect -> query("UPDATE ticket SET tanggal_proses = '".$tgl_proses."', id_teknisi='".$teknisi."', status='".$status."', progress='".$progress."' WHERE id_ticket='".$id_ticket."' ");


?>