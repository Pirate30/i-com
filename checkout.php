<?php
require('header.php');

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {

?>

    <script>
        window.location.href = 'index.php';
    </script>

<?php

}

$cart_tot = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $prod_arr = get_product($con, '', '', $key);
    $price = $prod_arr['0']['price'];
    $qty = $val['qty'];
    $cart_tot = $cart_tot + ($price * $qty);
}

if (isset($_POST['submit'])) {
    // $country = get_safe_value($con, $_POST['country']);
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];
    $total_price = $cart_tot;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');

    mysqli_query($con, "insert into `order` (user_id,address,city,pincode,payment_type,total_price,payment_status,order_status,added_on) values('$user_id','$address','$city','$pincode','$payment_type','$total_price','$payment_status','$order_status','$added_on')");


    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $prod_arr = get_product($con, '', '', $key);
        $price = $prod_arr['0']['price'];
        $qty = $val['qty'];

        mysqli_query($con, "insert into `order_detail` (order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
    unset($_SESSION['cart']);
?>
    <script>
        window.location.href = 'greet.php';
    </script>
<?php

}

?>
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $acc_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $acc_class = 'accordion__hide';



                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method">
                                                    <div class="contact-title">
                                                        <h2 class="title__line--6">Register</h2>
                                                    </div>
                                                    <form method="post">
                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <input type="text" name="name" id="name" placeholder="Your Name*" style="margin: 0 20px;  width: 100%">
                                                                <!-- <input type="email" name="email" placeholder="Mail*"> -->
                                                            </div>
                                                            <span class="field_error" id="name_error"></span>
                                                        </div>
                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                                                <input type="email" name="email" id="email" placeholder="Mail*" style="margin: 0 20px; width: 100%">
                                                            </div>
                                                            <span class="field_error" id="email_error"></span>
                                                        </div>
                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                                                <input name="mobile" id="mobile" placeholder="Mobile*" style="margin: 0 20px;
    width: 100%">
                                                            </div>
                                                            <span class="field_error" id="mobile_error"></span>
                                                        </div>
                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                                                <input type="password" id="password" name="password" placeholder="Password*" style="margin: 0 20px;
    width: 100%">
                                                            </div>
                                                            <span class="field_error" id="password_error"></span>
                                                        </div>

                                                        <!-- <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div> -->
                                                        <div class="contact-btn">
                                                            <button type="button" class="fv-btn" onclick="user_register()">Sign In</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <div class="contact-title">
                                                        <h2 class="title__line--6">Login</h2>
                                                    </div>
                                                    <form method="post">

                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                                                <input type="email" name="login_email" id="login_email" placeholder="Mail*" style="margin: 0 20px;
width: 100%">
                                                            </div>
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>

                                                        <div class="single-contact-form">
                                                            <div class="contact-box name">
                                                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                                                <input type="password" name="login_password" id="login_password" placeholder="Password*" style="margin: 0 20px;
width: 100%">
                                                            </div>
                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>

                                                        <div class="contact-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Log In</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?php echo $acc_class ?>">
                                Billing Information
                            </div>
                            <form method="POST">
                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input mt-0">
                                                    <select name="country" id="bil-country">
                                                        <option name="country" value="select">Select your country</option>
                                                        <option name="country" value="arb">Arab Emirates</option>
                                                        <option name="country" value="ban">Bangladesh</option>
                                                        <option name="country" value="ind">India</option>
                                                        <option name="country" value="uk">United Kingdom</option>
                                                        <option name="country" value="usa">United States</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="<?php echo $acc_class ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">

                                        <div class="single-method">
                                            Cash On Delivery <input type="radio" name="payment_type" value="cod" required>
                                            &nbsp;&nbsp;&nbsp;&nbsp; PayU <input type="radio" name="payment_type" value="payu" required>
                                        </div>


                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" name="submit" class="fv-btn">Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        $cart_tot = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $prod_arr = get_product($con, '', '', $key);
                            $pro_name = $prod_arr['0']['name'];
                            $mrp = $prod_arr['0']['mrp'];
                            $price = $prod_arr['0']['price'];
                            $image = $prod_arr['0']['image'];
                            $qty = $val['qty'];
                            $cart_tot = $cart_tot + ($price * $qty);

                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src=" <?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $pro_name ?></a>
                                    <span class="price">$<?php echo $price * $qty  ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="icon-trash icons"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">$<?php echo $cart_tot ?></span>
                    </div>
                </div>

            </div>
        </div>
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
                    window.location.href = window.location.href;
                }
                jQuery('.htc__qua').html(result);
            }

        });

    }

    function user_register() {
        jQuery('.field_error').html('');
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var mobile = jQuery('#mobile').val();
        var password = jQuery('#password').val();
        var is_error = "";

        if (name == "") {
            jQuery('#name_error').html('please enter your name');
            is_error = "yes";
        }
        if (email == "") {
            jQuery('#email_error').html('please enter your email');
            is_error = "yes";
        }
        if (mobile == "") {
            jQuery('#mobile_error').html('please enter your mobile');
            is_error = "yes";
        }
        if (password == "") {
            jQuery('#password_error').html('please enter your password');
            is_error = "yes";
        }

        if (is_error == '') {
            jQuery.ajax({
                url: 'reg_submit.php',
                type: 'post',
                data: '&name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
                success: function(result) {
                    alert(result);
                }

            });
        }

    }

    function user_login() {
        jQuery('.field_error').html('');
        var email = jQuery('#login_email').val();
        var password = jQuery('#login_password').val();
        var is_error = "";

        if (email == "") {
            jQuery('#login_email_error').html('please enter your email');
            is_error = "yes";
        }
        if (password == "") {
            jQuery('#login_password_error').html('please enter your password');
            is_error = "yes";
        }

        if (is_error == '') {
            jQuery.ajax({
                url: 'login_submit.php',
                type: 'post',
                data: '&email=' + email + '&password=' + password,
                success: function(result) {
                    if (result == "wrong") {
                        jQuery('.login_msg p').html("enter a correct login details");
                    }
                    if (result == "valid") {
                        //  jQuery('.login_msg p').html("login successful");
                        window.location.href = window.location.href;
                    }
                }

            });
        }
    }
</script>
<?php
require('footer.php');
?>