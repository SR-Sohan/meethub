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
personal_info.user_id = users.id";

$result = $conn->query($q);
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- carousel area start  -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?= settings()['homepage'] ?>assets/images/slider1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?= settings()['homepage'] ?>assets/images/slider2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= settings()['homepage'] ?>assets/images/slider3.jpg" class="d-block w-100" alt="...">
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
                        <img src="<?= settings()['homepage'] ?>assets/images/weeding.jpg" alt="">
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
            <div class="person-wrapper">
                <div class="row my-5 ">
                    <h2 class="newperson-title">New Grooms</h2>
                    <div class="grooms">
                        <?php

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $img = $row['img'] ? "profile-image/" . $row['img'] : "assets/images/no-image.png";
                        ?>
                                <div class="col-md-6 slide">
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
    <!-- weeding coming soon area end  -->

    <script>
        $(document).ready(function() {
            $('.grooms').slick({
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"></button>',
                nextArrow: '<button type="button" class="slick-next"></button>',
                centerMode: true,
                slidesToShow: 2,
                slidesToScroll: 2
            })

        })
    </script>
    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>