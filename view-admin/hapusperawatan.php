<?php 

include "../controller/functions.php";
$id = $_GET["id"];

if(hapus($id) > 0 ){
    echo "
    <script>
        alert('data berhasil dihapuskankan!');
        document.location.href = 'index.php'
    </script>
";
} else {
    echo "
    <script>
        alert('data gagal dihapuskan!');
        document.location.href = 'index.php'
    </script>
";
}

?>