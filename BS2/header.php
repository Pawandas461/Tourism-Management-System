<?php
require('functions.inc.php');
require('connect.php');

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2</title>
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="css/google.font.css" rel="stylesheet">

    <style>
        .p_img {
            position: relative;
            text-align: center;
            color: white;
        }

        .cen {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 25px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top " id="nav">
        <div class="container-fluid" id="navContent">
            <a class="navbar-brand" href="index.php">
                <img class="companyLogo" src="img/logo.jpg" alt="Logo" style="height:45px; object-fit:contain;">
            </a>
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
                                <input class="form-control me-2 search-box" type="search" placeholder="Search Destinations..." name="search_package" aria-label="Search">
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
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="signup.php">Signup</a></li>
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
                    <a class="nav-link " aria-current="page" href="index.php"><i class="fa-solid fa-house me-2"></i>Home</a>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link " href="package.php"><i class="fa-brands fa-product-hunt me-2"></i>Packages</a>
                </li>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link " href="place.php"><i class="fa-solid fa-location-dot me-2"></i>Places</a>
                </li>
                <?php
                if (isset($_SESSION['login_ok'])) {

                ?>
                    <li class="nav-item navtext">
                        <a class="nav-link " href="my_tours.php"><i class="fa-solid fa-record-vinyl me-2"></i>My Tours</a>
                    </li>
                <?php
                }
                ?>

                <li class="nav-item navtext">
                    <a class="nav-link " href="about_us.php"><i class="fa-solid fa-circle-info me-2"></i>About Us</a>
                </li>
                <li class="nav-item navtext">
                    <a class="nav-link" href="conntact_us.php"><i class="fa-regular fa-address-book me-2"></i>Contact Us</a>
                </li>
                <?php
                if (isset($_SESSION['login_ok'])) {

                ?>
                    <li class="nav-item navtext">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user me-2"></i>My Account</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item navtext">
                        <a class="nav-link" href="login.php"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                    </li>
                    <li class="nav-item navtext">
                        <a class="nav-link" href="signup.php"><i class="fa-solid fa-user-plus me-2"></i>Signup</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>