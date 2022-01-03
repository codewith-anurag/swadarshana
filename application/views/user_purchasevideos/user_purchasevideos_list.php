<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/dataTables.bootstrap4.min.css">

<div class="main-panel">

    <div class="content-wrapper">

        <?php 

            if ($this->session->flashdata("success")) {                    

         ?>

         <div class="alert alert-success alert-dismissible">

            <button type="button" class="close" data-dismiss="alert">&times;</button>

             <?php echo $this->session->flashdata("success"); ?>

        </div>

        <?php } ?>

      <div class="page-header">

        <h3 class="page-title"> <?php echo $heding; ?> </h3>     

        
      </div>

       <div class="card">

          <div class="card-body">

            <table id="example" class="table table-striped table-bordered review_table " style="width:100%">

                <thead>

                    <tr>
                        
                        <th style="width:120px !important;">Customer Name</th>   
                        <th style="width:120px !important;">Video Title</th>
                        <th style="width:120px !important;">Video</th>   
                        <th style="width:120px !important;">Video Duration</th>                                           
                        <th style="width:120px !important;">Start Time</th>
                        <th style="width:120px !important;">Stop Time</th>
                        <th style="width:120px !important;">Total Watching Time</th>
                        <th style="width:120px !important;">Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php 

                        foreach ($user_videos as $user_videos_list) {       //print_r($user_videos);              

                    ?>

                    <tr>
                        <td><?php echo $user_videos_list["full_name"] ?></td>
                        <td><?php echo $user_videos_list["title"] ?></td>

                        <td> <a href="<?php echo base_url('assets/swashoppe_video/'.$user_videos_list["video"]); ?>" target="_blank" class="thumbnail1"><video width="150" height="120" muted="" loop="" class="swashoppevideo">
                                <source src="<?php echo base_url('assets/swashoppe_video/'.$user_videos_list["video"]); ?>" type="video/mp4">
                            </video></a>
                        </td>

                        <td><?php  
                            $seconds = floor($user_videos_list["total_duration"]);
                            $minutes = floor(($user_videos_list["total_duration"]  / 60) % 60);
                            $hours = floor($user_videos_list["total_duration"] / 3600);
                            if ($hours!=0 && $minutes!=0 &&  $seconds!=0) {
                                echo $duration = $hours.":".$minutes.":".$seconds;
                            }elseif ($minutes!=0 &&  $seconds!=0) {
                               echo $duration =  $minutes.":".$seconds;
                            }else{
                              echo $duration =  "0".":".$seconds; 
                            }
                           

                         ?></td> 
                       
                        <td><?php
                            $strat_time_seconds = floor($user_videos_list["strat_time"]);
                            $strat_time_minutes = floor(($user_videos_list["strat_time"]  / 60) % 60);
                            $strat_time_hours = floor($user_videos_list["strat_time"] / 3600);

                            if ($strat_time_hours!=0 && $strat_time_minutes!=0 &&  $strat_time_seconds!=0) {
                                echo $start_time = $strat_time_hours.":".$strat_time_minutes.":".$strat_time_seconds;
                            }elseif ($strat_time_minutes!=0 &&  $strat_time_seconds!=0) {
                               echo $start_time =  $strat_time_minutes.":".$strat_time_seconds;
                            }else{
                              echo $start_time =  "0".":".$strat_time_seconds; 
                            } 
                        ?></td> 
                        <td><?php 
                           $pause_time_seconds = floor($user_videos_list["pause_time"]);
                           $pause_time_minutes = floor(($user_videos_list["pause_time"]  / 60) % 60);
                           $pause_time_hours = floor($user_videos_list["pause_time"] / 3600);

                           if ($pause_time_hours!=0 && $pause_time_minutes!=0 &&  $pause_time_seconds!=0) {
                               echo $pause_time = $pause_time_hours.":".$pause_time_minutes.":".$pause_time_seconds;
                           }elseif ($pause_time_minutes!=0 &&  $pause_time_seconds!=0) {
                              echo $pause_time =  $pause_time_minutes.":".$pause_time_seconds;
                           }else{
                             echo $pause_time =  "0".":".$pause_time_seconds; 
                           } 
                        ?></td>
                         <td><?php 
                           $watching_duration_seconds = floor($user_videos_list["watching_duration"]);
                           $watching_duration_minutes = floor(($user_videos_list["watching_duration"]  / 60) % 60);
                           $watching_duration_hours = floor($user_videos_list["watching_duration"] / 3600);

                           if ($watching_duration_hours!=0 && $watching_duration_minutes!=0 &&  $watching_duration_seconds!=0) {
                               echo $watching_time = $watching_duration_hours.":".$watching_duration_minutes.":".$watching_duration_seconds;
                           }elseif ($watching_duration_minutes!=0 &&  $watching_duration_seconds!=0) {
                              echo $watching_time =  $watching_duration_minutes.":".$watching_duration_seconds;
                           }else{
                             echo $watching_time =  "0".":".$watching_duration_seconds; 
                           } 
                        ?></td>
                        <td>

                            <a href="<?php echo base_url('user_trackingvideos/get_user_video_tracking_detail/'.$user_videos_list["user_id"]) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <!-- <a href="<?php //echo base_url('blog/delete/'.$blog_list['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a> -->
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

                <tfoot>

                    <tr>
                        
                        <th style="width:120px !important;">Customer Name</th> 
                        <th style="width:120px !important;">Video Title</th>  
                        <th style="width:120px !important;">Video</th>   
                        <th style="width:120px !important;">Duration</th>                                           
                        <th style="width:120px !important;">Start Time</th>
                        <th style="width:120px !important;">Pause Time</th>  
                        <th style="width:120px !important;">Total Watching Time</th>
                        <th style="width:120px !important;">Action</th>

                    </tr>

                </tfoot>

            </table>

      </div>

    </div>

</div>

<!-- partial:partials/_footer.html -->

<footer class="footer">

      <div class="d-sm-flex justify-content-center justify-content-sm-between">

        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://www.swadarshana.com/"> Swadarshana </a> </span>

      </div>

</footer>

</div>

<!-- content-wrapper ends -->

<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url('assets') ?>/js/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url('assets') ?>/js/datatable/dataTables.bootstrap4.min.js"></script>





<script type="text/javascript">

    $(document).ready(function() {

    $('.review_table').DataTable({

        responsive: true,
        "ordering": false

    });

} );

</script>