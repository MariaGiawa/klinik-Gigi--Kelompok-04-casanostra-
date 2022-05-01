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
    <title>Ubah Data Perawatan</title>
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
	background:#A9A9A9;
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
	background:#B0C4DE;
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


    <div class="form-style-3">
    <form action="" method="post" enctype="multipart/form-data">
    <fieldset><legend>Edit Data Perawatan</legend> 
        <input type="hidden" name="id" value="<?= $prw["id"]; ?> ">
        <input type="hidden" name="gambarLama" value="<?= $prw["gambar"]; ?> ">
                <label for="gambar">Gambar : </label>
                <img src="img/<?= $prw['gambar']; ?>" width = "100" alt="gambar">
                <input type="file" name="gambar" id="gambar"><br><br>

                <label for="deskripsi">Jenis Perawatan : </label>
                <input type="text" name="deskripsi" id="deskripsi" required
                value="<?=$prw["deskripsi"]; ?>"><br><br>
            <label for="penjelasan">Penjelasan : </label>
                <textarea  type="text" name="penjelasan" id="penjelasan" required
                value="<?=$prw["penjelasan"]; ?>"> </textarea> <br><br>
            <button type="submit" name="submit">Update!</button>
     
</fieldset>
</form>
<div>

</body>
</html>