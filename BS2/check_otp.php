<?php
require('connect.php');
require('functions.inc.php');
$otp = get_safe_value($conn, $_POST['otp']);
$email = get_safe_value($conn, $_POST['email']);

if ($otp == $_SESSION['EMAIL_OTP']) {
    $_SESSION['verified'] = "Checked";
    $_SESSION['EMAIL2'] = $email;
    echo "done";
} else {
    echo "No";
}
