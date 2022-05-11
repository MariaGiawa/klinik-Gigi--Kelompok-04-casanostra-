<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">

    <title>Daftar Profil Dokter</title>
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
         <li><a class="nav-link scrollto" href="#about">Transaksi</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- Menu -->
  <section>
      <div class="container">
        <div class="row">

          <?php 

          include "../controller/koneksi.php";

          $query = mysqli_query($koneksi, 'SELECT * FROM dokter');
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="../asset/img/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h4 class="card-title font-weight-bold"><?php echo $result['nama_dokter'] ?></h4>
                <h6 class="card-title "><?php echo $result['deskripsi'] ?></h6>
                <a href="schedule.php"class="btn btn-success btn-sm " >Detail</a>
              </div>
            </div>
          </div>
              <?php endforeach; ?>
            </div>
          </div>
  <section>
  <!-- Akhir Menu -->
  <!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    
<div class="footer-top">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="../asset/img/gigi.png" alt="">
          <span>Klinik Gigi</span>
        </a>
        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
        <div class="social-links mt-3 icons">
          <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

              
      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63712.54662270548!2d98.63523443390183!3d3.579624583109787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131f542bdf087%3A0x5cf00e41b4bc6902!2sKlinik%20Gigi%20SMILE!5e0!3m2!1sid!2sid!4v1650259886604!5m2!1sid!2sid" 
          width="600" height="450" style="border:0;"
           allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </p>


    </div>
  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Klinik gigi</span></strong>
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">kelompok 02</a>
  </div>
</div>
</footer><!-- End Footer -->

    <!-- Optional JavaScript -->
  </body>
</html>
