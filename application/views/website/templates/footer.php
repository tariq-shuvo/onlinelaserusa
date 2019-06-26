<div id="scrollTop"><i class="fa fa-long-arrow-up"></i></div>
<!-- Footer-->
<footer class="main-footer">
    <!-- Main Block -->
    <div class="main-block">
        <div class="container">
            <div class="row">
                <div class="info col-lg-4">
                    <div class="logo"><img src="<?php echo base_url('assets/website/images/footer_logo.png'); ?>" alt="Logo"></div>
                    <p>Follow us on social media</p>
                    <ul class="social-menu list-inline">
                        <li class="list-inline-item"><a href="https://www.facebook.com/OnLineLaserUSA/" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/onlinelaserusa/" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/online-laser-usa" target="_blank" title="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCcbxbVdn6Nyl2qv_Te2D54Q" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="site-links col-lg-2 col-md-6">
                    <h5 class="text-uppercase">Main Menu</h5>
                    <ul class="list-unstyled">
                        <li> <a href="<?php echo base_url(); ?>">Home</a></li>
                        <li> <a href="<?php echo base_url('capabilities'); ?>">Capability</a></li>
                        <li> <a href="<?php echo base_url('design-guidelines'); ?>">Design Guidelines</a></li>
                        <li> <a href="<?php echo base_url('videos'); ?>">Videos</a></li>
                        <li> <a href="<?php echo base_url('quote'); ?>">Get a Quote</a></li>
<!--                        <li> <a href="--><?php //echo base_url('blog'); ?><!--">Blog</a></li>-->
                        <li> <a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                    </ul>
                </div>
                <div class="site-links col-lg-2 col-md-6">
                    <h5 class="text-uppercase">Footer Menu</h5>
                    <ul class="list-unstyled">
                        <li> <a href="<?php echo base_url('metals'); ?>">Metals</a></li>
                        <li> <a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
                        <li> <a href="<?php echo base_url('terms-service'); ?>">Terms Of Service</a></li>
                        <li> <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="newsletter col-lg-4">
                    <h5 class="text-uppercase">Sign Up</h5>
                    <p> Join our mailing list to receive updates, coupons, and more.</p>
                    <form action="<?php echo base_url('user/subscription'); ?>" id="newsletter-form" method="post">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                            <input type="email" name="subscribermail" placeholder="Your Email Address" required/>
                            <button type="submit"> <i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="text col-md-6">
                    <p>&copy; <?php echo date("Y"); ?> <a href="https://onlinelaserusa.com">onlinelaserusa.com</a> All rights reserved.</p>
                </div>
                <div class="payment col-md-6 clearfix">
                    <ul class="payment-list list-inline-item pull-right">
                        <li class="list-inline-item"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-4-1/img/visa.svg" alt="..."></li>
                        <li class="list-inline-item"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-4-1/img/mastercard.svg" alt="..."></li>
                        <li class="list-inline-item"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-4-1/img/paypal.svg" alt="..."></li>
                        <li class="list-inline-item"><img src="https://d19m59y37dris4.cloudfront.net/hub/1-4-1/img/western-union.svg" alt="..."></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    var dxfLibLink="<?php echo base_url('assets/website/vendor/quotetool/lib/dxf.js'); ?>";
</script>
<!-- JavaScript files-->
<?php foreach ($scripts as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
<!-- Main Template File-->
</body>
</html>