<?php
$userInfo = $this->session->userdata('userInfo');

$upload_path = base_url() . 'uploads/avatar/';
if ($userInfo['profile_image'] != '') {
    $profile_image = $upload_path . $userInfo['profile_image'];
} else {
    $profile_image = base_url() . 'assets/images/default.png';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/morris.js/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/morris.js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/js/gen_validatorv4.js" type="text/javascript"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url() . ADMIN_PATH; ?>" class="logo">
                    <span class="logo-mini"><b>IP</b>TV</span>
                    <span class="logo-lg"><b>IPTV</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $profile_image; ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $userInfo['first_name'] . ' ' . $userInfo['last_name'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo $profile_image; ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo$userInfo['user_type'] ?>
                                            <small>Member since  <?php echo date('d M, Y', strtotime($userInfo['registered_at'])); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() . ADMIN_PATH; ?>user/profile" class="btn btn-default btn-flat">Edit Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() . ADMIN_PATH; ?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header"></li>
                        <li class="<?php echo (isset($activeMenu) && $activeMenu == 'dashboard') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url().'admin/'?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

<!--                        <li class="treeview <?php //echo (isset($activeMenu) && $activeMenu == 'clinics') ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-hospital-o"></i> <span>Users</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php// echo (isset($activeSubMenu) && $activeSubMenu == 'clinic_add') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>clinics/add_clinic"><i class="fa fa-circle-o"></i> Add Clinic</a></li>
                                <li class="<?php// echo (isset($activeSubMenu) && $activeSubMenu == 'clinic_list') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>clinics"><i class="fa fa-circle-o"></i> Clinic List</a></li>
                            </ul>
                        </li>-->

                        <li class="treeview <?php echo (isset($activeMenu) && $activeMenu == 'testimonials') ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-commenting"></i> <span>Testimonials</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                              <li class="<?php echo (isset($activeSubMenu) && $activeSubMenu == 'add_testimonial') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/add_testimonials"><i class="fa fa-circle-o"></i> Add Testimonials</a></li>
                                <li class="<?php echo (isset($activeSubMenu) && $activeSubMenu == 'testimonial_list') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/testimonials"><i class="fa fa-circle-o"></i> Testimonials List</a></li>
                            </ul>
                        </li>

                        
                        <li class="treeview <?php echo (isset($activeMenu) && $activeMenu == 'plans') ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Pricing Plans</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
<!--                                <li class="<?php  echo (isset($activeSubMenu) && $activeSubMenu == 'plan_add') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/add_plan"><i class="fa fa-circle-o"></i>Add Plan</a></li>-->
                                <li class="<?php  echo (isset($activeSubMenu) && $activeSubMenu == 'plan_list') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/plans"><i class="fa fa-circle-o"></i>Plans List</a></li>
                            </ul>
                        </li>
                        
                        <li class="treeview <?php echo (isset($activeMenu) && $activeMenu == 'features') ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Features</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
<!--                              <li class="<?php  echo (isset($activeSubMenu) && $activeSubMenu == 'feature_add') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/add_feature"><i class="fa fa-circle-o"></i>Add Feature</a></li>-->
                                <li class="<?php  echo (isset($activeSubMenu) && $activeSubMenu == 'features_list') ? 'active' : ''; ?>"><a href="<?php echo base_url() . ADMIN_PATH; ?>user/features"><i class="fa fa-circle-o"></i>Features List</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">