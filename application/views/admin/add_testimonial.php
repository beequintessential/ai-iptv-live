<section class="content-header">
    <h1>Add Testimonial</h1>
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
                    <h3 class="box-title">Add Testimonial</h3>
                </div>
                <form role="form" id="dataForm" method="POST" enctype="multipart/form-data">
                    <div class="box-body">

<!--                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"  name="title" class="form-control" placeholder="Title">
                            <span id="dataForm_title_errorloc" class="error_strings text-danger"></span>
                        </div>-->

                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text"  name="name" class="form-control"  placeholder="Author Name">
                            <span id="dataForm_name_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text"  name="designation" class="form-control"  placeholder="Designation">
                            <span id="dataForm_designation_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"  placeholder="Description"></textarea>
                            <span id="dataForm_description_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image">
                       </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Enabled">Enabled</option>
                                <option value="Disabled">Disabled</option>
                            </select>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
//    var frmvalidator = new Validator("dataForm");
//    frmvalidator.EnableOnPageErrorDisplay();
//    frmvalidator.EnableMsgsTogether();
//    frmvalidator.addValidation("title", "req", "Please enter  title");
//    frmvalidator.addValidation("title", "req", "Please enter sub title");
//    frmvalidator.addValidation("description", "req", "Please enter description");
//    frmvalidator.addValidation("image", "req", "Please upload image");
</script>
