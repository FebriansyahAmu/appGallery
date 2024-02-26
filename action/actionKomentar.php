<?php

session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFoto = $_POST["idFoto"];
    $userId = $_SESSION["UserID"];
    $isikomentar = $_POST["isiKomentar"];
    $tanggalKomentar = date("Y-m-d");
    

    $query = "INSERT INTO komentarfoto (FotoID, UserID, IsiKomentar, TanggalKomentar) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("iiss", $idFoto, $userId, $isikomentar, $tanggalKomentar);
    
    if ($stmt->execute()) {
        header("Location: ../pages/detailGambar.php?id=$idFoto");
        exit;
    } else {
        echo "Terjadi kesalahan saat menambahkan like: " . $connection->error;
    }
} else {
    echo "Foto Tidak ditemukan";
}

?>
