    <div class="hero-section hero-background">
            <h1 class="page-title"><?php echo $page_title; ?></h1>
    </div>
    <div class="mar">
        <div class="container">
            <!-- Main content -->
            <div id="main-content" class="main-content">

                <div class="row">                    
                    <div class="col-md-12 servicebox">
                        <div class="contain-product pr-detail-layout">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="<?php echo base_url('assets/podcastimage/'.$podcast['image']); ?>" alt="dd" width="500" height="500" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                            
                                            <h4 class="product-title" style="max-width: 750px;"><a href="#" class="pr-name"><?php echo $podcast["title"]; ?></a></h4>
                                            <b class="categories" style="max-width: 750px;">Date : <?php echo  date('F d,  Y',strtotime($podcast['today_date'])); ?> | Author : <?php echo $podcast["authername"]; ?></b>
                                            <?php echo $podcast["description"]; ?>
                                           <!--  <p class="excerpt" style="max-width: 750px;"> <a href="https://pod.co/swadarshana-self-discovery-with-manish-khernar/introduction-are-you-ready-to-discover-yourself" style="max-width: 750px;"> " https://pod.co/swadarshana-self-discovery-with-manish-khernar/introduction-are-you-ready-to-discover-yourself "</a></p>
                                            <p class="excerpt" style="max-width: 750px;">From,<br>
                                            Manish Khernar, MD(AM), Hypnotherapist & Spiritual Healer and Counselor<br>
                                            Founder of Swa-Darshana, “An Appointment with Your .. Self !”</p> -->

                                            
                                        </div>
                        </div>
                    </div>
            </div>
            <div style="margin-top:30px;"></div>
        </div>
    </div>