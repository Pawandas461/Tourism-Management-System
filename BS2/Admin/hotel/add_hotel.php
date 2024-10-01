<?php
require('../include/connect.php');
require('../include/header.php');
if (isset($_POST['submit'])) {
    // collect value of input field
    $h_name = $_POST['h_name'];
    $h_location = $_POST['h_location'];
    $h_address = $_POST['h_address'];
    $phone = $_POST['h_contact'];
    $h_descr = $_POST['h_descr'];
    $total_rooms = $_POST['total_rooms'];
    $avl_rooms = $_POST['avl_rooms'];
    $room_rent = $_POST['room_rent'];

    $h_image = $_FILES['h_image']['name'];
    move_uploaded_file($_FILES['h_image']['tmp_name'], '../image/hotels/'. $h_image);

    $sql = "INSERT INTO `hotel` (`H_NAME`, `H_LOCATION`, `H_ADDR`, `H_CONTACT`, `H_DESCR`, `TOTAL_ROOMS`, `AVL_ROOMS`, `ROOM_RENT`,`H_IMAGE`) VALUES ('$h_name','$h_location','$h_address','$phone','$h_descr','$total_rooms','$avl_rooms','$room_rent','$h_image')";
    if (mysqli_query($conn, $sql)) {
?>
        <script>
            alert("New Hotel Added");
            window.location.href="hotel.php";
        </script>
<?php
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql2 = "SELECT * FROM `place`";
$result = mysqli_query($conn, $sql2);
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


        <div class="text">Hotels</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="hotel.php">Manage Hotel</a>
                <a href="add_hotel.php">Add Hotel</a>
            </div>

        </header>

        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Hotel | Add Hotel</span>
            </div>
        </nav>


        <!-- add Hotel form -->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="hotelForm">

                <div class="mb-3">
                    <label for="h_name" class="form-label">Hotel Name</label>
                    <input id="h_name" placeholder="Hotel Name" name="h_name" type="text" aria-label="h_name" class="form-control">
                </div>


                <div class="mb-3">
                    <label for="h_location" class="form-label">Location/city</label>
                    <select class="form-select" aria-label="Default select example" name="h_location" id="h_location">
                        <option selected>Hotel Location</option>
                        <?php
                        while ($rowData = (mysqli_fetch_assoc($result))) {
                        ?>
                            <option value="<?php echo $rowData['PL_LOCATION']; ?>"><?php echo $rowData['PL_LOCATION']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="h_address" class="form-label ">Hotel Address</label>
                    <input placeholder="Hotel Address" name="h_address" type="text" aria-label="h_address" class="form-control" id="h_address">
                </div>

                <div class="mb-3">
                    <label for="h_contact" class="form-label ">Hotel contact</label>
                    <input placeholder="Phone Number" name="h_contact" type="text" aria-label="h_contact" class="form-control" id="h_contact">
                </div>

                <div class="mb-3">
                    <label for="h_descr" class="form-label">Hotel Description</label>
                    <textarea class="form-control" name="h_descr" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="total_rooms" class="form-label ">Total number of rooms</label>
                    <input name="total_rooms" type="number" aria-label="total_rooms" class="form-control" id="total_rooms">
                </div>

                <div class="mb-3">
                    <label for="avl_rooms" class="form-label ">Available rooms</label>
                    <input name="avl_rooms" type="number" aria-label="avl_rooms" class="form-control" id="avl_rooms">
                </div>

                <div class="mb-3">
                    <label for="room_rent" class="form-label ">Rent of per room</label>
                    <input name="room_rent" type="number" aria-label="room_rent" class="form-control" id="room_rent">
                </div>
                
                <label for="h_image" class="form-label mt-3">Upload Image</label>
                <div class="input-group mb-3">
                    <input type="file" name="h_image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <!-- <button class="btn btn-primary" name="submit" type="submit">Create Package</button> -->
                    <input type="submit" class="btn btn-success" name="submit" value="Add Hotel">
                </div>

            </form>
        </div>

        <?php
        require('../include/footer_in.php');
        ?>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>