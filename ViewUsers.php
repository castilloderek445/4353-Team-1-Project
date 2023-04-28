<?php
    include 'backend/AdminBackend.php';
    include_once 'navbar.php';

    //creates connection
    //sql statement is used to select all users
    $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");

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
             .butA{
                height:40px;
                width:15%;
                display: inline-block;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: .25rem;
                box-sizing: border-box;
                color: black;
             }
        </style>
    </head>
    
    <body>
        <div class="SearchBar">
            <form method="post" action="ViewUsers.php">
                <h1> Search for: </h1>
                <input type="text" placeholder="Enter User ID" name="userid">
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
                <input type="hidden" name="search" value="inputs">
                <button class="butA" type ="submit">Search</button>
            </form>


        </div>
        <br>
        <table class="center">
            <tr>
                <th colspan=10>Registered Users</th>
            </tr>
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
                <th>Edit Client info</th>
            </tr>
            <?php
                if(isset($_POST['search'])){
                    if($_POST['search']=="inputs"){
                        $userid = $_POST['userid']; $company = $_POST['company']; $email = $_POST['email'];  $street = $_POST['street']; $zip= $_POST["zip"]; $city = $_POST["city"]; $state = $_POST["state"];
                        //if not numbers then sets it to "".
                        $userid = if_digit($userid); $zip = if_zip($zip);
                        $searchid = ""; $searchname = ""; $searchcompany = ""; $searchemail = ""; $searchStreet = ""; $searchCity = ""; $searchSt = ""; $searchZip = "";
                        if(empty($userid)==true){ $userid = "No Value Given"; }else{ $searchid  = "User_id = $userid"; }
                        if(empty($company)==true){ $company = "No Value Given"; }else{ $searchcompany  = "Company = '$company'"; }
                        if(empty($email)==true){ $email = "No Value Given"; }else{ $searchemail  = "Email = '$email'"; }
                        if(empty($street)==true){ $street = "No Value Given"; }else{ $searchStreet  = "Street = '$street'"; }
                        if(empty($city)==true){ $city = "No Value Given"; }else{ $searchCity  = "City = '$city'"; }
                        if($state == 'sel_state'){ $state = "No Value Given"; }else{ $searchSt  = "State = '$state'"; }
                        if(empty($zip)==true){ $zip = "No Value Given"; }else{ $searchZip = "Zipcode = '$zip'"; }
                        $sqlWHEREs = array($searchid, $searchcompany, $searchemail, $searchStreet, $searchCity, $searchSt, $searchZip);
                        $sqlWHEREs = combine_stmts($sqlWHEREs);

                        $sqlstmt = "SELECT * FROM user $sqlWHEREs";
                        //echo $sqlstmt;
                        $selectUsers = mysqli_query($connection, $sqlstmt);
                        while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
                            print_Users($row);
                        }

                        //echo "Search Params => ['userid','company','email','street','city','state','zip'] = ['$userid','$company','$email','$street','$city','$state','$zip']";
                    }
                    else{
                        echo "<td align='>Please reload the page</td>";
                    }
                }
                else{
                    //from adminpage will print all
                    $sql = "SELECT * FROM user";
                    $selectUsers = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC)){
                        print_Users($row);
                    }
                }
            ?>
        </table>
    </body>
</html>