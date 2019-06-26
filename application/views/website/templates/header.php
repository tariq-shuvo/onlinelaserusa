<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">

    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?php echo $style; ?>">
    <?php endforeach; ?>

    <link rel="shortcut icon" href="<?php echo base_url('assets/website/images/favicon.ico'); ?>">
    <!-- Modernizr-->
    <script src="<?php echo base_url('assets/website/js/modernizr.custom.79639.js'); ?>"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="subscription_notification">
    <?php echo $this->session->flashdata('subscription_notification')==true?$this->session->flashdata('subscription_notification'):''; ?>
</div>
<!-- navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <form action="#">
                    <div class="form-group">
                        <input type="search" name="search" id="search" placeholder="What are you looking for?">
                        <button type="submit" class="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Navbar Header  --><a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url('assets/website/images/logo.png'); ?>" alt="..."></a>
            <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            <!-- Navbar Collapse -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li><a href="<?php echo base_url(); ?>" class="nav-link <?php echo $active=="home"?"active":""; ?>">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link dropdown-toggle <?php echo $active=="capabilities"?"active":""; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Capabilities</a>
                        <div class="dropdown-menu common_dropdown">
                            <a class="dropdown-item" href="<?php echo base_url('capabilities'); ?>">Metal Laser Cutting</a>
                            <a class="dropdown-item" href="<?php echo base_url('capabilities/high-speed-laser-blanking'); ?>">High Speed Laser Blanking</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="<?php echo base_url('design-guidelines'); ?>" class="nav-link <?php echo $active=="guidelines"?"active":""; ?>">Design Guidelines </a>
                    </li>
                    <li class="nav-item"><a href="<?php echo base_url('videos'); ?>" class="nav-link <?php echo $active=="videos"?"active":""; ?>">Videos</a></li>
                    <li class="nav-item"><a href="<?php echo base_url('quote'); ?>" class="nav-link <?php echo $active=="quote"?"active":""; ?>">Get a quote</a></li>
<!--                    <li class="nav-item"><a href="--><?php //echo base_url('blog'); ?><!--" class="nav-link --><?php //echo $active=="blog"?"active":""; ?><!--">Blog</a></li>-->
                    <li class="nav-item"><a href="<?php echo base_url('contact'); ?>" class="nav-link <?php echo $active=="contact"?"active":""; ?>">Contact</a></li>
                </ul>
                <div class="right-col d-flex align-items-lg-center flex-column flex-lg-row">
                    <!-- Search Button-->
                    <div class="search"><i class="icon-search"></i></div>
                    <!-- User Not Logged - link to login page-->
                    <div class="user">
                        <a id="userdetails" href="<?php echo base_url('user/login'); ?>"

                           <?php if(count($customer_data)>0){?>
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"
                           <?php } ?>

                           class="user-link <?php echo $active=="user"?"active":""; ?>"><i class="icon-profile"></i></a>
                        <?php if(count($customer_data)>0){?>
                        <div class="dropdown-menu" id="user-menu">
                            <a class="dropdown-item" href="<?php echo base_url('customer/auth/logout'); ?>">Logout</a>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Cart Dropdown-->
                    <div class="cart dropdown show"><a id="cartdetails" href="https://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle <?php echo $active=="cart"?"active":""; ?>"><i class="icon-cart"></i>

                            <?php if($cart_product_num>0) {?>
                            <div class="cart-no"><?php echo $cart_product_num; ?></div>
                            <?php } ?>
                        </a><a href="<?php echo base_url('cart'); ?>" class="text-primary view-cart">View Cart</a>
                        <?php if(count($all_cart_products)>0){ ?>
                        <div aria-labelledby="cartdetails" class="dropdown-menu">
                            <!-- cart item-->
                            <?php
                            $totalAmount=0;
                                foreach ($all_cart_products as $cart_product){
                            ?>
                            <div class="dropdown-item cart-product">
                                <div class="d-flex align-items-center">
                                    <div class="img"><img src="<?php echo $cart_product['options']['svgLink']; ?>" alt="Product image" class="img-fluid"></div>
                                    <div class="details d-flex justify-content-between">
                                        <div class="text"> <a href="#"><strong><?php echo $cart_product['name'] ?> <br> <?php echo $cart_product['options']['thicknessValue']; ?></strong></a><small>Quantity: <?php echo $cart_product['qty']; ?> </small><span class="price">$<?php echo number_format($cart_product['price'],2); ?> </span></div><a href="<?php echo base_url('cart/delete/'.$cart_product['rowid']); ?>" class="delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    $totalAmount+=$cart_product['subtotal'];
                                }
                            ?>
                            <!-- total price-->
                            <div class="dropdown-item total-price d-flex justify-content-between"><span>Total</span><strong class="text-primary">$<?php echo number_format($totalAmount,2); ?></strong></div>
                            <!-- call to actions-->
                            <div class="dropdown-item CTA d-flex"><a href="<?php echo base_url('cart'); ?>" class="btn btn-template wide">View Cart</a><a href="<?php echo base_url('checkout'); ?>" class="btn btn-template wide">Checkout</a></div>

                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>