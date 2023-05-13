<?php
session_start();
if (!isset($_SESSION['patient'])) {
    header('location:../home.php');
    exit;
}
//var_dump($_SESSION['user']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/D_dec.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="P_dec.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="pre.php">Prescription</a></li>
            <li><a href="../service_workflow/service.php">Services</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section class="doctor-info">
        <img src="<?= $_SESSION['patient']->profile_image ?>" alt="">
        <h1>Hello Patient <?php echo $_SESSION['patient']->name; ?> </h1>
        <p style="text-align: center;">I hope it will be a beautiful day.........</p>
    </section>
</body>

</html>