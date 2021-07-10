<?php
include('header.php');
$order_id = get_safe_value($con, $_GET['id']);
?>
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Product</th>
                                        <th class="product-thumbnail"><span class="nobr">Image</span></th>
                                        <th class="product-name"><span class="nobr">Price </span></th>
                                        <th class="product-price"><span class="nobr">Qty </span></th>
                                        <th class="product-price"><span class="nobr">Total </span></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
                                    $order_total = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $order_total = $order_total + ($row['price'] * $row['qty']);

                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="oder_details.php"> <?php echo $row['name'] ?></a></td>
                                            <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="product images"></td>
                                            <td class="product-name"><?php echo $row['price'] ?></td>
                                            <td class="product-name"><?php echo $row['qty'] ?></td>
                                            <td class="product-name"><?php echo $row['price'] * $row['qty'] ?></td>


                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product_name"> Total :</td>
                                        <td class="product_name"> <?php echo $order_total ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>