<?php

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

    //function uidExists($conn, $username,$email){
    //    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    //    $stmt = mysqli_stmt_init($conn);
    //    if(!mysqli_stmt_prepare($stmt,$sql)){
    //        header("location: ../login.php?error=stmtfailed");
    //        exit();
    //    }
    //}

    function invalidEmail($email){
        $flag;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    //function loginUser($conn, $email, $pwd){
    //    $uidExists = uidExists($conn, $email, $email);
    //    
    //    if($uidExists === false){
    //      header("location: ../login.php?error=wronglogin");
    //      exit();
    //    }
    //
    //    $pwdHashed = $uidExists["usersPwd"];
    //    $checkPwd = password_verify($pwd, $pwdHashed);
    //
    //    if($checkPwd === false){
    //      header("location: ../login.php?error=wronglogin");
    //      exit();
    //    }
    //    else if($checkPwd === true){
    //      session_start();
    //      $_SESSION["userid"] =  $uidExists["usersId"];
    //      $_SESSION["userid"] =  $uidExists["usersUid"];
    //      header("location: ../index.php");
    //      exit();
    //    }
    //
    //}


?>
