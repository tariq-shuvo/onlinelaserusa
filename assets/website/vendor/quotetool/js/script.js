var widthRatio, heightRatio, heightValue, widthValue;
function _(el){
    return document.getElementById(el);
}

$("#quoteForm,#fileUploadProcessingBox,#fileUploadBox").click(function(){
    $(this).modal('hide',{backdrop: 'static', keyboard: false});
});

//uploadfile custom quote
$(document).on("click","#uploadFileCustomQuote",function(e){
    e.preventDefault();
    $('#uploadFieldCustomQuote').click();

});

// Select File Event in custom quote
$('#uploadFieldCustomQuote'). change(function(e){
    var fileName = e. target. files[0]. name;
    $("#filenameLink").val(fileName);
});

//Custom quote request
$(document).on("click","#customQuoteRequest", function(e){
    e.preventDefault();
    $("#filenameLink").val("");
    $('#customQuoteForm').modal('show');
    $('#fileUploadBox').modal('hide');
});

$(document).on("click","#instant_quote_back", function(e){
    e.preventDefault();
    $('#fileUploadBox').modal('show');
});

$('#drop_zone').on('click', function(e) {
    var $el = $('#upload_file');
    $el.val("");
});

//Back To Upload
$(document).on("click","#backToUpload",function(e){
    e.preventDefault();
    $('#quoteForm').modal('hide');
    $('#fileUploadBox').modal('show');
});

// File upload by click
function uploadFile(){
    var file = _("upload_file").files[0];
    var ext = file.name.split('.').pop();
    if(ext.toLowerCase().trim()==="dxf"){
        $(".notification").text("");
        var svgContainer = document.getElementById('svg');
        window.requirejs([dxfLibLink], function(dxf) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (e.target.readyState === 2) {
                    var dxfContents = e.target.result;
                    var parsed = dxf.parseString(dxfContents);
                    var svg = dxf.toSVG(parsed);
                    svgContainer.innerHTML = svg;
                }
            };
            reader.readAsBinaryString(file);
            $(".notification").text("");
            $('#fileUploadBox').modal('hide');
            $('#fileUploadProcessingBox').modal('show');
            var formdata = new FormData();
            formdata.append("file_field", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.open("POST", "dxfFileHandler");
            ajax.send(formdata);
        });
    }else{
        $(".notification").text("Your file type is not supported.");
    }

}

// File uploading process handeler function
function progressHandler(event){
    // _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;

    var percent = (event.loaded / event.total) * 100;
    if(percent===100){
        setTimeout(function () {
            $("#fileUploadProcessingBox").modal('toggle');
            $("#quoteForm").modal('show');
        },1000);
    }
    // _("progressBar").style.width = String(Math.round(percent))+"%";
    // _("progressBar").innerHTML = String(Math.round(percent))+"%";
    _("status").innerHTML = "Uploading and calculating properties please wait";
}

// File upload complete call back function
function completeHandler(event){
    setTimeout(function () {
        var widthValue=Math.round(parseFloat($("#dxf_file_width").val())*10000)/10000;
        var heightValue=Math.round(parseFloat($("#dxf_file_height").val())*10000)/10000;
        widthRatio=widthValue/heightValue;
        heightRatio=heightValue/widthValue;
        $("#imageWidth").val(widthValue);
        $("#imageHeight").val(heightValue);
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" IN");
        priceCalculation();

console.log(event.target.responseText);
        $("#dxf_link").val(event.target.responseText);
        var svg_data=$("#svg_data_content").html().trim();

        var svgFile = new Blob([svg_data], {type:"image/svg+xml;charset=utf-8"});

        var fd = new FormData();
        fd.append('fname', 'test.png');
        fd.append('file_field', svgFile);
        $.ajax({
            type: 'POST',
            url: 'dxfFileHandler/saveSVG',
            data: fd,
            processData: false,
            contentType: false,
            success:function (data) {
                console.log(data);
                $("#svg_link").val(data);
            }
        });

    },600);
    _("progressBar").value = 0;
}

// Error handler Function
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}


function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
}

