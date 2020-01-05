<?php
session_start();
require_once '../../../controllers/CategoryController_1.php';

if(!empty($_GET['id']))
{
    $id=$_GET['id'];
}
else{
    header("location:/pages/admin/category/");
}

$categoryController=new CategoryController_1();
$categoryController->delete($id);
