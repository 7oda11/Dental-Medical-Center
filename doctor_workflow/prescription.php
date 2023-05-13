<?php
require_once __DIR__ . '/../doctor_database/doctor_database.php';
session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}

$patients=database_select_patients_to_write_prescription($_SESSION['doctor']->id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/prescription.css">
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
    <h1>Hello Dr. <?=$_SESSION['doctor']->name?>!</h1>
    <p>Thank you for seeing your patients today.please write prescription</p>
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Services</th>
                <th> write prescription</th>
            </tr>
        </thead>
        <tbody>
            <?php if($patients!=null):?>
            <?php foreach($patients as $patient):?>
            <tr>
                <td><?=$patient['name'];?></td>
                <td><?=$patient['email'];?></td>
                <td><?=$patient['phone'];?></td>
                <td><?=$patient['service'];?></td>
                <td><a href="write_prescription.php?MRN=<?=$patient['MRN']?>">Write Prescription</a></td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
                <tr>
                <td>no data</td>
                
            </tr>
            <?php endif;?>
            
        </tbody>
    </table>
</body>

</html>