<style type="text/css">
    @media only screen and (max-width: 600px) {
          .label1{
            position: relative;
            left: 0%;
            display: block;
            margin-top: 20px;
        }
        .panel-default{
            padding: 20px;
        }
        h3{
        	 text-align: center;
        }
    }
</style>
<div class="hero-section hero-background">
   <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div style="margin-top:100px"></div>
<!--Start rev-->
<div class="container">
	<?php 
				if ($this->session->flashdata("success")) {					
			 ?>
			   <div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				  <strong>Sign up!</strong> <?php echo  $this->session->flashdata("success"); ?>
				</div>
			  <?php } ?>

			  <?php 
				if ($this->session->flashdata("fail")) {					
			 ?>
			   <div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				  <strong>Fail </strong> <?php echo  $this->session->flashdata("fail"); ?>
				</div>
			  <?php } ?>
	<div class="row">
		<div class="col-md-12">	
		  	
			<div class="panel panel-default">
  				<form method="post" action="<?php echo base_url('web/swashoppe/singup') ?>">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<h3> Create New Account </h3>
							<div class="form-group">
								<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Full Name</label>
								<input type="text" name="full_name" class="form-control" > 
							</div>
							<div class="form-group">
								<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Email</label>
								<input type="email" name="email" class="form-control" > 
							</div>
							<div class="form-group">
								<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Password</label>
								<input type="password" name="password" class="form-control" >
							</div>
							<div class="form-group">										
								<input type="submit" name="submit" class="btn btn-success btn-flat" value="Sign up">
								&nbsp;&nbsp;
								<a href="<?php echo base_url('web/swashoppe/login') ?>" class="btn btn-success">Login</a>
							</div>
						</div>
						<div class="col-md-3"></div>
						<br>

						<!-- <center>
							<div class="col-lg-12">
								<div class="col-lg-6">									
									<div class="form-group">
										<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Full Name</label>
										<input type="text" name="full_name" class="form-control" > 
									</div>						
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-6">									
									<div class="form-group">
										<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Email</label>
										<input type="email" name="email" class="form-control" > 
									</div>						
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="label" style="color:#000!important;font-size: 90%!important;line-height: 4!important;">Password</label>
										<input type="password" name="password" class="form-control" >
									</div>
														
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-6">
									<div class="form-group">										
										<input type="submit" name="submit" class="btn btn-success btn-flat" value="Singup">
										<a href="<?php echo base_url('web/swashoppe/login') ?>" class="btn-link pull-right">Login</a>
									</div>
												
								</div>
							</div>
						</center> -->

						
					</div>
				</form>

			</div>			
		</div>
	</div>
	<div style="margin-top:50px"></div>

</div>
<!--End Rev -->
<div style="margin-top:100px"></div>
<script type="text/javascript">	
	setTimeout(function(){ $(".alert-success").hide(); }, 2000);
</script>