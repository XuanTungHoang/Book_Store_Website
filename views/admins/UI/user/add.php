
<form action="/pages/admin/user/add.php" method="post" role="form">
    <legend>Form add user</legend>

        <ul>
            <?php foreach ($dataSendView['errors'] as $item):?>
            <li style="color: red"><?php echo $item ?></li>
            <?php endforeach; ?>
        </ul>

    <input type="hidden" class="form-control" name="action" value="add">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" value="<?php if(!empty($_SESSION['input']['input_name'])) echo $_SESSION['input']['input_name']   ?>" name="input_name" id="" placeholder="Name...">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" value="<?php if(!empty($_SESSION['input']['input_email'])) echo $_SESSION['input']['input_email']   ?>" name="input_email" id="" placeholder="Email...">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" value="<?php if(!empty($_SESSION['input']['input_password'])) echo $_SESSION['input']['input_password'] ?>" name="input_password" id="" placeholder="Password...">
    </div>
    <div class="form-group">
        <label for="">Role</label>
        <select name="select_role" class="form-control">
            <option value="admin">Admin</option>
            <option value="normal">Normal</option>
        </select>
    </div>
    <button type="submit"  class="btn btn-success pull-right">Add</button>
</form>