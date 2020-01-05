<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <form  style="width: 30%;float: right "  class="form-group" method="get" action="/pages/admin/product/index.php">
                <input style="border: 1px solid cornflowerblue;" class="form-control" type="text" name="keyword">
                <input  class="form-control" value="<?php echo $_GET['page'];?>" type="hidden" name="page">
                <button style="margin-top: 5px ;float: right" class="btn btn-success" type="submit">Search</button>
            </form>
            <br>
            <br>
            <a href="/pages/admin/product/add.php" type="button" class="btn btn-success waves-effect w-md waves-light m-b-5">ADD</a>
            <br>
            <br>
            <div class="table-rep-plugin">
                <?php if(count($dataSendView['product_list'])>0){ ?>
                <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table  table-striped">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th>Des</th>
                            <th >Price</th>
                            <th>Image</th>
                            <th >Category</th>
                            <th >Special</th>
                            <th >Status</th>
                            <th>Creat_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataSendView['product_list'] as $item): ?>
                            <tr>
                                <td><?php echo $item->id?></td>
                                <td><?php echo $item->name?></td>
                                <td><?php echo $item->description?></td>
                                <td><?php echo $item->price?></td>
                                <td><a target="_blank" href="/assets/uploads/product/<?php echo $item->image ?>"><img style="width: 100px;height: 100px; " src="/assets/uploads/product/<?php echo $item->image ?>"></a> </td>
                                <td><?php echo $item->cate_name?></td>
                                <td><?php echo $item->special?></td>
                                <td><?php echo $item->status?></td>
                                <td><?php echo $item->create_at?></td>
                                <td>
                                    <a href="/pages/admin/product/edit.php?id=<?php echo $item->id?>" class="btn btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="fa fa-wrench"></i> </a>
                                    <a  href="/pages/admin/product/delete.php?id=<?php echo $item->id?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i> </a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                        </tbody>
                    </table>
                    <div style="float:right" class="btn-group m-b-10">
                        <div class="btn-group">
                            <a href="/pages/admin/product/?page=<?php if($_GET['page']>1){
                                echo $_GET['page']-1;
                            } ?>" type="button" class="btn btn-default <?php if($_GET['page']==1){echo 'disabled';} ?>">
                                Previous
                            </a>
                        </div>
                        <?php for ($i=1;$i<=$dataSendView['total_page'];$i++) { ?>
                            <a href="/pages/admin/product/?page=<?php echo $i; if(!empty($_GET['keyword'])) echo '&keyword='.$_GET['keyword'] ?>"
                               type="button"
                               class="btn btn-<?php if($_GET['page']==$i){echo 'primary';} ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php }?>
                        <div class="btn-group">
                            <a href="/pages/admin/product/?page=<?php if($_GET['page']<$dataSendView['total_page']){
                                echo $_GET['page']+1;
                            } ?>" type="button" class="btn btn-default <?php if($_GET['page']==$dataSendView['total_page']){echo 'disabled';} ?>">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else{echo '<h1>No data</h1>';}?>
        </div>
    </div>
</div>
<script></script>