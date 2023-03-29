<?php
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="css/style_signup.css">
    </head>

    <p class="title"><span><b>Sign Up</b></span></p>
    <p class="subtitle"><span>Please fill in the following information. All fields with* are required.</span></p>



    <div class="NewClient">
        <form action="backend/newClient_backend.php" method="post">
            <table class="notiTable">
                <tr>
                    <th><label for="email">Email*:</label></th>
                    <td><input type="text" placeholder="Enter Email" name="email" required></td>
                </tr>
                <tr>
                    <th><label for="email">Company Name*:</label></th>
                    <td><input type="text"
                        class="form-control"
                        id="password"
                        name="name"
                        placeholder="Password"
                        required>
                    </td>
                </tr>
                <tr>
                    <!-- note user will enter address (street, city) at the client info page -->
                    <th><label for="name">State*:</label></th>
                    <td>
                        <select name="state" required> State:
                            <option value="" selected>Select State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Zip*:</label></th>
                    <td><input type="text" id="zip" name="zipcode" placeholder="New zip..." required></td>
                </tr>
                <tr>
                    <th><label for="email" >Password*:</label></th>
                    <td><input type="password"
                        class="form-control"
                        id="password"
                        name="pwd"
                        placeholder="Password"
                        required>
                    </td>
                </tr>
                <tr>
                    <th><label for="email" >Repeat Password*:</label></th>
                    <td><input type="password"
                        class="form-control"
                        id="password"
                        name="pwdRepeat"
                        placeholder="Password"
                        required>
                    </td>
                </tr>              
            </table>
        </div>

        <div class="clientButtons">
                <button class="clientButton" type="submit" name="submit">Sign Up</button>
                <button class="clientButton">Cancel</button>
        </div>
        </form>



</html>