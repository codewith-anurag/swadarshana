<div class="hero-section hero-background">
    <h1 class="page-title"><?php echo $page_title; ?></h1>

    <?php 
        $purchase_video = array();
      /*if($this->session->userdata("id")){*/
        //echo $userID = $this->session->userdata("id");exit;
        $purchase_video = $this->db->query("select swashoppe_master.id,video_purchase_details.user_id,video_id from swashoppe_master join video_purchase_details on swashoppe_master.id =  video_purchase_details.video_id where video_purchase_details.user_id = '25'")->row();
    
      /*}*/
    ?>
</div>
<?php
    $tab_menu = '';
    $tab_content = '';
    $i = 0;
    foreach ($category as $category_list) {
    	if ($i == 0) {
    		$tab_menu = '<li class="tab-element active tabing123 tab_' . $category_list["id"] . '" id="tabmenu_' . $category_list["id"] . '" data-id=' . $category_list["id"] . ' onclick="return active_tab(' . $category_list["id"] . ')"><a href="#' . $category_list["id"] . '" data-toggle="tab">' . $category_list["title"] . '</a></li>';
    		$tab_content = '<div id="tab_' . $category_list["id"] . '" class="tab-pane desc-tab tabcontent_' . $category_list["id"] . ' active">';
      	} else {
      		$tab_menu .= '<li class="tab-element  tabing123  tab_' . $category_list["id"] . '" id="tabmenu_' . $category_list["id"] . '"  data-id=' . $category_list["id"] . ' onclick="return active_tab(' . $category_list["id"] . ')"><a href="#' . $category_list["id"] . '" data-toggle="tab">' . $category_list["title"] . '</a></li>';
      		$tab_content .= '<div id="tab_' . $category_list["id"] . '" class="tab-pane addtional-info-tab tabcontent_' . $category_list["id"] . '">';
        }
        
		$query = "SELECT swashoppe_course.id as course_id ,swashoppe_course.title as course_title,swashoppe_course.banner as coursebanner,swashoppe_course.price as course_price,swashoppe_course.category,COUNT(swashoppe_master.id) AS totalvideo FROM swashoppe_course,swashoppe_master WHERE swashoppe_master.course_id = swashoppe_course.id AND swashoppe_course.category=".$category_list['id']." Group by swashoppe_master.course_id";
        
        $ex = $this->db->query($query);
        $videoresult = $ex->result_array();
        if(!empty($videoresult) && $videoresult[0]['totalvideo'] != 0){
            foreach ($videoresult as $videoresult_list) {
                $tab_content .= '
                <div class="col-md-4">
                  <article class="video-container">';
                    if ($videoresult_list['category'] != 1) {
                        $url = '<a href="' . base_url('web/swashoppe/swa_shoppe_video/' . $videoresult_list['course_id']) . '" class="thumbnail1">';
                      }else{
                            $url = '<a href="' . base_url('web/swashoppe/login/' . $videoresult_list['course_id']) . '" class="thumbnail1">';
                        }
                        $tab_content .= $url.
                        '<img  src="' . base_url('assets/swashoppe_category_banner/' . $videoresult_list['coursebanner']) . '"  width="100%" height="100%" class="swashoppevideo"/>                        
                      </a>
                      <div class="video-bottom-section">
                        <div class="video-details">';
                          if ($videoresult_list['category'] != 1) {
                                $tab_content .= '<a href="' . base_url('web/swashoppe/swa_shoppe_video/' . $videoresult_list['course_id']) . '" class="video-title">' . $videoresult_list['course_title'] . '</a> <div id="meta"></div> ';
                          }else{
                            $tab_content .= '<a href="' .  base_url('web/swashoppe/login/'.$videoresult_list['course_id']) . '" class="video-title">' . $videoresult_list['course_title'] . '</a> <div id="meta"></div> ';
                          }
                          $tab_content .='<a href="swa_shoppe_video.php" class="video-channel-name"></a>
                          <div class="video-metadata">
                            <p class="discrip"><b>Total Video </b>' . $videoresult_list['totalvideo'] . '</p>
                          </div>
                        </div>
                      </div> ';
                      if(!empty($purchase_video)){
						 
                          if ($purchase_video->id == $videoresult_list['id'] && $this->session->userdata("id") ) {
                                $tab_content .= "<span style='margin:0px 15px 10px; font-weight: 700;''></span><a aria-label='Thanks'  class='addToCart h-button centered' data-text='Purchased'> <span>T</span>
                                <span>h</span>
                                <span>a</span>
                                <span>n</span>
                                <span>k</span>
                                <span>s</span></a>";
                          }else{
                            if ($videoresult_list['category'] == 1) {
                              $tab_content .= '<span style="margin:0px 15px 10px; font-weight: 700;"><i class="fa fa-inr"></i>  '.$videoresult_list["course_price"].'</span> <a aria-label="Thanks" href="javascript:void(0)" data-productid="'.$videoresult_list['course_id'].'" data-productname="'.$videoresult_list['course_title'].'" data-productprice="'.$videoresult_list['course_price'].'" data-productimage="'.base_url('assets/swashoppe_category_banner/' . $videoresult_list['coursebanner']).'" data-productqty="1" class=" addToCart h-button centered" data-text="Add To Cart">
                                <span>T</span>
                                <span>h</span>
                                <span>a</span>
                                <span>n</span>
                                <span>k</span>
                                <span>s</span>
                              </a>';
                            }
                        }                    
                    }else{
                        if ($videoresult_list['category'] == 1) {
                              $tab_content .= '<span style="margin:0px 15px 10px; font-weight: 700;"><i class="fa fa-inr"></i>  '.$videoresult_list["course_price"].'</span> <a aria-label="Thanks" href="javascript:void(0)" data-productid="'.$videoresult_list['course_id'].'" data-productname="'.$videoresult_list['course_title'].'" data-productprice="'.$videoresult_list['course_price'].'" data-productimage="'.base_url('assets/swashoppe_category_banner/' . $videoresult_list['coursebanner']).'" data-productqty="1" class=" addToCart h-button centered" data-text="Add To Cart">
                                <span>T</span>
                                <span>h</span>
                                <span>a</span>
                                <span>n</span>
                                <span>k</span>
                                <span>s</span>
                              </a>';
                        }
                    }
                $tab_content .= '</article></div>';
            }
        }
          $tab_content .= '</div>';
          $i++;
          }
