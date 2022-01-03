<div class="main-panel">
    <div class="content-wrapper">
        <?php 
            if ($this->session->flashdata("success")) {                    
         ?>
         <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             <?php echo $this->session->flashdata("success"); ?>
        </div>
        <?php } ?>
        <div class="page-header">
            <h3 class="page-title"> <?php echo $heding; ?>  </h3>                    
        </div>
        <div class="container-fluid">
            <div class="row">               
                <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_slider ?></h5>
                            <h5 class="card-title">Sliders</h5>                       
                            <a href="<?php echo base_url('slider') ?>" class="card-link"> Slider</a>                        
                        </div>
                    </div>  
                </div>
                <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_service ?></h5>
                            <h5 class="card-title">Service</h5>                       
                            <a href="<?php echo base_url('service') ?>" class="card-link"> Service</a>                        
                        </div>
                    </div>  
                </div>
                <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_popupservice ?></h5>
                            <h5 class="card-title">Sub Service</h5>                       
                            <a href="<?php echo base_url('popupservice') ?>" class="card-link"> Sub Service</a>                        
                        </div>
                    </div>  
                </div> 
                <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_review ?></h5>
                            <h5 class="card-title">Review</h5>                       
                            <a href="<?php echo base_url('review') ?>" class="card-link"> Review</a>                        
                        </div>
                    </div>  
                </div>                                                             
            </div>        
            
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_faq ?></h5>
                            <h5 class="card-title">FAQ</h5>                       
                            <a href="<?php echo base_url('faq') ?>" class="card-link"> FAQ</a>                        
                        </div>
                    </div>  
                </div>  
                 <div class="col-lg-3">
                    <div class="card" style="width:16rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;font-size:80px;"><?php echo $total_fees ?></h5>
                            <h5 class="card-title">Fees</h5>                       
                            <a href="<?php echo base_url('fees') ?>" class="card-link"> Fees</a>                        
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
    </div>

<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://glasierinc.com/"> Glasier Inc </a> </span>
      </div>
    </footer>
</div>
<!-- partial -->