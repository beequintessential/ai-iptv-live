<?php
$upload_path = base_url() . 'uploads/testimonials/';
if ($testimonial_detail['image'] != '') {
    $profile_image = $upload_path . $testimonial_detail['image'];
} else {
    $profile_image = base_url() . 'assets/images/default.png';
}
?> 
<section class="content-header">
    <h1>Edit Testimonial</h1>
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
                    <h3 class="box-title">Edit Testimonial</h3>
                </div>
                <form role="form" id="dataForm" method="POST">
                    <div class="box-body">
<!--
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"  name="title" class="form-control" placeholder="Title" value="<?php echo (isset($testimonial_detail['title'])) ? $testimonial_detail['title'] : ''; ?>">
                            <span id="dataForm_title_errorloc" class="error_strings text-danger"></span>
                        </div>-->
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text"  name="name" class="form-control"  placeholder="Author Name" value="<?php echo (isset($testimonial_detail['name'])) ? $testimonial_detail['name'] : ''; ?>">
                            <span id="dataForm_name_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text"  name="designation" class="form-control"  placeholder="Designation" value="<?php echo (isset($testimonial_detail['designation'])) ? $testimonial_detail['designation'] : ''; ?>">
                            <span id="dataForm_designation_errorloc" class="error_strings text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"  placeholder="Description"><?php echo (isset($testimonial_detail['description'])) ? $testimonial_detail['description'] : ''; ?></textarea>
                            <span id="dataForm_description_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <label for="image">Image</label
                        <br/>
                        <div class="form-group">
                            <img  id="img-upload" class="img-circle " src="<?php echo $profile_image; ?>" height="50" width="50" />
                           <input type="file" name="image">
                            <input type="hidden" name="old_image" value="<?php echo $testimonial_detail['image']; ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Enabled" <?php echo (isset($testimonial_detail['status']) && $testimonial_detail['status']=='Enabled') ? 'selected' : ''; ?>>Enabled</option>
                                <option value="Disabled" <?php echo (isset($testimonial_detail['status']) && $testimonial_detail['status']=='Disabled') ? 'selected' : ''; ?>>Disabled</option>
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
</script>
