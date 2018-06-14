<section class="content-header">
    <h1>Plans</h1>
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
                    <h3 class="box-title">Plans List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Title</th>
                                <th>Plan Price</th>
                                <th>Plan Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($plan_details)) {
                                foreach ($plan_details as $key => $plan_detail) {
                                    ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $plan_detail['plan_title']; ?></td>
                                        <td><?php echo $plan_detail['plan_price']; ?></td>
                                        <td><?php echo $plan_detail['plan_duration']; ?></td>
                                        <td><?php echo $plan_detail['status']; ?></td>
                                        <td class="center action-btns">
                                            <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo base_url() . ADMIN_PATH ?>user/edit_plan/<?php echo $plan_detail['plan_id']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Do you really want to delete permanetly this plan?');" href="<?php echo base_url() . ADMIN_PATH ?>user/plan_delete/<?php echo $plan_detail['plan_id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
    <?php }
} ?>
                            </tr>
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
