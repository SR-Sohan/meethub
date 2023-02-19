<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$id = $_GET['id'];
$db = new MysqliDb();
$db->where('id', $id);
if($db->delete('family_info')){
    header("Location:family_info.php");
}else {
    echo "<h1>Can't delete family info</h1>";
}