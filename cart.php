<?php
include('header.php');
// include('functions.php');
// include('connection.php');


?>

<!-- Start Cart Panel -->
<div class="shopping__cart">
    <div class="shopping__cart__inner">
        <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
        </div>
        <div class="shp__cart__wrap">
            <div class="shp__single__product">
                <div class="shp__pro__thumb">
                    <a href="#">
                        <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                    </a>
                </div>
                <div class="shp__pro__details">
                    <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                    <span class="quantity">QTY: 1</span>
                    <span class="shp__price">$105.00</span>
                </div>
                <div class="remove__btn">
                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                </div>
            </div>
            <div class="shp__single__product">
                <div class="shp__pro__thumb">
                    <a href="#">
                        <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                    </a>
                </div>
                <div class="shp__pro__details">
                    <h2><a href="product-details.html">Brone Candle</a></h2>
                    <span class="quantity">QTY: 1</span>
                    <span class="shp__price">$25.00</span>
                </div>
                <div class="remove__btn">
                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                </div>
            </div>
        </div>
        <ul class="shoping__total">
            <li class="subtotal">Subtotal:</li>
            <li class="total__price">$130.00</li>
        </ul>
        <ul class="shopping__btn">
            <li><a href="cart.html">View Cart</a></li>
            <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
        </ul>
    </div>
</div>
<!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->

<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <?Php
        if ($_SESSION['cart']) {
        ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">products</th>
                                        <th class="product-name">name of products</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($_SESSION['cart'] as $key => $val) {
                                        $prod_arr = get_product($con, '', '', $key);
                                        $pro_name = $prod_arr['0']['name'];
                                        $mrp = $prod_arr['0']['mrp'];
                                        $price = $prod_arr['0']['price'];
                                        $image = $prod_arr['0']['image'];
                                        $qty = $val['qty'];

                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pro_name ?></a>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$<?php echo $mrp ?></li>
                                                    <li>$<?php echo $price ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">$<?php echo $price ?></span></td>
                                            <td class="product-quantity"><input type="number" id="<?php echo $key ?>qty" value="<?php echo $qty ?>" />
                                                <br><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','update')">UPDATE</a>
                                            </td>
                                            <td class="product-subtotal">$<?php echo $qty * $price ?></td>
                                            <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="<?php echo SITE_PATH ?>">Continue Shopping</a>
                                    </div>
                                    <div class="buttons-cart checkout--btn">
                                        <a href="checkout.php">checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="ht__coupon__code">
                                    <span>enter your discount code</span>
                                    <div class="coupon__box">
                                        <input type="text" placeholder="">
                                        <div class="ht__cp__btn">
                                            <a href="#">enter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="htc__cart__total">
                                    <h6>cart total</h6>
                                    <div class="cart__desk__list">
                                        <ul class="cart__desc">
                                            <li>cart total</li>
                                            <li>tax</li>
                                            <li>shipping</li>
                                        </ul>
                                        <ul class="cart__price">
                                            <li>$909.00</li>
                                            <li>$9.00</li>
                                            <li>0</li>
                                        </ul>
                                    </div>
                                    <div class="cart__total">
                                        <span>order total</span>
                                        <span>$918.00</span>
                                    </div>
                                    <ul class="payment__btn">
                                        <li class="active"><a href="#">payment</a></li>
                                        <li><a href="#">continue shopping</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?Php } else {
            echo "NO DATA..";
        }
        ?>
    </div>

</div>
<!-- cart-main-area end -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->
<!-- End Banner Area -->
<script>
    function manage_cart(pid, type) {

        if (type == 'update') {
            var qty = jQuery('#' + pid + 'qty').val();
        } else {
            var qty = jQuery('#qty').val();
        }




        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: '&pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                // alert(result);
                if (type == 'update' || type == 'remove') {
                    window.location.href = 'cart.php';
                }
                jQuery('.htc__qua').html(result);
            }

        });

    }
</script>
<?php
include('footer.php');
?>