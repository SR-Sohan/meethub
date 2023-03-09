<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$db = new MysqliDb();
$id = $_SESSION['userid'];
$db->where("user_id", $id);
$pic = $db->getOne("profile_pic");


$img = isset($pic) ? settings()['homepage']."profile-image/".$pic['name'] : settings()['homepage']."assets/images/no-image.png";
?>

<div data-aos="fade-right" data-aos-duration="1000" class="col-md-3">
    <div class="profile-sidebar text-white">
        <div class="profile-img">
            <img src="<?= $img ?>" alt="">
            <a href="<?= settings()['homepage'] ?>profile_change.php?id=<?=$_SESSION['userid']??''?>">Change Profile Picture</a>
        </div>
        <h2 class="my-3">  <?php echo $_SESSION['fname']." ".$_SESSION['lname']??'' ?></h2>

        <ul class="profile-sidebar-menu">
            <li><a href="<?= settings()['homepage']?>profile.php">Profile</a></li>
            <li><a href="<?= settings()['homepage']?>personal_info.php">Personal Info</a></li>
            <li><a href="<?= settings()['homepage']?>family_info.php">Family Info</a></li>
            <li><a href="<?= settings()['homepage']?>address.php">Address</a></li>
            <li><a href="<?= settings()['homepage']?>educations_occupation.php">Educations & Occupation</a></li>
            <li><a href="<?= settings()['homepage']?>social.php">Social Link</a></li>
            <li><a href="<?= settings()['homepage']?>preference.php">Preference</a></li>
        </ul>
    </div>
</div>