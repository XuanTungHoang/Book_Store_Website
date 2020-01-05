<?php



require_once 'controllers/HomeController.php';
//$_GET['page']=1;
$auth = new HomeController();
$auth->index();
