<?php 
include('koneksi.php');

$id_dokter = $_POST['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
$no_HP = $_POST['no_HP'];
$deskripsi = $_POST['deskripsi'];
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = './images/';

move_uploaded_file($source, $folder.$nama_file);
$edit = mysqli_query($koneksi, "UPDATE dokter SET nama_dokter='$nama_dokter', no_HP='$no_HP', deskripsi='$deskripsi', gambar='$nama_file' WHERE id_dokter='$id_dokter' ");

if($edit)
	header('location: daftar_profil.php');
else
	echo "Edit Menu Gagal";


 ?>