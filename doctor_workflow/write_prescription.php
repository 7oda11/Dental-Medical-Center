<?php /*
require_once __DIR__ . '/..//patient_database/patient_database.php';
require_once __DIR__ . '/../prescription_database/prescription_database.php';
require_once __DIR__ . '/../prescription_database/prescription_database.php';


session_start();
$patient_MRN=null;
$MRN=null;
$patients=null;
if (isset($_GET['MRN'])) {
    $MRN=$_GET['MRN'];
    $patient = database_get_one_patient_to_write_prescription($MRN);
    //$patients=database_get_one_patient_to_update_prescription_MRN(    $MRN );
    $patient_MRN=$_GET['MRN'];
    }
  if(isset($_POST['send_prescription'])){
        $prescription=$_POST['Prescription'];
        $doctor_id=$_SESSION['user']->id;
       $patient_MRN=$_GET['MRN'];
        $inserted_id=database_insert_prescription($prescription);
        database_update_prescription($doctor_id,$patient_MRN,$inserted_id);
        exit;
  };
require_once __DIR__ . '/../patient_database/patient_database.php';
require_once __DIR__ . '/../prescription_database/prescription_database.php';

session_start();
$MRN=null;
if (isset($_GET['MRN'])) {
    $MRN = $_GET['MRN'];
    $patient = database_get_one_patient_to_write_prescription($MRN);
    
}
if (isset($_POST['send_prescription'])) {
    $prescription = $_POST['Prescription'];
    $doctor_id = $_SESSION['user']->id;
    if (isset($_GET['MRN'])) {
        $MRN = $_GET['MRN'];
        
    }
    $inserted_id = database_insert_prescription($prescription);
    database_update_prescription($doctor_id, $MRN, $inserted_id);
exit;
}

require_once __DIR__ . '/../patient_database/patient_database.php';
require_once __DIR__ . '/../prescription_database/prescription_database.php';

session_start();

$patient = null;
$MRN = null;

if (isset($_GET['MRN'])) {
    $MRN = $_GET['MRN'];
    $patient = database_get_one_patient_to_write_prescription($MRN);
}

if (isset($_POST['send_prescription'])) {
    $prescription = $_POST['Prescription'];
    $doctor_id = $_SESSION['user']->id;
    
    if (isset($_POST['MRN'])) {
        $MRN = $_POST['MRN'];
    }
    
    $inserted_id = database_insert_prescription($prescription);
    database_update_prescription($doctor_id, $MRN, $inserted_id);
    exit;
}
*/
require_once __DIR__ . '/../prescription_database/prescription_database.php';

session_start();
if(!isset($_SESSION['doctor'])){
    header('location:../home.php');
    exit;
}


if (isset($_GET['MRN'])) {
    $MRN = $_GET['MRN'];
    $patient = database_get_one_patient_to_write_prescription($MRN);
}
$patient_MRN =$patient['MRN'];
echo $patient_MRN;  

if (isset($_POST['send_prescription'])) {

    $prescription = $_POST['Prescription'];
    $doctor_id = $_SESSION['doctor']->id;
    
    if (isset($_GET['MRN'])) {
        $MRN = $_GET['MRN'];
    }
    
    $inserted_id = database_insert_prescription($prescription);
    database_update_prescription($doctor_id, $patient_MRN, $inserted_id);
    header('location: complete.php?MRN=' . $MRN);
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
    <link rel="stylesheet" href="../css/write_prescription.css">
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
    </nav>
    <div class="container">
        <h1>Patient Information</h1>
        <form method="post" action="write_prescription.php?MRN=<?=$MRN?>">
            <label for="name">Name:<?=$patient['name']?></label>
            <label for="Phone">Phone:<?=$patient['phone']?></label>
            <label for="Prescription">Prescription:</label>
            <textarea id="Prescription" name="Prescription" placeholder="Enter Prescription here..."></textarea>
            <button type="submit" name="send_prescription">Send</button>
        </form>
    </div>
</body>

</html>