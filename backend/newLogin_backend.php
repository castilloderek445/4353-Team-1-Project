<?php
include_once '../navbar.php';
use function App\emptyLoginInput;
use function App\invalidEmail;
use function App\loginUser;

    if (isset($_POST["submit"])){ 

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        
        require_once 'client_functions.php';

        // if(emptyLoginInput($email, $pwd) !== false){
        //     header("location: ../login.php?error=emptyinput");
        //     exit();
        // }

        loginUser($con, $email, $pwd);

    }

    // if user tries to get to this page thru the address bar, it'll send them to login.php
    else {
        header("location: ../login.php?error=bypass");
        exit();
    }
    // if(isset($_GET["error"])){
    //     if($_GET["error"] == "emptyinput"){
    //         echo "<p>Fill in all fields!</p>";
    //     }
    // }
?>