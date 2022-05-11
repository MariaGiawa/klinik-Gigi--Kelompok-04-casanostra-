<?php

//deklasrasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "klinikgigi";    

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($connection) {
    echo "Koneksi Berhasil!";
} else {
    echo "Koneksi Gagal! : ". mysqli_connect_error();
}
function upload (){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";

            return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        echo" <script>
                alert('Yang anda upload bukan gambar!');
                </script>";

            return false;
    }

    //cek jika ukuran terlalu besar
    if ($ukuranFile > 300000000 ){
        echo "<script> 
            alert('ukuran gambar terlalu besar!');
                </script>
        ";
        return false;
    }

    //lolos pengecekan,gambar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'../asset/img/' . $namaFileBaru);

    return $namaFileBaru;
}

?>