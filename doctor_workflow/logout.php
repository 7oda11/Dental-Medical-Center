<?php
session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}

session_destroy();
header('location:../home.php');
exit;