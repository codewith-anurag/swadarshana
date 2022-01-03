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
        <form method="POST" onsubmit="return set_validation();"	 id="addvideotestimonial" action="<?php echo base_url('Swashoppe/update/' . $editswashoppe['id']) ?>"  enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Category</label>
                                <select name="category" class="form-control category">
                                    <option selected disabled>Select Category</option>
                                    <?php
                                    /*foreach ($category as $categoryvalue) {
                                        if ($categoryvalue['id'] == $editswashoppe['swashoppe_category']) {
                                            $selected = "selected='selected'";
                                        } else {
                                            $selected = "";
                                        }
                                        ?>
                                        <option  value="<?php echo $categoryvalue['id'] ?>" <?php echo $selected; ?>><?php echo $categoryvalue["title"] ?></option>
                                    <?php } */?>
                                </select>
                                <input type="hidden" name="category_text" class="category_text"/>
                            </div>
                        </div>
                    </div> -->
                  
                    <div class="row album_category">                    
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Course</label>
                                <select name="course" class="form-control course_category">
                                    <option selected disabled>Select Course</option>
                                    <?php
                                            foreach ($course_category as $course_category_list) {
                                                if ($course_category_list['id'] == $editswashoppe['course_id']) {
                                                    $selected = "selected='selected'";
                                                } else {
                                                    $selected = "";
                                                }
                                        ?>
                                        <option  value="<?php echo $course_category_list['id'] ?>" <?php echo $selected; ?>><?php echo $course_category_list["title"] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="course_category_text" class="course_category_text"/>                                       
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Video Title" value="<?php echo $editswashoppe['title']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Video Thumbnail</label>
                                <input type="file" name="swashoppe_thumbnail" accept="image/*">
                                <input type="hidden" name="old_swashoppe_thumbnail" value="<?php echo $editswashoppe['thumbnail_image']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="float-right">
                                <img src="<?php echo base_url('assets/swashoppe_thumbnail/') . $editswashoppe['thumbnail_image']; ?>" height="100" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Swa Shoppe Video</label>
                                <input type="file" name="video" accept="video/*">
                                <input type="hidden" name="old_video" value="<?php echo $editswashoppe['video']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="float-right">
                                <video width="150" height="120" controls poster="<?php echo base_url('assets/swashoppe_thumbnail/') . $editswashoppe["thumbnail_image"] ?>">
                                    <source src="<?php echo base_url('assets/swashoppe_video/') . $editswashoppe["video"]; ?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="badge">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter Description"><?php echo $editswashoppe["description"]; ?></textarea>
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
    $("#addvideotestimonial").validate({
        rules: {
            "category": {required: true},
            "title": {required: true},
            "description": {required: true}
        }
    });
</script>