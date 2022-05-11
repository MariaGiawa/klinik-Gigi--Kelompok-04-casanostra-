<?php
include "../controller/function.php";
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the price id exists, for example update.php?id=1 will get the price with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
        $penjelasan = isset($_POST['penjelasan']) ? $_POST['penjelasan'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE price SET id = ?, deskripsi = ?, penjelasan = ? WHERE id = ?');
        $stmt->execute([$id, $deskripsi, $penjelasan, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header('location: index.php');
    }
    // Get the price from the price table
    $stmt = $pdo->prepare('SELECT * FROM price WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
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
    <title>update price</title>
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
         <a class="nav-link scrollto" href="team.html">Dokter</a></li>
         <li><a class="getstarted scrolltoo" href="../logout.php">Transaksi</a></li>
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
                    <h2>Update Informasi Price & Coupons<?=$contact['id']?></h2>
                    </div>
                    </div>
                    <div class="card-body">
                    <form action="update.php?id=<?=$contact['id']?>" method="post">
                            <div class="form-group">
                                 <label for="id">ID</label>
                                 <input type="text" name="id" value="<?=$contact['id']?>" id="id">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Judul</label>
                                <input type="text" name="deskripsi" value="<?=$contact['deskripsi']?>" id="deskripsi">
                            </div>
                            <div class="form-group">
                                 <label for="penjelasan">Penjelasan</label>
                                 <input type="text" name="penjelasan" value="<?=$contact['penjelasan']?>" id="penjelasan">
                            </div>

                            <input type="submit" value="Update">
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
