<div class="hero-section hero-background">
    <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
 <div class="page-contain contact-us">

<div id="main-content" class="main-content">
    <div class="container">
            <div class="row">
                
                <?php foreach ($faq as  $faqvalue) {                
                ?>
                    <div class="col-12" style="margin-bottom:20px;">
                        <div class="faq-accordian">
                            <button class="accordion"><?php echo $faqvalue["question"]; ?></button>
                                <div class="panel">
                                     <p><?php echo $faqvalue['answer']; ?></p>                                     
                                </div>
                        </div>
                    </div>
                <?php } ?>   

                <div class="biolife-panigations-block">
                    <?php echo $links; ?>
                    
                </div>           
            </div>
         </div>
        </div>
    </div>