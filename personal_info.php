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
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="profile-page-area">
        <div class="container-fluid">
            <div class="row">
                <?php require __DIR__ . '/components/profile_sidebar.php'; ?>
                <div class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">
                        <div class="edit-btn">
                            <a href="<?= settings()['homepage'] ?>edit_personal.php?user_id=2"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
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
                                    <td>Skin Color</td>
                                    <td>:</td>
                                    <td><?= $row['skin_color']??''?></td>
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
                                    <td>Hobby</td>
                                    <td>:</td>
                                    <td><?= $row['hobby']??''?></td>
                                </tr>
                                <tr>
                                    <td>Profession</td>
                                    <td>:</td>
                                    <td><?= $row['profession']??''?></td>
                                </tr>
                                <tr>
                                    <td>Income</td>
                                    <td>:</td>
                                    <td><?= $row['salary']??''?></td>
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