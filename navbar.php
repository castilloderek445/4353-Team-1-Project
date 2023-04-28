<?php
session_start();
include("connect.php");
date_default_timezone_set('America/Chicago');
$BackSlashCount = substr_count($_SERVER['REQUEST_URI'], "/");
if ($BackSlashCount == 2) {
    $BackSlash = '';
}
if ($BackSlashCount == 3) {
    $BackSlash = '../';
}
if ($BackSlashCount == 4) {
    $BackSlash = '../../';
}

if (empty($_SESSION['userid'])) {
    $_SESSION['userstatus'] = '';
}

if ($_SESSION['userstatus'] != 'admin' && substr_count($_SERVER['REQUEST_URI'], "admin") > 0) {
    if ($BackSlashCount == 3) {
        header('location: ../home');
        die;
    }
    if ($BackSlashCount == 4) {
        header('location: ../../home');
        die;
    }
}

if (!empty($_SESSION['userid'])) {
    //If user is logged in, the option to log out will display
    $log = 'Log Out';
    $logref = $BackSlash.'backend/logout_backend.php';
    //echo $_SESSION['userid'];
} else {
    //If user is not logged in, the option to log in will display
    $log = 'Log In';
    $logref = $BackSlash.'login.php';
}

if (!empty($_SESSION['userid'])) {
    //If the user is an admin, the option to access adminPage will display
    if ($_SESSION['userstatus'] == 'admin') {
        $sign = 'Admin Profile';
        $signref = $BackSlash.'admin/adminPage.php';
    } else {
        //If the user is not an admin, the option to access clientProfile will display
        $sign = 'Client Profile';
        $signref = $BackSlash.'client/clientProfile.php';
    }
} else {
    //If the user is not logged in, the option to sign up will display
    $sign = 'Sign Up';
    $signref = $BackSlash.'NewClient.php';
}

$home = $BackSlash.'home.php';
$quotes = $BackSlash.'AllQuotes.php';
$getQuote = $BackSlash.'getQuote.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a>COSC 4353 Team 1 Project</a></li> 
            <li><a href='<?php echo $home; ?>'>Home</a></li> 
            <li><a href='<?php echo $quotes; ?>'>Quote History</a></li>
            <li><a href='<?php echo $getQuote; ?>'>Get Quote</a></li>
            <li><a href='<?php echo $signref; ?>'><?php echo $sign; ?></a></li> 
            <li><a href='<?php echo $logref; ?>'><?php echo $log; ?></a></li> 
            <!--When signed in, Sign Up and Login change to Profile and Logout-->
        </ul>
    </nav>
</body>
</html>
