<?php
require('functions.inc.php');
require('connect.php');

error_reporting(0);
session_start();

?>
<?php

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2</title>
    <!-- css and script link -->
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="css/google.font.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="height: 100vh;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top " id="nav">
        <div class="container-fluid" id="navContent">
            <a class="navbar-brand" href="index.php"><img class="companyLogo" src="img/logo.jpg" alt="Logo" style="height:45px; object-fit:contain;"></a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#NavBarForSagarservice" aria-controls="NavBarForSagarservice" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav stroke ms-auto">
                    <li class="nav-item navtext">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link " href="package.php">Packages</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link " href="place.php">Place</a>
                    </li>

                    <?php
                    if (isset($_SESSION['login_ok'])) {

                    ?>
                        <li class="nav-item navtext">
                            <a class="nav-link " href="my_tours.php">My Tours</a>
                        </li>
                        <li class="nav-item navtext">
                            <a class="nav-link " href="view_place.php">View Places</a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item navtext">
                        <a class="nav-link " href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link" href="conntact_us.php">Contact Us</a>
                    </li>
                    <li>
                        <form class="d-flex" method="get" action="view_place.php">
                            <div class="selection_container">
                                <input class="form-control me-2 search-box" type="search" placeholder="Search..." name="search_package" aria-label="Search">
                                <button class="btn btn-outline-primary select-btn" type="submit" name="search_btn">Search</button>
                            </div>
                        </form>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto px-1 me-5">
                    <div class="Navbardropdown-container">
                        <img src="img/AVTAR.jpg" style="object-fit: contain;" class="nav-item" height="50px" alt="Login">
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['login_ok'])) {

                            ?>
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a class="dropdown-item" href="login.php">Sign Up/Login</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <div class="offcanvas offcanvas-start ps-5 d-lg-none" data-bs-scroll="true" tabindex="-1" id="NavBarForSagarservice" aria-labelledby="sidebarBarLabel">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="index.php"><img class="companyLogo" src="img/logo.jpg" alt="Logo" style="height: 45px; object-fit:contain;"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0">
            <ul class="navbar-nav stroke ms-auto">
                <li class="nav-item navtext">
                    <a class="nav-link " aria-current="page" href="{{ url_for('home.index') }}"><i class="bi bi-house-door-fill me-2 fs-5"></i>Home</a>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link " href="#"><i class="bi bi-cpu me-2 fs-5"></i>Packages</a>
                </li>
                <li id="service_section_nav_link" class="nav-item navtext"></li>
                <script>
                    if (window.location.pathname == "/") {
                        $("#service_section_nav_link").html(`<a class="nav-link " href="#service-section"><i
                        class="bi bi-gear-wide-connected me-2 fs-5"></i>Services</a>`)
                    } else {
                        $("#service_section_nav_link").html('')
                    }
                </script>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link " href="#"><i class="bi bi-diagram-3 fs-6 me-2"></i>Places</a>
                </li>

                <li class="nav-item navtext">
                    <a class="nav-link " href="#"><i class="bi bi-x-diamond-fill me-2 fs-6"></i>About Us</a>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link" href="#"><i class="bi bi-telephone-inbound me-2 fs-6"></i>Contact Us</a>
                </li>
                <li>
                    <form class="d-flex" method="get" action="">
                        <div class="selection_container">
                            <input class="form-control me-2 search-box" type="search" placeholder="Search..." name="search_package" aria-label="Search">
                            <button class="btn btn-outline-primary select-btn" type="submit" name="search_btn">Search</button>
                        </div>
                    </form>
                </li>
            </ul>
            <div class="navbar-nav ms-auto px-1">
                <div class="Navbardropdown-container" onclick="toggleDropdown(this)">
                    <img src="img/AVTAR.jpg" style="object-fit: contain;" class="nav-item" height="50px" alt="Login">
                    <ul class="dropdown-menu px-0">
                        <li><a class="dropdown-item px-0" href="#">Profile</a>
                        </li>
                        <li><a class="dropdown-item px-0" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- header -->

    <!-- nav-bar top finished -->

    <section class="package" style="margin-top: 20px;">
        <div class="container ">
            <h4 class="heading_sm">Packages</h4>
            <h2 class="heading_lg">Tour Packages</h2>
            <div class="row">

                <?php
                if ($for == 'place') {
                ?>

                    <div class="col-lg-8">
                        <?php
                        if (mysqli_num_rows($check_key) > 0) {
                            $row = mysqli_fetch_assoc($check_key);
                            $pl_id = $row['PL_ID'];
                            $s = "SELECT * FROM `place_details` WHERE PL_ID = '$pl_id' ;";
                            $re = mysqli_query($conn, $s);
                            $ro = mysqli_fetch_assoc($re);
                        ?>
                            <!-- Blog Detail Start -->
                            <div class="pb-3">
                                <div class="blog-item">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" src="admin/image/places/<?php echo $row['PL_IMAGE1']; ?>" alt="">

                                    </div>
                                </div>
                                <div class="bg-white mb-3" style="padding: 30px;">
                                    <div class="d-flex mb-3">
                                        <h5>
                                            <a class="text-primary text-uppercase text-decoration-none" href="#"><?php echo $row['PL_LOCATION']; ?></a>
                                            <span class="text-primary px-2">|</span>
                                            <a class="text-primary text-uppercase text-decoration-none" href="#"><?php echo $row['PL_NAME']; ?></a>
                                        </h5>
                                    </div>
                                    <h2 class="mb-3"><?php echo $ro['HEADING_1']; ?></h2>
                                    <p><?php echo $ro['DESCRIPTION_1']; ?></p>
                                    <h4 class="mb-3"><?php echo $ro['HEADING_2']; ?></h4>
                                    <img class="img-fluid w-50 float-left mr-4 mb-2" src="admin/image/places/<?php echo $row['PL_IMAGE2']; ?>">
                                    <p><?php echo $ro['DESCRIPTION_2']; ?></p>
                                    <h5 class="mb-3"><?php echo $ro['HEADING_3']; ?></h5>
                                    <img class="img-fluid w-50 float-right ml-4 mb-2" src="admin/image/places/<?php echo $row['PL_IMAGE3']; ?>">
                                    <p><?php echo $ro['DESCRIPTION_3']; ?></p>
                                </div>
                            </div>
                            <!-- Blog Detail End -->

                            <!-- Comment List Start -->

                            <!-- Comment Form End -->

                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <?php
                        if (mysqli_num_rows($check_key) > 0) {
                            if ($for == 'key') {
                                while ($key_row = mysqli_fetch_assoc($check_key)) {
                                    $cp_id = $key_row['CP_ID'];
                                    $sql = "select * from co_package where CP_ID = '$cp_id';";
                                    $res = mysqli_query($conn, $sql);
                                    while ($rowData = (mysqli_fetch_assoc($res))) {
                                        $id = $rowData['CP_ID'];
                                        $whole_no = $rowData['TOTAL_SEAT'];
                                        $part = $rowData['AVL_SEAT'];
                                        $percentage = ($part / $whole_no) * 100;

                                        $detail_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$id';";
                                        $detail_res = mysqli_query($conn, $detail_sql);

                                        $detail_row = (mysqli_fetch_assoc($detail_res));
                        ?>

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


                                        <div class="card text-dark" style="background-color: rgb(245, 240, 240);">
                                            <a href="package_select.php?type=select&id=<?php echo $rowData['CP_ID']; ?>">
                                                <img src="Admin/image/packages/<?php echo $rowData['PL_IMAGE']; ?>" class="card-img-top" alt="Package photo">
                                                <div class="blog-date">
                                                    <h6 class="font-weight-bold mb-n1">20%</h6>
                                                    <small class="text-white text-uppercase">OFF</small>
                                                </div>
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
                    </div>
                <?php
                }
                if ($for == 'key') {
                ?>
                    <?php
                    if (mysqli_num_rows($check_key) > 0) {
                        while ($key_row = mysqli_fetch_assoc($check_key)) {
                            $cp_id = $key_row['CP_ID'];
                            $sql = "select * from co_package where CP_ID = '$cp_id';";
                            $res = mysqli_query($conn, $sql);
                            while ($rowData = (mysqli_fetch_assoc($res))) {
                                $id = $rowData['CP_ID'];
                                $whole_no = $rowData['TOTAL_SEAT'];
                                $part = $rowData['AVL_SEAT'];
                                $percentage = ($part / $whole_no) * 100;

                                $detail_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$id';";
                                $detail_res = mysqli_query($conn, $detail_sql);

                                $detail_row = (mysqli_fetch_assoc($detail_res));
                    ?>
                                <div class="col-lg-4">
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

                        <?php
                            }
                        }
                    } else {
                        ?>
                        <div class="d-flex justify-content-center" style="height: 50vh;">
                            <h4 class="heading_lg text-warning text-center mt-5">No Package Found</h4>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
    </section>

    <!-- About Section Start -->

</body>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php include 'footer.php'; ?>

<?php include 'js/link_js.php'; ?>

</html>