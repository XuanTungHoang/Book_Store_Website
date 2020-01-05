<?php
session_start();
require_once '../../../controllers/SliderController.php';

$request=[];
$input_link=!empty($_POST['input_link']) ? $_POST['input_link'] : null;
$image=!empty($_FILES['input_image']) ? $_FILES['input_image'] : null;
$id=!empty($_POST['id']) ? $_POST['id'] : null;
$request=['input_link'=>$input_link,'image'=>$image,'id'=>$id];
$auth=new SliderController();
$auth->update($request);
