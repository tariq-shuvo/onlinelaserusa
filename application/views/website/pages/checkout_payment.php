<script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
<script type="text/javascript">
    window.applicationId = "<?php echo $squareup['appID']; ?>";
    window.locationId = "<?php echo $squareup['location']; ?>";
</script>

<!-- link to the local SqPaymentForm initialization -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/square/connect-api-examples/templates/web-ui/payment-form/custom/sq-payment-form.js"></script>
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
<!-- Checkout Forms-->
<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="<?php echo base_url(''); ?>" class="nav-link">Address</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    <li class="nav-item"><a href="<?php echo base_url(''); ?>" class="nav-link active">Payment Method </a></li>
                </ul>
                <div class="tab-content">
                    <div id="payment-method" class="tab-block">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div id="headingOne" role="tab" class="card-header">
                                    <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Credit Card</a></h6>
                                </div>
                                <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="collapse show">
                                    <div class="card-body">
                                        <input type="radio" name="shippping" data-id="sq-creditcard" id="payment-method-0" class="radio-template" checked>
                                        <label for="payment-method-0">Card Payment</label>
                                        <form action="<?php echo base_url('squareup/payment/checkout'); ?>" novalidate id="nonce-form" method="post">
                                            <div class="row">
                                                <div class="form-group sq-field col-md-12">
                                                    <label for="card-number" class="form-label sq-label">Card Number</label>
                                                    <div id="sq-card-number"></div>
                                                </div>
                                                <div class="form-group sq-field col-md-4">
                                                    <label for="expiry-date" class="form-label sq-label">Expiration Date</label>
                                                    <div id="sq-expiration-date"></div>
                                                </div>
                                                <div class="form-group sq-field col-md-4">
                                                    <label for="cvv" class="form-label sq-label">CVC/CVV</label>
                                                    <div id="sq-cvv"></div>
                                                </div>
                                                <div class="form-group sq-field col-md-4">
                                                    <label for="zip" class="form-label sq-label">ZIP</label>
                                                    <div id="sq-postal-code"></div>
                                                </div>
                                                <div class="sq-field" style="padding: 0px 15px;margin-bottom: 0px;">
                                                    <button id="sq-creditcard" class="btn btn-template wide next btn-block payment-method-btn" onclick="requestCardNonce(event)">
                                                        Pay With Card
                                                    </button>
                                                </div>
                                                <div id="error"></div>
                                                <input type="hidden" id="card-nonce" name="nonce">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingTwo" role="tab" class="card-header">
                                    <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">Paypal</a></h6>
                                </div>
                                <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="collapse show">
                                    <div class="card-body">
                                        <input type="radio" data-id="next_button_checkout" name="shippping" id="payment-method-1" class="radio-template">
                                        <label for="payment-method-1">Paypal</label>
                                        <br/>
                                        <br/>
                                        <a style="width: 100%" href="<?php echo base_url('checkout/placeorder/payment'); ?>"><button id="next_button_checkout" class="btn btn-template wide btn-block payment-method-btn" disabled>Pay With Paypal</button></a>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="card">-->
<!--                                <div id="headingThree" role="tab" class="card-header">-->
<!--                                    <h6><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">Pay on delivery</a></h6>-->
<!--                                </div>-->
<!--                                <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="collapse">-->
<!--                                    <div class="card-body">-->
<!--                                        <input type="radio" name="shippping" id="payment-method-2" class="radio-template">-->
<!--                                        <label for="payment-method-2"><strong>Pay on Delivery</strong><br><span class="label-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <div class="CTAs d-flex justify-content-between flex-column flex-lg-row">
                            <a href="<?php echo base_url('checkout/review'); ?>" class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to review</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="block-body order-summary">
                    <h6 class="text-uppercase">Order Summary</h6>
                    <p>Shipping and additional costs are calculated based on values you have entered</p>
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
                        <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$<?php echo number_format($shipping,2);?></strong></li>
                        <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">$<?php echo number_format($totalAmount+$shipping,2);?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>