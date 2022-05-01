<?php 
include('koneksi.php');

$id_dokter = $_GET['id_dokter'];

$ambil = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id_dokter'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


    <title>Form Edit Menu</title>
  </head>
  <body>
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="upload/gigi.png" alt="">
        <span>Klinik Gigi</span>
      </a>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto " href=#">Beranda</a></li>
          <li><a class="nav-link scrollto" href="tampilan_dokter.php">Dokter</a></li>        
         <li><a class="nav-link scrollto" href="#">Schedule</a></li>
         <a class="nav-link scrollto active" href="daftar_profil.php">Kelola Dokter</a></li>
         <li><a class="getstarted scrolltoo" href="#about">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Dokter</label>
          <input type="hidden" name="id_dokter" value="<?php echo $result[0]['id_dokter'] ?>">
          <input type="text" class="form-control" id="dokter1" name="nama_dokter" value="<?php echo $result[0]['nama_dokter'] ?>">
        </div>
        <div class="form-group">
          <label for="stok1">Nomor HP</label>
          <input type="text" class="form-control" id="no_HP" name="no_HP" value="<?php echo $result[0]['no_HP'] ?>">
        </div>
        <div class="form-group">
          <label for="harga1">Deskripsi</label>
          <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $result[0]['deskripsi'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar Profil</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
  </div>
  </div>
  <!-- Akhir Form Registrasi --> 
  </body>
</html>