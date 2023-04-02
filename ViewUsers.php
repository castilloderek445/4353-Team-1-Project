<?php
    require_once('backend/AdminBackend.php');
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Registered Users</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .title {
                padding-top: 10px;
                text-align: center;
                color: black;
                font-size: 32pt;
            }

            .SearchBar{
                align-self: center;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 15px;
                color: black;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                background-color: orange;
            }

            body {
                background: url('image02.jpg') no-repeat center fixed;  
            }

            input[type=text],
            select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                background: transparent;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: black;
            }
            
            table, th, td {
                border: 1px solid;
                background-color: lightgoldenrodyellow;
            }
                
        </style>

        <div>
            <p class="title"><span><b>View Registered Users</b></span></p>
        </div>
    </head>
    
    <body>
        <div class="SearchBar">
            <form method="post" action="backend/AdminBackend.php">
                <h1> Search for: </h1>
                <input type="text" placeholder="Enter User ID" name="id">
                <input type="text" placeholder="Enter Username" name="username">
                <br>
                <input type="text" placeholder="Enter Company" name="company">
                <input type="text" placeholder="Enter Email" name="email">
                <br>
                <input type="text" placeholder="Enter Street" name="street">
                <input type="text" placeholder="Enter City" name="city">
                <select name="state"> State: 
                    <option value="sel_state" selected>Select State</option>
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
                <input type="text" placeholder="Enter Zipcode" name="zip">
                <br>
                <input type="hidden" name="search" value="user">
                <input type="submit" value="Search:">
            </form>


        </div>
        <br>
        <h1>Registered Users</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Company</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Date of Registration</th>
            </tr>
            <?php
                print_Users("");
            ?>
        </table>
    </body>
</html>