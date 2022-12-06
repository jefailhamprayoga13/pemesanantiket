<?php
include '../../../config/koneksi.php';
$id_wisata = $_GET['id_wisata'];
$query = mysqli_query($conn, "select * from wisata where id_wisata='$id_wisata'");
$wisata = mysqli_fetch_array($query);
$data = array(
            'harga_tiket'=>$wisata['harga_tiket'],);
echo json_encode($data);
?>