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
      <form method="POST" id="addblogcategory" action="<?php echo base_url('SwashoppeCategory/insert') ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">                        
                        <div class="row">
                             <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Category</label>
                                    <select name="supercategory" class="form-control category">
                                        <option selected>Select Category</option>
                                        <?php
                                        foreach ($supercategory as $categoryvalue) {
                                            ?>
                                            <option  value="<?php echo $categoryvalue['id'] ?>"><?php echo $categoryvalue["title"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="category_text" class="category_text"/>                                                                
                                </div>
                            </div>
                        
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Video Courses </label>
                                    <input type="text" name="category" class="form-control" placeholder="Enter Video Courses">
                                </div>
                            </div> 
                            <div class="col-lg-4 course_price" style="display: none;">
                                <div class="form-group">
                                    <label class="badge">Video Courses Price </label>
                                    <input type="number" name="price" class="form-control " placeholder="Enter Video Courses Price">
                                </div>
                            </div>                             
                        </div>    
                        <div class="row">
                             <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Video Courses Banner </label>
                                    <input type="file" name="category_banner">
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
$( "#addblogcategory").validate({
  rules: {
    supercategory:{
        required:true
    },
    category:{
        required:true
    },
    category_banner:{
        required:true
    },
    price:{ required:true}

  }
});

$(".category").change(function () {
    var category = $(this).val();
    var category_text = $(".category option:selected").text();               
    $(".category_text").val(category_text);
    

    if(category == 1){
        $(".course_price").css("display","block");

    }else{
         $(".course_price").css("display","none");
    }

});
</script>