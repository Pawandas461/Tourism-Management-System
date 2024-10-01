<?php
require('../include/connect.php');

require('../include/header.php');


$sql = "select * from user_query;";
$res = mysqli_query($conn, $sql);
?>
<style>
    a {
        text-decoration: none;
        color: white;
    }

    .bt {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
</style>
</head>

<body>
    <?php include '../include/sidebarmenu.php' ?>

    <section class="home">


        <div class="text">User Qquery</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home | User Query</span>
            </div>
        </nav>

        <!-- Table start -->
        <div class="row bg-light m-2 mt-5 p-3">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">User Communications</h3>
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
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Massage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rowData = (mysqli_fetch_assoc($res))) {
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rowData['username']; ?></td>
                                        <td><?php echo $rowData['email']; ?></td>
                                        <td><?php echo $rowData['subject']; ?></td>
                                        <td><?php echo $rowData['message']; ?></td>
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