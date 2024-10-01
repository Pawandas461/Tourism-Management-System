<?php
ob_start();
require('header.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = mysqli_prepare($conn, "INSERT INTO user_query(username, email, subject, message) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $subject, $message);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

ob_end_flush();
?>


<body style="height: 100vh;">
    <div class="centered mt-3">
        <h4 class="heading_sm">Contact Us</h4>
    </div>
    <div class="container p-4">
        <div class="container bg-light p-3">
            <div class="centered">
                <h2 class="heading_lg">Contact For Any query</h2>
            </div>
            <form action="" method="post" class="row">

                <div class="col-md-6 mb-4">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email" aria-describedby="basic-addon1">
                </div>

                <div class="col-md-12">
                    <span>
                        Subject
                    </span>
                    <input type="text" name="subject" class="form-control mb-4" placeholder="Subject of the query" aria-label="Subject" aria-describedby="basic-addon1">
                </div>
                <div class="col-md-12">
                    <span>Message</span>
                    <div class="input-group mb-4">
                        <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="centered">
                        <input type="submit" name="submit" value="Submit" class="btn-home mb-4" style="margin-top: 0px; padding: 5px 15px 5px 15px;border: 0px;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php
require('footer.php');
?>

<?php include 'js/link_js.php'; ?>

</html>