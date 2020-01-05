<?php

require_once 'helpers/Database.php';
class Auth
{
    public function checkLogin($request){

        // xuất ra cái tất cả thông tin của cái thằng có email=? và pass=?
        $sql = "select * from users where email=? and passwords = ?";

        //kết nối db với câu lệnh $sql ở trên
        $execute_query = Database::getInstance()->prepare($sql);

        // bindValue là gán giá trị cho 2 dấu ? trên câu lệnh truy vấn
        $execute_query->bindValue(1,$request['email']);
        $execute_query->bindValue(2,$request['password']);

        // câu lệnh thực hiện truy vấn
        $execute_query->execute();

        //gán user cho cái đối tượng ta truy vấn được ( tức là đối tượng có email và pass hợp lệ )
        $user = $execute_query->fetchObject();

        // hàm checkLogin trả về đối tượng ta lấy được.
        return $user;
    }
}