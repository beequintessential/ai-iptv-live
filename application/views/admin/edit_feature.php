<?php
$upload_path = base_url() . 'uploads/';
if ($feature_details['icon_image'] != '') {
    $profile_image = $upload_path . $feature_details['icon_image'];
} else {
    $profile_image = base_url() . 'assets/images/default.png';
}
?> 
<section class="content-header">
    <h1>Edit Feature</h1>
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
                    <h3 class="box-title">Edit Feature</h3>
                </div>
                <form role="form" id="dataForm" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text"  name="title" class="form-control"  placeholder="Title" value="<?php echo (isset($feature_details['title']) && $feature_details['title'] !='')? $feature_details['title'] : '';?>">
                            <span id="dataForm_title_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"  placeholder="Description"><?php echo (isset($feature_details['description']) && $feature_details['description'] !='')? $feature_details['description'] : '';?></textarea>
                            <span id="dataForm_description_errorloc" class="error_strings text-danger"></span>
                        </div>
                        <label for="icon_image">Image</label
                        <br/>
                        <div class="form-group">
                            <img  id="img-upload" class="img-circle " src="<?php echo $profile_image; ?>" height="50" width="50" />
                           <input type="file" name="icon_image">
                            <input type="hidden" name="old_icon_image" value="<?php echo $feature_details['icon_image']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Enabled" <?php echo (isset($feature_details['status']) && $feature_details['status']=='Enabled') ? 'selected' : ''; ?>>Enabled</option>
                                <option value="Disabled" <?php echo (isset($feature_details['status']) && $feature_details['status']=='Disabled') ? 'selected' : ''; ?>>Disabled</option>
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
