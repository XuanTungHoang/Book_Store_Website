<?php
session_start();
require_once '../../../controllers/CategoryController_1.php';

if(!empty($_POST['input_name'])&&!empty($_POST['input_id']))
{
    $input_name=$_POST['input_name'];
    $input_id=$_POST['input_id'];
    $kind_id=$_POST['kind_id'];

    $request=['input_name'=>$input_name,'id'=>$input_id,'kind_id'=>$kind_id];
}
else{
    $request=[];
}

$categoryController=new CategoryController_1();
$categoryController->update($request);