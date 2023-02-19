<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="<?= settings()['homepage'] ?> ">
            <img src="<?= settings()['homepage'] ?>/assets/images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>contact.php">Contact</a>
                </li>

            </ul>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
           
            ?>

            <div class="dropdown">
                <button class=" drop-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['fname']??'' ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>logout.php">Log Out</a></li>
                </ul>
            </div>
                <?php  }else{ ?>
            <div class="menu-auth d-flex align-items-center">
                <a href="<?= settings()['homepage'] ?>login.php">Login</a>
                <a href="<?= settings()['homepage'] ?>registration.php">Registration</a>
            </div>
            <?php } ?>

        </div>
    </div>
</nav>