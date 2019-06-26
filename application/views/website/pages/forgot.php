<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Forgot</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Login</li>
                    <li class="breadcrumb-item active">Forgot</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- text page-->
<section class="padding-small">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="block">
                    <div class="block-header">
                        <h5>Forgot Password</h5>
                    </div>
                    <div class="block-body">
<!--                        <p class="lead">Fill up your email address to reset your password!</p>-->
<!--                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>-->
<!--                        <hr>-->
                        <div class="notification_content" style="font-weight: normal;">
                            <?php echo $this->session->flashdata('notification')==true?$this->session->flashdata('notification'):''; ?>
                        </div>
                        <form action="<?php echo base_url('customer/auth/forgot'); ?>" method="post">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="text" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['email']:''; ?>" required/>
                                <?php
                                if($this->session->flashdata('forgot_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('forgot_validation')['email']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('forgot_validation')['email']; ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-template wide"><i class="fa fa-envelope"></i> Send password reset link</button>
                            </div>
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>