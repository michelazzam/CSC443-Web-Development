<?php
session_start();
ob_start();

if($_SESSION['permission_user'] !=false){
    foreach ($_SESSION as $key => $val) {
        unset($_SESSION[$key]);
    }
    session_destroy();
    ob_clean();
    header("Location: ../loginRegister.php");
    ob_flush();
}

?>

