<?php
require('../include/connect.php');

if(isset($_POST['submit'])) {
    $car_id = $_POST['car_id'];
    $car_no = $_POST['car_no'];
    $car_name = $_POST['car_name'];
    $car_location = $_POST['car_location'];
    $seat_no = $_POST['seat_no'];
    $driver_contact = $_POST['driver_contact'];
    $driver_name = $_POST['driver_name'];
    $driver_age = $_POST['driver_age'];

    // Update query
    $sql = "UPDATE `vehicle` SET `CAR_NO`='$car_no', `CAR_NAME`='$car_name', `CAR_LOCATION`='$car_location', `SEAT_NO`='$seat_no', `DRIVER_CONTACT`='$driver_contact', `DRIVER_NAME`='$driver_name', `DRIVER_AGE`='$driver_age' WHERE `CAR_ID`='$car_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Redirect back to vehicle.php after successful update
        header("Location: vehicle.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
