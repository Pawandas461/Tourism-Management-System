<?php
require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Part 2</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="css/google.font.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top " id="nav">
        <div class="container-fluid" id="navContent">
            <a class="navbar-brand" href="index.php">
                <img class="companyLogo" src="img/logo.jpg" alt="Logo" style="height:45px; object-fit:contain;">
            </a>
            <button class="navbar-toggler bg-white border" type="button" data-bs-toggle="offcanvas" data-bs-target="#NavBarForSagarservice" aria-controls="NavBarForSagarservice" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fa-solid fa-bars"></i></span>
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
    <!-- Navbar End -->


    <!-- Header Start -->
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
    <!-- Header End -->


    <!-- Booking Start -->

    <!-- Booking End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/18.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p>Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/16.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/15.jpg" alt="">
                            </div>
                        </div>
                        <a href="" class="btn btn-primary mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guides</h6>
                <h1>Our Travel Guides</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/testimonial-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide No 1</h5>
                            <p class="m-0">Designation 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/testimonial-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide No 2</h5>
                            <p class="m-0">Designation 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/testimonial-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide No 3</h5>
                            <p class="m-0">Designation 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Guide No 4</h5>
                            <p class="m-0">Designation 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php include 'footer.php'; ?>
</body>

</html>