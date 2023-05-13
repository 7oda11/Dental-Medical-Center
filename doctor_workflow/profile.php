<?php
/*session_start();
if (!isset($_SESSION['doctor'])) {
    header('location:../home.php');
    exit;
}
$id=$_SESSION['doctor']->id;
require_once __DIR__ . '/../doctor_database/doctor_database.php';
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
        $path_rel = '../images/doctor_profile_images/' . time() . uniqid(rand()) . '.' . $extension;
        $path = __DIR__ . '/' . $path_rel;
        move_uploaded_file($_FILES['profile_img']['tmp_name'], $path);
        database_update_doctor_profile_image($_SESSION['doctor']->id, $path_rel);
        $_SESSION['doctor'] = database_get_doctor($id);
    }

}*/
session_start();
if (!isset($_SESSION['doctor'])) {
    header('location:../home.php');
    exit;
}
$id=$_SESSION['doctor']->id;
require_once __DIR__ . '/../doctor_database/doctor_database.php';
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
        $path_rel = '../images/doctor_profile_images/' . time() . uniqid(rand()) . '.' . $extension;
        $path = __DIR__ . '/' . $path_rel;
        move_uploaded_file($_FILES['profile_img']['tmp_name'], $path);
        database_update_doctor_profile_image($_SESSION['doctor']->id, $path_rel);
        $_SESSION['doctor'] = database_get_doctor($id);
    }

    

}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/profile.css?">
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
    <div class="container">
        <div class="protifle">
            <div class="profile-picture">
                <img src="<?= $_SESSION['doctor']->profile_image ?>" alt="My Profile Picture">
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
            <p>My Name: <?php echo $_SESSION['doctor']->name ?></p>
            <p>My Phone: <?php echo $_SESSION['doctor']->phone ?></p>
            <p>My Email: <?php echo $_SESSION['doctor']->email ?></p>
        </div>
    </div>
</body>

</html>