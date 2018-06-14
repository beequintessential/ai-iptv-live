<?php
$upload_path = base_url() . 'uploads/testimonials';
?>
<section class="content-header">
    <h1>TESTIMONIALS</h1>
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
                    <h3 class="box-title">Testimonials List</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Author Name</th>
                                <th>Author Designation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($testimonial_details)) {
                                foreach ($testimonial_details as $index => $testimonial_detail) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $testimonial_detail['name']; ?></td>
                                        <td><?php echo $testimonial_detail['designation']; ?></td>
                                        <td><?php echo $testimonial_detail['status']; ?></td>
                                        <td class="center action-btns">
                                            <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo base_url() . ADMIN_PATH ?>user/edit_testimonial/<?php echo $testimonial_detail['testi_id']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Do you really want to delete permanetly this testimonial?');" href="<?php echo base_url() . ADMIN_PATH ?>user/testimonials_delete/<?php echo $testimonial_detail['testi_id']; ?>"><i class="fa fa-trash-o"></i></a>
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
