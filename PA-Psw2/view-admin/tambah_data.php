<?php 
include "../controller/koneksi.php";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">


    <title>Tambah Profil </title>
  </head>
  <body>
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="../asset/img/gigi.png" alt="">
        <span>Klinik Gigi</span>
      </a>

      <nav id="navbar" class="navbar">
      <ul>
      <li><a class="nav-link scrollto" href="index.php">Beranda</a></li>
         <a class="nav-link scrollto active" href="daftar_profil.php">Dokter</a></li>
         <li><a class="nav-link scrollto " href="#about">Transaksi</a></li>
         <li><a class="getstarted scrolltoo" href="../logout.php">Logout</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

 <!-- Form Registrasi -->
 <section>
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama Dokter</label>
          <input type="text" class="form-control" id="dokter1" name="nama_dokter">
        </div>
        <div class="form-group">
          <label for="noHP">Nomor HP</label>
          <input type="text" class="form-control" id="no_HP" name="no_HP">
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <input type="text" class="form-control" id="deskripsi" name="deskripsi">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar Profil</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $nama_dokter = $_POST['nama_dokter'];
    $no_HP = $_POST['no_HP'];
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../asset/img/';

    move_uploaded_file($source, $folder.$nama_file);
    $insert = mysqli_query($koneksi, "INSERT INTO dokter VALUES (NULL, '$nama_dokter', '$no_HP', '$deskripsi', '$nama_file')");

    if($insert){
      header("location: daftar_profil.php");
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
  }

   ?>

  </div>
  </div>
  </section>
  <!-- Akhir Form Registrasi -->

  </body>
</html>