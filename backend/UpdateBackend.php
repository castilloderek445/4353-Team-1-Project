<?php
    $user_id = $_POST['current_id'];
    $connection = mysqli_connect("team1db.cbublt8spaue.us-east-2.rds.amazonaws.com","team1master","\$123Fuelquote456", "sys");

    if(isset($_POST['Username']) && isset($_POST['Street']) && isset($_POST['City']) && isset($_POST['State']) && isset($_POST['Zip'])){
        $username = $_POST['Username']; $street = $_POST['Street']; $city = $_POST['City']; $state = $_POST['State'];$zip = $_POST['Zip'];
        $sql = "UPDATE user SET ";
        if(empty($username) == false){
            $sqlName = $sql . "Username='" . $username. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                //echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }
        if(empty($street) == false){
            $sqlName = $sql . "Street='" . $street. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                //echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }

        }
        if(empty($city) == false){
            $sqlName = $sql . "City='" . $city. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                //echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }

        }
        if($state != 'sel_state'){
            $sqlName = $sql . "State='" . $state. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                //echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }

        }
        if(empty($zip) == false){
            $sqlName = $sql . "Zip='" . $zip. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                //echo "Record updated successfully";
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }

        }

        
    }
?>