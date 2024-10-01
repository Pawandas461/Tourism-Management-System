<?php
require('../include/connect.php');
require('../include/header.php');

$sql = "SELECT * FROM `hotel`;";
$res = mysqli_query($conn, $sql);
?>
<style></style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Hotels</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="hotel.php">Manage Hotel</a>
                <a href="add_hotel.php">Add Hotel</a>
            </div>

        </header>
        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Hotel</span>
            </div>
        </nav>

        <!-- hotel table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">All Hotels</h3>
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
                                    <th>Hotel Name</th>
                                    <th>Hotel Location</th>
                                    <th>Hotel Address</th>
                                    <th>Contact No.</th>
                                    <th>Hotel Description</th>
                                    <th>Total Room</th>
                                    <th>Available Room</th>
                                    <th>Room Rent</th>
                                    <th class="border-top-0">Manage Hotels</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                    $package_details = $rowData['H_DESCR'];
                                    $shortened_details = substr($package_details, 0, 45);
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="txt-oflo"><?php echo $rowData['H_NAME']; ?></td>
                                        <td><?php echo $rowData['H_LOCATION']; ?></td>
                                        <td><?php echo $rowData['H_ADDR']; ?></td>
                                        <td><?php echo $rowData['H_CONTACT']; ?></td>
                                        <td><?php echo $shortened_details; ?><a class="text-primary" href="package_detail.php?id=<?php echo $rowData['H_ID']; ?>">...view details</a></td>
                                        <td><?php echo $rowData['TOTAL_ROOMS']; ?></td>
                                        <td><?php echo $rowData['AVL_ROOMS']; ?></td>
                                        <td><?php echo $rowData['ROOM_RENT']; ?></td>
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="edit_hotel.php?type=edit&id=<?php echo $rowData['H_ID']; ?>">Edit</a> </button>
                                                <button class="btn btn-danger"><a href="delete_hotel.php?type=delete&id=<?php echo $rowData['H_ID']; ?>">Delete</a> </button>
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

        <div class="data">


        </div>


    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>