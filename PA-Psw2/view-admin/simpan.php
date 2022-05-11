<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$nama           = $_POST['nama'];
$nohp = $_POST['nohp'];
$totalbayar       = $_POST['totalbayar'];
$images = $_POST['images'];


//query insert data ke dalam database
$query = "INSERT INTO transaksi (nama, nohp, totalbayar,images) VALUES ('$nama', '$nohp', '$totalbayar','$images')";


//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: transaction.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}


?>