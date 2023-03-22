<!-- php
    session_start();
    ?> -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li class="first"><a>COSC 4353 Team 1 Project</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="getQuotenew.php">Get Quote</a></li>
                <li><a href="AllQuotes.php">Quote History</a></li>
                <!-- php
                    if($_SESSION["userUid"])){
                        echo "<li><a href="clientProfile.php">Profile</a></li> ";
                        echo "<li><a href="login.php">Log In</a></li> ";
                    }
                    else{
                        echo "<li><a href="NewClient.php">Sign Up</a></li> ";
                        echo "<li><a href="login.php">Log In</a></li> ";
                    }
                    }
                ?> -->
                <li><a href="login.php">Log In</a></li> 
                <!-- this will switch from log in/logout depending on the session -->
                
            </ul>
        </nav>
    </body>
</html>