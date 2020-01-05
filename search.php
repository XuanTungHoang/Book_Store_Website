<?php
 require_once 'controllers/HomeController.php';

 if(!empty($_POST['input_key'])){
     $key=$_POST['input_key'];
 }else{
     $key=null;
 }
//print_r($key);
// die('3');
 $auth=new HomeController();
 $auth->searchProducts($key);