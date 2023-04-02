<?php

//simulating uid session key checks in navbar.php
class loginStatusTest extends \PHPUnit\Framework\TestCase {
    public function testDisplayLogin(){
        $uidClient="";

        $this->assertEquals("", $uidClient);
        echo "uid: " . $uidClient . "\n";

        if (!empty($uidClient)) {
            //If user is logged in, the option to log out will display
            $result = "logged in, navbar is showing log out \n";
            echo $result;
        } else {
            $result = "not logged in, navbar is showing logout \n";
            echo $result;
        }

    }

    public function testCheckAdmin(){
        $uidClient = "1";
        $userStatus="client";

        $this->assertEquals("client", $userStatus);
        echo "user status: " . $userStatus . "\n";

        if (!empty($uidClient)) {
            if ($userStatus = "admin") {
                $result = "logged in as admin, navbar is showing adminPage \n";
                echo $result;
            } else {
                $result = "logged in as regular client, navbar is showing clientProfile \n";
                echo $result;
            }
        } else {
            $result = "not logged in, navbar is showing sign up \n";
            echo $result;
        }
    }
}
?>