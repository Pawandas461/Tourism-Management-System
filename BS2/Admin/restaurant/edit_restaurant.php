<?php
include '../include/connect.php';
if (isset($_POST['submit'])) {
    // Collect value of input fields and escape special characters
    $id = $_POST['res_id'];
    $res_name = mysqli_real_escape_string($conn, $_POST['res_name']);
    $res_location = mysqli_real_escape_string($conn, $_POST['res_location']);
    $res_catagory = mysqli_real_escape_string($conn, $_POST['res_catagory']);
    $res_contact = mysqli_real_escape_string($conn, $_POST['res_contact']);
    $res_address = mysqli_real_escape_string($conn, $_POST['res_address']);
    $res_descr = mysqli_real_escape_string($conn, $_POST['res_descr']);

    // Handle file upload if a new file is provided
    $res_image = $_FILES['res_image']['name'];
    if (!empty($res_image)) {
        move_uploaded_file($_FILES['res_image']['tmp_name'], '../image/restaurants/'. $res_image);
        $image_query_part = ", `RES_IMAGE`='$res_image'";
    } else {
        $image_query_part = "";
    }

    // Update the restaurant in the database
    $sql = "UPDATE `restaurant` SET 
            `RES_NAME`='$res_name', 
            `RES_LOCATION`='$res_location', 
            `RES_CATEGORY`='$res_catagory', 
            `RES_CONTACT`='$res_contact', 
            `RES_ADDR`='$res_address', 
            `RES_DESCR`='$res_descr' 
            $image_query_part 
            WHERE `RES_ID`='$id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        ?>
        <script>
            alert("Restaurant updated successfully");
            window.location.href = "restaurant.php";
        </script>
        <?php
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch the restaurant data to populate the form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `restaurant` WHERE `RES_ID`='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Restaurant not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

require('../include/header.php');

$sql2 = "SELECT PL_LOCATION FROM `place`;";
$res = mysqli_query($conn, $sql2);
?>

<style>
    .form {
        margin: 60px 120px 20px 120px;
        padding: 40px;
        border: 2px solid #e1d6d6;
        border-radius: 8px;
    }
</style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">
        <div class="text">Edit Restaurant</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="restaurant.php">Manage Restaurant</a>
                <a href="add_restaurant.php">Add Restaurant</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Manage Restaurant</span>
            </div>
        </nav>

        <!-- Edit restaurant form -->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="res_id" value="<?php echo $row['RES_ID']; ?>">

                <div class="mb-3">
                    <label class="form-label" for="res_name">Enter Restaurant Name</label>
                    <input type="text" class="form-control" name="res_name" value="<?php echo $row['RES_NAME']; ?>" placeholder="Restaurant Name">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_location">Location</label>
                    <select class="form-select" aria-label="Default select example" name="res_location" id="res_location">
                        <?php
                        while ($row_place = mysqli_fetch_assoc($res)) {
                            $selected = ($row_place['PL_LOCATION'] == $row['RES_LOCATION']) ? 'selected' : '';
                            echo "<option value='{$row_place['PL_LOCATION']}' $selected>{$row_place['PL_LOCATION']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_catagory">Category</label>
                    <input type="text" class="form-control" name="res_catagory" value="<?php echo $row['RES_CATEGORY']; ?>" placeholder="Category">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_contact">Contact No.</label>
                    <input type="text" class="form-control" name="res_contact" value="<?php echo $row['RES_CONTACT']; ?>" placeholder="Restaurant Phone Number">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_address">Restaurant Address</label>
                    <input type="text" class="form-control" name="res_address" value="<?php echo $row['RES_ADDR']; ?>" placeholder="Address">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_descr">Restaurant Description</label>
                    <textarea class="form-control" placeholder="Short description of Restaurant" name="res_descr" id="exampleFormControlTextarea1" rows="3"><?php echo $row['RES_DESCR']; ?></textarea>
                </div>

                <label for="res_image" class="form-label mt-3">Upload Image</label>
                <div class="input-group mb-3">
                    <input type="file" name="res_image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" onclick="reloadPage()" id="cancel">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Update Restaurant">
                </div>
            </form>
        </div>
    </section>

    <script>
        function reloadPage() {
            location.reload();
        }
    </script>
    <script src="../js/navbar.js"></script>
</body>

</html>
