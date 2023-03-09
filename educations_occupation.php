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
$id = $_SESSION['userid'];
$page = "Educations";
$db->where("user_id", $id);
$row = $db->getOne("education_occupation");


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
                            <a href="<?= settings()['homepage'] ?>edit_edu_occupation.php?user_id=<?= $id ?>"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Highest Education </td>
                                    <td>:</td>
                                    <td><?= $row['education']??''?></td>
                                </tr>
                                <tr>
                                    <td>Institute</td>
                                    <td>:</td>
                                    <td><?= $row['institute']??''?></td>
                                </tr>
                                <tr>
                                    <td>Employed</td>
                                    <td>:</td>
                                    <td><?= $row['employed']??''?></td>
                                </tr>
                                <tr>
                                    <td>Yearly Income</td>
                                    <td>:</td>
                                    <td>৳<?= $row['income']??''?></td>
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