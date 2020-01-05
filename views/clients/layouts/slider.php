<!-- Hero Slider -->
<section class="section-wrap nopadding">
    <div class="container">
        <div class="entry-slider">
            <div class="flexslider" id="flexslider-hero">
                <ul class="slides clearfix">
                    <?php foreach ($dataSendView['slider'] as $item) :  ?>
                    <li>
                        <img style="width: 100%;height: 536px" src="/assets/uploads/slider/<?php echo $item->image?>" alt="">
                        <div class="hero-holder text-center right-align">
                            <a href="<?php echo $item->link ?>" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                        </div>
                    </li>
                    <?php endforeach;  ?>

                </ul>
            </div>
        </div> <!-- end slider -->
    </div>
</section> <!-- end hero slider -->
