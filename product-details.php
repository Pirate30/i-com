<?php
include('header.php');
$product_id = mysqli_real_escape_string($con, $_GET['id']);
$get_product = get_product($con, '', '', $product_id);
?>
<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">

</div>
<!-- End Offset Wrapper -->

<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>" alt="full-image">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?php echo $get_product['0']['name'] ?></h2>
                        <h6>Model: <span>MNG001</span></h6>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul class="pro__prize">
                            <li class="old__prize">$<?php echo $get_product['0']['mrp'] ?></li>
                            <li>$<?php echo $get_product['0']['price'] ?></li>
                        </ul>
                        <p class="pro__info">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Availability:</span> In Stock</p>
                            </div>
                            <div class="sin__desc">
                                <p><span>qty:</span>
                                    <select id="qty">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </p>
                            </div>

                            <!-- <div class="sin__desc align--left">
                                <p><span>size</span></p>
                                <select class="select__size">
                                    <option>s</option>
                                    <option>l</option>
                                    <option>xs</option>
                                    <option>xl</option>
                                    <option>m</option>
                                    <option>s</option>
                                </select>
                            </div> -->
                            <!-- <div class="sin__desc align--left">
                                <p><span>Categories:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#">Fashion,</a></li>
                                    <li><a href="#">Accessories,</a></li>
                                    <li><a href="#">Women,</a></li>
                                    <li><a href="#">Men,</a></li>
                                    <li><a href="#">Kid,</a></li>
                                    <li><a href="#">Mobile,</a></li>
                                    <li><a href="#">Computer,</a></li>
                                    <li><a href="#">Hair,</a></li>
                                    <li><a href="#">Clothing,</a></li>
                                </ul>
                            </div> -->
                            <!-- <div class="sin__desc align--left">
                                <p><span>Product tags:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#">Fashion,</a></li>
                                    <li><a href="#">Accessories,</a></li>
                                    <li><a href="#">Women,</a></li>
                                    <li><a href="#">Men,</a></li>
                                    <li><a href="#">Kid,</a></li>
                                </ul>
                            </div> -->

                            <!-- <div class="sin__desc product__share__link">
                                <p><span>Share this:</span></p>
                                <ul class="pro__share">
                                    <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                    <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                </ul>
                            </div> -->
                            <div>
                                <div class="send__btn col-sm-4">
                                    <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart(<?php echo $get_product['0']['id'] ?>, 'add')">Add To Cart</a>
                                </div>
                                <div class="send__btn col-sm-3">
                                    <a class="fr__btn" href="#">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>

                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <p><?php echo $get_product['0']['short_desc'] ?></p>
                            <p><?php echo $get_product['0']['description'] ?></p>
                        </div>

                    </div>
                    <!-- End Single Content -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <?php include('new-arrivals.php'); ?>
    </div>
</section>
<!-- End Product Area -->
<!-- Start Banner Area -->
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
<!-- End Banner Area -->
<!-- End Banner Area -->


<script>
    function manage_cart(pid, type) {

        var qty = jQuery('#qty').val();


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