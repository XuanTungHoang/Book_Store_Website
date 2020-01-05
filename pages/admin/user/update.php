<?php
session_start();
require_once '../../../controllers/UserController.php';

$request=[];
$input_name=!empty($_POST['input_name']) ? $_POST['input_name']: null;
$input_email=!empty($_POST['input_email']) ? $_POST['input_email']: null;
$input_password=!empty($_POST['input_password']) ? $_POST['input_password']: null;
$role=!empty($_POST['select_role']) ? $_POST['select_role']: null;
$id=!empty($_POST['id']) ? $_POST['id']: null;

//if(!empty($_POST['input_name'])&&!empty($_POST['input_email'])&&!empty($_POST['input_password'])&&!empty($_POST['id']))
//{
//    $input_name=$_POST['input_name'];
//    $input_email=$_POST['input_email'];
//    $input_password=$_POST['input_password'];
//    $role=$_POST['select_role'];
//    $id=$_POST['id'];
$request=['input_name'=>$input_name,'input_email'=>$input_email,'input_password'=>$input_password,'role'=>$role,'id'=>$id];
//}
//else{
//    $request=[];
//}

$auth=new UserController();
$auth->update($request);
