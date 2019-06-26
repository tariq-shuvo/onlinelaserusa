
<!-- Your File Upload Modal -->
<div class="modal fade" id="fileUploadBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload your file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="notification">

                </div>
                <div class="uploadFileSection" id="drop_zone">
                    <p>
                        Drag & Drop Your DXF Files
                    </p>
                    <input type="file" name="upload_file" id="upload_file" style="display: none" onchange="uploadFile()"/>
                </div>
                <div class="notice" style="font-size: 12px;
text-align: center;
color: red;
margin-top: 10px;">
                    <p>Note: We'll call or email you with completion date and pick-up information.</p>
                </div>
                <div class="backToUpload text-center">
                    <button class="btn btn-template-outlined wide" id="customQuoteRequest" data-toggle="modal" data-target="#customQuoteForm">Custom Quote Request Form</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Upload Processing Modal -->
<div class="modal fade" id="fileUploadProcessingBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">File upload on processing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="all_file_info">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar" style="width: 100%"></div>

                    <!--<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>-->
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Processing Form -->
<div class="modal fade" id="quoteForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quote Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-md-12">
                    <?php
                       $digits=3;
                       $product_id=time().rand(pow(10, $digits-1), pow(10, $digits)-1).rand(pow(10, $digits-1), pow(10, $digits)-1);
                    ?>
                    <form action="<?php echo base_url('cart/add'); ?>" method="post">
                    <div class="row">
                        <input type="hidden" name="dxf_link" id="dxf_link" value="">
                        <input type="hidden" name="svg_link" id="svg_link" value="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="part_number" class="quote_label text-center">Product no. <?php echo $product_id; ?></label>
                                <input type="hidden" value="<?php echo $product_id; ?>" id="productID" name="productID">
                            </div>
                            <div class="form-group">
                                <label for="totalQuantity"  class="quote_label">PART NUMBER:</label>
                                <input type="text" class="form-control" name="partNumber" id="partNumber" aria-describedby="partNumber" placeholder="Part Number">
                            </div>
                            <div class="form-group">
                                <label for="metalType" class="quote_label">METAL:</label>
                                <select class="form-control" name="metalType" id="metalType">
                                    <option data-function="aluminum_0" value="aluminum">Aluminum</option>
                                    <option data-function="brass_0" value="brass">Brass</option>
                                    <option data-function="crt_0" value="crt">Cor-Ten</option>
                                    <option data-function="hrcs_0" value="hrcs">Hot Rolled Carbon Steel</option>
                                    <option data-function="crs_0" value="crs">Cold Rolled Carbon Steel</option>
<!--                                    <option data-function="copper_0" value="copper">Copper</option>-->
                                    <option data-function="sst_0" value="sst">Stainless Steel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thicknessValue" class="quote_label">THICKNESS:</label>
                                <select class="form-control" name="thicknessValue" id="thicknessValue">
                                    <option data-function="aluminum_0" value='0.050in (1.27mm)'>0.050in (1.27mm)</option>
                                    <option data-function="aluminum_1" value='0.063in (1.6mm)'>0.063in (1.6mm)</option>
                                    <option data-function="aluminum_2" value='0.125in (3.175mm)'>0.125in (3.175mm)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imageWidth" class="quote_label">DIMENSIONS:</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="number" class="form-control" min="1" name="imageWidth" aria-describedby="imageWidth" id="imageWidth" step="0.0001" placeholder="Height" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="multiplication_symbol">
                                                X
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="number" class="form-control" min="1" name="imageHeight" aria-describedby="imageHeight" id="imageHeight" step="0.0001" placeholder="Width" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="notification">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3 class="uniteTitle">IN</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="switch">
                                                    <input id="cmn-toggle-4" name="unitType" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                                                    <label for="cmn-toggle-4"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="uniteTitle">MM</h3>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="resultDimension">-->
<!--                                            Total Dimension is = <span class="dimension_result">42 inc</span>-->
<!--                                            <input type="hidden" name="totalDimension" id="totalDimension" value="" required>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="totalQuantity"  class="quote_label">QUANTITY:</label>
                                <input type="number" value="1" class="form-control" name="totalQuantity" id="totalQuantity" min="1" max="5" aria-describedby="totalQuantity" placeholder="Quantity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="image_container">
                                <!--<img src="" class="img-fluid" alt="">-->
                                <div id="svg"></div>
                            </div>
                            <div class="additional_notes">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="additionalNote" name="additionalNote" aria-describedby="additionalNote" placeholder="Additional notes">
                                    <small id="noteHelp" class="form-text text-muted">Please write something if you have any additional notes.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="price text-center">
                                <h1>Your Price: $<span></span></h1>
                            </div>
                            <div class="addCartButton text-center">
                                <input type="hidden" name="unitPriceAmount" id="unitPriceAmount" value="">
                                <input type="hidden" name="unitShippingCost" id="unitShippingCost" value="">
