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
$page = "Educations";
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
                                    <option selected>Select Examination</option>
                                    <option value="psc">PSC</option>
                                    <option value="jsc">JSC</option>
                                    <option value="jdc">JDC</option>
                                    <option value="ssc">SSC</option>
                                    <option value="dakhil">Dakhil</option>
                                    <option value="hsc">HSC</option>
                                    <option value="alim">Alim</option>
                                    <option value="ba">BA</option>
                                    <option value="bba">BBA</option>
                                    <option value="bsc">BSC</option>
                                    <option value="ma">MA</option>
                                    <option value="mba">MBA</option>
                                    <option value="msc">MSC</option>
                                    <option value="others ">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Board Name: </label>
                                <input name="board" type="text" class="form-control" id="name" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label">Institute: </label>
                                <input name="institute" type="text" class="form-control" id="profession" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Year: </label>
                                <input name="year" type="text" class="form-control" id="status" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Result: </label>
                                <input name="result" type="number" class="form-control" id="phone" aria-describedby="emailHelp" />
                            </div>
                            <button type="submit" class="form-btn">Add</button>
                        </form>

                        <div class="family-list mt-4">
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Examination</th>
                                        <th scope="col">Board</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Result</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">SSC</th>
                                        <td>Dhaka</td>
                                        <td>Bangla College</td>
                                        <td>2013</td>
                                        <td>4.25</td>
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