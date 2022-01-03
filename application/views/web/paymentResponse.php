<div class="hero-section hero-background">
   <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">	
		  	<section class="ls columns_padding_25 section_padding_top_50 section_padding_bottom_50" style="padding: 50px 0px;">
	<div class="container contact_us_page">
		<div class="row text-center">
			<div class="col-md-10 col-md-offset-1 to_animate" data-animation="scaleAppear">
				<div class="text-center">
					<?php if($_POST["status"] == 'success'){  ?>
				        <img width="50px" src="<?php echo base_url()?>assets/front/images/success.png">
				        <h4 class="text-success">Your transaction has been successful.</h4>
				    <?php } else{  ?>
				    	<img width="50px" src="<?php echo base_url()?>assets/front/images/failure.png">
				        <h4 class="text-danger">Your transaction has been failed. please try again!</h4>
				    <?php }  ?>
				</div>
				<div class="col-md-8 col-md-offset-2">
					
				   <table class="table table-responsive">
				        <tbody><tr>
				            <td>Transaction Number</td>
				            <td><span class="txnm"><?php echo $_POST['txnid'];?></span></td>
				        </tr>
				        <tr>
				            <td>Order Id</td>
				            <td><span class="fulname"><?php echo $_POST['mihpayid'];?></span></td>
				        </tr>
				        <tr>
				            <td>Amount</td>
				            <td><span class="amount"><?php echo $_POST['amount'];?></span></td>
				        </tr>
				        <tr>
				            <td>Payment Status</td>
				            <td>
				            	<?php if($_POST['status'] == 'success'){  ?>
							        <span class="address" style="color:green">SUCCESS</span>
							    <?php } else{  ?>
							    	<span class="address" style="color:red">FAILURE</span>
							    <?php }  ?>
				            </td>
				        </tr>
				         <?php if($_POST['bankcode'] != ''){  ?>               
				        <tr>
				            <td>Bank CODE</td>
				            <td>
							    <span class="address"><?php echo $_POST['bankcode'];?></span>
				            </td>
				        </tr>
				        <?php } ?>
				        <?php if($_POST['addedon'] != ''){  ?>
				        <tr>
				            <td>Transaction Date</td>
				            <td>
							   <span class="address"><?php echo $_POST['addedon'];?></span>
				            </td>
				        </tr>
				        <?php }  ?>
				        <tr>
				            <td>Transaction Id</td>
				            <td>
				            	<span class="country"><?php echo $_POST['payuMoneyId'];?></span>
				            </td>
				        </tr>
				    </tbody>
				</table>
				<?php if($_POST['status'] == 'success'){  ?>
			       <a href="<?php echo base_url()?>web/user_videos/get_uservideos" class="btn btn-success">Watch Video</a>
			    <?php } else{  ?>
			    	<a href="<?php echo base_url()?>web/swashoppe/checkout" class="btn btn-warning">Try Again</a>
			    <?php }  ?>
				
				</div>		
			</div>
		</div>
	</div>
</section>			
		</div>
	</div>

</div>
<!--End Rev -->
<script type="text/javascript">	
	setTimeout(function(){ $(".alert-success").hide(); }, 2000);
</script>