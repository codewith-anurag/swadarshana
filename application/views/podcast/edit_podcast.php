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
      <form method="POST" id="editpodcast" action="<?php echo base_url('podcast/update/'.$edit_podcast['id']) ?>"  enctype="multipart/form-data">
      <div class="card">            
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">                        
                        <div class="row">                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Podcast Image</label>
                                    <input type="file" name="podcastimage">
                                    <input type="hidden" name="old_podcastimage" value="<?php echo $edit_podcast['image']; ?>">
                                    <img src="<?php echo base_url('assets/podcastimage/'.$edit_podcast['image']) ?>" height="100">
                                </div>
                            </div> 
                        </div>                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Podcast Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Blog Title" value="<?php echo $edit_podcast['title'] ?>">
                                </div>
                            </div> 
                        </div>   
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">URL</label>
                                    <input type="text" name="url" class="form-control" placeholder="Podcast URL" value="<?php echo $edit_podcast['url'] ?>">
                                </div>
                            </div> 
                        </div>   
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Auther Name</label>
                                    <input type="text" name="authername" class="form-control" placeholder="Blog Auther Name" value="<?php echo $edit_podcast['authername'] ?>">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="badge">Description</label>
                                    <textarea name="description" class="form-control"><?php echo $edit_podcast['description'] ?></textarea>
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
$( "#editpodcast").validate({
  rules: {    
    
    title:{
        required:true
    },
    authername:{
        required:true
    },
    description:{
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