<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Contact Us</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main class="contact-page">
    <!-- Contact page-->
    <section class="contact">
        <div class="container">
            <!--            <header>-->
            <!--                <p class="lead">-->
            <!--                    Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built party world. Of so am-->
            <!--                    he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.-->
            <!--                </p>-->
            <!--            </header>-->
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-icon">
                        <div class="icon icon-street-map"></div>
                    </div>
                    <h3>Address</h3>
                    <p>OnLine Laser is owned by Pierro LLC,
                        Lakewood, Colorado, <strong>USA</strong></p>
                </div>
                <div class="col-md-4">
                    <div class="contact-icon">
                        <div class="icon icon-support"></div>
                    </div>
                    <h3>Call center</h3>
                    <!--                    <p>This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>-->
                    <p><strong>+1 714 732 3190</strong></p>
                </div>
                <div class="col-md-4">
                    <div class="contact-icon">
                        <div class="icon icon-envelope"></div>
                    </div>
                    <h3>Electronic support</h3>
                    <!--                    <p>Please feel free to write an email to us or to use our electronic ticketing system.</p>-->
                    <ul class="list-style-none">
                        <li><strong><a href="mailto:support@onlinelaserusa.com">support@onlinelaserusa.com</a></strong></li>
                        <li><strong><a href="mailto:quotes@onlinelaserusa.com">quotes@onlinelaserusa.com</a></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="mb-5">
                <h2 class="heading-line">Contact form</h2>
            </header>
            <div class="row">
                <div class="col-md-7">
                    <div class="notification_content" style="font-weight: normal;">
                        <?php echo $this->session->flashdata('notification')==true?$this->session->flashdata('notification'):''; ?>
                    </div>
                    <form id="contact-form" method="post" action="<?php echo base_url('user/contact'); ?>" class="custom-form form">
                        <div class="controls">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Your firstname *</label>
                                        <input type="text" name="name" id="name" placeholder="Enter your firstname" required="required" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">Your lastname *</label>
                                        <input type="text" name="surname" id="surname" placeholder="Enter your  lastname" required="required" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Your email *</label>
                                <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label">Your message for us *</label>
                                <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required" class="form-control"></textarea>
                            </div>
                            <input type="hidden" value="<?php echo $token; ?>" name="token">
                            <button type="submit" class="btn btn-template">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>