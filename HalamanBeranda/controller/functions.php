<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","klinikgigi");

function query ($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 

    return $rows;
}


function tambah($data){
    global $conn;
    //ambil data dari tiap element form

    $deskripsi = htmlspecialchars ($data["deskripsi"]);
    $penjelasan = htmlspecialchars ($data["penjelasan"]);
    
    // upload gambar
    $gambar = upload();
        if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO perawatan
                    VALUE
                    ('', '$gambar', '$deskripsi', '$penjelasan')
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
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



function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM perawatan WHERE id = $id");

        return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
     //ambil data dari tiap element form
     $id = $data["id"];
     $gambarLama = htmlspecialchars($data["gambarLama"]);
     $deskripsi = htmlspecialchars ($data["deskripsi"]);
     $penjelasan = htmlspecialchars ($data["penjelasan"]);

    // cek apakah user pilih gambar baru atu tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();

    }
  
     //query insert data
     $query = "UPDATE perawatan SET 
                    gambar = '$gambar',
                    deskripsi = '$deskripsi',
                    penjelasan = '$penjelasan'
                WHERE id = $id
                    ";
     mysqli_query($conn, $query);
 
     return mysqli_affected_rows($conn);
}
?>