<?php 

require __DIR__ . '/vendor/autoload.php';
use App\db;
if(isset($_GET['e_id'])){
    $conn = db::connect();

    $id = $_GET['e_id'];
    $q = "select * from educations where user_id = '".$id."'";

    $result = $conn->query($q);

    if($result->num_rows > 0){
        $edu = array();

        while($r = $result->fetch_assoc()){
            array_push($edu,$r);
        }
        echo json_encode($edu);
    }
    else echo json_encode(["result"=>"No Data"]);
}

if(isset($_GET['f_id'])){
    $conn = db::connect();

    $id = $_GET['f_id'];
    $q = "select * from family_info where user_id = '".$id."'";

    $result = $conn->query($q);

    if($result->num_rows > 0){
        $edu = array();

        while($r = $result->fetch_assoc()){
            array_push($edu,$r);
        }
        echo json_encode($edu);
    }
    else echo json_encode(["result"=>"No Data"]);
}

if(isset($_GET['p_id'])){
    $conn = db::connect();
    $q = "SELECT 
    address.p_country,
    divisions.name as hdivisions,
    districts.name as hdistricts,
    upazilas.name as hthana,
    address.p_village,
    address.p_house
    FROM `users`,address,divisions,districts,upazilas
    WHERE 
    address.user_id = '".$_GET['p_id']."' AND
    divisions.id = address.p_division AND
    districts.id = address.p_disrict AND
    upazilas.id = address.p_thana LIMIT 1";
    $result = $conn->query($q);

    if($result->num_rows){
        $html = "<ul>";

        while($row = $result->fetch_assoc()){
            $html .= "<li class='text-capitalize'>Country: ".$row['p_country']."</li>";
            $html .= "<li class='text-capitalize'>Division: ".$row['hdivisions']."</li>";
            $html .= "<li class='text-capitalize'>District: ".$row['hdistricts']."</li>";
            $html .= "<li class='text-capitalize'>Thana: ".$row['hthana']."</li>";
            $html .= "<li class='text-capitalize'>Village/Area: ".$row['p_village']."</li>";
            $html .= "<li class='text-capitalize'>House No: ".$row['p_house']."</li>";
        }
        $html .= "</ul>";
        echo $html;
    }else echo "Not Set Preset Address";

}
if(isset($_GET['h_id'])){
    $conn = db::connect();
    $q = "SELECT 
    home_address.country,
    divisions.name as hdivisions,
    districts.name as hdistricts,
    upazilas.name as hthana,
    home_address.village,
    home_address.house
    FROM `users`,home_address,divisions,districts,upazilas
    WHERE 
    home_address.user_id = '".$_GET['h_id']."' AND
    divisions.id = home_address.division AND
    districts.id = home_address.district AND
    upazilas.id = home_address.thana LIMIT 1";
    $result = $conn->query($q);

    if($result->num_rows){
        $html = "<ul>";

        while($row = $result->fetch_assoc()){
            $html .= "<li class='text-capitalize'>Country: ".$row['country']."</li>";
            $html .= "<li class='text-capitalize'>Division: ".$row['hdivisions']."</li>";
            $html .= "<li class='text-capitalize'>District: ".$row['hdistricts']."</li>";
            $html .= "<li class='text-capitalize'>Thana: ".$row['hthana']."</li>";
            $html .= "<li class='text-capitalize'>Village/Area: ".$row['village']."</li>";
            $html .= "<li class='text-capitalize'>House No: ".$row['house']."</li>";
        }
        $html .= "</ul>";
        echo $html;
    }else echo "Not Set Preset Address";

}

$conn->close();