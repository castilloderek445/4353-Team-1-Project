<?php
    include_once 'navbar.php';    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style_login.css">
    </head>


    <div>
        <p class="title"><span><b>Log In</b></span></p>
    </div>

    <div class="login_content">
    <form action="backend/newLogin_backend.php" method="post">
                <table class="notiTable">
                    <tr>
                        <th><label for="email">Email</label></th>
                        <td><input type="text" placeholder="Enter Email" name="email" required></td>
                    </tr>
                    <tr>
                        <th><label for="email">Password</label></th>
                        <td><input type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                            name="pwd">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="clientButtons">
                <button type="submit" class="clientButton" name="submit">Log In</button>
                <!-- <p>If new client please select <a></a> <button type="button" class="Sign Up"><a href="NewClient.php">Sign Up</a></button> -->
            </div>
        </form>
    </div>



</html>