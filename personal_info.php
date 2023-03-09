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
$page = "Personal Info";

$id = $_SESSION['userid'];
$db->where("user_id ", $id);
$row = $db->getOne("personal_info");

 // replace with the actual date of birth
$today = new DateTime(); 
$diff = $today->diff(new DateTime($row['dob'])); 
$age = $diff->y;

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="profile-page-area">
        <div class="container-fluid">
            <div class="row">
                <?php require __DIR__ . '/components/profile_sidebar.php'; ?>
                <div data-aos="fade-up" data-aos-duration="1000" class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">
                        <div class="edit-btn">
                            <a href="<?= settings()['homepage'] ?>edit_personal.php?user_id=<?= $id ?>"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>DOB & Age</td>
                                    <td>:</td>
                                    <td><?= $row['dob']??''?> | <?= $age??''?> Years.</td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td>:</td>
                                    <td><?= $row['marital_status']??''?></td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>:</td>
                                    <td><?= $row['height']??''?></td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td>:</td>
                                    <td><?= $row['weight']??''?></td>
                                </tr>
                                <tr>
                                    <td>Physical Status</td>
                                    <td>:</td>
                                    <td><?= $row['physical']??''?></td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>:</td>
                                    <td><?= $row['religion']??''?></td>
                                </tr>
                                <tr>
                                    <td>Blood Group</td>
                                    <td>:</td>
                                    <td><?= $row['blood_group']??''?></td>
                                </tr>
                                <tr>
                                    <td>Eating Habits</td>
                                    <td>:</td>
                                    <td><?= $row['eating_habits']??''?></td>
                                </tr>
                                <tr>
                                    <td>Smoking Habits</td>
                                    <td>:</td>
                                    <td><?= $row['smoking_habits']??''?></td>
                                </tr>
                                <tr>
                                    <td>Drinking Habits</td>
                                    <td>:</td>
                                    <td><?= $row['drinking_habits']??''?></td>
                                </tr>
                                <tr>
                                    <td>About Me</td>
                                    <td>:</td>
                                    <td><?= $row['about']??''?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>