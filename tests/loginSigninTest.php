<?php

use function App\invalidEmail;
use function App\emptySignupInput;
use function App\invalidUsername;
use function App\invalidZip;
use function App\pwdMatch;
use function App\emptyLoginInput;


class loginSigninTest extends \PHPUnit\Framework\TestCase {

    //the include_once call for unknown reasons I can't solve doesn't properly invoke on the first function
    //so this using dummy function to call it once 
    //so just ignore
    public function testDummy(){   
        include_once 'backend/client_functions.php';
        $result = " ";
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(" ", $result);
    }  
    public function testnewEmail(){   
        include_once 'backend/client_functions.php';

        $result = invalidEmail("hellofellow@gmail.com");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  

    public function testEmptyInput(){   
        include_once 'backend/client_functions.php';

        $result = emptySignupInput("email","name","state","zip","pwd","pwdrepeat");

        $this->assertEquals(false, $result);
    }  

    public function testUsername(){   
        include_once 'backend/client_functions.php';

        $result = invalidUsername("coconuts");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  

    public function testZip(){   
        include_once 'backend/client_functions.php';

        $result = invalidZip("77469");
        
        $this->assertEquals(false, $result);
    }  

    public function testPwdMatch(){   
        include_once 'backend/client_functions.php';

        $result = pwdMatch("password123","password123");
        
        $this->assertEquals(false, $result);
    }  

    public function testEmptyLoginInput(){   
        include_once 'backend/client_functions.php';

        $result = emptyLoginInput("email","pwd");
        
        $this->assertEquals(false, $result);
    }  

    public function testExistingEmail(){   
        include_once 'backend/client_functions.php';

        $result = invalidEmail("hellofellow@gmail.com");
        
        //false means that the $flag is didn't get set off to true, i.e. there's an error
        $this->assertEquals(false, $result);
    }  
}
?>