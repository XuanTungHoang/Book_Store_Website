<?php
require_once '../../../helpers/Database.php';


class Kind{
    public function getListKind($request,$limit,$pagination=true)
    {
        if($pagination==true)
        {
            $sql_count="select count(*) from kinds where name like ? ";
            $execute_query=Database::getInstance()->prepare($sql_count);
            $execute_query->bindValue(1,'%'.$request['keyword'].'%');
            $execute_query->execute();
            $total_page=ceil((int)$execute_query->fetchColumn()/$limit);
            $page_start=($request['page']-1)*$limit;
            //print_r($total_page);

            $sql="select *from kinds where name like ? limit ?,? ";
            $execute_query_kind=Database::getInstance()->prepare($sql);
            $execute_query_kind->bindValue(1,'%'.$request['keyword'].'%');
            $execute_query_kind->bindValue(2,$page_start,PDO::PARAM_INT);
            $execute_query_kind->bindValue(3,$limit,PDO::PARAM_INT);
            $execute_query_kind->execute();
        }else{
            $sql_kinds="select *from kinds ";
            $execute_query_kinds=Database::getInstance()->prepare($sql_kinds);
            $execute_query_kinds->execute();
            $kinds_list=$execute_query_kinds->fetchAll();
            return ['data'=>$kinds_list,'total_page'=>count($kinds_list)];
        }

        return ['data'=>$execute_query_kind->fetchAll(),'total_page'=>$total_page];

        //return $execute_query->fetchAll();
    }
    public function add($request)
    {
        $sql="insert into  `tung`.`kinds` (`name`,`status`,`create_at`) values (?,?,NOW());";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,'publish');
        $execute_query->execute();
        return true;
    }
    public function getObjectById($id)
    {
        $sql="select *from kinds where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return $execute_query->fetchObject();
    }
    public function update($request)
    {
        $sql="update `tung`.`kinds` set name=? where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['id']);
        $execute_query->execute();
        return true;
    }
    public function delete($id)
    {
        $sql="delete from `kinds` where id=? ";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return true;
    }
}
