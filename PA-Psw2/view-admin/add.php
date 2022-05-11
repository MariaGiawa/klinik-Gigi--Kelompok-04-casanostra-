<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Transaksi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH TRANSAKSI
            </div>
            <div class="card-body">
              <form action="simpan.php" method="POST">
                
                <div class="form-group">
                  <label>Nama Pasien</label>
                  <input type="text" name="nama" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="nohp" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                  <label>Total Bayar</label>
                  <input class="form-control" name="totalbayar" placeholder="" ></input>
                </div>
                <div>
                <label for="images"><span>Bukti </span></label>
                <input type="file" name="images" id="images"><br><br>
                </div>
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>