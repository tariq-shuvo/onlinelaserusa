<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Shopping cart</h1><p class="lead text-muted">You currently have <?php echo $cart_product_num; ?> items in your shopping cart</p>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Shopping cart</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section-->
<section class="shopping-cart">
    <form action="<?php echo base_url('cart/update'); ?>" method="post">
    <div class="container">
        <div class="basket">
            <div class="basket-holder">
                <div class="basket-header">
                    <div class="row">
                        <div class="col-5">Product</div>
                        <div class="col-2">Price</div>
                        <div class="col-2">Quantity</div>
                        <div class="col-2">Total</div>
                        <div class="col-1 text-center">Remove</div>
                    </div>
                </div>
                <div class="basket-body">
                    <!-- Product-->
                    <?php
                    $totalAmount=0;
                    $shipping=0;
                    if($cart_product_num>0){
                        foreach ($all_cart_products as $cart_product){
                    ?>
                    <div class="item">
                        <div class="row d-flex align-items-center">
                            <div class="col-5">
                                <div class="d-flex align-items-center"><img src="<?php echo $cart_product['options']['svgLink']; ?>" alt="Product image" class="img-fluid">
                                    <div class="title"><h5><?php echo $cart_product['name']; ?><br><?php echo $cart_product['options']['thicknessValue']; ?></h5></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>$<span id="<?php echo $cart_product['rowid']; ?>_price"><?php echo number_format($cart_product['price'],2); ?></span></span>
                            </div>
                            <div class="col-2">
                                <div class="d-flex align-items-center">
                                    <div class="quantity d-flex align-items-center">
                                        <div class="dec-btn" data-id="<?php echo $cart_product['rowid']; ?>">-</div>
                                        <input type="text" value="<?php echo $cart_product['qty']; ?>" name="<?php echo $cart_product['rowid']; ?>" id="<?php echo $cart_product['rowid']; ?>" class="quantity-no">
                                        <div class="inc-btn" data-id="<?php echo $cart_product['rowid']; ?>">+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <span>$<span id="<?php echo $cart_product['rowid']; ?>_subtotal"><?php echo number_format($cart_product['subtotal'],2); ?></span></span>
                            </div>
                            <div class="col-1 text-center"><a href="<?php echo base_url('cart/delete/'.$cart_product['rowid']); ?>"><i class="delete fa fa-trash"></i></a></div>
                        </div>
                    </div>
                    <?php
                            $shipping=$shipping+($cart_product['options']['shipping']*$cart_product['qty']);
                            $totalAmount+=$cart_product['subtotal'];
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="CTAs d-flex align-items-center justify-content-center justify-content-md-end flex-column flex-md-row"><button style="margin: 10px;" data-toggle="modal" data-target="#fileUploadBox" onclick="return false" class="btn btn-template-outlined wide">Continue Shopping</button><button type="submit" class="btn btn-template wide">Update Cart</button></div>
    </div>
    </form>
</section>
<!-- Order Details Section-->
<section class="order-details no-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
<!--                <div class="block">-->
<!--                    <div class="block-header">-->
<!--                        <h6 class="text-uppercase">Coupon Code</h6>-->
<!--                    </div>-->
<!--                    <div class="block-body">-->
<!--                        <p>If you have a coupon code, please enter it in the box below</p>-->
<!--                        <form action="#">-->
<!--                            <div class="form-group d-flex">-->
<!--                                <input type="text" name="coupon">-->
<!--                                <button type="submit" class="cart-black-button">Apply coupon</button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="block">-->
<!--                    <div class="block-header">-->
<!--                        <h6 class="text-uppercase">Instructions for seller</h6>-->
<!--                    </div>-->
<!--                    <div class="block-body">-->
<!--                        <p>If you have some information for the seller you can leave them in the box below</p>-->
<!--                        <form action="#">-->
<!--                            <textarea name="instructions"></textarea>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="col-lg-6">
                <div class="block">
                    <div class="block-header">
                        <h6 class="text-uppercase">Order Summary</h6>
                    </div>
                    <div class="block-body">
                        <p>Standard 5 day shipping costs are calculated.  If you require faster service, please contact us at
                            <a href="">Quotes@OnLineLaserUSA.com</a>.</p>
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>$<?php echo number_format($totalAmount,2); ?></strong></li>
                            <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$<?php echo number_format($shipping, 2); ?></strong></li>
                            <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">$<?php echo number_format($totalAmount+$shipping,2); ?></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center CTAs"><a href="<?php echo base_url('checkout'); ?>" class="btn btn-template btn-lg wide">Proceed to checkout<i class="fa fa-long-arrow-right"></i></a></div>
        </div>
    </div>
</section>