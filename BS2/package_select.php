<?php
require('header.php');
$cp_id = $_GET['id'];

// Optimized SQL query to fetch package, place, hotel, and restaurant details
$sql = "
    SELECT 
        cp.*, 
        p.PL_IMAGE1, p.PL_IMAGE2, p.PL_IMAGE3, p.PL_IMAGE4,
        h.H_IMAGE, h.H_NAME, h.H_ADDR, h.H_LOCATION, h.H_DESCR,
        r.RES_DESCR, r.RES_ADDR,r.RES_IMAGE
    FROM 
        co_package cp
    LEFT JOIN 
        place p ON cp.PL_NAME = p.PL_NAME AND cp.PL_LOCATION = p.PL_LOCATION
    LEFT JOIN 
        tag_hotels th ON cp.CP_ID = th.CP_ID
    LEFT JOIN 
        hotel h ON th.H_ID = h.H_ID
    LEFT JOIN 
        restaurant r ON cp.RESTAURANT = r.RES_NAME
    WHERE 
        cp.CP_ID = '$cp_id';
";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

// Assigning values to variables
$pl_city = $row['PL_LOCATION'];
$pl_name = $row['PL_NAME'];
$p_name = $row['P_NAME'];
$p_address = $row['PL_ADDRESS'];
$p_cost = $row['P_COST'];
$duration = $row['DURATION'];
$person = $row['TOURIST_NUMBER'];
$total_seat = $row['TOTAL_SEAT'];
$avl_seat = $row['AVL_SEAT'];
$p_descr = $row['P_DESCR'];
$p_details = $row['P_DETAILS'];
$vehicle = $row['VEHICLE'];
$hotel = $row['HOTEL'];
$restaurant = $row['RESTAURANT'];
$p_type = $row['P_TYPE'];
$guid = $row['TOUR_GUID_NAME'];
$p_date = $row['P_DATE'];
?>

