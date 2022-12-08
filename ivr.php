<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage IVRS  </header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
               Add IVRS
            </button>		  -->
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">IVRS</a>&nbsp; 
               </li> 
            </ol>
         </div> 
        
      <div class="card-body">
         <div class="row">
            <div class="col-md-12"> 
               <div class="row">
                  <div class="col-sm-12">
                              <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                              -->
                              <table class="table table-striped" id="example4">
                                 <thead>
                                    <tr role="row">
                                       <th>IVR Name</th>
                                       <th>Unique Id</th>
                                       <th>Extension NO </th> 
                                       <th> Username </th> 
                                       
                                       <?php
                                       if($user_type=='admin'){
                                          echo '<th> Action </th>';
                                       } ?>
                                       
                                    </tr>
                                 </thead>
                                 <tbody id="display_ivr">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

                   <div class="modal fade" id="myModal2" data-keyboard="false" data-backdrop="static">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header card-head">
                        <h4 class="modal-title ml-2">Add IVR</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body">
                        <form action="" method="post" id="create_ivr">
                          <div class="row">
                           <div class="form-group p-2">
                             <label for=" ivr_name">IVR Name</label>   

                             <input  name="login_id" type="hidden" value="<?php echo $login_id; ?>">

                             <input class="form-control" id="ivr_name" name="ivr_name" required="" type="text">
                          </div>
                       </div>
                       <div class="row">
                        <div class="form-group p-2">
                          <label for="extension">Extension No.</label> 
                          <input class="form-control" id="extension" name="extension" required="" type="text">
                       </div>
                       </div>
                    <div class="row float-right p-2">
                      <button type="submit" class="btn btn-primary" id="" >Create IVR</button>
                   </div>
                </form> 
             </div>
          </div>
       </div> 
      </div>

      </div>
   </div>