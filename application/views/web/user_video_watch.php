<div class="mar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="player">
                    <div class="youtube-player" >
                        <video width="100%" height="100%" controls  id="video" class="user_video" preload='t' data-videoid="<?= $videoresult['id'] ?>">
                          <source src="<?php echo base_url('assets/swashoppe_video/'.$videoresult['video']) ?>" type="video/mp4">
                        </video>                        
                    </div>
                    <div class="video-info">  <h2><?php echo $videoresult['title'];?></h2> </div>
                    <section class="channel-info">
                        <div class="description">          
                          <h4>Published on <?php echo date("M d, Y",strtotime($videoresult['publish_date']));  ?></h4>
                          <p class="text-justify"><?= $videoresult['description']; ?></p>
                        </div>                    
                    </section>
                </section>
            </div>       
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var vid = document.getElementById("video");
    function get_currenttime(){
        //console.log(vid.currentTime);
        return vid.currentTime;
    }
    vid.addEventListener("click",function(){
        var total_duration = vid.duration;
        var video_currentTime =  get_currenttime();
        var video = $(this).attr("data-videoid");
        var URL = "<?php echo  base_url('web/user_videos/track_user_video') ?>";
        $.ajax({
            url: URL,
            type: "post",
            data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
            success: function (response) {
                //console.log(response);
               // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });      
    });

    /*setInterval(function() {
        if (vid.paused && vid.readyState == 4 || !vid.paused) {
            vid.onseeking = function() {
                //alert("Seek operation began!");
                //alert(vid.currentTime);
                var total_duration = vid.duration;
                var video_currentTime =  get_currenttime();
                var video = $(this).attr("data-videoid");
                var URL = "<?php// echo  base_url('web/user_videos/track_user_video') ?>";
                $.ajax({
                    url: URL,
                    type: "post",
                    data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
                    success: function (response) {

                       // You will get response from your PHP page (what you echo or print)
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                }); 
            };
        }
    }, 5000);*/
    get_user_video_current_time();
    function get_user_video_current_time(){
        //alert(1);
        var video = $("#video").attr("data-videoid");
        var URL = "<?php echo  base_url('web/user_videos/get_current_time') ?>";
        $.ajax({
            url: URL,
            type: "post",
            data: {'video_id':video},
            success: function (response) {
                //console.log(JSON.parse(response));
                var obj = JSON.parse(response);
                if($.isEmptyObject(obj)) {
                    
                }else{
                    vid.currentTime = obj.pause_time;
                }                    
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });   
    }

        vid.played.end = function() {
            //alert("Seek operation began!");
            //alert(vid.currentTime);
            var total_duration = vid.duration;
            var video_currentTime =  get_currenttime();
            var video = $(this).attr("data-videoid");
            var URL = "<?php echo  base_url('web/user_videos/track_user_video') ?>";
            $.ajax({
                url: URL,
                type: "post",
                data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
                success: function (response) {

                   // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            }); 
        };

        vid.played.start = function() {
            //alert("Seek operation began!");
            //alert(vid.currentTime);
            var total_duration = vid.duration;
            var video_currentTime =  get_currenttime();
            var video = $(this).attr("data-videoid");
            var URL = "<?php echo  base_url('web/user_videos/track_user_video') ?>";
            $.ajax({
                url: URL,
                type: "post",
                data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
                success: function (response) {

                   // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            }); 
        };


   /* vid.onplay = function(){
        //alert(vid.currentTime);
        var total_duration = vid.duration;
        var video_currentTime =  get_currenttime();
        var video = $(this).attr("data-videoid");
        var URL = "<?php //echo  base_url('web/user_videos/track_user_video') ?>";
        $.ajax({
            url: URL,
            type: "post",
            data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
            success: function (response) {

               // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        }); 
    }*/

    vid.onpause = function(){
        //alert(vid.currentTime);
        var total_duration = vid.duration;
        var video_currentTime =  get_currenttime();
        var video = $(this).attr("data-videoid");
        var URL = "<?php //echo  base_url('web/user_videos/track_user_video') ?>";
        $.ajax({
            url: URL,
            type: "post",
            data: {'video_id':video,'total_duration':total_duration,'pausetime':video_currentTime},
            success: function (response) {

               // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        }); 
    }  
</script>