<body>
    <!-- header -->
    <!-- Package Information -->
    <div class="still-placed sticky-top bg-light shadow-sm  mb-5 bg-body" style="margin-top: 50px;">
        <nav class="navbar" style="background-color: inherit;">

            <div class="container-fluid d-flex justify-content-around align-items-center">
                <div class="location">
                    <div class="nav_txt">Location</div>
                    <div class="nav_value"><?php echo $pl_name; ?></div>
                </div>
                <div class="date">
                    <div class="nav_txt">Tour Date</div>
                    <div class="nav_value"><?php echo $p_date; ?></div>
                </div>
                <div class="date">
                    <div class="nav_txt">Persons</div>
                    <div class="nav_value"><?php echo $person . " Persons"; ?></div>
                </div>
                <div class="date">
                    <div class="nav_txt">Duration</div>
                    <div class="nav_value"><?php echo $duration . " Days"; ?></div>
                </div>

            </div>

        </nav>
    </div>


    <!-- Photo Gallery -->
    <div class="container mt-5 bg-light pb-5 pt-5 shadow-lg p-3 mb-1 bg-body rounded">
        <h2 class="text-center mb-4"><?php echo $pl_name; ?></h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 mt-5">
            <?php
            $images = [$row['PL_IMAGE1'], $row['PL_IMAGE2'], $row['PL_IMAGE3']];
            foreach ($images as $image) {
                if ($image) {
            ?>
                    <div class="col">
                        <div class="card">
                            <img src="Admin/image/places/<?php echo $image; ?>" class="card-img-top" alt="...">
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Package Details -->
                <div class="packages border shadow-lg p-3 mb-5 bg-body rounded" id="package">
                    <div class="d-flex justify-content-around p-3 mb-3" style="background-color: #cae7ed;">
                        PACKAGE DETAILS
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img style="height: 20vh;" src="Admin/image/packages/<?php echo $row['PL_IMAGE']; ?>" class="img-fluid rounded " alt="...">
                        </div>
                        <div class="col-md-5">
                            <h3 class="heading-home"><?php echo $p_name; ?></h3><br>
                            <p>The Tour is about <?php echo $duration; ?> Days in the place <b><?php echo $pl_city; ?></b></p>
                            <p>Beautiful culture and famous History of this place is the iconic attraction</p>
                        </div>
                        <div class="col-md-3">
                            <center>
                                <div class="">
                                    <div class="date">
                                        <div class="detail_h">Tour Date</div>
                                        <div class="detail_v"><?php echo $p_date; ?></div>
                                    </div>
                                    <div class="date">
                                        <div class="detail_h">Persons</div>
                                        <div class="detail_v"><?php echo $person . " Persons"; ?></div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>

                    <!-- Activities -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    View Details....
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row mt-2 shadow-lg p-3 mb-5 bg-body rounded" id="pack_details">
                                        <div class="col px-2">
                                            <h4>Activities</h4>
                                            <?php
                                            $details_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$cp_id';";
                                            $detail_res = mysqli_query($conn, $details_sql);
                                            $details_row = mysqli_fetch_assoc($detail_res);
                                            for ($i = 1; $i <= $duration; $i++) {
                                                $p_descr = $details_row['DAY' . $i];
                                            ?>
                                                <h5>Day <?php echo $i; ?></h5>
                                                <p><?php echo $p_descr; ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Details -->
                <div class="hotel-select border shadow-lg p-3 mb-5 bg-body rounded" id="hotel">
                    <div class="d-flex justify-content-around p-3 mb-3" style="background-color: #cae7ed;">
                        HOTEL DETAILS
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img style="height: 20vh;" src="Admin/image/hotels/<?php echo $row['H_IMAGE']; ?>" class="img-fluid rounded " alt="...">
                        </div>
                        <div class="col-md-5">
                            <h3 class="heading-home"><?php echo $row['H_NAME']; ?></h3><br>
                            <p><i class="fa-solid fa-location-dot me-1 text-primary"></i><?php echo $row['H_ADDR'] . " in the city " . $row['H_LOCATION']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <div class="selected-value text-center mb-3">Room Selected: <span id="selectedRoom">1</span></div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    View Details....
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row shadow-lg p-3 mb-5 bg-body rounded" id="hotel_details">
                                        <div class="col">
                                            <h4>Hotel Description</h4>
                                            <?php echo $row['H_DESCR']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Restaurant Details -->
                <div class="restaurant-select border shadow-lg p-3 mb-5 bg-body rounded" id="res">
                    <div class="d-flex justify-content-around p-3 mb-3" style="background-color: #cae7ed;">
                        RESTAURANT DETAILS
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img style="height: 20vh;" src="Admin/image/restaurants/<?php echo $row['RES_IMAGE']; ?>" class="img-fluid rounded " alt="Restaurant">
                        </div>
                        <div class="col-md-8">
                            <h3 class="heading-home"><?php echo $restaurant; ?></h3><br>
                            <p><?php echo $row['RES_DESCR']; ?> </p>
                        </div>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    View Details....
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row shadow-lg p-3 bg-body rounded" id="res_details">
                                        <div class="col-md-12 ">
                                            <h4>Restaurant Address</h4>
                                            <p><i class="fa-solid fa-location-dot me-1 text-primary"></i><?php echo $row['RES_ADDR']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog m-3">
                    <div class="modal-content shadow-lg mb-5 bg-body rounded">
                        <div class="modal-header p-3 d-flex justify-content-between" style="background-color: #cae7ed;">
                            <h5 class="modal-title text-decoration-line-through">Without discount price</h5>
                            <div class="bg-danger p-2 text-light">% offers</div>
                        </div>
                        <div class="modal-header d-flex justify-content-start align-items-end p-3" style="height: 60px; background-color: #cae7ed;">
                            <h1 class="modal-title"><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $p_cost; ?></h1>
                            <p>INR</p>
                        </div>
                        <div class="modal-body border bg-light p-3 d-flex justify-content-between">
                            <h5 class="modal-title"><?php echo $pl_name; ?></h5>
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-calendar-days"></i><b><?php echo $p_date; ?></b>
                            </div>
                        </div>
                        <div class="modal-footer bg-light p-2 d-flex justify-content-around">
                            <a href="package_booking.php?cp_id=<?php echo $cp_id; ?>">
                                <button type="button" class="btn text-light " style="background-color: #6666FF;">Proceed for booking</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('footer.php'); ?>

    <script src="js/ajaxCNDScript.min.js"></script>
    <script>
        // function showSection(section) {
        //     document.querySelectorAll('#pack_details, #hotel_details, #res_details').forEach(el => el.style.display = 'none');
        //     document.getElementById(section).style.display = 'block';
        // }
    </script>
</body>

</html>