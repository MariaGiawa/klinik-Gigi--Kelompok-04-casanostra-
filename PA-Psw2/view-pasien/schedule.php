<?php
    require'../controller/fungsi.php';

    $jadwal = query("SELECT * FROM jadwal");
?>

<!-- HEADER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Schedule</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="asset/img/gigi.png" alt="">
        <span>Klinik Gigi</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Beranda</a></li>      
         <li><a class="nav-link scrollto" href="daftar_profil.php">Dokter</a></li>
         <li><a class="nav-link scrollto active" href="schedule.php">Schedule</a></li>
         <li><a class="getstarted scrolltoo" href="#about">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>


<!-- END HEADER -->
<!-- =============================================================== -->
<!-- TABEL JADWAL DOKTER -->
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Jadwal Dokter</title>
</head>
<body>
  <section>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Daftar Jadwal Dokter</h1>
                    </div>

                    <div class="card-body">
                        <!-- <a href="tambahjadwal.php" class="btn btn-md btn-success">Tambah Jadwal Dokter</a> -->
                        <div class="card-body">
                            <table class="table table-bordered datatable">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Dokter</th>
                                    <th>Hari</th>
                                    <th>Waktu 1</th>
                                    <th>Waktu 2</th>
                                    <th>Waktu 3</th>
                                    <th>Waktu 4</th>
                                    <th>Gambar</th>
                                    <!-- <th>Aksi</th> -->
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($jadwal as $row):?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row["nama_dokter"]?></td>
                                        <td><?= $row["hari"]?></td>
                                        <td><?= $row["waktu1"]?> <br> s/d </br> <?= $row["waktu1_end"]?></td>
                                        <td><?= $row["waktu2"]?> <br> s/d </br> <?= $row["waktu2_end"]?></td>
                                        <td><?= $row["waktu3"]?> <br> s/d </br> <?= $row["waktu3_end"]?></td>
                                        <td><?= $row["waktu4"]?> <br> s/d </br> <?= $row["waktu4_end"]?></td>
                                        <!-- <td><img src="img/dokter1.png" width="100" alt=""></td> -->
                                        <td><img src="../asset/img/<?php echo $row["gambar"];?>" width="100" alt=""></td>
                                        <!-- <td>
                                            <a class="btn btn-icon icon-left btn-success" href="editjadwal.php?id=<?php//$row["id"];?>">Edit</a>
                                            <a class="btn btn-icon icon-left btn-danger" href="hapusjadwal.php?id=<?php//$row["id"];?>" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete</a>
                                        </td> -->
                                    </tr>
                                    <?php $i++ ;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- END TABEL JADWAL DOKTER -->
<section>
<center><button><a class="nav-link scrollto" href="form_konsul.php">Konsultasi</a></button></center>
</section>
<!-- START FOOTER -->
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<!-- END FOOTER -->