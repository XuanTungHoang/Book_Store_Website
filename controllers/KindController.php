<?php

require_once 'Controller.php';
require_once '../../../models/Kind.php';

class KindController extends Controller
{

    public function index($request)
    {
        $kind = new Kind();

        $kind_list=$kind->getListKind($request,$this->limit);
        //print_r($kind_list['data']);
        $this->dataSendView['kind_list'] = $kind_list['data'];
        $this->dataSendView['total_page']=$kind_list['total_page'];

        return $this->view('views/admins/UI/kind/index.php');
    }

    public function add($request)
    {
        $this->dataSendView['errors']=[];
        //$_SESSION['input']=$request;
        $errors=[];
       // print_r($request);
        if($request['action']!=null)
        {
            if(empty($request['input_name']))
            {
                $errors['input_name_null']='Field name must be required';
            }

            if(!empty($errors))
            {
                $this->dataSendView['errors']=$errors;
               // print_r($errors);
                return $this->view('views/admins/UI/kind/add.php');
            }

            $kind = new Kind();
            $kind_add=$kind->add($request);
            if ($kind_add)
            {
                //unset($_SESSION['input']);
                header("location:/pages/admin/kind");
            }
        }
        return $this->view('views/admins/UI/kind/add.php');
    }
    public function edit($id)
    {
        $Kind_object=new Kind();
        $object_by_id=$Kind_object->getObjectById($id);
        if(empty($object_by_id)){
            header("location:/pages/admin/kind");
        }
        //print_r($object_by_id);
        $this->dataSendView['errors_update']=[];
        $this->dataSendView['kind_object']=$object_by_id;
        return $this->view('views/admins/UI/kind/edit.php');
    }
    public function update($request)
    {
        $this->dataSendView['errors_update']=[];
        $errors=[];

        $kind=new Kind();
        $kind_object=$kind->getObjectById($request['id']);

        if(empty($request['input_name']))
        {
            $errors['input_name_null']='Field name must be required';
            $kind_object->name='';
        }

        if(!empty($errors))
        {
            $this->dataSendView['errors_update']=$errors;
            $this->dataSendView['kind_object']=$kind_object;
            return $this->view('views/admins/UI/kind/edit.php');
        }

        $kind_update=$kind->update($request);
        if($kind_update)
        {
            header("location:/pages/admin/kind");
        }
    }
    public function delete($id)
    {
        $kind =new Kind();
        $kind_delete=$kind->delete($id);
        if($kind_delete){
            header("location:/pages/admin/kind");
        }
    }

}