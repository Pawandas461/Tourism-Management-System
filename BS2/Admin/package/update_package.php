<?php
require('../include/connect.php');

if (isset($_POST['submit'])) {
    // Retrieve data from the form
    $id = $_POST['package_id'];
    $pl_name = $_POST['pl_name'];
    $pl_location = $_POST['pl_location'];
    $pl_address = $_POST['pl_address'];
    $p_name = $_POST['p_name'];
    $p_cost = $_POST['p_cost'];
    $duration = $_POST['duration'];
    $total_seat = $_POST['total_seat'];
    $avl_seat = $_POST['avl_seat'];
    // $p_details = $_POST['p_details'];
    // $vehicle = $_POST['vehicle'];
    // $hotel = $_POST['hotel'];
    $restaurant = $_POST['restaurant'];
    $p_type = $_POST['p_type'];
    $guid = $_POST['guid'];
    $p_date = $_POST['p_date'];
    
    // Handle image upload
    $pl_image = $_FILES['pl_image']['name'];
    if ($pl_image) {
        $target_dir = '../image/packages/';
        $target_file = $target_dir . basename($pl_image);
        move_uploaded_file($_FILES['pl_image']['tmp_name'], $target_file);
    } else {
        // If no new image is uploaded, retain the old image
        $sql_image = "SELECT `PL_IMAGE` FROM `co_package` WHERE `CP_ID`='$id'";
        $result_image = mysqli_query($conn, $sql_image);
        $row_image = mysqli_fetch_assoc($result_image);
        $pl_image = $row_image['PL_IMAGE'];
    }

    // Update the package in the database
    $sql = "UPDATE `co_package` SET 
            `PL_NAME`='$pl_name', 
            `PL_LOCATION`='$pl_location', 
            `PL_ADDRESS`='$pl_address', 
            `P_NAME`='$p_name', 
            `P_COST`='$p_cost', 
            `DURATION`='$duration', 
            `TOTAL_SEAT`='$total_seat', 
            `AVL_SEAT`='$avl_seat', 
            `RESTAURANT`='$restaurant', 
            `P_TYPE`='$p_type', 
            `TOUR_GUID_NAME`='$guid', 
            `PL_IMAGE`='$pl_image', 
            `P_DATE`='$p_date' 
            WHERE `CP_ID`='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: package.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
