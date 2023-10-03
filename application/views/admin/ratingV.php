<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Review Page</title>
    
    <!-- Favicon -->
       <?php include_once("topscripts.php")?>
    </head>
    <body>
  
    <!-- Main Wrapper -->
        <div class="main-wrapper">
    
      <!-- Header -->
        <?php include_once('header.php')?>
      <!-- /Header -->
      
      <!-- Sidebar -->
            <?php include_once('sidebar.php')?>
      <!-- /Sidebar -->
      
      <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">Reviews</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Reviews</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /Page Header -->
          
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-hover table-center mb-0">
                      <thead>
                        <tr>
                          <th>Patient Name</th>
                          <th>Doctor Name</th>
                          <th>Ratings</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            foreach ($rdata as $r)
                            {
                        ?>
                        <tr>
                          <td>
                            <h2 class="table-avatar">
                              <a href="<?=site_url('admin/patient/loadPatientMore/'.$r->patientid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/patient/".$r->pp)?>" alt="User Image"></a>
                              <a href="<?=site_url('admin/patient/loadPatientMore/'.$r->patientid)?>"><?=$r->name?> </a>
                            </h2>
                          </td>
                          <td>
                            <h2 class="table-avatar">
                              <a href="<?=site_url('admin/doctor/loadDoctorMore/'.$r->doctorid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/doctor/".$r->dp)?>" alt="User Image"></a>
                              <a href="<?=site_url('admin/doctor/loadDoctorMore/'.$r->doctorid)?>"><?=$r->fullname?></a>
                            </h2>
                          </td>
                          
                          <td>
                            <?php
                              for ($i=1; $i <=5 ; $i++) {
                              if($i<=$r->rating)
                              {  
                            ?>
                              <label class="fa fa-star text-warning"></label>
                              <?php
                              }
                              else
                              { 
                              ?>
                              <label class="far fa-star text-warning"></label>
                              <?php
                              }
                            }
                            ?>
                          </td>
                          
                          <td><?=$r->review?></td>
                            <td><?=$r->createddt?><br></td>
                          <td class="text-right">
                            <div class="actions">
                              <a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal" onclick="deleteRating('<?php echo $r->doctorreviewid?>')">
                                <i class="fe fe-trash"></i> Delete
                              </a>
                              
                            </div>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>      
          </div>
          
        </div>      
      </div>
      <!-- /Page Wrapper -->
      <!-- Delete Modal -->
      <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
          <div class="modal-content">
          <!--  <div class="modal-header">
              <h5 class="modal-title">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>-->
            <div class="modal-body">
              <div class="form-content p-2">
                <h4 class="modal-title">Delete</h4>
                <form method="post" action="<?=site_url('admin/rating/removeRating')?>">
                <input type="text" id="rid" name="txtRid" hidden>
                <p class="mb-4">Are you sure want to delete?</p>
                <button type="submit" class="btn btn-primary">Delete </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Delete Modal -->
        </div>
    <!-- /Main Wrapper -->
    
    <?php include_once("bottomscripts.php")?>

      <script> 
        function deleteRating(rvid)
        {
            document.getElementById('rid').value=rvid;
        }

    </script> 
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
</html>