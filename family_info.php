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
$page = "Family Info";
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
                        <div class="add-family-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <form class="mt-4" action="" method="post">
                            <div class="mb-3">
                                <select class="form-select" name="relation" aria-label="Default select example">
                                    <option selected>Choose Relation</option>
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="brother">Brother</option>
                                    <option value="sister">Sister</option>
                                    <option value="uncle">Uncle</option>
                                    <option value="aunty">Aunty</option>
                                    <option value="grand father">Grand Father</option>
                                    <option value="grand mother">Grand Mother</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name: </label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession: </label>
                                <input name="profession" type="text" class="form-control" id="profession" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status: </label>
                                <input name="status" type="text" class="form-control" id="status" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone: </label>
                                <input name="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" />
                            </div>
                            <button type="submit" class="form-btn">Add</button>
                        </form>

                        <div class="family-list mt-4">
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">Profession</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Md Amin Ali</th>
                                        <td>Father</td>
                                        <td>Teacher</td>
                                        <td>High Level</td>
                                        <td>011122222</td>
                                        <td><a href="" class="btn btn-outline-primary">Edit</a> <a href="" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Md Amin Ali</th>
                                        <td>Father</td>
                                        <td>Teacher</td>
                                        <td>High Level</td>
                                        <td>011122222</td>
                                        <td><a href="" class="btn btn-outline-primary">Edit</a> <a href="" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Md Amin Ali</th>
                                        <td>Father</td>
                                        <td>Teacher</td>
                                        <td>High Level</td>
                                        <td>011122222</td>
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