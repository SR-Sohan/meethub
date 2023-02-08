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
$page = "Event";
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- event area start  -->
    <div class="container my-5">
        <div class="event-heading text-center my-4">
            <h5>Save the Date</h5>
            <h1>When & Where</h1>
        </div>
        <div class="row text-center g-5">
            <div class="col-lg-4 ">
                <div class="card">
                    <img src="<?= settings()['homepage']?>assets/images/wnw-icon1-1.jpg " class="card-img-top img-fluid " alt="...">
                    <div class="card-body">
                        <h3 class="card-title">The Reception<br><br></h3>
                        <p class="card-text">Thursday, 25 Dec 2020 <br>12:00 pm – 16:00 pm<br> <br>Los Angeles,<br>19 St04th Str<br><br>
                        <h6>123 456 7890<h6><br></p>
                                <a href="#" class="btn btn-dark">See Map<br>
                                </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <div class="card">
                    <img src="<?= settings()['homepage']?>assets/images/wnw-icon2-1.jpg " class="card-img-top img-fluid " alt="...">
                    <div class="card-body">
                        <h3 class="card-title">The Party<br><br></h3>
                        <p class="card-text">Saturday, 27 Dec 2020 <br>12:00 pm – 16:00 pm <br><br>Los Angeles,<br>19 St04th Str<br><br>
                        <h6>123 456 7890<h6><br></p>
                                <a href="#" class="btn btn-dark">See Map<br>
                                </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <div class="card">
                    <img src="<?= settings()['homepage']?>assets/images/wnw-icon3-1.jpg " class="card-img-top img-fluid " alt="...">
                    <div class="card-body">
                        <h3 class="card-title">The Reception<br><br></h3>
                        <p class="card-text">Thursday, 25 Dec 2020 <br>12:00 pm – 16:00 pm <br><br>Los Angeles,<br>19 St04th Str<br><br>
                        <h6>123 456 7890<h6><br></p>
                                <a href="#" class="btn btn-dark">See Map<br>
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- event area end -->


    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>