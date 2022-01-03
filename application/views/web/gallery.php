    <div class="hero-section hero-background">
            <h1 class="page-title"><?php echo $page_title; ?></h1>
    </div>

    <div class="page-contain blog-page">
        <div class="container">
            <!-- Main content -->
            <div id="main-content" class="main-content">
                
                <div class="gallery">
                    <?php foreach ($gallery as $gallery_list) {
                    ?>                      
                        <a href="<?php echo base_url('assets/galleryimage/'.$gallery_list['gallery_image']) ?>" data-lightbox="mygallery" data-title="Chocolate"><img src="<?php echo base_url('assets/galleryimage/'.$gallery_list['gallery_image']) ?>" class="gimg" alt="" style="width: 300px;height:200px;"/>
                    <?php } ?>
                   <!--  <a href="images/gallry/2.1.JPG" data-lightbox="mygallery"><img src="images/gallry/2.JPG" class="gimg" alt="">
                    <a href="images/gallry/3.1.JPG" data-lightbox="mygallery"><img src="images/gallry/3.JPG" class="gimg" alt="">
                    <a href="images/gallry/4.1.JPG" data-lightbox="mygallery" ><img src="images/gallry/4.JPG" class="gimg" alt="">
                    <a href="images/gallry/5.1.JPG" data-lightbox="mygallery" ><img src="images/gallry/5.JPG" class="gimg" alt="">
                    <a href="images/gallry/6.1.JPG" data-lightbox="mygallery"><img src="images/gallry/6.JPG" class="gimg" alt="">
                    <a href="images/gallry/7.1.JPG" data-lightbox="mygallery"><img src="images/gallry/7.JPG" class="gimg" alt="">
                    <a href="images/gallry/8.1.JPG" data-lightbox="mygallery"><img src="images/gallry/8.JPG" class="gimg" alt="">
                    <a href="images/gallry/9.1.JPG" data-lightbox="mygallery"><img src="images/gallry/9.JPG" class="gimg" alt="">
                    <a href="images/gallry/10.1.JPG" data-lightbox="mygallery"><img src="images/gallry/10.JPG" class="gimg" alt="">
                    <a href="images/gallry/11.1.JPG" data-lightbox="mygallery"><img src="images/gallry/11.JPG" class="gimg" alt="">
                    <a href="images/gallry/12.1.JPG" data-lightbox="mygallery"><img src="images/gallry/12.JPG" class="gimg" alt="">
                    <a href="images/gallry/13.1.JPG" data-lightbox="mygallery"><img src="images/gallry/13.JPG" class="gimg" alt="">
                    <a href="images/gallry/14.1.JPG" data-lightbox="mygallery"><img src="images/gallry/14.JPG" class="gimg" alt="">
                    <a href="images/gallry/15.1.JPG" data-lightbox="mygallery"><img src="images/gallry/15.JPG" class="gimg" alt="">
                    <a href="images/gallry/16.1.JPG" data-lightbox="mygallery"><img src="images/gallry/16.JPG" class="gimg" alt=""> 
                    <a href="images/gallry/17.1.JPG" data-lightbox="mygallery"><img src="images/gallry/17.JPG" class="gimg" alt=""> 
                    <a href="images/gallry/18.1.JPG" data-lightbox="mygallery"><img src="images/gallry/18.JPG" class="gimg" alt="">
                    <a href="images/gallry/19.1.JPG" data-lightbox="mygallery"><img src="images/gallry/19.JPG" class="gimg" alt="">
                    <a href="images/gallry/20.1.JPG" data-lightbox="mygallery"><img src="images/gallry/20.JPG" class="gimg" alt="">
                    <a href="images/gallry/22.1.JPG" data-lightbox="mygallery"><img src="images/gallry/22.JPG" class="gimg" alt="">
                    <a href="images/gallry/23.1.JPG" data-lightbox="mygallery"><img src="images/gallry/23.JPG" class="gimg" alt="">
                    <a href="images/gallry/24.1.JPG" data-lightbox="mygallery"><img src="images/gallry/24.JPG" class="gimg" alt="">
                    <a href="images/gallry/25.1.JPG" data-lightbox="mygallery"><img src="images/gallry/25.JPG" class="gimg" alt="">     -->  
                </div>
            </div>
</div>
</div>