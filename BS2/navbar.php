<div class="navbar-container">
    <!-- bootstrap navbar -->

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3 class="heading-logo">bhraman<span> songi</span></h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="package.php">Packages</a>
                    </li>
                    <?php
                    if (isset($_SESSION['login_ok'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="my_tours.php">My Tours</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login/Signup
                            </a>
                            <ul class="dropdown-menu">
                                <li onclick="emial_pop()">
                                    <p class="dropdown-item">Signup</p>
                                </li>
                                <li onclick="login_popup()">
                                    <p class="dropdown-item">Login</p>
                                </li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="place.php">Places</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>