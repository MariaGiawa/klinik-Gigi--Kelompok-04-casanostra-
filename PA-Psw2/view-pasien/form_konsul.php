<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Form Konsultasi</title>
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
            <li><a class="nav-link scrollto" href="#">Beranda</a></li>      
          <li><a class="nav-link scrollto active" href="index.php">Dokter</a></li>
          <li><a class="nav-link scrollto" href="#">Transaksi</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

      </div>
    </header>
    <!-- form konsultasi -->
    <section>
  <div class="container">
    <h3 class="text-center mt-3 mb-5">Konsultasi</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama_pasien">Nama:</label>
          <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required >
        </div>
        <div class="form-group">
          <label for="email_pasien">Email:</label>
          <input type="text" name="email_pasien" id="email_pasien" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="no_hp">No HP:</label>
          <input type="text" name="no_hp" id="no_hp" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="umur_pasien">Umur:</label>
          <input  type="text" name="umur_pasien" class="form-control" id="umur_pasien" required>
        </div>
        <div class="form-group">
          <label for="jenis_perawatan">Jenis Perawatan:</label>
          <input  type="text" name="jenis_perawatan" class="form-control" id="jenis_perawatan" required>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal:</label>
          <input  type="date" name="tanggal" class="form-control" id="tanggal" required>
        </div> <br>


        <button class="btn btn-success" name="proses">Kirim</button>
      </form>

      <?php
 include "../controller/koneksiKonsul.php";
 
if(isset($_POST['proses']))
  {
      mysqli_query($koneksi,"insert into daftar_konsul set
      nama_pasien = '$_POST[nama_pasien]',
      email_pasien = '$_POST[email_pasien]',
      no_hp = '$_POST[no_hp]',
      umur_pasien = '$_POST[umur_pasien]',
      jenis_perawatan = '$_POST[jenis_perawatan]',
      tanggal = '$_POST[tanggal]'");

      if(($_POST) > 0 ){
        echo "
            <script>
                alert('Data Berhasil Disimpan!');
                document.location.href = 'form_konsul.php'
            </script> 
            ";
      }

  }
?>

  </div>
  </div>
  </section>

<!-- Footer -->
<br>
<br>
<footer>
<center>
<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Klinik gigi</span></strong>
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">kelompok 02</a>
  </div>
</div>
</center>
</footer>