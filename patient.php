
<?php
require_once __DIR__ . '/patient_database/patient_database.php';
$email='';
$error='';
session_start();
$conn=database_connect();
 if(isset($_POST['patient_login'])){
 $email=$_POST['email'];
 $password=$_POST['password'];
 $user=database_patient_authenticate($email,$password);
 if($user===null){
    $error='Wrong email or password';
}
else{
    $_SESSION['patient']=$user;
    header('location:patient_workflow/P_dec.php');
    exit;
}

 }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page as  patient</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Login as patient</h1>
    <form action="patient.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?=$email?>"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <!--error-->
        <span class="error"><?=$error?></span>
        <input type="submit" value="Login" name="patient_login">
    </form>
</body>

</html>