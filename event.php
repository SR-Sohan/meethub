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

$res = $db->get("event");
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- event area start  -->
    <div class="container my-5">
        <div class="event-heading text-center my-4">
            <h5 data-aos="fade-left" data-aos-duration="1000">Save the Date</h5>
            <h1 data-aos="fade-right" data-aos-duration="1000">When & Where</h1>
        </div>
        <div class="row text-center g-5">

        <?php 
            if(isset($res)){
                foreach ($res as $key => $value) {
                   
        ?>
            <div data-aos="fade-up" data-aos-duration="500" class="col-lg-4 ">
                <div class="card">
                    <img src="<?= settings()['homepage']?>assets/images/wnw-icon1-1.jpg " class="card-img-top img-fluid " alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-capitalize"><?= $value['title']??''?><br><br></h3>
                        <p class="card-text">Start Date:<?= $value['event_date']??''?> <br>Start Time: <?= $value['event_stime']??''?> – End Time: <?= $value['event_etime']??''?><br> <br>Event Place:<?= $value['event_place']??''?><br>
                       <br></p>
                                <a href="#" class="btn btn-dark">See Map<br>
                                </a>
                    </div>
                </div>
            </div>

            <?php }}?>
        </div>
    </div>
    <!-- event area end -->


    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>