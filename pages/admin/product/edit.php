<?php
session_start();
require_once '../../../controllers/ProductController.php';

if(!empty($_GET['id']))
{
    $id=$_GET['id'];
}
else{
    header("location:/pages/admin/product/");
}

$product=new ProductController();
$product->edit($id);