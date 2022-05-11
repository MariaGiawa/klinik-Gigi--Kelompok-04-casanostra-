
<?php
include "../controller/functions.php";
$perawatan = query("SELECT * FROM perawatan");
?>

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
    <link rel="stylesheet" href="../asset/css/style_price.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
          <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
         <a class="nav-link scrollto" href="daftar_profil.php">Dokter</a></li>
         <li><a class="nav-link scrollto" href="transaction.php">Transaksi</a></li>
         <li><a class="getstarted scrolltoo" href="logout.php">Logout</a></li>
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
      <div data-aos="fade-up" data-aos-delay="600" >
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

<div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h1>Data Perawatan Gigi </h1>
                    </div>
                    <div class="container" data-aos="fade-up">
    <header class="section-header"> <br>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn-light btn btn-outline-primary me-md-2" ><a href="tambahperawatan.php"><b>Tambahkan</b></a></button>
    </div>
    </header>
        <table class="table table-success table-striped table-hover table-bordered border-Secondary">

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
        <button class="btn btn-outline-warning"  ><a href="ubahperawatan.php?id=<?= $row["id"]; ?>" class="fas fa-pen fa-xs" >Edit</a></button> 
        </td>
        <td>
        <button class="btn btn-outline-danger"><a href="hapusperawatan.php?id= <?php echo $row["id"]; ?> " class="fas fa-trash fa-xs" onclick="return confirm('apakah anda yakin untuk menghapus data ini?');">Delete</a> 
        </button>
        </td>
      </tr>
        <?php $i++; ?>
       <?php endforeach; ?>
      </table>
      </div>
      </section>
          <div class="card-body">
                       
         </div>
        </div>
      </div>
    </div>
</div>


<!-- End Services Section -->
<!-- service section dua -->
<section>
<div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2> <img src="../asset/img/bell-fill.svg" alt="">INFORMASI PRICE & COUPONS</h2>
                    </div>

                    <div class="card-body">
                        <a href="create.php" class="create-contact btn btn-md btn-success" >Create PRICE </a>
                        <div class="card-body">
                        <table class= " table table-bordered datatable table-hover">
                          <thead>
                            <tr>
                              <td>#</td>
                              <td>Judul</td>
                              <td>Penjelasan</td>
                             <td>Action</td>
                            </tr>
                          </thead>

                          <tbody>
                            <?php foreach ($contacts as $contact): ?>
                            <tr>
                             <td><?=$contact['id']?></td>
                            <td><?=$contact['deskripsi']?></td>
                            <td><?=$contact['penjelasan']?></td>
                            <td class="actions">
                             <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                             <a href="delete.php?id=<?php echo $contact['id']?>" class="trash" onclick="return confirm('apakah anda yakin untuk menghapus data ini?');"><i class="fas fa-trash fa-xs"></i></a>
                            </td>
                            </tr>
                             <?php endforeach; ?>
                            </tbody>
                            </table>
                            <div class="pagination">
		                        <?php if ($page > 1): ?>
		                        <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		                        <?php endif; ?>
		                        <?php if ($page*$records_per_page < $num_contacts): ?>
		                        <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		                        <?php endif; ?>
	                          </div>
                            </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end service -->
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
    <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
