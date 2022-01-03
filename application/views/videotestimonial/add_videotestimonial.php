<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
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
      <form method="POST" id="addvideotestimonial" action="<?php echo base_url('videotestimonial/insert') ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="badge">Category</label>
                            <select name="category" class="form-control">
                                <option selected="selected" disabled="disabled">Select Category</option>                                
                                <?php 
                                    foreach ($category as $key => $value) {                                        
                                ?>
                                <option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>    
                <div class="row">                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="badge">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Video Title">
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="badge">Video Thumbnail</label>
                            <input type="file" name="video_thumbnail">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="badge">Video</label>
                            <textarea name="video" class="form-control" placeholder="Enter Video Iframe"></textarea>
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
$( "#addvideotestimonial").validate({
  rules: {
    "category":{
        required:true
    },
    "title": {
      required: true      
    },
    "video_thumbnail":{ required:true},
    "video":{
        required:true
    }
  }
});
</script>