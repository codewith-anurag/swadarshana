<div class="hero-section hero-background">
   <h1 class="page-title"><?php echo $page_title ?></h1>
</div>
<div class="" style="background-color: #f0f0f0;">
<div class="container">
   <!-- Main content -->
   <div id="main-content" class="main-content">
	<section>
		<div class="container">
			<div style="margin-top:30px"></div>		
			<div class="row" style="background-color:#323d6b; height:95px;">
				<form method="GET" action="<?php echo base_url('web/reviews/search_videotestimonial') ?>">
					<div class="col-md-3" style="margin-top:12px;">				
						<select class="form-controls" name="category">
								<option selected="selected">Select Category</option>
								<?php 
									$categorys = $_GET['category'];
								 ?>
								<option value="0" <?php echo ($categorys == 0) ? "selected='selected'" : '' ?>>All</option>
								<?php 
									foreach ($category as $key => $value) {	//print_r($category);exit;
									
									if ($value->id == $categorys) {
									   $selected = "selected='selected'";
									}else{
										$selected = "";
									}
								?>
								<option value="<?php echo $value->id; ?>" <?php echo $selected; ?>><?php echo $value->category;  ?></option>
							<?php } ?>
						</select>	
					</div>
					<div class="col-md-3" style="margin-top:12px;">				
						<input type="submit" name="" class="btn btn-primary" style="outline: none;border-color:#f57f20 ; background-color: #f57f20; color: #fff;">
						<a href="<?php echo base_url('web/reviews/videotestimonial') ?>" class="btn btn-submit" style="outline: none; background-color: #f57f20; color: #fff;">Reset</a>
					</div>
				</form>
			</div>	
			<div style="margin-top:30px"></div>		
			<div class="row">
				<?php foreach ($videotestimonial as  $videotestimonial_list) {
				?>
				<div class="col-md-3">
					<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg-se42_<?php echo $videotestimonial_list['id'];?>">
						<div class="post-item effect-01 style-bottom-info layout-03">
							<div class="thumbnail videotestimonial_thumbnail">
								<img src="<?php echo base_url('assets/videotestimonial_thumbnail/').$videotestimonial_list['video_thumbnail'] ?>" width="370" height="270" alt="">
							</div>
							<div class="post-content">
								<h4 class="post-name"><?php echo $videotestimonial_list['title'] ?></h4>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>				
			</div>		
			
			 <!--Start Video Testimonial-->    
    		<?php foreach ($videotestimonial as  $videotestimonial_list) {
    			?>
			    <div class="modal fade bd-example-modal-lg-se42_<?php echo $videotestimonial_list['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			        <div class="modal-dialog modal-lg">
			            <div class="modal-content popback" style="margin-top:154px;">
			            <div class="modal-header header123">
			                <span class="modal-title" id="exampleModalLabel"><?php echo $videotestimonial_list["title"] ?></span>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body">
			                <div class="row">
			                    <div class="col-md-12">
			                        <?php echo $videotestimonial_list["video"] ?>
			                    </div>
			                </div>
			                <br>
			            </div>
			            </div>
			        </div>
			    </div>
			<?php } ?>
   <!-- End Video Testimonial -->
			<div style="margin-top:30px;"></div>
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
	</section>
		
   </div>
</div>
