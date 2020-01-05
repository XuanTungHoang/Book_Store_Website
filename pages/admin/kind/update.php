<?php
session_start();
require_once '../../../controllers/KindController.php';

$request=[];
$input_name=!empty($_POST['input_name']) ? $_POST['input_name'] : null;
$id=!empty($_POST['id']) ? $_POST['id'] : null;
$request=['input_name'=>$input_name,'id'=>$id];
//if(!empty($_POST['input_name'])&&!empty($_POST['id']))
//{
//    $input_name=$_POST['input_name'];
//    $id=$_POST['id'];
//    $request=['input_name'=>$input_name,'id'=>$id];
//}
//else{
//    $request=[];
//}

$auth=new KindController();
$auth->update($request);