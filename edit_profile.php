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
$page = "Edit Profile";

$id = $_SESSION['userid'];

$db->where("id", $id);
$row = $db->getOne("users");

if (isset($_POST['update'])) {
    $data = [
        'first_name' => $db->escape($_POST['fname']),
        'last_name' => $db->escape($_POST['lname']),
        'phone' => $db->escape($_POST['phone']),
        'email' => $db->escape($_POST['email']),
        'gender' => $db->escape($_POST['gender']),
    ];

    $db->where("id", $id);
    if ($db->update ("users", $data)) {
        header("location:profile.php");
    } else {
        $message = "Update failed!!";
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
                            <h1>Edit Users Info</h1>
                            <hr>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name: </label>
                                <input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp" value="<?= $row['first_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name: </label>
                                <input type="text" name="lname" class="form-control" id="lname" aria-describedby="emailHelp" value="<?= $row['last_name'] ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address:
                                </label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['email'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:
                                </label>
                                <input type="number" name="phone" class="form-control" id="phone" value="<?= $row['phone'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="gender">Gender: </label>
                                <input <?= $row['gender'] == 'male' ?  'checked' : ''  ?> type="radio" name="gender" id="male" value="male">
                                <label for="male">Male</label>
                                <input <?= $row['gender'] == 'female' ?  'checked' : ''  ?> type="radio" name="gender" id="female" value="female">
                                <label for="female">Female</label>
                            </div>



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