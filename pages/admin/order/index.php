<?php

session_start();
require_once '../../../controllers/OrderController.php';
if(!empty($_GET['page']))
{
    if(!empty($_GET['keyword']))
    {
        $request=['page'=>$_GET['page'],'keyword'=>$_GET['keyword']];
    }
    else{
        $request=['page'=>$_GET['page'],'keyword'=>''];
    }
}
else{
    $request=['page'=>1,'keyword'=>''];
    $_GET['page']=1;
}
// tạo 1 đối tượng AdminController để gọi hàm index
$auth = new OrderController();
$auth->index($request);

//print_r($_SESSION['auth']);