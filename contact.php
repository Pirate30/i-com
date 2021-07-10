<?php
include('header.php');
?>
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
                            <span class="breadcrumb-item active">Contact Us</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="title__line--6">CONTACT US</h2>
                <div class="address col-sm-6">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">our address</h2>
                        <p>666 5th Ave New York, NY, United </p>
                    </div>
                </div>

                <div class="address col-sm-6">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Phone Number</h2>
                        <p>123-6586-587456</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">SEND A MAIL</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="mail.php" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input id="name" type="text" name="name" placeholder="Your Name*" require>
                                <input id="email" type="email" name="email" placeholder="Mail*" require>
                                <input id="mobile" name="mobile" placeholder="Mobile*" require>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea id="comment" name="comment" placeholder="Your Message" require></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="button" onclick="send_message()" class="fv-btn">Send MESSAGE</button>
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
    function send_message() {
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var mobile = jQuery('#mobile').val();
        var comment = jQuery('#comment').val();
        var error = "";

        if (name == "") {
            alert('please enter your name');
        } else if (email == "") {
            alert('please enter your email');
        } else if (mobile == "") {
            alert('please enter your mobile');
        } else if (comment == "") {
            alert('please enter your message');
        } else {
            jQuery.ajax({
                url: 'send_message.php',
                type: 'post',
                data: '&name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + comment,
                success: function(result) {
                    alert(result);
                }

            })
        }

    }
</script>
<?php
include('footer.php');
?>