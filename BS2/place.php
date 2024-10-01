<?php
require('header.php');
?>

<body style="height: 100vh;">

    <!-- header -->

    <section class="package" id="packages" style="margin-top: 40px;">
        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h4 class="heading_sm">Places</h4>
            <h2 class="heading_lg">Destination Suggest</h2>
            
            <div class="place-container">
                <!-- Sample Place Card -->
                <?php
                $sql = "SELECT * FROM place;";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <a href="view_place.php?type=place&location=<?php echo $row['PL_LOCATION']; ?>">
                        <div class="place-card mb-5 rounded-0">
                            <img src="Admin/image/places/<?php echo $row['PL_IMAGE1']; ?>" alt="Sample Place" class="place-image">
                            <div class="place-details">
                                <a href="view_place.php?type=place&location=<?php echo $row['PL_LOCATION']; ?>" class="text-dark text-decoration-none">
                                    <h3 class="place-name"><?php echo $row['PL_LOCATION']; ?></h3>
                                </a>
                                <p class="place-description"><?php echo $row['PL_DESCR']; ?></p>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section Start -->

</body>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php

require('footer.php');
?>

<?php include 'js/link_js.php'; ?>

</html>