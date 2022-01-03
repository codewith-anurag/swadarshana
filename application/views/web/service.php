<div class="hero-section hero-background1" id="webbanner" <?php echo isset($service["banner_image"]) ? "style= background-image:url(" . base_url('assets/servicebanner_image/' . $service["banner_image"]) . ")" : ""; ?>></div>

<div class="hero-section hero-background1" id="mobilebanner" <?php echo isset($service["mobile_bannerimage"]) ? "style= background-image:url(" . base_url('assets/mobile_servicebannerimage/' . $service["mobile_bannerimage"]) . ")" : ""; ?>></div>
<div>
        <div class="container">
            <!-- Main content -->
            <div style="margin-top:50px;"></div>
            <div id="service_detail">

                <?php if($service["short_description"]!=""){ ?>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="banner-promotion-02">

                                <div class="biolife-banner promotion2 biolife-banner__promotion2">

                                    <div class="banner-contain">

                                        <div class="container">                            

                                            <!-- <div class="media"></div> -->

                                            <div class="text-content service_content">

                                                                   

                                                <?php echo isset($service["short_description"]) ? $service["short_description"] : "" ; ?>

                                            </div>

                                            

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> <!--End Row-->
            <?php } ?>



           

            <?php if($service["middle_description"]!=""){ ?>
            <div style="margin-top:50px;"></div>
            <div class="row">

                <div class="col-md-12 servicebox popback">

                    <div class="post-item effect-04 style-bottom-info">

                        <div class="post-content service_content" style="height:100%;">

                            <?php
                                    $string = str_replace("<strong>", "<h2  style='color:#f57f20'>", $service["middle_description"]);
                             echo isset($service["middle_description"]) ? str_replace("</strong>", "</h2>", $string)  : "";  ?>

                           

                        </div>

                    </div>

                </div>                    

            </div>
            
            <?php } ?>

            

           <?php if($service["long_description"]!=""){ ?>
            <div style="margin-top:50px;"></div>
            <div class="row">

                <div class="col-md-12 servicebox popback">

                    <div class="post-item effect-04 style-bottom-info">

                        <div class="post-content service_content" style="height:100%;">

                            <?php 
                            //$string = str_replace("<strong>", "<h2  style='color:#f57f20'>", $service["long_description"]);
                            echo isset($service["long_description"]) ? $service["long_description"] : "";  ?>

                            

                            <!-- <p class="qot"><strong> <?php //echo isset($service["last_heding"]) ? $service["last_heding"] : "";  ?> </strong> </p>  -->

                        </div>

                    </div>

                </div>

            </div>
             
            <?php } ?>

            

            <!-----------------------------  All Sub Services -------------------------------------------------------------------------------------------->

            <div class="row">
            

                <?php
                foreach ($subservice as $subservicevalue) {
                    ?>
                    <div class="col-md-4 servicebox">
                        <div class="post-item effect-04 style-bottom-info">
                            <div class="thumbnail">
                                <a href="<?php echo base_url('service/'.$subservicevalue['slug'] ) ?>" class="link-to-post"><img src="<?php echo base_url('assets/popupservice_image/' . $subservicevalue["serviceimage"]) ?>" width="370" height="270" alt="" ></a>
                            </div>
                            <div class="post-content">
                                <h4 class="post-name"><a href="<?php echo base_url('service/'.$subservicevalue['slug'] ) ?>" class="linktopost"><?php echo $subservicevalue["title"] ?></a></h4>                                
                                <?php if ($subservicevalue["description"]!="") {

                                    $businessDesc = strip_tags($subservicevalue["description"]);
                                    $businessDesc = substr($businessDesc, 0, 199);
                                    
                                 ?>
                                <p class="excerpt"><?php echo $businessDesc."..."; ?></p>
                            <?php } ?>
                            <p class="excerpt"></p>
                                <div class="group-buttons">
                                    <a href="<?php echo base_url('service/'.$subservicevalue['slug'] ) ?>" class="btn readmore" >read more</a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                <?php } ?>
            </div>                 
            <div style="margin-top:50px;"></div>

        </div>

    </div>
</div>


<script src="<?php echo base_url('assets/front/') ?>js/jquery-3.4.1.min.js"></script>

<script type="text/javascript">

 function get_subservice_detail(subserviceid) {

    var URL = "<?php echo base_url('assets/popupservice_image/') ?>";

    $.ajax({

        url: '<?php echo base_url('frontend/services/get_popupservice_detail') ?>',

        type: 'post',

       // contentType: "application/json",

        dataType: "json",

        data: {subserviceid: subserviceid},

        success: function(response){                        

            $(".subservicetitle").empty();             

            $(".subservicetitle").html(response.title);             

            $(".subserviceimage").empty();

            $(".subserviceimage").html("<img src='"+URL+response.serviceimage+"' style='border-radius: 44px;'>");

            $(".subservicedescription").empty();             

            $(".subservicedescription").html(response.description);    

          // Display Modal

          //$('#empModal').modal('show'); 

        },

        error: function (jqXHR, textStatus, errorThrown) {

          alert(textStatus + " in pushJsonData: " + errorThrown + " " + jqXHR);

        }

    });

}

</script>