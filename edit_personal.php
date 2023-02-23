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

if(isset($_POST['update'])){
    $data = [
        'user_id' => $db->escape($_POST['id']),
        'height' => $db->escape($_POST['height']),
        'weight' => $db->escape($_POST['weight']),
        'skin_color' => $db->escape($_POST['color']),
        'religion' => $db->escape($_POST['religion']),
        'blood_group' => $db->escape($_POST['blood']),
        'hobby' => $db->escape($_POST['hobby']),
        'profession' => $db->escape($_POST['profession']),
        'salary' => $db->escape($_POST['income']),
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
                            <h1>Edit Personal Info</h1>
                            <hr>
                            <br>
                            <br>
                            <input type="hidden" name="id"  value="<?= $id?>" >
                            <div class="mb-3">
                                <label for="height" class="form-label">Height: </label>
                                <input name="height" type="text" class="form-control" id="height" aria-describedby="emailHelp" value="<?= $row['height']??'' ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight: </label>
                                <input name="weight" type="number" class="form-control" id="weight" aria-describedby="emailHelp" value="<?= $row['weight']??'' ?>"  />
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Skin Color: </label>
                                <input name="color" type="text" class="form-control" id="color" aria-describedby="emailHelp" value="<?= $row['skin_color']??'' ?>"  />
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="religion" aria-label="Default select example">
                                    <option selected>Choose Religion</option>
                                    <option <?php echo isset($row) && $row['religion'] == "islam" ? 'selected' : "" ?> value="islam">Islam</option>
                                    <option <?php echo  isset($row) && $row['religion'] == "hindu" ? 'selected' : "" ?>  value="hindu">Hindu</option>
                                    <option <?php echo  isset($row) && $row['religion'] == "christian" ? 'selected' : "" ?>  value="christian">Christian</option>
                                    <option <?php echo  isset($row) &&  isset($row) && $row['religion'] == "buddha" ? 'selected' : "" ?>  value="buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="blood" aria-label="Default select example">
                                    <option selected>Choose Blood Group</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "a+" ? 'selected' : "" ?>  value="a+">A+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b-" ? 'selected' : "" ?>  value="a-">A-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b+" ? 'selected' : "" ?>  value="b+">B+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b-" ? 'selected' : "" ?>  value="b-">B-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "ab+" ? 'selected' : "" ?>  value="ab+">AB+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "ab-" ? 'selected' : "" ?>  value="ab-">AB-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "o+" ? 'selected' : "" ?>  value="o+">O+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "o-" ? 'selected' : "" ?>  value="o-">O-</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hobby" class="form-label">Hobby:</label>
                                <textarea class="form-control" name="hobby" id="hobby" rows="3"  ><?= $row['hobby']??'' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession: </label>
                                <input name="profession" type="text" class="form-control" id="profession" aria-describedby="emailHelp" value="<?= $row['profession']??'' ?>"  />
                            </div>
                            <div class="mb-3">
                                <label for="income" class="form-label">Income: </label>
                                <input name="income" type="number" class="form-control" id="income" aria-describedby="emailHelp" value="<?= $row['salary']??'' ?>"  />
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