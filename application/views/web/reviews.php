<div class="hero-section hero-background">
   <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div style="margin-top:100px"></div>
<!--Start rev-->
<div class="container">
	<?php foreach ($reviews as $key => $reviews_list) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="imgbox">
                     <?php 
						if ($reviews_list['user_image'] != "") {							
					 ?>
                    <img src="<?php echo base_url('assets/review_userimage/'.$reviews_list['user_image']);?>" class="review">
                <?php } ?>
				</div>
				<p><?php echo $reviews_list["review"]; ?></p>
				<h4><?php echo $reviews_list["name"]; ?> <br><br> 
					GOOGLE RATING &nbsp;&nbsp; 
					<?php for ($i=0; $i <$reviews_list["rating"] ; $i++) { ?>					
					<span>  <i class="fa fa-star" aria-hidden="true"></i> &nbsp;&nbsp; 
					</span>
				<?php } ?>
				</h4>
			</div>
		</div>
	</div>
	<div style="margin-top:50px"></div>
<?php } ?>
	

	<!--Start pagination-->
	<div class="biolife-panigations-block">
            <!-- <ul class="panigation-contain">
                <li><span class="current-page">1</span></li>
                <li><a href="#" class="link-page">2</a></li>
                <li><a href="#" class="link-page">3</a></li>
                <li><span class="sep">....</span></li>
                <li><a href="#" class="link-page">20</a></li>
                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul> -->
        <?php if (isset($links)) { ?>
        	<ul class="panigation-contain">
			<?php echo $links ?>
		</ul>
		<?php } ?>
    </div>

</div>
<!--End Rev -->
<div style="margin-top:100px"></div>