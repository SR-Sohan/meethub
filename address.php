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
$q = "SELECT address.*,
 divisions.name AS pDivisions,
 districts.name AS pDistricts,
 upazilas.name AS pUpazila
 FROM 
 address, 
 divisions,
 districts,
 upazilas 
 WHERE 
 address.user_id = ".$id." AND
 divisions.id = address.p_division AND
 districts.id = address.p_disrict and
 upazilas.id = address.p_thana";

$q2 = "SELECT home_address.*,
 divisions.name AS hDivisions,
 districts.name AS hDistricts,
 upazilas.name AS hUpazila
 FROM 
 home_address, 
 divisions,
 districts,
 upazilas 
 WHERE 
 home_address.user_id = ".$id." AND
 divisions.id = home_address.division AND
 districts.id = home_address.district and
 upazilas.id = home_address.thana";

$r =  $conn->query($q)->fetch_assoc();
$r2 =  $conn->query($q2)->fetch_assoc();
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
                                    <td><?=  $r['pDivisions']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Districts</td>
                                    <td>:</td>
                                    <td><?=  $r['pDistricts']??''?></td>
                                </tr>
                                <tr>
                                    <td>Present Thana</td>
                                    <td>:</td>
                                    <td><?=  $r['pUpazila']??''?></td>
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
                                    <td><?=  $r2['country']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Division</td>
                                    <td>:</td>
                                    <td><?=  $r2['hDivisions']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Districts</td>
                                    <td>:</td>
                                    <td><?=  $r2['hDistricts']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Thana</td>
                                    <td>:</td>
                                    <td><?=  $r2['hUpazila']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home Village/Area</td>
                                    <td>:</td>
                                    <td><?=  $r2['village']??''?></td>
                                </tr>
                                <tr>
                                    <td>Home House No</td>
                                    <td>:</td>
                                    <td><?=  $r2['house']??''?></td>
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