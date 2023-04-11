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
    function if_zip($given){
        if(!preg_match('/^\d{5}$/', $given)){ 
            $given = "";
            return $given;
        }
        else { return $given; }
    }
    
    //checks digit values: user id, quote id, zipcode
    //if its an int then it should be good
    function if_digit($given){
        if (ctype_digit($given)) {
            return $given;
        } else {
            $given = ""; return $given;
        }
    }

    function combine_stmts($array){
        $combined ="";
        for($x = 0; $x < sizeof($array); $x++){
            $temp = $array[$x];
            if(empty($temp) == false){
                if(empty($combined) == true){
                    $combined = "WHERE $temp";
                }else{ $combined = "$combined OR $temp";}
            }
        }
        return $combined;
    }

    //prints the Quotes
    //shared btw admin and user
    function print_Quotes($row){
        if (!empty($_SESSION['userid'])) {
            $id = $row['userId'];
            echo "<tr> <td>", $row['quoteId'], "</td>";
            if( $_SESSION['userstatus'] == 'admin'){
                echo "<td>", $row['userId'], "</td>";
            }
            echo "<td>", $row['galRequested'], "</td>";
            echo "<td>", $row['dateRequested'], "</td>";
            echo "<td>", $row['Street'], "</td>";
            echo "<td>", $row['City'], "</td>";
            echo "<td>", $row['State'], "</td>";
            echo "<td>", $row['Zipcode'], "</td>";
            echo "<td>", $row['suggestedPrice'], "</td>";
            echo "<td>", $row['fuelQuote'], "</td></tr>";
        }

    
    }
    //prints the User list
    //only admin
    function print_Users($row){
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
    
?>
