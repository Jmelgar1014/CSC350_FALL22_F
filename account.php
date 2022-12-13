<?php
    session_start();

    $apartment = $_SESSION['Apartment'];
    $pass = $_SESSION['Password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Home</title>
</head>
<body>
    <h5>Welcome <?php echo $apartment ?></h5>
</body>
</html>