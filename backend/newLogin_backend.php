<?php  
    if (isset($_POST["submit"])){ 
        echo "It works";

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        
        require_once 'newLogin_fuunctions.php';


        if(emptyLoginInput($email, $pwd) !== false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../login.php?error=invalidEmail");
            exit();
        }


        //loginUser($conn, $username, $pwd);
    }

    // if user tries to get to this page thru the address bar, it'll send them to login.php
    else {
        header("location: login.php"); 
    }
?>
