<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
<script src="<?php echo base_url('assets/ckeditor/') ?>ckeditor.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
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
        <div class="page-header">
            <h3 class="page-title"> <?php echo $heding; ?> </h3>             
        </div>
        <form method="POST" id="addservice" action="<?php echo base_url('service/update/' . $edit_service['id']) ?>"  enctype="multipart/form-data">
            <div class="card">            
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="badge">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Service Title" value="<?php echo $edit_service['title'] ?>">                                    
                                    </div>
                                </div>  
                            </div> 
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="badge">Service Banner </label>
                                        <input type="file" name="banner_image"/>                                           
                                        <input type="hidden" name="old_banner_image" value="<?php echo $edit_service['banner_image'];?>">
                                    </div>
                                </div>  
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <?php 
                                        if($edit_service['banner_image']!=""){
                                    ?>
                                        <img src="<?php echo base_url('assets/servicebanner_image/'.$edit_service['banner_image']);?>"  width="400"/>
                                <?php } ?>
                                    </div>
                                </div>  
                            </div> 
                                
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="badge"> Mobile  Banner Image </label>
                                        <input type="file" name="mobile_bannerimage"/>                                           
                                        <input type="hidden" name="old_mobile_bannerimage" value="<?php echo $edit_service['mobile_bannerimage'];?>">
                                    </div>
                                </div>  
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <?php 
                                        if($edit_service['mobile_bannerimage']!=""){
                                    ?>
                                        <img src="<?php echo base_url('assets/mobile_servicebannerimage/'.$edit_service['mobile_bannerimage']);?>"  width="400" height="200"/>
                                <?php } ?>
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="badge">Short Description</label>                                        
                                        
-                                        <textarea name="short_description"><?php echo $edit_service['short_description'];?></textarea>
                                    </div>                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="badge">Middle Description</label>
-                                        <textarea name="middle_description" id="middle_description" ><?php echo $edit_service['middle_description'] ?></textarea>
                                        
                                    </div>                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="badge">Long Description</label>
                                        <textarea name="long_description" id="long_description" class="form-control" placeholder="Enter Description"><?php echo $edit_service['long_description'] ?></textarea>
                                        
                                    </div> 
                                </div>                                
                            </div>  
                                                  
                        </div>                                        
                    </div>
                </div>        
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm float-left">
                </div>
            </div>          
        </form>
    </div>
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://www.swadarshana.com/"> Swadarshana </a> </span>
        </div>
    </footer>
</div>
<!-- content-wrapper ends -->
<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/jquery.validate.min.js"></script>
<script>
    $("#addservice").validate({
        rules: {
            title: { required: true  },
            
        }
    });
CKEDITOR.replace('short_description');
CKEDITOR.replace('middle_description');
CKEDITOR.replace('long_description');
        CKEDITOR.config.height = 500;
</script>