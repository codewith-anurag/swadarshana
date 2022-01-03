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
      <form method="POST" id="addblog" action="<?php echo base_url('blog/update/'.$edit_blog['id']) ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">                        
                        <div class="row">                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Blog Image</label>
                                    <input type="file" name="blogimage">
                                    <input type="hidden" name="old_blogimage" value="<?php echo $edit_blog['image']; ?>">
                                    <img src="<?php echo base_url('assets/blogimage/'.$edit_blog['image']) ?>" height="100">
                                </div>
                            </div> 
                        </div>                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Blog Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Blog Title" value="<?php echo $edit_blog['title'] ?>">
                                </div>
                            </div> 
                        </div>   
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Auther Name</label>
                                    <input type="text" name="authername" class="form-control" placeholder="Blog Auther Name" value="<?php echo $edit_blog['authername'] ?>">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Description</label>
                                    <textarea name="description" class="form-control"><?php echo $edit_blog['description'] ?></textarea>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Blog Category </label>
                                    <select class="form-control" name="category">
                                        <option selected="selected" value="">Select Blog Category</option>
                                        <?php foreach ($blogcategory as $blogcategoryvalue) {
                                            if ($edit_blog["category"] == $blogcategoryvalue["id"]) {                                               
                                        ?>
                                        <option value="<?php echo $blogcategoryvalue['id'] ?>" selected="selected"><?php echo $blogcategoryvalue['category'] ?></option>
                                    <?php }else{                                     
                                    ?>
                                    <option value="<?php echo $blogcategoryvalue['id'] ?>"><?php echo $blogcategoryvalue['category'] ?></option>
                                <?php } 
                                   }
                                ?>
                                    </select>
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
$( "#addblog").validate({
  rules: {    
    
    title:{
        required:true
    },
    authername:{
        required:true
    },
    description:{
        required:true
    },
    category:{
        required:true
    }
  }
});
</script>
<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/config.js') ?>"></script>
<script type="text/javascript">    
    CKEDITOR.replace('description');        
</script>