<?php
require('../include/connect.php');
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
    <?php require('../include/sidebarmenu.php'); ?>

    <section class="home">
        <div class="text">Edit Hotel</div>

        <header>
            <div class="navbar">
                <a href="../index.php">Dashboard</a>
                <a href="hotel.php">Manage Hotel</a>
                <a href="add_hotel.php">Add Hotel</a>
            </div>
        </header>

        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Edit Hotel</span>
            </div>
        </nav>

        <!-- Vehicle edit form start -->
        <div class="form bg-light">
            <form action="update_hotel.php" method="post" enctype="multipart/form-data" id="editForm">
                
        

                <div class="mb-3">
                    <label for="h_name" class="form-label">Hotel Name</label>
                    <input id="h_name" placeholder="Hotel Name" name="h_name" type="text" aria-label="h_name" class="form-control" value="<?php echo $rowData['H_NAME']; ?>">
                </div>


                <div class="mb-3">
                    <label for="h_address" class="form-label">Hotel Address</label>
                    <input placeholder="Hotel Address" name="h_address" type="text" aria-label="h_address" class="form-control" value="<?php echo $rowData['H_ADDR']; ?>">                  
                </div>

                <div class="mb-3">
                    <label for="h_contact" class="form-label">Hotel contact</label>
                    <input placeholder="Hotel Contact" name="h_contact" type="number" aria-label="h_contact" class="form-control" value="<?php echo $rowData['H_CONTACT']; ?>">                  
                </div>

                <div class="mb-3">
                    <label for="h_descr" class="form-label">Hotel Description</label>
                    <input placeholder="Hotel description" name="h_descr" type="text" aria-label="h_descr" class="form-control" value="<?php echo $rowData['H_DESCR']; ?>">
                </div>

                <div class="mb-3">
                    <label for="total_rooms" class="form-label">Total number of rooms</label>
                    <input placeholder="Total Rooms" name="total_rooms" type="number" aria-label="total_rooms" class="form-control" value="<?php echo $rowData['TOTAL_ROOMS']; ?>">
                </div>

                <div class="mb-3">
                    <label for="avl_rooms" class="form-label">Available rooms</label>
                    <input placeholder="Available Rooms" name="avl_rooms" type="number" aria-label="avl_rooms" class="form-control" value="<?php echo $rowData['AVL_ROOMS']; ?>">
                </div>

                <div class="mb-3">
                    <label for="room_rent" class="form-label">Rent of per room</label>
                    <input placeholder="Rooms Rents" name="room_rent" type="number" aria-label="room_rent" class="form-control" value="<?php echo $rowData['ROOM_RENT']; ?>">
                </div>

                <div class="d-grid gap-3 d-flex justify-content-end">
                    <button class="btn btn-danger" type="button" onclick="window.history.back();">Cancel</button>
                    <input type="hidden" name="hotel_id" value="<?php echo $id; ?>"> <!-- Hidden field to send CAR_ID for update -->
                    <input type="submit" class="btn btn-success" name="submit" value="Update Hotel">
                </div>

            </form>
        </div>

    </section>

    <script src="../js/navbar.js"></script>

</body>

</html>

