<?php
include '../include/connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM `restaurant` WHERE RES_ID= '$id'";
$res = mysqli_query($conn,$sql);
if ($res) {
    ?>
    <script>
        alert("Restaurant Deleted Successfully");
        window.location.href = "restaurant.php";
    </script>
    <?php
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>