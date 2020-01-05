<form action="/pages/admin/category/update.php" method="post" role="form">
    <legend>Form Category</legend>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" value="<?php echo $dataSendView['cate_object']->name ?>" class="form-control" name="input_name" id="" placeholder="Name...">
        <input type="hidden" value="<?php echo $dataSendView['cate_object']->id ?>" class="form-control" name="input_id" id="" placeholder="Name...">
    </div>
    <div class="form-group">
        <label for="">Kind</label>
        <select name="kind_id" class="form-control">
            <?php  foreach($dataSendView['kind_list'] as $item):?>
                <option <?php if($item->id == $dataSendView['cate_object']->kind_id) echo 'selected'; ?> value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
            <?php  endforeach ?>
        </select>
    </div>
    <button type="submit"  class="btn btn-success pull-right">Update</button>
</form>
