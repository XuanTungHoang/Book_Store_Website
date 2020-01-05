<?php
session_start();
require_once '../../../controllers/UserController.php';
$auth=new UserController();
if(!empty($_GET['page']))
{
    if(!empty($_GET['keyword']))
    {
        $request=['page'=>$_GET['page'],'keyword'=>$_GET['keyword']];
    }
    else{
        $request=['page'=>$_GET['page'],'keyword'=>''];

    }
   // $page=$_GET['page'];
}
else{
    $request=['page'=>1,'keyword'=>''];
    $_GET['page']=1;
}

$auth->index($request);
