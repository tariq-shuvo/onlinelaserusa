<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Reset</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Login</li>
                    <li class="breadcrumb-item active">Reset</li>
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
                        <h5>Reset Password</h5>
                    </div>
                    <div class="block-body">
<!--                        <p class="lead">Please set your new password here!</p>-->
<!--                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>-->
<!--                        <hr>-->
                        <div class="notification_content" style="font-weight: normal;">
                            <?php echo $this->session->flashdata('notification')==true?$this->session->flashdata('notification'):''; ?>
                        </div>
                        <form action="<?php echo base_url('customer/auth/reset'); ?>" method="post">
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
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input id="confirm_password" name="confirm_password" type="password" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['confirm_password']:''; ?>" required/>
                                <?php
                                if($this->session->flashdata('reset_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('reset_validation')['confirm_password']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('reset_validation')['confirm_password']; ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-template wide"><i class="fa fa-key"></i> Set your new password</button>
                            </div>
                            <input type="hidden" name="reset_code" value="<?php echo $reset_code; ?>">
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>