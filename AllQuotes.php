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
                background:grey;
                border-collapse:collapse;
                width: 75%;
            }
            td, th{
                padding:8px;
            }
            td{
                background:#8797ab;
            }
            th{
                background:#FF9836;
            }
            tr:hover{
                background-color: #ffbd80;
            }
            tr:hover td { background: transparent; }
            input{
                width:25%;
                background: #FF9836;
                color:white;
            }
            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
            opacity: 1; /* Firefox */
            }
            input[type=text]:focus,input[type=number]:focus,input[type=date]:focus{
                background-color: lightblue;
            }
            select{
                height:40px;
                display: inline-block;
                color:white;
                background: #FF9836;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
            }
            select option {
            color: black;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
            }
            button{
                height:40px;
                width:15%;
                display: inline-block;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: black;
            }
            input[type=text],input[type=number]{
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;

                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: white;
            }
             input[type=date]{
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: white;
             }
             input[type=submit]{
                padding-left: 12px;
                padding-bottom:12px;
                padding-top:6px;
                display: inline-block;

                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: white;
            }
            .center{
                margin-left: auto;
                margin-right: auto;
            }
            .SearchBar{
                align-self: center;
                border-collapse: collapse;
                margin: 25px 0;
                padding-left: 10px;
                font-size: 15px;
                color: white;
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

        <table class="center">
            <tr>
            <?php
                if($_SESSION['userstatus'] == 'admin'){
                    echo "<th colspan='10'>All User Quotes</th>";  
                }
                else if($_SESSION['userstatus'] != 'admin'){
                    echo "<th colspan='9'>Quote History</th>";
                }
            ?>
            </tr>
            <tr>
                <th>Quote Id</th>
                <?php
                if($_SESSION['userstatus'] == 'admin'){
                    echo "<th>User Id</th>";  
                }
                ?>
                <th>Gallons Requested</th>
                <th>Date of Request</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Suggested Price</th>
                <th>Final Quote</th>

            </tr>
            <?php

                /*************************************************************************
                How this works.

                When user gets to this page, there are three possible ways they can see this page

                Guest: Will see nothing as the guest has no power to see their quote history
                User: Will not see the 'userid' attribute.
                Admin: Will see data instance within the db.

                Now how the search works.

                Can search through these attributes of the Quotes database: Quoteid, Userid, Date, Street, City, State, Zipcode, TotalGal.
                The search works by using the inputs from the form to piece together strings into a SELECT string that will be sent into the db.

                Thus there is no client-side search function, this is all php/backend.


                Then once the data instances are recieved from the db, they are sent to print_Quotes() to be processed.
                This process is simple as it will only check the user's id to see what needs to be shown.
                If guest presses search -> nothing will appear
                If user searches -> rows returned from db select will be checked to see if they match the user to be shown
                Admin searches -> print all rows returned from the db select
                *************************************************************************/



                if(isset($_POST['search'])){
                    if($_POST['search']=="inputs"){
                        $quoteid = $_POST['quoteid']; if(isset($_POST['userid'])){$userid = $_POST['userid'];}else{$userid="";} $totalGal = $_POST["totalGal"]; 
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