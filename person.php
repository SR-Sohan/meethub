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

$gender = $_GET['person'] == "brides" ? "female" : "male";

$db->where("gender", $gender);
$db->where("role", "1");
$db->where("status", "2");
$user = $db->get("users");



?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>


    <!-- brides area start  -->
    <div id="brides-area">
        <div class="container my-5">
            <div class="event-heading text-center my-4">
                <h1 class="mb-5">Your preferable Partner</h1>
            </div>
            <div class="person-wrapper">
                <div class="row">
                    <?php

                    if (isset($user)) {
                        for ($i=0; $i < count($user); $i++) { 
                            $db->where("user_id", $user[$i]['id']);                        
                            $address = $db->getOne("address");

                    ?>
                            <div class="col-md-6">
                                <div class="person-wrap px-3 py-5 shadow-lg">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <div class="person-img">
                                                <img src="<?= settings()['homepage'] ?>assets/images/no-image.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="person-content">
                                                <h3><?= $user[$i]['first_name']." ".$user[$i]['last_name'] ?></h3>
                                                <p>Address: <?= $address['p_division']?></p>
                                                <p>Height: 5.7"</p>
                                                <p>Weight: 60kg</p>
                                                <p>Religion: Islam</p>
                                                <p>Education: BA</p>
                                                <p>Occupation: Student</p>
                                                <a class="btn btn-outline-danger" href="">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php    }
                    } ?>

                </div>

            </div>
        </div>
    </div>
    <!-- brides area End -->



    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>