<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<div class="col-md-3">
    <div class="profile-sidebar text-white">
        <div class="profile-img">
            <img src="<?= settings()['homepage'] ?>assets/images/no-image.png" alt="">
            <a href="<?= settings()['homepage'] ?>profile_change.php?id=<?=$_SESSION['userid']??''?>">Change Profile Picture</a>
        </div>
        <h2 class="my-3">  <?php echo $_SESSION['fname']." ".$_SESSION['lname']??'' ?></h2>

        <ul class="profile-sidebar-menu">
            <li><a href="<?= settings()['homepage']?>profile.php">Profile</a></li>
            <li><a href="<?= settings()['homepage']?>personal_info.php">Personal Info</a></li>
            <li><a href="<?= settings()['homepage']?>family_info.php">Family Info</a></li>
            <li><a href="<?= settings()['homepage']?>address.php">Address</a></li>
            <li><a href="<?= settings()['homepage']?>educations.php">Educations</a></li>
            <li><a href="<?= settings()['homepage']?>social.php">Social Link</a></li>
            <li><a href="<?= settings()['homepage']?>preference.php">Preference</a></li>
        </ul>
    </div>
</div>