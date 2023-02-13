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
$page = "Edit Address";
?>

<?php require __DIR__ . '/components/header.php'; ?>


</head>

<body>

    <?php require __DIR__ . '/components/menubar.php';  ?>

    <div class="profile-page-area">
        <div class="container-fluid">
            <div class="row">
                <?php require __DIR__ . '/components/profile_sidebar.php'; ?>
                <div class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">

                        <form class="" method="post">
                            <h1>Edit Address</h1>
                            <hr>
                            <br>
                            <br>
                            <div>
                            <label for="p_country" class="form-label">Present Country: </label>
                                <select class="form-select" name="p_country" id="p_country" aria-label="Default select example">
                                    <option value="bangladesh" selected>Bangladesh</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="p_division" class="form-label">Present Division: </label>
                                <select onchange="divisionChange(this)" class="form-select" name="p_division" id="p_division" aria-label="Default select example">
                                     <option selected>Choose Division</option>
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="p_district" class="form-label">Present District: </label>
                                <select onchange="districtChange(this)" class="form-select" name="p_district" id="p_district" aria-label="Default select example">
                                    <option selected>Choose District</option>                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="p_thana" class="form-label">Present Thana: </label>
                                <select class="form-select" name="p_thana" id="p_thana" aria-label="Default select example">
                                    <option selected>Choose District</option>
                                    <option value="bangladesh">Mirpur</option>
                                
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="p_village" class="form-label">Present Village/Area: </label>
                             <input class="form-control" type="text" name="p_village" id="p_village">
                            </div>
                            
                            <div class="mb-3">
                            <label for="p_house" class="form-label">Present House No: </label>
                             <input class="form-control" type="text" name="p_house" id="p_house">
                            </div>
                            <hr>
                            <div class="mb-3">
                            <label for="h_country" class="form-label">Home Country: </label>
                                <select class="form-select" name="h_country" id="h_country" aria-label="Default select example">
                                    <option value="bangladesh" selected>Bangladesh</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="h_division" class="form-label">Home Division: </label>
                                <select class="form-select" name="h_division" id="h_division" aria-label="Default select example">
                                <option selected>Choose Division</option>
                                    <option value="bangladesh">Dhaka</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="h_district" class="form-label">Home District: </label>
                                <select class="form-select" name="h_district" id="h_district" aria-label="Default select example">
                                    <option selected>Choose District</option>
                                    <option value="bangladesh">Kushtia</option>
                                
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="h_thana" class="form-label">Home Thana: </label>
                                <select class="form-select" name="h_thana" id="h_thana" aria-label="Default select example">
                                    <option selected>Choose District</option>
                                    <option value="bangladesh">Mirpur</option>
                                
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="h_village" class="form-label">Home Village/Area: </label>
                             <input class="form-control" type="text" name="h_village" id="h_village">
                            </div>
                            
                            <div class="mb-3">
                            <label for="h_house" class="form-label">Home House No: </label>
                             <input class="form-control" type="text" name="h_house" id="h_house">
                            </div>
                            

                            <button type="submit" class="form-btn">Update Address</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./resources/division.js"></script>
    <script src="./resources/district.js"></script>
    <script src="./resources/thana.js"></script>
    <script type="text/javascript">
        // Get Divisions
        let div = divisions;
        let p_division = document.getElementById('p_division');

        let html;
        div[2]['data'].forEach(e => {
            
            html += `
            <option value="${e.id}">${e.name}</option>
            `;
        });

        p_division.innerHTML = html;


        // Division Change Fx
        function divisionChange(event){
            let divValue = event.value;
            let p_district =  document.getElementById('p_district');
            let dHtml;

            districts[2]['data'].forEach(d =>{
                if(d.division_id == divValue)
               dHtml += `
                    <option value="${d.id}">${d.name}</option>
                    `;
            })

            p_district.innerHTML = dHtml;

        }

        // Districts change FX
        function districtChange(e){
            let disId = e.value;
            let p_thana =  document.getElementById('p_thana');
            let pHtml;
            thana[2]['data'].forEach(t =>{
                if(t.district_id == disId)
                pHtml += `
                    <option value="${t.id}">${t.name}</option>
                    `;
            })
            p_thana.innerHTML = pHtml;
        }


    </script>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>