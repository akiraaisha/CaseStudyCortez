<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])) {
        header('Location: /');
        exit();
    }
?>
