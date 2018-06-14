<?php
$upload_path = base_url() . 'uploads/features';
?>
<section class="content-header">
    <h1>Features</h1>
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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Features List</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($faeture_details)) {
                                foreach ($faeture_details as $index => $faeture_detail) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $faeture_detail['title']; ?></td>
                                        <td><?php echo $faeture_detail['status']; ?></td>
                                        <td class="center action-btns">
                                            <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo base_url() . ADMIN_PATH ?>user/edit_feature/<?php echo $faeture_detail['id']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Do you really want to delete permanetly this feature?');" href="<?php echo base_url() . ADMIN_PATH ?>user/feature_delete/<?php echo $faeture_detail['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<script>
    $(function () {
        $(".dataTable").DataTable();
    })
</script>
