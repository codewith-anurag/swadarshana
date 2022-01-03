<div class="hero-section hero-background">
        <h1 class="page-title"><?php echo $page_title; ?></h1>
    </div>
    <div class="container">
        <nav class="biolife-nav nav-86px">
            <ul>
                <li class="nav-item"><a href="<?php echo base_url(); ?>" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Contact</span></li>
            </ul>
        </nav>
        <?php 
            if ($this->session->flashdata("success")) {                

         ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Send!</strong> <?php echo $this->session->flashdata("success"); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
         <?php } ?>

         <?php 
            if ($this->session->flashdata("fail")) {                

         ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Send!</strong> <?php echo $this->session->flashdata("fail"); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
         <?php } ?>
    </div>
    <div class="page-contain contact-us">
        
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="wrap-map biolife-wrap-map" id="map-block">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.335327394155!2d72.54753111496755!3d23.011456884958704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f39eab6b2d%3A0x5865b5a036f9733c!2zJ-CkuOCljeCktS3gpKbgpLDgpY3gpLbgpKgnIFN3YS1EYXJzaGFuYSBIeXBub3RoZXJhcHksIFBhc3QgTGlmZSBSZWdyZXNzaW9uLCBTb3VuZCBIZWFsaW5nLCBBY2Nlc3MgQmFyIGhlYWxpbmc!5e0!3m2!1sen!2sin!4v1603818919832!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" data-aos="zoom-up"></iframe>
            </div>

            <div class="container">

                <div class="row">

                    <!--Contact info-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right">
                        <div class="contact-info-container sm-margin-top-27px xs-margin-bottom-60px xs-margin-top-112px" style="margin-top: 121px;">
                            <h4 class="box-title">Our Contact</h4>
                            <p class="frst-desc"></p>
                            <ul class="addr-info">
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Addess: &nbsp;&nbsp; </b>
                                        <p class="dsc">02 Shardanagar Society,Opp. Bhimnath Mahadev Temple, Paldi, Ahmedabad 380007</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Phone: &nbsp;&nbsp;</b>
                                        <p class="dsc"> <a href="tel:94264 76891"> +91 94264 76891 </a> </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="if-item">
                                        <b class="tie">Email: &nbsp;&nbsp;</b>
                                        <p class="dsc"> <a href="mailto:care@swadarshana.com"> care@swadarshana.com </a> </p>
                                    </div>
                                </li>
                                <!-- <li>
                                    <div class="if-item">
                                        <b class="tie">Store Open:</b>
                                        <p class="dsc">8am - 08pm, Mon - Sat</p>
                                    </div>
                                </li> -->
                            </ul>
                            <div class="biolife-social inline">
                                <ul class="socials">
                                    <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Contact form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-aos="fade-left">
                        <div class="contact-form-container sm-margin-top-112px">
                            <form method="POST" action="<?php echo base_url('web/contact/inquiry') ?>" name="frm-contact">
                                <p class="form-row">
                                    <input type="text" name="name" value="" placeholder="Your Name*" class="txt-input" required="">
                                </p>
                                <p class="form-row">
                                    <input type="email" name="email" value="" placeholder="Email Address*" class="txt-input" required="">
                                </p>
                                <p class="form-row">
                                    <input type="tel" name="phone" value="" placeholder="Phone Number*" class="txt-input" required="">
                                </p>
                                <p class="form-row">
                                    <textarea name="message" id="mes-1" cols="30" rows="9" placeholder="Leave Message*" required=""></textarea>
                                </p>
                                <p class="form-row">
                                    <button class="btn btn-submit" type="submit" style="outline: none;">send message</button>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
