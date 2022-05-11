<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'klinikgigi';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

		<!-- Vendor CSS Files -->

		<link href="http://localhost/our-project/public/backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://localhost/our-project/public/backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="http://localhost/our-project/public/backend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
		<link href="http://localhost/our-project/public/backend/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="http://localhost/our-project/public/backend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="http://localhost/our-project/public/backend/css/style.css" rel="stylesheet">
	</head>
	<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="img/klinik.png" alt="">
        <span>KlinikGigi</span>
      </a>

      <nav id="navbar" class="navbar" >
        <ul>
            <li><a class="nav-link scrollto active" href="read.php">Beranda</a></li>
            <li><a class="nav-link scrollto" href="dokter.html">Dokter</a></li>
            <li><a class="nav-link scrollto" href="team.html">Schedule</a></li>
            <li><a class="getstarted scrollto" href="#">Logout</a></li>
        </ul>
        <i class="mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

</body>

</html>

EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}


?>