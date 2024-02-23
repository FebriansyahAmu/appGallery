<?php

    session_start();
    include 'config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Email = $_POST['email'];
        $Password = $_POST['password'];


        $query = "SELECT UserID, Username, Email, Password, NamaLengkap FROM user WHERE Email = ? AND Password = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();


        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['NamaLengkap'] = $row['NamaLengkap'];
            $_SESSION['Username'] = $row['Username'];
            
            echo '<script>window.location.href ="../pages/dashboard.php"</script>';
        }else{
            echo'<script>alert("Email atau password salah")</script>';     
        }

      }


?>