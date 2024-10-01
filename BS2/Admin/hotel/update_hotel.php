<?php
require('../include/connect.php');

if(isset($_POST['submit'])) {
    $hotel_id = $_POST['hotel_id'];
    $h_name = $_POST['h_name'];
    $h_location = $_POST['h_location'];
    $h_address = $_POST['h_address'];
    $h_contact = $_POST['h_contact'];
    $h_descr = $_POST['h_descr'];
    $total_rooms = $_POST['total_rooms'];
    $avl_rooms = $_POST['avl_rooms'];
    $room_rent = $_POST['room_rent'];

    // Update query
    $sql = "UPDATE `hotel` SET `H_NAME`='$h_name', `H_LOCATION`='$h_location', `H_ADDR`='$h_address', `H_CONTACT`='$h_contact', `H_DESCR`='$h_descr', `TOTAL_ROOMS`='$total_rooms', `AVL_ROOMS`='$avl_rooms', `ROOM_RENT`='$room_rent' WHERE `H_ID`='$hotel_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Redirect back to vehicle.php after successful update
        header("Location: hotel.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
