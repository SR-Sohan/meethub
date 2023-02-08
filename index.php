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
$page = "Home";
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- carousel area start  -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
           
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="<?= settings()['homepage']?>assets/images/slider1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?= settings()['homepage']?>assets/images/slider2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= settings()['homepage']?>assets/images/slider3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <!-- carousel area end -->

    <!-- weeding coming soon area start  -->
   <div class="weeding-soon">
   <div class="container">
        <div class="row weeding-wrap shadow-lg">
            <div class="col-md-4">
                <div class="weeding-img">
                    <img src="<?=settings()['homepage']?>assets/images/weeding.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="weeding-content">
                    <h1>Wedding</h1>
                    <h2>Coming Soon</h2>
                    <h3>March, 25</h3>
                    <p>Phasellus vel congue justo. Cras nec libero sed massa mattis tristique. Curabitur id malesuada justo. Maecenas tristique, metus et porta cursus, lorem felis efficitur erat, sit amet mollis.</p>
                </div>
            </div>
        </div>
    </div>
   </div>
    <!-- weeding coming soon area end  -->


    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>