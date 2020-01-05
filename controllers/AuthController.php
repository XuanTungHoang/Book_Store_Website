<?php

// require ở đây nhằm lấy đc dữ liệu từ database.
require_once 'models/Auth.php';
class AuthController
{

    public function login ($request){
//            if (!empty($_SESSION['auth'])) {
//                header('location:/pages/admin/home/');
//            }
        // nếu request không phải rỗng thì thực hiện kiểm tra email password với dữ liệu dưới db.
        if(!empty($request)){

            // tạo ra 1 đối tượng Auth đc định nghĩa tại Auth.php để checkLogin
            $auth =  new Auth();

            // hàm checkLogin được định nghĩa tại Auth.php
            // tức checkAuth = user (tại Auth.php)
            $checkAuth = $auth->checkLogin($request);

            // nếu đối tượng lấy lên là có thì ta lưu đối tượng đó vào bộ nhớ tạm session
            if(!empty($checkAuth)){
                // lưu đối tượng vào session
                $_SESSION['auth'] = $checkAuth;

                // login thành công  cho về trang home
                header("location:/pages/admin/home/");
            }else{

                // ngược lại ta gán 1 biến có thông điệp cảnh báo nhập sai
                $fail_login = 'Email or Password wrong...';
            }
        }

        // hiển thị cái form login.
        // tất cả các biến trong hàm này đều có thể gọi và sử dụng trong views/admins/UI/login.php
        include "views/admins/UI/login.php";
    }
    public function logout(){
        // xóa cái session tức cái thằng user đang đăng nhập và về trang login
        unset($_SESSION['auth']);
        header("location:/login.php");
    }
}