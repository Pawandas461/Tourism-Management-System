<?php
require('header.php');

if (isset($_GET['search_btn'])) {

    $searched_key = get_safe_value($conn, $_GET['search_package']);

    $query = "SELECT `keyword_id`, `keyword`, `CP_ID` FROM `keyword` WHERE keyword like '%$searched_key%'";

    $check_key = mysqli_query($conn, $query);
    $for = 'key';
}
if (isset($_GET['type']) && $_GET['type'] == 'place') {
    $searched_key = get_safe_value($conn, $_GET['location']);

    $query = "SELECT * FROM `place` WHERE PL_LOCATION = '$searched_key';";
    $for = 'place';

    $check_key = mysqli_query($conn, $query);
}
?>

<body>

    <div class="container-fluid" style="margin-top:40px;">
        <div class="centered sticky-top">
            <div class="card col-md-8 shadow-lg p-3 mb-5 bg-body-tertiary rounded-0 border-0">
                <h3 class="text-center" style="color: #ff5c00;">Search Your Package</h3>
                <div class="card-body row">
                    <div class="col-md-3">
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">Destination</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Destination 1</a></li>
                                <li><a class="dropdown-item" href="#">Destination 2</a></li>
                                <li><a class="dropdown-item" href="#">Destination 3</a></li>
                                <li><a class="dropdown-item" href="#">Destination 4</a></li>
                            </ul>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Budget</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">10000 /-</a></li>
                                <li><a class="dropdown-item" href="#">20000 /-</a></li>
                                <li><a class="dropdown-item" href="#">30000 /-</a></li>
                                <li><a class="dropdown-item" href="#">40000 /-</a></li>
                            </ul>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Person</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">1</a></li>
                                <li><a class="dropdown-item" href="#">2</a></li>
                                <li><a class="dropdown-item" href="#">3</a></li>
                                <li><a class="dropdown-item" href="#">4</a></li>
                                <li><a class="dropdown-item" href="#">5</a></li>
                                <li><a class="dropdown-item" href="#">6</a></li>
                            </ul>
                            <input type="number" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-secondary dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Date</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Date 1</a></li>
                                <li><a class="dropdown-item" href="#">Date 2</a></li>
                                <li><a class="dropdown-item" href="#">Date 3</a></li>
                                <li><a class="dropdown-item" href="#">Date 4</a></li>
                            </ul>
                            <input type="date" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-5">
        <section class="package" id="packages" style="margin-top: 40px;">
            <!-- <h4 class="heading_sm">Packages</h4>
            <h2 class="heading_lg">Tour Packages</h2> -->
            <?php
            if (mysqli_num_rows($check_key) > 0) {
                if ($for == 'key') {
                    while ($key_row = mysqli_fetch_assoc($check_key)) {
                        $cp_id = $key_row['CP_ID'];
                        $sql = "select * from co_package where CP_ID = '$cp_id';";
                        $res = mysqli_query($conn, $sql);
                        while ($rowData = (mysqli_fetch_assoc($res))) {
            ?>
                            <div class="row">
                                <?php
                                $id = $rowData['CP_ID'];
                                $whole_no = $rowData['TOTAL_SEAT'];
                                $part = $rowData['AVL_SEAT'];
                                $percentage = ($part / $whole_no) * 100;

                                $detail_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$id';";
                                $detail_res = mysqli_query($conn, $detail_sql);

                                $detail_row = (mysqli_fetch_assoc($detail_res));
                                ?>

                                <div class="col-lg-8">
                                    <div class="card text-dark" style="background-color: rgb(245, 240, 240);">
                                        <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>">
                                            <img src="Admin/image/packages/<?php echo $rowData['PL_IMAGE']; ?>" class="card-img-top" alt="Package photo">
                                        </a>
                                        <div class="card-body">
                                            <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="text-decoration-none text-dark">
                                                <h5 class="card-title"><?php echo $rowData['P_NAME']; ?></h5>
                                            </a>
                                            <div class="d-flex justify-content-between">
                                                <p class="detail-text text-dark"><span class="icon-detail"><i class="fa-regular fa-user"></i></span><?php echo $rowData['TOURIST_NUMBER']; ?> Persons</p>
                                                <p class="detail-text text-dark"><span class="icon-detail"><i class="fa-regular fa-calendar-days"></i></span><?php echo $rowData['DURATION']; ?>Days</p>
                                            </div>
                                            <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="btn btn-outline-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                if ($for == 'place') {
                    $sql = "select * from co_package where PL_LOCATION = '$searched_key';";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($rowData = (mysqli_fetch_assoc($res))) {
                            $id = $rowData['CP_ID'];
                            $whole_no = $rowData['TOTAL_SEAT'];
                            $part = $rowData['AVL_SEAT'];
                            $percentage = ($part / $whole_no) * 100;

                            $detail_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$id';";
                            $detail_res = mysqli_query($conn, $detail_sql);

                            $detail_row = (mysqli_fetch_assoc($detail_res));
                        ?>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-4 p-3">
                                    <div class="card text-dark" style="background-color: rgb(245, 240, 240);">
                                        <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>">
                                            <img src="Admin/image/packages/<?php echo $rowData['PL_IMAGE']; ?>" class="card-img-top" alt="Package photo">
                                        </a>
                                        <div class="card-body">
                                            <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="text-decoration-none text-dark">
                                                <h5 class="card-title"><?php echo $rowData['P_NAME']; ?></h5>
                                            </a>
                                            <div class="d-flex justify-content-between">
                                                <p class="detail-text text-dark"><span class="icon-detail"><i class="fa-regular fa-user"></i></span><?php echo $rowData['TOURIST_NUMBER']; ?> Persons</p>
                                                <p class="detail-text text-dark"><span class="icon-detail"><i class="fa-regular fa-calendar-days"></i></span><?php echo $rowData['DURATION']; ?>Days</p>
                                            </div>
                                            <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="btn btn-outline-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="d-flex justify-content-center">
                            <h4 class="heading_lg text-dark text-center">No Package Found</h4>
                        </div>

                <?php
                    }
                }
            } else {
                ?>
                <div class="d-flex justify-content-center">
                    <h4 class="heading_lg text-dark text-center">No Package Found</h4>
                </div>

            <?php
            }
            ?>

        </section>
    </div>
</body>
<?php
require('footer.php');
?>
<?php include 'js/link_js.php'; ?>

</html>