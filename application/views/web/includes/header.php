<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $page_title; ?></title>

      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/animate.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/nice-select.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/slick.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/main-color.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/lightbox.min.css">
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/shoppe.css">
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/video.css">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link rel="shortcut icon" href="<?php echo base_url('assets/') ?>images/logo-mini.png" />
      <script src="<?php echo base_url('assets/front/') ?>js/jquery-3.4.1.min.js"></script>
      <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '465886918099464');
        fbq('track', 'PageView');
    </script>

      <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=465886918099464&ev=PageView&noscript=1" /></noscript>
      <!-- End Facebook Pixel Code -->

      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-36727255-1"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-36727255-1');
      </script>




   </head>
   <body class="biolife-body">
      <!-- Preloader -->
      <div id="biof-loading">
         <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
               <div class="dot dot-one"></div>
               <div class="dot dot-two"></div>
               <div class="dot dot-three"></div>
            </div>
         </div>
      </div>
      <!-- HEADER -->
      <header id="header" class="header-area style-01 layout-03" style="box-shadow: 0 0 10px 0 rgba(0,0,0,.1);">
         <div class="header-top bg-main hidden-xs" style="background-color: #fff;">
            <div class="container">
                 <div class="top-bar left">
                    <ul class="social-list">
                       <li><a href="https://www.facebook.com/SwaDarshana" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                       <li><a href="https://www.linkedin.com/in/manish-khernar-hypnotherapy" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                       <li><a href="https://www.youtube.com/channel/UC_U7pCDKM1eo_l8wbVaRj-A" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                       <li><a href="https://twitter.com/Swa_Darshana" title="twitter" class="socail-btn" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                       <li><a href="https://www.instagram.com/swadarshana_therapies/" title="instagram" class="socail-btn" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                       <li><a href="<?= base_url('web/fees')?>" class="btn btn-submit" type="submit" style="outline: none; background-color: #f57f20; color: #fff;">Fees</a></li>
                       <?php
                           if ($this->session->userdata("id")) {
                        ?>
                            <li><a href="<?= base_url('web/user_videos/get_uservideos')?>" class="btn btn-submit  btn-sm"  style="outline: none; background-color: #f57f20; color: #fff;">Dashboard</a></li>
                            <li><a  class="btn btn-submit  btn-sm"  onclick="return logout()" style="outline: none; background-color: #f57f20; color: #fff;">Logout </a></li>
                   <?php }else{ ?>
                   	<li><a  class="btn btn-submit  btn-sm" href="<?php echo base_url('web/swashoppe/login') ?>"  style="outline: none; background-color: #f57f20; color: #fff;">Login</a></li>
                   <?php } ?>
                  </ul>
               </div>
               <div class="top-bar right">
               <ul class="horizontal-menu">
                  <li class="horz-menu-item currency">
                     <div class="nice-select" tabindex="0">
                        <span class="current">Member  :-</span>
                     </div>
                  </li>
                   <li> <a href="#"> <img src="<?php echo base_url('assets/front/') ?>images/top1.png"> </a>
                        <a href="#" style="margin-left:15px;"> <img src="<?php echo base_url('assets/front/') ?>images/top2.png"> </a>
                        <a href="#" style="margin-left:15px;"> <img src="<?php echo base_url('assets/front/') ?>images/lionlogo.png"> </a>
                        <a href="#" style="margin-left:15px;"> <img src="<?php echo base_url('assets/front/') ?>images/BNI.jpg"> </a>
                    </li>
               </ul>
                  <!-- <ul class="horizontal-menu">
                     <li class="horz-menu-item currency">
                     <a href="#"> <img src="images/top1.png"> </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" style="margin-left:15px;"> <img src="images/top2.png"> </a>
                     </li>
                  </ul> -->
               </div>
            </div>
         </div>
         <div class="header-middle biolife-sticky-object">
            <div class="container">
               <div class="row">

                  <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                     <a href="<?php echo base_url(); ?>" class="biolife-logo"><img src="<?php echo base_url('assets/front/') ?>images/logo4.png" alt="biolife logo" width="230" height="34" data-aos="zoom-in-down"></a>
                  </div>

                  <div class="col-lg-0 col-md-0 col-md-0 col-xs-6">
                     <div class="biolife-cart-info">
                        <div class="mobile-menu-toggle">
                           <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                           <span></span>
                           <span></span>
                           <span></span>
                           </a>
                        </div>
                     </div>
                     <?php
                        $this->db->select("*");
                        $this->db->from("event_master");
                        $this->db->limit(3)->order_by("id", "desc");
                        $query = $this->db->get();
                        $event = $query->result_array(); ?>
                        <div class="desktop-dis">
                            <marquee direction="left" scrollamount="7" class="event_heading" onMouseOver="this.stop()" onMouseOut="this.start()"><h4 class="post-name">
                  <?php  $i=1;  foreach ($event as $eventlist) {
//echo count($event) . $i;
                     ?>


                          <a href="<?php echo base_url('web/event/event_detail/'.$eventlist["id"]) ?>" class="linktopost" target="_blank"><?php echo $eventlist["title"] ?></a>
                          <?php if(count($event)!= $i){ ?>
                              |
                          <?php }
                            $i++;
                              ?>



                     <?php } ?>
                     </h4></marquee>
                     </div>
                   </div>
                  <div class="col-lg-0 col-md-0 col-xs-12 mobile-dis">
                  <?php
                        $this->db->select("*");
                        $this->db->from("event_master");
                        $this->db->limit(3)->order_by("id", "desc");
                        $query = $this->db->get();
                        $event = $query->result_array();
                           foreach ($event as $eventlist) {   ?>
                        <div>
                           <marquee direction="left" scrollamount="7" class="event_heading" onMouseOver="this.stop()" onMouseOut="this.start()"><h4 class="post-name"><a href="<?php echo base_url('web/event/event_detail/'.$eventlist["id"]) ?>" class="linktopost" target="_blank"><?php echo $eventlist["title"] ?></a></h4></marquee>
                        </div>
                        <?php } ?>
                      </div>

                  <div class="col-lg-9 col-md-9 hidden-sm hidden-xs">
                     <div class="primary-menu" style="float: right;">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="">
                           <li class="menu-item"><a href="<?php echo base_url() ?>">Home</a></li>

                           <li class="menu-item menu-item-has-children has-megamenu">
                              <a href="#biolife-panel-0" class="biolife-next-panel panel1" data-title="Swa Services"> Swa Services <i class="fa fa-fw fa-angle-right icon12" style="position: relative; left: 157px;"></i></a>
                              <div class="wrap-megamenu lg-width-900 md-width-750">
                                 <?php
                                       $this->db->select("id,title,slug");
                                       $this->db->from("service_master");
                                       $ex = $this->db->get();
                                       $service  =   $ex->result_array();

                                       foreach ($service  as $service_list) {
                                ?>
                                 <div class="mega-content">
                                    <div class="col-lg-3 col-md-3 col-xs-12 md-margin-bottom-0 xs-margin-bottom-25">
                                       <div class="wrap-custom-menu vertical-menu">
                                          <h4 class="menu-title"><a href="<?php echo base_url('web/services/service/'.$service_list['title']);?>"> <?php echo $service_list["title"]; ?></a></h4>
                                          <ul class="menu">
                                             <?php
                                                $this->db->select("id,serviceid,title,slug");
                                                $this->db->from("popupservice_master");
                                                $this->db->where("serviceid",$service_list["id"]);
                                                $ex = $this->db->get();
                                                $subservice  =   $ex->result_array();
                                                foreach ($subservice  as $subservice_list) {
                                              ?>
                                             <li> <a href="<?php echo base_url('service/'.$subservice_list['slug'] ) ?>"   class="subservice"> <?php echo $subservice_list["title"]; ?> </a> </li>

                                          <?php } ?>

                                          </ul>

                                       </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                  ?>
                                  <h4 class="menu-title"><a href="https://www.swadarshana.com/artofscoring/" target="_blank">Art of Scoring high in Exams</a></h4>
                              </div>
                           </li>

                           <li class="menu-item menu-item-has-children has-child">
                              <a href="#biolife-panel-1" class="biolife-next-panel panel1" data-title="Swa Experience Center" >Swa Experience Center <i class="fa fa-fw fa-angle-right icon12" style="position: relative; left: 82px;"></i></a>
                              <ul class="sub-menu">
                                 <li class="menu-item"><a href="#">Hypno Fam Tour</a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/assessment') ?>">Assessment</a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/faq') ?>">FAQs</a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/swashoppe');?>">Swa Shoppe</a></li>
                              </ul>
                           </li>

                           <!-- <li class="menu-item"><a href="reviews.php">Reviews </a></li> -->

                           <li class="menu-item menu-item-has-children has-child">
                              <a href="#biolife-panel-2" class="biolife-next-panel panel1" data-title="Reviews" >Reviews <i class="fa fa-fw fa-angle-right icon12" style="position: relative; left: 192px;"></i> </a>
                              <ul class="sub-menu">
                                 <li class="menu-item"><a href="<?php echo base_url('web/reviews') ?>">Reviews </a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/reviews/videotestimonial') ?>">Video Testimonials </a></li>
                              </ul>
                           </li>

                           <li class="menu-item menu-item-has-children has-child">
                              <a href="#biolife-panel-3" class="biolife-next-panel panel1" data-title="Swa Media">Swa Media <i class="fa fa-fw fa-angle-right icon12" style="position: relative; left: 169px;"></i> </a>
                              <ul class="sub-menu">
                                 <li class="menu-item"><a href="<?php echo base_url('web/blog'); ?>">Blogs </a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/podcast'); ?>">Podcast </a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/event'); ?>">Events & News </a></li>
                                 <li class="menu-item"><a href="<?php echo base_url('web/media/swagallery') ?>">Swa Gallery </a></li>
                              </ul>
                           </li>

                           <li class="menu-item"><a href="<?php echo base_url('web/contact') ?>" >Swa Contact  </a></li>

                            <li class="dashboardbutton" style="border: none; padding-top: 10px;">
                               <?php
                           if ($this->session->userdata("id")) {
                                 ?>
                              <a href="<?= base_url('web/user_videos/get_uservideos')?>" class="btn btn-submit" type="submit" style="outline: none; background-color: #f57f20; color: #fff; line-height: inherit;">Dashboard</a>
                              <a  class="btn btn-submit" type="submit" onclick="return logout()" style="outline: none; background-color: #f57f20; color: #fff; line-height: inherit;">Logout </a>
                              <?php }else{ ?>
                              <a  class="btn btn-submit" href="<?php echo base_url('web/swashoppe/login') ?>"  style="outline: none; background-color: #f57f20; color: #fff; line-height: inherit;">Login</a>
                              <?php } ?>
                            </li>

                            <li class="dashboardbutton" style="border: none; padding-top: 10px;">
                               <a  class="btn btn-submit" href="<?php echo base_url('web/fees') ?>"  style="outline: none; background-color: #f57f20; color: #fff; line-height: inherit;">Fees</a>
                            </li>

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

<script type="text/javascript">
    function logout() {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("web/user_videos/logout"); ?>',
            success:function(data){
                if (data == "1") {
                    console.log(1);
                    window.location.href = "<?php echo  base_url('web/swashoppe/login/')?>";
                }
            }
        });
    }

    $(function() {
       $('marquee').mouseover(function() {
           $(this).attr('scrollamount',0);
       }).mouseout(function() {
            $(this).attr('scrollamount',7);
       });
   });
</script>
