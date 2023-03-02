<?php 
require __DIR__ . '/../vendor/autoload.php';
use App\db;
$conn = db::connect();

if(isset($_POST['uid'])){
    echo "Ok";
}