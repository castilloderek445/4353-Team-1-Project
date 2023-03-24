<?php

//gotta add namespace App in newLogin_functions.php
use function App\invalidEmail;
use function App\emptyLoginInput;

class loginTest extends \PHPUnit\Framework\TestCase {
    public function testnewEmail(){   
        include_once 'backend/newLogin_functions.php';

        $result = invalidEmail("hellofellow@gmail.com");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  

    public function testEmptyLoginInput(){   
        include_once 'backend/newLogin_functions.php';

        $result = emptyLoginInput("email","");
        
        //true means that the $flag DID get set off, i.e. empty inputs
        $this->assertEquals(true, $result);
    }  
}
?>