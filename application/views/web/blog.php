    <div class="hero-section hero-background">
            <h1 class="page-title"><?php echo $page_title; ?></h1>
    </div>

    <div class="mar">
    <div class="container">
            <div class="row">
                <!-- Main content -->
                <div id="" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <ul class="posts-list main-post-list">
                        <?php foreach ($blog as $blogvalue) {                            
                        ?>
                        <li class="post-elem">
                            <div class="post-item style-left-info">
                                <div class="thumbnail">
                                    <a href="#" class="link-to-post"><img src="<?php echo base_url('assets/blogimage/').$blogvalue['image'] ?>" width="370" height="270" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h6 class="post-name"><a href="<?php echo base_url('web/blog/blog_detail/'.$blogvalue['blogid']) ?>" class="linktopost"><?php echo $blogvalue['title'] ?></a></h6>
                                    <p class="post-archive"><b class="post-cat"><?php echo $blogvalue['blogcategory'] ?></b>    <span class="post-date"><?php echo  date('F d,  Y',strtotime($blogvalue['today_date'])); ?>  </span><span class="author"><b class="post-cat"> Author: </b> <?php echo $blogvalue['authername'] ?> </span></p>
                                    <p class="excerpt"><?php echo strlen($blogvalue['description']) >= 200 ? substr($blogvalue['description'], 0, 190) . '...' :$blogvalue['description'];?></p>
                                    <div class="group-buttons">
                                        <a href="<?php echo base_url('web/blog/blog_detail/'.$blogvalue['blogid']) ?>" class="btn readmore">read more</a>
                                        <a href="https://www.facebook.com/SwaDarshana" class="btn count-number liked">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/in/manish-khernar-b550102/" class="btn count-number liked">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a href="https://twitter.com/Swa_Darshana" class="btn count-number liked">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="https://www.instagram.com/swadarshana_therapies/" class="btn count-number liked">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    
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

                <!-- Sidebar -->
                <aside id="sidebar" class="blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

                    <div class="biolife-mobile-panels">
                        <span class="biolife-current-panel-title">Sidebar</span>
                        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">×</a>
                    </div>

                    <div class="sidebar-contain">

                        <!--Search Widget-->
                        <div class="widget search-widget">
                            <div class="wgt-content">
                                <form action="<?php echo base_url('web/blog/search')  ?>" name="frm-search" method="get" class="frm-search">
                                    <input type="text" name="search" value="" placeholder="SEARCH..." class="input-text" required="required">
                                    <button type="submit" name="ok"><i class="biolife-icon icon-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!--Categories Widget-->
                        <!-- <div class="widget biolife-filter">
                            <h4 class="wgt-title">Categories</h4>
                            <div class="wgt-content">
                                <ul class="cat-list">
                                    <li class="cat-list-item"><a href="#" class="cat-link">Beauty (30)</a></li>
                                    <li class="cat-list-item"><a href="#" class="cat-link">Fashion (50)</a></li>
                                    <li class="cat-list-item"><a href="#" class="cat-link">Food (10)</a></li>
                                    <li class="cat-list-item"><a href="#" class="cat-link">Life Style (60)</a></li>
                                    <li class="cat-list-item"><a href="#" class="cat-link">Travel (10)</a></li>
                                </ul>
                            </div>
                        </div> -->

                        <!--Posts Widget-->
                        <div class="widget posts-widget">
                            <h4 class="wgt-title">Recent post</h4>
                            <div class="wgt-content">
                                <ul class="posts">
                                    <?php foreach ($recentblog as  $recentblogvalue) {                                    
                                    ?>
                                    <li>
                                        <div class="wgt-post-item">
                                            <div class="thumb">
                                                <a href="<?php echo base_url('web/blog/blog_detail/'.$recentblogvalue['blogid']) ?>"><img src="<?php echo base_url('assets/blogimage/').$recentblogvalue["image"]; ?>" width="80" height="58" alt=""></a>
                                            </div>
                                            <div class="detail">
                                                <h4 class="post-name"><a href="<?php echo base_url('web/blog/blog_detail/'.$recentblogvalue['blogid']) ?>"><?php echo $recentblogvalue["title"]; ?></a></h4>
                                                <p class="post-archive"><?php echo  date('F d,  Y',strtotime($recentblogvalue['today_date'])); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>                                  
                                </ul>
                            </div>
                        </div>

                        <!--Twitter Widget-->
                        <!-- <div class="widget twitter-widget">
                            <h4 class="wgt-title">Latest Tweets</h4>
                            <div class="wgt-content">
                                <ul class="content">
                                    <li>
                                        <div class="wgt-twitter-item">
                                            <div class="author"><a href="#"><img src="images/Services/PLR/Inner Child Healing.jpg" width="38" height="38" alt="author"></a></div>
                                            <div class="detail">
                                                <h4 class="account-info">
                                                    <a href="#" class="ath-name">Braum J. Teran</a>
                                                    <a href="#" class="ath-taglink">@real BraumTeran</a>
                                                </h4>
                                                <p class="tweet-content">@jakedonham President XI told me he appreciates that the U.S.<br><a href="#">http://company/googletzd</a></p>
                                                <div class="tweet-count">
                                                    <a class="btn responsed"><i class="fa fa-comment" aria-hidden="true"></i>2.9N</a>
                                                    <a class="btn liked"><i class="fa fa-heart" aria-hidden="true"></i>10N</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wgt-twitter-item">
                                            <div class="author"><a href="#"><img src="assets/images/blogpost/author.png" width="38" height="38" alt="author"></a></div>
                                            <div class="detail">
                                                <h4 class="account-info">
                                                    <a href="#" class="ath-name">Braum J. Teran</a>
                                                    <a href="#" class="ath-taglink">@real BraumTeran</a>
                                                </h4>
                                                <p class="tweet-content">@jakedonham President XI told me he appreciates that the U.S.<br><a href="#">http://company/googletzd</a></p>
                                                <p></p>
                                                <div class="tweet-count">
                                                    <a class="btn responsed"><i class="fa fa-comment" aria-hidden="true"></i>2.9N</a>
                                                    <a class="btn liked"><i class="fa fa-heart" aria-hidden="true"></i>10N</a>
                                                </div>
                                                <div class="viewall">
                                                    <a href="#" class="view-all">view all</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->

                        <!--Comments Widget-->
                        <!-- <div class="widget comment-widget">
                            <h4 class="wgt-title">Recent Comments</h4>
                            <div class="wgt-content">
                                <ul class="comment-list">
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Best Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                    <li>
                                        <p class="cmt-item"><a href="#" class="auth-name"><i class="biolife-icon icon-conversation"></i>Jessica Alba</a><a href="#" class="link-post">on Healthy Organics</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div> -->

                    </div>
                </aside>
            </div>
        </div>
    </div>