
<?php
require_once __DIR__ . '/doctor_database/doctor_database.php';
session_start();
$email='';
$error='';
$conn=database_connect();
 if(isset($_POST['dotor_login'])){
 $email=$_POST['email'];
 $password=$_POST['password'];
 $user=database_doctor_authenticate($email,$password);
 if($user===null){
    $error='Wrong email or password';
}
else{
    $_SESSION['doctor']=$user;
    header('location:doctor_workflow/D_dec.php');
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
    <title>Login Page as doctor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Login as doctor</h1>
<form action="doctor.php" method="post">
<label for="email">Email:</label>
<input type="email" id="email" name="email" required><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password" required><br>
  <!--error-->
  <span class="error"><?=$error?></span>
<input type="submit" value="Login" name="dotor_login">
</form>
</body>
</html>