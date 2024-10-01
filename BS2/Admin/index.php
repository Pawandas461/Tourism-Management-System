<?php
require('include/d_header.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

?>

<section class="home">

    <header>

        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="package/package.php">Packages</a>
            <a href="place/place.php">Places</a>
            <a href="Keyword/keywords.php">Searching Keywords</a>
            <a href="staff/staff.php">Staff</a>
            <a href="vehicle/vehicle.php">Vehicles</a>
            <a href="tourist/tourist.php">Tourists</a>
        </div>

    </header>

    <nav class="navbar navbar-light bg-light mt-5">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Home</span>
        </div>
    </nav>

   
        <div class="container">

            <div class="row ">

                <div class="card m-3" style="width: 18rem;">
                    <img src="image/package.jpg" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title">Packages</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="package/package.php" class="btn btn-primary">Manage Packages</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                    <img src="image/place.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Places</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="place/place.php" class="btn btn-primary">Manage Places</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                    <img src="image/booking.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">All Booking</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="booking/booking.php" class="btn btn-primary">Manage Booking</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                    <img src="image/tourist.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tourists</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="tourist/tourist.php" class="btn btn-primary">Manage Tourists</a>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="image/vehicle.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Vehicles</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="vehicle/vehicle.php" class="btn btn-primary">Manage Vehicles</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                    <img src="image/restaurant.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Restaurants</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="restaurant/restaurant.php" class="btn btn-primary">Manage Restaurants</a>
                    </div>
                </div>
    
                <div class="card m-3" style="width: 18rem;">
                    <img src="image/hotel.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hotels</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="hotel/hotel.php" class="btn btn-primary">Manage Hotels</a>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="image/hotel.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">KeyWords To search </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="Keyword/keywords.php" class="btn btn-primary">Specify Keywords</a>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="image/tourist.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Package Details</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="package/package_details.php" class="btn btn-primary">Package Details</a>
                    </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                    <img src="image/restaurant.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">User Queries</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="massages/user_queries.php" class="btn btn-primary">User Queries</a>
                    </div>
                </div>
            </div>
        </div>
 

</section>

<script src="js/navbar.js"></script>

</body>

</html>