<?php
    if(!empty($_SESSION['uid'])) {
        $session_id = $_SESSION['uid'];
        include('validator.php');
    } else {
        header('location: login.php');
    }
?>