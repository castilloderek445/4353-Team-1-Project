<?php

use App\pricingModule;

    include_once '../navbar.php';   
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

        $calcQuote = new pricingModule();

        $quote = $calcQuote->calcQuote($gals, $state, $street, $city, $zip, $delDate, $con);

        echo $quote;

    }

    // if user tries to get to this page thru the address bar, it'll send them to NewClient.php
    else {
        header("location: getQuotenew.php"); 
    }
?>