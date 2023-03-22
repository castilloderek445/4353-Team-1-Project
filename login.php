<?php
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
        <link rel="stylesheet" href="css/style_login.css">
    </head>

    <p class="title"><span><b>Log In</b></span></p>

    <div class="login_content">
        <form action="backend/newLogin_backend.php" method="post">
            <table class="notiTable">
                <tr>
                    <th><label for="email">Email:</label></th>
                    <td><input type="text" placeholder="Enter Email" name="email" required></td>
                </tr>
                <tr>
                    <th><label for="email" >Password:</label></th>
                    <td><input type="password"
                        class="form-control"
                        id="password"
                        name="pwd"
                        placeholder="Password"
                        required>
                    </td>
                </tr> 

            </table>
        </div>

        <div class="clientButtons">
            <button type="button" class="clientButton">Log In</button>
            <p>If new client please select</p> <a></a> <button type="button" class="Sign Up"><a href="NewClient.php">Sign Up</a></button>
        </div>
        </form>



</html>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect login information!</p>";
        }
    }

?>