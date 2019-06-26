<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <h1>Quote</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
                <ul class="breadcrumb justify-content-lg-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Quote</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main class="contact-page">
    <!-- Contact page-->
    <section class="contact">
        <div class="container">
            <header>
                <h1 class="text-center">Instant Online Laser Cutting Quote</h1>
                <br/>
                <p class="lead">
                    No more waiting days for a quote and weeks for parts. Get an instant online laser cutting quote now.
                </p>
                <div class="instantQuoteToolContent text-center">
                    <button class="btn btn-template wide big-btn" data-toggle="modal" data-target="#fileUploadBox">Instant Quote</button>
                </div>
                <p class="lead">Instant online laser cutting quote guidelines</p>
                <ul class="list-style-none">
                    <li>Minimum size 1" x 1"</li>
                    <li>Max part size: steel, stainless steel, aluminim 45" x 45" (1143 mm x 1143 mm)</li>
                    <li>Max part size copper and brass 24" x 24" (609 mm x 609 mm)</li>
                    <li>Max qty: 5 (For quantities larger than 5, please use our <a data-toggle="modal" data-target="#customQuoteForm" style="color: #FF6A00;cursor: pointer">custom quote form</a>)</li>
                    <li>DXF file required. <a class="link-url" href="<?php echo base_url('design-guidelines'); ?>">See design guidelines for help</a></li>
                    <li>File is 2D vector format; 1:1 scale</li>
                    <li>No empty objects or stray points</li>
                    <li>All text has been converted to path</li>
                    <li>All reversed text has bridges</li>
                    <li>All shapes have been combined</li>
                    <li>No shapes contain open contours</li>
                    <li>All objects are on the same layer</li>
                    <li>No features or detail smaller than 0.02" (1.5x material thickness as a rule of thumb)</li>
                    <li>No cutouts less than 1.5x material thickness</li>
                </ul>

                <p class="lead">
                    If you require more than 5 pcs, if you require materials that are not included in our list of options, or if you require parts larger than our maximum size for online quotes, please use our <button class="btn-link" data-toggle="modal" data-target="#customQuoteForm">custom quote request form</button> and we will respond with a quote as fast as we can.
                </p>
            </header>
        </div>
    </section>
</main>
