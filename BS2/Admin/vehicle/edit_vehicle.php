<?php
require('../include/connect.php');
require('../include/header.php');

// Check if ID is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch vehicle data based on ID
    $sql = "SELECT * FROM `vehicle` WHERE `CAR_ID` = $id";
    $result = mysqli_query($conn, $sql);

    // Check if vehicle exists
    if(mysqli_num_rows($result) > 0) {
        $rowData = mysqli_fetch_assoc($result);
?>

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
    <?php require('../include/sidebarmenu.php'); ?>

    <section class="home">
        <div class="text">Edit Vehicle</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="vehicle.php">Manage Vehicle</a>
                <a href="add_vehicle.php">Add Vehicle</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Edit Vehicle</span>
            </div>
        </nav>

        <!-- Vehicle edit form start -->
        <div class="form bg-light">
            <form action="update_vehicle.php" method="post" enctype="multipart/form-data" id="editForm">

                <!-- Existing data pre-filled in form fields -->
                <div class="mb-3">
                    <label for="car_no" class="form-label">Vehicle Number</label>
                    <input id="car_no" placeholder="Location" name="car_no" type="text" aria-label="car_no" class="form-control" value="<?php echo $rowData['CAR_NO']; ?>">
                </div>

                <!-- Similarly pre-fill other form fields with existing data -->
                <div class="mb-3">
                    <label for="car_name" class="form-label">Vehicle Name</label>
                    <input placeholder="Vehicle Name" name="car_name" type="text" aria-label="car_name" class="form-control" value="<?php echo $rowData['CAR_NAME']; ?>">
                </div>

                <div class="mb-3">
                    <label for="car_location" class="form-label">Stand Area <?php echo $rowData['CAR_LOCATION']; ?></label>
                    <select class="form-select" aria-label="Default select example" name="car_location">
                        <?php
                        $sql2 = "SELECT * FROM `place`;";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($rowData2 = (mysqli_fetch_assoc($result2))) {
                        ?>
                            <option value="<?php echo $rowData2['PL_LOCATION']; ?>"><?php echo $rowData2['PL_LOCATION']; ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="seat_no" class="form-label">Number of Seats</label>
                    <input placeholder="Number of Seats" name="seat_no" type="number" aria-label="seat_no" class="form-control" value="<?php echo $rowData['SEAT_NO']; ?>">
                </div>

                <div class="mb-3">
                    <label for="driver_contact" class="form-label">Driver Contact</label>
                    <input placeholder="Driver Contact" name="driver_contact" type="text" aria-label="driver_contact" class="form-control" value="<?php echo $rowData['DRIVER_CONTACT']; ?>">
                </div>

                <div class="mb-3">
                    <label for="driver_name" class="form-label">Driver Name</label>
                    <input placeholder="Driver Name" name="driver_name" type="text" aria-label="driver_name" class="form-control" value="<?php echo $rowData['DRIVER_NAME']; ?>">
                </div>

                <div class="mb-3">
                    <label for="driver_age" class="form-label">Driver Age</label>
                    <input placeholder="Driver Age" name="driver_age" type="number" aria-label="driver_age" class="form-control" value="<?php echo $rowData['DRIVER_AGE']; ?>">
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button" onclick="window.history.back();">Cancel</button>
                    <input type="hidden" name="car_id" value="<?php echo $id; ?>"> <!-- Hidden field to send CAR_ID for update -->
                    <input type="submit" class="btn btn-success" name="submit" value="Update Vehicle">
                </div>

            </form>
        </div>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>

<?php
    } else {
        echo "Vehicle not found.";
    }
} else {
    echo "Invalid request.";
}
?>
