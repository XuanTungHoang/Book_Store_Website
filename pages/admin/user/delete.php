<?php
session_start();
require_once '../../../controllers/UserController.php';

if(!empty($_GET['id']))
{
    $id=$_GET['id'];
}
else{
    header("location:/pages/admin/user/");
}

$auth=new UserController();
$auth->delete($id);
