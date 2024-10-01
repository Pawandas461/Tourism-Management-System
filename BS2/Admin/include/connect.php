<?php
session_start();
$server = 'localhost';
$username = "root";
$password = "";
$db ='bs';

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
}
else{
    echo "Failed connection".mysqli_connect_error() ;
}

// Check if admin is not logged in, redirect to login page
if(!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

?>