<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;

$conn = db::connect();
$db = new MysqliDb();
$page = "Profile Details";
$id = $_GET['id'];
// $db->where("id", $id);
// $db->where("role", "1");
// $db->where("status", "2");
// $user = $db->get("users");

$qq = "SELECT users.id, concat(users.first_name,' ',users.last_name) as name,
users.phone,
personal_info.* ,
profile_pic.name as img
FROM `users`,personal_info,profile_pic
WHERE 
users.id = '".$id."' AND
users.gender = 'male' AND
users.role = '1' AND
users.status = '2' AND
profile_pic.user_id = '".$id."' AND
personal_info.user_id = '".$id."';";

$result2 = $conn->query($qq)->fetch_assoc();


$db->where("user_id", $id);
$social=$db->get("social");

$imgUrl = '';

if (isset($result2['img'])) {
    $imgUrl = "profile-image/" . $result2['img'];
} else {
    $imgUrl = "assets/images/no-image.png";
}


// For Male Query
$q = "select users.id, concat(users.first_name,' ',users.last_name) as name,profile_pic.name as img  from users,profile_pic where role = '1' and gender = 'male' and profile_pic.user_id = users.id";
$result = $conn->query($q);


// For FeMale Query
$qury = "select users.id, concat(users.first_name,' ',users.last_name) as name,profile_pic.name as img  from users,profile_pic where role = '1' and gender = 'female' and profile_pic.user_id = users.id";
$res = $conn->query($qury)

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- profile details area start  -->
    <div class="profile-details">
        <div class="container ">
            <div class="row ">
                <div class="col-md-8">
                    <div class="main-content">
                        <div class="top-content bg-white p-3 rounded-4 shadow-lg">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="image">
                                        <img src="<?= settings()['homepage'] . $imgUrl ?>" alt="" class="personal-image rounded-3">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="pro-info">
                                        <ul class="user-details">
                                            <li>Name: <?= $result2['name']??'' ?> </li>
                                            <li>Height: <?= $result2['height'].'"'??'' ?></li>
                                            <li>Weight: <?= $result2['weight'].'Kg'??'' ?></li>
                                            <li>Skin Color: <?= $result2['skin_color']??'' ?></li>
                                            <li>Religion: <?= $result2['religion']??'' ?></li>
                                            <li>Blood Group: <?= $result2['blood_group']??'' ?></li>
                                            <li>Hobby: <?= $result2['hobby']??'' ?></li>
                                            <li>Income: <?= "$".$result2['salary']??'' ?></li>
                                            <li>Phone: +880<?= $result2['phone']??'' ?></li>
                                        </ul>
                                    </div>
                                    <div class="social-info">
                                   
                                        <ul class="social-link sl-2 text-center">
                                            <?php
                                            if (isset($social)) {

                                                foreach ($social as $key => $value) {

                                            ?>

                                                    <li><a href="<?= $value['link'] ?>" target="_blank"><i class="fa-brands fa-<?= $value['name'] ?>"></i></a></li>

                                            <?php }
                                            } ?>

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
                            <button id="pAddressBtn" class="tablinks" onclick="details(event,'pAddress')">
                                Present Address
                            </button>
                            <button id="hAddressBtn" class="tablinks" onclick="details(event,'hAddress')">
                                Home Address
                            </button>
                            <button id="preferenceBtn" class="tablinks" onclick="details(event,'preference')">
                                Partner Preference
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

                        <div id="pAddress" class="tabcontent">
                            <h3>Present Address:</h3>
                            <div id="presentAddress" class="address">

                            </div>

                        </div>
                        <div id="hAddress" class="tabcontent">
                            <h3>Home Address:</h3>
                            <div id="homeAddress" class="address">

                            </div>

                        </div>
                        <div id="preference" class="tabcontent">
                            <h3>Preference:</h3>
                            <div id="partnerPrefernce" class="address">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <aside>
                        <div class="brides-sidebar">
                            <h3 class="sidebar-heading">Brides</h3>
                            <?php
                            if ($res->num_rows) {
                                while ($rw = $res->fetch_assoc()) {
                                    $img = $row['img'] ? "profile-image/" . $row['img'] : "assets/images/no-image.png";

                            ?>
                                    <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                        <img src="<?= settings()['homepage'] . $img ?>" alt="">
                                        <h3><a href="<?= settings()['homepage'] ?>person-details.php?id=<?= $rw['id'] ?>"><?= $rw['name'] ?></a></h3>
                                    </div>
                            <?php

                                }
                            }
                            ?>

                        </div>
                        <div class="brides-sidebar">
                            <h3 class="sidebar-heading">Grooms</h3>
                            <?php
                            if ($result->num_rows) {
                                while ($row = $result->fetch_assoc()) {

                                    $img = $row['img'] ? "profile-image/" . $row['img'] : "assets/images/no-image.png";

                            ?>
                                    <div class="single-item d-flex align-items-center my-3 bg-white p-3 shadow-lg rounded-2">
                                        <img src="<?= settings()['homepage'] . $img ?>" alt="">
                                        <h3><a href="<?= settings()['homepage'] ?>person-details.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h3>
                                    </div>
                            <?php

                                }
                            }
                            ?>


                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- profile details area End -->

        <script>
            $(document).ready(function() {

                // Show Preference
                $("#preferenceBtn").click(function() {
                    $.ajax({
                        url: "person-details-class.php",
                        method: "get",
                        data: {
                            pre_id: <?= $id ?>
                        },
                        complete: function(d) {
                            $('#partnerPrefernce').html(d.responseText);

                        }
                    })

                });

                //Show Address
                $("#hAddressBtn").click(function() {
                    $.ajax({
                        url: "person-details-class.php",
                        method: "get",
                        data: {
                            h_id: <?= $id ?>,
                            action: "search"
                        },
                        complete: function(d) {
                            $("#homeAddress").html(d.responseText)

                        }
                    })
                })
                $("#pAddressBtn").click(function() {
                    $.ajax({
                        url: "person-details-class.php",
                        method: "get",
                        data: {
                            p_id: <?= $id ?>,
                            action: "search"
                        },
                        complete: function(d) {
                            $("#presentAddress").html(d.responseText)

                        }
                    })
                })


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
                            <td class="text-capitalize">${value.board}</td>
                            <td class="text-capitalize">${value.Institute}</td>
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
                            <td class="text-capitalize">${value.name}</td>
                            <td class="text-capitalize">${value.relation}</td>
                            <td class="text-capitalize">${value.profession}</td>
                            <td class="text-capitalize">${value.status}</td>
                            <td>+880${value.phone}</td>
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