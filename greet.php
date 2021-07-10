<?php
include('header.php');
?>
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <h3> Thankyou , <b> <?php echo $_SESSION['USER_NAME'] ?></b> Your Order is Placed Successfully.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>