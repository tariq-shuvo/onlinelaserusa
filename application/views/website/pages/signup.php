<!-- Hero Section-->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Register</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Register</li>
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
                        <h5>New account</h5>
                    </div>
                    <div class="block-body">
                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                        <hr>
                        <div class="notification_content" style="font-weight: normal;">
                            <?php echo $this->session->flashdata('notification')==true?$this->session->flashdata('notification'):''; ?>
                        </div>
                        <form action="<?php echo base_url('customer/auth/registration'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input id="fname" name="fname" type="text" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['fname']:''; ?>" required/>
                                        <?php
                                        if($this->session->flashdata('register_validation')){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('register_validation')['fname']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('register_validation')['fname']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input id="lname" name="lname" type="text" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['lname']:''; ?>" required/>
                                        <?php
                                        if($this->session->flashdata('register_validation')){
                                            ?>
                                            <?php
                                            if($this->session->flashdata('register_validation')['lname']!=""){
                                                ?>
                                                <?php echo $this->session->flashdata('register_validation')['lname']; ?>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="<?php echo $this->session->flashdata('form_value')==true?$this->session->flashdata('form_value')['email']:''; ?>" required/>
                                <?php
                                if($this->session->flashdata('register_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('register_validation')['email']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('register_validation')['email']; ?>
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
                                if($this->session->flashdata('register_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('register_validation')['password']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('register_validation')['password']; ?>
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
                                if($this->session->flashdata('register_validation')){
                                    ?>
                                    <?php
                                    if($this->session->flashdata('register_validation')['confirm_password']!=""){
                                        ?>
                                        <?php echo $this->session->flashdata('register_validation')['confirm_password']; ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-template wide"><i class="icon-profile"></i> Register                                    </button>
                            </div>
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>