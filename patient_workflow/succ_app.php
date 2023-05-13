<?php
    session_start();
    if(!isset($_SESSION['patient'])){
        header('location:../home.php');
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
    <link rel="stylesheet" href="../css/succ_app.css">
</head>

<body>
    <h1>Thank You for Booking an Appointment!</h1>
    <h2>Name:<?= $_SESSION['patient']->name?></h2>
    <h3>Phone:<?= $_SESSION['patient']->phone?></h3>
    <p>We have received your appointment request and will get back to you shortly to confirm your booking.</p>
    <p>Thank you for choosing our services. We look forward to seeing you soon.</p>
    <button onclick="window.location.href = 'P_dec.php';">Return to Home Page</button>
</body>

</html>