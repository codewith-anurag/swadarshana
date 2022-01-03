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
        <div id="response">
             <div class="row align-items-center">
                <div class="col">
                    <div class="progress">
                         <div id="file-progress-bar" class="progress-bar"></div>
                    </div>
                </div>
            </div>    
         </div>
        <form method="POST" 	 id="addvideotestimonial"   enctype="multipart/form-data">
            <div class="card">            
                <div class="card-body">
                      <div class="row album_category">                    
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Course</label>
                                <select name="course" class="form-control course_category">
                                    <option selected>Select Courses</option>
                                    
                                </select>
                                <input type="hidden" name="course_text" class="course_category_text"/>
                                       
                            </div>
                        </div>
                    </div>
                   <!-- 
                    <div class="row">                    
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Category</label>
                                <select name="category" class="form-control category" onchange="return get_course_category(this.value)">
                                    <option selected>Select Category</option>
                                    <?php
                                        //foreach ($category as $categoryvalue) {
                                        ?>
                                        <option  value="<?php //echo $categoryvalue['id'] ?>"><?php //echo $categoryvalue["title"] ?></option>
                                    <?php //} ?>
                                </select>
                                <input type="hidden" name="category_text" class="category_text"/>
                                       
                            </div>
                        </div>
                    </div> -->
                                                        
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Video Title">
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Video Thumbnail</label>
                                <input type="file" name="swashoppe_thumbnail" id="swashoppe_thumbnail" accept="image/*">
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Swa Shoppe Video</label>
                                <input type="file" name="video" id="video" accept="video/*">
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                        </div> 
                    </div>                                                         
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-sm float-left vid_upload_btn">
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
    $("#addvideotestimonial").validate({
        rules: {
            "course_category": {required: true},
            "video_thumbnail": {required: true},
            "video": {required: true},
            "title": {required: true},
            "description": {required: true}
        }
    });


    get_course_category();

    function get_course_category() {
        
        $.ajax({
            type:"POST",
            url: "<?php echo base_url('Swashoppe/get_album_category'); ?>",            
            success: function (data) {               
                var finalData = JSON.parse(data);               
                $(".course_category").empty();
                 $(".course_category").append("<option value=''>Select Course </option>");
                $.each(finalData,function (key, value){
                    $(".course_category").append("<option value='"+value.id+"'>" + value.title + "</option>");
                });
                var course_category_text = $(".course_category option:selected").text();
                $(".course_category_text").val(course_category_text);
            }
        });
    }


    $(document).ready(function(){  
      $('#addvideotestimonial').on('submit', function(e){  
           e.preventDefault();  
           var thumb = document.getElementById('swashoppe_thumbnail');
           var video = document.getElementById('video');

           if(!thumb.files[0])  
           {  
                //alert("Please Select the File");  
               // $("#swashoppe_thumbnail_error").text("Please Select Thumbnail Image");
           }  
           if(!video.files[0])  
           {  
               // $("#swashoppe_video_error").text("Please Select Video File");
                //alert("Please Select the Video File");  
           } 
           else  
           {  
               
                $.ajax({  
                     xhr: function() {
                        var xhr = new window.XMLHttpRequest();         
                        xhr.upload.addEventListener("progress", function(element) {
                            if (element.lengthComputable) {
                                var percentComplete = ((element.loaded / element.total) * 100);
                                $("#file-progress-bar").width(percentComplete.toFixed() + '%');
                                $("#file-progress-bar").html(percentComplete.toFixed() + '%');
                                $(".vid_upload_btn").attr("disabled", true);
                            }
                        }, false);
                        return xhr;
                    },
                    type:"POST",
                    url:"<?php echo base_url(); ?>Swashoppe/insert",                                            
                    data:new FormData(this),  
                    contentType: false,  
                    cache: false,  
                    processData:false,  
                    beforeSend: function(){
                        $("#file-progress-bar").width('0%');
                        
                    },
                     success:function(data)  
                     {  
                        
                        $(".ajax_success_message").html("<div class='alert alert-success alert-dismissible'> Swa Shoppe Video Upload Successfully    <button type='button' class='close' data-dismiss='alert'>&times;</button></div>");                                                    
                            setTimeout(function(){ window.location.href="<?php echo  base_url('Swashoppe'); ?>" },5000);
                            setTimeout(function(){ $(".ajax_success_message").hide();}, 5000);                      

                     }  
                });  
           }  
      });  
 });
</script>