// Drag and drop file uploading function
function handleFileSelect(evt) {
    evt.stopPropagation();
    evt.preventDefault();

    var file = evt.dataTransfer.files[0]; // FileList object.
    var ext = file.name.split('.').pop();
    if(ext.toLowerCase().trim()==="dxf"){
        $(".notification").text("");
        // files is a FileList
        var svgContainer = document.getElementById('svg');
        window.requirejs([dxfLibLink], function(dxf) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (e.target.readyState === 2) {
                    var dxfContents = e.target.result;
                    var parsed = dxf.parseString(dxfContents);
                    var svg = dxf.toSVG(parsed);
                    svgContainer.innerHTML = svg;
                }
            };
            reader.readAsBinaryString(file);
            $(".notification").text("");
            $('#fileUploadBox').modal('hide');
            $('#fileUploadProcessingBox').modal('show');
            var formdata = new FormData();
            formdata.append("file_field", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.open("POST", "dxfFileHandler");
            ajax.send(formdata);
        });
        // of File objects. List some properties.
    }else{
        $(".notification").text("Your file type is not supported.");
    }


}

function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
}

// Ratio Calculation Data
$(document).on('keyup click', '#imageWidth', function () {
    widthValue=parseFloat($(this).val());
    heightValue=Math.round((widthValue*heightRatio)*10000)/10000;
    $("#imageHeight").val(heightValue);
    var unitInMM=$("#cmn-toggle-4").prop('checked')===true?1:0;
    if(unitInMM===1){
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" MM");
    }else{
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" IN");
    }
    $("#totalDimension").val(Math.round(widthValue*heightValue));
    priceCalculation();
});

$(document).on('keyup', '#totalQuantity', function (e) {
    priceCalculation();
});


$(document).on('keyup click', '#imageHeight', function () {
    heightValue=parseFloat($(this).val());
    widthValue=Math.round((heightValue*widthRatio)*10000)/10000;
    $("#imageWidth").val(widthValue);
    var unitInMM=$("#cmn-toggle-4").prop('checked')===true?1:0;
    if(unitInMM===1){
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" MM");
    }else{
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" IN");
    }
    $("#totalDimension").val(Math.round(widthValue*heightValue));
    priceCalculation();
});


document.getElementById('drop_zone').onclick = function() {
    document.getElementById('upload_file').click();
};

// Setup the dnd listeners.
var dropZone = document.getElementById('drop_zone');
dropZone.addEventListener('dragover', handleDragOver, false);
dropZone.addEventListener('drop', handleFileSelect, false);

var thickness={
    aluminum:['0.040in (1.01mm)', '0.050in (1.27mm)', '0.063in (1.6mm)'],
    brass:['.063in (1.6mm)'],
    crt:['.074in (14ga) 1.897mm'],
    hrcs:['.059in (16ga) 1.5mm', '.116in (11ga) 3.02mm'],
    crs:['.036in (20ga) 0.91mm', '.048in (18ga) 1.214mm', '.059in (16ga) 1.5mm', '.074in (14ga) 1.897mm', '.119in (11ga) 3.038mm', '.135in (10ga) 3.429mm'],
    copper:['.063in  (1.6mm)'],
    sst:['.036in (20ga)  .914mm', '.048in (18ga)  1.22mm', '.060in (16ga)  1.5mm', '.074in (14ga) 1.88mm', '.105in (12ga)  2.667mm', '.125in (11ga)  3.175mm']
}

$(document).on('change','#thicknessValue', function () {
    priceCalculation();
});

$(document).on('change','#metalType', function () {
    var optionValue= $(this).find("option:selected").val();
    var selectOptions='';
    for(x in thickness[optionValue]){
        selectOptions+="<option data-function='"+optionValue.toLowerCase()+"_"+x+"' value='"+thickness[optionValue][x]+"'>"+thickness[optionValue][x]+"</option>";
    }
    $("#thicknessValue").html(selectOptions);
    priceCalculation();
});

$(document).on('change', '#cmn-toggle-4', function () {
    var data = $(this).prop('checked')===true?1:0;
    widthValue=parseFloat($("#imageWidth").val());
    heightValue=parseFloat($("#imageHeight").val());
    if(data===1){
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" MM");
    }else{
        $(".dimension_result").text(Math.round(widthValue*heightValue)+" IN");
    }
    $("#totalDimension").val(Math.round(widthValue*heightValue));
    priceCalculation();
});

$('input[name="shipping-type"]').click(function(){
    if($(this).prop("checked") == true){
        $("#unitShippingCost").val(0);
        $(".notice").show();
        $(".price>p").hide();
    }
    else if($(this).prop("checked") == false){
        var shippingCost=parseFloat($("#unitPriceAmount").val())*(18/100);
        $("#unitShippingCost").val(shippingCost.toFixed(2));
        $(".notice").hide();
        $(".price>p").show();
    }
});

