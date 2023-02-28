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
$page = "Profile Picture Change";
if (isset($_POST['upload'])) {
    $uid = $_POST['id'];
    $photo = $_FILES['file'];
    $db->where("user_id", $id);
    $pic = $db->getOne("profile_pic");

    if (isset($pic)) {
        $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png", 'image/webp');
        $name = $uid . "_" . $photo['name'];
        // image  updated
        if (in_array($photo['type'], $allowed)) {
            unlink('profile-image/'.$pic['name']);
            if (move_uploaded_file($photo["tmp_name"], 'profile-image/' . $name)) {
                $data = array(
                    "user_id" => $uid,
                    "name" => $name
                );
                $db->where('user_id', $pic['user_id']);
                $pic = $db->update('profile_pic', $data);
                if ($pic) {
                    $msg = "Profile Pic Uploaded";
                    $loc = settings()['homepage'] . "profile.php";
                    header("location:".$loc);
                } else {
                    $msg = "Profile Pic Uploaded Failed";
                }
            }
        } else {
            $msg = "Please check your file type";
        }
    } else {

        $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png", 'image/webp');
        $name = $uid . "_" . $photo['name'];

        // image  uploaded
        if (in_array($photo['type'], $allowed)) {
            if (move_uploaded_file($photo["tmp_name"], 'profile-image/' . $name)) {
                $data = array(
                    "user_id" => $uid,
                    "name" => $name
                );
                $pic = $db->insert('profile_pic', $data);
                if ($pic) {
                    $msg = "Profile Pic Uploaded";
                    $loc = settings()['homepage'] . "profile.php";
                    header("location:".$loc);
                } else {
                    $msg = "Profile Pic Uploaded Failed";
                }
            }
        } else {
            $msg = "Please check your file type";
        }
    }
}
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="profile-change-wrap">
        <div class="container-fluid">
            <div class="profile-pic-area ">
                <form class="w-50 bg-white p-5 shadow-lg mx-auto  rounded-3 my-5 d-flex flex-column align-items-center justify-content-center " action="" enctype="multipart/form-data" method="post">
                    <h3 class="mb-5">Change Profile Picture</h3>
                    <h2><?= $msg ?? "" ?></h2>
                    <div id="imgPreview">
                        <?php 
                        $db->where("user_id", $id);
                        $pic = $db->getOne("profile_pic");
                        if(isset($pic)){

                            echo "<img width='50%' src='".settings()['homepage'].'profile-image/'.$pic['name']."' />";
                        } ?>
                    </div>
                    <div class="file-input mt-3">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="file" name="file" id="photo" class="file-input__input" />
                        <label class="file-input__label" for="photo">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                            </svg>
                            <span>Choose file</span></label>
                    </div>
                    <input class="btn btn-outline-danger mt-3" type="submit" name="upload" value="Upload">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#photo').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let html = "<img class='mb-3' src='" + event.target.result + "'>"
                        console.log(event.target.result);
                        $('#imgPreview').html(html);
                    }
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>