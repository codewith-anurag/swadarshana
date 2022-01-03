<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>css/dataTables.bootstrap4.min.css">

<div class="main-panel">

    <div class="content-wrapper">

        <?php 

            if ($this->session->flashdata("success")) {                    

         ?>

         <div class="alert alert-success alert-dismissible">

            <button type="button" class="close" data-dismiss="alert">&times;</button>

             <?php echo $this->session->flashdata("success"); ?>

        </div>

        <?php } ?>

      <div class="page-header">

        <h3 class="page-title"> <?php echo $heding; ?> </h3>     

        <a class="nav-link float-right" href="<?php echo base_url('service/add_service') ?>">

              <span class="btn btn-primary btn-sm">+ Add  Service</span>

        </a>       

      </div>

       <div class="card">

          <div class="card-body">

            <table id="example" class="table table-striped table-bordered service_table " >

                <thead>

                    <tr>

                        <th>Title</th>
                        <th>Banner</th>
                        <th>Mobile Banner</th>
                        <!--<th>Short Description</th>

                        <th>Middle Description</th>

                        <th>Long Description</th>-->

                        <!--<th>Last Heding</th>-->

                        <th>Action</th>                

                    </tr>

                </thead>

                <tbody>

                    <?php 

                        foreach ($service as $service_list) {                           

                    ?>

                    <tr>

                        <td><?php echo $service_list["title"] ?></td>     

                        <td style="width:300px;">
                            <?php 
                                if($service_list['banner_image']!=""){
                            ?>
                                <img src="<?php echo ($service_list['banner_image']!="") ?  base_url('assets/servicebanner_image/'.$service_list['banner_image']) : ""; ?>" class="img img-responsive img-thumbnail" style="width:300px!important;">
                            <?php }else{
                            }
                            ?>
                            </td>                   
                        <td style="width:300px;">
                            <?php 
                                if($service_list['mobile_bannerimage']!=""){
                            ?>
                            <img src="<?php echo  base_url('assets/mobile_servicebannerimage/'.$service_list['mobile_bannerimage']);?>" class="img img-responsive img-thumbnail" style="width:300px!important;">
                            <?php }else{
                                
                            }
                            ?>
                        </td>

                        <!--<td><?php //echo strlen($service_list["short_description"]) >= 500 ? substr($service_list["short_description"], 0, 200) . '...' :$service_list["short_description"];?></td>

                        <td><?php //echo strlen($service_list["middle_description"]) >= 500 ? substr($service_list["middle_description"], 0, 200) . '...' :$service_list["middle_description"];?></td>

                        <td><?php //echo  strlen($service_list["long_description"]) >= 500 ? substr($service_list["long_description"], 0, 200) . '...' : $service_list["long_description"];?></td>-->

                       <!-- <td><?php //echo $service_list["last_heding"]; ?></td>-->

                        <td>

                            <a href="<?php echo base_url('service/edit/'.$service_list['id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="<?php echo base_url('service/delete/'.$service_list['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a></td>

                    </tr>

                    <?php } ?>

                </tbody>

                <tfoot>

                    <tr>

                        <th>Title</th>
                        <th>Banner</th>
                        <th>Mobile Banner</th>
                        <!--<th>Short Description</th>-->

                        <!--<th>Middle Description</th>-->

                        <!--<th>Long Description</th>-->

                        <!--<th>Last Heding</th>-->

                        <th>Action</th>         

                    </tr>

                </tfoot>

            </table>

      </div>

    </div>

</div>

<!-- partial:partials/_footer.html -->

<footer class="footer">

      <div class="d-sm-flex justify-content-center justify-content-sm-between">

       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://www.swadarshana.com/"> Swadarshana </a> </span>

      </div>

</footer>

</div>

<!-- content-wrapper ends -->

<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>

<script type="text/javascript"  src="<?php echo base_url('assets') ?>/js/datatable/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

    $('.service_table').DataTable();

} );

</script>