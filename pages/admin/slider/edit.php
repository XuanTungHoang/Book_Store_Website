<?php
session_start();
require_once '../../../controllers/SliderController.php';
if(!empty($_GET['id']))
{
    $id=$_GET['id'];
}
else{
    header("location:/pages/admin/slider");
}

$auth=new SliderController();
$auth->edit($id);
