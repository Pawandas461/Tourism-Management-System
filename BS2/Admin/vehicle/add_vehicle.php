<?php
require('../include/connect.php');
require('../include/header.php');
if (isset($_POST['submit'])) {
    // collect value of input field
    $car_no = $_POST['car_no'];
    $car_name = $_POST['car_name'];
    $car_location = $_POST['car_location'];
    $seat_no = $_POST['seat_no'];
    $d_phone = $_POST['d_phone'];
    $d_name = $_POST['d_name'];
    $d_age = $_POST['d_age'];

    $sql = "INSERT INTO `vehicle`(`CAR_NO`, `CAR_NAME`, `CAR_LOCATION`, `SEAT_NO`, `DRIVER_CONTACT`, `DRIVER_NAME`, `DRIVER_AGE`) VALUES ('$car_no','$car_name','$car_location','$seat_no','$d_phone','$d_name','$d_age');";
    $res = mysqli_query($conn, $sql);

    if (isset($res)) {
?>
        <script>
            alert("New vehicle Added");
            window.location.href="vehicle.php";
        </script>
<?php
    }
}
$sql2 = "SELECT * FROM `place`;";
$result = mysqli_query($conn, $sql2);
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


        <div class="text">Vehicles</div>

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
                <span class="navbar-brand mb-0 h1">Home |Manage Vehicle</span>
            </div>
        </nav>


        <!-- Vehicle add form start -->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="packageForm">

                <div class="mb-3">
                    <label for="car_no" class="form-label">Vehicle Number</label>
                    <input id="car_no" placeholder="Location" name="car_no" type="text" aria-label="car_no" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="car_name" class="form-label">Vehicle Name</label>
                    <input placeholder="Vehicle Name" name="car_name" type="text" aria-label="car_name" class="form-control" id="car_name">
                </div>

                <div class="mb-3">
                    <label for="car_location" class="form-label">Stand Area</label>
                    <select class="form-select" aria-label="Default select example" name="car_location">
                        <?php
                        while ($rowData = (mysqli_fetch_assoc($result))) {
                        ?>
                            <option value="<?php echo $rowData['PL_LOCATION']; ?>"><?php echo $rowData['PL_LOCATION']; ?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="seat_no" class="form-label ">Number of total seats</label>
                    <input name="seat_no" type="number" aria-label="seat_no" class="form-control" id="seat_no">
                </div>

                <div class="mb-3">
                    <label for="d_phone" class="form-label ">Driver contact number</label>
                    <input name="d_phone" type="text" aria-label="d_phone" class="form-control" id="d_phone">
                </div>

                <div class="mb-3">
                    <label for="d_name" class="form-label">Driver Name</label>
                    <input name="d_name" type="text" aria-label="d_name" class="form-control" id="d_name">
                </div>

                <div class="mb-3">
                    <label for="d_age" class="form-label">Driver Age</label>
                    <input name="d_age" type="number" aria-label="d_age" class="form-control" id="d_age">
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Add Vehicle">
                </div>

            </form>
        </div>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>