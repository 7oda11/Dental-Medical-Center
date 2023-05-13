<?php
    require_once __DIR__ . '/../doctor_database/doctor_database.php';
    session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}

    if(isset($_POST['insert_date'])){
        $date_from=$_POST['date_from'];
        $date_to=$_POST['date_to'];
        $time_from=$_POST['time_from'];
        $time_to=$_POST['time_to'];
        $id=$_SESSION['doctor']->id;
        database_add_doctors_date_time($date_from,$date_to,$time_from,$time_to,$id);

    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment With Doctor</title>
    <link rel="stylesheet" href="../css/appointment .css">
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
    <h1>Doctor time for wark</h1>
    <form action="appointment.php" method="post">
        <label for="date_from">Date from: </label>
        <input type="date" id="date_from" name="date_from">
        <label for="date_to">Date to: </label>
        <input type="date" id="date_to" name="date_to">
        <label for="time_from">Time from: </label>
        <input type="time" id="time_from" name="time_from">
        <label for="time_to">Time to: </label>
        <input type="time" id="time_to" name="time_to">
        <input type="submit" value="Time For Work" name="insert_date">
    </form>
</body>
</html>