<?php
session_start();

require('include/connect.php');

// Check if username, password, and captcha are provided
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['captchaInput'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $enteredCaptcha = $_POST['captchaInput'];

    $sql = "SELECT * FROM `admin` WHERE a_username ='$username' && a_password = '$password';";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);


    // Check if username and password match database
    // Replace this with your database query
    if ($count > 0) {

        $row = mysqli_fetch_assoc($res);
        // Successful login
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_ID'] = $row['admin_id'];
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        // Invalid username or password
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: index.php');
        exit();
    }
} else {
    // Form fields not provided
    $_SESSION['error'] = 'Please fill out all fields.';
    header('Location: index.php');
    exit();
}
