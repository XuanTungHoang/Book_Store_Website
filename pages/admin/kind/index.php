<?php
session_start();
require_once '../../../controllers/KindController.php';

if(!empty($_GET['page']))
{
    if(!empty($_GET['keyword']))
    {
        $request=['page'=>$_GET['page'],'keyword'=>$_GET['keyword']];
    }
    else{
        $request=['page'=>$_GET['page'],'keyword'=>''];
    }
    //$page=$_GET['page'];
}
else{
    $request=['page'=>1,'keyword'=>''];
    //$page=1;
    $_GET['page']=1;
}

$auth = new KindController();
$auth->index($request);