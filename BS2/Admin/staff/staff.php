<?php
require('../include/connect.php');
require('../include/header.php');

$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * FROM `staff`;";
// $res = mysqli_query($conn, $sql);
if(mysqli_stmt_prepare($stmt, $sql)){
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
}
?>
<style></style>
</head>

<body style="height: 50vh;">
    <?php include '../include/sidebarmenu.php' ?>
    <section class="home">
        <div class="text">Staff</div>
        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="staff.php">Manage Staff</a>
                <a href="add_staff.php">Add Staff</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Manage Staff</span>
            </div>
        </nav>

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Total Staff</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>March 2024</option>
                                <option>April 2024</option>
                                <option>May 2024</option>
                                <option>June 2024</option>
                                <option>July 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Staff Name</th>
                                    <th class="border-top-0">Age</th>
                                    <th class="border-top-0">Address</th>
                                    <th class="border-top-0">Salary</th>
                                    <th class="border-top-0">Joining Date</th>
                                    <th class="border-top-0">Contact</th>
                                    <th class="border-top-0">Type</th>
                                    <th class="border-top-0">Image</th>
                                    <th class="border-top-0">Manage Staff</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = mysqli_fetch_assoc($res)) {
                                    $staff_address = $rowData['ST_ADDR'];
                                    $shortened_address = substr($staff_address, 0, 45);

                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="txt-oflo"><?php echo $rowData['ST_NAME']; ?></td>
                                        <td><?php echo $rowData['ST_AGE']; ?></td>
                                        <td><?php echo $shortened_address; ?><?php echo $rowData['ST_ID']; ?></td>
                                        <td><?php echo $rowData['ST_SALARY']; ?></td>
                                        <td><?php echo $rowData['ST_JOIN_DATE']; ?></td>
                                        <td><?php echo $rowData['ST_CONTACT']; ?></td>
                                        <td><?php echo $rowData['ST_TYPE']; ?></td>
                                        <td><img src="../image/staffs/<?php echo $rowData['ST_IMAGE']; ?>" alt=""></td>
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="edit_staff.php?type=edit&id=<?php echo $rowData['ST_ID']; ?>">Edit</a> </button>
                                                <button class="btn btn-danger"><a href="delete_staff.php?type=delete&id=<?php echo $rowData['ST_ID']; ?>">Delete</a> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table end -->
    </section>
    <script src="../js/navbar.js"></script>

</body>
<?php
require('../include/footer_in.php');
?>

</html>
