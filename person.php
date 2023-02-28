<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;

$conn = db::connect();
$db = new MysqliDb();
$page = "Couple";

$gender = $_GET['person'] == "brides" ? "female" : "male";

$q = "SELECT users.id, concat(users.first_name,' ',users.last_name) as name,
divisions.name as divisions,
districts.name as districts,
personal_info.* ,
profile_pic.name as img
FROM `users`,address,divisions,districts,personal_info,profile_pic
WHERE 
users.gender = 'male' AND
users.role = '1' AND
users.status = '2' AND
address.user_id = users.id AND
profile_pic.user_id = users.id AND
divisions.id = address.p_division AND
districts.id = address.p_disrict AND
personal_info.user_id = users.id;";

$result = $conn->query($q);



// $db->where("gender", $gender);
// $db->where("role", "1");
// $db->where("status", "2");
// $user = $db->get("users");




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

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $img = $row['img'] ? "profile-image/".$row['img'] : "assets/images/no-image.png";
                    ?>
                            <div class="col-md-6">
                                <div class="person-wrap px-3 py-5 shadow-lg">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <div class="person-img">
                                                <img class="rounded-circle" src="<?= settings()['homepage'].$img ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="person-content">
                                                <h3><?= $row['name'] ?></h3>
                                                <p>Address: <?= $row['districts'] ?>, <?= $row['divisions'] ?>.</p>
                                                <p>Height: <?= $row['height'] ?>"</p>
                                                <p>Weight: <?= $row['weight'] ?>.kg</p>
                                                <p>Religion: <?= $row['religion'] ?>.</p>
                                                <p>Blood Group: <?= $row['blood_group'] ?>.</p>
                                                <p>Occupation: <?= $row['profession'] ?></p>
                                                <p>Income: <?= '$'.$row['salary'] ?></p>
                                                <a class="btn btn-outline-danger" href="<?= settings()['homepage'] ?>person-details.php?id=<?= $row['user_id'] ?>">View Details</a>
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