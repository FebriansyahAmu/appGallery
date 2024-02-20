<?php

    include "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $namaAlbum = $_POST['NamaAlbum'];
        $deskripsi = $_POST['Deskripsi'];
        $tanggaldibuat = date("Y-m-d");
        $UserID = $_POST['UserID'];

        

        $query = "INSERT INTO album (NamaAlbum, Deskripsi, TanggalDibuat, UserID) VALUES(?,?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $namaAlbum, $deskripsi, $tanggaldibuat, $UserID);

        if($stmt->execute()){
            echo "<script>alert('Album Berhasil Dibuat')</script>";
            
        }else{
            echo "<script>alert('Terjadi Kesalahan')</script>";
        }
        
    }
    
?>  