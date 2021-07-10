<?php
include('header.php');
// include('functions.php');
$cat_id = mysqli_real_escape_string($con, $_GET['id']);

if ($cat_id > 0) {
    $get_product = get_product($con, '', $cat_id);
} else {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}

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
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <?php
            if (count($get_product) > 0) {


            ?>
                <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <select class="ht__select">
                                    <option>Default softing</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                                <select class="ht__select">
                                    <option>Show by</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                            </div>
                            <div class="ht__pro__qun">
                                <span>Showing 1-12 of 1033 products</span>
                            </div>
                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <!-- <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li> -->
                                <!-- <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li> -->
                            </ul>
                            <!-- End List And Grid View -->
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                                    foreach ($get_product as $list) {
                                    ?>
                                        <!-- Start Single prod -->
                                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                                        <li><?php echo $list['price'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single prod -->
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>
                    <!-- Start Pagenation -->
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">19</a></li>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagenation -->
                </div>
            <?php
            } else {
                echo ("data not found");
            }
            ?>

        </div>
    </div>
</section>
<!-- End Product Grid -->
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


<?php
include('footer.php');
?>