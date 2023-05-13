<?php
require_once __DIR__ . '/../doctor_database/doctor_database.php';
require_once __DIR__ . '/../prescription_database/prescription_database.php';

session_start();
if(!isset($_SESSION['patient'])){
    header('location:../home.php');
    exit;
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$doctor = database_get_doctor($id);
$contents=database_select_prescription_content_to_patient($_SESSION['patient']->MRN,$id);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/view.css">
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
        <h1>Hello <?= $_SESSION['patient']->name?></h1>
        <h2>DR:<?=$doctor['name']?></h2>
        <div>
            <?php if($contents!=null):?>
            <?php foreach($contents as $content): ?>
                <p>Prescription</p>
            <TExtarea disabled style="width: 500px; height: 300px;color: black;"><?=$content['content']?></TExtarea>
            <?php endforeach;?>
            <?php else:?>
                <p>no prescription found</p>
                <?php endif;?>
        </div>
        <button>
            <a href="P_dec.php">Back to Home </a>
        </button>
</body>
</html>