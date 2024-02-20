<?php
session_start();
if (isset($_SESSION['UserID'])) {
    session_unset();
    session_destroy();

    echo "<script>window.location.href='../pages/login.php'</script>";
} else {
    echo "<script>alert('Anda tidak masuk, Tidak ada sesi aktif')</script>";
}

?>