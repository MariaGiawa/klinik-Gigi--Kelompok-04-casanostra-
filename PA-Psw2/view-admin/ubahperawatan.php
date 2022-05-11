<?php 
include "../controller/functions.php";

//ambil data di url
$id = $_GET["id"];

//query data perawatan berdasarkan idnya
$prw = query("SELECT * FROM perawatan WHERE id = $id")[0];


//cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    

    // cek apakah data berhasil diubahkan atau tidak 
   if(ubah($_POST) > 0 ){
    echo "
        <script>
            alert('data berhasil diubahkan!');
            document.location.href = 'index.php'
        </script>
    ";
    }else {
        echo "
        <script>
            alert('data gagal diubahkan!');
            document.location.href = 'index.php'
        </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Data Perawatan</title>
	<link rel="stylesheet" href="../asset/css/style.css">
    <title>Update Data Perawatan</title>
</head>
<body>
<style type="text/css">

.form-style-3{
	max-width: 850px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-3 label{
	display:block;
	margin-bottom: 10px;
}
.form-style-3 label > span{
	float: left;
	width: 100px;
	color: #000000;
	font-weight: bold;
	font-size: 18px;
	text-shadow: 1px 1px 1px #fff;
}
.form-style-3 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;
	padding: 20px;
	background:#ffffff;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}
.form-style-3 fieldset legend{
	color: #000000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background:#A9A9A9;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 20px;
}
.form-style-3 textarea{
	width:550px;
	height:300px;
}
.form-style-3 input[type=text],
.form-style-3 textarea{
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border: 1px solid #FFC2DC;
	outline: none;
	color: #F072A9;
	padding: 5px 8px 5px 8px;
	box-shadow: inset 1px 1px 4px #FFD5E7;
	-moz-box-shadow: inset 1px 1px 4px #FFD5E7;
	-webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
	background:#ffffff;
	width:50%;

}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
	background: #B0C4DE;
	border: 1px solid #C94A81;
	padding: 5px 15px 5px 15px;
	color: #FFCBE2;
	box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
	border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;	
	font-weight: bold;
}
.form-style-3 .required{
	color:red;
	font-weight:normal;
}
</style>
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
	<div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <h1>Update Data Perawatan</h1>
                    </div>
					<div class="card-body">
					<div class="form-style-3">
    					<form action="" method="post" enctype="multipart/form-data">
    				<fieldset>
        				<input type="hidden" name="id" value="<?= $prw["id"]; ?> ">
        				<input type="hidden" name="gambarLama" value="<?= $prw["gambar"]; ?> ">
               		 <label for="gambar"><h5>Gambar :</h5> </label>
                		<img src="img/<?= $prw['gambar']; ?>" width = "100" alt="gambar">
                		<input type="file" name="gambar" id="gambar"><br><br>

                		<label for="deskripsi"><h5>Jenis Perawatan :</h5> </label>
                		<input type="text" name="deskripsi" id="deskripsi" required
                		value="<?=$prw["deskripsi"]; ?>"><br><br>
           			 <label for="penjelasan"><h5>Penjelasan : </h5></label>
                		<textarea  type="text" name="penjelasan" id="penjelasan" required
               		 value="<?=$prw["penjelasan"]; ?>"> </textarea> <br><br>
           			 <button type="submit" name="submit">Update!</button>
     
					</fieldset>
				</form>
				<div>

                    <div class="card-body">
                       
                        </div>
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>