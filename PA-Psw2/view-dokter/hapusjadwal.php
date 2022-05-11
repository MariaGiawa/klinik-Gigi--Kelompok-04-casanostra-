<?php

    require'../controller/fungsi.php';

    $id = $_GET["id"];

    if(hapus($id) > 0){
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'jadwal.php';
            </script>
            ";
    }else{
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'jadwal.php';
            </script>
            ";
    }

?>