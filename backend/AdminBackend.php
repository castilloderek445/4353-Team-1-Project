<?php
    include 'Validations.php';
    //takes a hidden input that determines the type of search

    $searchtype;
    if(!empty($_POST["search"])){
        $searchtype = $_POST["search"];
    }
    else{
        $searchtype = "";
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
            return $given;
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

    function swticher($given){
        if($given){
            $given = false;
        }
        else{
            $given = true;
        }
        return $given;
    }

    //checks the row data to the search values
    //if any are wrong then it will return false
    //if not then will print
    function retrieve_data($values, $match, $type){
        $boolFalse = true;
        //so for front pages the values will be emptyz
        if(empty($values) == true){
            return true;
        }

        for($x = 0; $x < sizeof($values); $x++){
            $temp = $values[$x];
            if(!empty($temp)){
                if($temp == $match[$x]){
                    switcher($given);
                    return true;
                }
            }
        }
    }

    //prints the Quotes
    //shared btw admin and user
    function print_Quotes($values){
        $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");
        $sql = "SELECT * FROM Fuel_Quotes";
        $selectUsers = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
            $userid = $row['userId'];
            if($userid == $_SESSION['current_id'] || $_SESSION['admin'] == true){
                echo "<tr> <td>", $row['quoteId'], "</td>";
                if($_SESSION['admin'] == true){
                    echo "<td>", $row['userId'], "</td>";
                }
                echo "<td>", $row['galRequested'], "</td>";
                echo "<td>", $row['dateRequested'], "</td>";
                echo "<td>", $row['street'], "</td>";
                echo "<td>", $row['city'], "</td>";
                echo "<td>", $row['state'], "</td>";
                echo "<td>", $row['zipcode'], "</td>";
                echo "<td>", $row['suggestedPrice'], "</td>";
                echo "<td>", $row['fuelQuote'], "</td>";
                echo "<td><button >Edit Quote Info</button></td></tr>";
            }
        }
        
    }
    //prints the User list
    //only admin
    function print_Users($values){
        $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");
        $sql = "SELECT * FROM user";
        $selectUsers = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
            if(retrieve_data($values, $row, "user") == true){
                echo "<tr> <td>", $row['User_id'], "</td>";
                echo "<td>", $row['Username'], "</td>";
                echo "<td>", $row['Company'], "</td>";
                echo "<td>", $row['Email'], "</td>";
                echo "<td>", $row['Street'], "</td>";
                echo "<td>", $row['City'], "</td>";
                echo "<td>", $row['State'], "</td>";
                echo "<td>", $row['Zip'], "</td>";
                echo "<td>", $row['Date_Created'], "</td>";
                $newarray = $row['User_id'];
                echo "<td><form method='post' action='AdminEditClient.php'><input type=submit value='Edit Client Info'><input type='hidden'name='current_id' value='$newarray'></form></td></tr>";
            }
            else{
                echo "retrieve_data was false";
            }
        }
    }

    
//can do an if for any type of search we need
//just have to pass a hidden value with the search type
//then insert your values you need
    if($searchtype == "user"){
        $userid;
        $username = $_POST["username"]; $company = $_POST['company']; $email = $_POST['email'];
        $street = $_POST['street']; $city = $_POST['city']; $state = $_POST["state"]; $zipcode = $_POST["zip"];

        //lines 93-106 are for simple checking of user inputs.
        //if_empty returns default or the same value -> 
        //if_digit checks the string to see if its string of ints
        //addressChecker checks if the full address is inputed
        $username = if_empty($username, "Username");
        if($_SESSION['admin'] == true){
            $userid = $_POST["id"]; 
            $userid = if_empty($userid, "User Id");
            if_digit($userid, "User Id");

        }
        $company = if_empty($company, "Company");
        $email = if_empty($email, "Email");
        $street = if_empty($street, "Street");
        $city = if_empty($city, "City");
        $state = if_empty($state, "State");
        $zipcode = if_empty($zipcode, "Zipcode");
        if_digit($zipcode, "Zipcode");

        $default = "No Value Given";
        if($street == $default||$city == $default||$state == $default||$zipcode == $default){
            $street = $default; $city = $default; $state = $default; $zipcode = $default;
            echo "<script>alert(\"Full address not inputed!!!\")</script>";
        }

        $searchParams = array($userid, $username, $company, $email, $street, $city, $state, $zipcode);


        echo "<table>";
        print_Users($searchParams);
        echo "</table>";
    }

    if($searchtype == "Quote"){
        $zipcode = $_POST["zip"]; $city = $_POST["city"]; $state = $_POST["state"]; $quoteid = $_POST["quoteid"]; $date = $_POST["date"]; $totalgal = $_POST["gallons"]; $price = $_POST["price"];
        
        $userid = $_POST["userid"];

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