<?php
    include_once 'navbar.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>


        <div class="login_content">

        </div>
        <div class="login">
            <form name="login_form">
                    <h1>Log In</h1>
                    <div class="enter_email">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>
                    </div>

                    <div class="enter_pw">
                        <label for="email"><b>Password</b></label>
                        <input type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password">
                    </div>
            </form>
            <ul></ul>
            <div class="LoginButton">
                <button type="button" class="Login">Log In</button>
            </div>
            <p>If new client please select <a></a> <button type="button" class="Sign Up"><a href="NewClient.php">Sign Up</a></button>
        </div>



    </body>
</html>
