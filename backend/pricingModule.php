<?php
namespace App;
include_once '../navbar.php';

class pricingModule{
    function calcQuote($gals, $state, $street, $city, $zip, $delDate, $con){ 


        //COUNT query always returns 1 row 
        $sql = "SELECT COUNT(userId) AS num FROM Fuel_Quotes WHERE userId = ?;";

        //prepared statement
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../getQuote.php?error=stmtfailed");
            exit();
        }

        //args: prepared statement, type of data being submitted, data being submitted
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['userid']);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt); //get result
        $row = mysqli_fetch_assoc($result); //put result into associative array
        $rowsPresent = $row['num']; //store the number of rows present 

        $quote = 0.00;
        $basePrice = 1.50; 
        $loyaltyDiscount = 0.01;
        $compProfitFactor = 0.10;

        //1000+ gallons requested = 2% factor
        if ($gals > 1000){
            $galsFactor = 0.02;
        }
        else{
            $galsFactor = 0.03;
        }

        //instate factor = 2%, out of state factor = 4%
        if ($state != "TX"){
            $locFactor = 0.04;
        }
        else{
            $locFactor = 0.02;
        }

        //replace history check with a query fuel quote table to check if there are any rows for client
        if($rowsPresent >= 1){
            $loyaltyDiscount = 0.01;
            $blob = "there are rows, discount applied";
        }
        else{
            $loyaltyDiscount = 0.0;
            $blob = "there are no rows, no discount applied";
        }

        $profitMargin = $basePrice * ($locFactor - $loyaltyDiscount + $galsFactor + $compProfitFactor);

        //suggested price per gallon
        $suggPrice = $basePrice + $profitMargin;

        //total amt due
        $quote =  number_format(($gals*$suggPrice), 2, '.', '');

        $answer = $suggPrice . " " . $quote . " " . $blob . " " . gettype($gals) . " " . $delDate;

        $_SESSION['newestSuggPrice'] = $suggPrice;
        $_SESSION['newestQuote'] = $quote;

        //if signed in, insert into db
        if(isset($_SESSION["userid"])){
            $sql2 = "INSERT INTO Fuel_Quotes (userID, galRequested, dateRequested, street, city, state, zipcode, suggestedPrice, fuelQuote) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt2 = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt2, $sql2)){ //checks if this fails
                header("location: ../NewClient.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt2, "iisssssdd", $_SESSION["userid"], $gals, $delDate, $street, $city, $state, $zip, $suggPrice, $quote);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt);

            return $answer;
        }
        else{
            return $answer;
        }

    }
}


    

?>