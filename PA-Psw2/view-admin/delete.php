<?php

include "../controller/koneksiPrice.php";


//get id
$id = $_GET['id'];

$query = "DELETE FROM price WHERE id = '$id'";

if($connection->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>