<?php

require_once '../../../helpers/Database.php';
class Order
{
    public function getOrders($request,$limit){

        //
        $sql_count ="select count(*) from orders where (phone like ? or status like ? or name like ?)";
        $execute_query_count=Database::getInstance()->prepare($sql_count);
        $execute_query_count->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query_count->bindValue(2,'%'.$request['keyword'].'%');
        $execute_query_count->bindValue(3,'%'.$request['keyword'].'%');
        $execute_query_count->execute();
        $total_page=ceil((int)$execute_query_count->fetchColumn()/$limit);
        $page_start=($request['page']-1)*$limit;

        $sql ="select * from orders where (phone like ? or status like ? or name like ?) ORDER BY  id DESC limit ?,?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,'%'.$request['keyword'].'%');
        $execute_query->bindValue(2,'%'.$request['keyword'].'%');
        $execute_query->bindValue(3,'%'.$request['keyword'].'%');
        $execute_query->bindValue(4,$page_start,PDO::PARAM_INT);
        $execute_query->bindValue(5,$limit,PDO::PARAM_INT);
        $execute_query->execute();

        return ['data'=>$execute_query->fetchAll(),'total_page'=>$total_page];

    }


    public function getDetailOrder($order_id){
        //tee
        //SELECT o.quantity,p.* FROM `order_details` as o , products as p WHERE order_id  = $order_id and p.id = o.product_id
        //return ['teo'=>$order_id];
        $sql="select o.quantity, p.* from products as p ,order_details as o where order_id=$order_id and p.id=o.product_id;";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        return $execute_query->fetchAll();
    }

    public function get_order_7day_success()
    {

        $sql="select * from orders where  (create_at between DATE_SUB(now(),interval 7 day) and now()) and status='successfully';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_7day_success= $execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_7day_success as $item){
            $total+=$item->total;
        }
        return $total;
//        print_r($total);
//        die('3');
    }

    public function get_order_7day_confirmed()
    {
        $sql="select * from orders where  (create_at between DATE_SUB(now(),interval 7 day) and now()) and status='confirmed';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_7day_confirmed= $execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_7day_confirmed as $item){
            $total+=$item->total;
        }
        return $total;
    }

    public function get_order_7day_wating_confirm()
    {
        $sql="select * from orders where  (create_at between DATE_SUB(now(),interval 7 day) and now()) and status='waiting_confirm';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_7day_waiting_confirm= $execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_7day_waiting_confirm as $item){
            $total+=$item->total;
        }
        return $total;
    }

    public function get_order_7day_cancel()
    {
        $sql="select * from orders where  (create_at between DATE_SUB(now(),interval 7 day) and now()) and status='cancel';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_7day_cancel= $execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_7day_cancel as $item){
            $total+=$item->total;
        }
        return $total;
    }

    public function get_order_30day_success()
    {
        $sql="select * from orders where (create_at between DATE_SUB(now(),interval 30 day) and now()) and status='successfully';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_30day_success=$execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_30day_success as $item){
            $total+=$item->total;
        }

        return $total;
    }

    public function get_order_30day_confirmed()
    {
        $sql="select * from orders where (create_at between DATE_SUB(now(),interval 30 day) and now()) and status='confirmed';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_30day_confirmed=$execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_30day_confirmed as $item){
            $total+=$item->total;
        }

        return $total;
    }

    public function get_order_30day_wating_confirm()
    {
        $sql="select * from orders where (create_at between DATE_SUB(now(),interval 30 day) and now()) and status='waiting_confirm';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_30day_waiting_confirm=$execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_30day_waiting_confirm as $item){
            $total+=$item->total;
        }

        return $total;
    }

    public function get_order_30day_cancel()
    {
        $sql="select * from orders where  (create_at between DATE_SUB(now(),interval 30 day) and now()) and status='cancel';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $arr_order_30day_cancel= $execute_query->fetchAll();

        $total=0;
        foreach ($arr_order_30day_cancel as $item){
            $total+=$item->total;
        }
        return $total;
    }

    public function get_result_order_7day()
    {
        $sql="select * from orders where create_at between DATE_SUB(now(),interval 7 day) and now();";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        $result_order_7day= $execute_query->fetchAll();
        return $result_order_7day;
//        print_r($result_order_7day);
//        die('3');
    }

    public function get_order_from_to($date_request)
    {
        $date_from=$date_request['date_from'];
        $date_to=$date_request['date_to'];

        $sql="select * from orders where (create_at between '$date_from' and '$date_to') ;";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        //$arr_order_resutl=$execute_query->fetchAll();

//        foreach ($arr_order_result as $item){
//
//        }


//        print_r($execute_query->fetchAll());
//        die('3');
        return $execute_query->fetchAll();
    }

    public function get_order_from_specific_day($date_request)
    {
        $date_from=$date_request['date_from'];
        $sql="select * from orders where create_at='$date_from';";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->execute();
        return $execute_query->fetchAll();
    }

    public function changeStatus($id){

        $response = ['success'=>false,'status_changed'=>''];
        $sql = "select * from orders where id = ?";
        $execute_query=Database::getInstance()->prepare($sql);
        $execute_query->bindValue(1,$id,PDO::PARAM_INT);
        $execute_query->execute();
        $order = $execute_query->fetchObject();

        $update_status = '';
        if($order->status == 'waiting_confirm'){
            $update_status = 'confirmed';
        }else if($order->status == 'confirmed'){
            $update_status = 'successfully';
        }else if($order->status == 'successfully'){
            $update_status = 'cancel';
        }else if($order->status == 'cancel'){
            $update_status = 'waiting_confirm';
        }

        $sql_update_order = "update orders set status = ? where id=?";
        $execute_query_update=Database::getInstance()->prepare($sql_update_order);
        $execute_query_update->bindValue(1,$update_status);
        $execute_query_update->bindValue(2,$id,PDO::PARAM_INT);
//        $execute_query_update->execute();
        if($execute_query_update->execute()){
            $response['success']  = true;
            $response['status_changed']=$update_status;
        }

        return $response;
    }

}