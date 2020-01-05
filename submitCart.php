<?php



require_once 'controllers/HomeController.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $request = ['carts'=>$_POST['data'],'name'=>$_POST['name'],'phone'=>$_POST['phone'],'address'=>$_POST['address']];
    $auth = new HomeController();
    $auth->saveCart($request);
}else{
    echo "Error";
}



