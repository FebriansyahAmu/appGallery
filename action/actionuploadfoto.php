<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judulFoto = $_POST['JudulFoto'];
    $deskripsiFoto = $_POST['DeskripsiFoto'];
    $tanggalUnggah = date("Y-m-d");
    $albumID = $_POST['AlbumID'];
    $userID = $_POST['UserID'];


    $targetDir = "../data/";
    $filename = basename($_FILES["FileFoto"]["name"]);
    $targetFile = $targetDir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["FileFoto"]["tmp_name"], $targetFile)) {
            // File berhasil diupload, simpan informasi di database
            $filepath = $targetDir . $filename;

            // Query untuk menyimpan informasi foto ke dalam database
            $query = "INSERT INTO foto (JudulFoto, DeskripsiFoto, TanggalUnggah, LokasiFile, AlbumID, UserID) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "ssssii", $judulFoto, $deskripsiFoto, $tanggalUnggah, $filepath, $albumID, $userID);
            mysqli_stmt_execute($stmt);

            echo "Foto berhasil diupload dan informasi telah disimpan di database";
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
        }
    }
}
?>
