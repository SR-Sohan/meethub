<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;
$id = $_SESSION['userid'];
$conn = db::connect();
$q = "SELECT a.id,a.user_id, divisions.name as pDiv,districts.name as pDis, upazilas.name as pUp,divisions.name as hDiv,districts.name as hDis, upazilas.name as hUp, a.p_country,a.p_village,a.p_house,a.h_country,a.h_village,a.h_house
FROM users u
INNER JOIN address a
ON u.id = a.user_id
INNER JOIN divisions
ON a.p_division = divisions.id
INNER JOIN districts
on a.p_division = districts.id
INNER JOIN upazilas
ON a.p_thana = upazilas.id 
INNER JOIN divisions d
on a.h_division = d.id
INNER JOIN districts dis
on a.h_district = dis.id
INNER JOIN upazilas up 
on a.h_thana = up.id
WHERE u.id = '".$id."'";



$r =  $conn->query($q)->fetch_assoc();
$page = "Address";





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
                            <a href="<?= settings()['homepage']?>edit_address.php?user_id=<?= $_SESSION['userid']??'' ?>"> <i class="fa fa-pen fa-xs edit"></i></a>
                        </div>
                        <table>
                            <tbody>
                            <hr/>
                                <tr>
                                    <td>Present Country</td>
                                    <td>:</td>
                                    <td><?=  $r['p_country']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Division</td>
                                    <td>:</td>
                                    <td><?=  $r['pDiv']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Districts</td>
                                    <td>:</td>
                                    <td><?=  $r['pDis']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Thana</td>
                                    <td>:</td>
                                    <td><?=  $r['pUp']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Village/Area</td>
                                    <td>:</td>
                                    <td><?=  $r['p_village']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present House No</td>
                                    <td>:</td>
                                    <td><?=  $r['p_house']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Country</td>
                                    <td>:</td>
                                    <td><?=  $r['h_country']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Division</td>
                                    <td>:</td>
                                    <td><?=  $r['hDiv']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Districts</td>
                                    <td>:</td>
                                    <td><?=  $r['hDis']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Thana</td>
                                    <td>:</td>
                                    <td><?=  $r['hUp']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Village/Area</td>
                                    <td>:</td>
                                    <td><?=  $r['h_village']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home House No</td>
                                    <td>:</td>
                                    <td><?=  $r['h_house']??''?></td>
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