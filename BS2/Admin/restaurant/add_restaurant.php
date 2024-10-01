<?php
include '../include/connect.php';
if (isset($_POST['submit'])) {
    // collect value of input form-control
    $res_name = $_POST['res_name'];
    $res_location = $_POST['res_location'];
    $res_catagory = $_POST['res_catagory'];
    $res_contact = $_POST['res_contact'];
    $res_address = $_POST['res_address'];
    $res_descr = $_POST['res_descr'];

    $res_image = $_FILES['res_image']['name'];
    move_uploaded_file($_FILES['res_image']['tmp_name'], '../image/restaurants/'. $res_image);

    $sql = "INSERT INTO `restaurant`(`RES_NAME`, `RES_LOCATION`, `RES_CATEGORY`, `RES_CONTACT`, `RES_ADDR`, `RES_DESCR`, `RES_IMAGE`) VALUES ('$res_name','$res_location','$res_catagory','$res_contact','$res_address','$res_descr','$res_image')";
    $res = mysqli_query($conn, $sql);
    if (isset($res)) {
?>
        <script>
            alert("New Restaurant Added");
            window.location.href="restaurant.php";
        </script>
<?php
    }
}
require('../include/header.php');

$sql2 = "SELECT PL_LOCATION FROM `place`;";
$res = mysqli_query($conn, $sql2);
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
        <div class="text">Restaurants</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="restaurant.php">Manage Restaurant</a>
                <a href="add_restaurant.php">Add Restaurant</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home |Manage Restaurant</span>
            </div>
        </nav>

        <!--  Add restaurant form -->

        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label" for="res_name">Enter Restaurant Name</label>
                    <input type="text" class="form-control" name="res_name" placeholder="Restaurant Name">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_location">Location</label>
                    <select class="form-select" aria-label="Default select example" name="res_location" id="res_location">
                        <option selected>Place Name</option>
                        <?php
                        while ($row_place = (mysqli_fetch_assoc($res))) {
                        ?>
                            <option value="<?php echo $row_place['PL_LOCATION']; ?>"><?php echo $row_place['PL_LOCATION']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_catagory">Catagory</label>
                    <input type="text" class="form-control" name="res_catagory" placeholder="Catagory">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_contact">Contact No.</label>
                    <input type="text" class="form-control" name="res_contact" placeholder="Restaurant Phone Number">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_address">Restaurant Address</label>
                    <input type="text" class="form-control" name="res_address" placeholder="Address">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="res_descr">Resaturant Description</label>
                    <textarea class="form-control" placeholder="Short description of Restaurant" name="res_descr" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <label for="res_image" class="form-label mt-3">Upload Image</label>
                <div class="input-group mb-3">
                    <input type="file" name="res_image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" onclick="reloadPage()" id="cancel">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Add Restaurant">
                </div>


            </form>
        </div>


    </section>
    <script>
        function reloadPage() {
            location.reload();
        }
    </script>
    <script src="../js/navbar.js"></script>

</body>

</html>