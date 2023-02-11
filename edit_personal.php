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
                            <h1>Edit Personal Info</h1>
                            <hr>
                            <br>
                            <br>
                            <div class="mb-3">
                                <label for="height" class="form-label">Height: </label>
                                <input name="height" type="number" class="form-control" id="height" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight: </label>
                                <input name="weight" type="number" class="form-control" id="weight" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Skin Color: </label>
                                <input name="color" type="text" class="form-control" id="color" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="religion" aria-label="Default select example">
                                    <option selected>Choose Religion</option>
                                    <option value="islam">Islam</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="christian">Christian</option>
                                    <option value="buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="blood" aria-label="Default select example">
                                    <option selected>Choose Blood Group</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hobby" class="form-label">Hobby:</label>
                                <textarea class="form-control" name="hobby" id="hobby" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="income" class="form-label">Income: </label>
                                <input name="income" type="number" class="form-control" id="income" aria-describedby="emailHelp" />
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