<?php
    require_once('Validations.php');
    //takes a hidden input that determines the type of search

    $searchtype;
    if(!empty($_POST["search"])){
        $searchtype = $_POST["search"];
    }
    else{
        $searchtype = "";
    }

    //prints the Quotes
    //shared btw admin and user
    function print_Quotes($userid, $admin){
        $values = retrieve_data("Quote");
        if($admin == true){
            for($x = 0; $x < sizeof($values);$x++){
                $temp = $values[$x][0];
                echo "<tr><td>";
                printf("%05d", $temp);
                echo "</td><td>";
                $temp = $values[$x][1];
                printf("%05d", $temp);
                echo "</td><td> ";
                echo $values[$x][2], "</td><td>", $values[$x][3], "</td><td> ", $values[$x][4], "</td><td> ", $values[$x][5], "</td><td> ", $values[$x][6], "</td><td> ", $values[$x][7];
                echo "</td></tr>";
            }
        }
        else{
            for($x = 0; $x < sizeof($values);$x++){
                if($userid == $values[$x][1]){
                    $temp = $values[$x][0];
                    echo "<tr><td>";
                    printf("%05d", $temp);
                    echo "</td><td>";
                    echo $values[$x][2], "</td><td>", $values[$x][3], "</td><td>", $values[$x][4], "</td><td>", $values[$x][5], "</td><td>", $values[$x][6], "</td><td> ", $values[$x][7];
                    echo "</td> </tr>";
                }
            }
        }
    }
    //prints the Locations
    //only admin
    function print_Locations(){
        $values = retrieve_data("Location");

        for($x = 0; $x < sizeof($values); $x++){
            $temp = $values[$x][0];
            echo "<tr><td>";
            printf("%05d", $temp);
            echo "</td><td>";
            echo $values[$x][1],"</td><td>",$values[$x][2],"</td><td>",$values[$x][3],"</td><td>",$values[$x][4];
            echo "</td></tr>";
        }
    }
    //prints the User list
    //only admin
    function print_Users(){
        $values = retrieve_data("User");
        for($x = 0; $x < sizeof($values); $x++){
            $temp = $values[$x][0];
            echo "<tr><td>";
            printf("%05d", $temp);
            echo "</td><td>", $values[$x][1],"</td><td>",$values[$x][2],"</td><td>",$values[$x][3];
            echo "</td></tr>";
        }
    }

    //work in progress
    //will take all values that were inputed
    //search for all those inputed parameters
    //
    function searchData($values){
        //$values might be an array

        if(empty($values)){
            //if empty then search all
            //else search based on those values;
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
        $quote1 = array(0001,0001,77004,"Houston","Texas","3/24/2023", 10,30.1);
        $quote2 = array(0002,0004,77004,"Houston","Texas","3/24/2023", 1,3.01);
        $quote3 = array(0003,0002,77004,"Houston","Texas","3/24/2023", 0,0);
        $quote4 = array(0004,0001,77004,"Houston","Texas","3/24/2023", 20,60.2);

        $location1 = array(77004,"Houston", "Texas", 3.01, 4);
        $location2 = array(77449,"Katy", "Texas", 2.89, 0);
        $location3 = array(77204,"Houston", "Texas", 3.01, 0);

        $user1 = array(10000,"Jduarte",77004, "Texas");
        $user2 = array(00121,"idk",77004, "Texas");
        $user3 = array(00041,"idk",77004, "Texas");
        $user4 = array(00301,"idk",77004, "Texas");

        $qvalues = array($quote1, $quote2, $quote3, $quote4);
        $lvalues = array($location1,$location2,$location3);
        $uvalues = array($user1,$user2,$user3,$user4);

        if($value == "Quote"){
            return $qvalues;
        }
        if($value == "Location"){
            return $lvalues;
        }
        if($value == "User"){
            return $uvalues;
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

        $userid = if_empty($userid, "User Id");
        if_digit($userid, "User Id");
        print_type($userid, "User Id");

        $username = if_empty($username, "Username");
        print_type($username, "Username");

        $userzip = if_empty($userzip, "User Zipcode");
        if_digit($userzip, "User Zipcode");
        print_type($userzip, "User Zipcode");

        $userst = if_empty($userst, "User State");
        print_type($userst, "User State");

        echo "<table>";
        print_Users();
        echo "</table>";
    }

    if($searchtype == "Location"){
        $zipcode = $_POST["zip"];
        $city = $_POST["city"];
        $price = $_POST["price"];
        $state = $_POST["state"];

        $zipcode = if_empty($zipcode, "Zipcode");
        if_digit($zipcode, "Zipcode");
        print_type($zipcode, "Zipcode");

        $city = if_empty($city, "City");
        print_type($city, "City");
        $price = if_empty($price, "Average Price");
        print_type($price, "Average Price");
        $state = if_empty($state, "State");
        print_type($state, "State");


        echo "<table>";
        print_Locations();
        echo "</table>";
        
    }

    if($searchtype == "Quote"){
        $zipcode = $_POST["zip"]; $city = $_POST["city"]; $state = $_POST["state"]; $quoteid = $_POST["quoteid"]; $date = $_POST["date"]; $totalgal = $_POST["gallons"]; $price = $_POST["price"];
        
        $userid = $_POST["userid"]; $userid = $_SESSION["current_id"];

        $zipcode = if_empty($zipcode, "Zipcode");
        if_digit($zipcode, "Zipcode");
        print_type($zipcode, "Zipcode");
        
        $city = if_empty($city, "City");
        print_type($city, "City");
        $state = if_empty($state, "State");
        print_type($state, "State");

        $quoteid = if_empty($quoteid, "Quote Id");
        if_digit($quoteid, "Quote Id");
        print_type($quoteid, "Quote Id");

        $date = if_empty($date, "Date");
        print_type($date, "Date");
        $totalgal = if_empty($totalgal, "Total Gallons");
        print_type($totalgal, "Total Gallons");
        $price = if_empty($price, "Average Price");
        print_type($price, "Average Price");

        echo "<table>";
        print_Quotes($userid, $admin);
        echo "</table>";
    }
    
?>