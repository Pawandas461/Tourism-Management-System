<?php
require('../include/connect.php');
if (isset($_POST['submit'])) {
    // collect value of input field
    $name = $_POST['name'];
    $age = $_POST['age'];
    $staff_address = $_POST['staff_address'];
    $salary = $_POST['salary'];
    $join_date = $_POST['join_date'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];

    $image1 = $_FILES['image1']['name'];
    move_uploaded_file($_FILES['image1']['tmp_name'], '../image/staffs/' . $image1);

    $sql = "INSERT INTO `staff` (`ST_NAME`, `ST_AGE`, `ST_ADDR`, `ST_SALARY`, `ST_JOIN_DATE`, `ST_CONTACT`, `ST_TYPE`, `ST_IMAGE`) 
    VALUES ('$name','$age','$staff_address','$salary','$join_date','$phone', '$type','$image1')";

    if (mysqli_query($conn, $sql)) {

        header("Location: staff.php?success=1");
        exit();
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


        <div class="text">Staff</div>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="staff.php">Manage Staff</a>
                <a href="add_staff.php">Add staff</a>
            </div>

        </header>

        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage staff | Add staff</span>
            </div>
        </nav>


        <!-- add staff form -->
        <div class="form bg-light">
            <form action="" method="post" class="row" enctype="multipart/form-data" id="packageForm">

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">staff Name</label>
                    <input id="name" placeholder="Staff Name" name="name" type="text" aria-label="name" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input placeholder="Staff Age" name="age" type="number" aria-label="age" class="form-control" id="age">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="staff_address" class="form-label ">staff Address</label>
                    <textarea class="form-control" placeholder="Address" name="staff_address" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="salary" class="form-label ">Salary</label>
                    <input placeholder="In Rupees /-" name="salary" type="number" aria-label="salary" class="form-control" id="salary">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="join_date" class="form-label "> Joining Date </label>
                    <input class="form-control" type="date" name="join_date" id="exampleFormControlTextarea1" rows="3">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Contact Number :</label>
                    <input type="number" placeholder="Phone No." class="form-control" name="phone" id="exampleFormControlTextarea1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Select Staff Type :</label>
                    <select class="form-select" name="type" aria-label="Default select example">
                        <option selected>types...</option>
                        <option value="admin">Admin</option>
                        <option value="tour guide">Tour Guide</option>
                        <option value="staff">Normal Staff</option>
                    </select>
                </div>

                <label for="image1" class="form-label">staff Image:</label>
                <div class="input-group mb-3">
                    <input type="file" name="image1" class="form-control" id="inputGroupFile01">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <!-- <button class="btn btn-primary" name="submit" type="submit">Create Package</button> -->
                    <input type="submit" class="btn btn-success" name="submit" value="Add staff">
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