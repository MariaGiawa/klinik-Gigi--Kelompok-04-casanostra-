<?php 

include "../controller/koneksi.php";

$id_dokter = $_GET['id_dokter'];

$hapus= mysqli_query($koneksi, "DELETE FROM dokter WHERE id_dokter='$id_dokter'");

if($hapus)
	header('location: daftar_profil.php');
else
	echo "Hapus data gagal";

 ?>
