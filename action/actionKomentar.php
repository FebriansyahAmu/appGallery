<?php

session_start();
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $idFoto = $_POST["idFoto"];
    $userId = $_SESSION["UserID"];
    $isikomentar = $_POST["isiKomentar"];
    $tanggalKomentar = date("Y-m-d");


    $query = "INSERT INTO komentarfoto (FotoID, UserID, IsiKomentar, TanggalKomentar) VALUES($idFoto,$userId,'$isikomentar','$tanggalKomentar')";

    if($connection->query($query)){
        header("Location: ../pages/detailGambar.php?id=$idFoto");
        exit; 
    } else {
        echo "Terjadi kesalahan saat menambahkan like: " . $connection->error;
    }
} else {
    echo "Foto Tidak ditemukan";
}

?>
