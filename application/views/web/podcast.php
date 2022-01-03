    <div class="hero-section hero-background">
            <h1 class="page-title"><?php echo $page_title ?></h1>
    </div>
    <div class="mar">
        <div class="container">
            <!-- Main content -->
            <div id="main-content" class="main-content">
                <div class="row">
                    <?php 
                        foreach ($podcast as  $podcastvalue) {                           
                     ?>
                    <div class="col-md-4 servicebox">
                        <div class="post-item effect-04 style-bottom-info">
                            <div class="thumbnail">
                                <a href="#" class="link-to-post"><img src="<?php echo base_url('assets/podcastimage/'.$podcastvalue['image']) ?>" width="370" height="270" alt=""></a>
                            </div>
                            <div class="post-content">
                                <h4 class="post-name"><a href="#" class="linktopost"><?php echo $podcastvalue["title"]; ?></a></h4>
                                <!-- <p class="post-archive"><b class="post-cat">ORGANIC</b><span class="post-date"> / 20 Nov, 2018</span><span class="author">Posted By: Braum J.Teran</span></p> -->
                                <!-- <p class="excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate earum odio reprehenderit id consectetur beatae iste ea asperiores animi distinctio numquam, corporis natus et cumque assumenda illo quibusdam quo eligendi......</p> -->
                                <?php echo $podcastvalue["description"]; ?>
                                <div class="group-buttons">
                                    <a href="<?php echo ($podcastvalue['url'] !="") ?  $podcastvalue['url'] : '#' ?>" class="btn readmore" target="_blank">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>                    
                <?php } ?>
                </div>
            <div style="margin-top:30px;"></div>            
        </div>
        <div class="biolife-panigations-block ">
            <?php echo $links; ?>
                <!-- <ul class="panigation-contain">
                    <li><span class="current-page">1</span></li>
                    <li><a href="#" class="link-page">2</a></li>
                    <li><a href="#" class="link-page">3</a></li>
                    <li><span class="sep">....</span></li>
                    <li><a href="#" class="link-page">20</a></li>
                    <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul> -->
        </div>
    </div>