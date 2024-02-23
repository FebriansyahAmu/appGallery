<?php

    include ("config.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $albumID = $_POST['AlbumID'];
        $namaAlbum = $_POST['NamaAlbum'];
        $deskripsi = $_POST['Deskripsi'];
        $userID = $_POST['UserID'];


        $query = "UPDATE album SET NamaAlbum = ?, Deskripsi = ? WHERE AlbumID = ? AND UserID = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssii", $namaAlbum, $deskripsi, $albumID, $userID);

        if($stmt->execute()){
            echo "<script>alert('Edit Album Foto Berhasil')</script>";
            echo "<script>window.location.href = '../pages/albumfoto.php'</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan')</script>";
        }
        
    }    

?>