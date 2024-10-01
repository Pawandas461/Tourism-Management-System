<?php
include '../include/connect.php';

$sql2 = "SELECT * FROM `place`;";
$place_all = mysqli_query($conn, $sql2);

$sql_staff = "SELECT * FROM `staff`;";
$res_staff = mysqli_query($conn, $sql_staff);

if (isset($_POST['submit'])) {
    // collect value of input field
    $pl_name = $_POST['pl_name'];
    $pl_location = $_POST['pl_location'];
    $pl_address = $_POST['pl_address'];
    $p_name = $_POST['p_name'];
    $p_cost = $_POST['p_cost'];
    $duration = $_POST['duration'];
    $total_seat = $_POST['total_seat'];
    $avl_seat = $_POST['avl_seat'];
    // $vehicle = $_POST['vehicle'];
    // $hotel = $_POST['hotel'];
    $restaurant = $_POST['restaurant'];
    $p_type = $_POST['p_type'];
    $guid = $_POST['guid'];
    $p_date = $_POST['p_date'];
    $tourist = $_POST['tourist_count'];

    $pl_image = $_FILES['pl_image']['name'];
    move_uploaded_file($_FILES['pl_image']['tmp_name'], '../image/packages/' . $pl_image);

    $sql = "INSERT INTO `co_package`(`PL_LOCATION`, `P_NAME`, `PL_NAME`, `PL_ADDRESS`, `P_COST`, `DURATION`, `TOTAL_SEAT`, `AVL_SEAT`, `RESTAURANT`, `P_TYPE`, `TOUR_GUID_NAME`, `PL_IMAGE`, `P_DATE`, `TOURIST_NUMBER`) VALUES ('$pl_location','$p_name','$pl_name','$pl_address','$p_cost','$duration','$total_seat','$avl_seat','$restaurant','$p_type','$guid','$pl_image','$p_date', '$tourist');";
    if (mysqli_query($conn, $sql)) {
?>
        <script>
            alert("New Package Added");
        </script>
<?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

require('../include/header.php');
?>
<style>
    .form {
        margin: 60px 120px 20px 120px;
        padding: 40px;
        border: 2px solid #e1d6d6;
        border-radius: 8px
    }
</style>

</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">Packages</div>



        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="package.php">Manage Packages</a>
                <a href="add_package.php">Add Packages</a>
            </div>

        </header>

        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Packages | Add Packages</span>
            </div>
        </nav>

        <!-- ################### Add Package form Start ##################-->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="packageForm">


                <div class="">
                    <label for="pl_name" class="form-label">Select Place</label>
                </div>

                <div class="d-flex mb-3">
                    <span class="input-group-text">Select</span>

                    <select class="form-select rounded-0" aria-label="Default select example" name="pl_name" id="pl_name">
                        <option selected>Place Name</option>
                        <?php
                        while ($row_place = (mysqli_fetch_assoc($place_all))) {
                        ?>
                            <option value="<?php echo $row_place['PL_NAME']; ?>"><?php echo $row_place['PL_NAME']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <input id="pl_location" placeholder="Location" name="pl_location" type="text" aria-label="pl_location" class="ms-3 form-control rounded-0">

                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pl_address" class="form-label">Location Address</label>
                        <input placeholder="Location Address" name="pl_address" type="text" aria-label="pl_address" class="form-control" id="pl_address">
                    </div>

                    <div class="col-md-6">
                        <label for="p_name" class="form-label ">Package Name</label>
                        <input placeholder="Package Name" name="p_name" type="text" aria-label="p_name" class="form-control" id="p_name">
                    </div>
                </div>

                <div class="row mb-3 mt-4">

                    <div class="col-md-4">
                        <label for="p_cost" class="form-label ">Package Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">INR</span>
                            <input name="p_cost" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <div class="range-input">
                                <label for="customRange">Duration:</label>
                                <input type="range" name="duration" class="form-range" id="customRange" min="1" max="8" value="">
                                <!-- Display the selected value -->
                                <div class="selected-value text-center">Package Duration: <span id="selectedValue"></span> Days</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tourist">
                            <div class="mb-1">
                                Select Tourist Number
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button" onclick="decrement('adultCount')">-</button>
                                <input type="number" name="tourist_count" placeholder="Person" class="form-control" id="adultCount">
                                <button class="btn btn-outline-secondary" type="button" onclick="increment('adultCount')">+</button>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="total_seat" class="form-label mt-3">Total Seats</label>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Number of seats</span>
                            <input name="total_seat" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="avl_seat" class="form-label mt-3">Available Seats</label>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Number of seats</span>
                            <input name="avl_seat" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <label for="restaurant" class="form-label">Add Restaurant</label>
                    <select id="restaurant" class="form-select" aria-label="Default select example" name="restaurant">
                        <option value="">Select Restaurant</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="p_type" class="form-label">Select Package type</label>
                    <select class="form-select" aria-label="Default select example" name="p_type">
                        <option selected>tour type</option>
                        <option value="Sea Side">Sea Side</option>
                        <option value="Mountain view">Mountain view</option>
                        <option value="Jungle Adventure">Jungle Adventure</option>
                        <option value="River">River</option>
                        <option value="Historical Place">Historical Place</option>
                        <option value="City Tour">City Tour</option>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <input type="date" name="p_date" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Date</label>
                </div>
                <div class="mb">
                    <label for="guid" class="form-label">Tour Guid Name</label>
                    <select class="form-select" aria-label="Default select example" name="guid">
                        <option selected>Staff Name</option>
                        <?php
                        while ($rowStaff = (mysqli_fetch_assoc($res_staff))) {
                        ?>
                            <option value="<?php echo $rowStaff['ST_NAME']; ?>"><?php echo $rowStaff['ST_NAME']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="pl_image" class="form-label mt-3">Upload Image</label>
                </div>

                <div class="input-group mb-3">
                    <input type="file" name="pl_image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>


                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <!-- <button class="btn btn-primary" name="submit" type="submit">Create Package</button> -->
                    <input type="submit" class="btn btn-success" name="submit" value="Create Package">
                </div>

            </form>
        </div>

        <!-- Footer -->
        <?php
        include '../include/footer_in.php';
        ?>
        <!-- Footer -->

    </section>

    <script src="../js/navbar.js"></script>

    <script src="../js/ajaxCNDScript.min.js"></script>
    <script>
        function increment(inputId) {
            var input = document.getElementById(inputId);
            input.stepUp();
        }

        function decrement(inputId) {
            var input = document.getElementById(inputId);
            var inputValue = input.value;
            if(inputValue >=2){
                input.stepDown();
            }else{
                alert("Tourist cann't be less then 1");
            }
        }
        var rangeInput = document.getElementById('customRange');
        // Get the span element to display the selected value
        var selectedValueSpan = document.getElementById('selectedValue');

        // Add event listener to update selected value when input changes
        rangeInput.addEventListener('input', function() {
            // Update the text content of the span element with the selected value
            selectedValueSpan.textContent = rangeInput.value;
        });
        $(document).ready(function() {
            $('#pl_name').change(function() {
                var placeName = $(this).val();
                var hotelLocation = $(this).val();
                var restaurantLocation = $(this).val();
                var carLocation = $(this).val();

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
                    url: 'fetch_restaurant.php',
                    method: 'POST',
                    data: {
                        RES_LOCATION: restaurantLocation
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#restaurant').empty();
                        $('#restaurant').append('<option value="">Select a Restaurant</option>');
                        $.each(response, function(index, restaurant) {
                            $('#restaurant').append('<option value="' + restaurant.RES_NAME + '">' + restaurant.RES_NAME + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cars: ' + error);
                    }
                });
            });
        });
    </script>


</body>

</html>