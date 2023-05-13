

<?php
$error="";
$name='';
$phone='';
$email='';
$error_email='';
$passwore_error_length='';
    require_once __DIR__ . '/doctor_database/doctor_database.php';
     if(isset($_POST["add_doctor"])){
        $name=$_POST["name"];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        //validate email
        if(database_doctor_check_email_exist($email)){
            $error_email='This email already found';
        }
        //validate password
        if($password!==$confirm_password){
        
            $error='password does not match this confirmation password';
        }
        //validate password length
        if(strlen($password)<8){
            $passwore_error_length='minimum length 8 charcter';
        }
        //every thing ok ,create account
        if(!$error && !$error_email && !$passwore_error_length){
            database_add_doctors($name,$phone,$email,$password);
            header('location:doctor.php');
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
    <title>Create Doctor_Account</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <h1>Create Doctor_Account</h1>
    <form action="createaccount_doctor.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required value="<?=$name?>"><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?=$email?>"><br>
     <!--error email-->
     <span class="error"><?=$error_email?></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required ><br>
    <!--error passwoerd length-->
    <span class="error"><?=$passwore_error_length?></span>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br>
      <!--error-->
      <span class="error"><?=$error?></span>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required value="<?=$phone?>"><br>
    <input type="submit" value="Create Account" name="add_doctor">
    </form>
</body>

</html>