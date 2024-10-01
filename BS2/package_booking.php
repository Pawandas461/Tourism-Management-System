<?php
require('header.php');
$login_ok = $_SESSION['login_ok'];
if (!$login_ok) {
    echo '<script>
        alert("Please Login for process the booking!");
        window.location.href="login.php";
    </script>';
    exit;
}

if (isset($_GET['cp_id']) && $_GET['cp_id'] != '') {
    $cp_id = $_GET['cp_id'];

    $sql = "SELECT * FROM co_package WHERE CP_ID = '$cp_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    // Assign package details to variables
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
    $pl_image = $row['PL_IMAGE'];
}

if (isset($_POST['book'])) {
    $adultCount = get_safe_value($conn, $_POST['adultCount']);
    $childCount = get_safe_value($conn, $_POST['childCount']);
    $u_date = get_safe_value($conn, $_POST['u_date']);
    $email = get_safe_value($conn, $_POST['email']);
    $phone = get_safe_value($conn, $_POST['phone']);
    $booking_on = date('Y-m-d h:i:s');

    if ($avl_seat <= 0) {
        echo '<script>
            $(document).ready(function() {
                $(".seat_error").css("color", "red");
                $(".seat_error").html("Booking is already Full..! Select another package or wait for the package to open again");
            });
        </script>';
    } else {
        // Insert into package_booking
        $sql = "INSERT INTO package_booking(CP_ID, BOOK_EMAIL, BOOK_PHONE, ADULT_COUNT, CHILD_COUNT, TOUR_DATE, BOOKING_DATE) 
                VALUES ('$cp_id','$email','$phone','$adultCount','$childCount','$p_date','$booking_on')";
        $res = mysqli_query($conn, $sql);
        $book_id = mysqli_insert_id($conn);

        // Update available seats
        $avl_seat -= 1;
        $sql2 = "UPDATE co_package SET AVL_SEAT='$avl_seat' WHERE CP_ID = '$cp_id'";
        mysqli_query($conn, $sql2);

        // Insert into booking_detail
        $person_names = $_POST['person_name'];
        $person_ages = $_POST['person_age'];
        for ($i = 0; $i < count($person_names); $i++) {
            $person_name = get_safe_value($conn, $person_names[$i]);
            $person_age = get_safe_value($conn, $person_ages[$i]);
            $person_gender = get_safe_value($conn, $_POST['person_gender_' . ($i + 1)]);

            $sql_detail = "INSERT INTO booking_detail(BOOK_ID, PERSON_NAME, PERSON_AGE, PERSON_GENDER) 
                           VALUES ('$book_id', '$person_name', '$person_age', '$person_gender')";
            $Book_pack = mysqli_query($conn, $sql_detail);
        }
        echo '<script>
            $(document).ready(function() {
                $(".seat_error").css("color", "green");
                $(".seat_error").html("Your Booking is Successful..!");
                $(".bd").css("display", "none");
                $(".packages").css("display", "block");
            });
        </script>';
    }
}

?>

