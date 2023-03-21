<?php
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>All Quotes Table</title>
        <link rel="stylesheet" href="style.css">
        <style>
            table{
                border-collapse:collapse;
                margin-left:40px;
            }

            td, th{
                text-align:left;
                padding:8px;
            }
            tr:nth-child{
                background-color:#f2f2f2;
            }
            th{
                background-color:#4B5A6C;
                color: white;
            }
        </style>
    </head>
    
    <body>
    <div class="SearchBar">
            <form method="post" action="SearchBar.php">
                <h1> Search for: </h1>
                <input type="text" placeholder="Enter Zipcode" name="zip">
                <input type="text" placeholder="Enter City" name="city">
                <br>
                <input type="text" placeholder="Enter User Id" name="user">
                <input type="text" placeholder="Enter Order Id" name="order">
                <br>
                <input type="date" name="date" value="2023-02-23">
                <br>
                <caption> Total Gallons: </caption>
                <input type="range" name="gallons" min="1" max="50">
                <br>
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
                <br>
                <input type="hidden" name="search" value="Quote">
                <input type ="submit" value="Search:">
            </form>
            <br>

    </div>

    <h1>Requested Quotes</h1>
        <table>
            <tr>
                <th>Date</th>
                <th>Order Id</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>User Id</th>
                <th>Total Gallons</th>
                <th>Estimated Price</th>
            </tr>
            <tr>
                <td>2/23/2023</td>
                <td>0000</td>
                <td>4401 Cougar Village dr.</td>
                <td>77004</td>
                <td>0000</td>
                <td>10</td>
                <td>30.1</td>
            </tr>
        </table>
    </body>
</html>