<?php
    require_once __DIR__ . '/../patient_database/patient_database.php';
    session_start();
    if(!isset($_SESSION['patient'])){
        header('location:../home.php');
        exit;
    }
    if(isset($_POST['search_available_doctor'])){
        $date=$_POST['date'];
        $time=$_POST['time'];
        $id=$_SESSION['patient']->MRN;
       // print_r($_SESSION['user']);
        database_add_patient_date_time($date,$time,$id);
        $doctors=database_search_doctor_by_date_time($date,$time);
    }
    else{
        $doctors=database_get_all_patients();
    }

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Scheduling</title>
    <link rel="stylesheet" href="../css/p_app.css">
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
    <h1>Appointment Scheduling</h1>
    <form action="P_app.php" method="post"  >
        <label for="date"> Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time"> Time:</label>
        <input type="time" id="time" name="time" required><br><br>

        <input type="submit" value="Search" name="search_available_doctor">
    </form>

    <h2>Doctor Availability</h2>
    <table>
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Data From</th>
                <th>Date to</th>
                <th>Time From</th>
                <th>Time to</th>
                <th>Book</th>
            </tr>
        </thead>
        <tbody>
            <?php if($doctors !=null):?>
            <?php foreach($doctors as $doctor):?>
            <tr>
                <td> <?=$doctor['name']?></td>
                <td> <?=$doctor['email']?></td>
                <td> <?=$doctor['phone']?></td>
                <td><?=$doctor['date_from']?></td>
                <td><?=$doctor['date_to']?></td>
                <td><?=$doctor['time_from']?></td>
                <td><?=$doctor['time_to']?></td>
                <td><a href="booking.php?id=<?=$doctor['id']?>&MRN=<?=$_SESSION['patient']->MRN?>">Booking</a></td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td> no doctor found</td>
                </tr>
                <?php endif;?> 
            
        </tbody>
    </table>
</body>

</html>