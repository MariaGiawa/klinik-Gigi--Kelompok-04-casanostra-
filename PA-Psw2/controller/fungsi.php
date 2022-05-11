<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "klinikgigi");


    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }


function tambah($data) {
    global $conn;
    $nama_dokter     = htmlspecialchars($data["nama_dokter"]);
    $hari            = htmlspecialchars($data["hari"]);
    $waktu1          = htmlspecialchars($data["waktu1"]);
    $waktu1_end      = htmlspecialchars($data["waktu1_end"]);
    $waktu2          = htmlspecialchars($data["waktu2"]);
    $waktu2_end      = htmlspecialchars($data["waktu2_end"]);
    $waktu3          = htmlspecialchars($data["waktu3"]);
    $waktu3_end      = htmlspecialchars($data["waktu3_end"]);
    $waktu4          = htmlspecialchars($data["waktu4"]);
    $waktu4_end      = htmlspecialchars($data["waktu4_end"]);

    // upload gambar
    $gambar = upload();

    if( !$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO jadwal
            VALUES
        ('', '$nama_dokter', '$hari', '$waktu1', '$waktu1_end', '$waktu2', '$waktu2_end', '$waktu3', '$waktu3_end', '$waktu4', '$waktu4_end', '$gambar')
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// fungsi upload gambar
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada atau tidak gambar yang di upload
    if($error === 4){
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu!');
            </script>
        ";
        return false;
    }

    // cek yg diupload apakah gambar atau tidak
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 300000000){
        echo "
            <script>
                alert('Ukuran gambar yang anda upload terlalu besar');
            </script>
        ";
        return false;
    }

    // lolos dan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../asset/img/' . $namaFileBaru);

    return $namaFileBaru;
}



// hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// edit data
function ubah($data){
    global $conn;

    $id = $data["id"];

    $nama_dokter    = htmlspecialchars($data["nama_dokter"]);
    $hari           = htmlspecialchars($data["hari"]);
    $waktu1          = htmlspecialchars($data["waktu1"]);
    $waktu1_end      = htmlspecialchars($data["waktu1_end"]);
    $waktu2          = htmlspecialchars($data["waktu2"]);
    $waktu2_end      = htmlspecialchars($data["waktu2_end"]);
    $waktu3          = htmlspecialchars($data["waktu3"]);
    $waktu3_end      = htmlspecialchars($data["waktu3_end"]);
    $waktu4          = htmlspecialchars($data["waktu4"]);
    $waktu4_end      = htmlspecialchars($data["waktu4_end"]);
    $gambarLama     = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4){

        $gambar = $gambarLama;

    }else{
        $gambar = upload();
    }

        // query insert data
        $query = "UPDATE jadwal SET
            nama_dokter = '$nama_dokter',
            hari        = '$hari',
            waktu1      = '$waktu1',
            waktu1_end  = '$waktu1_end',
            waktu2      = '$waktu2',
            waktu2_end  = '$waktu2_end',
            waktu3      = '$waktu3',
            waktu3_end  = '$waktu3_end',
            waktu4      = '$waktu4',
            waktu4_end  = '$waktu4_end',
            gambar      = '$gambar'

        WHERE id = $id;

        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

















?>