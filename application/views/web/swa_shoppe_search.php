<div class="hero-section hero-background">
    <h1 class="page-title">Swa Shoppe</h1>
</div>

<div class="mar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="main-content" class="main-content">
                    <!-- summary info -->
                    <!-- Tab info -->
                    <div class="product-tabs single-layout biolife-tab-contain" style="margin-top:5px;">                  
                        <div class="tab-content">                    
                            <div class="row">
                                <?php
                                foreach ($swashoppe as $swashoppe_list) {  //print_r($swashoppe_list);
                                    ?>
                                    <div class="col-md-4" style="margin-bottom:50px;">
                                        <article class="video-container">
                                            <?php  if ($swashoppe_list['category'] == 1) { ?>
                                            <a href="<?php echo base_url('web/swashoppe/login/'.$swashoppe_list['course_id']) ?>" class="thumbnail1">
                                                <img  src="<?php echo base_url('assets/swashoppe_category_banner/' . $swashoppe_list['coursebanner']);?>"  width="100%" height="100%" class="swashoppevideo"/> 
                                            </a>
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url('web/swashoppe/swa_shoppe_video/'.$swashoppe_list['course_id']); ?>" class="thumbnail1">
                                                <img  src="<?php echo base_url('assets/swashoppe_category_banner/' . $swashoppe_list['coursebanner']);?>"  width="100%" height="100%" class="swashoppevideo"/> 
                                                </a>
                                            <?php } ?>
                                            <div class="video-bottom-section">
                                                <div class="video-details">
                                                    <?php  if ($swashoppe_list['category'] == 1) { ?>
                                                        <a href="<?php echo base_url('web/swashoppe/login/'.$swashoppe_list['course_id']) ?>"  class="video-title"><?php echo $swashoppe_list['course_title']; ?></a>
                                                    <?php }else{ ?>
                                                        <a href="<?php echo base_url('web/swashoppe/swa_shoppe_video/'.$swashoppe_list['course_id']) ?>"  class="video-title"><?php echo $swashoppe_list['course_title']; ?></a>
                                                    <?php } ?>
                                                    <a href="swa_shoppe_video.php" class="video-channel-name"></a>
                                                    <div class="video-metadata">
                                                        <p class="discrip"><b>Total Video </b> <?php echo $swashoppe_list['totalvideo']; ?> </p>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <?php  if ($swashoppe_list['category'] == 1) { ?>
                                            <span style="margin:0px 15px 10px; font-weight: 700;"><i class="fa fa-inr"></i><?php echo $swashoppe_list["course_price"];?></span>                                     
                                                <a aria-label="Thanks" href="javascript:void(0)" data-productid="<?= $swashoppe_list['course_id']?>" data-productname="<?= $swashoppe_list['course_title']?>" data-productprice="<?= $swashoppe_list['course_price']?>" data-productimage="<?= $swashoppe_list['coursebanner']?>" data-productqty="1" class="addToCart h-button centered" data-text="Add To Cart">
                                                <span>T</span>
                                                <span>h</span>
                                                <span>a</span>
                                                <span>n</span>
                                                <span>k</span>
                                                <span>s</span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>                                                                                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/front/') ?>js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
    $(".addToCart").click(function() { 
        //alert(111)
       //window.scrollTo(0,0);
       $('html,body').animate({scrollTop:0},800);
    }); 
}); 
</script>