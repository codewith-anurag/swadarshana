<style type="text/css">
.tab {
float: left;
/*border: 1px solid #ccc;*/
background-color: #efefef;
width: 25%;
height: auto;
}
/* Style the buttons inside the tab */
.tab button {
display: block;
background-color: inherit;
color: black;
padding: 14px 16px;
width: 100%;
border: none;
outline: none;
text-align: left;
cursor: pointer;
transition: 0.3s;
font-size: 17px;
}
/* Change background color of buttons on hover */
.tab button:hover {
background-color: #f57f20;
}
/* Create an active/current "tab button" class */
.tab button.active {
background-color: #f57f20;
color: #fff;
}
/* Style the tab content */
.tabcontent {
float: left;
padding: 0px 0px;
/*border: 1px solid #ccc;*/
width: 100%;
border-left: none;
min-height: 300px;
}
@media only screen and (max-width: 600px) {
.tab {
width: 100%;
}
}
</style>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}
</style>
<div class="hero-section hero-background">
  <h1 class="page-title"><?php echo $page_title; ?></h1>
</div>
<div class="mar">
  <div class="container">
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
      
      <?php
      if ($this->session->userdata("email")!="" && $this->session->userdata("id")!="") {
      $user_id = ($this->session->userdata("id") != "") ? base64_encode($this->session->userdata("id")) : "";
      ?>
      <?php } ?>
      <div class="col-3">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Dashboard')" id="defaultOpen">Dashboard</button>
            <button class="tablinks" onclick="openTab(event, 'Videos')">Video List</button>
            <button class="tablinks" onclick="openTab(event, 'payment')">Payment List</button>
            <button class="tablinks" onclick="openTab(event, 'password')">Change Password</button>
            <button class="tablinks" onclick="return logout()">Logout</button>
            <div class="clearfix"></div>
       </div>
    </div>
    
    <div class="col-lg-9">
       <div id="Dashboard" class="tabcontent">       
            <!-- <div class="card pull-left" style="padding:50px;">  -->
           <table class="table table-responsive">
                <tbody>
                  <tr>
                    <td width="30%" style="text-align:left;">Name</td>
                    <td width="70%" style="text-align:left;"><span><?php echo $user_detail->full_name; ?></span></td>
                </tr>
                <tr>
                    <td width="30%" style="text-align:left;">Email Address</td>
                    <td width="70%" style="text-align:left;"><span ><?php echo $user_detail->email; ?></span></td>
                </tr>
                <tr>
                    <td width="30%" style="text-align:left;">Amount</td>
                    <td width="70%" style="text-align:left;"><span ><?php echo $user_detail->phone;?></span></td>
                </tr>
                <tr>
                    <td width="30%" style="text-align:left;">Total Videos</td>
                    <td width="70%" style="text-align:left;"><span><?php echo $total_video;?></span></td>
                </tr>
            </tbody>
        </table>
        </div>
      <div id="Videos" class="tabcontent">
        
      <?php foreach ($videoresult as $key => $videoresult_list) {
      
      ?>      
      <div class="col-md-4">
        <article class="video-container">
          <a href="<?= base_url('web/user_videos/watch_uservideos/'.$videoresult_list['id']);?>" class="thumbnail1">
              <video width="100%" height="100%" muted="" loop="" class="swashoppevideo">
                <source src="<?php echo base_url('assets/swashoppe_video/'.$videoresult_list['video']);?>" type="video/mp4">
              </video>
           </a>
          <div class="video-bottom-section">
            <div class="video-details">              
              <a href="<?= base_url('web/user_videos/watch_uservideos/'.$videoresult_list['id']);?>" class="video-title"><?php echo $videoresult_list['title'];?></a>
              <div class="video-metadata">
                <p class="discrip"><?php echo  $videoresult_list['description']  ?></p>
              </div>
            </div>
          </div>
        </article>
      </div>
      <?php }       ?>
    </div>
      <div id="payment" class="tabcontent">
			<div class="table-responsive">
           <table class="table table-responsive">
                <tbody>
                  <tr>
                    <th style="font-weight: 600;">No.#</th>
                    <th style="font-weight: 600;">Transaction Id</th>
                    <th style="font-weight: 600;">Amount</th>
                   <th style="font-weight: 600;">Transaction Date</th> 
                   <!--   <th style="font-weight: 600;">Payment Mode</th>-->
                    <th style="font-weight: 600;">Status</th>
                </tr>
                <?php  
                $i = 1;
                foreach ( $transactionDetails as $transaction) {?>  
                <tr>
                    <td><?php echo  $i;?></td>
                    <td><?php echo  $transaction['bank_ref_num'];?></td>
                    <td><i class="fa fa-inr"></i> <?php echo  $transaction['amount'];?></td>
                   <td><?php echo  $transaction['created_date'];?></td>
                     <?php /*<td><?php echo  $transaction['payment_mode'];?></td>*/?>
                    <td><?php echo  $transaction['status'] =='success'?'Success':'Fail';?></td>
                </tr>
                  <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
    </div>
      <div id="password" class="tabcontent">
         <div class="col-md-6 offset-md-3">
            <form class="form" method="post" action="<?php echo base_url('web/user_videos/changePassword/')?>" role="form" autocomplete="off">
                <div class="form-group">
                    <label for="oldPassword">Current Password</label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" >
                    <input type="hidden" value="<?php echo $this->session->userdata("id"); ?>" id="user_id" name="user_id">
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword" class="form-control" id="newPassword" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Change Password</button>
                </div>
            </form>
          </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
<script>
    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
        // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    function logout() {
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("web/user_videos/logout"); ?>',
            success:function(data){
                if (data == "1") {
                    console.log(1);
                    window.location.href = "<?php echo  base_url('web/swashoppe/login/')?>";
                }
            }
        });
    }
   setTimeout(function(){ $(".alert").hide('slow'); }, 3000);

</script>