<?php
    // if any of the fields are empty, throw error
    function emptySignupInput($gals, $street, $city, $state, $zip, $delDate){
        $flag; //idk why unset variables shows red squiggly line but it works
        if (empty($gals) || empty($street) || empty($city) || empty($state) ||  empty($zip) || empty($delDate)){
            $flag = true;

        }

        else{
            $flag = false;
        }
        return $flag;
    }

    //the html already won't let users put in negative numbers
    //max value FROM THE ARROWS IN THE TEXT BOX is 20000, but user can still enter a larger value, accounted for in this function
    function invalidGalsReq($gals){
        $flag;
        if($gals > 20000){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    //street name can't be > 80 characters
    function invalidStreet($street){
        $flag;
        if((strlen($street) > 80)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    //city name can't be > 40 characters or contain any numbers
    function invalidCity($city){
        $flag;
        if((strlen($city) > 40) || preg_match('~[0-9]+~', $city)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }

    // if zip is not proper format, throw error
    function invalidZip($zip){ 
        $flag;
        if(!preg_match("#[0-9]{5}#", $zip)){
            $flag = true;
        }
        else{
            $flag = false;
        }
        return $flag;
    }
?>