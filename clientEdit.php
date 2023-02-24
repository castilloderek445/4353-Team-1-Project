<?php
include_once 'navbar.php';
?>

<!DOCTYPE html>
<style>
    .clientBody {
        background-color: #4B5A6C;
    }

    .wrapper {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(3, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        width: 100vw;
        height: 100vh;
    }

    .clientMain {
        grid-area: 1 / 2 / 3 / 5;
        background-color: #4B5A6C;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
    }

    .notiTable {
        align-self: center;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 20px;
        font-family: Arial;
        color: white;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .notiTable thead tr {
        background-color: #FF9836;
        color: #ffffff;
        text-align: left;
    }

    .notiTable th {
        background-color: #FF9836;
        color: #ffffff;
        padding: 12px 15px;
    }

    .notiTable td {
        padding: 12px 15px;
        text-align: center;
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
        color: white;
    }

    option:not(:first-of-type) {
        color: black;
    }

    ::placeholder {
        color: white;
    }

    .clientButtons {
        grid-area: 3 / 3 / 4 / 4;
        background-color: #4B5A6C;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

    }

    .clientButton {
        align-items: center;
        background-color: #FF9836;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        color: white;
        cursor: pointer;
        display: flex;
        font-family: Arial;
        font-size: 16px;
        font-weight: 550;
        justify-content: space-around;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 30px;
        min-height: 3rem;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        transition: all 250ms;
        touch-action: manipulation;
        top: 25%;
        width: 50%;
    }

    .clientButton:hover,
    .clientButton:focus {
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        color: rgba(0, 0, 0, 0.65);
    }

    .clientButton:hover {
        transform: translateY(-1px);
    }

    .clientButton:active {
        background-color: #F0F0F1;
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
        color: rgba(0, 0, 0, 0.65);
        transform: translateY(0);
    }
</style>

<html>

<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="clientBody">
    <div class="wrapper">
        <div class="clientMain">
            <table class="notiTable">
                <tr>
                    <th><label for="name">Name: </label></th>
                    <td><input type="text" id="name" placeholder="New name..." /></td>
                </tr>
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
            </table>
        </div>
        <div class="clientButtons">
            <button class="clientButton" role="button" onclick="location.href = 'clientProfile.php'">Save Changes</button>
            <button class="clientButton" role="button" onclick="location.href = 'clientProfile.php'">Back to Profile</button>
        </div>
    </div>
</body>

</html>