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
$page = "Edit Address";
$r = $db->get('divisions');

$id = $_SESSION['userid'];

$db->where("user_id ", $id);
$row = $db->getOne("address");
var_dump($row);
if (isset($_POST['update'])) {
    $data = [
        'user_id' => $id,
        'p_country' => $db->escape($_POST['p_country']),
        'p_division' => $db->escape($_POST['p_division']),
        'p_disrict' => $db->escape($_POST['p_district']),
        'p_thana' => $db->escape($_POST['p_thana']),
        'p_village' => $db->escape($_POST['p_village']),
        'p_house' => $db->escape($_POST['p_house']),
        'h_country' => $db->escape($_POST['h_country']),
        'h_division' => $db->escape($_POST['h_division']),
        'h_disrict' => $db->escape($_POST['h_district']),
        'h_thana' => $db->escape($_POST['h_thana']),
        'h_village' => $db->escape($_POST['h_village']),
        'h_house' => $db->escape($_POST['h_house']),
    ];

    if ($row) {
       
        if ($db->update("address", $data)) {
            header("location:address.php");
        } else {
            $message = "Update failed!!";
        }
    } else {
        if ($db->insert("address", $data)) {
            header("location:address.php");
        } else {
            $message = "Insert failed!!";
        }
    }
}


?>

<?php require __DIR__ . '/components/header.php'; ?>


</head>

<body>

    <?php require __DIR__ . '/components/menubar.php';  ?>

    <div class="profile-page-area">
        <div class="container-fluid">
            <div class="row">
                <?php require __DIR__ . '/components/profile_sidebar.php'; ?>
                <div class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">

                        <form class="" method="post">
                            <h1>Edit Address</h1>
                            <h2 class="text-danger"><?= $message ?? '' ?></h2>
                            <hr>
                            <br>
                            <br>
                            <div>
                                <label for="p_country" class="form-label">Present Country: </label>
                                <select class="form-select" name="p_country" id="p_country" aria-label="Default select example">
                                    <option value="bangladesh" selected>Bangladesh</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="p_division" class="form-label">Present Division: </label>
                                <select onchange="divisionChange(this.value)" class="form-select" name="p_division" id="p_division" aria-label="Default select example" required>
                                    <option disabled selected>Select Division</option>
                                    <?php
                                    foreach ($r as $key => $divi) {
                                        echo '<option value="' . $divi['id'] . '">' . $divi['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="p_district" class="form-label">Present District: </label>
                                <select onchange="districtChange(this.value)" class="form-select" name="p_district" id="p_district" aria-label="Default select example" required>
                                    <option disabled selected>Select Division</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="p_thana" class="form-label">Present Thana: </label>
                                <select class="form-select" name="p_thana" id="p_thana" aria-label="Default select example" required>
                                    <option disabled selected>Select District</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="p_village" class="form-label">Present Village/Area: </label>
                                <input class="form-control" type="text" name="p_village" id="p_village" required>
                            </div>

                            <div class="mb-3">
                                <label for="p_house" class="form-label">Present House No: </label>
                                <input class="form-control" type="text" name="p_house" id="p_house" required>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="h_country" class="form-label">Home Country: </label>
                                <select class="form-select" name="h_country" id="h_country" aria-label="Default select example">
                                    <option value="bangladesh" selected>Bangladesh</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="h_division" class="form-label">Home Division: </label>
                                <select onchange="hDivision(this.value)" class="form-select" name="h_division" id="h_division" aria-label="Default select example" required>
                                    <option disabled selected>Select Division</option>
                                    <?php
                                    foreach ($r as $key => $divi) {
                                        echo '<option value="' . $divi['id'] . '">' . $divi['name'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="h_district" class="form-label">Home District: </label>
                                <select onchange="hDistrict(this.value)" class="form-select" name="h_district" id="h_district" aria-label="Default select example" required>
                                    <option disabled selected>Select Division</option>


                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="h_thana" class="form-label">Home Thana: </label>
                                <select class="form-select" name="h_thana" id="h_thana" aria-label="Default select example" required>
                                    <option disabled selected>Select District</option>


                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="h_village" class="form-label">Village/Area: </label>
                                <input class="form-control" type="text" name="h_village" id="h_village" required>
                            </div>

                            <div class="mb-3">
                                <label for="h_house" class="form-label"></label> House No: </label>
                                <input class="form-control" type="text" name="h_house" id="h_house" required>
                            </div>


                            <button type="submit" name="update" class="form-btn">Update Address</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function divisionChange(id) {
            $('#p_district').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxwork.php',
                data: {
                    divi_id: id
                },
                success: function(data) {
                    $('#p_district').html(data);
                }
            })
        }

        function hDivision(id) {
            $('#h_district').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxwork.php',
                data: {
                    divi_id: id
                },
                success: function(data) {
                    $('#h_district').html(data);
                }
            })
        }



        function districtChange(id) {
            $('#p_thana').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxwork.php',
                data: {
                    dis_id: id
                },
                success: function(data) {
                    $('#p_thana').html(data);
                }
            })
        }

        function hDistrict(id) {
            $('#h_thana').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxwork.php',
                data: {
                    dis_id: id
                },
                success: function(data) {
                    $('#h_thana').html(data);
                }
            })
        }
    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>