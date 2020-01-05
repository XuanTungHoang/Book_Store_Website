<form action="/pages/admin/category/add.php" method="post" role="form">
    <legend>Form Add Category</legend>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="input_name" id="" placeholder="Name...">
    </div>
    <div class="form-group">
        <label for="">Kind</label>
        <select name="kind_id" class="form-control">
            <?php  foreach($dataSendView['kind_list'] as $item):?>
                <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
            <?php  endforeach ?>
        </select>
    </div>
    <button type="submit"  class="btn btn-success pull-right">Add</button>
</form>
