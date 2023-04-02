<?php
    require_once('backend/AdminBackend.php');
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Quote History</title>
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
            <form method="post" action="backend/AdminBackend.php">
                <h1> Search for: </h1>
                <input type="text" placeholder="Enter Quote Id" name="quoteid">
                <?php 
                    if($_SESSION['admin'] == true){
                        echo "<input type=\"text\" placeholder=\"Enter User Id\" name=\"userid\">";
                    }
                ?>
                <br>
                <label for="quantity"> Total Gallons: </label>
                <input type="number" id="quantity" name="totalGal" min="50" max="9999">
                <input type="date" name="date" value="00/00/0000">
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
                <input type="hidden" name="search" value="Quote">
                <input type ="submit" value="Search:">
            </form>
            <br>

    </div>

    <h1>Requested Quotes</h1>
        <table>
            <tr>
                <?php
                      echo "<th>Quote Id</th>";
                      if($_SESSION['admin'] == true){
                            echo "<th>User Id</th>";  
                      }
                      echo "<th>Gallons Requested</th>";
                      echo "<th>Date of Request</th>";
                      echo "<th>Stree</th>";
                      echo "<th>City</th>";
                      echo "<th>State</th>";
                      echo "<th>Zipcode</th>";
                      echo "<th>Suggested Price</th>";
                      echo "<th>Final Quote</th>";


                ?>

            </tr>
                <?php
                    print_Quotes("");
                ?>
        </table>
    </body>
</html>