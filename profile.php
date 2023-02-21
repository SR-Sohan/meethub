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
$page = "Profile";
$id = $_SESSION['userid'];

$db->where("id", $id);
$row = $db->getOne("users");


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
                            <a href="<?= settings()['homepage']?>edit_profile.php?user_id=<?= $row['id']??'' ?>"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>:</td>
                                    <td><?= $row['first_name']??'' ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>:</td>
                                    <td><?= $row['last_name']??'' ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $row['email']??'' ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>+880<?= $row['phone']??'' ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>:</td>
                                    <td><?= strtoupper( $row['gender'])??'' ?></td>
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