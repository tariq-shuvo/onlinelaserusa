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

<?php
$firstname="";
$lastname="";
$email="";
$id="";
if(count($customer_data)>0){
    foreach ($customer_data as $customer){
        $firstname=$customer['first_name'];
        $lastname=$customer['last_name'];
        $email=$customer['email'];
        $id=$customer['id'];
    }
}
?>
<!-- Checkout Forms-->
<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active">Address</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                </ul>
                <div class="tab-content">
                    <div id="address" class="active tab-block">
                        <form action="<?php echo base_url('checkout/placeorder/address'); ?>" id="address" method="post">
                            <!-- Invoice Address-->
                            <div class="block-header mb-5">
                                <h6>Invoice address                    </h6>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname" class="form-label">First Name*</label>
                                    <input id="firstname" type="text" name="first-name" placeholder="Enter you first name" value="<?php echo $firstname; ?>" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                                <?php
                                                    if($this->session->flashdata('address_errors')['first-name']!=""){
                                                ?>
                                                    <?php echo $this->session->flashdata('address_errors')['first-name']; ?>
                                                <?php
                                                    }
                                                ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname" class="form-label">Last Name*</label>
                                    <input id="lastname" type="text" name="last-name" placeholder="Enter your last name" value="<?php echo $lastname; ?>" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['last-name']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['last-name']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Email Address*</label>
                                    <input id="email" type="email" name="email" placeholder="enter your email address" value="<?php echo $email; ?>" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['email']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['email']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street" class="form-label">Street*</label>
                                    <input id="street" type="text" name="address" placeholder="Your street name" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['address']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['address']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="city" class="form-label">City*</label>
                                    <input id="city" type="text" name="city" placeholder="Your city" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['city']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['city']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="zip" class="form-label">ZIP*</label>
                                    <input id="zip" type="text" name="zip" placeholder="ZIP code" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['zip']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['zip']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="state" class="form-label">State*</label>
                                    <input id="state" type="text" name="state" placeholder="Your state" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['state']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['state']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="country" class="form-label">Country*</label>
                                    <input id="country" type="text" name="country" placeholder="Your country" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['country']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['country']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone-number" class="form-label">Phone Number*</label>
                                    <input id="phone-number" type="tel" name="phone-number" placeholder="Your phone number" class="form-control">
                                    <?php
                                    if($this->session->flashdata('address_errors')){
                                        ?>
                                        <?php
                                        if($this->session->flashdata('address_errors')['phone-number']!=""){
                                            ?>
                                            <?php echo $this->session->flashdata('address_errors')['phone-number']; ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company" class="form-label">Company</label>
                                    <input id="company" type="text" name="company" placeholder="Your company name(optional)" class="form-control">
                                </div>
                                <div class="form-group col-12 mt-3 ml-3">
                                    <input id="another-address" name="another-address" type="checkbox" class="checkbox-template" <?php echo $this->session->flashdata('another-address')==1?"checked":""; ?>>
                                    <label for="another-address" data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="shippingAddress">Use different shipping address</label>
                                </div>
                            </div>
                            <!-- /Invoice Address-->
                            <!-- Shippping Address-->
                            <div id="shippingAddress" aria-expanded="false" class="collapse <?php echo $this->session->flashdata('another-address')==1?"show":""; ?>">
                                <div class="block-header mb-5 mt-3">
                                    <h6>Shipping address</h6>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="shipping_firstname" class="form-label">First Name</label>
                                        <input id="shipping_firstname" type="text" name="shipping_first-name" placeholder="Enter you first name" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_first-name']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_first-name']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shipping_lastname" class="form-label">Last Name</label>
                                        <input id="lshipping_astname" type="text" name="shipping_last-name" placeholder="Enter your last name" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_last-name']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_last-name']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shipping_email" class="form-label">Email Address</label>
                                        <input id="shipping_email" type="email" name="shipping_email" placeholder="enter your email address" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_email']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_email']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shipping_street" class="form-label">Street</label>
                                        <input id="shipping_street" type="text" name="shipping_address" placeholder="Your street name" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_address']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_address']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="shipping_city" class="form-label">City</label>
                                        <input id="shipping_city" type="text" name="shipping_city" placeholder="Your city" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_city']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_city']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="shipping_zip" class="form-label">ZIP</label>
                                        <input id="shipping_zip" type="text" name="shipping_zip" placeholder="ZIP code" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_zip']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_zip']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="shipping_state" class="form-label">State</label>
                                        <input id="shipping_state" type="text" name="shipping_state" placeholder="Your state" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_state']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_state']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="shipping_country" class="form-label">Country</label>
                                        <input id="shipping_country" type="text" name="shipping_country" placeholder="Your country" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_country']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_country']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shipping_phone-number" class="form-label">Phone Number</label>
                                        <input id="shipping_phone-number" type="tel" name="shipping_phone-number" placeholder="Your phone number" class="form-control">
                                        <?php
                                        if($this->session->flashdata('another-address')==1){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('address_errors')['shipping_phone-number']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('address_errors')['shipping_phone-number']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shipping_company" class="form-label">Company</label>
                                        <input id="shipping_company" type="text" name="shipping_company" placeholder="Your company name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- /Shipping Address-->
                            <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="<?php echo base_url('cart'); ?>" class="btn btn-template-outlined wide prev"> <i class="fa fa-angle-left"></i>Back to basket</a><button type="submit" class="btn btn-template wide next" id="next_button_checkout">Next<i class="fa fa-angle-right"></i></button></div>
                        </form>
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
                        <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$<?php echo number_format($shipping, 2); ?></strong></li>
                        <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">$<?php echo number_format($totalAmount+$shipping,2);?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>