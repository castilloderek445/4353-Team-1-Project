<?php
    //takes a hidden input that determines the type of search
    $searchtype = $_POST["search"];
    
    //print usersearch
    //might be able to change to universal print
    function print_type($given, $type){
        echo $type, ": ", $given;
        echo "<br>";
    }

    //this should be able to take all inputs
    function if_empty($given, $type){
        $default = "No Value Given";
        if(empty($given) || $given == "sel_state"){
            print_type($default, $type);
        }
        else{
            print_type($given, $type);
        }
    }


    if($searchtype == "User"){
        $userid = $_POST["id"];
        $username = $_POST["username"];
        $userzip = $_POST["zipcode"];
        $userst = $_POST["state"];

        if_empty($userid, "User Id");
        if_empty($username, "Username");
        if_empty($userzip, "User Zipcode");
        if_empty($userst, "User State");
    }

    if($searchtype == "Location"){
        $zipcode = $_POST["zip"];
        echo "In locations";
    }

    if($searchtype == "Quote"){
        echo "In Quotes";
    }


    
?>