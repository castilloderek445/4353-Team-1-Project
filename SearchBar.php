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

//can do an if for any type of search we need
//just have to pass a hidden value with the search type
//then insert your values you need
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
        $city = $_POST["city"];
        $price = $_POST["price"];
        $state = $_POST["state"];

        if_empty($zipcode, "Zipcode");
        if_empty($city, "City");
        if_empty($price, "Average Price");
        if_empty($state, "State");
    }

    if($searchtype == "Quote"){
        $zipcode = $_POST["zip"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $userid = $_POST["userid"];
        $quoteid = $_POST["quoteid"];
        $date = $_POST["date"];
        $totalgal = $_POST["gallons"];
        $price = $_POST["price"];

        if_empty($zipcode, "Zipcode");
        if_empty($city, "City");
        if_empty($state, "State");
        if_empty($userid, "User Id");
        if_empty($quoteid, "Quote Id");
        if_empty($date, "Date");
        if_empty($totalgal, "Total Gallons");
        if_empty($price, "Average Price");
    }


    
?>