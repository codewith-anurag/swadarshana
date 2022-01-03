<?php //include('includes/header.php'); ?>
<div class="page-contain">
   <!-- Main content -->
   <div id="main-content" class="main-content">
      <!--Block 01: Main slide-->
      <div class="main-slide block-slider" style="z-index:9999;">
         <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 1000, "autoplay":true}' >
           <?php foreach ($slider as $slidervalue) {
                    ?>
                    <li>

                        <div class="slide-contain slider-opt03__layout01">
                           <a href="<?php echo $slidervalue['url']; ?>" target="_blank"> <div class="media1" style="background-image: url(<?php echo base_url('assets/sliderimage/') . $slidervalue['slider_image'] ?>);"> </div></a>
                        </div>

                    </li>
                <?php } ?>

         </ul>
      </div>


      <section>
   <div class="row">
   <div class="col-12 col-md-6" style="padding-right:0px;" data-aos="fade-right">
      <img src="<?= base_url('assets/front/');?>images/IMG_20200724_134420.jpg" />
   </div>
   <div class="col-12 col-md-6" data-aos="fade-left">
      <div class="biolife-banner detail-product biolife-banner__detail-product">
         <div class="head-info" style="margin-top:50px; margin-left:30px;">
            <h3 class="text1" data-aos="fade-down">About Swadarshana</h3>
         </div>
         <div class="WORK-par-main">
            <div class="WORK-par-1" style="width:auto;">
               <div class="WORK-txt-bx" style="margin-top:30px; margin-right:30px;">
                  <p class="WORK-desc" style="padding-left:30px;">The human brain is more complex than any other known structure in the universe. And tapping into the immense potential of the conscious and subconscious mind to seek answers, find root causes and create life-long permanent solutions to stress, disorders, phobias, anxieties and challenges is what we are all about. Welcome to SwaDarshana, a state-of-the-art healing &amp; experience centre that balances the most scientific approach with age-old spiritual values to transform your life in more ways than you could imagine.</p>
                  <p class="WORK-desc" style="padding-left:30px;">SwaDarshana, the name combines ‘Swa’ (meaning, the self) and ‘Darshana’ (meaning, an auspicious glimpse). We help you connect with your own inner self, your subconscious (or unconscious) mind at the deepest level to transform your outlook, recharge your energies and deep-dive into the exact root cause behind your challenges. We use the power of Hypnotherapy to help deal with anxiety, depression, fear, phobia, stress, channelizing emotions, inner healing, goal setting, identifying life-purpose and deal with the traumatic state of physical or mental conditions...<a href="<?php echo base_url().'web/about#about1'; ?>">Read More...</a></p>
                  <!--<p class="WORK-desc" style="padding-left:30px;">Besides, Hypnotherapy, SwaDarshana  is equipped with one of its kind Consecrated Meditative space that leads an individual to different dimension of meditation and peace. </p>-->
                  <!--<p class="WORK-desc" style="padding-left:30px;">Also is our space for Sound Healing – the ONLY ONE OF ITS KIND DARK ROOM THERAPY – IT TAKES an individual to  the most unexplored space of inner worlds. Our special group session on FULL MOON day is only an experience to FEEL and HEAL....<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg-about1">Read More...</a> </p>-->
                  <p class="WORK-desc" style="padding-left:30px; font-weight: 600;">SWADARSHANA THERAPIES can help you in: </p>
                  <!-- <a href=""><p class="WORK-desc" data-toggle="modal" data-target=".bd-example-modal-lg-se1">Read More...</p></a> -->
                  <div class="work-list" style="margin-top: 25px;">
                     <ul style="padding-left:20px;">
                        <li><i class="fa fa-angle-right"></i> HEALING TRAUMA </li>
                        <li><i class="fa fa-angle-right"></i> OVERCOMING FEAR OR PHOBIAS </li>
                        <li><i class="fa fa-angle-right"></i> ACCESSING PEAK PERFORMANCE </li>
                        <li><i class="fa fa-angle-right"></i> STAYING STRESS AND ANXIETY FREE </li>
                        <li><i class="fa fa-angle-right"></i> BUILD CONFIDENCE </li>
                        <li><i class="fa fa-angle-right"></i> SLEEP BETTER </li>
                        <li><i class="fa fa-angle-right"></i> LOSING WEIGHT </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



   <section>
   <div class="row">
      <div class="col-12 col-md-6" data-aos="fade-right">
         <div class="WORK-par-main">
            <div class="WORK-par-1" style="width:auto;">
               <div class="WORK-txt-bx" style="margin:auto;margin-top:50px; margin-right:30px;">
                  <!-- <div class="WORK-icon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                    </div> -->
                  <h1 class="WORK-tit" data-aos="fade-down">Manish Khernar</h1>
                  <h3 class="WORK-tit1" style="font-size: 16px; margin-top: -16px;">Professional Celebrity Life Coach & Hypnotherapist, (C.Ht.), MD(AM), B.E.(EC)</h3>
                  <p class="WORK-desc" style="padding-right:0px;"> Manish Khernar is the only full-time professional Hypnotherapist in India. A versatile, multi-talented
