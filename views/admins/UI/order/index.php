<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <form style="width: 30%;float: left " class="form-group" method="get" action="/pages/admin/order/index.php">
                <input style="border: 1px solid cornflowerblue;" class="form-control" type="text" name="keyword">
                <input class="form-control" value="<?php echo $_GET['page']; ?>" type="hidden" name="page">
                <button style="margin-top: 5px ;float: left" class="btn btn-success" type="submit">Search</button>
            </form>
            <br><br><br><br><br><br>
            <div class="table-rep-plugin">
                <div class="table-responsive" data-pattern="priority-columns">
                    <?php if (count($dataSendView['orders']) > 0){ ?>
                    <table id="tech-companies-1" class="table  table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataSendView['orders'] as $item): ?>
                            <tr>

                                <td><?php echo $item->id ?></td>
                                <td><?php echo $item->name ?></td>
                                <td><?php echo $item->phone ?></td>
                                <td><?php echo $item->address ?></td>
                                <td>
                                    <?php
                                    if ($item->status == 'waiting_confirm') echo "<label onclick='changeStatus(".$item->id.")' id='label_status_".$item->id."'    class='label label-warning'>Đợi Xác Nhận</label>";
                                    if ($item->status == 'confirmed') echo "<label onclick='changeStatus(".$item->id.")'  id='label_status_".$item->id."'  class='label label-primary'>Đã Xác Nhận</label>";
                                    if ($item->status == 'successfully') echo "<label onclick='changeStatus(".$item->id.")' id='label_status_".$item->id."'   class='label label-success'>Hoàn Tất</label>";
                                    if ($item->status == 'cancel') echo "<label onclick='changeStatus(".$item->id.")'  id='label_status_".$item->id."'  class='label label-danger'>Hủy Bỏ</label>";
                                    ?>
                                </td>
                                <td> <?php echo $item->create_at ?></td>
                                <td>
                                    <button onclick="order_view(<?php echo $item->id ?>)" id="btn_order_view"
                                            data-toggle="modal" data-target="#myModal"
                                            class="btn btn-icon waves-effect waves-light btn-primary m-b-5"><i
                                                class="fa fa-adn"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div style="float:right" class="btn-group m-b-10">
                        <?php for ($i = 1; $i <= $dataSendView['total_page']; $i++) { ?>
                            <a href="/pages/admin/order/?page=<?php echo $i; ?>"
                               type="button"
                               class="btn btn-default"><?php echo $i; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->

<?php } else {
    echo '<h1>No data</h1>';
} ?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Detail</h4>
            </div>
            <div class="modal-body">
                <table id="tech-companies-1" class="table  table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>

                    </tr>
                    </thead>
                    <tbody id="body_detail">

                    </tbody>
                </table>
                <div>
                    <span style="margin-left: 10px;font-size: 18px">Tổng cộng:</span> <span id="total" style="font-size: 18px;"></span><span style="margin-left: 5px;font-size: 18px">VNĐ</span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>

    function changeStatus(id){
        $.post("/pages/admin/order/ajaxChangeStatusOrder.php",{order_id:id}).then(result=>{
            if(result.success){
                var text_status = '';
                var class_status = '';
                if(result.status_changed == 'waiting_confirm'){
                    text_status = 'Đợi Xác Nhận';
                    class_status = 'label label-warning';
                }else if(result.status_changed == 'confirmed'){
                    text_status = 'Đã Xác Nhận';
                    class_status = 'label label-primary';
                }else if(result.status_changed == 'successfully'){
                    text_status = 'Hoàn Tất';
                    class_status = 'label label-success';
                }else if(result.status_changed == 'cancel'){
                    text_status = 'Hủy Bỏ';
                    class_status = 'label label-danger';
                }
                $('#label_status_'+id).text(text_status);
                $('#label_status_'+id).attr("class",class_status)
            }
            console.log(result);
        })
    }

    function order_view(id) {
        ///
        //
        $.post('/pages/admin/order/ajaxOrderDetail.php', {order_id: id}).then(result => {
            //$('.modal-body').text(JSON.stringify(result))
            //console.log(result);
            //JSON.parse(result);
            var sum=0;
            result.forEach(item => {
            var object = {
                name: item.name,
                id: item.id,
                quantity: parseInt(item.quantity),
                price: parseInt(item.price),
                total:parseInt(item.quantity*item.price),
            };
            sum+=object.total;
            result += htmlOrder(object);
    });
            sum=(sum).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $('#body_detail').html(result);
            $('#total').html(sum);
    })
    }

    function htmlOrder(object) {
        return `
 <tr>

                        <td>${object.id}</td>
                        <td>${object.name}</td>
                        <td>${object.quantity}</td>
                        <td>${object.price}</td>

                    </tr>

    `
    }

</script>