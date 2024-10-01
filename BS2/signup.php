<?php
require('connect.php');
require('functions.inc.php');
if (!isset($_SESSION['verified'])) {
?>
  <script>
    var type = 'signup';
    window.location.href = 'email_verify.php?type=' + encodeURIComponent(type);
  </script>
  <?php
}

if (isset($_POST['signup'])) {

  $username = get_safe_value($conn, $_POST['username']);
  $email = get_safe_value($conn, $_POST['email']);
  $password = get_safe_value($conn, $_POST['password']);


  $check_user = mysqli_num_rows(mysqli_query($conn, "select * from user where email='$email'"));
  if ($check_user > 0) {
  ?>
    <script>
      window.history.back();
      alert("Email Is already Exist");
    </script>
    <?php
  } else {

    $query = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";

    $user_added = mysqli_query($conn, $query);

    $select_query = "SELECT * FROM `user` WHERE email='$email' && password = '$password'";

    $data = mysqli_query($conn, $select_query);
    $rowData = (mysqli_fetch_assoc($data));

    if ($user_added) {
      $_SESSION['email'] = $email;
      $_SESSION['login_ok'] = 'login_ok';
      $_SESSION['username'] = $rowData['username'];
      header("Location: index.php");
      exit();
    } else {
    ?>
      <script>
        window.history.back();
        alert("Failed to signup");
      </script>

<?php

    }
  }
}
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
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/1.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Signup</div>
          <form action="signup.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" disabled name="email" placeholder="Enter your email" value="<?php echo $_SESSION['EMAIL2']; ?>" required>
              </div>
              <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Enter your Username" name="username" required>
              </div>
              <div class="input-box">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="signup" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip"><a href="login.php">Login now</a></label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/fontawesome.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
</body>

</html>