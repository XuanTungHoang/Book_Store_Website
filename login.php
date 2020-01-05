<?php
// thực hiên File này khi người dùng đến đường dẫn mvc/login.php

session_start();
// lệnh require_one là để file này có thể sử dụng các thư viên đã định nghĩa của file kia
// để có thể tạo ra 1 đối tượng AuthController và thực hiện hàm login
require_once 'controllers/AuthController.php';

// kiểm tra xem email password có rỗng hay không ( chưa kiểm tra đúng )
if(!empty($_POST['email']) && !empty($_POST['password'])){
    // nếu không rỗng thì lưu lại email, password vào request
    $request = ['email'=>$_POST['email'],'password'=>$_POST['password']];
}else{
    // nếu rỗng lưu request là rỗng
    $request = [];
}
// tạo đối tượng và gọi hàm thực thi login theo biến request
$auth = new AuthController();
$auth->login($request); // hàm login sẽ đc định nghĩa tại AuthController.php