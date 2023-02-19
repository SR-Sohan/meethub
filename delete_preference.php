<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$id = $_GET['id'];
$db = new MysqliDb();
$db->where('id', $id);
if($db->delete('partner_preference')){
    header("Location:preference.php");
}else {
    echo "<h1>Can't delete preference info</h1>";
}