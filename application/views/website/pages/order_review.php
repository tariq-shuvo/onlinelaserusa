<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Checkout</h1><p class="lead">You currently have <?php echo $cart_product_num; ?> item(s) in your basket</p>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Checout Forms-->
<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link">Address</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active">Order Review</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Payment Method </a></li>
                </ul>
                <div class="tab-content">
                    <div id="order-review" class="tab-block">
                        <div class="cart">
                            <div class="cart-holder">
                                <div class="basket-header">
                                    <div class="row">
                                        <div class="col-6">Product</div>
                                        <div class="col-2">Price</div>
                                        <div class="col-2">Quantity</div>
                                        <div class="col-2">Unit Price</div>
                                    </div>
                                </div>
                                <div class="basket-body">
                                    <?php
                                    $shipping=0;
                                    $totalAmount=0;
                                    if($cart_product_num>0){
                                    foreach ($all_cart_products as $cart_product){
                                    ?>
                                    <!-- Product-->
                                    <div class="item row d-flex align-items-center">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center"><img src="<?php echo $cart_product['options']['svgLink']; ?>" alt="Product image" class="img-fluid">
                                                <div class="title"><h6><?php echo $cart_product['name']; ?><br><?php echo $cart_product['options']['thicknessValue']; ?></h6></div>
                                            </div>
                                        </div>
                                        <div class="col-2"><span>$<?php echo number_format($cart_product['price'],2); ?></span></div>
                                        <div class="col-2"><span><?php echo $cart_product['qty']; ?></span></div>
                                        <div class="col-2"><span>$<?php echo number_format($cart_product['subtotal'],2); ?></span></div>
                                    </div>
                                        <?php
                                        $shipping=$shipping+($cart_product['options']['shipping']*$cart_product['qty']);
                                        $totalAmount+=$cart_product['subtotal'];
                                    }
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="total row"><span class="col-md-10 col-2">Total</span><span class="col-md-2 col-10 text-primary">$<?php echo number_format($totalAmount, 2); ?></span></div>
                        </div>
                        <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="<?php echo base_url('checkout'); ?>" class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to address</a><a id="next_button_checkout" href="<?php echo base_url('checkout/payment'); ?>" class="btn btn-template wide next">Complete your payment<i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="block-body order-summary">
                    <h6 class="text-uppercase">Order Summary</h6>
                    <p>Standard 5 day shipping costs are calculated.  If you require faster service, please contact us at
                        <a href="">Quotes@OnLineLaserUSA.com</a>.</p>
                    <ul class="order-menu list-unstyled">
                        <?php
                        $totalAmount=0;
                        $shipping=0;
                        foreach ($all_cart_products as $cart_product){
                            $shipping=$shipping+($cart_product['options']['shipping']*$cart_product['qty']);
                            $totalAmount+=$cart_product['subtotal'];
                        }
                        ?>
                        <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>$<?php echo number_format($totalAmount,2);?></strong></li>
                        <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$<?php echo number_format($shipping,2); ?></strong></li>
                        <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">$<?php echo number_format($totalAmount+$shipping,2);?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>