<?php
require('connect.php');
require('functions.inc.php');
$type = $_GET['type'];
// email_check();
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Login and Registration Form in HTML & CSS | CodingLab </title>
  <link rel="stylesheet" href="css/log_style.css">
  <!-- Fontawesome CDN Link -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container" style="height: 450px;">
    <div class="forms">
      <div class="form-content">
        <div class="login-form" style="width: 100%;">
          <div class="title">Please verify Email to login/signup</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email" class="email_input" name="email" placeholder="Enter your email" required>
                <input type="text" id="otp" class="otp_input" name="otp" placeholder="Enter OTP" required>
              </div>
              <span class="error_message"></span>
              <div class="button input-box">
                <input type="button" id="send_otp" class="send_btn" onclick="email_sent_otp()" value="Send OTP">
                <input type="button" id="verify_otp" class="verify_btn" value="Verify OTP">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/fontawesome.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script>
    function email_sent_otp() {
      var email = jQuery('#email').val();
      if (email != '') {
        jQuery('.send_btn').html('Please Wait..');
        jQuery('.send_btn').attr('disabled', true);
        jQuery.ajax({
          url: 'send_otp.php',
          type: 'post',
          data: 'email=' + email,
          success: function(result) {
            if (result == 'done') {
              jQuery('#email').attr('disabled', true);
              jQuery('#verify_otp').show();
              jQuery('#otp').show();
              jQuery('#send_otp').hide();
              jQuery('.error_message').text("");
              jQuery('.bi').hide();
            } else {
              jQuery('.error_message').text("Please Try after some time !");
            }
          }
        });
      } else {
        jQuery('.error_message').text("Please enter Your Email");
      }
    }

    function verify_otp() {
      var otp_new = jQuery('#otp').val();
      var email = jQuery('#email').val();
      if (otp_new != '') {
        jQuery.ajax({
          url: 'check_otp.php',
          type: 'post',
          data: 'otp=' + otp_new + '&email=' + email,
          success: function(result) {
            if (result == 'done') {
              window.location.href = 'login.php';
              // alert("Email Verified...!");
            } else {
              jQuery('.error_message').text("Please Try after some time !");
            }
          }
        });
      } else {
        jQuery('.error_message').text("Please enter valid OTP !");
      }
    }
    function verify_otp2() {
      var otp_new = jQuery('#otp').val();
      var email = jQuery('#email').val();
      if (otp_new != '') {
        jQuery.ajax({
          url: 'check_otp.php',
          type: 'post',
          data: 'otp=' + otp_new + '&email=' + email,
          success: function(result) {
            if (result == 'done') {
              window.location.href = 'signup.php';
              alert("Email Verified...!");
            } else {
              jQuery('.error_message').text("Please Try after some time !");
            }
          }
        });
      } else {
        jQuery('.error_message').text("Please enter valid OTP !");
      }
    }
    jQuery(document).ready(function() {
      var type = "<?php echo $type; ?>";
      jQuery('#verify_otp').click(function() {
        if(type=='login'){
          verify_otp();
        }else{
          verify_otp2();
        }
      });
    });
  </script>
  
</body>

</html>