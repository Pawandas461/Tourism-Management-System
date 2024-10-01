<?php
require('../include/connect.php');
if (isset($_POST['submit'])) {
    // collect value of input field
    $pl_name = $_POST['pl_name'];
    $pl_location = $_POST['pl_location'];
    $pl_address = $_POST['pl_address'];
    $attraction = $_POST['attraction'];
    $sights = $_POST['sights'];
    $pl_descr = $_POST['pl_descr'];

    $image1 = $_FILES['image1']['name'];
    move_uploaded_file($_FILES['image1']['tmp_name'], '../image/places/' . $image1);

    $image2 = $_FILES['image2']['name'];
    move_uploaded_file($_FILES['image2']['tmp_name'], '../image/places/' . $image2);

    $image3 = $_FILES['image3']['name'];
    move_uploaded_file($_FILES['image3']['tmp_name'], '../image/places/' . $image3);

    $image4 = $_FILES['image4']['name'];
    move_uploaded_file($_FILES['image4']['tmp_name'], '../image/places/' . $image4);

    $sql = "INSERT INTO `place` (`PL_NAME`, `PL_LOCATION`, `PL_ADDR`, `ATRACTIONS`, `SIGHT_SEEING`, `PL_DESCR`, `PL_IMAGE1`, `PL_IMAGE2`, `PL_IMAGE3`, `PL_IMAGE4`) VALUES ('$pl_name','$pl_location','$pl_address','$attraction','$sights','$pl_descr','$image1','$image2','$image3','$image4')";

    if (mysqli_query($conn, $sql)) {
?>
        <script>
            alert("New Place Added");
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


        <div class="text">Places</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="place.php">Manage Place</a>
                <a href="add_place.php">Add Place</a>
            </div>

        </header>

        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Place | Add Place</span>
            </div>
        </nav>


        <!-- add place form -->
        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="packageForm">

                <div class="mb-3">
                    <label for="pl_name" class="form-label">Place Name</label>
                    <input id="pl_name" placeholder="Location" name="pl_name" type="text" aria-label="pl_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pl_location" class="form-label">Location/city</label>
                    <input placeholder="Location Name" name="pl_location" type="text" aria-label="pl_location" class="form-control" id="pl_location">
                </div>

                <div class="mb-3">
                    <label for="pl_address" class="form-label ">Place Address</label>
                    <input placeholder="Location Address" name="pl_address" type="text" aria-label="pl_address" class="form-control" id="pl_address">
                </div>

                <div class="mb-3">
                    <label for="attraction" class="form-label ">Special Attraction</label>
                    <input placeholder="Example sea/mountain etc." name="attraction" type="text" aria-label="attraction" class="form-control" id="attraction">
                </div>

                <div class="mb-3">
                    <label for="sights" class="form-label "> Total Sight Seeing </label>
                    <textarea class="form-control" placeholder="Example 1 river 2 hill etc." name="sights" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="pl_descr" class="form-label">Place Description</label>
                    <textarea class="form-control" name="pl_descr" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <label for="image1" class="form-label">Place Image 1</label>
                <div class="input-group mb-3">
                    <input type="file" name="image1" class="form-control" id="inputGroupFile01">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                </div>

                <label for="image2" class="form-label">Place Image 2</label>
                <div class="input-group mb-3">
                    <input type="file" name="image2" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <label for="image3" class="form-label">Place Image 3</label>
                <div class="input-group mb-3">
                    <input type="file" name="image3" class="form-control" id="inputGroupFile03">
                    <label class="input-group-text" for="inputGroupFile03">Upload</label>
                </div>

                <label for="image4" class="form-label">Place Image 4</label>
                <div class="input-group mb-3">
                    <input type="file" name="image4" class="form-control" id="inputGroupFile04">
                    <label class="input-group-text" for="inputGroupFile04">Upload</label>
                </div>


                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <!-- <button class="btn btn-primary" name="submit" type="submit">Create Package</button> -->
                    <input type="submit" class="btn btn-success" name="submit" value="Add Place">
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