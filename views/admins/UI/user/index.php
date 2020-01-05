<form  style="width: 30%;float: right "  class="form-group" method="get" action="/pages/admin/user/index.php">
    <input style="border: 1px solid cornflowerblue;" class="form-control" type="text" name="keyword">
    <input  class="form-control" value="<?php echo $_GET['page'];?>" type="hidden" name="page">
    <button style="margin-top: 5px ;float: right" class="btn btn-success" type="submit">Search</button>
</form>
<a  href="/pages/admin/user/add.php" type="button" class="btn btn-success waves-effect w-md waves-light m-b-5">ADD</a>
<?php if(count($dataSendView['user_list'])>0){ ?>
<table class="table table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created_At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($dataSendView['user_list'] as $item){ ?>
        <tr>
            <td><?php echo $item->id ?></td>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->email ?></td>
            <td><?php echo $item->role ?></td>
            <td><?php echo $item->status ?></td>
            <td><?php echo $item->create_at ?></td>
            <td>
                <a href="/pages/admin/user/edit.php?id=<?php echo $item->id?>" class="btn btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="fa fa-wrench"></i> </a>
                <a  href="/pages/admin/user/delete.php?id=<?php echo $item->id?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i> </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div style="float:right" class="btn-group m-b-10">
    <div class="btn-group">
        <a href="/pages/admin/user/?page=<?php
        if($_GET['page']>1){
            echo $_GET['page']-1;
        } ?> " type="button" class="btn btn-default <?php if($_GET['page']==1) echo 'disabled'; ?>">
            Previous
        </a>
    </div>
    <?php for($i=1;$i<= $dataSendView['total_page'];$i++) { ?>
        <a href="/pages/admin/user/?page=<?php echo $i; if(!empty($_GET['keyword'])) echo '&keyword='.$_GET['keyword'] ?>"
           type="button"
           class="btn btn-<?php if($_GET['page']==$i) {echo 'primary';}
           ?>" waves-effect waves-light"><?php echo $i; ?></a>

    <?php } ?>
    <div class="btn-group">
        <a href="/pages/admin/user/?page=<?php
        if($_GET['page']<$dataSendView['total_page']){
            echo $_GET['page']+1;
        } ?>" type="button" class="btn btn-default <?php if($_GET['page']==$dataSendView['total_page']) echo 'disabled'; ?>">
            Next
        </a>
    </div>
</div>
<?php }else{echo '<h1> No data</h1>';} ?>
