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


    <!-- brides area start  -->
    <div id="brides-area">
        <div class="container my-5">
            <div class="event-heading text-center my-4">
                <h5>Friends</h5>
                <h1>Bridesmaids</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                            <h3><a href="">Shabana</a></h3>
                            <p>Brides</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- brides area End -->



    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>