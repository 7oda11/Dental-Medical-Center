<?php
    require_once __DIR__ . '/../prescription_database/prescription_database.php';
    session_start();
    if(!isset($_SESSION['patient'])){
        header('location:../home.php');
        exit;
    }
    $patients=database_select_prescription_info_to_patient($_SESSION['patient']->MRN);
    

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/pre_p.css">
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
    <h1>Hello <?=$_SESSION['patient']->name?></h1>

    <table>
        <thead>
            <tr>
                <th>Dr Name</th>
                <th>Services</th>
                <th>Cost</th>
                <th> Prescription</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($patients as $patient):?>
            <tr>
                <td>Dr. <?= $patient['name']?></td>
                <td><?= $patient['service']?></td>
                <td><?= $patient['price']?></td>
                <td><a href="view.php?id=<?=$patient['id']?>">View Prescription</a></td>
            </tr>
           <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>