<?php
include "../controller/function.php";
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "deskripsi" exists, if not default the value to blank, basically the same for all variables
    $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
    $penjelasan = isset($_POST['penjelasan']) ? $_POST['penjelasan'] : '';

    // Insert new record into the price table
    $stmt = $pdo->prepare('INSERT INTO price VALUES (?, ?, ?)');
    $stmt->execute([$id, $deskripsi, $penjelasan]);
    // Output message
    $msg = 'Created Successfully!';
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../asset/css/style.css">
    <title>Tambah informasi price</title>
    <style>
      input[type=text]{
          width:550px;
	        height:40px;

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
          <li><a class="nav-link scrollto active" href="index.html">Beranda</a></li>
         <a class="nav-link scrollto" href="daftar_profil.php">Dokter</a></li>
         <li><a class="nav-link scrollto" href="#about">Transaksi</a></li>
         <li><a class="getstarted scrolltoo" href="../logout.php">Logout</a></li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                    <div class="content update">
                    <h2>Create Price & Coupons</h2>
                    </div>
                    </div>
                    <div class="card-body">
                    <form action="create.php" method="post">
                            <div class="form-group">
                                <label for="id">ID</label><br>
                                 <input type="text" name="id" value="auto" id="id">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Judul</label><br>
                                <input type="text" name="deskripsi" id="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="penjelasan">Penjelasan</label><br>
                                <input type="text" name="penjelasan" id="penjelasan">
                            </div>

                            <input type="submit" value="Create">
                        </form>
                        <?php if ($msg): ?>
                        <p><?=$msg?></p>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Klinik gigi</span></strong>
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">kelompok 02</a>
  </div>
</div>
</footer><!-- End Footer -->
</body>
</html>
