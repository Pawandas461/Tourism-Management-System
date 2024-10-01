<?php
include '../include/connect.php';

if (isset($_GET['PL_NAME'])) {
    $placeName = $_GET['PL_NAME'];

    // Query to fetch place details based on location ID
    $query = "SELECT * FROM `place` WHERE PL_NAME = '$placeName';";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $placeDetails = array(
            'placeLocation' => $row['PL_LOCATION'],
          'placeAddress' => $row['PL_ADDR']
        );
        echo json_encode($placeDetails);
    } else {
        echo json_encode(array('error' => 'No place found for the selected location.'));
    }
} else {
    echo json_encode(array('error' => 'Location ID not provided.'));
}

?>