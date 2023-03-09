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
$page = "Edit Personal";
$id = $_SESSION['userid'];
$db->where("user_id ", $id);
$row = $db->getOne("personal_info");

if (isset($_POST['update'])) {
    $data = [
        'user_id' => $db->escape($_POST['id']),
        'dob' => $db->escape($_POST['dob']),
        'marital_status' => $db->escape($_POST['maritalStatus']),
        'height' => $db->escape($_POST['height']),
        'weight' => $db->escape($_POST['weight']),
        'physical' => $db->escape($_POST['physical']),
        'religion' => $db->escape($_POST['religion']),
        'blood_group' => $db->escape($_POST['bg']),
        'eating_habits' => $db->escape($_POST['eating']),
        'smoking_habits' => $db->escape($_POST['smoking']),
        'drinking_habits' => $db->escape($_POST['drinking']),
        'about' => $db->escape($_POST['about']),
    ];

  
    if ($row) {
        $db->where("user_id", $id);
        if ($db->update("personal_info", $data)) {
            header("location:personal_info.php");
        } else {
            $message = "Update failed!!";
        }
    } else {
        if ($db->insert("personal_info", $data)) {
            header("location:personal_info.php");
        } else {
            $message = "Insert failed!!";
        }
    }
}
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

                        <form class="" method="post">
                            <h1>Edit Educations & Occupation </h1>
                            <hr>
                            <br>
                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            



                            <button type="submit" name="update" class="form-btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>