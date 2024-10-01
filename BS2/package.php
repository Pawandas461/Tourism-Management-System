<?php
require('header.php');
?>

<body style="height: 100vh;">
    <div class="container-fluid">
        <!-- Package Section Start -->
        <section class="package" id="packages" style="margin-top: 40px;">
            <div class="container bg-0">
                <h4 class="heading_sm">Packages</h4>
                <h2 class="heading_lg">Tour Packages</h2>
                <div class="row">
                    <?php
                    $sql = "select * from co_package;";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_num_rows($res);
                    //   $rowData = (mysqli_fetch_assoc($res));
                    ?>
                    <?php
                    while ($rowData = (mysqli_fetch_assoc($res))) {
                        $detail_status = $rowData['P_DETAILS'];
                        $vehicle_status = $rowData['VEHICLE'];
                        $hotel_status = $rowData['HOTEL'];
                        $status = $rowData['STATUS'];
                        if ($detail_status != 0 && $vehicle_status != 0 && $hotel_status != 0 && $status != 0) {

                            $id = $rowData['CP_ID'];
                            $whole_no = $rowData['TOTAL_SEAT'];
                            $part = $rowData['AVL_SEAT'];
                            $percentage = ($part / $whole_no) * 100;

                            $detail_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$id';";
                            $detail_res = mysqli_query($conn, $detail_sql);

                            $detail_row = (mysqli_fetch_assoc($detail_res));

                            // Determine the color of the progress bar dynamically
                            if ($percentage > 75) {
                                $progress_color = 'bg-success';
                            } elseif ($percentage > 50) {
                                $progress_color = 'bg-info';
                            } elseif ($percentage > 25) {
                                $progress_color = 'bg-warning';
                            } else {
                                $progress_color = 'bg-danger';
                            }
                    ?>
                            <div class="col-lg-3 col-md-5 mb-3 p-3">
                                <div class="card text-light p-card border-0 rounded-0">
                                    <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>">
                                        <img src="Admin/image/packages/<?php echo $rowData['PL_IMAGE']; ?>" class="card-img-top rounded-0" alt="...">
                                        <div class="blog-date">
                                            <h6 class="font-weight-bold mb-1 mt-2 text-dark">0%</h6>
                                            <small class="text-white text-uppercase">OFF</small>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="text-decoration-none text-dark">
                                            <h5 class="card-title"><?php echo $rowData['P_NAME']; ?></h5>
                                        </a>

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading<?php echo $id; ?>">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $id; ?>">
                                                        Package Description
                                                    </button>
                                                </h2>
                                                <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $id; ?>" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <?php echo $detail_row['P_DESCR']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="details-package" style="margin-top: 15px;">
                                            <p class="detail-text"><span class="icon-detail"><i class="fa-solid fa-indian-rupee-sign"></i></span><?php echo $rowData['P_COST']; ?> INR</p>
                                            <p class="detail-text"><span class="icon-detail"><i class="fa-regular fa-user"></i></span><?php echo $rowData['TOURIST_NUMBER']; ?> Persons</p>
                                            <p class="detail-text"><span class="icon-detail"><i class="fa-regular fa-calendar-days"></i></span><?php echo $rowData['DURATION']; ?>Days</p>
                                        </div>

                                        <p class="fw-bold text-dark">Available Seats</p>
                                        <div class="progress">
                                            <div class="progress-bar <?php echo $progress_color; ?>" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $part; ?> seats</div>
                                        </div>

                                        <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="btn btn-outline-primary mt-3" disabled>Show More Details</a>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>
    <?php
    require('footer.php');
    ?>
</body>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

</html>