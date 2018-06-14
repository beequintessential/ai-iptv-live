<?php
$userInfo = $this->session->userdata('userInfo');
$upload_path = base_url() . 'uploads/avatar/';
if ($userInfo['profile_image'] != '') {
    $profile_image = $upload_path . $userInfo['profile_image'];
} else {
    $profile_image = base_url() . 'assets/images/default.png';
}
?>
<section class="content-header">
    <h1>Edit Profile</h1>
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
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Profile</h3>
                </div>
                <form  id="ProfileEdit" action="<?php echo base_url() . ADMIN_PATH; ?>user/save_profile_info" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name"  value="<?php echo (isset($userInfo['first_name'])) ? $userInfo['first_name'] : ''; ?>"  placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name"  value="<?php echo (isset($userInfo['last_name'])) ? $userInfo['last_name'] : ''; ?>" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($userInfo['email'])) ? $userInfo['email'] : ''; ?>">
                        </div>

                        <label>Profile Image</label>
                        <div class="form-group">
                            <img  class="img-circle" src="<?php echo $profile_image; ?>" height="50" width="50" />
                            <input type="hidden" name="old_profile_image" value="<?php echo (isset($userInfo['profile_image']) ? $userInfo['profile_image'] : ''); ?>">
                            <input type="file"  name="profile_image">
                            <p class="help-block"></p>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <form  id="dataForm" role="form" action="<?php echo base_url() . ADMIN_PATH; ?>user/change_password" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Old Password">
                            <span id="dataForm_password_errorloc" class="error_strings text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                            <span id="dataForm_new_password_errorloc" class="error_strings text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                            <span id="dataForm_confirm_password_errorloc" class="error_strings text-danger"></span>
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
    var frmvalidator = new Validator("dataForm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("password", "req", "Please enter current password");
    frmvalidator.addValidation("new_password", "req", "Please enter new password");
    frmvalidator.addValidation("new_password", "neelmnt=password", "New password should not be same as old password");
    frmvalidator.addValidation("confirm_password", "req", "Please enter confirm password");
    frmvalidator.addValidation("confirm_password", "eqelmnt=new_password", "The confirmed password is not same as new password");
</script>
