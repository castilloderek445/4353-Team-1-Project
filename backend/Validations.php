<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 

    if($_SESSION["admin"] == true){
        $admin = true;
    }
    else{
        $admin = false;
    }
    //print user search values
    //might be able to change to universal print
    function print_type($given, $type){
        echo "<b>",$type, "</b>: ", $given;
        echo ". ";
    }

    //this should be able to take all inputs
    //checks if empty
    //will print everything inputed
    function if_empty($given, $type){
        $default = "No Value Given";
        if(empty($given) || $given == "sel_state"|| $given == 0){
            echo "<script>alert(\"No Value Given: ", $type, "\")</script>";
            return $default;
        }
        else{
            return $given;
        }
    }
    
    //checks digit values: user id, quote id, zipcode
    function if_digit($given, $type){
        if(!preg_match('/^\d{5}$/', $given)){ 
            echo "<script>alert(\"ONLY DIGITS FOR: ", $type, "\")</script>";
        }
        else { return true; }
    }
?>