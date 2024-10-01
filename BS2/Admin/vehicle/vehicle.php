<?php
require('../include/connect.php');

$sql = "SELECT * FROM `vehicle`;";
$res = mysqli_query($conn, $sql);

require('../include/header.php');
?>
<style></style>
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

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">All Vehicles</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>March 2024</option>
                                <option>April 2024</option>
                                <option>May 2024</option>
                                <option>June 2024</option>
                                <option>July 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Car Number</th>
                                    <th class="border-top-0">Car Name</th>
                                    <th class="border-top-0">Stand area</th>
                                    <th class="border-top-0">Number of seats</th>
                                    <th class="border-top-0">Driver Contact</th>
                                    <th class="border-top-0">Driver Name</th>
                                    <th class="border-top-0">Driver Age</th>
                                    <th class="border-top-0">Manage Vehicle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i= 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rowData['CAR_NO']; ?></td>
                                        <td><?php echo $rowData['CAR_NAME']; ?></td>
                                        <td><?php echo $rowData['CAR_LOCATION']; ?></td>
                                        <td><?php echo $rowData['SEAT_NO']; ?></td>
                                        <td><?php echo $rowData['DRIVER_CONTACT']; ?></td>
                                        <td><?php echo $rowData['DRIVER_NAME']; ?></td>
                                        <td><?php echo $rowData['DRIVER_AGE']; ?></td>                                        
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="edit_vehicle.php?type=edit&id=<?php echo $rowData['CAR_ID']; ?>">Edit</a> </button>
                                                <button class="btn btn-danger"><a href="delete_vehicle.php?type=delete&id=<?php echo $rowData['CAR_ID']; ?>">Delete</a> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table end -->

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>