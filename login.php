 <?php
    include('header.php');
    if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
    ?>
     <script>
         window.location.href = 'myorder.php';
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
 <!-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Contact Us</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
 <!-- End Bradcaump area -->

 <section class=" bg__white">
     <div class="container">
         <div class="row col-sm-6">
             <div class="contact-form-wrap mt--60">
                 <div class="col-xs-12">
                     <div class="contact-title">
                         <h2 class="title__line--6">Login</h2>
                     </div>
                 </div>
                 <div class="col-xs-12">
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

                         <!-- <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div> -->
                         <br>
                         <a href="forget_password.php" style="color: red; margin:5px">Forgot Password?</a>
                         <div class="contact-btn">
                             <button type="button" class="fv-btn" onclick="user_login()">Log In</button>
                         </div>
                     </form>
                     <div class="form-output login_msg">
                         <p class="form-messege"></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row col-sm-6">
             <div class="contact-form-wrap mt--60">
                 <div class="col-xs-12">
                     <div class="contact-title">
                         <h2 class="title__line--6">Register</h2>
                     </div>
                 </div>
                 <div class="col-xs-12">
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
                     <div class="form-output">
                         <p class="form-messege"></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Contact Area -->
 <!-- End Banner Area -->
 <script>
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
                         window.location.href = 'index.php';
                     }
                 }

             });
         }
     }
 </script>
 <?php
    include('footer.php');
    ?>