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
$page = "Home";
$db->orderBy ("carousel.id","desc");
$res = $db->get("carousel");

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
districts.id = address.p_district AND
personal_info.user_id = users.id order by users.id DESC limit 10";
$q2 = "SELECT users.id, concat(users.first_name,' ',users.last_name) as name,
divisions.name as divisions,
districts.name as districts,
personal_info.* ,
profile_pic.name as img
FROM `users`,address,divisions,districts,personal_info,profile_pic
WHERE 
users.gender = 'female' AND
users.role = '1' AND
users.status = '2' AND
address.user_id = users.id AND
profile_pic.user_id = users.id AND
divisions.id = address.p_division AND
districts.id = address.p_district AND
personal_info.user_id = users.id order by users.id DESC limit 10";

$result = $conn->query($q);
$result2 = $conn->query($q2);
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- carousel area start  -->
    <div class="swiper homeSwiper">
        <div class="swiper-wrapper">
            <?php
            if (isset($res)) {
                foreach ($res as $key => $value) { ?>
                    <div class="swiper-slide">
                        <div class="slider-content-box">
                            <img src="<?= settings()['adminpage'] ?>carousel-image/<?= $value['image'] ?>" alt="">
                            <div class="slider-content">
                                <h1 class="text-capitalize" data-aos="fade-left" ><?= $value['title'] ?></h1>
                                <p class="text-capitalize" data-aos="fade-right" ><?= $value['description'] ?></p>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <!-- carousel area end -->

    <!-- weeding coming soon area start  -->
    <div data-aos="fade-up" class="weeding-soon ">
        <div class="container">
            <div class="row weeding-wrap shadow-lg">
                <div data-aos="fade-right" class="col-md-4">
                    <div class=" weeding-img ">
                        <img src="<?= settings()['homepage'] ?>assets/images/weeding.jpg" alt="">
                    </div>
                </div>
                <div data-aos="fade-left" class=" col-md-6 offset-md-1">
                    <div class="weeding-content">
                        <h1>Wedding</h1>
                        <h2>Coming Soon</h2>
                        <h3>March, 25</h3>
                        <p>Phasellus vel congue justo. Cras nec libero sed massa mattis tristique. Curabitur id malesuada justo. Maecenas tristique, metus et porta cursus, lorem felis efficitur erat, sit amet mollis.</p>
                    </div>
                </div>
            </div>
            <div class="person-wrapper">
                <div class="row py-5 ">
                    <h2 data-aos="fade-right" class="newperson-title">New Grooms</h2>
                    <div data-aos="fade-left" class="swiper mySwiper py-5">
                        <div class="swiper-wrapper ">
                            <?php

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $img = $row['img'] ? "profile-image/" . $row['img'] : "assets/images/no-image.png";
                            ?>
                                    <div class="col-md-6 mx-2 swiper-slide">
                                        <div class="person-wrap px-3 py-5 shadow-lg">
                                            <div class="row ">
                                                <div class="col-md-5">
                                                    <div class="person-img">
                                                        <img class="rounded-circle" src="<?= settings()['homepage'] . $img ?>" alt="">
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
                                                        <p>Income: <?= '$' . $row['salary'] ?></p>
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
                <div class="row py-5 ">
                    <h2 data-aos="fade-right" class="newperson-title">New Brides</h2>
                    <div data-aos="fade-left" class="swiper mySwiper py-5">
                        <div class="swiper-wrapper ">
                            <?php

                            if ($result2->num_rows > 0) {
                                while ($row = $result2->fetch_assoc()) {
                                    $img = $row['img'] ? "profile-image/" . $row['img'] : "assets/images/no-image.png";
                            ?>
                                    <div class="col-md-6 mx-2 swiper-slide">
                                        <div class="person-wrap px-3 py-5 shadow-lg">
                                            <div class="row ">
                                                <div class="col-md-5">
                                                    <div class="person-img">
                                                        <img class="rounded-circle" src="<?= settings()['homepage'] . $img ?>" alt="">
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
                                                        <p>Income: <?= '$' . $row['salary'] ?></p>
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

        </div>
    </div>
    <!-- weeding coming soon area end  -->

    <script>
        var swiper = new Swiper(".homeSwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>