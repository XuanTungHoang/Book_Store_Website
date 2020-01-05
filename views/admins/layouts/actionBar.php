<div class="topbar-main">
    <div class="container">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#" class="logo"><span>Nhóm<span>2</span></span></a>
        </div>
        <!-- End Logo container-->
        <div class="menu-extras">
            <a href="/logout.php" style="float: right;margin-top: 0.7%;"
               class="btn btn-danger waves-effect w-md waves-light m-b-5"><?php /* nằm trong hàm view nên có biến auth*/if(!empty($auth)) echo ''.$auth->name.' - ' ?>Logout</a>
        </div>
    </div>
