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
      <form method="POST" id="editfaq" action="<?php echo base_url('faq/update/'.$edit_faq['id']) ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Question</label>
                                    <textarea name="question" class="form-control" placeholder="Enter Question"><?php echo $edit_faq['question'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Answer</label>
                                    <textarea name="answer" class="form-control" placeholder="Enter Answer"><?php echo $edit_faq['answer'] ?></textarea>
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
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://www.swadarshana.com/"> Swadarshana </a> </span>
      </div>
</footer>
</div>
<!-- content-wrapper ends -->
<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/jquery.validate.min.js"></script>
<script>
$( "#editfaq").validate({
  rules: {
    question: {
      required: true      
    },
    answer:{
        required:true
    }    
  }
});
</script>