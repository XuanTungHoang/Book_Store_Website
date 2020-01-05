<?php
// sau khi đăng nhập thành công thì sẽ chạy vào file pages/admin/home/index.php

session_start();
require_once '../../../controllers/AdminController.php';


//$date_request=[];
if(!empty($_POST['date_from'])) {
    if (!empty($_POST['date_to'])) {
        if ($_POST['date_from'] >= $_POST['date_to']) {
            header("location:/pages/admin/home/index.php");
        } else {
            $date_from = $_POST['date_from'];
            $date_to = $_POST['date_to'];
            $date_request = ['date_from' => $date_from, 'date_to' => $date_to];

//            print_r($date_request);
//            die('3');
        }
    }else{
        $date_request=['date_from'=>$_POST['date_from'],'date_to'=>null];
//        print_r($date_request);
//        die('3');
    }
}
else{
    $date_request=[];
}
//
//$request=$date_request['date_from'];
//$date=date_create("$request");
//date_sub($date,date_interval_create_from_date_string("2 days"));
//print_r($date);
//die('3');
$auth = new AdminController();
$auth->index($date_request);
