<?php 
require __DIR__ . '/vendor/autoload.php';
use App\db;
$conn = db::connect();

// Fetch Districts
if(isset($_POST['divi_id'])){
    
    $q = "select * from districts where division_id ='".$_POST['divi_id']."'";
    $result = $conn->query($q);

    if($result->num_rows > 0){
        echo '  <option disabled selected>Select District</option>  ';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
      
    }

}

// Fetch Thana
if(isset($_POST['dis_id'])){

    $q = "select * from  upazilas where district_id ='".$_POST['dis_id']."'";
    $result = $conn->query($q);

    if($result->num_rows > 0){
        echo '  <option disabled selected>Select Thana</option>  ';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
      
    }

}


//insert message

if(isset($_POST['msg_id'])){
    $id = $_POST['msg_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $q = "insert into message values(null,'".$id."','".$name."','".$email."','".$subject."','".$message."','".$phone."','1',null)";

    $conn->query($q);

    if($conn->affected_rows){
        echo "Message Sent";
    }else{
        echo "Message Not Sent";
    }
}