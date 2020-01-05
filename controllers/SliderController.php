<?php
require_once '../../../models/Slider.php';
require_once 'Controller.php';

class SliderController extends Controller
{
    public function index($request)
    {

        $slider = new Slider();
        $slider_list = $slider->getListSlider($request, $this->limit);
        //print_r($slider_list);
        $this->dataSendView['slider_list'] = $slider_list['data'];
        $this->dataSendView['total_page'] = $slider_list['total_page'];
        //print_r($this->dataSendView['slider_list']);
        return $this->view('views/admins/UI/slider/index.php');
    }

    public function add($request)
    {
        $this->dataSendView['errors'] = [];
        $_SESSION['input_slider'] = $request;
        $errors = [];
//        echo'<pre>';
//        print_r($request);

        if ($request['action'] != null) {
            if (empty($request['input_link'])) {
                $errors['input_link_null'] = 'Field link must be required';
            }

            if (empty($request['image']['name'])) {
                $errors['input_image'] = 'Field image must be required';
            }

            if (!empty($errors)) {
                $this->dataSendView['errors'] = $errors;
                return $this->view('views/admins/UI/slider/add.php');
            }

            $file_name = rand(0, 1000) . $request['image']['name'];
            $tmp_name = $request['image']['tmp_name'];
            $request['image']['name'] = $file_name;

            $slider = new Slider();
            $slider_add = $slider->add($request);
            if ($slider_add) {
                move_uploaded_file($tmp_name, '../../../assets/uploads/slider/' . $file_name);
                unset($_SESSION['input_slider']);
                header("location:/pages/admin/slider");
            }
        }

        return $this->view('views/admins/UI/slider/add.php');
    }

    public function edit($id)
    {
        $slider = new Slider();
        $slider_object = $slider->getObjectById($id);
        if (empty($slider_object)) {
            header("location:/pages/admin/slider");
        }
        $this->dataSendView['slider_object'] = $slider_object;
        return $this->view('views/admins/UI/slider/edit.php');
    }

    public function update($request)
    {
        $slider = new Slider();
        $file_name = rand(0, 1000) . $request['image']['name'];
        $tmp_name = $request['image']['tmp_name'];
        $request['image']['name'] = $file_name;
        $slider_update = $slider->update($request);
        if ($slider_update) {
            move_uploaded_file($tmp_name, '../../../assets/uploads/slider/' . $file_name);
            header("location:/pages/admin/slider");
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $slider = new Slider();
            $slider_delete = $slider->delete($id);
            if ($slider_delete) {
                //unlink($_FILES);
                header("location:/pages/admin/slider");
            }
        }
    }
}