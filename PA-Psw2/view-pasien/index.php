
<?php
include "../controller/functions.php";
$perawatan = query("SELECT * FROM perawatan");
?>
<!-- price -->
<!-- price -->
<?php
include "../controller/function.php";
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our price table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM price ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of price, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM price')->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
     .card{
         box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;
      }
      
   </style>
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
        <li><a class="nav-link scrollto" href="index.php">Beranda</a></li>
        <li> <a class="nav-link scrollto active" href="daftar_profil.php">Dokter</a></li>
         <li><a class="nav-link scrollto" href="transaction.php">Transaksi</a></li>
         <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
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
          <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Appointment</span>
            <i class="bi bi-arrow-right"></i>
          </a>
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

<div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h1>PERAWATAN GIGI</h1> <br>
                    </div>

                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      <?php foreach($perawatan as $row) :?>
                   <div class="col-4 card border-8">
                       <img src="../asset/img/<?php echo $row["gambar"]; ?>" alt="scaling.jpg" style="width:400px;" class="card-img-top">
                    <div class="card-body">
                       <h5 class="card-title"><?= $row["deskripsi"]; ?></h5>
                    <p class="card-text"><?= $row["penjelasan"]; ?></p>
                </div>
            </div>
          <?php endforeach; ?>
    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  <!-- Price -->
  <section id="services" class="services">

<div class="container" style="margin-top: 30px">

                <div class="card">
                    <div class="card-header">
                      <center>
                    <h2>price and coupons </h2>
                  <p>Check the price of dental care</p><vbr>  </center>
                    </div>

                    <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($contacts as $contact): ?>
                   <div class="col-6 card border-8">
                   <img src="../asset/img/gigi3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                       <h5 class="card-title" > <img src="../asset/img/bell-fill.svg" alt=""><?=$contact['deskripsi']?></h5>
                    <p class="card-text"><?=$contact['penjelasan']?></p>
                </div>
            </div>
          <?php endforeach; ?>
    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  <!-- end price -->
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
          <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
