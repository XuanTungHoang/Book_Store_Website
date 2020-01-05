<?php
session_start();
require_once '../../../controllers/SliderController.php';

$request=[];
$input_link=!empty($_POST['input_link']) ? $_POST['input_link'] : null;
$image=!empty($_FILES['image']) ? $_FILES['image'] : null;
$action=!empty($_POST['action']) ? $_POST['action'] : null;
$request=['input_link'=>$input_link,'image'=>$image,'action'=>$action];
//if(!empty($_POST['input_link'])&&!empty($_FILES['image']))
//{
//    if($_FILES['image']['error']==0)
//    {
//        $input_link=$_POST['input_link'];
//        $checkbox = $_POST['special'];
//        $image=$_FILES['image'];
//        $request=['input_link'=>$input_link,'image'=>$image,'special'=>$checkbox];
//    }
//    else{
//        $request=[];
//    }
//}
//else{
//    $request=[];
//}
//print_r($request);
$auth=new SliderController();
$auth->add($request);
