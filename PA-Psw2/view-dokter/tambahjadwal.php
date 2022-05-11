<?php

    require'../controller/fungsi.php';

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "klinikgigi");


    // cek tombol submit sudah di klik atau belum
    if(isset($_POST["submit"])){
        
        // cek data berhasil atau tidak
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diinputkan');
                    document.location.href = 'jadwal.php';
                </script>
            ";
        }else{
            "
                <script>
                    alert('data gagal ditambahkan');
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
    <title>Tambah Jadwal Dokter</title>
</head>
<body>
    <div class="container mt 4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Jadwal Dokter</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_dokter">Nama dokter</label>
                                <input type="text" name="nama_dokter" id="nama_dokter" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <!-- <input type="text" name="hari" id="hari" required class="form-control"> -->
                                <select name="hari" id="hari" class = "form-control"required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                    <label for="waktu1">Jam Mulai 1</label>
                                    <input type="time" name="waktu1" id="waktu1" required class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="waktu1_end">Jam Selesai 1</label>
                                    <input type="time" name="waktu1_end" id="waktu1_end" required class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="waktu1">Jam Mulai 2</label>
                                    <input type="time" name="waktu2" id="waktu2" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="waktu2_end">Jam Selesai 2</label>
                                    <input type="time" name="waktu2_end" id="waktu2_end" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="waktu1">Jam Mulai 3</label>
                                    <input type="time" name="waktu3" id="waktu3" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="waktu3_end">Jam Selesai 3</label>
                                    <input type="time" name="waktu3_end" id="waktu3_end" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="waktu1">Jam Mulai ke-4</label>
                                    <input type="time" name="waktu4" id="waktu4" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="waktu4_end">Jam Selesai 4</label>
                                    <input type="time" name="waktu4_end" id="waktu4_end" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>

                            
                            <button type="submit" name="submit" class="btn btn-success">Tambah Data!</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>