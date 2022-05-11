
<?php
//menyertakan file program koneksi.php pada register
include "controller/functions.php";
//inisialisasi session
session_start();
 
$error = '';
$validate = '';
 
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
//mengecek apakah sesssion username tersedia atau tidak jika tersedia maka akan diredirect ke halaman index
if( isset($_SESSION['username']) ) header('Location: index.php');
 
//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
         
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($conn, $password);
        
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){
 
            //select data berdasarkan username dari database
            $query      = "SELECT * FROM users WHERE username = '$username'";
            $result     = mysqli_query($conn, $query);
            $rows       = mysqli_num_rows($result);
 
            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
                
                    header('Location: view-pasien/index.php');
                }
                             
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Register User Gagal !!';
            }
             
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    }
?>
 

 
 
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- costum css -->
<link rel="stylesheet" href="style.css">
<style>
 
body{
    background-color: white;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 300px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
form{
   
    background-color: whitesmoke;
    margin: 150px auto; 
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}




</style>
</head>
<body>
     
        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="cek_login.php" method="post" >
                    <h4 class="text-center font-weight-bold"> Klinik Gigi</h4>
                    <center>
                    <img src="asset/img/gigi.png" width="110" height="100"  alt="">
                    </center>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                  
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                    <div class="form-footer mt-2">
                        <p> Belum punya account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </section>
            </section>
        </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>