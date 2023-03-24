<?php

class pricingModuleTest extends \PHPUnit\Framework\TestCase {
    public function testPricingModule(){
        $calc = new App\pricingModule;
        
        $result = $calc->calcQuote(1500,"TX");
        
        //php output needs commas and two placements after decimal
        $this->assertEquals('2,542.50', $result);
    }  
}
?>