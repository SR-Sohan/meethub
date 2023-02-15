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
$page = "Social";
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
                        <div id="addBtn" class="add-family-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <form id="formList" class="mt-4 showHide" action="" method="post">
                            <div class="mb-3">
                                <select class="form-select" name="relation" aria-label="Default select example">
                                    <option selected>Select Social</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="linkdin">Linkdin</option>
                                    <option value="github">Github</option>
                                    <option value="what's app">What's App</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Profile Link: </label>
                                <input name="link" type="text" class="form-control" id="name" aria-describedby="emailHelp" />
                            </div>
                            <button type="submit" class="form-btn">Add</button>
                        </form>

                        <div class="family-list mt-4">
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Social</th>
                                        <th scope="col">Profile Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Facebook</th>
                                        <td>https://www.facebook.com/sohanur.1522/</td>
                                       
                                        <td><a href="" class="btn btn-outline-primary">Edit</a> <a href="" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>