person, Manish Khernar is also a keynote public speaker, an anchor, a theatre artist who enjoys scripting
and direction. He has been serving clients across the globe and has successfully helped innumerable
people get over obstacles, phobias and related challenges. He continues to develop and improvise his
specialized Hypnotic systems by continuously upgrading the latest global healing techniques. Manish
Khernar has been trained by globally renowned institutes of Hypnotherapy and thereby, he blends
various modalities of Clinical Hypnotherapy techniques like Past Life Regression, Inner Child Therapy,
Spirituality, Sound Healing, Quantum Healing etc. to deliver powerful interventions resulting in
restoration &amp; optimization of overall well being across physical, emotional, social and spiritual wellness.
Manish Khernar believes in holistic healing and hence he does not restrict his healing experience under
any one particular intervention and understands the overall requirement of every client from a long-
term perspective before suggesting customized healing solutions. </p>
                  <!--<p class="WORK-desc" style="padding-right:0px;">Manish-the only full time Professional Hypnotherapist in India had been Telcos professional for more than a decade. A visionary, versatile, multi talented persona – He is also a key note public speaker, an anchor, a theatre artist, director and writer. Manish serves globally with a zest of Dynamic Hypnotherapy and improved lives of countless clients that needed hypnosis to get over an obstacle, phobia or behavior and  has continued to develop and improve his specialized hypnotic systems in almost every area of mental and even physical trauma. </p>-->
                  <!--<p class="WORK-desc" style="padding-right:0px;"> Manish - The most sought after full time HYPNOTHERAPIST WORLD OVER – is trained by global renowned Schools of Hypnotherapy and is certified and professional member of  IMDHA (International Medical & Dental Hypnotherapy Association), EKAA etc. In addition to his counseling and hypnotherapy work Manish blends  various modalities of  Clinical Hypnotherapy Techniques as Past Life Regression,  Inner Child Therapy , Spirituality , Sound Healing, Quantum Healing etc in Consciousness, MindBody and Energy realms of human existence to deliver compassionate, elegant and powerful interventions to restore and optimize overall well being in various aspects of life including Physical , Emotional , Social and Spiritual Wellness. </p>-->
                  <!-- <a href=""><p class="WORK-desc" data-toggle="modal" data-target=".bd-example-modal-lg-se1">Read More...</p></a> -->
                  <div class="work-list" style="margin-left: 40px;">
                  <ul>
                     <li><i class="fa fa-angle-right"></i> Certified Integrated Clinical Hypnotherapist from EKAA [School of Hypnotherapy] </li>
                     <li><i class="fa fa-angle-right"></i> 	Doctor of Alt Medicines from the Indian Board of Alt Medicines </li>
                     <li><i class="fa fa-angle-right"></i>  Pre &amp; Post Surgery Hypnotherapy from American Hypnosis Association, California </li>
                     <li><i class="fa fa-angle-right"></i> 	Spirit Releasement Therapy from 5Path Hypnosis, Texas </li>
                     <li><i class="fa fa-angle-right"></i> 	Certified Sound Healer, Kathmandu Centre of Healing, Nepal </li>
                  </ul>
                  </div>
                  <p class="WORK-desc" style="padding-right:0px;"> <a href="<?php echo base_url().'web/about#about2'; ?>"> Read More .... </a> </p>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-md-6" style="padding-left:0px;" data-aos="fade-left">
         <img src="<?= base_url('assets/front/');?>images/inner_home_05_01.jpg" />
      </div>
   </div>

   
   </section>
   </div>
</div>
