<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['username']);
session_unset();
header('location:login.php');
die();
?>