<?php
session_start();
require_once 'controllers/AuthController.php';

// tạo ra đối tượng AuthController và gọi hàm logout
$auth = new AuthController();
$auth->logout();