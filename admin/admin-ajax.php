<?php 
require __DIR__ . '/../vendor/autoload.php';
use App\db;
$conn = db::connect();

// Status Change
if(isset($_POST['uid'])){
    $q = "update users set status ='".$_POST['val']."' where id = '".$_POST['uid']."'";
    
    $conn->query($q);

    if($conn->affected_rows){
        echo "Update Successful";
    }else{
        echo "SomeThing Is Not working!";
    }
}

// Delete Users

if(isset($_POST['did'])){
    $q = "delete from users where id='".$_POST['did']."'";

    $conn->query($q);

    if($conn->affected_rows){
        echo "Users Deleted";
    }else{
        echo "Not Deleted";
    }
}