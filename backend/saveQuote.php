<?php
include_once '../navbar.php';   
include_once '../connect.php';

if (isset($_POST["submit"])){ 

    //if logged in, can insert info into db
    if(isset($_SESSION["userid"])){

        $sql2 = "INSERT INTO Fuel_Quotes (userID, galRequested, dateRequested, street, city, state, zipcode, suggestedPrice, fuelQuote) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt2 = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt2, $sql2)){ //checks if this fails
            header("location: ../getQuoteResults.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt2, "iisssssdd", $_SESSION["userid"], $_SESSION['gals'], $_SESSION['delDate'], $_SESSION['street'], $_SESSION['city'], $_SESSION['state'], $_SESSION['zip'], $_SESSION['newestSuggPrice'], $_SESSION['newestQuote']);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        echo '<script>
        alert("Quote saved! Redirecting to quotes history.");
        window.location.href="../AllQuotes.php?Message=QuoteSaved!";
        </script>';
        //header("location: ../AllQuotes.php?Message=QuoteSaved!");

    }

    //if logged signed in, redirected to sign up/login
    else{
        echo '<script>
            alert("To save quote, sign up or log in if you are an existing user.");
            window.location.href="../newClient.php?";
            </script>';
        //header("location: ../newClient.php?Message=Si!");
    }

}
?>
