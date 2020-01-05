<?php
require_once '../../../helpers/Database.php';

class User
{
    public function getListUser($request,$limit)
    {
            //print_r($page);
            $sql_count="select count(*) from users where name like ?";
            $execute_query=Database::getInstance()->prepare($sql_count);
            $execute_query->bindValue(1,'%'.$request['keyword'].'%');
            $execute_query->execute();
            $total_page=ceil((int)$execute_query->fetchColumn()/$limit);
            $page_start=($request['page']-1)*$limit;
            //print_r($total_page);
            //return $execute_query->fetchAll();

        $sql_user="select *from users where name like ? limit ?,?";
        $execute_query_user=Database::getInstance()->prepare($sql_user);
        $execute_query_user->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query_user->bindValue(2,$page_start,PDO::PARAM_INT);
        $execute_query_user->bindValue(3,$limit,PDO::PARAM_INT);
        $execute_query_user->execute();
        $data = $execute_query_user->fetchAll();
        //echo $page_start.'--';

        return ['data'=>$data,'total_page'=>$total_page];


    }
    public function add($request)
    {
        $sql="insert into `tung`.`users` (`name`,`email`,`passwords`,`role`,`status`,`create_at`) 
              values (?,?,?,?,?,now()) ";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['input_email']);
        $execute_query->bindValue(3,$request['input_password']);
        $execute_query->bindValue(4,$request['role']);
        $execute_query->bindValue(5,'publish');
        $execute_query->execute();
        return true;
    }
    public function getUserById($id)
    {
        $sql="select *from users where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return $execute_query->fetchObject();
    }
    public function update($request)
    {
        //print_r($request);
        $sql="update `tung`.`users` set `name`=?,`email`=?,`passwords`=?,`role`=? where (id=?);";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['input_email']);
        $execute_query->bindValue(3,$request['input_password']);
        $execute_query->bindValue(4,$request['role']);
        $execute_query->bindValue(5,$request['id']);
        $execute_query->execute();
        return true;
    }
    public function delete($id)
    {
        $sql="delete from `users` where id=? ";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return true;
    }

}