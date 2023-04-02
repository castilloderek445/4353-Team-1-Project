<?php
    $user_id = $_POST['current_id'];
    $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");
    $sql = "SELECT * FROM user WHERE User_id =" . $user_id;
    $selectUsers = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($selectUsers, MYSQLI_ASSOC); 

    if(isset($_POST['Username']) && isset($_POST['Street']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip'])){
        $username = $_POST['Username']; $street = $_POST['Street']; $city = $_POST['City']; $state = $_POST['State'];$zip = $_POST['Zip'];
        $sql_code = "UPDATE users SET Username = 'AdminAccount' WHERE User_id = " . $row['User_id'];
        
    }
?>