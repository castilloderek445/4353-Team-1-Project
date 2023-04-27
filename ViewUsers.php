<?php
    require_once('backend/SearchBar.php');
    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Registered Users</title>
        <link rel="stylesheet" href="style.css">
        <style>
            table{
                background:grey;
                border-collapse:collapse;
                margin-left: auto;
                margin-right: auto;
                width: 75%;
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
            input{
                width:25%;
            }
            input[type=text]:focus,input[type=number]:focus,input[type=date]:focus{
                background-color: lightblue;
            }
            select{
            	 height:40px;
                 display: inline-block;
                 background: transparent;
                 border: 1px solid rgba(0, 0, 0, 0.1);
                 border-radius: .25rem;
                 box-sizing: border-box;
                 color: black;
            }
            button{
            	 height:40px;
                 width:15%;
                 display: inline-block;
                 background: transparent;
                 border: 1px solid rgba(0, 0, 0, 0.1);
                 border-radius: .25rem;
                 box-sizing: border-box;
                 color: black;
            }
            input[type=text],input[type=number]{
                 padding: 12px 20px;
                 margin: 8px 0;
                 display: inline-block;
                 background: transparent;
                 border: 1px solid rgba(0, 0, 0, 0.1);
                 border-radius: .25rem;
                 box-sizing: border-box;
                 color: black;
             }
             input[type=date]{
                 padding: 12px 20px;
                 margin: 8px 0;
                 display: inline-block;
                 background: transparent;
                 border: 1px solid rgba(0, 0, 0, 0.1);
                 border-radius: .25rem;
                 box-sizing: border-box;
                 color: black;
             }
             input[type=submit]{
            	 padding-left: 12px;
                 padding-bottom:12px;
                 padding-top:6px;
                 display: inline-block;
                 background: transparent;
                 border: 1px solid rgba(0, 0, 0, 0.1);
                 border-radius: .25rem;
                 box-sizing: border-box;
                 color: black;
            }
            .SearchBar{
                 align-self: center;
                 border-collapse: collapse;
                 margin: 25px 0;
                 padding-left: 10px;
                 font-size: 15px;
                 color: black;
                 min-width: 400px;
                 box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
             }
        </style>
    </head>
    
    <body>
        <div class="SearchBar">
            <form method="post" action="backend/SearchBar.php">
                <h1> Search for: </h1>
                <input type="text" placeholder="Enter User ID" name="id">
                <br>
                <input type="text" placeholder="Enter Username" name="username">
                <br>
                <input type="text" placeholder="Enter Zipcode" name="zipcode">
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
                <input type="hidden" name="search" value="User">
                <input type="submit" value="Search:">
            </form>


        </div>
        <br>
        <h1>Registered Users</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Total Purchases</th>
                <th>Address</th>
                <th>Zip Code</th>
            </tr>
            <?php
                print_Users();
            ?>
            
        </table>
    </body>
</html>
