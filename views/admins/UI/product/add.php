
<form  action="/pages/admin/product/add.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
    <legend>Form add product</legend>
    <ul style="float: left; margin-left: 180px;">
        <?php foreach ($dataSendView['errors'] as $item):?>
            <li style="color: red;"><?php echo $item ?></li>
        <?php endforeach; ?>
    </ul>
    <br><br><br><br><br><br>
    <input type="hidden" value="action" name="action">
    <div class="form-group">
        <label style="margin-left: auto" for="">Name</label>
        <input type="text" class="form-control" value="<?php if(!empty($_SESSION['input_product']['input_name'])){echo $_SESSION['input_product']['input_name'];} ?>" name="input_name" id="" placeholder="Name...">
    </div>
    <div class="form-group">
        <label for="">Des</label>
        <textarea class="form-control"  name="input_des" id="" rows="4" cols="50"><?php if(!empty($_SESSION['input_product']['input_des'])){echo $_SESSION['input_product']['input_des'];} ?></textarea>
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" value="<?php if(!empty($_SESSION['input_product']['price'])){echo $_SESSION['input_product']['price'];} ?>" name="price" id="" >
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control" value="<?php if(!empty($_SESSION['input_product']['image'])){echo $_SESSION['input_product']['image']['name'];} ?>">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="categori_id" class="form-control">
            <?php  foreach($dataSendView['cate_list'] as $item):?>
                <option value="<?php echo $item->id ?>"><?php echo $item->name?></option>
            <?php  endforeach ?>
        </select>
    </div>
    <br>
    <br>

    Special: True <input type="radio" value="true" name="special">
    False:<input checked type="radio" value="false" name="special">

    <button type="submit" class="btn btn-success waves-effect pull-right w-md waves-light m-b-5">ADD</button>
</form>


