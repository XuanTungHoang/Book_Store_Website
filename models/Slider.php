<?php
require_once '../../../helpers/Database.php';

class Slider
{
    public function  getListSlider($request,$limit)
    {

        //lay so page de phan trang
        $sql_count="select count(*) from sliders where link like ?";
        $execute_query=Database::getInstance()->prepare($sql_count);
        $execute_query->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query->execute();
        $total_page= ceil((int)$execute_query->fetchColumn()/$limit);
        $start=($request['page']-1)*$limit; // trang moi bat dau tu start

        $sql_slider="select *from sliders where link like ? limit ?,?";
        $execute_query_slider=Database::getInstance()->prepare($sql_slider);
        $execute_query_slider->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query_slider->bindValue(2,$start,PDO::PARAM_INT);
        $execute_query_slider->bindValue(3,$limit,PDO::PARAM_INT);
        $execute_query_slider->execute();
        return ['data'=>$execute_query_slider->fetchAll(),'total_page'=>$total_page];

        //return $execute_query->fetchAll();
    }
    public function add($request)
    {
        $sql="insert into `tung`.`sliders` (`link`,`image`,`status`,`create_at`) values (?,?,?,NOW());";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_link']);
        $execute_query->bindValue(2,$request['image']['name']);
        $execute_query->bindValue(3,'publish');
        $execute_query->execute();

       // print_r($execute_query->execute());
        return true;
    }
    public function getObjectById($id)
    {
        $sql="select *from sliders where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return $execute_query->fetchObject();
    }
    public function update($request)
    {

        $slider_old = $this->getObjectById($request['id']);
        if(!empty($request['image']['size'])){
            unlink('../../../assets/uploads/slider/'.$slider_old->image);
        }

        $sql="update `tung`.`sliders` set `link`=?,`image`=? where (`id`=?);";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$request['input_link']);
        if(!empty($request['image']['size'])) {
            $execute_query->bindValue(2, $request['image']['name']);
        }else{
            $execute_query->bindValue(2,$slider_old->image);
        }

        $execute_query->bindValue(3,$request['id']);
        $execute_query->execute();
        return true;
    }
    public function delete($id)
    {

        $slider = $this->getObjectById($id);
        unlink('../../../assets/uploads/slider/'.$slider->image);

        $sql="delete from sliders where id=?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id);
        $execute_query->execute();
        return true;
    }

}