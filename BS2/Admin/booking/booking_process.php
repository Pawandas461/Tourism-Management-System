<?php
require('../include/connect.php');
if(isset($_GET['type']) && $_GET['type'] !=''){
    $b_id = $_GET['id'];
    if($_GET['type'] == 'approve'){
        $sql = "UPDATE `package_booking` SET `BOOKING_STATUS`= '1' WHERE `BOOK_ID` = '$b_id'";
        $res = mysqli_query($conn, $sql);
        header('location:booking.php');
        die();
    }
    if($_GET['type'] == 'cancel'){
        $sql = "UPDATE `package_booking` SET `BOOKING_STATUS`= '2' WHERE `BOOK_ID` = '$b_id'";
        $res = mysqli_query($conn, $sql);
        header('location:booking.php');
        die();
    }
}
?>