<div class="hero-section hero-background">
   <h1 class="page-title">Event Detail</h1>
</div>
<div class="mar">
   <div class="container">
      <!-- Main content -->
      <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <!--Single Post Contain-->
         <div class="single-post-contain">
            <div class="post-head">
               <div class="thumbnail">
                  <figure><img src="<?php echo base_url('assets/eventimage/'.$event['image']) ?>" width="100%" height="635" alt=""/></figure>
               </div>
               <h2 class="post-name"><?php echo $event['title'] ?></h2>
               <!-- <p class="post-archive"><b class="post-cat">ORGANIC</b><span class="post-date"> August 12, 2019 </span><b class="post-cat">Author:</b><span class="author">Shami Shah - PA to MD</span></p> -->
            </div>
            <div class="post-content">
               <!-- <p>" We smashed the door of her room and we saw her sleeping forever, she was quite and cold.. Lorem ipsum dolor sit,
                   amet consectetur adipisicing elit. Animi, perspiciatis eveniet! Cum asperiores amet incidunt consectetur dolorem
                   delectus in laborum eum deleniti culpa, rem minus animi, quis excepturi quasi laboriosam inventore nemo sequi
                   ducimus maiores explicabo enim. Ullam, ad eveniet pariatur molestiae voluptates sint velit maiores esse! Vitae,
                   repellendus doloribus.</p>

                   <p>" We smashed the door of her room and we saw her sleeping forever, she was quite and cold.. Lorem ipsum dolor sit,
                   amet consectetur adipisicing elit. Animi, perspiciatis eveniet! Cum asperiores amet incidunt consectetur dolorem
                   delectus in laborum eum deleniti culpa, rem minus animi, quis excepturi quasi laboriosam inventore nemo sequi
                   ducimus maiores explicabo enim. Ullam, ad eveniet pariatur molestiae voluptates sint velit maiores esse! Vitae,
                   repellendus doloribus.</p> -->
                   <?php echo $event['description'] ?>
            </div>
         </div>
      </div>
   </div>
   <!--End Container-->
</div>
<!--End mar-->
