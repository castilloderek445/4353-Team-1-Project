<?php
    include_once 'navbar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard
        </title>
        <link rel="stylesheet" href="style.css">
        <style>
            .SideBar{
                height:500px;
                width:200px;
                background-color:#4B5A6C;
                position:fixed!important;
                margin-top:20px;
                margin-left: 100px;
                border: 1px solid black;
            }
            .NextToBar{
                height: 500px;
                background-color:rgb(98,125,166);
                margin-left: 400px;
                margin-right:100px;
                margin-top: 20px;
                border: 1px solid black;
            }
            .wrapper{
                border: 1px solid black;
                padding-bottom:20px;
            }
            .BarButton{
                height:65px;
                border:2px solid black;
                background-color: white;
                margin-top: 35px;
                margin-left: 20px;
                margin-right: 20px;
                text-align:center;
            }
            
        </style>
    </head>
    
    <body>
        <main class="wrapper">
            <div class="SideBar">
                <div class="BarButton">
                    <br>
                    <a href="AdminPage.php">Main Panel</a><br>
                </div>
                <div class="BarButton">
                    <br>
                    <a href="ViewUsers.php">Registered Users</a><br>
                </div>
                <div class="BarButton">
                    <br>
                    <a href="ViewLocations.php">Location Info</a><br>
                </div>
                <div class="BarButton">
                    <br>
                    <a href="AllQuotes.php">Logistics</a><br>
                </div>
            </div>
            
            <div class="NextToBar">

            </div>
        </div>
    </body>

</html>