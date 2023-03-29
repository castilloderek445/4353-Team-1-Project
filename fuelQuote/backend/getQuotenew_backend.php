<?php   
    include_once '../connect.php';
    // user can only access this newClient_backend.php if they go thru the NewClient.php
    // so can only access the following if statement, if the user pressed the submit button
    if (isset($_POST["submit"])){ 
        //echo "It works";

        $gals = $_POST["galsReq"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $delDate = $_POST["delDate"];
        
        //require_once 'databasestuff.php';
        require_once 'getQuotenew_functions.php';
        require_once 'pricingModule.php';

        // a bunch of input validation

        if(emptySignupInput($gals, $street, $city, $state, $zip, $delDate) !== false){
            header("location: ../getQuotenew.php?error=emptyinput");
            exit();
        }

        if(invalidGalsReq($gals) !== false){
            header("location: ../getQuotenew.php?error=invalidGallonsRequested");
            exit();
        }

        if(invalidStreet($street) !== false){
            header("location: ../getQuotenew.php?error=invalidStreetName");
            exit();
        }

        if(invalidCity($city) !== false){
            header("location: ../getQuotenew.php?error=invalidCityName");
            exit();
        }

        if(invalidZip($zip) !== false){
            header("location: ../getQuotenew.php?error=invalidZip");
            exit();
        }

        //pricing module

        //header("location: ../getQuotenew.php?error=goodjob");
        $quote = calcQuote($gals, $state);
        echo $quote;
        //i guess since we're putting the quote in the db anyways, we can grab the quote value from the db instead of from here when we display it in the page
    }

    // if user tries to get to this page thru the address bar, it'll send them to NewClient.php
    else {
        header("location: getQuotenew.php"); 
    }
?>