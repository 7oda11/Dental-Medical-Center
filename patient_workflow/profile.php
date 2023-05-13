
<?php
    session_start();
    if(!isset($_SESSION['patient'])){
        header('location:../home.php');
        exit;
    }
    $id=$_SESSION['patient']->MRN;
    require_once __DIR__ . '/../patient_database/patient_database.php';
    //handle update profile image(file upload)
    $error_profile_image_size = '';
    $error_profile_image_extensions = '';
    if (isset($_POST['update_profile_image'])) {
        //validate file size
        $max_size_mb = 5;
        $file_size_bytes = $_FILES['profile_img']['size'];
        if ($file_size_bytes > $max_size_mb * 1024 * 1024) {
            $error_profile_image_size = "max allowed size is {$max_size_mb}MB";
        }
        //validate_image_extension
        $allowed_extension = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        if (!in_array($extension, $allowed_extension)) {
            $error_profile_image_extensions = "Allowed extension are:" . implode(',', $allowed_extension);
        }
        //if image is valid ,move and rename and update profile_image in the database
        if (!$error_profile_image_extensions && !$error_profile_image_size) {
            $path_rel = '../images/patient_profile_images/' . time() . uniqid(rand()) . '.' . $extension;
            $path = __DIR__ . '/' . $path_rel;
            move_uploaded_file($_FILES['profile_img']['tmp_name'], $path);
            database_update_patient_profile_image($_SESSION['patient']->MRN, $path_rel);
            $_SESSION['patient'] = database_get_patient($id);
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
    <link rel="stylesheet" href="../css/profile.css?">

</head>
<body>
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
<div class="container">
    <div class="protifle">
        <div class="profile-picture">
            <img src="<?= $_SESSION['patient']->profile_image ?>" alt="My Profile Picture">
        </div>
        <form class="button" method="post" action="profile.php" enctype="multipart/form-data">
                <label for="upload_image">Upload your profile image </label>
                <input type="file" id="upload_image" class="file" name="profile_img" required><br>
                <!--error image(size)-->
                <?php if ($error_profile_image_size) : ?>
                    <span style="color: red;"><?= $error_profile_image_size ?></span><br>
                <?php endif; ?>
                <!--error image(extension)-->
                <?php if ($error_profile_image_extensions) : ?>
                    <span style="color: red;"><?= $error_profile_image_extensions ?></span><br>
                <?php endif; ?>
                <input type="submit" value="Update image" class="upload" name="update_profile_image">

            </form>
    </div>
</div>
    <div class="profile-details">
        <div class="profile-details">
            <h1>Your Profile</h1>
            <p>My Name: <?php echo $_SESSION['patient']-> name?></p>
            <p>My Phone: <?php echo $_SESSION['patient']-> phone?></p>
            <p>My Email: <?php echo $_SESSION['patient']-> email?></p>
        </div>
</div>
</body>
</body>
</html>