<body style="height: 100vh;">
    <!-- grid column -->

    <div class="container">
        <div class="row m-5 justify-content-center">
            <div class="col-12 bg-light shadow p-3 mb-3 bg-body rounded">
                <div class="success_message justify-content-around text-white p-2 m-1" style="background-color: #8df274; border-radius: 10px; display:none;">
                    Your request for tour package booking has been sent successfully...!
                </div>

                <div class="justify-content-around p-3" id="booking_form" style="background-color: #cae7ed;">
                    Tour Booking form
                </div>

                <div class="packages border mb-3" id="package" style="display: none;">
                    <div class="d-flex justify-content-around p-3" style="background-color: #cae7ed;">
                        PACKAGE DETAILS
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <img style="height: 20vh;" src="Admin/image/packages/<?php echo $pl_image; ?>" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-5">
                            <h3 class="heading-home"><?php echo $p_name; ?></h3><br>
                            <p>The Tour is about <?php echo $duration; ?> Days in the place <b><?php echo $pl_city; ?></b></p>
                            <p>Beautiful culture and famous History of this place is the iconic attraction</p>
                        </div>
                        <div class="col">
                            <center>
                                <div class="">
                                    <div class="date">
                                        <div class="detail_h">
                                            Tour Date
                                        </div>
                                        <div class="detail_v">
                                            <?php echo $p_date; ?>
                                        </div>
                                    </div>
                                    <div class="date">
                                        <div class="detail_h">
                                            Persons
                                        </div>
                                        <div class="detail_v">
                                            <?php echo $person . " Persons"; ?>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="row p-3">
                        View Your Tour Update
                        <a href="my_tours.php" class="btn btn-primary">Go to My tour</a>
                    </div>
                </div>

                <form action="" method="post" class="border border-info-subtle p-1 bd">
                    <div class="row  m-3">
                        <div class="col-md-8">
                            <div class="mb-3 text-primary fs-4">
                                Select only <?php echo $person; ?> Tourist
                            </div>
                            <div class="seat_error"></div>
                            <div class="tourists me-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-info-subtle">over 16</span>
                                    <button class="btn btn-outline-secondary border-info-subtle" type="button" onclick="decrement('adultCount')">-</button>
                                    <input type="number" placeholder="adults" name="adultCount" class="form-control rounded border-info-subtle" id="adultCount" required>
                                    <button class="btn btn-outline-secondary border-info-subtle" type="button" onclick="increment('adultCount')">+</button>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-info-subtle">below 16</span>
                                    <button class="btn btn-outline-secondary border-info-subtle" type="button" onclick="decrement('childCount')">-</button>
                                    <input type="number" placeholder="Children" name="childCount" class="form-control rounded border-info-subtle" id="childCount" required>
                                    <button class="btn btn-outline-secondary border-info-subtle" type="button" onclick="increment('childCount')">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class=""><i class="fa-regular fa-calendar-days"></i><b><?php echo $p_date; ?></b></label>
                            <select class="form-select border-info-subtle" name="u_date" aria-label="Default select example" required>
                                <option selected>Modify</option>
                                <option value="<?php echo $p_date; ?>"><?php echo $p_date; ?></option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="mb-3 text-primary fs-4">
                        Select Vehicle Seats for <?php //echo $person; 
                                                    ?> Tourist
                    </div>
                    <div class="choose_seat_btn mb-3">
                        <button type="button" onclick="seats()" class="btn btn-light" id="seat-btn">Available Seats</button>
                    </div> -->
                    <div class="m-3 text-primary fs-4">
                        Enter Contact details:
                    </div>
                    <div class="row mb-3 m-3">
                        <div class="col-md-6">
                            <label for="email">Enter Email.</label>
                            <input type="email" class="form-control rounded border-info-subtle" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Email Id" aria-label="Email Id" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary mt-4" type="button">Verify</button>
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Enter Mobile no.</label>
                            <input type="phone" class="form-control rounded border-info-subtle" name="phone" placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="m-3 text-primary fs-4">
                        Tourist details:
                    </div>
                    <div class="row mb-3 m-3 gap-3">
                        <?php for ($i = 1; $i <= $person; $i++) { ?>
                            <div class="col-md-5 rounded border border-info">
                                <span>Person <?php echo $i; ?></span>
                                <div class="input-group mb-3">
                                    <input type="text" name="person_name[]" class="form-control name border-info-subtle" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" name="person_age[]" class="form-control border-info-subtle" placeholder="Age" aria-label="number" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input border-info-subtle" type="radio" name="person_gender_<?php echo $i; ?>" value="Male" id="gender1_<?php echo $i; ?>" required>
                                    <label class="form-check-label" for="gender1_<?php echo $i; ?>">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input border-info-subtle" type="radio" name="person_gender_<?php echo $i; ?>" value="Female" id="gender2_<?php echo $i; ?>" required>
                                    <label class="form-check-label" for="gender2_<?php echo $i; ?>">Female</label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="contact d-flex gap-4 ms-4 mb-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">This package may be canceled for special reasons, in which case the customer will be refunded the full amount. If you read all the terms then confirm and proceed booking</label>
                        </div>
                    </div>
                    <div class="proceed d-flex gap-5 ms-4 justify-content-center">
                        <button type="submit" name="book" class="btn text-light w-50" style="background-color: #6666FF;">Book Now</button>
                    </div>
                </form>

            </div>
            <div class="popup">
                <div class="popup-content">
                    <button type="button" onclick="close_seat()" class="btn-close mb-3" aria-label="Close"></button>

                    <h3 style="text-align: center; color:black">Select Seats</h3>
                    <div class="seats-avl ps-3 pe-3 mb-3" style="text-align: center;">
                        <h4 style="color: green;">E</h4>
                        <?php
                        $s = 1;
                        $s_id = 1;
                        ?>
                        <div class="row">
                            <div class="col me-5 p-2 border">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                ?>
                                    <div class="row p-1">
                                        <div class="col"><button class="btn btn-success" id="<?php echo $s_id++; ?>"><?php echo $s++; ?></button></div>
                                        <div class="col"><button class="btn btn-success" id="<?php echo $s_id++; ?>"><?php echo $s++; ?></button></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col ms-5 p-2 border">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                ?>
                                    <div class="row p-1">
                                        <div class="col"><button class="btn btn-success" id="<?php echo $s_id++; ?>"><?php echo $s++; ?></button></div>
                                        <div class="col"><button class="btn btn-success" id="<?php echo $s_id++; ?>"><?php echo $s++; ?></button></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <h4 style="color: red;">L</h4>
                    </div>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>

    </div>

    <?php
    require('footer.php');
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var isBooked = <?php echo isset($Book_pack) ? 'true' : 'false'; ?>;
            if (isBooked) {
                document.querySelector('.bd').style.display = 'none';
                document.querySelector('#package').style.display = 'block';
                document.querySelector('#booking_form').style.display = 'none';
                document.querySelector('.success_message').style.display = 'block';
            }
        });

        function increment(inputId) {
            var input = document.getElementById(inputId);
            input.stepUp();
            checkTravellers();
        }

        function decrement(inputId) {
            var input = document.getElementById(inputId);
            input.stepDown();
            checkTravellers();
        }

        function checkTravellers() {
            var adultCount = parseInt(document.getElementById('adultCount').value);
            var childCount = parseInt(document.getElementById('childCount').value);
            var totalTravellers = adultCount + childCount;

            if (adultCount < 0) {
                document.getElementById('adultCount').value = 0;
                adultCount = 0;
            }
            if (childCount < 0) {
                document.getElementById('childCount').value = 0;
                childCount = 0;
            }

            if (totalTravellers > <?php echo $person; ?>) {
                $('.seat_error').css('color', 'red');
                $('.seat_error').html("You cannot select more than <?php echo $person; ?> tourists");
                $('button[name="book"]').prop('disabled', true);
            } else {
                $('.seat_error').html("");
                $('button[name="book"]').prop('disabled', false);
            }
        }

        $(document).ready(function() {

            $('#adultCount, #childCount').on('input', function() {
                checkTravellers();
            });
        });


        function seats() {
            $('.popup').css('display', 'flex');
        }

        function close_seat() {
            $('.popup').css('display', 'none');
        }

        <?php
        for ($i = 1; $i <= 20; $i++) {
        ?>
            $('#<?php echo $i; ?>').click(function() {
                $(this).css('background-color', 'red');
            });
        <?php
        }
        ?>

        function change_color() {

        }
    </script>

</body>

</html>