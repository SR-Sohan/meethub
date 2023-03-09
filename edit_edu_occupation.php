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
$row = $db->getOne("education_occupation");

if (isset($_POST['update'])) {
    $data = [
        'user_id' => $db->escape($_POST['id']),
        'education' => $db->escape($_POST['education']),
        'institute' => $db->escape($_POST['institute']),
        'employed' => $db->escape($_POST['employed']),
        'income' => $db->escape($_POST['income']),
        
    ];
  
    if ($row) {
        $db->where("user_id", $id);
        if ($db->update("education_occupation", $data)) {
            header("location:educations_occupation.php");
        } else {
            $message = "Update failed!!";
        }
    } else {
        if ($db->insert("education_occupation", $data)) {
            header("location:educations_occupation.php");
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
                            <h1>Edit Educations & Occupation </h1>
                            <hr>
                            <br>
                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">

                            <div class="mb-3">
                                <label for="hiedu" class="form-label">Highest Education:</label>
                                <select class="form-select" name="education" id="education">
                                    <option   value="-1">Select Highest Education</option>
                                    <option <?= $row['education'] == "ssc" ? 'selected' : "" ?> value="ssc">SSC</option>
                                    <option <?= $row['education'] == "hsc" ? 'selected' : "" ?> value="hsc">HSC</option>
                                    <option <?= $row['education'] == "honours" ? 'selected' : "" ?> value="honours">Honours</option>
                                    <option <?= $row['education'] == "masters" ? 'selected' : "" ?> value="masters">Masters</option>
                                    <option <?= $row['education'] == "bba" ? 'selected' : "" ?> value="bba">BBA</option>
                                    <option <?= $row['education'] == "mba" ? 'selected' : "" ?> value="mba">MBA</option>
                                    <option <?= $row['education'] == "mbbs" ? 'selected' : "" ?> value="mbbs">MBBS</option>
                                    <option <?= $row['education'] == "phd" ? 'selected' : "" ?> value="phd">PHD</option>
                                    <option <?= $row['education'] == "others" ? 'selected' : "" ?> value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="college" class="form-label"> College/Institute:</label>
                                <input class="form-control" type="text" name="institute" value="<?= $row['institute'] ?? ''?>" >
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Employed in :</label>
                                <input <?= $row['employed'] == "government" ? 'checked' : "" ?> class="form-check-input  ms-2" type="radio" name="employed" id="gov" value="government">
                                <label for="gov" class="form-label">Government</label>
                                <input <?= $row['employed'] == "defense" ? 'checked' : "" ?>  class="form-check-input ms-2" type="radio" name="employed" id="def" value="defense">
                                <label for="def" class="form-label">Defense</label>
                                <input <?= $row['employed'] == "private" ? 'checked' : "" ?>  class="form-check-input ms-2" type="radio" name="employed" id="private" value="private">
                                <label for="private" class="form-label">Private</label>
                                <input <?= $row['employed'] == "business" ? 'checked' : "" ?>  class="form-check-input ms-2" type="radio" name="employed" id="business" value="business">
                                <label for="business" class="form-label">Business</label>
                                <input <?= $row['employed'] == "self employed" ? 'checked' : "" ?>  class="form-check-input ms-2" type="radio" name="employed" id="self" value="self employed">
                                <label for="self" class="form-label">Self Employed</label>
                                <input <?= $row['employed'] == "not working" ? 'checked' : "" ?>  class="form-check-input ms-4" type="radio" name="employed" id="notw" value="not working">
                                <label for="notw" class="form-label">Not Working</label>
                            </div>
                            
                          
                            <div class="mb-3">
                                <label for="annual" class="form-label">Annual Income: </label>
                                <input name="income" id="annual" type="number" value="<?= $row['income']??'' ?>">
                                BDT <span id="m_income" class="text-danger">0</span> per month
                            </div>
                            <button type="submit" name="update" class="form-btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#annual").blur(function(){
                $mIncome = Math.round($(this).val() / 12);

                $("#m_income").html($mIncome);
            })
        })
    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>