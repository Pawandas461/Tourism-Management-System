<?php
// Include database connection and header
include '../include/connect.php';
require('../include/header.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
     
    $pl_id = $_GET['id'];
    if (isset($_POST['submit'])) {

        $head1 = $_POST['head1'];
        $head2 = $_POST['head2'];
        $head3 = $_POST['head3'];

        $pl_descr1 = $_POST['pl_descr1'];
        $pl_descr2 = $_POST['pl_descr2'];
        $pl_descr3 = $_POST['pl_descr3'];
        // Insert data into package_details table
        $sql = "INSERT INTO `place_details`(`PL_ID`, `DESCRIPTION_1`, `DESCRIPTION_2`, `DESCRIPTION_3`, `HEADING_1`, `HEADING_2`, `HEADING_3`) 
        VALUES ('$pl_id','$pl_descr1','$pl_descr2','$pl_descr3','$head1','$head2','$head3')";

        if (mysqli_query($conn, $sql)) {
            $update_details = "UPDATE `place` SET `PL_DETAILS` = '1' WHERE PL_ID = '$pl_id'";
            mysqli_query($conn, $update_details);
?>
            <script>
                alert("Place details updated");
                window.location.href = "place.php";
            </script>
<?php
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!-- HTML content -->
<style>
    .form {
        margin: 60px 120px 20px 120px;
        padding: 40px;
        border: 2px solid #e1d6d6;
        border-radius: 8px
    }
</style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">
        <!-- Header -->
        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="place.php">Places</a>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Places | Add Details</span>
            </div>
        </nav>

        <!-- Add Package Form -->
        <div class="form bg-light">
            <form action="" method="post" id="packageForm">
                <center>
                    <h3 style="font-family: sans-serif; color:black"><b>Add Place Details</b></h3>
                </center>
                <div class="mb-3">
                    <label for="head1" class="form-label">Heading 1</label>
                    <input placeholder="Heading 1" name="head1" type="text" aria-label="head1" class="form-control" id="head1">
                </div>
                <div class="mb-3">
                    <label for="head2" class="form-label">Heading 2</label>
                    <input placeholder="Heading 2" name="head2" type="text" aria-label="head2" class="form-control" id="head2">
                </div>
                <div class="mb-3">
                    <label for="head3" class="form-label">Heading 3</label>
                    <input placeholder="Heading 3" name="head3" type="text" aria-label="head3" class="form-control" id="head3">
                </div>
                <div class="mb-3">
                    <label for="pl_descr1" class="form-label">Description 1</label>
                    <textarea required class="form-control" name="pl_descr1" id="pl_descr1"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pl_descr2" class="form-label">Description 2</label>
                    <textarea class="form-control" name="pl_descr2" id="pl_descr2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pl_descr3" class="form-label">Description 3</label>
                    <textarea class="form-control" name="pl_descr3" id="pl_descr3"></textarea>
                </div>
                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" onclick="goback()" type="button">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Create Package">
                </div>
            </form>
        </div>

        <!-- Footer -->
        <?php include '../include/footer_in.php'; ?>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>