<?php
session_start();
require_once '../../../controllers/KindController.php';

$request=[];
$input_name=!empty($_POST['input_name']) ? $_POST['input_name'] : null;
$action=!empty($_POST['action']) ? $_POST['action'] : null;
$request=['input_name'=>$input_name,'action'=>$action];
//if (!empty($_POST['input_name']))
//{
//    $input_name=$_POST['input_name'];
//    $request=['input_name'=>$input_name];
//}
//else{
//    $request=[];
//}
$auth = new KindController();
$auth->add($request);