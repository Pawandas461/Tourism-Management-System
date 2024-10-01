<?php
include '../include/connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM `hotel` WHERE H_ID= '$id'";
mysqli_query($conn,$sql);
header('location:hotel.php');
die();
?>