<?php

namespace App;

class pricingModule{
    function calcQuote($gals, $state){ 

        // $clientHistoryCheck = "SELECT returningCust FROM client WHERE id='$cust_id'"
        // $query_run = something something idk yet

        //for now use hard coded value;
        $clientHistoryCheck = true;

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
        if($clientHistoryCheck==true){
            $loyaltyDiscount = 0.01;
        }
        else{
            $loyaltyDiscount = 0.0;
        }

        $profitMargin = $basePrice * ($locFactor - $loyaltyDiscount + $galsFactor + $compProfitFactor);

        //suggested price per gallon
        $suggPrice = $basePrice + $profitMargin;

        //total amt due
        $quote =  number_format(($gals*$suggPrice),2);

    
        //insert gals requested, location, suggested price per galon, quote in fuel quote history table in db

        return $quote;

    }
}


    

?>