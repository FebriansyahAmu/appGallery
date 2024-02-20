<?php

    session_start();
    if(!$_SESSION['UserID']){
        echo "<script>window.location.href='login.php'</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    #sidebar {
        height: 100vh;
        width: 280px;
        position: fixed;
        background-color: #343a40;
    }

    .nav-item a {
        display: block;
        padding: 13px 30px;
        border-bottom: 1px solid #10558d;
        color: rgb(241, 237, 237);
        font-size: 16px;
        position: relative;
    }

    #main-content {
        margin-left: 280px;
        padding: 15px;
    }
</style>
<body>
    <div id="sidebar">
        <div class="navigation position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="gallery.php">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="inputgambar.php">Input Gambar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="albumfoto.php">Album foto</a>
                </li>
                
               <li class="nav-item">
                 <a class="nav-link active" href="../action/actionlogout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
                </li>
               
            </ul>
        </div>
    </div>


    
