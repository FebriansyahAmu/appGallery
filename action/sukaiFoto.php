<?php
session_start();
include "config.php";

if(isset($_GET['idFoto'])){
    $idFoto = $_GET['idFoto'];
    $userID = $_SESSION['UserID'];
    $tanggalLike = date("Y-m-d");

    $queryCheckLike = "SELECT COUNT(*) AS total FROM likefoto WHERE FotoID = $idFoto AND UserID = $userID";
    $resultCheckLike = mysqli_query($connection, $queryCheckLike);
    $rowCheckLike = mysqli_fetch_assoc($resultCheckLike);

    if($rowCheckLike['total'] == 0) {
        $query = "INSERT INTO likefoto (FotoID, UserID, TanggalLike) VALUES($idFoto, $userID, '$tanggalLike')";

        if($connection->query($query)){
            header("Location: ../pages/detailGambar.php?id=$idFoto");
            exit; 
        } else {
            echo "Terjadi kesalahan saat menambahkan like: " . $connection->error;
        }
    } else {
        echo "Anda sudah memberikan like untuk foto ini.";
    }
} else {
    echo "ID foto tidak ditemukan";
}
?>
