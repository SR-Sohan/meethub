<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$id = $_GET['id'];
$db = new MysqliDb();
$db->where('id', $id);
if($db->delete('educations')){
    header("Location:educations.php");
}else {
    echo "<h1>Can't delete education info</h1>";
}