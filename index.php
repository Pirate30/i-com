<?php
include('header.php');
?>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">

</div>
<!-- End Offset Wrapper -->
<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection 2018</h2>
                                <h1>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="cart.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/1.png" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection 2018</h2>
                                <h1>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="cart.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/2.png" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                    $get_product = get_product($con, '8');
                    foreach ($get_product as $list) {


                    ?>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist_manage(<?php echo $get_product['0']['id'] ?>,'add' ?>)"><i class=" icon-heart icons"></i></a></li>

                                        <li><a href="javascript:void(0)" onclick="manage_cart(<?php echo $get_product['0']['id'] ?>, 'add')"><i class="icon-handbag icons"></i></a></li>

                                    </ul>
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
                        <!-- End Single Category -->
                    <?php } ?>
                </div>
            </div>
            <!-- </div>  -->
            <?php include('new-arrivals.php') ?>
        </div>
</section>
<!-- End Category Area -->

<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="product__wrap clearfix">
                <?php
                $sql = "select * from product where best_seller=1";
                $res = mysqli_query($con, $sql);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.php?id=<?php echo $row['id'] ?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist_manage(<?php echo $get_product['0']['id'] ?>,'add' ?>)"><i class=" icon-heart icons"></i></a></li>

                                        <li><a href="javascript:void(0)" onclick="manage_cart(<?php echo $get_product['0']['id'] ?>, 'add')"><i class="icon-handbag icons"></i></a></li>

                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><?php echo $row['mrp'] ?></li>
                                        <li><?php echo $row['price'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Nothing is added Currently";
                }
                ?>

            </div>

        </div>
    </div>
    </div>
</section>
<!-- End Product Area -->



</div>
</div>
</section> -->
<!-- End Top Rated Area -->

<!-- java scripto for add to cart which is given in hover effect -->
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

    function wishlist_manage(pid, type) {

        jQuery.ajax({
            url: 'wishlist_manage.php',
            type: 'post',
            data: '&pid=' + pid + '&type=' + type,
            success: function(result) {
                // alert(result);
                if (result == 'not_login') {
                    window.location.href = 'login.php';
                }
            }

        });

    }
</script>
<?php
include('footer.php');
?>