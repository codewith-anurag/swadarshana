<div class="hero-section hero-background">
  <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div class="container">
	<br>
	  <?php 
      if ($this->session->flashdata("success_message")) {					
      ?>
   <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    <?php echo  $this->session->flashdata("success_message"); ?>
   </div>
   <?php } ?>
   <?php 
      if ($this->session->flashdata("error_message")) {					
      ?>
   <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <?php echo  $this->session->flashdata("error_message"); ?>
   </div>
   <?php } ?>
	<div class="row">
			<div class="mar">
				<div class="container">
					<div class="row">
							<div class="col-md-12">
								<div id="cart_page_detail" class="table-responsive"></div>
		                           </div>
								</div><!--End Row -->
							</div>
					</div>
				</div>
			</div>
<script type="text/javascript">

</script>