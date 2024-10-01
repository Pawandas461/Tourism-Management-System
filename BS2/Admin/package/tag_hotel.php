<?php
// Include database connection and header
include '../include/connect.php';
require('../include/header.php');

$qr = "select * from hotel;";
$r = mysqli_query($conn, $qr);


if (isset($_GET['type']) && $_GET['type'] == 'tag_hotel') {
    $cp_id = $_GET['id'];
    $query = "SELECT * FROM `co_package` WHERE CP_ID = '$cp_id';";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $t_seat = $row['TOTAL_SEAT'];
}

if (isset($_POST['submit'])) {

    $H_id = $_POST['hotel'];

    $sql = "select * from hotel where H_ID='$H_id';";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $H_name = $row['H_NAME'];
    $insrt = "INSERT INTO `tag_hotels`(`CP_ID`, `H_NAME`, `H_ID`) VALUES ('$cp_id','$H_name','$H_id')";
    $do = mysqli_query($conn, $insrt);
    if ($do) {
        $update_details = "UPDATE `co_package` SET `HOTEL` = '1' WHERE CP_ID = '$cp_id'";
        mysqli_query($conn, $update_details);
?>
        <script>
            alert("Hotel is Tagged Now");
            window.location.href = "package.php";
        </script>
<?php
    } else {
        echo "Hoy Nai";
    }
}

?>

<!-- HTML content -->
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
        <!-- Header -->
        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="package.php">Manage Packages</a>
                <a href="add_package.php">Add Packages</a>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light mt-5">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Manage Packages | Add Details</span>
            </div>
        </nav>

        <!-- Add Package Form -->
        <div class="form bg-light">
            <form action="" method="post" id="packageForm">
                <center>
                    <h3 style="font-family: sans-serif; color:black"><b>Add hotel to the Package</b></h3>
                </center>
                <ul class="list-group mb-3">
                    <li class="list-group-item active" aria-current="true">Package</li>
                    <li class="list-group-item" id="">Total available Seats for package <b><?php echo $t_seat; ?></b></li>
                    <li class="list-group-item" id="">Trip Date in Package <b><?php echo $row['P_DATE']; ?></b></li>
                    <li class="list-group-item" id="">Place Location <b id="location"><?php echo $row['PL_LOCATION']; ?></b></li>
                </ul>

                <div class="mb-3">
                    <label for="hotel" class="form-label">Add hotel</label>
                    <select id="hotel" class="form-select" aria-label="Default select example" name="hotel">
                        <?php
                        while ($row_H = (mysqli_fetch_assoc($r))) {
                        ?>
                            <option value="<?php echo $row_H['H_ID']; ?>"><?php echo $row_H['H_NAME'] . ", " . $row_H['H_LOCATION']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" onclick="goback()" type="button">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Create Package">
                </div>
            </form>
        </div>

        <!-- Footer -->
        <?php include '../include/footer_in.php'; ?>

    </section>

    <script src="../js/navbar.js"></script>


</body>

</html>