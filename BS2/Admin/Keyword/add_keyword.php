<?php
include '../include/connect.php';
require('../include/header.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $cp_id = $_GET['id'];
    echo $cp_id;
    $p_name = $_GET['p_name'];
}

$chk = "select * from keyword where CP_ID = '$cp_id'";
$chk_res = mysqli_query($conn, $chk);




if (isset($_POST['submit'])) {
    // collect value of input field
    $keyword = $_POST['keyword'];

    $sql = "INSERT INTO `keyword`(`keyword`, `CP_ID`) VALUES ('$keyword', '$cp_id');";
    $res = mysqli_query($conn, $sql);

    if (isset($res)) {
?>
        <script>
            alert("New vehicle Added");
        </script>
<?php
    }
}
$sql2 = "SELECT * FROM `place`;";
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
    <?php require('../include/sidebarmenu.php'); ?>

    <section class="home">

        <div class="text">Add Keywords</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="keywords.php">Manage Keywords</a>
            </div>
        </header>
        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Home |Manage Vehicle</span>
            </div>
        </nav>

        <div class="form bg-light">
            <form action="" method="post" enctype="multipart/form-data" id="packageForm">
                <h2 class="text-center"><?php echo $p_name; ?></h2>

                <div class="mb-3">
                    <label for="keyword" class="form-label ">Enter Relative Keywords</label>

                    <?php
                    if (mysqli_num_rows($chk_res) > 0) {
                        $row = mysqli_fetch_assoc($chk_res);
                    ?>
                        <input name="keyword" value="<?php echo $row['keyword']; ?>" type="text" aria-label="keyword" class="form-control" id="keyword">
                    <?php
                    } else {
                    ?>
                        <input name="keyword" type="text" aria-label="keyword" class="form-control" id="keyword">
                    <?php
                    }
                    ?>
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button">Cancel</button>
                    <input type="submit" class="btn btn-success" name="submit" value="Set Keywords">
                </div>

            </form>
        </div>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>