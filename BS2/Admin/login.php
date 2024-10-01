<?php
session_start();

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "bs";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if username, password, and captcha are provided
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials against database
    $sql = "SELECT admin_id , a_username FROM `admin` WHERE a_username = '$username' AND a_password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Credentials are valid
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['a_username'];

        // Redirect to dashboard
        header("Location: index.php");
        exit();
    } else {

            echo "<script>alert('" . "Invalid username or password" . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Generate random captcha code
            var captcha = Math.random().toString(36).substring(7);
            $('#captcha').text(captcha);

            // Validate captcha on form submission
            $('#loginForm').submit(function(event) {
                var enteredCaptcha = $('#captchaInput').val().trim();
                if (enteredCaptcha !== captcha) {
                    $('#captchaError').text('Captcha does not match. Please try again.');
                    event.preventDefault();
                }
            });
        });
    </script>

    <style>
        #captcha {
            font-weight: bold;
            /* Bold the text */
            letter-spacing: 6px;
            /* Add letter spacing */
            background-color: gray;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 mt-5">
                <div class="card bg-light-subtle mt-5">
                    <div class="card-header bg-success-subtle text-center">Admin Login</div>
                    <div class="card-body bg-info-subtle">
                        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> <!-- Modify the action attribute -->
                            <div class="mb-3">
                                <label for="username" class="form-label"><b>Username</b></label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="captchaInput" class="form-label"><b>Captcha</b></label>
                                <div class="d-flex gap-3">
                                    <span id="captcha" class="w-50 form-control mr-2 text-center text-decoration-line-through" readonly></span>
                                    <input type="text" class="form-control" id="captchaInput" name="captchaInput" required>
                                </div>
                                <small id="captchaError" class="form-text text-danger"></small>
                            </div>
                            <button type="submit" class="btn btn-primary"><b>Login</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>