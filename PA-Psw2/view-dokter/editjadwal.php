<?php

    require'../controller/fungsi.php';

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "klinikgigi");

    // ambil data dari url
    $id = $_GET["id"];

    // query data jadwal berdasarkan id
    $jwl = query("SELECT * FROM jadwal WHERE id = $id")[0];



    // cek tombol submit sudah di klik atau belum
    if(isset($_POST["submit"])){
        
        // cek data berhasil diubah atau tidak
        if(ubah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diedit');
                    document.location.href = 'jadwal.php';
                </script>
            ";
        }else{
            "
                <script>
                    alert('data gagal diedit');
                    document.location.href = 'jadwal.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <title>Edit Jadwal Dokter</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Jadwal Dokter</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $jwl["id"];?>">
                            <input type="hidden" name="gambarLama" value="<?= $jwl["gambar"];?>">
                            <div class="form-group">
                                <label for="nama_dokter">Nama dokter</label>
                                <input type="text" name="nama_dokter" id="nama_dokter" required value="<?= $jwl["nama_dokter"];?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <input type="text" name="hari" id="hari" required value="<?= $jwl["hari"];?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="waktu1">Jam Mulai 1</label>
                                <input type="time" name="waktu1" id="waktu1" required value="<?= $jwl["waktu1"];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu1_end">Jam Selesai 1</label>
                                <input type="time" name="waktu1_end" id="waktu1_end" required value="<?= $jwl["waktu1_end"];?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="waktu2">Jam Mulai 2</label>
                                <input type="time" name="waktu2" id="waktu2" value="<?= $jwl["waktu2"];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu2_end">Jam Selesai 2</label>
                                <input type="time" name="waktu2_end" id="waktu2_end" value="<?= $jwl["waktu2_end"];?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="waktu3">Jam Mulai 3</label>
                                <input type="time" name="waktu3" id="waktu3" value="<?= $jwl["waktu3"];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu3_end">Jam Selesai 3</label>
                                <input type="time" name="waktu3_end" id="waktu3_end" value="<?= $jwl["waktu3_end"];?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="waktu4">Jam Mulai 4</label>
                                <input type="time" name="waktu4" id="waktu4" value="<?= $jwl["waktu4"];?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="waktu4_end">Jam Selesai 4</label>
                                <input type="time" name="waktu4_end" id="waktu4_end" value="<?= $jwl["waktu4_end"];?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <img src="../asset/img/ <?= $jwl['gambar'];?>">
                                <input type="file" name="gambar" id="gambar" width="50" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success">Edit Data!</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>