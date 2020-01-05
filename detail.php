<?php


require_once 'controllers/HomeController.php';
if(!empty($_GET['product_id'])){
    $request = ['product_id'=>$_GET['product_id']];
}else{
   header("location:/");
}

$auth = new HomeController();
$auth->detail($request);