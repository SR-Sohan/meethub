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
                    <label for="filterUser">Filter Message</label>
                    <select id="filterMsg" class="form-select" aria-label="Default select example">
                        <option selected value="all">All</option>
                        <option value="1">Unread Message</option>
                        <option value="2">Read Message</option>
                    </select>
                    <table class="table table-danger table-striped w-100 mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userMsg">
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- changed content  ends-->
    </main>
    <!-- footer -->
    <script>
        $(document).ready(function() {

            //Message seen Change
            $("#userMsg").on("change",".msgChange",function(){
          
                $.ajax({
                    url: "admin-ajax.php",
                    method: 'post',
                    data:{
                        id: $(this).data('id'),
                        msg_chng: $(this).val()
                    },
                    complete: function(d){
                        let result =JSON.parse(d.responseText);                       
                        alert(result.msg);
                        
                        if(result.count == '0'){
                            $("#msgCount").remove();
                        }else{
                            $("#msgCount").html(result.count);
                        }
                    }
                })
            })

            // Filter Message
            $("#filterMsg").change(function() {
                $.ajax({

                    url: "admin-ajax.php",
                    method: "get",
                    data: {
                        msg_val: $(this).val()
                    },
                    complete: function(d) {
                        $("#userMsg").html(JSON.parse(d.responseText));
                    }
                });
            })


            // New Message
            $.ajax({
                url: "admin-ajax.php",
                method: "get",
                data: {
                    all_msg: "1"
                },
                complete: function(d) {
                    $("#userMsg").html(JSON.parse(d.responseText));
                }
            })

            // $(".deleteBtn").click(function() {
            //     let btn = $(this);
            //     let id = btn.data('id');
            //     $.ajax({
            //         url: "admin-ajax.php",
            //         method: "post",
            //         data: {
            //             event_id: id
            //         },
            //         complete: function(d) {
            //             if (d.responseText) {
            //                 btn.parent().parent().remove();
            //                 alert(d.responseText);
            //             } else {
            //                 alert(d.responseText);
            //             }
            //         }
            //     })
            // })



        })
    </script>
    <?php require __DIR__ . '/components/footer.php'; ?>