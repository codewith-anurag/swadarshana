<!DOCTYPE html>

<html lang="en">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Swadarshana | <?php echo $title; ?></title>

  <!-- plugins:css -->

  <!-- <link rel="stylesheet" href="css/all.min.css"> -->

  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/vendor.bundle.base.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/vendor.bundle.addons.css">



  <link rel="stylesheet"  href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">

  <!-- endinject -->

  <!-- plugin css for this page -->

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">

 <!--  <link rel="stylesheet" href="<?php //echo base_url('assets/') ?>font-awesome-4.7.0/css/font-awesome.min.css"> -->

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

 <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>custom/Font Awesome 4.7.0.css"> -->

 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>custom/customcss.css">

  <!-- endinject -->

  <link rel="shortcut icon" href="<?php echo base_url('assets/') ?>images/logo-mini.png" />

  

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo" href="<?php echo base_url('login/dashboard') ?>"><img src="<?php echo base_url('assets/') ?>images/logo.png" alt="logo"/></a>

        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('login/dashboard') ?>"><img src="<?php echo base_url('assets/') ?>images/logo-mini.png" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-stretch">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

        <i class="fa fa-fw fa-reorder"></i>

        </button>

        <ul class="navbar-nav">

          <li class="nav-item nav-search d-none d-md-flex">

            <div class="nav-link">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text">

                  <i class="fa fa-fw fa-search"></i>

                  </span>

                </div>

                <input type="text" class="form-control" placeholder="Search" aria-label="Search">

              </div>

            </div>

          </li>

        </ul>

        <ul class="navbar-nav navbar-nav-right">

          <!-- <li class="nav-item d-none d-lg-flex">

            <a class="nav-link" href="#">

              <span class="btn btn-primary">+ Create new</span>

            </a>

          </li> -->

          <li class="nav-item nav-profile dropdown">

            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              <img src="<?php echo base_url('assets/') ?>images/face9.jpg" alt="profile"/>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <!-- <a class="dropdown-item">

                <i class="fas fa-cog text-primary"></i>

                Settings

              </a> -->

              <div class="dropdown-divider"></div>

              <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">

              <i class="fa fa-power-off" aria-hidden="true"></i>

                Logout

              </a>

            </div>

          </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="fa fa-bars"></span>

        </button>

      </div>

    </nav>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->

      

      <!-- partial -->

      <!-- partial:partials/_sidebar.html -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="margin-top: 70px;">

        <ul class="nav">

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('login/dashboard') ?>">

            <i class="fa fa-tachometer menu-icon" aria-hidden="true"></i>

              <span class="menu-title">Dashboard</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('customer') ?>">

            <i class="fa fa-user menu-icon" aria-hidden="true"></i>

              <span class="menu-title"> User</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('slider') ?>">

            <i class="fa fa-image menu-icon" aria-hidden="true"></i>

              <span class="menu-title"> Slider</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('service') ?>">

            <i class="fa fa-fw fa-list-alt menu-icon"></i>

              <span class="menu-title"> Services</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('popupservice') ?>">

            <i class="fa fa-fw fa fa-external-link menu-icon"></i>

              <span class="menu-title"> Sub Services</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('review') ?>">

            <i class="fa fa-fw fa fa-star menu-icon"></i>

              <span class="menu-title"> Reviews</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('videotestimonial_category') ?>">

            <i class="fa fa-fw fa fa fa-list-alt menu-icon"></i>

              <span class="menu-title"> Video Testimonials category</span>

            </a>

          </li>        

          <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url('videotestimonial') ?>">

            <i class="fa fa-fw fa fa-video-camera menu-icon"></i>

              <span class="menu-title"> Video Testimonials</span>

            </a>

          </li>          

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('gallery') ?>">

                    <i class="fa fa-fw fa fa-file-image-o menu-icon"></i>

                    <span class="menu-title"> Gallery</span>

                </a>

            </li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('blogcategory') ?>">

                    <i class="fa fa-fw fa-list menu-icon"></i>

                    <span class="menu-title"> Blog Category</span>

                </a>

           </li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('blog') ?>">

                    <i class="fa fa-fw fa-newspaper-o menu-icon"></i>

                    <span class="menu-title"> Blog</span>

                </a>

           </li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('podcast') ?>">

                    <i class="fa fa-fw fa-newspaper-o menu-icon"></i>

                    <span class="menu-title"> Podcast</span>

                </a>

           </li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('event') ?>">

                    <i class="fa fa-fw fa-calendar-check-o menu-icon"></i>

                    <span class="menu-title"> Event</span>

                </a>

           </li>

		   

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('faq') ?>">

                    <i class="fa fa-fw fa-question-circle menu-icon"></i>

                    <span class="menu-title"> FAQ</span>

                </a>

           </li>
		   <li class="nav-item">

				<a class="nav-link" href="<?php echo base_url('SwashoppeCategory') ?>">
					<i class="fa fa-fw fa fa-list menu-icon"></i>
					<span class="menu-title"> Swa Shoppe Course</span>
				</a>

			</li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('Swashoppe') ?>">

                    <i class="fa fa-fw fa-shopping-basket menu-icon"></i>

                    <span class="menu-title"> Swa Shoppe</span>

                </a>

           </li>

           <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('fees') ?>">

                    <i class="fa fa-fw fa-money menu-icon"></i>

                    <span class="menu-title"> Fees</span>

                </a>

            </li>

            <!-- <li class="nav-item">

                <a class="nav-link" href="<?php //echo base_url('user_purchasevideos') ?>">

                    <i class="fa fa-fw fa-file-video-o menu-icon"></i>

                    <span class="menu-title"> User Purchase Videos</span>

                </a>

            </li> -->

            <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url('user_trackingvideos') ?>">

                    <i class="fa fa-fw fa-file-video-o menu-icon"></i>

                    <span class="menu-title"> User Tracking Videos</span>

                </a>

            </li>

        </ul>

      </nav>