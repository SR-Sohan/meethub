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
$page = "Profile Details";
$id = $_GET['id'];
$db->where("id", $id);
$db->where("role", "1");
$db->where("status", "2");
$user = $db->get("users");

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- profile details area start  -->
    <div class="profile-details">
        <div class="container ">
            <div class="row ">
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="top-content bg-white p-3 rounded-4 shadow-lg">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image">
                                        <img src="<?= settings()['homepage'] ?>assets/images/no-image.png" alt="" class="personal-image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pro-info">
                                        <ul class="user-details">
                                            <li>Name: <?= $user[0]['first_name'] ?> <?= $user[0]['last_name'] ?> </li>
                                            <li>Phone: +880<?= $user[0]['phone'] ?></li>
                                            <li>Email: <?= $user[0]['email'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="bottom-content my-5 shadow-lg">
                        <div class="tab">
                            <button id="educationBtn" data-id="" class="tablinks active" onclick="details(event,'education')">
                                Education
                            </button>
                            <button id="family_infoBtn" class="tablinks" onclick="details(event,'family')">
                                Family Info
                            </button>
                            <button id="p_addressBtn" class="tablinks" onclick="details(event,'address')">
                                Present Address
                            </button>
                        </div>

                        <!-- Tab content -->
                        <div id="education" class="tabcontent" style="display: block;">
                            <h3>Education:</h3>
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Examination</th>
                                        <th scope="col">Board</th>
                                        <th scope="col">Institute</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Result</th>
                                    </tr>
                                </thead>
                                <tbody id="eduTable">


                                </tbody>
                            </table>
                        </div>

                        <div id="family" class="tabcontent">
                            <h3>Family Info:</h3>
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">Profession</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Phone</th>
                                    </tr>
                                </thead>
                                <tbody id="familyTable">
                                </tbody>
                            </table>

                        </div>

                        <div id="address" class="tabcontent">
                            <h3>Address</h3>
                            <p>Present Address: </p>
                            <p>Home Address: </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <aside>
                        <div class="brides-sidebar">
                            <h3 class="sidebar-heading">Brides</h3>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/brides3.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/brides3.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/brides3.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>

                        </div>
                        <div class="brides-sidebar">
                            <h3 class="sidebar-heading">Grooms</h3>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/groomsmen-img1-1.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/groomsmen-img1-1.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>
                            <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                <img src="<?= settings()['homepage'] ?>assets/images/groomsmen-img1-1.jpg" alt="">
                                <h3><a href="">Susmita Singh</a></h3>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- profile details area End -->

        <script>
            $(document).ready(function() {


                // Show Education Person Details
                $.ajax({
                    url: "person-details-class.php",
                    method: "get",
                    data: {
                        e_id: <?= $id ?>,
                        action: "search"
                    },
                    complete: function(data) {
                        let html = ""
                        $.each(JSON.parse(data.responseText), function(key, value) {
                            html += `<tr>
                            <td class="text-uppercase">${value.exam}</td>
                            <td>${value.board}</td>
                            <td>${value.Institute}</td>
                            <td>${value.year}</td>
                            <td>${value.result}</td>
                            </tr>`
                        })
                        $('#eduTable').append(html);
                    }
                })

                // Family info Btn click
                $("#family_infoBtn").click(function() {
                    // Show Education Person Details
                    $.ajax({
                        url: "person-details-class.php",
                        method: "get",
                        data: {
                            f_id: <?= $id ?>,
                            action: "search"
                        },
                        complete: function(data) {
                            let html = "";
                            $('#familyTable').empty();
                            $.each(JSON.parse(data.responseText), function(key, value) {
                                html += `<tr>
                            <td class="text-uppercase">${value.name}</td>
                            <td>${value.relation}</td>
                            <td>${value.profession}</td>
                            <td>${value.status}</td>
                            <td>${value.phone}</td>
                            </tr>`
                            })
                            $('#familyTable').append(html);
                        }
                    })
                })
            })







            function details(evt, cityName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
        <?php
        require __DIR__ . '/components/footer.php';
        $db->disconnect();
        ?>