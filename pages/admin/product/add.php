<?php
session_start();
require_once '../../../controllers/ProductController.php';

$request=[];
$action=!empty($_POST['action']) ? $_POST['action'] : null;
$input_name=!empty($_POST['input_name']) ? $_POST['input_name'] : null;
$input_des=!empty($_POST['input_des']) ? $_POST['input_des'] : null;
$price=!empty($_POST['price']) ? $_POST['price'] : null;
$image=!empty($_FILES['image']) ? $_FILES['image'] : null;
if(!empty($_POST['categori_id']))
{
    $categori_id=$_POST['categori_id'];
}
else{
    $categori_id=1;
}
if(!empty($_POST['special'])){
    if($_POST['special']=='true'){
        $special=1;
    }else{
        $special=-1;
    }
}else{
    $special=0;
}

$request=['action'=>$action,'input_name'=>$input_name,'input_des'=>$input_des,
    'price'=>$price,'image'=>$image,'categori_id'=>$categori_id,'special'=>$special];


$product=new ProductController();
$product->add($request);


