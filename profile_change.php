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
$page = "Family Info";
$db->where("user_id", $id);
$family = $db->get("family_info");
if (isset($_POST['add'])) {
    $data = [
        'user_id' => $db->escape($_POST['user_id']),
        'relation' => $db->escape($_POST['relation']),
        'name' => $db->escape($_POST['name']),
        'profession' => $db->escape($_POST['profession']),
        'status' => $db->escape($_POST['status']),
        'phone' => $db->escape($_POST['phone']),
    ];



    if ($db->insert("family_info", $data)) {
        header("location:" . $_SERVER['PHP_SELF']);
    } else {
        $message = "Update Failed!!";
    }
}
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="profile-change-wrap">
        <div class="container-fluid">
            <div class="profile-pic-area ">
                <form class="w-50 bg-white p-5 shadow-lg mx-auto  rounded-3 my-5 d-flex flex-column align-items-center justify-content-center " action="">
                    <h3 class="mb-5">Change Profile Picture</h3>
                    <div class="file-input">
                        <input type="file" name="file-input" id="file-input" class="file-input__input" />
                        <label class="file-input__label" for="file-input">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                            </svg>
                            <span>Choose file</span></label>
                    </div>
                    <input class="btn btn-outline-danger mt-3" type="submit" name="upload" value="Upload">
                </form>
            </div>
        </div>
    </div>


    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>