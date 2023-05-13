<?php
require_once __DIR__ . '/../doctor_database/doctor_database.php';
session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doctor Description</title>
    <link rel="stylesheet" href="../css/D_dec.css">
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
    <section class="doctor-info">
        <img src="<?= $_SESSION['doctor']->profile_image ?>" alt="">
        <h1>Hello Doctor <?php echo $_SESSION['doctor']-> name?>  </h1>
        <p style="text-align: center;">I hope it will be a beautiful day.........</p>
    </section>
</body>

</html>