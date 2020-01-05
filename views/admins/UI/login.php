<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">


    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>Adminto - Responsive Admin Dashboard Template</title>
    <?php include 'views/admins/layouts/link.php' ?>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
            <h4 style="color: red"><?php /* nếu checkLogin thất bại thì xuất thông báo */ if(!empty($fail_login)) echo $fail_login; ?></h4>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20"  method="post" action="/login.php">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control"  type="email" required="" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" name="password"  placeholder="Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log
                            In
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- end card-box-->
</div>
<!-- end wrapper page -->
</body>
</html>