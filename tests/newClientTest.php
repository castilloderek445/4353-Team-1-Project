<?php

use function App\invalidEmail;
use function App\emptySignupInput;
use function App\invalidUsername;
use function App\invalidZip;
use function App\pwdMatch;


class newClientTest extends \PHPUnit\Framework\TestCase {
    public function testnewEmail(){   
        include_once 'backend/newClient_functions.php';

        $result = invalidEmail("hellofellow@gmail.com");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  

    public function testEmptyInput(){   
        include_once 'backend/newClient_functions.php';

        $result = emptySignupInput("email","","","","","");
        
        //true means that the $flag DID get set off, i.e. empty inputs
        $this->assertEquals(true, $result);
    }  

    public function testUsername(){   
        include_once 'backend/newClient_functions.php';

        $result = invalidUsername("coconuts");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  

    public function testZip(){   
        include_once 'backend/newClient_functions.php';

        $result = invalidZip("77499449");
        
        //true means that the $flag DID get set off, i.e. wrong zip format
        $this->assertEquals(true, $result);
    }  

    public function testPwdMatch(){   
        include_once 'backend/newClient_functions.php';

        $result = pwdMatch("password123","Password321");
        
        //true means that the $flag DID get set off, i.e. pwds don't match
        $this->assertEquals(true, $result);
    }  
}
?>