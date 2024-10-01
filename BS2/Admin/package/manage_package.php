<?php
include '../include/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../css/boxicon.css' rel='stylesheet'>
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
    <style>

        a {
            text-decoration: none;
            color: white;
        }

        .bt{
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home" style="height: 130%;">


        <div class="text">Packages</div>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Packages | Manage</span>
            </div>
        </nav>

        <header>

            <div class="navbar">
                <a href="../index.php">Home</a>
                <a href="package.php">All Packages</a>
                <a href="add_package.php">Add Packages</a>
                <a href="manage_package.php">Manage Packages</a>
            </div>

        </header>

        <?php
        $sql = "select * from package;";
        $res = mysqli_query($conn, $sql);
        ?>

        <div class="data" style="margin-top: 5%; padding:50px;">

            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <th>Package Id</th>
                    <th>Package Name</th>
                    <th>Place Name</th>
                    <th>Package Type</th>
                    <th>Duration of package</th>
                    <th>Package descr.</th>
                    <th>Package Cost</th>
                    <th>Manage</th>
                </thead>

                <?php
                while ($rowData = (mysqli_fetch_assoc($res))) {
                ?>

                    <tr>
                        <td><?php echo $rowData['P_ID']; ?></td>
                        <td><?php echo $rowData['P_NAME']; ?></td>
                        <td><?php echo $rowData['PL_NAME']; ?></td>
                        <td><?php echo $rowData['P_TYPE']; ?></td>
                        <td><?php echo $rowData['DURATION']; ?></td>
                        <td><?php echo $rowData['P_DETAILS']; ?></td>
                        <td><?php echo $rowData['P_COST']; ?></td>
                        <td class="dt">
                            <div class="bt">
                                <button class="btn btn-success"><a href="edit_package.php?type=edit&id=<?php echo $rowData['P_ID']; ?>">Edit</a> </button>
                                <button class="btn btn-danger"><a href="delete_package.php?type=delete&id=<?php echo $rowData['P_ID']; ?>">Delete</a> </button>
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