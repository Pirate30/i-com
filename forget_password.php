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
</div>


<section class=" bg__white">
    <div class="container">
        <div class="row col-sm-6">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">Forget Password</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form method="post">

                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <!-- <input type="text" name="name" placeholder="Your Name*"> -->
                                <input type="email" name="email" id="email" placeholder="Mail*" style="margin: 0 20px;width: 100%">
                            </div>
                            <span class="field_error" id="email_error"></span>
                        </div>

                        <div class="contact-btn">
                            <button type="button" class="fv-btn" onclick="forgot_password()">Submit</button>
                        </div>
                    </form>
                    <div class="form-output login_msg">
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
    function forgot_password() {
        jQuery('.field_error').html('');
        var email = jQuery('#email').val();

        if (email == "") {
            jQuery('#email_error').html('please enter correct email');
        } else {
            jQuery.ajax({
                url: 'forget_password_submit.php',
                type: 'post',
                data: 'email=' + email,
                success: function(result) {

                }
            })
        }
    }
</script>
<?php
include('footer.php');
?>