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
        <a class="nav-link float-right" href="<?php echo base_url('podcast/add_podcast') ?>">
            <span class="btn btn-primary btn-sm">+ Add Podcast</span>
        </a>       
      </div>
       <div class="card">
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered review_table " style="width:100%">
                <thead>
                    <tr>
                        <th style="width:120px !important;">Image</th>   
                        <th style="width:120px !important;">URL</th>                           
                        <th style="width:120px !important;">Title</th>                                           
                        <th style="width:120px !important;">Auther</th>
                        <th style="width:120px !important;">Action</th>                
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($podcast as $podcast_list) {                           
                    ?>
                    <tr>
                        <td><img src="<?php echo base_url('assets/podcastimage/').$podcast_list["image"] ?>" height="200"></td>
                        <td><?php echo $podcast_list["url"] ?></td>                        
                        <td><?php echo $podcast_list["title"] ?></td>
                        <td><?php echo $podcast_list["authername"] ?></td>                        
                        <td>
                            <a href="<?php echo base_url('podcast/edit/'.$podcast_list['id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('podcast/delete/'.$podcast_list['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="width:120px !important;">Image</th>                              
                        <th style="width:120px !important;">Title</th>                                           
                        <th style="width:120px !important;">Auther</th>
                        <th style="width:120px !important;">Action</th>
                    </tr>
                </tfoot>
            </table>
      </div>
    </div>
</div>
<!-- partial:partials/_footer.html -->
<footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">?? Copyright <?php echo date("Y") ?>. All Rights Reserved by <a href="https://www.swadarshana.com/"> Swadarshana </a> </span>
      </div>
</footer>
</div>
<!-- content-wrapper ends -->
<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets') ?>/js/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets') ?>/js/datatable/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
    $('.review_table').DataTable({
        responsive: true
    });
} );
</script>