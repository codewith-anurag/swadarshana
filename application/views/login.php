<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo isset($title) ? $title : "Swadarshana | Admin Login"; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>font-awesome-4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/') ?>images/logo-mini.png" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>custom/customcss.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <?php 
                if (validation_errors()) {                    
             ?>
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
            <?php 
                if ($this->session->flashdata("fail")) {                    
             ?>
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <?php echo $this->session->flashdata("fail"); ?>
            </div>
            <?php } ?>
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?php echo base_url('assets/') ?>images/logo.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" id="login" method="POST" action="<?php echo base_url('login/validate_login') ?>">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <input type="submit" name="login" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" value="SIGN IN"/>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-blue float-right">Forgot password?</a>
                </div> -->
               
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/') ?>js/off-canvas.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/misc.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/settings.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/todolist.js"></script>
  <script type="text/javascript"></script>
  <!-- endinject -->
  <script>
// just for the demos, avoids form submit

$( "#login").validate({
  rules: {
    email: {
      required: true,
      email:true
    },
    password:{
        required:true
    }
  }
});
</script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/customjs.js') ?>"></script>
</body>
<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>