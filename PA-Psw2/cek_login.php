<?php 
// untuk mengaktifkan session pada php agar keamanan login lebih tinggi
session_start();
// menghubungkan file php dengan koneksi ke database mysqli
include "controller/functions.php";
 // menghilangkan backshlases
 $username = stripslashes($_POST['username']);
 //cara sederhana mengamankan dari sql injection
 $username = mysqli_real_escape_string($conn, $username);
  // menghilangkan backshlases
 $password = stripslashes($_POST['password']);
  //cara sederhana mengamankan dari sql injection
 $password = mysqli_real_escape_string($conn, $password);

 //select data berdasarkan username dari database
 $query      = "SELECT * FROM users WHERE username = '$username'";
 $result     = mysqli_query($conn, $query);
 $rows       = mysqli_num_rows($result);

// menerima data yang disubmit dari form login multi user
$username = $_POST['username'];
$password = $_POST['password']; // seleksi data user dengan username dan password apakah sesuai atau tidak $login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// hitung jumlah data yang ditemukan dari form login
$cek = mysqli_num_rows($result);
// mengcek apakah username dan password ditemukan pada database yang ada
if($cek > 0){
 $data = mysqli_fetch_assoc($result);
 // fungsi login sebagai admin
 if($data['role']=="admin"){
  // buat session login dan username agar keamanan lebih tinggi
  $_SESSION['username'] = $username;
  $_SESSION['role'] = "admin";
  // pindahkan ke halaman dashboard admin
  header("location:view-admin/index.php");
 // fungsi login sebagai pegawai
 }else if($data['role']=="dokter"){
  // buat session login dan username agar keamanan lebih tinggi
  $_SESSION['username'] = $username;
  $_SESSION['role'] = "dokter";
  // pindahkan ke halaman dashboard pegawai
  header("location:view-dokter/index.php");
 // fungsi login sebagai pengurus
 
 }else{
  // pindahkan ke halaman login kembali
  header("location:view-pasien/index.php");
 }
}else{
 header("location:index.php?pesan=gagal");
}
?>