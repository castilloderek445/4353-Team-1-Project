<?php

use function App\calcQuote;

class pricingModuleTest extends \PHPUnit\Framework\TestCase {
    public function testPricingModule(){
        
        $result = calcQuote(1500,"TX", "street", "city", "zip", "0000-00-00", "con");
        
        //php output needs commas and two placements after decimal
        $this->assertEquals('2,542.50', $result);
    }  
}
?>