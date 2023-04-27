<?php
    include 'backend/AdminBackend.php';
    include 'navbar.php';

    //creates connection
    //sql statement is used to select all users
    $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");
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
            input{
                width:19%;
            }
            input[type=text]:focus,input[type=number]:focus  {
                background-color: lightblue;
            }
            input[type=date], input[type=submit]{
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
            select{
            	 height:30px;
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
            .SearchBar{
                 align-self: center;
                 border-collapse: collapse;
                 margin: 25px 0;
                 font-size: 15px;
                 color: black;
                 min-width: 400px;
                 box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
             }
        </style>
    </head>
    
    <body>
        <div class="SearchBar">
            <form method="post" action="AllQuotes.php">
                <h2>Search for Quote</h2>
                <input type="text" placeholder="Enter Quote Id" name="quoteid">
                <?php 
                    if($_SESSION['userstatus'] == 'admin'){
                        echo "<input type=\"text\" placeholder=\"Enter User Id\" name=\"userid\">";
                    }
                ?>
                <input type="date" name="date" placeholder="00/00/000">
                <br>
                <input type="text" style="width:74%;" placeholder="Enter Street" name="street">
                <br>
                <input type="text"  placeholder="Enter City" name="city">
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
                <label for="quantity"> Total Gallons: </label>
                <input type="number" id="quantity" name="totalGal" min="50" max="9999">
                <input type="hidden" name="search" value="inputs">
                <button type ="submit">Search</button>
            </form>
            <br>
    </div>

    <h1>Requested Quotes</h1>
        <table>
            <tr>
                <th>Quote Id</th>
                <?php
                if($_SESSION['userstatus'] == 'admin'){
                    echo "<th>User Id</th>";  
                }
                ?>
                <th>Gallons Requested</th>
                <th>Date of Request</th>
                <th>Stree</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Suggested Price</th>
                <th>Final Quote</th>

            </tr>
            <?php
                if(isset($_POST['search'])){
                    if($_POST['search']=="inputs"){
                        $quoteid = $_POST['quoteid']; $userid = $_POST['userid']; $totalGal = $_POST["totalGal"]; 
                        $street = $_POST['street']; $zip= $_POST["zip"]; $city = $_POST["city"]; $state = $_POST["state"]; $date = $_POST["date"];
                        //if not numbers then sets it to "".
                        $quoteid = if_digit($quoteid); $userid = if_digit($userid); $totalGal = if_digit($totalGal); $zip = if_zip($zip);
                        $searchquote="";$searchid="";$searchGal="";$searchDate="";$searchStreet="";$searchCity="";$searchSt="";$searchZip ="";
                        if(empty($quoteid)==true){ $quoteid = "No Value Given"; }else{ $searchquote  = "quoteId = $quoteid"; }
                        if(empty($userid)==true){ $userid = "No Value Given"; }else{ $searchid  = "userId = $userid"; }
                        if(empty($totalGal)==true){ $totalGal = "No Value Given"; }else{ $searchGal  = "galRequested = $totalGal"; }
                        if(empty($date)==true){ $date = "No Value Given"; }else{ $searchDate  = "dateRequested = $date"; }                        
                        if(empty($street)==true){ $street = "No Value Given"; }else{ $searchStreet  = "Street = '$street'"; }
                        if(empty($city)==true){ $city = "No Value Given"; }else{ $searchCity  = "City = '$city'"; }
                        if($state == 'sel_state'){ $state = "No Value Given"; }else{ $searchSt  = "State = '$state'"; }
                        if(empty($zip)==true){ $zip = "No Value Given"; }else{ $searchZip = "Zipcode = '$zip'"; }
                        
                        $sqlWHEREs = array( $searchquote,$searchid,$searchGal,$searchDate,$searchStreet,$searchCity,$searchSt,$searchZip);
                        $sqlWHEREs = combine_stmts($sqlWHEREs);
                        $sqlstmt = "SELECT * FROM Fuel_Quotes $sqlWHEREs";
                        $selectUsers = mysqli_query($connection, $sqlstmt);
                        while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
                            print_Quotes($row);
                        }

                        //echo "Search Params => ['quoteid','userid','totalGal','date','street','city','state','zip'] = ['$quoteid','$userid','$totalGal','$date','$street','$city','$state','$zip']";
                    }
                    else{
                        echo "<td>Please reload the page</td>";
                    }
                }
                else{
                    //from adminpage will print all
                    $sql = "SELECT * FROM Fuel_Quotes";
                    $selectUsers = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
                        print_Quotes($row);
                    }
                }
            ?>
        </table>
    </body>
</html>
