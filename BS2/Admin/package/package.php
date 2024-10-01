<?php
require('../include/connect.php');
require('../include/header.php');

if (isset($_GET['type']) && $_GET['type'] == 'delete_package') {
    $p_id = $_GET['id'];
    $p_sql = "UPDATE `co_package` SET `STATUS`='0' WHERE CP_ID= '$p_id'";
    $ex = mysqli_query($conn, $p_sql);
    if ($ex) {
?>
        <script>
            window.history.back();
            alert("Record has been deleted...!");
        </script>
    <?php
    }
}

if (isset($_GET['type']) && $_GET['type'] == 'delete_details') {
    $c_id = $_GET['id'];
    $sq = "DELETE FROM `package_details` WHERE CP_ID = '$c_id'";
    $ex = mysqli_query($conn, $sq);
    if ($ex) {
        $update_details = "UPDATE `co_package` SET `P_DETAILS` = '0' WHERE CP_ID = '$c_id'";
        mysqli_query($conn, $update_details);
    ?>
        <script>
            window.history.back();
            alert("Record has been deleted...!");
        </script>
    <?php
    }
}

if (isset($_GET['type']) && $_GET['type'] == 'delete_car') {
    $c_id = $_GET['id'];
    $sq = "DELETE FROM `tag_transport` WHERE CP_ID = '$c_id'";
    $ex = mysqli_query($conn, $sq);
    if ($ex) {
        $update_details = "UPDATE `co_package` SET `VEHICLE` = '0' WHERE CP_ID = '$c_id'";
        mysqli_query($conn, $update_details);
    ?>
        <script>
            window.history.back();
            alert("Record has been deleted...!");
        </script>
    <?php
    }
}

if (isset($_GET['type']) && $_GET['type'] == 'delete_hotel') {
    $c_id = $_GET['id'];
    $sq = "DELETE FROM `tag_hotels` WHERE CP_ID = '$c_id'";
    $ex = mysqli_query($conn, $sq);
    if ($ex) {
        $update_details = "UPDATE `co_package` SET `HOTEL` = '0' WHERE CP_ID = '$c_id'";
        mysqli_query($conn, $update_details);
    ?>
        <script>
            window.history.back();
            alert("Record has been deleted...!");
        </script>
<?php
    }
}

$sql = "select * from co_package;";
$res = mysqli_query($conn, $sql);
?>

<style></style>

</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Packages</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="package.php">Manage Package</a>
                <a href="add_package.php">Add Packages</a>
            </div>

        </header>
        <nav class="navbar navbar-light bg-light mt-3">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Packages</span>
            </div>
        </nav>

        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Total Packages</h3>
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
                                    <th class="border-top-0"> Package Name</th>
                                    <th class="border-top-0"> Place Name</th>
                                    <th class="border-top-0">Location</th>
                                    <th class="border-top-0">Package Details</th>
                                    <th class="border-top-0">Vehicle</th>
                                    <th class="border-top-0">Hotel</th>
                                    <th class="border-top-0">Place Address</th>
                                    <th class="border-top-0">Package Price</th>
                                    <th class="border-top-0">Package Type</th>
                                    <th class="border-top-0">Package Date</th>
                                    <th class="border-top-0">Total Seats</th>
                                    <th class="border-top-0">Available Seats</th>
                                    <th class="border-top-0">Restaurant</th>

                                    <th class="border-top-0">Manage Package</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                    $cp_id = $rowData['CP_ID'];
                                    if ($rowData['STATUS'] == 1) {
                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td class="txt-oflo"><?php echo $rowData['P_NAME']; ?></td>
                                            <td class="txt-oflo"><?php echo $rowData['PL_NAME']; ?></td>
                                            <td><?php echo $rowData['PL_LOCATION']; ?></td>
                                            <td>
                                                <div class="bt">
                                                    <?php
                                                    $dtl_sql = "SELECT PD_ID FROM `package_details` WHERE CP_ID = $cp_id";
                                                    $dtl_res = mysqli_query($conn, $dtl_sql);
                                                    $check_row = mysqli_num_rows($dtl_res);
                                                    if ($check_row == 1) {
                                                    ?>
                                                        <button class="btn btn-warning h-50"><a href="edit_details.php?type=edit_details&id=<?php echo $rowData['CP_ID']; ?>">Edit</a></button>
                                                        <button class="btn btn-danger h-50" id="del_details<?php echo $rowData['CP_ID']; ?>"><a href="?type=delete_details&id=<?php echo $rowData['CP_ID']; ?>">delete</a></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="add_details.php?type=add_details&id=<?php echo $rowData['CP_ID']; ?>"><button class="btn btn-success">Add_details</button></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="bt">
                                                    <?php
                                                    $car_sql = "SELECT tran_id  FROM `tag_transport` WHERE CP_ID = $cp_id";
                                                    $car_res = mysqli_query($conn, $car_sql);
                                                    $check_car_row = mysqli_num_rows($car_res);
                                                    if ($check_car_row == 1) {
                                                    ?>
                                                        <button class="btn btn-warning h-50"><a href="edit_details.php?type=edit_details&id=<?php echo $rowData['CP_ID']; ?>">Edit</a></button>
                                                        <button class="btn btn-danger h-50"><a href="?type=delete_car&id=<?php echo $rowData['CP_ID']; ?>">delete</a></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="tag_transport.php?type=add_car&id=<?php echo $rowData['CP_ID']; ?>"><button class="btn btn-success">Tag_transport</button></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="bt">
                                                    <?php
                                                    $hotel_sql = "SELECT PH_ID  FROM `tag_hotels` WHERE CP_ID = $cp_id";
                                                    $hotel_res = mysqli_query($conn, $hotel_sql);
                                                    $check_hotel_row = mysqli_num_rows($hotel_res);
                                                    if ($check_hotel_row == 1) {
                                                    ?>
                                                        <button class="btn btn-warning h-50"><a href="edit_details.php?type=edit_details&id=<?php echo $rowData['CP_ID']; ?>">Edit</a></button>
                                                        <button class="btn btn-danger h-50"><a href="?type=delete_hotel&id=<?php echo $rowData['CP_ID']; ?>">delete</a></button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="tag_hotel.php?type=tag_hotel&id=<?php echo $rowData['CP_ID']; ?>"><button class="btn btn-success">Tag_hotels</button></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td><?php echo $rowData['PL_ADDRESS']; ?></td>
                                            <td><?php echo $rowData['P_COST']; ?></td>
                                            <td><?php echo $rowData['P_TYPE']; ?></td>
                                            <td class="txt-oflo"><?php echo $rowData['P_DATE']; ?></td>
                                            <td><?php echo $rowData['TOTAL_SEAT']; ?></td>
                                            <td><?php echo $rowData['AVL_SEAT']; ?></td>
                                            <td><?php echo $rowData['RESTAURANT']; ?></td>


                                            <td class="txt-oflo">
                                                <div class="bt">
                                                    <button class="btn btn-primary"><a href="edit_package.php?type=edit&id=<?php echo $rowData['CP_ID']; ?>">Edit</a> </button>
                                                    <button class="btn btn-danger"><a href="?type=delete_package&id=<?php echo $rowData['CP_ID']; ?>">Remove</a> </button>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Footer -->
    <?php
    include '../include/footer_in.php';
    ?>
    <!-- Footer -->

</body>

</html>