function getPrice(widthValue, heightValue, functionName){
    var dimension= widthValue*heightValue;
    var price=window[functionName](dimension);

    if(price===-1){
        $("#imageWidth").css('border', '1px solid red');
        $("#imageHeight").css('border', '1px solid red');
        $(".price").html('<p class="price_calculation_issue">Your dimensions exceed our standard size. Contact us for a custom quote.</p>');
        $(".custom_cart_btn").attr("disabled", "disabled");
    }else{
        var shippingCost=(18/100)*(Math.round(price*100)/100);
        $("#imageWidth").css('border', '1px solid #ced4da');
        $("#imageHeight").css('border', '1px solid #ced4da');
        $(".price").html('<h1>Your Price: $<span>'+(Math.round(price*100)/100)+'</span></h1><p class="form-text text-muted">Shipping cost will be: $'+shippingCost.toFixed(2)+'</p>');
        $("#unitPriceAmount").val((Math.round(price*100)/100));
        $("#unitShippingCost").val(shippingCost.toFixed(2));
        if($("#totalQuantity").val()>0 && $("#totalQuantity").val()<6){
            $(".custom_cart_btn").removeAttr("disabled");
        }else{
            $(".custom_cart_btn").attr("disabled", "disabled");
        }

    }
}

function priceCalculation(){
    var unitInMM=$("#cmn-toggle-4").prop('checked')===true?1:0;
    var functionName = $("#thicknessValue").find("option:selected").data("function");
    // var quantityValue=parseFloat($("#totalQuantity").val());
    widthValue=parseFloat($("#imageWidth").val());
    heightValue=parseFloat($("#imageHeight").val());

    var ranges ={
        aluminum:{
            width: 45,
            height: 45
        },
        brass:{
            width: 24,
            height: 24
        },
        crt:{
            width: 45,
            height: 45
        },
        hrcs:{
            width: 45,
            height: 45
        },
        crs:{
            width: 45,
            height: 45
        },
        copper:{
            width: 24,
            height: 24
        },
        sst:{
            width: 45,
            height: 45
        }
    }
    var metalName = $("#metalType").find("option:selected").val();


    if(unitInMM===1){
        widthValue=widthValue/25.4;
        heightValue=heightValue/25.4;
        if((widthValue>=25.4 && heightValue>=25.4) && (widthValue<=(ranges[metalName]['height']*25.4) && heightValue<=(ranges[metalName]['height']*25.4)))
        {
            getPrice(widthValue, heightValue, functionName);
        }else{
            $("#imageWidth").css('border', '1px solid red');
            $("#imageHeight").css('border', '1px solid red');
            $(".price").html('<p class="price_calculation_issue">To use our auto quote tool, the minimum size is 1" x 1" (25.4mm x 25.4mm) and the maximum size is '+ranges[metalName]['width']+'" x '+ranges[metalName]['height']+'" ('+(ranges[metalName]['width']*25.4).toFixed(2)+'mm x '+(ranges[metalName]['height']*25.4).toFixed(2)+'mm).  Please re-size, or, submit your quote through out manual quote form.</p>');
            $(".custom_cart_btn").attr("disabled", "disabled");
        }
    }else{
        if((widthValue>=1 && heightValue>=1) && (widthValue<=ranges[metalName]['width'] && heightValue<=ranges[metalName]['height']))
        {
            getPrice(widthValue, heightValue, functionName);
        }else{
            $("#imageWidth").css('border', '1px solid red');
            $("#imageHeight").css('border', '1px solid red');
            $(".price").html('<p class="price_calculation_issue">To use our auto quote tool, the minimum size is 1" x 1" (25.4mm x 25.4mm) and the maximum size is '+ranges[metalName]['width']+'" x '+ranges[metalName]['height']+'" ('+(ranges[metalName]['width']*25.4).toFixed(2)+'mm x '+(ranges[metalName]['height']*25.4).toFixed(2)+'mm).  Please re-size, or, submit your quote through out manual quote form.</p>');
            $(".custom_cart_btn").attr("disabled", "disabled");
        }
    }



}

// Disable enter button
$('#quoteForm form').keypress(function(e){
    if ( e.which == 13 ) return false;
});