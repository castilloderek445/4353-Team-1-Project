<?php
include_once 'navbar.php';
?>

<!DOCTYPE html>
<style>
    h1 {
        text-align: center;
        font-family: Arial;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
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

    .clientInfo {
        grid-area: 1 / 1 / 2 / 2;
        background-color: #4B5A6C;
        border: 1px solid black;
    }

    .clientButtons {
        grid-area: 2 / 1 / 4 / 2;
        background-color: #4B5A6C;
        border: 1px solid black;

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
    
    .mainContent {
        grid-area: 1 / 2 / 4 / 6;
        background-color: #4B5A6C;
        border: 1px solid black;

    }

    .card {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        background-color: #FF9836;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 75%;
        margin: auto;
        position: relative;
        top:50%;
    }

    .cardTitle {
        font-family: Arial;
        color:white;
        font-size: 30px;
        font-weight: 550;
    }

    .cardContent {
        font-family: Arial;
        color:black;
        font-size: 30px;
        font-weight: 550;
    }
</style>

<html>
    
<head>
    <meta charset="utf-8">
    <title>Client Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="clientInfo">
            <h1>Team 1</h1> <!-- Will display user's name -->
            <img src="texas.png" alt="State picture" width="250" height="250" class="center"> <!-- Will display picture of user's registered state -->
        </div>
        <div class="clientButtons">
            <button class="clientButton" role="button" onclick="location.href = 'clientProfile.php'">Back to Profile</button>
            <button class="clientButton" role="button" onclick="location.href = 'clientLocation.php'">Location Info</button>
            <button class="clientButton" role="button" onclick="location.href = 'clientMessages.php'">Notifications</button>
            <button class="clientButton" role="button" onclick="location.href = 'clientEdit.php'">Edit Profile</button>
        </div>
        <div class="mainContent"> <!-- Summary of user info -->
            <div class="card">
                <a class="cardTitle">Address: </a>
                <a class="cardContent">4455 University Drive, Houston, TX 77204 </a>
                <br>
                <a class="cardTitle">Quotes Requested: </a>
                <a class="cardContent">0</a>
            </div>
        </div>
    </div>
</body>

</html>