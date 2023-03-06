<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';
use App\auth\Admin;
if(!Admin::Check()){
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$db = new MysqliDb();

$db->where('gender','male');
$db->where('role','1');
$db->orderBy ("users.id","desc");
$male = $db->get("users");

$db->where('gender','female');
$db->where('role','1');
$db->orderBy ("users.id","desc");
$female = $db->get("users");

$db->where('seen','1');
$message = $db->get("message");




?>
<?php require __DIR__.'/components/header.php'; ?>

    </head>
    <body class="sb-nav-fixed">
    <?php require __DIR__.'/components/navbar.php'; ?>
        <div id="layoutSidenav">
        <?php require __DIR__.'/components/sidebar.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <!-- changed content -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4 text-center">
                                    <div class="card-body">
                                        <h3>Total Grooms</h3>
                                        <h5><?= count($male); ?></h5>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4 text-center">
                                    <div class="card-body">
                                        <h3>Total Brides</h3>
                                        <h5><?= count($female); ?></h5>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4 text-center">
                                    <div class="card-body">
                                        <h3>New Message</h3>
                                        <h5><?= count($message); ?></h5>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- changed content  ends-->
                </main>
<!-- footer -->
<?php require __DIR__.'/components/footer.php'; ?>
     
