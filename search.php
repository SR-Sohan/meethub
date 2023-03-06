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
$page = "Search";

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>


    <!-- brides area start  -->
    <div id="brides-area">
        <div class="container my-5">
            <div data-aos="fade-up" data-aos-duration="1000" class="search-form">
                <form class="w-50 mx-auto p-5 shadow-lg bg-white rounded-3" action="" method="post">
                    <h1 class="mb-3 text-danger">Search Your Partner</h1>
                    <div class="mb-3">
                        <label for="profession">Profession</label>
                        <input class="form-control" type="text" name="profession" id="profession">
                    </div>
                    <div class="mb-3">
                        <select id="district"  class="form-select" name="gender" aria-label="Default select example">
                            <option selected>Select District</option>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <select  id="marital" class="form-select" name="location" aria-label="Default select example">
                            <option selected>Select Marital Status</option>
                            <option value="unmarried">Unmarried</option>
                            <option value="divorce">Divorce</option>
                            <option value="widow">Widow</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="gender" class="form-select" name="gender" aria-label="Default select example">
                            <option selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="education" class="form-select" name="exam" aria-label="Default select example">
                            <option selected>Select Education</option>
                            <option value="psc">PSC</option>
                            <option value="jsc">JSC</option>
                            <option value="jdc">JDC</option>
                            <option value="ssc">SSC</option>
                            <option value="dakhil">Dakhil</option>
                            <option value="hsc">HSC</option>
                            <option value="alim">Alim</option>
                            <option value="ba">BA</option>
                            <option value="bba">BBA</option>
                            <option value="bsc">BSC</option>
                            <option value="ma">MA</option>
                            <option value="mba">MBA</option>
                            <option value="msc">MSC</option>
                            <option value="others ">Others</option>
                        </select>
                    </div>
                    <input id="searchBtn" class="btn btn-outline-danger w-100" type="submit" name="search" value="Search Partner">
                </form>
            </div>

        </div>
    </div>
    <!-- brides area End -->

    <script>
        $(document).ready(function(){

            // Search Btn click

            $("#searchBtn").click(function(e){
                e.preventDefault();
                let profession = $("#profession").val();
                let district = $("#district").val();
                let marital = $("#marital").val();
                let education = $("#education").val();
                let gender = $("#gender").val();

                $.ajax({
                    url: "ajaxwork.php",
                    method: 'get',
                    data:{
                        search: "search",
                        profession: profession,
                        district: district,
                        marital: marital,
                        education: education,
                        gender: gender
                    },
                    complete:function(d){
                        console.log(d.responseText);
                    }
                })
                
            })

            // all District
            $.ajax({
                url: "ajaxwork.php",
                method: "get",
                data:{
                    dis_search: "all"
                },
                complete:function(d){
                    $("#district").append(JSON.parse(d.responseText));
                }
            })
        })
    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>