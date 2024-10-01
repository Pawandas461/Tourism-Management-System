<?php
include '../include/connect.php';


if (isset($_GET['vehicleName'])) {
    $vehicle = $_GET['vehicleName'];

    $query1 = "SELECT * FROM `place` WHERE PL_NAME = '$vehicle';";
    $result1 = mysqli_query($conn, $query1);
    $placeRow = mysqli_fetch_assoc($result1);
    $location = $placeRow['PL_LOCATION'];

    // Query to fetch place details based on location ID
    $query = "SELECT * FROM `vehicle` WHERE CAR_LOCATION = '$location';";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $car = array(
            'seatNo' => $row['SEAT_NO'],
        );
        echo json_encode($car);
    } else {
        echo json_encode(array('error' => 'No place found for the selected location.'));
    }
} else {
    echo json_encode(array('error' => 'Location ID not provided.'));
}
?>
