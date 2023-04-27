<?php

use function App\simulateCalcQuote;

class pricingModuleTest extends \PHPUnit\Framework\TestCase {
    public function testModule(){
        include_once 'backend/simulatePriceModule.php';
        $result = simulateCalcQuote(1500,"TX");
        
        //php output needs commas and two placements after decimal
        $this->assertEquals('2542.50', $result);
    }  
}
// composer update
// ./vendor/bin/phpunit --testdox
?>