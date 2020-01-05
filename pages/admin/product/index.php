<?php
session_start();
require_once '../../../controllers/ProductController.php';

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

$product=new ProductController();
$product->index($request);
