<?php
require('../include/connect.php');
require('../include/header.php');

$query = "select * from package_booking;";
$result = mysqli_query($conn, $query);

if(isset($_GET['type']) && $_GET['type'] == 'delete_booking'){
    $b_id = $_GET['id'];
    $sql = "DELETE FROM `package_booking` WHERE BOOK_ID = '$b_id'";
    if(mysqli_query($conn, $sql)){
        ?>
        <script>
            window.history.back();
            alert("booking deleted");
        </script>
        <?php
    }else{
        echo "Somthing wrong";
    }
}

?>
<style>
    .delete-button {
        background-color: white;
        /* Red color for delete button */
        color: white;
        border: none;
        padding: 2px;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        width: 50px;
        height: 50px;
        /* Add any other styles you want for the button */
    }
</style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Booking</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="booking.php">Manage Booking</a>
                <!-- <a href="add_package.php">Add Packages</a> -->
            </div>

        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light mt-3">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Booking</span>
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

                                    <th class="border-top-0">Sl no.</th>
                                    <th class="border-top-0"> Package Name</th>
                                    <th class="border-top-0"> Place Name</th>
                                    <th class="border-top-0">Package Price</th>
                                    <th class="border-top-0">Tour Date</th>
                                    <th class="border-top-0">Booking Date</th>
                                    <th class="border-top-0">Adult tourist</th>
                                    <th class="border-top-0">Child tourist</th>
                                    <th class="border-top-0">Tourist phone</th>
                                    <th class="border-top-0">Tourist Email</th>
                                    <th class="border-top-0">Booking Status</th>
                                    <th class="border-top-0">Process</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($result))) {

                                    $cp_id = $rowData['CP_ID'];
                                    $sql = "SELECT * FROM `co_package` WHERE CP_ID = $cp_id";
                                    $res = mysqli_query($conn, $sql);
                                    $row = (mysqli_fetch_assoc($res));
                                    $b_status = $rowData['BOOKING_STATUS'];
                                    $b_id = $rowData['BOOK_ID'];
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="txt-oflo"><?php echo $row['P_NAME']; ?></td>
                                        <td class="txt-oflo"><?php echo $row['PL_NAME']; ?></td>
                                        <td><?php echo $row['P_COST']; ?></td>
                                        <td><?php echo $row['P_DATE']; ?></td>
                                        <td><?php echo $rowData['BOOKING_DATE']; ?></td>
                                        <td><?php echo $rowData['ADULT_COUNT']; ?></td>
                                        <td><?php echo $rowData['CHILD_COUNT']; ?></td>
                                        <td><?php echo $rowData['BOOK_PHONE']; ?></td>
                                        <td><?php echo $rowData['BOOK_EMAIL']; ?></td>
                                        <td>
                                            <?php
                                            if ($b_status == 0) {
                                            ?>
                                                <div class="text-warning rounded text-center">
                                                    <b>
                                                        Waiting
                                                    </b>
                                                </div>
                                            <?php
                                            } elseif ($b_status == 1) {
                                            ?>
                                                <div class="text-success rounded text-center">
                                                    <b>
                                                        Approved
                                                    </b>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="text-danger rounded text-center">
                                                    <b>
                                                        Canceled
                                                    </b>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($b_status == 0) {
                                            ?>
                                                <div class="bt process">
                                                    <button class="btn btn-success approve"><a href="booking_process.php?type=approve&id=<?php echo $b_id; ?>">Approve</a></button>
                                                    <button class="btn btn-danger cancel"><a href="booking_process.php?type=cancel&id=<?php echo $b_id; ?>">Cancel</a></button>
                                                </div>
                                            <?php
                                            } elseif ($b_status == 1) {
                                            ?>
                                                <button class="btn btn-danger cancel"><a href="booking_process.php?type=cancel&id=<?php echo $b_id; ?>">Cancel</a></button>
                                                
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success approve"><a href="booking_process.php?type=approve&id=<?php echo $b_id; ?>">Approve</a></button>
                                                <a href="?type=delete_booking&id=<?php echo $b_id; ?>">
                                                    <button class="delete-button">
                                                        <img src="../image/del_img.jpg" style="height: 50px; width: 50px;" alt="Delete" width="20" height="20">
                                                    </button>
                                                </a>
                                            <?php
                                            }
                                            ?>
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

        <?php
        require('../include/footer_in.php');
        ?>


    </section>

    <script src="../js/navbar.js"></script>
</body>

</html>