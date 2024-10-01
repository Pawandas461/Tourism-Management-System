<?php
require('../include/connect.php');

require('../include/header.php');


$sql = "select * from restaurant;";
$res = mysqli_query($conn, $sql);
?>
<style>
    a {
        text-decoration: none;
        color: white;
    }

    .bt {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
</style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Restaurants</div>

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
                <span class="navbar-brand mb-0 h1">Home |Manage Restaurant</span>
            </div>
        </nav>

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Total Restaurant</h3>
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
                                    <th>#</th>
                                    <th>Restaurant Name</th>
                                    <th>Restaurant Location</th>
                                    <th>Restaurant Address</th>
                                    <th>Restaurant Catagory</th>
                                    <th>Restaurant Contact No.</th>
                                    <th>Restaurant description</th>
                                    <th>Manage Restaurant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {

                                    $restaurant_details = $rowData['RES_DESCR'];
                                    $shortened_details = substr($restaurant_details, 0, 45);
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rowData['RES_NAME']; ?></td>
                                        <td><?php echo $rowData['RES_LOCATION']; ?></td>
                                        <td><?php echo $rowData['RES_ADDR']; ?></td>
                                        <td><?php echo $rowData['RES_CATEGORY']; ?></td>
                                        <td><?php echo $rowData['RES_CONTACT']; ?></td>
                                        <td><?php echo $shortened_details; ?><a class="text-primary" href="restaurant_detail.php?id=<?php echo $rowData['RES_ID']; ?>">...view details</a></td>
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="edit_restaurant.php?type=edit&id=<?php echo $rowData['RES_ID']; ?>">Edit</a> </button>
                                                <button class="btn btn-danger"><a href="delete_restaurant.php?type=delete&id=<?php echo $rowData['RES_ID']; ?>">Delete</a> </button>
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