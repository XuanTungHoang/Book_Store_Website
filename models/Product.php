<?php
require_once '../../../helpers/Database.php';

class Product
{
    public function getListProduct($request,$limit)
    {
        $sql_count="select count(*) from products where name like ? ";
        $execute_query_count=Database::getInstance()->prepare($sql_count);
        $execute_query_count->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query_count->execute();
        $total_page=ceil((int)$execute_query_count->fetchColumn()/$limit);
        $page_start=($request['page']-1)*$limit;

        $sql="select p.*,c.name as cate_name from products as p ,categories as c where p.categori_id=c.id and p.name like ? ORDER BY  id DESC limit ?,? ";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query->bindValue(2,$page_start,PDO::PARAM_INT);
        $execute_query->bindValue(3,$limit,PDO::PARAM_INT);
        $execute_query->execute();
        return ['data'=>$execute_query->fetchAll(),'total_page'=>$total_page];
    }
    public function add($request)
    {

        $sql="insert into `tung`.`products` (`name`,`description`,`price`,`image`,`categori_id`,`special`,`status`,`create_at`) values (?,?,?,?,?,?,?,now())";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['input_des']);
        $execute_query->bindValue(3,$request['price']);
        $execute_query->bindValue(4,$request['image']['name']);
        $execute_query->bindValue(5,$request['categori_id']);
        $execute_query->bindValue(6,$request['special']);
        $execute_query->bindValue(7,'publish');
        $execute_query->execute();

//        print_r($execute_query->fetchObject()) ;
//        die("3");
        return true;
    }
    public function getProductById($id)
    {
        $sql="select p.*,c.name cate_name from products as p,categories as c where p.categori_id=c.id and p.id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return $execute_query->fetchObject();
    }
    public function update($request)
    {
        $product_old=$this->getProductById($request['id']);
        if(!empty($request['image']['size'])){
            unlink('../../../assets/uploads/product/'.$product_old->image);
        }

        $sql="update `tung`.`products` set `name`=?,`description`=?,`price`=?,`image`=?,`categori_id`=?,`special`=? where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_name']);
        $execute_query->bindValue(2,$request['input_des']);
        $execute_query->bindValue(3,$request['price'],PDO::PARAM_INT);
        if(!empty($request['image']['size']))
        {
            $execute_query->bindValue(4,$request['image']['name']);
        }
        else{
            $execute_query->bindValue(4,$product_old->image);
        }
        $execute_query->bindValue(5,$request['categori_id']);
        $execute_query->bindValue(6,$request['special']);
        $execute_query->bindValue(7,$request['id']);
        $execute_query->execute();
        return true;
    }
    public function delete($id)
    {
        $product=$this->getProductById($id);
        unlink('../../../assets/uploads/product/'.$product->image);

        $sql="delete from products where id=$id";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        return true;
    }
}