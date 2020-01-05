
<div class="nav-wrap">
    <div class="collapse navbar-collapse" id="navbar-collapse">

        <ul class="nav navbar-nav">

<!--            <li id="mobile-search" class="hidden-lg hidden-md">-->
<!--                <form method="get" class="mobile-search relative">-->
<!--                    <input type="search" class="form-control" placeholder="Search...">-->
<!--                    <button type="submit" class="search-button">-->
<!--                        <i class="icon icon_search"></i>-->
<!--                    </button>-->
<!--                </form>-->
<!--            </li>-->

            <li class="dropdown">
                <a href="/">Home</a>
            </li>
            <?php foreach ($this->dataSendView['menus'] as $item): ?>
            <li class="dropdown">
                <a  href="/productFromKind.php?kind_id=<?php echo $item['kind']->id ;?>"  ><?php echo $item['kind']->name ?></a>
                <?php if(count($item['categories']) > 0): ?>
                <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown"></i>

                <ul class="dropdown-menu">
                    <?php foreach ($item['categories'] as $jtem): ?>
                    <li><a href="/loadProductFromCategory.php?cat_id=<?= $jtem->id ?>&& Category=<?php echo $jtem->name ?>" ><?php echo $jtem->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>

            <li class="mobile-links">
                <ul>
                    <li>
                        <a href="#">Login</a>
                    </li>
                    <li>
                        <a href="#">My Account</a>
                    </li>
                    <li>
                        <a href="#">My Wishlist</a>
                    </li>
                </ul>
            </li>

        </ul> <!-- end menu -->
    </div> <!-- end collapse -->
</div> <!-- end col -->
