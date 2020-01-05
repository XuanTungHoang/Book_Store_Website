<h1>Tìm kiếm - Thống kê</h1>
<table class="card-box" width="800" height="200" >
    <tr width="600" height="30">
        <th>Thống kê theo tuần (7 ngày gần nhất)</th>
        <th>Thống kê theo tháng (30 ngày gần nhất)</th>
    </tr>
    <tr>
        <td>
            <p>Tổng tiền đã thành công: <?php echo number_format($dataSendView['total_success_7day'], 0, '', ','); ?> VND</p>
        </td>
        <td>
            <p>Tổng tiền đã thành công: <?php echo number_format($dataSendView['total_success_30day'],0,'',','); ?> VND</p>
        </td>
    </tr>
    <tr class="card-box">
        <td>
            <p>Tổng tiền đã xác nhận-đang giao : <?php echo number_format($dataSendView['total_confirmed_7day'], 0, '', ','); ?> VND</p>
        </td>
        <td>
            <p>Tổng tiền đã xác nhận-đang giao: <?php echo number_format($dataSendView['total_confirmed_30day'],0,'',','); ?> VND</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Tổng tiền đang đợi xác nhận: <?php echo number_format($dataSendView['total_waiting_confirm_7day'], 0, '', ','); ?> VND</p>
        </td>
        <td>
            <p>Tổng tiền đang đợi xác nhận: <?php echo number_format($dataSendView['total_waiting_confirm_30day'],0,'',','); ?> VND</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Tổng tiền đã hủy đơn hàng: <?php echo number_format($dataSendView['total_cancel_7day'], 0, '', ','); ?> VND</p>
        </td>
        <td>
            <p>Tổng tiền đã hủy đơn hàng: <?php echo number_format($dataSendView['total_cancel_30day'],0,'',','); ?> VND</p>
        </td>
    </tr>

</table>

<br><br>



<form action="/pages/admin/home/index.php" method="post" style="margin-left: 10px">
    From
    <input type="date" name="date_from" value="<?php  if(!empty($_POST['date_from'])) echo $_POST['date_from'];?>">

    To
    <input type="date" name="date_to" value="<?php if(!empty($_POST['date_to'])) echo $_POST['date_to'] ?>">
    <button type="submit">Xuất</button>
</form>
<br><br>

<div class="table-rep-plugin">
    <div class="table-responsive" data-pattern="priority-columns">

        <table id="tech-companies-1" class="table  table-striped" >
            <thead>
            <tr>
                <th >ID</th>
                <th >Tên khách hàng</th>
                <th >Địa chỉ</th>
                <th >Số điện thoại</th>
                <th >Tổng tiền</th>
                <th>Trạng thái hiện tại</th>
                <th >Ngày mua</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(!empty($dataSendView['list_orders_result']))  foreach ($dataSendView['list_orders_result'] as $item): ?>
                <tr>

                    <td><?php echo $item->id?></td>
                    <td><?php echo $item->name?></td>
                    <td><?php echo $item->address?></td>
                    <td><?php echo $item->phone?></td>
                    <td><?php echo $item->total?></td>
                    <td><?php echo $item->status?></td>
                    <td><?php echo $item->create_at?></td>
                </tr>
            <?php  endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
