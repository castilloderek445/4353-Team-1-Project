<?php
    session_start();
    //takes a hidden input that determines the type of search
    $searchtype = $_POST["search"];
    $admin = $_SESSION["admin"];
    $admin = false;
    
    //print usersearch
    //might be able to change to universal print
    function print_type($given, $type){
        echo "<b>",$type, "</b>: ", $given;
        echo ". ";
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
    
    //retrieves data from the DB
    //searches will be done in here
    //once found prints the correct data hopefully
    function retrieve_data($value){
        //$
        //what does a quote consist of?
        //Quote == Quote Id, User Id, Zipcode, City, State, Total Gals, Estimated Price
        //search the quote db with the userId to retrive that data

        //random data
        $quote1 = array(0001,0001,77004,"Houston","Texas",10,30.1);
        $quote2 = array(0002,0001,77004,"Houston","Texas",1,3.01);
        $quote3 = array(0003,0001,77004,"Houston","Texas",0,0);
        $quote4 = array(0004,0001,77004,"Houston","Texas",20,60.2);

        $location1 = array(77004,"Houston", "Texas", 3.01, 4);
        $location2 = array(77449,"Katy", "Texas", 2.89, 0);
        $location3 = array(77204,"Houston", "Texas", 3.01, 0);

        $qvalues = array($quote1, $quote2, $quote3, $quote4);
        $lvalues = array($location1,$location2,$location3);

        if($value == "Quote"){
            return $qvalues;
        }
        if($value == "Location"){
            return $lvalues;
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
        echo "<br>";
        $values = retrieve_data($searchtype);

        for($x = 0; $x < sizeof($values); $x++){
            echo $values[$x][0],", ",$values[$x][1],", ",$values[$x][2],", ",$values[$x][3],", ",$values[$x][4];
            echo "<br>";
        }
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
        if(empty($userid) == true){
            $userid = $_SESSION["current_id"];
        }
        if_empty($quoteid, "Quote Id");
        if_empty($date, "Date");
        if_empty($totalgal, "Total Gallons");
        if_empty($price, "Average Price");

        echo "<br>";
        $values = retrieve_data($searchtype);

        if($admin == true){
            for($x = 0; $x < sizeof($values);$x++){
                $temp = $values[$x][0];
                printf("%04d", $temp);
                echo ", ";
                $temp = $values[$x][1];
                printf("%04d", $temp);
                echo ", ";
                echo $values[$x][2], ", ", $values[$x][3], ", ", $values[$x][4], ", ", $values[$x][5], ", ", $values[$x][6];
                echo "<br>";
            }
        }
        else{
            for($x = 0; $x < sizeof($values);$x++){
                if($userid == $values[$x][1]){
                    $temp = $values[$x][0];
                    printf("%04d", $temp);
                    echo ", ";
                    echo $values[$x][2], ", ", $values[$x][3], ", ", $values[$x][4], ", ", $values[$x][5], ", ", $values[$x][6];
                    echo "<br>";
                }
            }
        }


    }
    
?>