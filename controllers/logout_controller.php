<?php
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['verified']);
        header("Location:login.php");
        exit();
    }

?>