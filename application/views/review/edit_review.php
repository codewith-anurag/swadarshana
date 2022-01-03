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
      <form method="POST" id="addreview" action="<?php echo base_url('review/edit') ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">User Image</label>
                                    <input type="file" name="user_image">
                                    <input type="hidden" name="old_user_image" class="form-control" value="<?php echo !empty($edit_review) ? $edit_review['user_image'] : ''; ?>">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo !empty($edit_review) ? $edit_review['id'] : ''; ?>">
                                   
                                </div>
                            </div>
                            <?php if (file_exists("assets/review_userimage/".$edit_review['user_image'] )){ ?>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <img src="<?php echo !empty($edit_review) ? base_url('assets/review_userimage/').$edit_review['user_image'] : ''; ?>" height="100" width="100">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Review</label>
                                    <textarea name="review" class="form-control" placeholder="Enter Review"><?php echo !empty($edit_review) ? $edit_review['review'] : "";?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo !empty($edit_review) ? $edit_review['name'] : "";?>">
                                </div>
                            </div>  
                        </div>                            
                        <div class="row">
                           <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Rating</label>
                                    <select class="form-control" name="rating">
                                        <option selected="selected" disabled="">Select Rating</option>
                                        <option value="1" <?php echo ($edit_review['rating'] == 1 ? "selected" : "")?>>1 Star</option>
                                        <option value="2" <?php echo ($edit_review['rating'] == 2 ? "selected" : "")?>>2 Star</option>
                                        <option value="3" <?php echo ($edit_review['rating'] == 3 ? "selected" : "")?>>3 Star</option>
                                        <option value="4" <?php echo ($edit_review['rating'] == 4 ? "selected" : "")?>>4 Star</option>
                                        <option value="5" <?php echo ($edit_review['rating'] == 5 ? "selected" : "")?>>5 Star</option>
                                    </select>
                                </div>
                            </div>   
                        </div> 
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Order</label>
                                    <input type="text" name="order" class="form-control" placeholder="Enter Review Order Number" value="<?php echo !empty($edit_review) ? $edit_review['index_order'] : "";?>">
                                </div>
                            </div>  
                        </div>                                                  
                    </div>
                </div>
          </div>
          <div class="card-footer">
              <input type="submit" class="btn btn-primary float-left">
          </div>
        </div>          
    </form>
</div>
<!-- partial:partials/_footer.html -->
<footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://glasierinc.com/"> Glasier Inc </a> </span>
      </div>
</footer>
</div>
<!-- content-wrapper ends -->
<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
$( "#addreview").validate({
      rules: {
        
        review: {  required: true },
        name:{ required:true },
        rating:{required:true},
        order:{ number:true },
      }
});
</script>