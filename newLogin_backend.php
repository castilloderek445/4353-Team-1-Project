<?php  
    if (isset($_POST["submit"])){ 

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        
        //require_once 'dbh.inc.php';
        require_once 'newLogin_fuunctions.php';


        if(emptyLoginInput($email, $pwd) !== false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../login.php?error=invalidEmail");
            exit();
        }


        //loginUser($conn, $email, $pwd);
    }

    // if user tries to get to this page thru the address bar, it'll send them to login.php
    else {
        header("location: ../login.php");
        exit();
    }
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
    }
?>
