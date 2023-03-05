<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;

$conn = db::connect();
$db = new MysqliDb();
$page = "Search";

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>


    <!-- brides area start  -->
    <div id="brides-area">
        <div class="container my-5">
            <div class="search-form">
                <form class="w-50 mx-auto p-5 shadow-lg bg-white rounded-3" action="" method="post">
                    <h1 class="mb-3 text-danger">Search Your Partner</h1>
                    <div class="mb-3">
                        <select class="form-select" name="profession" aria-label="Default select example">
                            <option selected>Select Profession</option>
                            <option value="worker">Worker</option>
                            <option value="job">Job</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option selected>Select District</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="location" aria-label="Default select example">
                            <option selected>Select Marital Status</option>
                            <option value="unmarried">Unmarried</option>
                            <option value="divorce">Divorce</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="exam" aria-label="Default select example">
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
                    <input class="btn btn-outline-danger w-100" type="submit" name="search" value="Search">
                </form>
            </div>

        </div>
    </div>
    <!-- brides area End -->



    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>