<?php 

    session_start();

    include '../class/user_checker.php';

    $isCheck = new access_poke($_SESSION);
    




?>