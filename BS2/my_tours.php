<?php
require('header.php');
$email = $_SESSION['email'];

if (isset($_GET['type']) && $_GET['type'] == 'delete_booking') {
    $b_id = $_GET['id'];
    $sql = "DELETE FROM `package_booking` WHERE BOOK_ID = '$b_id'";
    if (mysqli_query($conn, $sql)) {
?>
        <script>
            window.history.back();
            alert("booking deleted");
        </script>
<?php
    } else {
        echo "Something wrong";
    }
}

?>

<body>

    <div class="container mt-4">
        <div class="row">
            <?php
            // Use INNER JOIN to fetch data from multiple tables
            $sql = "SELECT pb.*, cp.*, cp.P_NAME as package_name, cp.PL_NAME as place_name FROM `package_booking` pb
                        INNER JOIN `co_package` cp ON pb.CP_ID = cp.CP_ID
                        WHERE pb.BOOK_EMAIL = '$email';";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $b_id = $row['BOOK_ID'];
                $status = $row['BOOKING_STATUS'];

            ?>
                <div id="tour_sort" class="col-mb-12 bg-light p-3 mb-5 bg-body ">

                    <div class="p-3 m-2 text-center">
                        <h4> <b> Package Name: </b> <small><b class="text-success"> <?php echo $row['package_name']; ?></b></small></h4>
                    </div>
                    <div class="row p-3 mt-3">
                        <div class="col-md-12">
                            <div class="p_img">
                                <img style="object-fit: cover; height:250px;  min-width: 300px;" src="Admin/image/packages/<?php echo $row['PL_IMAGE']; ?>" alt="Place Image">
                                <div class="cen"><b><?php echo $row['PL_ADDRESS']; ?></b></div>
                            </div>
                        </div>
                    </div>  
                    <div class="row p-3 mt-3">
                    <div class="col-md-12">
                            <h4 class="card-title"><b> Duration </b></h4>
                            <p class="text-success"><?php echo $row['DURATION']; ?> Days</p>
                        </div>
                    </div>
                    <div class="row p-3 mt-3">
                        <div class="col-md-12">

                            <h4 class="card-title"> <b> <?php echo $row['place_name']; ?></b></h4>
                            <?php
                            $dls = $row['CP_ID'];
                            $details_sql = "SELECT * FROM `package_details` WHERE CP_ID = '$dls';";
                            $detail_res = mysqli_query($conn, $details_sql);
                            $details_row = (mysqli_fetch_assoc($detail_res));
                            for ($i = 1; $i <= $row['DURATION']; $i++) {
                                $p_descr[$i] = $details_row['DAY' . $i];

                            ?>
                                <h5 class="text-success">Day <?php echo $i; ?></h5>
                                <p><?php echo $p_descr[$i]; ?></p>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <div class="row p-3 mt-3">
                        <div class="col-md-12">
                            <h4 class="box text-center"><b>Booking status</b></h4>
                            <?php
                            if ($status == 0) {
                            ?>
                                <div class="status text-center mt-4 text-warning border p-1">Waiting</div>
                            <?php
                            } elseif ($status == 1) {
                            ?>
                                <div class="status text-center text-success mt-4 border p-1">Approved</div>
                            <?php
                            } else {
                            ?>
                                <div class="container d-flex gap-4 align-items-center mt-4">
                                    <div class="status text-center text-danger border p-1">Canceled</div>
                                    <a href="?type=delete_booking&id=<?php echo $b_id; ?>">
                                        <button class="delete-button">
                                            <img src="img/del_img.jpg" style="height: 50px; width: 50px;" alt="Delete" width="20" height="20">
                                        </button>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row mt-3 ms-5 me-5">
                        <div class="view_details text-center w-100">
                            <button class="btn btn-light border" onclick="view_details(<?php echo $b_id; ?>)">
                                Booking details <i class="fa-solid fa-angle-down"></i>
                            </button>
                        </div>

                    </div>

                    <!-- details part -->

                    <div id="tour_details_<?php echo $b_id; ?>" class="container col-11 bg-light shadow p-3 mb-5 bg-body rounded" style="display: none;">

                        <div class="container w-100 text-center">
                            <div class="row w-100">
                                <div class="col-md-6 w-100 text-start">
                                    <h2 class="h4">Package Information</h2>
                                    <ul class="m-4">

                                        <li><span class="label mt-3">Booking Date:</span> <span id="booking-date"><?php echo $row['BOOKING_DATE']; ?></span></li>
                                        <li><span class="label mt-3">Tour Date:</span> <span id="tour-date"><?php echo $row['TOUR_DATE']; ?></span></li>
                                        <li><span class="label mt-3">Package Name:</span> <span id="package-name"><?php echo $row['package_name']; ?></span></li>
                                        <li><span class="label mt-3">Place Name:</span> <span id="place-name"><?php echo $row['place_name']; ?></span></li>
                                        <li><span class="label mt-3">Number of Persons:</span> <span id="seat-numbers"><?php echo $row['ADULT_COUNT'] + $row['CHILD_COUNT']; ?></span></li>
                                        <li><span class="label mt-3">Package Cost:</span>INR <span id="package-cost"><?php echo $row['P_COST']; ?>/-</span></li>
                                        <li><span class="label mt-3">Payment Status:</span> <span id="payment-status" class="label-success"><?php echo $status == 1 ? 'Paid' : 'Not Paid'; ?></span></li>
                                        <?php
                                        if ($status == 1) {
                                        ?>
                                            <button class="btn btn-success mt-3" onclick="downloadTicket(<?php echo $b_id; ?>)">Download Ticket</button>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php
            }
            ?>


        </div>
    </div>


    <script>
        function view_details(b_id) {
            // Hide all tour details sections
            $('[id^=tour_details_]').hide();
            // Show the tour details section corresponding to the booking ID
            $("#tour_details_" + b_id).show();
        }

        function downloadTicket(b_id) {
            var bookingDetails = {
                bookingDate: "March 12, 2024",
                tourDate: "March 15, 2024",
                packageName: "Package A",
                placeName: "Destination X",
                seatNumbers: "1, 2, 3",
                packageCost: "$500",
                paymentStatus: "Paid"
            };

            var pdfContent = `
                <h1>Booking Details</h1>
                <p><strong>Booking Date:</strong> ${bookingDetails.bookingDate}</p>
                <p><strong>Tour Date:</strong> ${bookingDetails.tourDate}</p>
                <p><strong>Package Name:</strong> ${bookingDetails.packageName}</p>
                <p><strong>Place Name:</strong> ${bookingDetails.placeName}</p>
                <p><strong>Booking Seat Numbers:</strong> ${bookingDetails.seatNumbers}</p>
                <p><strong>Package Cost:</strong> ${bookingDetails.packageCost}</p>
                <p><strong>Payment Status:</strong> ${bookingDetails.paymentStatus}</p>
            `;

            var win = window.open('', '_blank');
            win.document.write(pdfContent);
            win.document.close();

            // Print the PDF
            win.print();
        }
    </script>
</body>
<?php
require('footer.php');
?>

</html>