<?php

include 'conn.php';

$id = $_POST['id_teknisi'];
$image = $_FILES['image']['name'];
$imagePath = "uploads/".$image;
move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

$connect -> query("UPDATE user SET photo = '".$image."' WHERE id_user = '".$id."' ");

?>