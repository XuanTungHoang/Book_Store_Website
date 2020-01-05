<?php include ("views/clients/layouts/breadcrumb.php"); ?>
<!-- Single Product -->
<section class="section-wrap single-product">
    <div class="container relative">
        <div class="row">

            <div class="col-sm-6 col-xs-12 mb-60">
                <input type="hidden" id="product_id" value="<?= $dataSendView['product']->id ?>" />
                <input type="hidden" id="product_name" value="<?= $dataSendView['product']->name ?>" />
                <input type="hidden" id="product_price" value="<?= $dataSendView['product']->price ?>" />
                <input type="hidden" id="product_image" value="<?= $dataSendView['product']->image ?>" />
                <div class="flickity flickity-slider-wrap " >

                    <div >
                        <a href="/assets/uploads/product/<?= $dataSendView['product']->image ?>" class="lightbox-img">
                            <img src="/assets/uploads/product/<?= $dataSendView['product']->image ?>" alt="" />
                        </a>
                    </div>

                </div> <!-- end gallery thumbs -->

            </div> <!-- end col img slider -->

            <div class="col-sm-6 col-xs-12 product-description-wrap">
                <h1 class="product-title"><?= $dataSendView['product']->name ?></h1>

                <span class="price">

              <ins>
                <span class="ammount"><?php echo number_format($dataSendView['product']->price) ?> VND</span>
              </ins>
            </span>
                <p class="product-description">
                    <?= substr($dataSendView['product']->description,0,300) ?>
                </p>



                <ul class="product-actions clearfix">

                    <li>
                        <a   id="btn_add_to_card" class="btn btn-color btn-lg add-to-cart left"><span>Thêm vào giỏ hàng</span></a>
                    </li>
                    <li>
                        <div class="icon-add-to-wishlist left">
                            <a href="#"></a>
                        </div>
                    </li>
                    <li>
                        <div class="quantity buttons_added">
                            <input id="product_decrement" type="button" value="-" class="minus" /><input id="product_quantity" type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input id="product_increment" type="button" value="+" class="plus" />
                        </div>
                    </li>
                </ul>




            </div> <!-- end col product description -->
        </div> <!-- end row -->

        <!-- tabs -->
        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-bb">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-description" data-toggle="tab">Description</a>
                        </li>

                    </ul> <!-- end tabs -->

                    <!-- tab content -->
                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="tab-description">
                            <p>
                                <?= $dataSendView['product']->description ?>
                            </p>
                        </div>



                    </div> <!-- end tab content -->

                </div>
            </div> <!-- end tabs -->
        </div> <!-- end row -->


    </div> <!-- end container -->
</section> <!-- end single product -->

<script>
    $(document).ready(function(){
        $('#product_decrement').click(e=>{
            var current_quantity = $('#product_quantity').val();

            if(current_quantity > 1){
                current_quantity--;
                $('#product_quantity').attr('value',current_quantity)
            }
        });
        $('#product_increment').click(e=>{
            var current_quantity = $('#product_quantity').val();
            if(current_quantity >= 1){
                 current_quantity++;
                $('#product_quantity').attr('value',current_quantity)
            }
        });
        $('#btn_add_to_card').click(e=>{
            var product_name =$('#product_name').val();
            var product_id =$('#product_id').val();
            var product_price =$('#product_price').val();
            var product_quantity =$('#product_quantity').val();
            var product_image =$('#product_image').val();


            var cart = [];
            //khoi dau localStorage
            var cart_object = {
                id:product_id,
                name:product_name,
                price:parseInt(product_price),
                quantity:parseInt(product_quantity),
                image:product_image
            };
            cart.push(cart_object);
            if(localStorage.getItem("cart")){
                var carts = JSON.parse(localStorage.getItem('cart'));
                    var item = carts.find(x=>x.id == cart_object.id);
                    if(item){
                        var cart_quantity = item.quantity + cart_object.quantity;
                        item.quantity=  cart_quantity ;
                    }else{
                        carts.push(cart_object)
                    }

                    localStorage.setItem("cart",JSON.stringify(carts));
            }else{
                localStorage.setItem("cart",JSON.stringify(cart));
            }

            updateCard();

        });
    })
</script>