<?php
// Include database connection and header
include '../include/connect.php';
require('../include/header.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $cp_id = $_GET['id'];
    $query = "SELECT * FROM `co_package` WHERE CP_ID = '$cp_id';";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $duration = $row['DURATION'];

    if (isset($_POST['submit'])) {
        // Collect values of input fields
        for ($i = 1; $i <= $duration; $i++) {
            $p_descr[$i] = $_POST['p_descr_' . $i];
        }
        
        $descr = $_POST['p_descr'];
        // Insert data into package_details table
        $sql = "INSERT INTO `package_details`(`CP_ID`, `DURATION`, `P_DESCR`, `DAY1`, `DAY2`, `DAY3`, `DAY4`, `DAY5`, `DAY6`, `DAY7`, `DAY8`) 
                VALUES ('$cp_id','$duration', '$descr'";
        for ($i = 1; $i <= 8; $i++) {
            // Append package description for each day
            if (isset($p_descr[$i])) {
                $sql .= ",'$p_descr[$i]'";
            } else {
                $sql .= ",NULL";
            }
        }
        $sql .= ")";
        
        if (mysqli_query($conn, $sql)) {
            $update_details = "UPDATE `co_package` SET `P_DETAILS` = '1' WHERE CP_ID = '$cp_id'";
            mysqli_query($conn, $update_details);
?>
            <script>
                alert("Package details updated");
                window.location.href = "package.php";
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
                <a href="package.php">Manage Packages</a>
                <a href="add_package.php">Add Packages</a>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Packages | Add Details</span>
            </div>
        </nav>

        <!-- Add Package Form -->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="packageForm">
                <center>
                    <h3 style="font-family: sans-serif; color:black"><b>Add Activities</b></h3>
                </center>

                <?php for ($i = 1; $i <= $duration; $i++) { ?>
                    <div class="mb-3">
                        <label for="p_descr_<?php echo $i; ?>" class="form-label">Activities of (Day <?php echo $i; ?>)</label>
                        <textarea required class="form-control" name="p_descr_<?php echo $i; ?>" id="p_descr_<?php echo $i; ?>" rows="3"></textarea>
                    </div>
                <?php } ?>

                <div class="mb-3">
                        <label for="p_descr" class="form-label">Enter Short Package Description</label>
                        <textarea class="form-control" name="p_descr" id="p_descr" rows="3"></textarea>
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
