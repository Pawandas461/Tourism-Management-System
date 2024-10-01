<?php
include '../include/connect.php';
if (isset($_POST['register'])) {
    // collect value of input field
    $pl_name = $_POST['pl_name'];  //Using $_REQUEST Superglobal
    $pl_address = $_POST['pl_address'];
    $feed = $_POST['feed'];
    $attraction = $_POST['attraction'];

    if (empty($pl_name) && empty($pl_address) && empty($feed) && empty($attraction)) {
        echo 'You Have to Fill All requerd fields';
    } else {

        $sql = "INSERT INTO `place`(`PL_ NAME`, `PL_ADDR`, `PL_FEEDBACK`, `ATRACTIONS`) VALUES ('$pl_name','$pl_address','$feed','$attraction')";
        mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Tourism Management Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="../package/addpack_Form.css" />
    <style>
        header .navbar {
            margin-top: 30px;
            border-radius: 6px;
        }

        .plform {
            margin: 60px 20px 20px 20px;
        }
    </style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home" style="height: 100%;">


        <div class="text">Places</div>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Add Places</span>
            </div>
        </nav>

        <header>

            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="place.php">View all Place</a>
                <a href="add_place.php">Add New Place</a>
                <a href="manage_place.php">Manage Places</a>
            </div>

        </header>
        <?php
        $sql = "select * from place;";
        $res = mysqli_query($conn, $sql);
        ?>
        <div class="plform">
        <table class="table table-hover table-primary table-bordered">
                <thead>
                    <th>Place Id</th>
                    <th>Place Name</th>
                    <th>Place Address</th>
                    <th>Feedback</th>
                    <th>Attraction</th>
                    <th>Place Image</th>
                    <th>Manage Place</th>
                </thead>

                <?php
                while ($rowData = (mysqli_fetch_assoc($res))) {
                ?>

                    <tr>
                        <td><?php echo $rowData['PL_ID']; ?></td>
                        <td><?php echo $rowData['PL_ NAME']; ?></td>
                        <td><?php echo $rowData['PL_ADDR']; ?></td>
                        <td><?php echo $rowData['PL_FEEDBACK']; ?></td>
                        <td><?php echo $rowData['ATRACTIONS']; ?></td>
                        <td></td>
                        <td class="dt">
                            <div class="bt">
                                <button class="btn btn-success"><a href="edit_place.php?type=edit&id=<?php echo $rowData['PL_ID']; ?>">Edit</a> </button>
                                <button class="btn btn-danger"><a href="delete_place.php?type=delete&id=<?php echo $rowData['PL_ID']; ?>">Delete</a> </button>
                            </div>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </table>
        </div>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>