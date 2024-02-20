<?php

    include "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $email = $_POST['Email'];
        $namaLengkap = $_POST['NamaLengkap'];
        $alamat = $_POST['Alamat'];
        

        $query = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat) VALUES(?,?,?,?,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssss", $username, $password, $email, $namaLengkap, $alamat);

        if($stmt->execute()){
            echo "<script>alert('Register Akun Berhasil')</script>";
            echo "<script>window.location.href = '../pages/login.php'</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan')</script>";
        }
        
    }
    
?>  