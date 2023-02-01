<?php

include('includes/connection.php');




// Fetching Area data
$location_id = !empty($_POST['location_id']) ? $_POST['location_id'] : '';
if (!empty($location_id)) {

    $areaData = $connection->prepare("SELECT id, name from area WHERE location_id=?");
    $areaData->bind_param('i', $location_id);
    $areaData->execute();
    $result = $areaData->get_result();

    if ($result->num_rows > 0) {
        echo "<option value='0' selected>Select Area</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option><br>";
        }
    }
}


//Fetching Property Level Amenity Data
$amenity_id = !empty($_POST['amenity_id']) ? $_POST['amenity_id'] : '';
if (!empty($amenity_id)) {

    $query = "";
 

    $amenityListData = $connection->prepare("SELECT id, name from amenities_list WHERE amenity_id=?");
    $amenityListData->bind_param('i', $amenity_id);
    $amenityListData->execute();
    $result = $amenityListData->get_result();

    if ($result->num_rows > 0) {
        echo "<option value=''>Select Amenity List</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option><br>";
        }
    }
}


//Fetching Room Level Amenity Data
$room_amenity_id = !empty($_POST['room_amenity_id']) ? $_POST['room_amenity_id'] : '';
if (!empty($room_amenity_id)) {

    //  echo $query;
    // exit(0);
    $amenityListData = $connection->prepare("SELECT id, name from amenities_list WHERE amenity_id=?");
    $amenityListData->bind_param('i', $room_amenity_id);
    $amenityListData->execute();
    $result = $amenityListData->get_result();

    if ($result->num_rows > 0) {
        echo "<option value=''>Select Amenity List</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option><br>";
        }
    }
}







// Fetching city data
// $state_id = !empty($_POST['state_id']) ? $_POST['state_id'] : '';
// if (!empty($state_id)) {
//     $query = "SELECT id, name from cities WHERE state_id=?";
//     $countryData = $conn->prepare($query);
//     $countryData->bind_param('i', $state_id);
//     $countryData->execute();
//     $result = $query->get_result();

//     if ($result->num_rows > 0) {
//         echo "<option value=''>Select City</option>";
//         while ($arr = $result->fetch_assoc()) {
//             echo "<option value='" . $arr['id'] . "'>" . $arr['name'] . "</option><br>";
//         }
//     }
// }
