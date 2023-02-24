<?php
    include_once 'navbar.php';
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Get Quote NEW</title>
        <link rel="stylesheet" href="style_quote.css">
    </head>

    <p class="title"><span><b>Fuel Quote Form</b></span></p>
    <p class="subtitle"><span>Complete the following form to receive your fuel quote.</span></p>

    <div class="clientMain">
            <table class="notiTable">
                <tr>
                    <th><label for="name">Gallons Requested: </label></th>
                    <td><input type="number" name="gals req" placeholder="0 gals" min="1" max="20000"></td>
                <tr>
                    <th><label for="name">Street: </label></th>
                    <td><input type="text" id="street" placeholder="New street..." /></td>
                </tr>
                <tr>
                    <th><label for="name">City: </label></th>
                    <td><input type="text" id="city" placeholder="New city..." /></td>
                </tr>
                <tr>
                    <th><label for="name">State: </label></th>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Zip: </label></th>
                    <td><input type="text" id="zip" placeholder="New zip..." /></td>
                </tr>

                <tr>
                    <th><label for="delivery_date">Delivery Date:</label></th>
                    <td>
                        <input type="date" id="start" name="date"
                            min="2000-01-01" max="2030-12-31">
                        <script src="getQuote.js"></script>
                    </td>
                </tr>

                <tr>
                    <th><label for="suggested_price">Suggested Price:</label></th>
                    <td>
                        <input type="text" placeholder="(suggested price from pricing module)" class ="getQuote_text_input" readonly="")>
                    </td>
                </tr>

                <tr>
                    <th><label for="amount_due">Amount Due:</label></th>
                    <td><input type="text" placeholder="(gallons*suggested_price)" class ="getQuote_text_input" readonly="")></td>
                </tr>
            </table>
        </div>

        <div class="clientButtons">
            <button class="clientButton" role="button" >Generate Quote</button>
        </div>
    </div>
</html>
