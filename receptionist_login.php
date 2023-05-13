<?php
require_once __DIR__ . '/receptionist_database/receptionist_database.php';
$email='';
$error='';
session_start();
$conn=database_connect();
 if(isset($_POST['receptionist_login'])){
 $email=$_POST['email'];
 $password=$_POST['password'];
 $user=database_receptionist_authenticate($email,$password);
 if($user===null){
    $error='Wrong email or password';
}
else{
    $_SESSION['receptionist']=$user;
    header('location:receptionist_workflow/patient-ava_today.php');
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
    <title>Document</title>
    <link rel="stylesheet" href="css/receptionest_login.css?">
</head>

<body>
       
        </nav>
        <h1>Receptionist Login</h1>
        <form id="login-form" action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
                <!--error-->
        <span class="error"><?=$error?></span>
        <input type="submit" value="Login" name="receptionist_login">
    </form>
    </form>
</body>

</html>