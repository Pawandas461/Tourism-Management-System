<?php
include '../include/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $locationName = $_POST['RES_LOCATION'];


    $query1 = "SELECT * FROM `place` WHERE PL_NAME = '$locationName';";
    $result1 = mysqli_query($conn, $query1);
    $placeRow = mysqli_fetch_assoc($result1);
    $location = $placeRow['PL_LOCATION'];

    // Query to fetch available restaurants based on location name
    $query = "SELECT * FROM `restaurant` WHERE RES_LOCATION = '$location';";
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $hotels = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $restaurants[] = $row;
        }
        echo json_encode($restaurants);
    } else {
        echo json_encode(array('error' => 'No hotels found for the selected location.'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request.'));
}
?>