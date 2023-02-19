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
$page = "Couple";

$gender = $_GET['person'] == "brides" ? "female" : "male";

$db->where ("gender", $gender);
$db->where ("role", "1");
$user = $db->get("users");


?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>


    <!-- brides area start  -->
    <div id="brides-area">
        <div class="container my-5">
            <div class="event-heading text-center my-4">
                <h1>Your preferable Partner</h1>
            </div>
            <div class="row g-4">

            <?php if(isset($user)){ 
                    foreach ($user as $key => $val) {  
                        
                       
                ?>

                <div class="col-lg-3">
                    <div class="single-brides-item">
                        <div class="brides-img shadow-lg">
                            <img src="<?= settings()['homepage']?>assets/images/brides1.jpg" alt="">
                        </div>
                        <div class="brides-content text-center py-1">
                      
                            <h3><a href="<?= settings()['homepage']?>profiledetails.php?id=<?=$val['id']?>">  <?php echo  strtoupper( $val['first_name'].' '.$val['last_name'] ) ?></a></h3>
                            <p><?php  echo $val['gender'] == 'male' ? "Grooms" : "Brides" ?></p>
                        </div>
                    </div>
                </div>
                
                <?php  }}else{
                    echo "<h1 class='text-danger text-center'> No Data</h1>";
                } ?>

            </div>
        </div>
    </div>
    <!-- brides area End -->



    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>