<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);

    //echo 'You have destroyed your session!';
    header('Refresh: 1; URL = /');
    session_destroy();
?>