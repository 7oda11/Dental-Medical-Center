<?php
    require_once __DIR__ . '/../service_database/service_database.php';
    $services=database_get_all_services();    
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
    <title>Services Page</title>
    <link rel="stylesheet" href="../css/service.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="../patient_workflow/profile.php">Profile</a></li>
            <li><a href="../doctor_workflow//prescription.php">Prescription</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="../patient_workflow/logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="conten-services">
    <h1>Our Services</h1>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
                <th>Book</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($services as $service):?>
            <tr>
                <td><?=$service['service']?></td>
                <td><?=$service['price']?></td>
                <td><a href="../patient_workflow/P_pre_app.php?id=<?=$service['id']?>&MRN=<?=$_SESSION['patient']->MRN;?>">Choose</a></td>

            </tr>
            <?php endforeach?>
            
        </tbody>
    </table>
    </div>
    
</body>

</html>