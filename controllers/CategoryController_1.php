<?php
require_once '../../../models/Category.php';
require_once '../../../models/Kind.php';
require_once 'Controller.php';

class CategoryController_1 extends Controller
{
    public function index($request)
    {
        $cate=new Category();
        $cate_list=$cate->getListCategory($request,$this->limit);

        $this->dataSendView['cate_list']=$cate_list['data'];
        $this->dataSendView['total_page']=$cate_list['total_page'];

        if(count($cate_list['data']) == 0){
            $request['page'] =1;
            $cate_list = $cate->getListCategory($request, $this->limit);
        }

        $this->dataSendView['cate_list']=$cate_list['data'];
        //print_r(count($this->dataSendView['cate_list']));
        return $this->view('views/admins/UI/category/index.php');
    }
    public function add($request)
    {
        $kind=new Kind();
        $kind_list=$kind->getListKind(1,$this->limit,false);

        $this->dataSendView['kind_list']=$kind_list['data'];
        if(!empty($request))
        {
            $cate=new Category();
            $cate_add=$cate->add($request);
            if($cate_add)
            {
                header("location:/pages/admin/category/");
            }
        }
        return $this->view('views/admins/UI/category/add.php');
    }
    public function edit($id)
    {
        $kind=new Kind();
        $kind_list=$kind->getListKind(1,$this->limit,false);
        $this->dataSendView['kind_list']=$kind_list['data'];

        $cate=new Category();
        $cate_Object=$cate->getObjectById($id);
        $this->dataSendView['cate_object']=$cate_Object;

        return $this->view('views/admins/UI/category/edit.php');
    }
    public function update($request)
    {
        if(!empty($request))
        {
            $cate=new Category();
            $cate_update=$cate->update($request);
            if($cate_update)
            {
                header("location:/pages/admin/category/");
            }
        }
    }
    public function delete($id)
    {
        $cate=new Category();
        $cate_delete=$cate->delete($id);
        if($cate_delete)
        {
            header("location:/pages/admin/category/");
        }
    }

}