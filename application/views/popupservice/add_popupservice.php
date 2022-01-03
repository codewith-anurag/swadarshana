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
      <form method="POST" id="addservice" action="<?php echo base_url('popupservice/insert') ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Service</label>
                                    <select name="service" class="form-control">
                                        <option selected="selected" disabled="">Select Service</option>
                                        <?php foreach ($service as $service_list) {
                                        ?>
                                        <option value="<?php echo $service_list['id'] ?>"><?php echo $service_list['title'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Image</label>
                                    <input type="file" name="serviceimage">                                    
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                                    
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
$( "#addservice").validate({
  rules: {
    service:{ required:true},
    title: {
      required: true      
    },
    serviceimage:{
        required:true
    },
    description:{required:true}
  }
});

CKEDITOR.replace('description');
        CKEDITOR.config.height = 500;
</script>