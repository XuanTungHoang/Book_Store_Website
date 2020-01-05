<?php include ("views/clients/layouts/breadcrumb.php"); ?>
<section class="section-wrap shopping-cart pt-0">
    <div class="container relative">
        <div class="row">

            <div class="col-md-12">
                <div class="table-wrap mb-30">
                    <table class="shop_table cart table">
                        <thead>
                        <tr>
                            <th class="product-name" colspan="2">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody id="order_item">


                        </tbody>
                    </table>
                </div>


            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6 shipping-calculator-form">
                <h2 class="heading relative heading-small uppercase mb-30">Calculate Shipping</h2>


                    <div class="row row-20">
                        <div class="col-sm-6">

                            <p class="form-row form-row-wide">
                                <input type="text" class="input-text" value="" placeholder="Name" name="order_name"
                                       id="order_name">
                            </p>

                        </div>
                        <div class="col-sm-6">
                            <p class="form-row form-row-wide">
                                <input type="text" class="input-text" value="" placeholder="address"
                                       name="order_address" id="order_address">
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="form-row form-row-wide">
                                <input type="number" class="input-text" value="" placeholder="phone" name="order_phone"
                                       id="order_phone">
                            </p>
                        </div>
                    </div>

                    <p>
                        <button id="btn_send" name="calc_shipping" value="1"
                                class="btn btn-md btn-primary mt-20 mb-mdm-40">Send
                        </button>
                    </p>

            </div> <!-- end col shipping calculator -->

            <div class="col-md-4 col-md-offset-2">
                <div class="cart_totals">
                    <h2 class="heading relative heading-small uppercase mb-30">Cart Totals</h2>

                    <table class="table shop_table">
                        <tbody>


                        <tr class="order-total">
                            <th><strong>Order Total</strong></th>
                            <td>
                                <strong><span id="order_total" class="amount"></span></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div> <!-- end col cart totals -->

        </div> <!-- end row -->


    </div> <!-- end container -->
</section>
<script>

    function initalCart() {
        var carts = JSON.parse(localStorage.getItem('cart'));

        var result = '';
        var count_total = 0;
        carts.forEach(item => {

            var object = {
                name: item.name,
                id: item.id,
                price: item.price,
                image: item.image,
                quantity: item.quantity,

            }
            count_total+=parseInt(item.price)*parseInt(item.quantity);
            result += htmlOrderItem(object);
        });

        $('#order_item').html(result);
        $('#order_total').html(formatter.format(count_total));

    }

    function removeItem(id) {
        var carts = JSON.parse(localStorage.getItem('cart'));
        carts.forEach((item,index)=>{
            if(item.id == id){
                carts.splice(index,1);
            }
        });
        localStorage.setItem("cart",JSON.stringify(carts));
        initalCart();
        updateCard();
    }

    function htmlOrderItem(object) {
        return `  <tr class="cart_item">

                            <td class="product-thumbnail">
                                <a href="#">
                                    <img src="/assets/uploads/product/${object.image}" alt="">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="#">${object.name}</a>

                            </td>
                            <td class="product-price">
                                <span class="amount">${formatter.format(object.price)}</span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity buttons_added">
                                    <input   onclick="decrement(${object.id})" type="button" value="-" class="minus"><input  id="quatity_head" type="number" step="1" min="0" value="${object.quantity}" title="Qty" class="input-text qty text"><input onclick="increment(${object.id})" type="button" value="+" class="plus">
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">${formatter.format(parseInt(object.price) * parseInt(object.quantity))}</span>
                            </td>
                            <td class="product-remove">
                                <a href="#" class="remove" title="Remove this item">
                                    <i onclick="removeItem(${object.id})" class="icon icon_close"></i>
                                </a>
                            </td>
                        </tr>
`;
    }
    initalCart();

    function decrement(id){
        //console.log(id);
        //var current_quantity =$(`#product_${id}>#quatity_head`).val();
        var current_quantity = $('#quatity_head').val();
        //console.log(current_quantity);
        if(current_quantity > 1){
            current_quantity--;
            $('#quatity_head').attr('value',current_quantity)
            var carts = JSON.parse(localStorage.getItem('cart'));
            carts.forEach((item,index)=>{
                if(item.id == id){
                    if(item.quantity>1){
                        item.quantity--;
                    }else{
                        item.quantity=1;
                    }

                }
            });
            localStorage.setItem("cart",JSON.stringify(carts));
            initalCart();
            updateCard();
        }
        else if(current_quantity<=1){
            $('#quatity_head').attr('value',1)
            var carts = JSON.parse(localStorage.getItem('cart'));
            carts.forEach((item,index)=>{
                if(item.id == id){
                    if(item.quantity>1){
                        item.quantity--;
                    }
                    else {
                        item.quantity=1;
                    }
                }
            });
            localStorage.setItem("cart",JSON.stringify(carts));
            initalCart();
            updateCard();
        }
    }

    function increment(id){
        //console.log(id);
        //var current_quantity =$(`#product_${id}>#quatity_head`).val();
        var current_quantity = $('#quatity_head').val();
        //console.log(current_quantity);
        current_quantity++;
        $('#quatity_head').attr('value',current_quantity)
        var carts = JSON.parse(localStorage.getItem('cart'));
        carts.forEach((item,index)=>{
            if(item.id == id){
                item.quantity++;
            }
        });
        localStorage.setItem("cart",JSON.stringify(carts));
        initalCart();
        updateCard();

    }


$('#btn_send').click(e=>{
    if(!localStorage.getItem('cart')) return;
    if(JSON.parse(localStorage.getItem('cart')).length == 0) return;

    var order_phone = $('#order_phone').val();
    var order_address = $('#order_address').val();
    var order_name = $('#order_name').val();
    var flag = true;
    if(order_phone == ''){
        $('#order_phone').css('border',"1px solid red");
        flag = false
    }
    if(order_address == ''){
        $('#order_address').css('border',"1px solid red");
        flag = false
    }
    if(order_name == ''){
        $('#order_name').css('border',"1px solid red");
        flag = false
    }
    
    //
    if(flag == true){
        $('#btn_send').text('Processing...');
        $('#btn_send').attr('disabled','true');
        $.post('/submitCart.php',{phone:order_phone,address:order_address,name:order_name,data:JSON.parse(localStorage.getItem('cart'))}).then(result=>{
            console.log(result);
            if(result.success == true)
            {
                localStorage.removeItem("cart");
                alert(result.message);
                window.location.href  = "/";

            }
        })
    }else{
        return;
    }

})


</script>