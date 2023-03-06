<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}



$db = new MysqliDb();
$page = "Message";


?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Message</li>
                    </ol>
                 
                        <table class="table table-danger table-striped w-100 mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Place</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($res )) {

                                    foreach ($res  as $key => $value) {

                                ?>


                                        <tr>
                                            <th scope="row"><?= $value['title'] ?></th>
                                            <td><?= $value['event_date'] ?></td>
                                            <td><?= $value['event_place'] ?></td>
                                            <td><?= $value['event_stime'] ?></td>
                                            <td><?= $value['event_etime'] ?></td>
                                            

                                            <td> <a data-id="<?= $value['id'] ?? '' ?>" href="javascript:void(0)" class="btn btn-outline-danger deleteBtn">Delete</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>  
                </div>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->
            <script>
                $(document).ready(function() {
                    $(".deleteBtn").click(function() {
                        let btn = $(this);
                        let id = btn.data('id');
                        $.ajax({
                            url: "admin-ajax.php",
                            method: "post",
                            data: {
                                event_id: id
                            },
                            complete: function(d) {
                                if (d.responseText) {
                                    btn.parent().parent().remove();
                                    alert(d.responseText);
                                } else {
                                    alert(d.responseText);
                                }
                            }
                        })
                    })
                })
            </script>
            <?php require __DIR__ . '/components/footer.php'; ?>
     