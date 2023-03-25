<?php
include_once '../navbar.php';
include '../connect.php';
?>

<!DOCTYPE html>
<style>
    .clientBody {
    background: url('image02.jpg') no-repeat center fixed;  
}

    h1 {
        text-align: center;
        font-family: Arial;
        color: white;
        padding-bottom: 5px;
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

    .address {
        font-family: Arial;
        color: white;
        font-size: 20px;
        font-weight: 550;
        display: block;
        text-align: center;
        padding-top: 5px;
        margin-left: auto;
        margin-right: auto;
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

    .mainContent {
        align-self: center;
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
    <title>Client Profile</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="clientBody">
    <div class="wrapper">
        <div class="clientMain">
            <div class="mainContent">
                <h1>Team 1</h1> <!-- Will display user's name -->
                <img src="texas.png" alt="State picture" width="250" height="250" class="center"> <!-- Will display picture of user's registered state -->
                <a class="address">4455 University Drive, Houston, TX 77204 </a>
            </div>

        </div>
        <div class="clientButtons">
            <button class="clientButton" role="button" onclick="location.href = 'clientNotifications.php'">Notifications</button>
            <button class="clientButton" role="button" onclick="location.href = 'clientEdit.php'">Edit Profile</button>
        </div>
    </div>
</body>

</html>