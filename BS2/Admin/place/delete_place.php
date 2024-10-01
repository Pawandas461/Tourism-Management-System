<?php
include '../include/connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM `place` WHERE PL_ID='$id'";
mysqli_query($conn,$sql);
header('location:place.php');
die();
?>