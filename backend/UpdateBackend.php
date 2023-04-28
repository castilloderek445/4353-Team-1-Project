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
                $errorMsg[0] = 'Updated street';
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }
        if(empty($city) == false){
            $sqlName = $sql . "City='" . $city. "'" . " WHERE User_id=" . $_POST['current_id'];
            if ((strlen($city) > 40) || preg_match('~[0-9]+~', $city)) {
                $errorMsg[1] = 'Invalid city';
            }
            else{
                if (mysqli_query($connection, $sqlName)) {
                    $errorMsg[1] = 'Updated city';
                } 
                else {
                    echo "Error updating record: " . mysqli_error($connection);
                }
            }

        }
        if($state != 'sel_state'){
            $sqlName = $sql . "State='" . $state. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (mysqli_query($connection, $sqlName)) {
                $errorMsg[2] = 'Updated state';
            } 
            else {
                echo "Error updating record: " . mysqli_error($connection);
            }

        }
        else{
            $errorMsg[2] = 'State required';
        }
        if(empty($zip) == false){
            $sqlName = $sql . "Zip='" . $zip. "'" . " WHERE User_id=" . $_POST['current_id'];
            if (!preg_match('/^\d{5}$/', $zip)) {
                $errorMsg[3] = 'Invalid zip code';
            }
            else{
                if (mysqli_query($connection, $sqlName)) {
                    $errorMsg[3] = 'Updated zip code';
                } 
                else {
                    echo "Error updating record: " . mysqli_error($connection);
                }
            }

        }

        
    }
?>