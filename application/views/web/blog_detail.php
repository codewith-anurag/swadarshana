<div class="hero-section hero-background">
   <h1 class="page-title"><?php echo $blog_detail["title"]; ?></h1>
</div>
<div class="mar">
   <div class="container">
      <!-- Main content -->
      <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <!--Single Post Contain-->
         <div class="single-post-contain">
            <div class="post-head">
               <div class="thumbnail">
                  <figure><img src="<?php echo base_url('assets/blogimage/'.$blog_detail['image']) ?>" width="100%" height="635" alt=""></figure>
               </div>
               <h2 class="post-name"><?php echo $blog_detail["title"]; ?></h2>
               <p class="post-archive"><b class="post-cat"><?php echo $blog_detail["blogcategory"]; ?></b>&nbsp;<span class="post-date"><?php echo  date('F d,  Y',strtotime($blog_detail['today_date'])); ?></span>&nbsp;<b class="post-cat">Author:</b><span class="author"><?php echo $blog_detail["authername"]; ?></span></p>
            </div>
            <div class="post-content">
               <?php echo $blog_detail["description"]; ?>
            </div>
         </div>
      </div>
   </div>
</div>