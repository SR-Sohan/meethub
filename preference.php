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
$page = "Preference";
$r = $db->get('districts');
$preference = $db->get("partner_preference");
if (isset($_POST['add'])) {
    $data = [
        'user_id' => $db->escape($_POST['user_id']),
        'education' => $db->escape($_POST['exam']),
        'district' => $db->escape($_POST['district']),
        'height' => $db->escape($_POST['height']),
        'dislike_habbit' => $db->escape($_POST['habits']),

    ];

   

    if ($db->insert("partner_preference", $data)) {
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
                            <input type="hidden" name="user_id" value="<?= $id ?>">
                            <div class="mb-3">
                                <select class="form-select" name="exam" aria-label="Default select example">
                                    <option selected>Select Education</option>
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
                                <label for="h_district" class="form-label">Home District: </label>
                                <select onchange="hDistrict(this.value)" class="form-select" name="district" id="h_district" aria-label="Default select example" required>
                                    <option disabled selected>Select District</option>
                                    <?php
                                    foreach ($r as $key => $dis) {
                                        echo '<option value="' . $dis['id'] . '">' . $dis['name'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="height" class="form-label">Height: </label>
                                <input name="height" type="text" class="form-control" id="phone" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="dislike" class="form-label">Dislike Habits:</label>
                                <textarea class="form-control" name="habits" id="hobby" rows="3"></textarea>
                            </div>



                            <button type="submit" name="add" class="form-btn">Add</button>
                        </form>

                        <div class="dislike-list mt-4">
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Education</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">Dislike Habits</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($preference)) {
                                        
                                        foreach ($preference as $key => $value) {

                                       ?>
                                    <tr>
                                        <th scope="row"><?= strtoupper($value['education'])?></th>
                                        <td><?= $value['district']?></td>
                                        <td><?= $value['height']?></td>
                                        <td><?= $value['dislike_habbit']?></td>
                                        
                                        <td><a href="" class="btn btn-outline-primary">Edit</a> <a href="<?= settings()['homepage']?>delete_preference.php?id=<?= $value['id']?>" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                    <?php
                                        }}
                            
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <?php
        require __DIR__ . '/components/footer.php';
        $db->disconnect();
        ?>