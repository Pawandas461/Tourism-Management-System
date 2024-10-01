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
?>