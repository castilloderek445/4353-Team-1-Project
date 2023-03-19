<?php
    //for now this just takes inputs of the search bar form
    //done fast :) sorry :pray_emoji:
    //ill try to format it so it can work for all searchbars
    $default = "No Value Given";
    $userid = $_POST["id"];
    $username = $_POST["username"];
    $userzip = $_POST["zipcode"];
    $userst = $_POST["state"];

    if(empty($userid)){
        echo "User Id: ", $default;
        echo "<br>";
    }
    else{
        echo "User Id: ", $userid;
        echo "<br>";
    }

    if(empty($username)){
        echo "Username: ", $default;
        echo "<br>";
    }
    else{
        echo "Username: ", $username;
        echo "<br>";
    }

    if(empty($userzip)){
        echo "User Zipcode: ", $default;
        echo "<br>";
    }
    else{
        echo "User Zipcode: ", $userzip;
        echo "<br>";
    }

    if(empty($userst) || $userst == "sel_state"){
        echo "User State: ", $default;
        echo "<br>";
    }
    else{
        echo "User State: ", $userst;
        echo "<br>";
    }
    
?>
