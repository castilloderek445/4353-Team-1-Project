<?php   

namespace App;
    // user can only access this newClient_backend.php if they go thru the NewClient.php
    // so can only access the following if statement, if the user pressed the submit button
    if (isset($_POST["submit"])){ 
        //echo "It works";

        $email = $_POST["email"];
        $name = $_POST["name"];
        $state = $_POST["state"];
        $zip = $_POST["zipcode"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdRepeat"];
        
        //require_once 'connect.php'; //connect to file that connects to db
        require_once 'newClient_functions.php';

        // a bunch of input validation

        if(emptySignupInput($email, $name, $state, $zip, $pwd, $pwdRepeat) !== false){
            header("location: ../NewClient.php?error=emptyinput");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../NewClient.php?error=invalidEmail");
            exit();
        }

        if(invalidUsername($name) !== false){
            header("location: ../NewClient.php?error=invalidUsername");
            exit();
        }

        if(invalidZip($zip) !== false){
            header("location: ../NewClient.php?error=invalidZip");
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../NewClient.php?error=pwdsdontmatch");
            exit();
        }

        if(uidExists($con, $name, $email) !== false){
            header("location: ../NewClient.php?error=usernametaken");
            exit();
        }

        // create user that'll be added to the db 
        createNewClient($con, $email, $name, $state, $zip, $pwd);
    }

    // if user tries to get to this page thru the address bar, it'll send them to NewClient.php
    else {
        header("location: NewClient.php"); 
    }
?>