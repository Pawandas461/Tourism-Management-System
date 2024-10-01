<?php
require('../include/connect.php');

$sql = "SELECT * FROM `co_package`;";
$res = mysqli_query($conn, $sql);

require('../include/header.php');
?>
<style></style>
</head>

<body>
    <?php require('../include/sidebarmenu.php'); ?>

    <section class="home">


        <div class="text">Keywords</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="keywords.php">Manage Keywords</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | Manage Keywords</span>
            </div>
        </nav>

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">All Keywords</h3>
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
                                    <th class="border-top-0">Package Name</th>
                                    <th class="border-top-0">Place Name</th>
                                    <th class="border-top-0">Keywords</th>
                                    <th class="border-top-0">Keywords status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                    $cp_id = $rowData['CP_ID'];
                                    $sq = "select * from keyword where CP_ID = '$cp_id'";
                                    $result = mysqli_query($conn, $sq);
                                    $key = mysqli_fetch_assoc($result);
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rowData['P_NAME']; ?></td>
                                        <td><?php echo $rowData['PL_NAME']; ?></td>
                                        <?php
                                        if ($key == '') {
                                        ?>
                                            <td>null</td>
                                        <?php
                                        } else {
                                        ?>
                                            <td><?php echo $key['keyword']; ?></td>
                                        <?php
                                        }
                                        ?>
                                        <td class="txt-oflo">
                                            <div class="bt">
                                                <button class="btn btn-primary"><a href="add_keyword.php?p_name=<?php echo $rowData['P_NAME']; ?>&type=add&id=<?php echo $rowData['CP_ID']; ?>">Add Keywords</a> </button>
                                                <button class="btn btn-danger"><a href="delete_keywords.php?type=delete&id=<?php echo $rowData['CP_ID']; ?>">delete</a> </button>
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

</html>