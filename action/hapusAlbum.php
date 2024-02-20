<?php

    include "config.php";

    if(isset($_GET['id'])){
        $AlbumID = $_GET['id'];

        $query = "DELETE FROM album WHERE AlbumID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $AlbumID);

        if($stmt->execute()){
            echo "<script>alert('Data berhasil dihapus'); </script>";
        }else{
            echo "terjadi kesalahan";
        }
    }else{
        echo "product_id tidak ditemukan";
    }

?>