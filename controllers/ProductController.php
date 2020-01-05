<?php
require_once '../../../models/Category.php';
require_once '../../../models/Product.php';
require_once 'Controller.php';

class ProductController extends Controller
{
    public function index($request)
    {

        $product=new Product();
        $product_list=$product->getListProduct($request,8);

        $this->dataSendView['product_list']=$product_list['data'];
        $this->dataSendView['total_page']=$product_list['total_page'];

        if(count($product_list['data'])==0)
        {
            $request['page']=1;
            $product_list=$product->getListProduct($request,8);
        }

        $this->dataSendView['product_list']=$product_list['data'];

        return $this->view('views/admins/UI/product/index.php');
    }

    public function add($request)
    {

        $this->dataSendView['errors']=[];
        $_SESSION['input_product']=$request;
        $errors=[];


        $cate=new Category();
        $cate_list=$cate->getListCategory(1,$this->limit,false);
        $this->dataSendView['cate_list']=$cate_list['data'];
        //print_r($cate_list['data']);
        if($request['action']!=null)
        {
            if(empty($request['input_name'])){
                $errors['input_name_null']='Filed name must be required';
            }
            if(empty($request['input_des'])){
                $errors['input_des_null']='Filed description must be required';
            }
            if(empty($request['price'])){
                $errors['price_null']='Filed price must be required';
            }
            if(empty($request['image']['name'])){
                $errors['image_null']='File $image must be required';
            }
            if(empty($request['categori_id'])){
                $errors['categori_id_null']='Filed categori_id must be required';
            }
            if(!empty($errors)){
                $this->dataSendView['errors']=$errors;
                return $this->view('/views/admins/UI/product/add.php');
            }

            $file_name=rand(0,1000).$request['image']['name'];
            $tmp_name=$request['image']['tmp_name'];
            $request['image']['name']=$file_name;


            $product=new Product();
            $product_add=$product->add($request);
            if($product_add){
                move_uploaded_file($tmp_name,'../../../assets/uploads/product/'.$file_name);
                unset($_SESSION['input_product']);
                header("location:/pages/admin/product/");
            }
        }

        return $this->view('views/admins/UI/product/add.php');
    }
    public function edit($id)
    {
        $cate=new Category();
        $cate_list=$cate->getListCategory(1,$this->limit,false);
        $this->dataSendView['cate_list']=$cate_list['data'];

        $product=new Product();
        $product_object=$product->getProductById($id);
        $this->dataSendView['product_object']=$product_object;
        $this->dataSendView['errors']=[];

        return $this->view('/views/admins/UI/product/edit.php');
    }
    public function update($request)
    {

        $cate=new Category();
        $cate_list=$cate->getListCategory(1,$this->limit,false);
        $this->dataSendView['cate_list']=$cate_list['data'];

        $this->dataSendView['errors']=[];
        $errors=[];

        $product=new Product();
        $product_object=$product->getProductById($request['id']);

        if(empty($request['input_name'])){
            $errors['input_name_null']='Filed name must be required';
            $product_object->name="";
        }else{
            if($request['input_name']!=$product_object->name){
                $product_object->name=$request['input_name'];
            }
        }

        if(empty($request['input_des'])){
            $errors['input_des_null']='Filed description must be required';
            $product_object->description="";
        }else{
            if($request['input_des']!=$product_object->description){
                $product_object->description=$request['input_des'];
            }
        }

        if(empty($request['price'])){
            $errors['price']='Filed price must be required';
            $product_object->price="";
        }else{
            if($request['price']!=$product_object->price){
                $product_object->price=$request['price'];
            }
        }

        if (empty($request['image']['name'])) {
            $errors['input_image'] = 'Field image must be required';
        }else{
            $file_name=rand(0,1000).$request['image']['name'];
            $tmp_name=$request['image']['tmp_name'];
            $request['image']['name']=$file_name;
        }
        if(!empty($errors)){
            if(!empty($product_object)){
                $this->dataSendView['product_object']=$product_object;
            }
            $this->dataSendView['errors']=$errors;
            return $this->view('views/admins/UI/product/edit.php');
        }

        $product=new Product();
        $product_update=$product->update($request);
        if($product_update)
        {
            move_uploaded_file($tmp_name,'../../../assets/uploads/product/'.$file_name);
            header("location:/pages/admin/product/");
        }

    }
    public function delete($id)
    {
        $product=new Product();
        $product_delete=$product->delete($id);
        if($product_delete){
            header("location:/pages/admin/product/");
        }
    }

}