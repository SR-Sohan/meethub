<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;
// $conn = db::connect();
$db = new MysqliDb();
$page = "Couple";
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="container my-5">
        <div class="event-heading text-center my-4">
            <h5>Are getting married</h5>
            <h1>Happy Couple</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="single-couple">
                    <div class="couple-img">
                        <img class="img-fluid ms-5" src="<?= settings()['homepage'] ?>assets/images/couple-img1-1.png" alt="" />
                    </div>
                    <div class="couple-content text-center">
                        <h3>Martina Doe</h3>
                        <ul class="social-link">
                            <li>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-skype"></i></a>
                            </li>
                        </ul>

                        <p>
                            Phasellus vel congue justo. Cras nec libero sed massa mattis
                            tristique. Curabitur id malesuada ju. Maecenas tristique, metus
                            et porta cursus, lorem felis efficituerat, amet mollis turpis
                            metus porttitor metus. bibendum in ante eget
                            facilisisuspendisse.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-couple">
                    <div class="couple-img">
                        <img class="img-fluid ms-5" src="<?= settings()['homepage'] ?>assets/images/couple-img2-1.png" alt="" />
                    </div>
                    <div class="couple-content text-center">
                        <h3>Jonathan Doe</h3>
                        <ul class="social-link">
                            <li>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa-brands fa-skype"></i></a>
                            </li>
                        </ul>

                        <p>
                            Phasellus vel congue justo. Cras nec libero sed massa mattis
                            tristique. Curabitur id malesuada ju. Maecenas tristique, metus
                            et porta cursus, lorem felis efficituerat, amet mollis turpis
                            metus porttitor metus. bibendum in ante eget
                            facilisisuspendisse.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>