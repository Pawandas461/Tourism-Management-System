<?php
require('header.php');
$sql = "select * from co_package LIMIT 6;";
$res = mysqli_query($conn, $sql);
?>
<div class="container-fluid">
    <!-- Carousel Start -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner p-0 mb-3">
            <div class="carousel-item active">
                <img src="img/1.jpg" class="d-block w-100" id="abc" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold" style="color: #ff5c00;">Welcome</h5>
                    <p>We are always ready to Help You .</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold" style="color: #ff5c00;">Welcome</h5>
                    <p>We are always ready to Help You .</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fw-bold" style="color: #ff5c00;">Welcome</h5>
                    <p>We are always ready to Help You .</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel End -->

    <section class="place" id="place" style="margin-top: 40px;">
        <div class="container bg-0">
            <h4 class="heading_sm">Places</h4>
            <h2 class="heading_lg">Tour Places</h2>

            <div class="row">
                <?php
                $sql = "SELECT * FROM place LIMIT 6;";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6 mb-4 ">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img src="Admin/image/places/<?php echo $row['PL_IMAGE4']; ?>" class="img-fluid" alt="Place photo">
                            <a href="view_place.php?type=place&location=<?php echo $row['PL_LOCATION']; ?>" class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white"><?php echo $row['PL_LOCATION']; ?></h5>
                                <span>30 Places</span>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <a href="place.php" class="btn-home" style="margin-bottom: 60px;">Explore More Destinations</a>
        </div>
    </section>

    <section class="package" id="packages" style="margin-top: 40px;">
        <div class="container bg-0">
            <h4 class="heading_sm">Packages</h4>
            <h2 class="heading_lg">Best Packages</h2>

            <div class="row">
                <?php
                $sql = "SELECT * FROM co_package;";
                $res = mysqli_query($conn, $sql);

                while ($rowData = mysqli_fetch_assoc($res)) {
                    $detail_status = $rowData['P_DETAILS'];
                    $vehicle_status = $rowData['VEHICLE'];
                    $hotel_status = $rowData['HOTEL'];
                    $status = $rowData['STATUS'];
                    if ($detail_status != 0 && $vehicle_status != 0 && $hotel_status != 0 && $status != 0) {
                        $id = $rowData['CP_ID'];
                        $whole_no = $rowData['TOTAL_SEAT'];
                        $part = $rowData['AVL_SEAT'];
                        $percentage = ($part / $whole_no) * 100;

                        $detail_sql = "SELECT * FROM package_details WHERE CP_ID = '$id';";
                        $detail_res = mysqli_query($conn, $detail_sql);
                        $detail_row = mysqli_fetch_assoc($detail_res);
                ?>
                        <div class="col-lg-3 col-md-5 mb-3 p-3">
                            <div class="card text-light p-card border-0 rounded-0" style="background-color: #f9f9f9;">
                                <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>">
                                    <img src="Admin/image/packages/<?php echo $rowData['PL_IMAGE']; ?>" class="card-img-top" alt="Package photo">
                                </a>
                                <div class="card-body p-card-body rounded-0">
                                    <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="text-decoration-none text-dark">
                                        <h5 class="card-title"><?php echo $rowData['P_NAME']; ?></h5>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <p class="detail-text"><span class="icon-detail"><i class="fa-regular fa-user"></i></span><?php echo $rowData['TOURIST_NUMBER']; ?> Persons</p>
                                        <p class="detail-text"><span class="icon-detail"><i class="fa-regular fa-calendar-days"></i></span><?php echo $rowData['DURATION']; ?>Days</p>
                                    </div>
                                    <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>" class="btn btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <a href="package.php" class="btn-home">Explore More Packages</a>
        </div>

    </section>
</div>
<?php
require('footer.php');
?>
</body>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


</html>