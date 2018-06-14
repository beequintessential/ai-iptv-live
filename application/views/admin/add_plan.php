<section class="content-header">
    <h1>Add Plan</h1>
</section>
<?php
$globalMsg = $this->session->flashdata('globalMsg');
if ($globalMsg !== NULL) {
    ?>
    <div class="box-body">
        <div class="alert alert-<?php echo $globalMsg['type']; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $globalMsg['msg']; ?>
        </div>
    </div>
<?php } ?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Plan</h3>
                </div>
                <form role="form" id="dataForm" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="event_title">Plan Title</label>
                            <input type="text"  name="plan_title" class="form-control" placeholder="Plan Title">
                            <span id="dataForm_plan_title_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Plan Duration</label>
                            <select class="form-control" name="plan_duration">
                                <option value="" >Select Plan Duration</option>
                                <option value="1 Month" >1 Month</option>
                                <option value="3 Month" >3 Month</option>
                                <option value="6 Month" >6 Month</option>
                                <option value="1 Year" >1 Year</option>
                            </select>
                            <span id="dataForm_plan_duration_errorloc" class="error_strings text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="plan_price">Plan Price</label>
                            <input type="text" name="plan_price" class="form-control" placeholder="Plan Price">
                            <span id="dataForm_plan_price_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="Enabled">Enabled</option>
                                <option value="Disabled">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $('.datepicker').datepicker({
        autoclose: true
    });
    
    function readURL(input) {

        if (input.files && input.files[0]) {
        var ar_ext = ['png','jpg','jpeg','JPG'];
        var name = input.value;
        var ar_name = name.split('.');
        
        var len = (ar_name.length)-1;
        var extension = ar_name[len];
       // var ar_nm = ar_name[0].split('\\');
        var re = 0;
        
        var reader = new FileReader();
        for(var i=0; i<ar_ext.length; i++) {
            if(ar_ext[i] == extension) {
            re = 1;
            break;
            }
        }
        if(re==1) {
            reader.onload = function(e) {
            $('#img-upload').show();
            $('#img-upload').attr('src', e.target.result);
            $('#dataForm_event_image_errorloc').html("");
            $('#submit').removeAttr( "disabled");
        }
        reader.readAsDataURL(input.files[0]);
        } else{
                //console.log("incorrect format");
                $('#img-upload').hide();
                $('#dataForm_event_image_errorloc').html('".'+ ar_name[1]+ '" is not allowed for upload');
                $('#submit').attr("disabled","disabled");
            }
        }
    }
    
    $("#event_image").change(function() {
        readURL(this);
    });
    
    var frmvalidator = new Validator("dataForm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("event_title", "req", "Please enter event title");
    frmvalidator.addValidation("event_description", "req", "Please enter description");
    frmvalidator.addValidation("event_date", "req", "Please enter date");
    frmvalidator.addValidation("event_location", "req", "Please enter location");
    frmvalidator.addValidation("event_image", "req", "Please upload event image");
    frmvalidator.addValidation("total_tickets", "num", "Please enter valid format");
</script>
