    <div class="hero-section hero-background">
            <h1 class="page-title"><?php echo $page_title ?></h1>
    </div>
    <div class="mar">
        <div class="container">
            <!-- Main content -->
            <div id="main-content" class="main-content">                
                <div class="row">
                    <?php foreach ($event as $eventlist) {                    
                    ?>
                    <div class="col-md-4 servicebox">
                        <div class="post-item effect-04 style-bottom-info">
                            <div class="thumbnail">
                                <a href="#" class="link-to-post"><img src="<?php echo base_url('assets/eventimage/').$eventlist["image"] ?>" width="370" height="270" alt=""></a>
                            </div>
                            <div class="post-content">
                                <h4 class="post-name"><a href="#" class="linktopost"><?php echo $eventlist["title"] ?></a></h4>
                                <!-- <p class="post-archive"><b class="post-cat">ORGANIC</b><span class="post-date"> / 20 Nov, 2018</span><span class="author">Posted By: Braum J.Teran</span></p> -->
                                <p class="excerpt"><?php echo  strlen(strip_tags($eventlist["description"])) >= 500 ? substr(strip_tags($eventlist["description"]), 0, 105) . '...' : strip_tags($eventlist["description"]); ?></p>
                                <div class="group-buttons">
                                    <a href="<?php echo base_url('web/event/event_detail/'.$eventlist["id"]) ?>" class="btn readmore">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>                    
                </div>  
                <div class="biolife-panigations-block">
                <?php if (isset($links)) { 
                    echo $links;
                } ?>                 
                </div> 
            <div style="margin-top:30px;"></div>
        </div>
    </div>