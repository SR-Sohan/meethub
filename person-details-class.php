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