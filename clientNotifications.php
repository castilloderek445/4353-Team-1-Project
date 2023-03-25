<?php
include_once '../navbar.php';
include '../connect.php';
?>

<!DOCTYPE html>
<style>
    
    .clientBody {
    background: url('image02.jpg') no-repeat center fixed;  
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

    .notiTable th,
    td {
        padding: 12px 15px;
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
        top: 50%;
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
    <title>Client Notifications</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="clientBody">
    <div class="wrapper">
        <div class="clientMain">
            <table class="notiTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>System</td>
                        <td>February 23, 2023</td>
                        <td>Hello! This is a test message.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clientButtons">
            <button class="clientButton" role="button" onclick="location.href = 'clientProfile.php'">Back to Profile</button>
        </div>
    </div>
</body>

</html>
