<?php
include("header.php");

$order_id = get_safe_value($con, $_GET['id']);

if (isset($_POST['update_order_status'])) {
    $update_order_status = $_POST['update_order_status'];
    mysqli_query($con, "update `order` set order_status = '$update_order_status' where id='$order_id'");
}
?>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title" style="font-size: 25px;">Orders Details </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
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

                                    $res = mysqli_query($con, "select order_detail.* ,product.name,product.image,`order`.address ,`order`.city,`order`.pincode,`order`.order_status from order_detail,product,`order` where order_detail.order_id='$order_id'  and order_detail.order_id=order.id and order_detail.product_id=product.id ");
                                    $order_total = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $order_total = $order_total + ($row['price'] * $row['qty']);
                                        $address = $row['address'];
                                        $city = $row['city'];
                                        $pincode = $row['pincode'];
                                        $order_status = $row['order_status'];

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
                            <div id="order_address" style="margin-left: 50px;">
                                <strong>Address :</strong>
                                <?php echo $address ?>&nbsp;, &nbsp;&nbsp; <?php echo $city ?>&nbsp;,&nbsp;&nbsp; <?php echo $pincode ?>
                                <br>
                                <hr>
                                <strong>Status:</strong>
                                <?php
                                $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "select name from order_status where id='$order_status'"));
                                echo $order_status_arr['name'];
                                ?>
                            </div>
                            <!-- <strong>Status:</strong>
                            <?php
                            $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "select name from order_status where id='$order_status'"));
                            echo $order_status_arr['name'];
                            ?> -->
                            <div>
                                <form method="post" style="margin-top:  20px;">
                                    <select class="form-control" name="update_order_status">
                                        <option>Select Status</option>
                                        <?php
                                        $res = mysqli_query($con, "select * from order_status");
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            if ($row['id'] == $categories_id) {
                                                echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                            } else {
                                                echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="form-control" placeholder="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>