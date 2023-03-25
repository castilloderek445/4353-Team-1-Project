<?php
include 'connect.php';

$UID;

if(!empty($_SESSION['User_Status'])) {
    $UID = $_SESSION['User_id'];
}
?>

<?php
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    </body>
</html>