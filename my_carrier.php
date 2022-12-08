<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage Carrier</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddGroup_model">
            Add Carrier
            </button>     
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Setting</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
                <li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Carrier</a>
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
                                 <th> Carrier ID </th>
                                 <th> Carrier Name</th>
                                 <th> Carrier Type</th>
                                 <th> Group Name</th>
                                 <th> Date </th>
                                 <th> Action </th>
                              </tr>
                           </thead>
                           <tbody id="fetch_carrier">
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="AddGroup_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Add Carrier</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card card-box">
                     <form action="" method="post" id="add_carrier">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_name" class="col-sm-4 control-label">Carrier ID</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="carrier_id" name="carrier_id" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="carrier_name" class="col-sm-4 control-label">Carrier Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="carrier_name" name="carrier_name" required="">
                                    </div>
                                 </div>
                              </div>
                               <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="carrier_type" class="col-sm-4 control-label">Carrier Type   </label>
                                    <div class="col-sm-8">
                                       <select class="form-control"   id="carrier_type" name="carrier_type">
                                          <option value="PRI_GATEWAY">PRI_GATEWAY</option>
                                          <option value="GSM_GATEWAY">GSM_GATEWAY</option> 
                                          <option value="SIP_TRUNK">SIP_TRUNK</option> 
                                          <option value="DAHDI">DAHDI</option>
                                          <option value="NONE">NONE</option> 
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_descreption" class="col-sm-4 control-label">Carrier Descreption</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="carrier_descreption" name="carrier_descreption">
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_id" class="col-sm-4 control-label">Group</label>
                                    <div class="col-sm-8">
                                        <select class="form-control"  id="group_id" name="group_id" required="">
                                     <?php
                                      $sql = "SELECT * FROM `vertage_groups` where active='Y'";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row=mysqli_fetch_array($res)){

                                          echo '<option value="'.$row['group_id'].'">'.$row['group_name'].'</option>';
                                       }
                                    ?>
                                    </select>
                                    </div>
                                 </div>
                              </div>
                                <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_descreption" class="col-sm-4 control-label">Dialplan Entry</label>
                                    <div class="col-sm-8">
                                        <textarea name="dialplan_entry" class="form-control" rows="4" ></textarea>
                                    </div>
                                 </div>
                              </div>
                                <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_descreption" class="col-sm-4 control-label">Registration String:</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="group_descreption" name="group_descreption">
                                    </div>
                                 </div>
                              </div>
                             
                              <div class="col-md-12 text-center pt-3 pb-2">
                                 <button type="submit" class="btn btn-primary">Save</button>    
                              </div>
                           </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>