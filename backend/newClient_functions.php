<?php

    // if any of the fields are empty, throw error
    function emptySignupInput($email, $name, $state, $zip, $pwd, $pwdRepeat){
        $flag; //idk why unset variables shows red squiggly line but it works
        if (empty($email) || empty($name) || empty($state) || empty($zip) ||  empty($pwd) || empty($pwdRepeat)){
            $flag = true;

        }

        else{
            $flag = false;
        }
        return $flag;
    }

    // if email is not in proper format, throw error
    function invalidEmail($email){
        $flag;

        // built in function in php that checks if the first arg is a valid email (kinda crazy)
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    // if company name doesn't only contain a-z, A-Z, or numbers, throw error
    function invalidUsername($name){
        $flag;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    // if zip is not proper format, throw error
    function invalidZip($zip){ 
        $flag;
        if(!preg_match("#[0-9]{5}#", $zip)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    // if pwds dont match, throw error
    function pwdMatch($pwd, $pwdRepeat){
        $flag;
        if($pwd !==$pwdRepeat){
            $flag = true;
        }
        else {
            $flag = false;
        }
        return $flag;
    }

    //stuff that'll add new client info to database
    // function createNewClient($conn, $email, $name, $state, $zip, $pwd){

    //     $sql = "INSERT INTO users ($email, $name, $state, $zip, $pwd) VALUES (?,?,?,?,?)";
    // }

?>
