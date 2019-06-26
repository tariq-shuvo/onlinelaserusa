<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Login</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
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
                        <h5>Login</h5>
                    </div>
                    <div class="block-body">
                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <hr>
                        <div class="notification_content" style="font-weight: normal;">
                            <?php echo $this->session->flashdata('notification')==true?$this->session->flashdata('notification'):''; ?>
                        </div>
                        <form action="<?php echo base_url('customer/auth/login'); ?>" method="post">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['email']:''; ?>" required/>
                                <?php
                                if($this->session->flashdata('reset_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('reset_validation')['password']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('reset_validation')['password']; ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['password']:''; ?>" required/>
                                <?php
                                if($this->session->flashdata('reset_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('reset_validation')['password']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('reset_validation')['password']; ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                           <div class="form-group">
                               <p class="float-right forgot-pass-link"><a href="<?php echo base_url('user/forgot'); ?>">Forgot your password?</a></p>
                               <br/>
                           </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-template wide"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                            <div class="">
                                <p class="text-center create-account-link">If you don't have any account please <a href="<?php echo base_url('user/registration'); ?>">register now</a>.</p>
                            </div>
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>