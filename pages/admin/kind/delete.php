<?php
session_start();
require_once '../../../controllers/KindController.php';

if(!empty($_GET['id']))
{
    $id=$_GET['id'];
}else{
    header("location:/pages/admin/kind");
}

$auth=new KindController();
$auth->delete($id);
