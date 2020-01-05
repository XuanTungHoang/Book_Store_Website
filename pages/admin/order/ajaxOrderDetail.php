<?php

session_start();
require_once '../../../controllers/OrderController.php';

$auth = new OrderController();
$auth->ajaxOrderDetail($_POST['order_id']);