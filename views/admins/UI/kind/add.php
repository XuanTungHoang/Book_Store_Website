<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Form Add Kind</h4>

            <div class="row">
                <div class="col-lg-12">
                    <form  action="/pages/admin/kind/add.php" method="POST" class="form-horizontal" role="form">
                        <ul style="float: left; margin-left: 180px;">
                            <?php foreach ($dataSendView['errors'] as $item):?>
                                <li style="color: red;"><?php echo $item ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <br>
                        <br>
                        <div class="form-group" style="text-align: center">
                            <input type="hidden" class="form-control" name="action" value="notEmpty">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="input_name" class="form-control" value="" placeholder="Kind name...">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect pull-right w-md waves-light m-b-5">ADD</button>
                    </form>
                </div><!-- end col -->



            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>