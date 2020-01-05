<?php
session_start();
require_once '../../../controllers/ProductController.php';

$request=[];
$id=!empty($_POST['id']) ? $_POST['id'] : null;
$input_name=!empty($_POST['input_name']) ? $_POST['input_name'] : null;
$input_des=!empty($_POST['input_des']) ? $_POST['input_des'] : null;
$price=!empty($_POST['price']) ? $_POST['price'] : null;
$image=!empty($_FILES['image']) ? $_FILES['image'] : null;
$categori_id=!empty($_POST['categori_id']) ? $_POST['categori_id'] : null;
$input_name=!empty($_POST['input_name']) ? $_POST['input_name'] : null;
if($_POST['special']=='true'){
    $special=1;
}else{
    $special=-1;
}

//if(!empty($_POST['id'])&&!empty($_POST['input_name'])&&!empty($_POST['input_des'])&&!empty($_POST['price'])&&!empty($_POST['image'])&&!empty($_POST['categori_id'])){
//    $id=$_POST['id'];
//    $input_name=$_POST['input_name'];
//    $input_des=$_POST['input_des'];
//    $price=$_POST['price'];
//    $image=$_POST['image'];
//    $categori_id=$_POST['categori_id'];
//    if($_POST['special']=='true'){
//        $special=1;
//    }else{
//        $special=-1;
//    }
$request=['id'=>$id,'input_name'=>$input_name,'input_des'=>$input_des,'price'=>$price,'image'=>$image,'categori_id'=>$categori_id,'special'=>$special];
//}
//else{
//    $request=[];
//}

$product=new ProductController();
$product->update($request);
