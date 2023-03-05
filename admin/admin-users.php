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
$page = "All Users";
$db->where("role", '1');
$db->orderBy ("users.id","desc");
$users = $db->get("users");
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
                        <li class="breadcrumb-item active">Users</li>
                    </ol>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (isset($users)) {
                                foreach ($users as $key => $value) {
                                    static $sl = 1;
                            ?>
                                    <tr>
                                        <th scope="row"><?= $sl ?></th>
                                        <td class="text-capitalize"><?= $value['first_name'] ?></td>
                                        <td class="text-capitalize"><?= $value['last_name'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td>+880<?= $value['phone'] ?></td>
                                        <td class="text-capitalize"><?= $value['gender'] ?></td>
                                        <td>
                                             
                                            <select  data-id="<?= $value['id'] ?>" class="status form-select form-select-lg mb-3" aria-label=".form-select-lg example">   
                                                <option <?= $value['status'] == "2" ? 'selected' : '' ?> value="2">Active</option>
                                                <option <?= $value['status'] == "1" ? 'selected' : '' ?> value="1">Inactive</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="">View</a>
                                            <a  data-id="<?= $value['id'] ?>" class="btn btn-outline-danger deleteUsers" href="javascript:void(0)">Delete</a>
                                        </td>
                                    </tr>

                            <?php
                                    $sl++;
                                }
                            } ?>

                        </tbody>
                    </table>

                </div>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->
            <?php require __DIR__ . '/components/footer.php'; ?>
        <script>
             
            $(document).ready(function(){
                // Delete users
                $(".deleteUsers").click(function(){
                    let btn = $(this);
                    var id = $(this).data('id');
                    // $(this).parent().parent().remove();

                    $.ajax({
                        url:"admin-ajax.php",
                        method:"post",
                        data:{
                            did: id
                        },
                        complete:function(d){
                            if(d.responseText){
                                btn.parent().parent().remove();
                                alert(d.responseText);
                            }else{
                                alert(d.responseText);
                            }
                        }
                    })
                })
               //Status Change 
                $(".status").change(function(){
                    let val = $(this).val();
                    var id = $(this).data('id');
                   
                    $.ajax({
                        url: "admin-ajax.php",
                        method: "post",
                        data:{
                            uid: id,
                            val: val
                        },
                        complete:function(d){
                            alert(d.responseText);
                        }
                    })
                })
            });

            // $(function(){

            // })
        </script>