<!--                                <div class="form-group">-->
<!--                                    <input id="shipping-type" name="shipping-type" type="checkbox" class="checkbox-template">-->
<!--                                    <label for="shipping-type">I will pick up my ordered product.</label>-->
<!--                                </div>-->
                                <div class="notice" style="color: #FF6A00;font-size: 14px;display: none;margin-bottom: 10px"><strong>Notice:</strong> When your order will be completed we will contact with your over phone and email for pick up your products.</div>
                                <button type="submit" class="btn btn-primary custom_cart_btn">Add To Cart</button>
                            </div>
                            <div class="backToUpload text-center">
                                <button class="btn btn-template-outlined wide" id="customQuoteRequest" data-dismiss="modal">Custom Quote Request Form</button>
                                <button class="btn btn-template-outlined wide" id="backToUpload" data-dismiss="modal">back to upload</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Processing Form -->
<div class="modal fade" id="customQuoteForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Custom Quote Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="subtitle">
                                Looking for a size larger than we have listed? Do you require higher quantities that deserve qty discounts? Fill out the form below and we'll send a quote back to you as quickly as we can.
                            </p>
                        </div>
                    </div>
                    <form action="<?php echo base_url('user/custom_quote'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="file" name="uploadFieldCustomQuote" style="display: none" id="uploadFieldCustomQuote">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="uploadFileCustomQuote">UPLOAD FILE</span>
                                    </div>
                                    <input type="text" class="form-control" id="filenameLink" aria-label="Default" placeholder="AI, SVG, DWG or DXF File" aria-describedby="uploadFileDetails" disabled required/>

                                </div>
                                <span id="uploadFileNotification" style="color: red;font-size: 12px;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="metalTypeCustomQuote" class="quote_label">METAL:</label>
                                    <select class="form-control" name="metalTypeCustomQuote" id="metalTypeCustomQuote">
                                        <option value="Aluminum">Aluminum</option>
                                        <option value="Brass">Brass</option>
                                        <option value="Cor-Ten">Cor-Ten</option>
                                        <option value="Hot Rolled Carbon Steel">Hot Rolled Carbon Steel</option>
                                        <option value="Cold Rolled Carbon Steel">Cold Rolled Carbon Steel</option>
<!--                                        <option value="Copper">Copper</option>-->
                                        <option value="Stainless Steel">Stainless Steel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="overallAreaCustomQuote"  class="quote_label">OVERALL AREA(L X W MM):</label>
                                        <input type="text" value="" class="form-control" id="overallAreaCustomQuote" name="overallAreaCustomQuote" aria-describedby="overallAreaCustomQuote" placeholder="Overall Area(L X W)" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="firstNameCustomQuote"  class="quote_label">FIRST NAME:</label>
                                        <input type="text" value="" class="form-control" id="firstNameCustomQuote" name="firstNameCustomQuote" aria-describedby="firstNameCustomQuote" placeholder="First Name" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="totalQuantityCustomQuote"  class="quote_label">QUANTITY:</label>
                                    <input type="number" value="1" class="form-control" id="totalQuantityCustomQuote" name="totalQuantityCustomQuote" min="1" aria-describedby="totalQuantity" placeholder="Quantity" required/>
                                </div>
                                <div class="form-group">
                                    <label for="thicknessCustomQuote"  class="quote_label">THICKNESS(INC):</label>
                                    <input type="text" value="" class="form-control" id="thicknessCustomQuote" name="thicknessCustomQuote" aria-describedby="thicknessCustomQuote" placeholder="Thickness" required/>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="lastNameCustomQuote"  class="quote_label">LAST NAME:</label>
                                        <input type="text" value="" class="form-control" id="lastNameCustomQuote" name="lastNameCustomQuote" aria-describedby="lastNameCustomQuote" placeholder="Last Name" required/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="emailCustomQuoteRequest"  class="quote_label">EMAIL:</label>
                                        <input type="email" value="" class="form-control" id="emailCustomQuoteRequest" name="emailCustomQuoteRequest" aria-describedby="emailCustomQuoteRequest" placeholder="Email" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="instructionsCustomQuote"  class="quote_label">ADDITIONAL INSTRUCTIONS/COMMENTS:</label>
                                        <textarea class="form-control" id="instructionsCustomQuote" name="additional_comments" aria-describedby="instructionsCustomQuote" placeholder="Additiontal Instructions/Comments"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="addCartButton text-center">
                                    <input type="hidden" value="<?php echo $token; ?>" name="token">
                                    <button type="submit" class="btn btn-primary btn-block custom_cart_btn custom_request">Request Quote</button>
                                    <a style="border:1px solid gray;" id="instant_quote_back" class="btn btn-outline-light px-4 shop-now" data-dismiss="modal">Instant quote<i class="icon-bag"> </i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>