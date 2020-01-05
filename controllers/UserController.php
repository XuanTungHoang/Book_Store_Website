<?php

require_once '../../../models/User.php';
require_once 'Controller.php';

class UserController extends Controller
{
    public function index($request)
    {

        $user = new User();
        $user_list = $user->getListUser($request, $this->limit);
        //print_r($user_list);
        $this->dataSendView['user_list'] = $user_list['data'];
        $this->dataSendView['total_page'] = $user_list['total_page'];

        if(count($user_list['data']) == 0){
             $request['page'] =1;
             $user_list = $user->getListUser($request, $this->limit);
        }

        $this->dataSendView['user_list'] = $user_list['data'];
        //print_r($this->dataSendView['user_list']);

        return $this->view('views/admins/UI/user/index.php');
    }

//    public function search($request){
//        return header('location:/pages/admin/user/index.php?keyword='.$request['keyword'].'&page='.$request['page']);
//    }

    public function add($request)
    {
        $this->dataSendView['errors'] = [];
        $_SESSION['input'] = $request;
        $errors = [];

        if ($request['action'] != null) {

            if (empty($request['input_name'])) $errors['input_name_null'] = 'Field name must be required.';

            if (empty($request['input_email'])) {
                $errors['input_email_null'] = 'Field email must required';
            } else {
                if (!preg_match("/^[a -zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]*$/", $request['input_email'])) {
                    $errors['input_email_invalid'] = 'Field email invalid.';
                }
            }

            if (empty($request['input_password'])) {
                $errors['input_password_null'] = 'Field password must be required';
            }

            if (!empty($errors)) {
                $this->dataSendView['errors'] = $errors;
                return $this->view('views/admins/UI/user/add.php');
            }

            $user = new User();
            $add_user = $user->add($request);
            if ($add_user) {
                unset($_SESSION['input']);
                header("location:/pages/admin/user/");
            }
        }
        return $this->view('views/admins/UI/user/add.php');
    }

    public function edit($id)
    {
        $user = new User();
        $user_object = $user->getUserById($id);
        if (empty($user_object)) {
            header('location:/pages/admin/user/');
        }
        //print_r($user_object);
        $this->dataSendView['user_object'] = $user_object;
        $this->dataSendView['errors_update']=[];

        return $this->view('views/admins/UI/user/edit.php');
    }

    public function update($request)
    {
        $user = new User();
        $this->dataSendView['errors_update'] = [];
        $errors = [];

        $user_object = $user->getUserById($request['id']);

        if (empty($request['input_name'])) {
            $errors['input_name_null'] = 'Field name must be required.';
            $user_object->name = "";
        }
        else{
            if($user_object->name!=$request['input_name']){
                $user_object->name=$request['input_name'];
            }
        }

        if(empty($request['input_email']))
        {
            $errors['input_email_null']='Field email must be required.';
            $user_object->email = "";
        }else{
            if (!preg_match("/^[a -zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]*$/", $request['input_email'])) {
                $errors['input_email_invalid'] = 'Field email invalid.';

                $user_object->email=$request['input_email'];
            }
            else {
                $user_object->email=$request['input_email'];
            }
        }

        if(empty($request['input_password']))
        {
            $errors['input_password_null']='Field password must be required.';
            $user_object->passwords="";
        }
        else
        {
            if($user_object->passwords!=$request['input_password'])
            {
                $user_object->passwords=$request['input_password'];
            }
        }

        if(!empty($errors))
        {
            if(!empty($user_object)){
                $this->dataSendView['user_object'] = $user_object;
                //$this->dataSendView['user_object']=$_SESSION['input_update'];
            }
            $this->dataSendView['errors_update']=$errors;
            return $this->view('views/admins/UI/user/edit.php');
        }

        $user_update = $user->update($request);
        if ($user_update) {
            header("location:/pages/admin/user/");
        }
    }
    public function delete($id)
    {
        if (!empty($id)) {
            $user = new User();
            $user_delete = $user->delete($id);
            if ($user_delete) {
                header("location:/pages/admin/user/");
            }
        }
    }
}