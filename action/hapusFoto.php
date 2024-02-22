<?php

    session_start();
    include ("config.php");

    if(isset($_GET['id'])){
        $fotoID = $_GET['id'];

        $query = "DELETE FROM foto WHERE FotoID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $fotoID);

        if($stmt->execute()){
            echo "<script>alert('Foto Berhasil Dihapus'); </script>";
            echo "<script>window.location.href = '../pages/inputGambar.php'</script>";
        }else{
            echo "terjadi kesalahan";
        }
    }else{
        echo "product_id tidak ditemukan";
    }
?>