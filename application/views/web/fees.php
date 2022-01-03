<div class="hero-section hero-background">
   <h1 class="page-title"><?= $page_title ?> </h1>
</div>
<div class="mar">
<div class="container">
   <!-- Main content -->
   <div style="margin-top:50px;"></div>
   <div>
      <div class="row" data-aos="fade-down">
         <!--<div class="col-md-12"> <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, quasi velit repellat sunt ducimus iure.  </p> </div>-->
         <div class="col-md-12"> 
             <?php 
              foreach ($fees as $fees_list){
                echo  $fees_list["description"];
              }
             ?>
             
         </div>
      </div>
      <div style="margin-top:30px;"></div>
   </div>
</div>

<div style="margin-top:50px;"></div>