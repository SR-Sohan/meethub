<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;
 $conn = db::connect();

 $q = "SELECT address.* ,divisions.name AS pDivisions,districts.name AS pDistricts,upazilas.name AS pUpazila, divisions.name AS hDivisions, districts.name as hDistricts, upazilas.name as hUpazilas FROM address, divisions,districts,upazilas WHERE user_id = 1 AND divisions.id = address.p_division AND districts.id = address.p_disrict and upazilas.id = address.p_thana and divisions.id = address.h_division AND districts.id = address.h_disrict AND upazilas.id = address.h_thana";

 $r = $conn->query($q)->fetch_assoc();

 var_dump($r);
$db = new MysqliDb();
$page = "Address";
$id = $_SESSION['userid'];
$db->where("user_id", $id);
$row = $db->getOne("address");


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
                            <a href="<?= settings()['homepage']?>edit_address.php?user_id=<?= $_SESSION['userid']??'' ?>"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Present Country</td>
                                    <td>:</td>
                                    <td><?=  $row['p_country']??''?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>imdezcode@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>Bali, Indonesia</td>
                                </tr>
                                <tr>
                                    <td>Hobbies</td>
                                    <td>:</td>
                                    <td>Diving, Reading Book</td>
                                </tr>
                                <tr>
                                    <td>Job</td>
                                    <td>:</td>
                                    <td>Web Developer</td>
                                </tr>
                                <tr>
                                    <td>Skill</td>
                                    <td>:</td>
                                    <td>PHP, HTML, CSS, Java</td>
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