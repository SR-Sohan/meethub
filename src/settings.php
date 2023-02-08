<?php
if (!function_exists('settings')) {
    function settings()
    {
       $root = "http://localhost/meethub/"; 
        return [
            'companyname'=> 'Isdb-Bisew',
            'logo'=>$root."admin/assets/img/logo.svg",
            'homepage'=> $root,
            'adminpage'=>$root.'admin/',
            'hostname'=> 'localhost',
            'user'=> 'root',
            'password'=> '',
            'database'=> 'meethub'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}
