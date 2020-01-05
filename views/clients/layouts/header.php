<!-- Navigation -->
<header class="nav-type-1">


    <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
            <div class="container relative">

                <div class="row">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Mobile cart -->
                        <div class="nav-cart mobile-cart hidden-lg hidden-md">
                            <div class="nav-cart-outer">
                                <div class="nav-cart-inner">
                                    <a href="#" class="nav-cart-icon">2</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->

                    <div class="header-wrap">
                        <div class="header-wrap-holder">

                            <!-- Search -->
                            <div class="nav-search hidden-sm hidden-xs">
                                <form  action="/search.php" method="post" role="form">
                                    <input type="text" name="input_key" class="form-control" placeholder="Search">
                                    <button type="submit" class="search-button">
                                        <i class="icon icon_search"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Logo -->
                            <div class="logo-container">
                                <div class="logo-wrap text-center">
                                    <a href="/">
                                        <h1>Books Store</h1>
                                    </a>
                                </div>
                            </div>

                            <!-- Cart -->
                            <div class="nav-cart-wrap hidden-sm hidden-xs">
                                <div class="nav-cart right">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="#" id="cart_count" class="nav-cart-icon"></a>
                                        </div>
                                    </div>
                                    <div class="nav-cart-container">
                                        <div class="nav-cart-items">
                                            <div id="cart_result"></div>


                                        </div> <!-- end cart items -->

                                        <div class="nav-cart-summary">
                                            <span>Total</span>
                                            <span id="cart_total" class="total-price">0</span>
                                        </div>

                                        <div class="nav-cart-actions mt-20">
                                            <a href="/cart.php" class="btn btn-md btn-dark"><span>View Cart</span></a>
<!--                                            <a href="shop-checkout.html" class="btn btn-md btn-color mt-10"><span>Proceed to Checkout</span></a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-cart-amount right">
<!--                      <span>-->
<!--                        Cart /-->
<!--                        <a href="#"> $1299.50</a>-->
<!--                      </span>-->
                                </div>
                            </div> <!-- end cart -->

                        </div>
                    </div> <!-- end header wrap -->

                  <?php include ('views/clients/layouts/menu.php')?>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end navigation -->
    </nav> <!-- end navbar -->
</header> <!-- end navigation -->
