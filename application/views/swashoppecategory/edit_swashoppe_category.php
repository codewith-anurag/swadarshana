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
      <form method="POST" id="addblogcategory" action="<?php echo base_url('SwashoppeCategory/update/'.$edit_swashoppecategory['id']) ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">   
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Category</label>
                                    <select name="supercategory" class="form-control category">
                                        <option selected disabled>Select Category</option>
                                        <?php
                                            foreach ($supercategory as $categoryvalue) {
                                                if($categoryvalue['id'] == $edit_swashoppecategory['category'] ){
                                                    $selected = "selected='selected'";
                                                }else{
                                                    $selected = " ";
                                                }
                                        ?>
                                            <option  value="<?php echo $categoryvalue['id'] ?>" <?php echo  $selected; ?>><?php echo $categoryvalue["title"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="category_text" class="category_text"/>
                                                                        
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="badge">Video Courses </label>
                                    <input type="text" name="category" value="<?php echo $edit_swashoppecategory['title'] ?>" class="form-control" placeholder="Enter Video Testimonial Category">
                                </div>
                            </div> 
                            <div class="col-lg-4 course_price" style="display: none;">
                                <div class="form-group">
                                    <label class="badge">Video Courses Price </label>
                                    <input type="number" name="price" class="form-control " placeholder="Enter Video Courses Price" value="<?php echo $edit_swashoppecategory['price'];?>">
                                </div>
                            </div>    
                        </div>                     
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Video Courses Banner</label>
                                    <input type="file" name="category_banner" class="" >
                                    <input type="hidden" value="<?php echo $edit_swashoppecategory['banner'] ?>" name="old_banner" class="form-control"/>
                                </div>
                            </div>  
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="badge">Video Courses Banner </label>
                                </br>   
                                    <img src="<?php echo base_url('assets/swashoppe_category_banner/'.$edit_swashoppecategory['banner'])  ?>" height="100">
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
$( "#addblogcategorys").validate({
  rules: {
    supercategory:{
        required:true
    },
    category:{
        required:true
    },   
    price:{ required:true,number:true}

  }
});
$(document).ready(function(){
    var category = $(".category").val();
    var category_text = $(".category option:selected").text();               
    $(".category_text").val(category_text);
    

    if(category == 1){
        $(".course_price").css("display","block");

    }else{
         $(".course_price").css("display","none");
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