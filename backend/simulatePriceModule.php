<?php
namespace App;

    function simulateCalcQuote($gals, $state){ 

        $quote = 0.00;
        $basePrice = 1.50; 
        $loyaltyDiscount = 0.01;
        $compProfitFactor = 0.10;

        //pre existing rows 
        $rowsPresent = 1;

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

        return $quote;

    }
  

?>