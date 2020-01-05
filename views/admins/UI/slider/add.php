<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Form Add</h4>

            <div class="row">
                <div class="col-lg-12">
                    <form  action="/pages/admin/slider/add.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <div class="form-group" ">
                            <ul style="float: left; margin-left: 180px;">
                               <?php foreach ($dataSendView['errors'] as $item):?>
                                   <li style="color: red;"><?php echo $item ?></li>
                               <?php endforeach; ?>
                             </ul>
                        <br>
                        <br>
                        <br>
                        <br>
                            <label class="col-md-2 control-label">Link</label>
                            <div class="col-md-6">
                                <input type="text" name="input_link" class="form-control" value="<?php if(!empty($_SESSION['input_slider']['input_link'])){echo $_SESSION['input_slider']['input_link']; } ?>" placeholder="Slider link...">
                            </div>
                        <br>
                        <br>
                            <label class="col-md-2 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" value="<?php if(!empty($_SESSION['input_slider']['image'])){echo $_SESSION['input_slider']['image']['name']; }?>">
                            </div>
                            <input type="hidden" class="form-control" name="action" value="notEmpty">
                        </div>
                        <button type="submit" class="btn btn-success waves-effect pull-right w-md waves-light m-b-5">ADD</button>
                    </form>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
