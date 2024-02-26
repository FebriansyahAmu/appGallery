<?php

session_start();
include("config.php");

if (isset($_GET['id'])) {
    $fotoID = $_GET['id'];
    $query_select = "SELECT LokasiFile FROM foto WHERE FotoID = ?";
    $stmt_select = $connection->prepare($query_select);
    $stmt_select->bind_param("i", $fotoID);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $lokasiFile = $row['LokasiFile'];

        if (file_exists($lokasiFile)) {
            unlink($lokasiFile);
        } else {
            echo "File tidak ditemukan.";
        }
        $query_delete = "DELETE FROM foto WHERE FotoID = ?";
        $stmt_delete = $connection->prepare($query_delete);
        $stmt_delete->bind_param("i", $fotoID);

        if ($stmt_delete->execute()) {
            echo "<script>alert('Foto Berhasil Dihapus'); </script>";
            echo "<script>window.location.href = '../pages/inputGambar.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menghapus foto dari database.";
        }
    } else {
        echo "Foto tidak ditemukan.";
    }
} else {
    echo "Foto ID tidak ditemukan.";
}

?>
