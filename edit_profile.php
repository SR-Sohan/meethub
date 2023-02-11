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

                        <form class="">
                            <h1>Edit Users Info</h1>
                            <hr>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name: </label>
                                <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name: </label>
                                <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" />
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address:
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:
                                </label>
                                <input type="number" class="form-control" id="phone" />
                            </div>
                            <div class="mb-3">
                                <label for="gender">Gender: </label>
                                <input type="radio" name="gender" id="male" value="male">
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="female">
                                <label for="female">Female</label>
                            </div>



                            <button type="submit" class="form-btn">Update</button>
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