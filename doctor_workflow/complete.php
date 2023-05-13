<?php
require_once __DIR__ . '/../patient_database/patient_database.php';
session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}

 
if (isset($_GET['MRN'])) {
    $MRN = $_GET['MRN'];
    //database_update_patient_doctor_id_service_id_to_null($MRN);
    header('location:prescription.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
<nav class="navbar">
        <ul>
        <li><a href="D_dec.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="prescription.php">Prescription</a></li>
            <li><a href="appointment.php">Appointments</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h1>Think You For Write the Prescription DR:<?=$_SESSION['doctor']->name?></h1>
    <button>
        <a href="prescription.php">Back to Prescription</a>
    </button>
</body>

</html>