<?php
require('../include/connect.php');
require('../include/header.php');

$sql = "SELECT * FROM `place`;";
$res = mysqli_query($conn, $sql);

?>
<style></style>
</head>

<body style="height: 50vh;">
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Places</div>
        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="place.php">Manage Place</a>
                <a href="add_place.php">Add Place</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home |Manage Places</span>
            </div>
        </nav>

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Total Places</h3>
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
                                    <th class="border-top-0"> Place Name</th>
                                    <th class="border-top-0">Location</th>
                                    <th class="border-top-0">Place Address</th>
                                    <th class="border-top-0">Main Attraction</th>
                                    <th class="border-top-0">Number of sight seeing</th>
                                    <th class="border-top-0">Place Description</th>
                                    <th class="border-top-0">Place Details</th>
                                    <th class="border-top-0">Manage Place</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                    $Place_desecription = $rowData['PL_DESCR'];
                                    //$half_length = strlen($Place_details) / 2;
                                    $shortened_details = substr($Place_desecription, 0, 45);

                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="txt-oflo"><?php echo $rowData['PL_NAME']; ?></td>
                                        <td><?php echo $rowData['PL_LOCATION']; ?></td>
                                        <td><?php echo $rowData['PL_ADDR']; ?></td>
                                        <td><?php echo $rowData['ATRACTIONS']; ?></td>
                                        <td><?php echo $rowData['SIGHT_SEEING']; ?></td>
                                        <td><?php echo $shortened_details; ?><a class="text-primary" href="place_detail.php?id=<?php echo $rowData['PL_ID']; ?>">...view details</a></td>
                                        <td>
                                            <div class="bt">
                                                    <?php
                                                    $chk = $rowData['PL_DETAILS'];
                                                    
                                                    if ($chk == 1) {
                                                    ?>
                                                        <!-- <button class="btn btn-warning h-50"><a href="#">Edit</a></button> -->
                                                        <a href="#"><img class="del_btn" src="../image/del_img.jpg" alt="Delete"></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="detail_place.php?type=add&id=<?php echo $rowData['PL_ID']; ?>"><button class="btn btn-success">Add Details</button></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="edit_place.php?type=edit&id=<?php echo $rowData['PL_ID']; ?>">Edit</a> </button>
                                                <button class="btn btn-danger"><a href="delete_place.php?type=delete&id=<?php echo $rowData['PL_ID']; ?>">Delete</a> </button>
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
<?php
require('../include/footer_in.php');
?>

</html>