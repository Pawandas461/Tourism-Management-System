<?php
require('../include/connect.php');
require('../include/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch package data based on ID
    $sql = "SELECT * FROM `co_package` WHERE `CP_ID` = $id";
    $result = mysqli_query($conn, $sql);

    // Check if package exists
    if (mysqli_num_rows($result) > 0) {
        $rowData = mysqli_fetch_assoc($result);
?>

        <style>
            .form {
                margin: 60px 120px 20px 120px;
                padding: 40px;
                border: 2px solid #e1d6d6;
                border-radius: 8px;
            }
        </style>
        </head>

        <body>
            <?php require('../include/sidebarmenu.php'); ?>

            <section class="home">
                <div class="text">Edit Package</div>
                <header>
                    <div class="navbar">
                        <a href="../index.php">Dashboard</a>
                        <a href="package.php">Manage Packages</a>
                        <a href="add_package.php">Add Packages</a>
                    </div>
                </header>
                <!-- As a heading -->
                <nav class="navbar navbar-light bg-light mt-5">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">Edit Package</span>
                    </div>
                </nav>
                <!-- Package edit form start -->
                <div class="form bg-light">
                    <form action="update_package.php" method="post" enctype="multipart/form-data" id="editForm">
                        <input type="hidden" name="p_id" value="<?php echo $rowData['CP_ID']; ?>">

                        <!-- Place select start -->
                        <div class="mb-3">
                            <label for="pl_name" class="form-label">Select Place</label>
                            <div class="d-flex">
                                <select class="form-select rounded-0" name="pl_name" id="pl_name">
                                    <?php
                                    $sql2 = "SELECT * FROM `place`;";
                                    $place_all = mysqli_query($conn, $sql2);
                                    while ($row_place = mysqli_fetch_assoc($place_all)) {
                                        $selected = ($row_place['PL_NAME'] == $rowData['PL_NAME']) ? 'selected' : '';
                                        echo "<option value='{$row_place['PL_NAME']}' {$selected}>{$row_place['PL_NAME']}</option>";
                                    }
                                    ?>
                                </select>
                                <input id="pl_location" name="pl_location" value="<?php echo $rowData['PL_LOCATION']; ?>" type="text" class="ms-3 form-control rounded-0" placeholder="Location">
                            </div>
                        </div>
                        <!-- Place select end -->

                        <div class="mb-3">
                            <label for="pl_address" class="form-label">Location Address</label>
                            <input name="pl_address" id="pl_address" type="text" class="form-control" value="<?php echo $rowData['PL_ADDRESS']; ?>" placeholder="Address">
                        </div>

                        <div class="mb-3">
                            <label for="p_name" class="form-label">Package Name</label>
                            <input name="p_name" id="p_name" type="text" class="form-control" value="<?php echo $rowData['P_NAME']; ?>" placeholder="Package Name">
                        </div>

                        <div class="mb-3">
                            <label for="p_cost" class="form-label">Package Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">INR</span>
                                <input name="p_cost" id="p_cost" type="number" class="form-control" value="<?php echo $rowData['P_COST']; ?>" placeholder="Package Cost">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Package Duration</label>
                            <input type="range" name="duration" class="form-range" id="customRange" min="1" max="8" value="<?php echo $rowData['DURATION']; ?>">
                            <div class="text-center">Package Duration: <span id="selectedValue"><?php echo $rowData['DURATION']; ?></span> Days</div>
                        </div>

                        <div class="mb-3">
                            <label for="total_seat" class="form-label">Total Seats</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" onclick="decrement('seatCount')">-</button>
                                <input name="total_seat" id="seatCount" type="number" class="form-control" value="<?php echo $rowData['TOTAL_SEAT']; ?>" placeholder="Total Seat">
                                <button class="btn btn-outline-secondary" type="button" onclick="increment('seatCount')">+</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="avl_seat" class="form-label">Available Seats</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" onclick="decrement('avlSeatCount')">-</button>
                                <input name="avl_seat" id="avlSeatCount" type="number" class="form-control" value="<?php echo $rowData['AVL_SEAT']; ?>" placeholder="Available Seat">
                                <button class="btn btn-outline-secondary" type="button" onclick="increment('avlSeatCount')">+</button>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="p_details" class="form-label">Package Details</label>
                            <textarea name="p_details" id="p_details" class="form-control" rows="3" placeholder="Package Details"><?php echo $rowData['P_DETAILS']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="vehicle" class="form-label">Add Vehicle</label>
                            <select id="vehicle" name="vehicle" class="form-select">
                                <option value="">Select Vehicle</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="hotel" class="form-label">Add Hotel</label>
                            <select id="hotel" name="hotel" class="form-select">
                                <option value="">Select Hotel</option>
                            </select>
                        </div> -->

                        <div class="mb-3">
                            <label for="restaurant" class="form-label">Add Restaurant</label>
                            <select id="restaurant" name="restaurant" class="form-select">
                                <option value="">Select Restaurant</option>
                                <?php
                                $l = $rowData['PL_LOCATION'];
                                $temp = "SELECT * FROM `restaurant` WHERE `RES_LOCATION` = '$l'";
                                $r = mysqli_query($conn, $temp);
                                while ($ro = mysqli_fetch_assoc($r)) {
                                    $selected = ($ro['RES_NAME'] == $rowData['RES_NAME']) ? 'selected' : '';
                                    echo "<option value='{$ro['RES_NAME']}' $selected>{$ro['RES_NAME']}</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="p_type" class="form-label">Select Package Type</label>
                            <select id="p_type" name="p_type" class="form-select">
                                <option value="">Tour Type</option>
                                <option value="Sea Side" <?php if ($rowData['P_TYPE'] == 'Sea Side') echo 'selected'; ?>>Sea Side</option>
                                <option value="Mountain View" <?php if ($rowData['P_TYPE'] == 'Mountain View') echo 'selected'; ?>>Mountain View</option>
                                <option value="Jungle Adventure" <?php if ($rowData['P_TYPE'] == 'Jungle Adventure') echo 'selected'; ?>>Jungle Adventure</option>
                                <option value="River" <?php if ($rowData['P_TYPE'] == 'River') echo 'selected'; ?>>River</option>
                                <option value="Historical Place" <?php if ($rowData['P_TYPE'] == 'Historical Place') echo 'selected'; ?>>Historical Place</option>
                                <option value="City Tour" <?php if ($rowData['P_TYPE'] == 'City Tour') echo 'selected'; ?>>City Tour</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="guid" class="form-label">Tour Guide Name</label>
                            <select id="guid" name="guid" class="form-select">
                                <option value="">Staff Name</option>
                                <?php
                                $sql_staff = "SELECT * FROM `staff`;";
                                $res_staff = mysqli_query($conn, $sql_staff);
                                while ($rowStaff = mysqli_fetch_assoc($res_staff)) {
                                    $selected = ($rowStaff['ST_NAME'] == $rowData['TOUR_GUID_NAME']) ? 'selected' : '';
                                    echo "<option value='{$rowStaff['ST_NAME']}' $selected>{$rowStaff['ST_NAME']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pl_image" class="form-label">Upload Image</label>
                            <div class="input-group">
                                <input type="file" name="pl_image" value="<?php echo $rowData['PL_IMAGE']; ?>" class="form-control">
                                <label class="input-group-text" for="pl_image">Upload</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="p_date" class="form-label">Date</label>
                            <div class="input-group">
                                <input type="date" name="p_date" class="form-control" value="<?php echo $rowData['P_DATE']; ?>">
                                <label class="input-group-text" for="p_date">Date</label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-flex justify-content-end">
                            <button class="btn btn-danger" type="button" onclick="window.history.back();">Cancel</button>
                            <input type="hidden" name="package_id" value="<?php echo $id; ?>"> <!-- Hidden field to send package ID for update -->
                            <input type="submit" class="btn btn-success" name="submit" value="Update Package">
                        </div>
                    </form>
                </div>

            </section>

            <script src="../js/navbar.js"></script>

            <!-- Ajax Start -->
            <script src="../js/ajaxCNDScript.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#pl_name').change(function() {
                        var placeName = $(this).val();

                        // AJAX request to fetch place details based on selected location
                        $.ajax({
                            url: 'fetch_place_details.php',
                            method: 'GET',
                            data: {
                                PL_NAME: placeName
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#pl_location').val(response.placeLocation);
                                $('#pl_address').val(response.placeAddress);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching place details: ' + error);
                            }
                        });

                        $.ajax({
                            url: 'fetch_hotel.php',
                            method: 'POST',
                            data: {
                                H_LOCATION: placeName
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#hotel').empty().append('<option value="">Select a Hotel</option>');
                                $.each(response, function(index, hotel) {
                                    $('#hotel').append('<option value="' + hotel.H_NAME + '">' + hotel.H_NAME + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching hotels: ' + error);
                            }
                        });

                        $.ajax({
                            url: 'fetch_restaurant.php',
                            method: 'POST',
                            data: {
                                RES_LOCATION: placeName
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#restaurant').empty().append('<option value="">Select a Restaurant</option>');
                                $.each(response, function(index, restaurant) {
                                    $('#restaurant').append('<option value="' + restaurant.RES_NAME + '">' + restaurant.RES_NAME + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching restaurants: ' + error);
                            }
                        });

                        $.ajax({
                            url: 'fetch_vehicle.php',
                            method: 'POST',
                            data: {
                                CAR_LOCATION: placeName
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#vehicle').empty().append('<option value="">Select a Vehicle</option>');
                                $.each(response, function(index, vehicle) {
                                    $('#vehicle').append('<option value="' + vehicle.CAR_NAME + '">' + vehicle.CAR_NAME + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching vehicles: ' + error);
                            }
                        });
                    });
                });
            </script>
            <!-- Ajax End -->
        </body>

        </html>

<?php
    } else {
        echo "Package not found.";
    }
} else {
    echo "Invalid request.";
}
?>