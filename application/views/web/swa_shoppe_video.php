<!-- <div class="hero-section hero-background">
    <h1 class="page-title">Swa Shoppe</h1>
</div> -->

    <div class="mar">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
            <section class="player">
      <div class="youtube-player">
        <video width="100%" height="100%" controls id="currentvideo">
          <source src="<?php echo base_url('assets/swashoppe_video/'.$swashoppedetail['video']) ?>" type="video/mp4">
        </video>        
      </div>
      <div class="video-info video_title">  <h2><?php echo $swashoppedetail['title'] ?></h2> </div>

      	<section class="channel-info">      
			<div class="description">          
				<h4 class="publish_date">Published on <?php echo date("M d, Y",strtotime($swashoppedetail['publish_date']));  ?></h4>
				<p class="text-justify video_description"><?= $swashoppedetail['description'] ?></p>
				<!-- <p class="show-more">show more</p> -->
			</div>        
      	</section>

    </section>
            </div><!--col-md-7-->

            <div class="col-md-4">
            <section class="sidebar">
                <?php 
                $courses  = $this->uri->segment(4);
                $query = "SELECT * FROM swashoppe_master where course_id ='$courses'";
                $ex = $this->db->query($query);
                $suggetsted_video = $ex->result_array();
    
                  foreach($suggetsted_video as $suggetsted_videos){ 
                ?>
                <div class="suggested-video">
                    <div class="thumbnail2">
                    <video width="196" height="110" autoplay="" muted="" loop=""  onclick="switchVideo('<?php echo $suggetsted_videos['id'] ?>');">
                    <source src="<?php echo base_url('assets/swashoppe_video/'.$suggetsted_videos['video']) ?>" type="video/mp4">
                    </video>
                    
                    </div>
                    <div class="thumbnail2-info">
                    <a href="javascript:void(0)"  onclick="switchVideo('<?php echo $suggetsted_videos['id'] ?>');"><h5 class="sidetitle"><?php echo $suggetsted_videos['title'] ?></h5></a>
                    <div class="channel"><p class="text-justify"><?=  substr($suggetsted_videos['description'], 0, strrpos(substr($suggetsted_videos['description'], 0, 100), ' ')) . '...'?></p></div>
                    <div class="views">Published on <?php echo date("M d, Y",strtotime($suggetsted_videos['publish_date']));  ?></div>
                    </div>
                </div>
                <?php } ?>               
             </section>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function switchVideo(video_ID) {	
	$.ajax({   

        type: "POST",
        url: "<?php echo base_url('web/user_videos/get_video_single');?>",  
		data : { 'video_id' : video_ID},
        dataType: "json",   //expect html to be returned                
        success: function(response){   
			console.log(response);           
            var video_URL = "<?php echo base_url('assets/swashoppe_video/') ?>";
            $(".currentvideo").empty();
			$(".currentvideo").html("<source src="+video_URL+response.video+" type='video/mp4'>");
            $(".video_title").empty();
            $(".video_title").html("<h2>"+response.title+"</h2>");
			$(".video_description").empty();
			$(".video_description").html(response.description);

            var date = new Date(response.publish_date);
            var newDate = date.toString('M d, Y');

            $(".publish_date").empty();
            $(".publish_date").html("<h4 class='publish_date'> Published on "+newDate+"</h4>");
    		$(".currentvideo").load();
        }

    });
	
}
</script>