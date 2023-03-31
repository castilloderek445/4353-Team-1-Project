<?php
namespace App;
include_once '../navbar.php';
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
        if(!preg_match('/^\d{5}$/', $zip)){
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

    function uidExists($con, $email){ //also used for login functions
        
        $sql = "SELECT * FROM user WHERE Email = ?;";
        
        //prepared statement
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../NewClient.php?error=stmtfailed");
            exit();
        }

        //args: prepared statement, type of data being submitted, data being submitted
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){ //if there's data in the db with this username, grab data with username
            return $row; //returning all data from user if username exists in db, which will be used to detect at login
        }
        else{ //nothing in the database, so flag is false
            $result = false;
            return $result;
        }

        //close statement
        mysqli_stmt_close($stmt);

    }

    //stuff that'll add new client info to database
    function createNewClient($con, $email, $name, $state, $zip, $pwd){ 

        $sql = "INSERT INTO user (Pwd, Company, Email, State, Zip ) VALUES (?,?,?,?,?)"; //Company = $name
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){ //checks if this fails
            header("location: ../NewClient.php?error=stmtfailed");
            exit();
        }

        //if doesn't fail, go thru
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        //args: prepared statement, type of data being submitted, data being submitted
        mysqli_stmt_bind_param($stmt, "sssss", $hashedPwd, $name, $email, $state, $zip);
        mysqli_stmt_execute($stmt);

        //close statement
        mysqli_stmt_close($stmt);

        //send user back somewhere
        header("location: ../NewClient.php?error=none");
    }



    function emptyLoginInput($email, $pwd){
        $flag; 
        if (empty($email) || empty($pwd)){
            $flag = true;

        }

        else{
            $flag = false;
        }
        return $flag;
    }


    function loginUser($con, $email, $pwd){
       $uidExists = uidExists($con, $email);
       
       if($uidExists === false){
         header("location: ../login.php?error=wronglogin1");
         die;
       }
    
       $pwdHashed = $uidExists["Pwd"]; //referencing the column name from users
       $checkPwd = password_verify($pwd, $pwdHashed); 
    
       if($checkPwd === false){ //if pwds don't match, error
         header("location: ../login.php?error=wronglogin2");
         die;
       }
       else if($checkPwd === true){ //if pwds match, start session
         session_start();
         //session userid and username = the User_id and Username columns values that are pulled from the user's row
         $_SESSION["userid"] =  $uidExists["User_id"];
         $_SESSION["userstatus"] = $uidExists["User_Status"];
         $_SESSION["company"] =  $uidExists["Company"];
         header("location: ../home.php?Message=successfulLogin");
         exit();
       }
    
    }
?>