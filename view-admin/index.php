
<?php
include "../controller/functions.php";
$perawatan = query("SELECT * FROM perawatan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../asset/img/gigi.png" alt="">
        <span>Klinik Gigi</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Beranda</a></li>
         <a class="nav-link scrollto" href="team.html">Dokter</a></li>
         <li><a class="getstarted scrolltoo" href="#about">Transaksi</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Website Klinik Gigi</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">Always take care of your teeth and take care of your teeth</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="../asset/img/klinik2.jpg" class="img-fluid" alt="">
    </div>
  </div>
</div>  

</div>

</section><!-- End Features Section -->
<!-- ======= Services Section ======= -->
<section id="services" class="services">

<div class="container" data-aos="fade-up">
    <header class="section-header shadow">
    <h1 class=" text-dark bg-info  mb-3">PERAWATAN GIGI</h1> <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn-light btn btn-outline-primary me-md-2" ><a href="tambahperawatan.php"><b>Tambahkan</b></a></button>
    </div>
    </header>
<table class="table table-success table-striped table-bordered border-primary">

<tr>
    <th>NO.</th>
    <th>Gambar</th>
    <th>Jenis Perawatan</th>
    <th>penjelasan</th>
    <th>Action</th>
    <th>Action</th>
</tr>

<?php $i = 1; ?>
<?php foreach($perawatan as $row) :?>
<tr>
    <td><?= $i ?></td>
    <td><img src="../asset/img/<?php echo $row["gambar"]; ?>" alt="scaling.jpg" style="width:200px;"></td>
    <td><?= $row["deskripsi"]; ?></td>
    <td><?= $row["penjelasan"]; ?></td>
    <td>
        <button class="btn btn-outline-warning" ><a href="ubahperawatan.php?id=<?= $row["id"]; ?>">Edit</a></button> 
    </td>
    <td>
        <button class="btn btn-outline-danger"><a href="hapusperawatan.php?id= <?php echo $row["id"]; ?>" onclick="return confirm('apakah anda yakin untuk menghapus data ini?');">Delete</a> 
    </button>
    </td>
</tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</div>
</section><!-- End Services Section -->
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
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
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
    <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
