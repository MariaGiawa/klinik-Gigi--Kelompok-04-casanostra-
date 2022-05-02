<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Daftar Profil Dokter</title>
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="images/gigi.png" alt="">
        <span>Klinik Gigi</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href=#">Beranda</a></li>
          <li><a class="nav-link scrollto active" href="tampilan_dokter.php">Dokter</a></li>        
         <li><a class="nav-link scrollto" href="#">Schedule</a></li>
         <a class="nav-link scrollto " href="daftar_profil.php">Kelola Dokter</a></li>
         <li><a class="getstarted scrolltoo" href="#about">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- Menu -->
  <section>
  <div class="container">
        <div class="row mt-3">

          <?php 

          include('koneksi.php');

          $query = mysqli_query($koneksi, 'SELECT * FROM dokter');
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="images/<?php echo $result['gambar'] ?>" class="card-img-top" widht="150 px">
              <div class="card-body">
              <h4 class="card-title font-weight-bold"><?php echo $result['nama_dokter'] ?></h4>
                <h6 class="card-title "><?php echo $result['deskripsi'] ?></h6>
                <a href="#"class="btn btn-success btn-sm " >Detail</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
         </div> 
      </div>
    </section>
  <!-- Akhir Menu -->
     <!-- Optional JavaScript -->
     </body>
</html>

