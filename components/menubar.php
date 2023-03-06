<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a data-aos="flip-left" data-aos-duration="1500" class="navbar-brand" href="<?= settings()['homepage'] ?> ">
            <img src="<?= settings()['homepage'] ?>/assets/images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li data-aos="fade-down" data-aos-duration="300" class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?= settings()['homepage'] ?>index.php">Home</a>
                </li>
                <li data-aos="fade-down" data-aos-duration="600" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>event.php">Event</a>
                </li>
                <li data-aos="fade-down" data-aos-duration="900" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>person.php?person=brides">Brides</a>
                </li>
                <li data-aos="fade-down" data-aos-duration="1200" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>person.php?person=grooms">Grooms</a>
                </li>
                <li data-aos="fade-down" data-aos-duration="1500" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>contact.php">Contact</a>
                </li>
                <li data-aos="fade-down" data-aos-duration="1500" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {

                ?>
                    <li data-aos="fade-down" data-aos-duration="1500" class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>chat.php">Chat</a>
                    </li>
                <?php } ?>

            </ul>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {

            ?>

                <div data-aos="fade-left" data-aos-duration="2000" class="dropdown">
                    <button class=" drop-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['fname'] ?? '' ?>
                    </button>
                    <ul class="dropdown-menu">
                        <?php

                        if ($_SESSION['role'] == '2') {
                        ?>
                            <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>admin/">Dashboard</a></li>
                        <?php  } else { ?>
                            <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>profile.php">Profile</a></li>
                        <?php } ?>

                        <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>logout.php">Log Out</a></li>
                    </ul>
                </div>
            <?php  } else { ?>
                <div class="menu-auth d-flex align-items-center">
                    <a data-aos="fade-up" data-aos-duration="1500" href="<?= settings()['homepage'] ?>login.php">Login</a>
                    <a data-aos="fade-up" data-aos-duration="1500" href="<?= settings()['homepage'] ?>registration.php">Registration</a>
                </div>
            <?php } ?>

        </div>
    </div>
</nav>