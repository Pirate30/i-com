<div class="htc__product__container">
    <div class="row">
        <div class="product__list clearfix mt--30">
            <?php
            $get_product = get_product($con, '8');
            foreach ($get_product as $list) {


            ?>
                <!-- Start Single Category -->
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
                <!-- End Single Category -->
            <?php } ?>
        </div>
    </div>
</div>