<?php
session_start();
require_once '../../../controllers/CategoryController_1.php';

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
    $request=['page'=>1,'keyword'=>""];
    $_GET['page']=1;
}
$category=new CategoryController_1();
$category->index($request);
