<?php
    include_once 'navbar.php';
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Get Quote</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class = "getQuote_content">
            <h1>Fuel Quote Form</h1>
            <h2>Complete the following form to receive your fuel quote.</h2>

            <div class = "Gals">
                <form name="gals-form">
                    <!-- Either use native HTML for input or some javascript for swaggy input validation-->
                        <label for="gals-req"> Gallons Requested: </label> 
                        <input type="number" name="gals req" placeholder="0 gals" min="1" max="20000">
                    </form>
            </div>
    
            <div class="Address">
                <form name = "addr-form">
                    <label for="gals-req"> Destination: </label> 
    
                    <!-- <label for="dest"> Destination: </label> -->
                    <input type="street" 
                            class="form-control_street" 
                            id="autocomplete" 
                            placeholder="Street">
                    
                    <input type="city" 
                            class="form-control_city" 
                            id="inputCity" 
                            placeholder="City">
    
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
                    
                    <input type="text" 
                            class="form-control_zip" 
                            id="inputZip" 
                            placeholder="9 digit zipcode no hyphen"
                            pattern="[0-9]*"
                            max="999999">
 
    
                </form>
            </div>
    
            <div class="date"> 
                <form name="date_form">
                    <label for="delivery_date">Delivery Date:</label>
    
                    <!--Find a way to set min to current day-->
                    <input type="date" id="start" name="date"
                        min="2000-01-01" max="2030-12-31">
                    <script src="getQuote.js"></script>
                </form>
    
            </div>
    
            <div class="prices">
                <form name="prices_form">
                    <label for="suggested_price">Suggested Price:</label>
                    <input type="text" placeholder="(suggested price from pricing module)" class ="getQuote_text_input" readonly="")>
                </form>
            </div>
    
            <div class="prices">
                <form name="prices_form">
                    <!-- gallons*suggested_price -->
                    <label for="amount_due">Amount Due:</label>
                    <input type="text" placeholder="(gallons*suggested_price)" class ="getQuote_text_input" readonly="")>
                </form>
            </div>
    
            <div class="getQuoteButton">
                <button type="button" class="getQuote" onclick="foo()">Get Quote</button> 
                <script src="getQuote.js"></script>
            </div>
        </div>


    </body>
</html>