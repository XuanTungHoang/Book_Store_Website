<?php
require_once '../../../helpers/Database.php';

class Category
{
    public function getListCategory($request,$limit,$pagination=true)
    {
        if($pagination==true)
        {
            $sql_count="select count(*) from categories where name like ?;";
            $execute_query_count=Database::getInstance()->prepare($sql_count);
            $execute_query_count->bindValue(1,'%'.$request['keyword'].'%');
            $execute_query_count->execute();
            $total_page=ceil((int)$execute_query_count->fetchColumn()/$limit);
            $page_start=($request['page']-1)*$limit;
//        echo '<pre>';
//        print_r($total_page);

            $sql="select c.*,k.name as kind_name from categories as c,kinds as k  where c.kind_id=k.id and c.name like ?  limit ?,? ";
            $execute_query=Database::getInstance()->prepare($sql);
            $execute_query->bindValue(1,'%'.$request['keyword'].'%');
            $execute_query->bindValue(2,$page_start,PDO::PARAM_INT);
            $execute_query->bindValue(3,$limit,PDO::PARAM_INT);
            $execute_query->execute();
        }
        else{
            $sql_cate="select c.*,k.name as kind_name from categories as c,kinds as k where c.kind_id=k.id;";
            $execute_query_cate=Database::getInstance()->prepare($sql_cate);
            $execute_query_cate->execute();
            $cate= $execute_query_cate->fetchAll();
            return ['data'=>$cate,'total_page'=>count($cate)];
        }
        //print_r($execute_query->fetchAll());
        return ['data'=>$execute_query->fetchAll(),'total_page'=>$total_page];
    }
    public function add($request)
    {
        $sql="insert into `tung`.`categories` (`name`,`kind_id`,`status`,`create_at`) values (?,?,?,now())";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['kind_id']);
        $execute_query->bindValue(3,'publish');
        $execute_query->execute();
        return true;
    }
    public function getObjectById($id)
    {
        $sql="select c.*,k.name as kind_name from categories as c,kinds as k where c.kind_id=k.id and c.id=$id";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        return $execute_query->fetchObject();
    }
    public function update($request)
    {
        $sql="update `tung`.`categories` set `name`=?,kind_id=? where id=?";
        $excute_query=Database::getInstance()->prepare($sql);
        $excute_query->bindValue(1,$request['input_name']);
        $excute_query->bindValue(2,$request['kind_id']);
        $excute_query->bindValue(3,$request['id']);
        $excute_query->execute();
        return true;
    }
    public function delete($id)
    {
        $sql="delete from categories where id=$id";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        return true;
    }
}