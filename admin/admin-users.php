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
$page = "Users";

// $db = new MysqliDb();
// $page = "All Users";
// $db->where("role", '1');
// $db->orderBy ("users.id","desc");
// $users = $db->get("users");
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
                    <label for="filterUser">Filter Users</label>
                    <select id="filterUser" class="form-select" aria-label="Default select example">
                        <option  selected value="all">All</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="2">Active Users</option>
                        <option value="1">Inactive Users</option>
                        <option value="unmarried">Unmarried Users</option>
                        <option value="divorced">Divorced Users</option>
                        <option value="widow">Widow Users</option>
                    </select>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Marital Status</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userBody">
                        </tbody>
                    </table>

                </div>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->
            <?php require __DIR__ . '/components/footer.php'; ?>
            <script>
                $(document).ready(function() {

                    // Filter Users

                    $("#filterUser").change(function(){
                        let val = $(this).val();
                        $.ajax({
                            url: "admin-ajax.php",
                            method: "get",
                            data:{
                                filter: val
                            },
                            complete: function(d){
                                $("#userBody").html(JSON.parse(d.responseText));
                            }
                        })
                    })

                    //Load Users
                    $.ajax({
                        url: "admin-ajax.php",
                        method: "get",
                        data: {
                            all: "all"
                        },
                        complete: function(d) {
                            $("#userBody").html(JSON.parse(d.responseText));
                        }
                    })


                    // Delete users
                    $("#userBody").on('click', '.deleteUsers', function() {
                        let btn = $(this);
                        var id = $(this).data('id');
                        // $(this).parent().parent().remove();

                        $.ajax({
                            url: "admin-ajax.php",
                            method: "post",
                            data: {
                                did: id
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
                    //Status Change 
                    $("#userBody").on('change', '.status', function() {

                        let val = $(this).val();
                        var id = $(this).data('id');
                        $.ajax({
                            url: "admin-ajax.php",
                            method: "post",
                            data: {
                                uid: id,
                                val: val
                            },
                            complete: function(d) {
                                alert(d.responseText);
                            }
                        })
                    })
                });

                // $(function(){

                // })
            </script>