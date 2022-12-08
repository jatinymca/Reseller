<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>SMS Download Reports</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Report Download Request</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-striped" id="example4">
                           <thead>
                              <tr role="row">
                                 <th> RequestID </th>
                                 <th> Request Time </th>
                                 <th> From Date </th>
                                 <th> To Date </th>
                                 <th> Campaign Name </th>
                                 <th> Report Name </th>
                                 <th> Report Status </th>
                                 <th> Action </th>
                              </tr>
                           </thead>
                           <tbody id="sms_export_report">
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
            <h4 class="modal-title  ml-2">Add Group</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card card-box">
                     <form action="" method="post" id="add_group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_name" class="col-sm-4 control-label">Group Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="group_name" name="group_name" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="group_descreption" class="col-sm-4 control-label">Group Descreption</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="group_descreption" name="group_descreption">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="active" class="col-sm-4 control-label">active</label>
                                    <div class="col-sm-8">
                                       <select class="form-control"   id="group_descreption" name="active">
                                          <option value="Y">Y</option>
                                          <option value="Y">N</option>
                                       </select>
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