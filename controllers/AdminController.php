<?php

// import để đc sủ dựng tất cả thư viện của Controller.php
require_once 'Controller.php';
require_once '../../../models/Order.php';
// kế thừa class Controller để sử dụng
class AdminController extends Controller
{
        public function index($date_request){

            $order=new Order();

            $total_success_7day=$order->get_order_7day_success();
            $this->dataSendView['total_success_7day']=$total_success_7day;

            $total_confirmed_7day=$order->get_order_7day_confirmed();
            $this->dataSendView['total_confirmed_7day']=$total_confirmed_7day;

            $total_waiting_confirm_7day=$order->get_order_7day_wating_confirm();
            $this->dataSendView['total_waiting_confirm_7day']=$total_waiting_confirm_7day;

            $total_cancel_7day=$order->get_order_7day_cancel();
            $this->dataSendView['total_cancel_7day']=$total_cancel_7day;

            $total_success_30day=$order->get_order_30day_success();
            $this->dataSendView['total_success_30day']=$total_success_30day;

            $total_confirmed_30day=$order->get_order_30day_confirmed();
            $this->dataSendView['total_confirmed_30day']=$total_confirmed_30day;

            $total_waiting_confirm_30day=$order->get_order_30day_wating_confirm();
            $this->dataSendView['total_waiting_confirm_30day']=$total_waiting_confirm_30day;

            $total_cancel_30day=$order->get_order_30day_cancel();
            $this->dataSendView['total_cancel_30day']=$total_cancel_30day;

            $result_order_7day=$order->get_result_order_7day();
            $this->dataSendView['result_order_7day']=$result_order_7day;

            //$date_from=$request['date_from'];
            if(!empty($date_request)){
                $date_from=$date_request['date_from'];
                $date_to=$date_request['date_to'];
//                print_r($date_request);
//                die('3');
                if($date_to!=null){
//                    print_r($date_request);
//                    die('5');
                    $from_to_orders=$order->get_order_from_to($date_request);
                    $this->dataSendView['list_orders_result']=$from_to_orders;
                }else{
//                    print_r($date_request);
//                    die('4');
                    $order_from_specific_day=$order->get_order_from_specific_day($date_request);
                    $this->dataSendView['list_orders_result']=$order_from_specific_day;
                }
            }

            return $this->view('views/admins/UI/home/index.php');

        }

}