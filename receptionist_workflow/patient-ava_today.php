<?php
require_once __DIR__ . '/../receptionist_database/receptionist_database.php';
$receptionists = database_select_available_patients_today();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/patient-ava_today.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="patient-ava_today.php">Home</a></li>

            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h2>Patient Avaliability Today</h2>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Services</th>
                <th>Price</th>
                <th>Time</th>
                <th>Doctor Name</th>
                <th>action</th>
            </tr>
        </thead>
        <?php if ($receptionists != null) : ?>
            <tbody>

                <?php foreach ($receptionists as $receptionist): ?>
                <tr>
                    <td><?= $receptionist['pname'] ?></td>
                    <td><?= $receptionist['phone'] ?></td>
                    <td><?= $receptionist['email'] ?></td>
                    <td><?= $receptionist['service'] ?></td>
                    <td><?= $receptionist['price'] ?></td>
                    <td><?= $receptionist['time'] ?></td>
                    <td><?= $receptionist['name'] ?></td>
                    <td><button onclick="deleteRow(event, this)"><a href="">OK</a></button></td>
                </tr>
                <?php endforeach ;?>

            </tbody>
        <?php else : ?>
            <tbody>
            <tr class="unavailable"> no patients available today</tr>

            </tbody>

        <?php endif; ?>


    </table>
    <script src="../java/script.js"></script>
</body>

</html>