?>
<div class="mar">
    <div class="container">
        <div class="alert alert-success" id="cartCount">
            <strong class="pull-left"><span>0</span> Video added in cart.</strong> 
            <a href="<?php echo base_url('web/swashoppe/checkout'); ?>"  class="btn btn-success pull-right">View Cart</a>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="main-content" class="main-content">
                    <!-- summary info -->
                    <!-- Tab info -->
                    <div class="product-tabs single-layout biolife-tab-contain" style="margin-top: 50px;">
                        <div class="tab-head">
                            <ul class="tabs">
                                <?php echo $tab_menu; ?>
                            </ul>
                            <div class="header-search-bar layout-01 searchtab">
                                <form action="<?php echo base_url('web/swashoppe/search'); ?>" class="form-search" name="desktop-seacrh" method="post">
                                    <input type="text" name="swavideo" class="input-text" value="" placeholder="Search here...">
                                    <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                                </form>
                            </div>
                            <!--header-search-bar layout-01-->
                        </div>
                        <!--tab-head-->
                        <div class="tab-content">
                            <?php echo $tab_content; ?>
                        </div>
                        <!--End tab-content-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
    <!--End Row -->
</div>
<!--End Containr-->
</div><!--End mar-->
<script src="<?php echo base_url('assets/front/') ?>js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function active_tab(catid) {
		
		$(".tabing123").removeClass("active");
		$("#tabmenu_" + catid).addClass('active');
		$(".tab-pane").removeClass("active");
		$("#tab_" + catid).addClass('active');
    }
    

 
$(document).ready(function() { 
    $(".addToCart").click(function() { 
        //alert(111)
       //window.scrollTo(0,0);
       $('html,body').animate({scrollTop:0},800);
    }); 
}); 
        
</script>