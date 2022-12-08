<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage OBD Campaigns</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
            Add Campaign
            </button>		 
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">voice</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage voice Data</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-scrollable">
                     <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                                 -->
                              <table class="table table-striped" id="example4">
                                 <thead>
                                    <tr role="row">
                                       <th>
                                         Campaign ID  
                                       </th>
                                       <th>Campaign Name</th>
                                       <th> Creation Data </th>
                                       <th> Dial </th>
                                       <!-- <th>    </th> -->
                                       <th>  Pending </th>
                                       <th > Total </th>
                                     <!--   <th> Apporved</th>
                                       <th> Reject </th> -->
                                       <th>  Type </th>
                                       <th> Status </th> 
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody  id="fetch_campaign">
                                 	 
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
   </div>
</div>
<!-- The Modal -->
 <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Manage Campaign</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-8">
                  <div class="card card-box">
                     <div class="row">
                        <div class="col-md-3">
                           <header class="mbot"><b>Manage</b></header>
                        </div>
                        <div class="col-md-9">
                           <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
                              <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#000">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                              </li>
                              <li><a class="parent-item" href="" style="color:#000">voice</a>&nbsp;<i class="fa fa-angle-right"></i>
                              </li>
                              <li><a class="parent-item" href="" style="color:#000">My Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
                              </li>
                              <li><a class="parent-item" href="" style="color:#000">Manage campaign</a>
                              </li>
                           </ol>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="campaignname" class="col-sm-4 control-label">Campaign Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" id="campaignname">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="usernmae" class="col-sm-4 control-label">Enable</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" id="checkbox1" checked="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="checkbox1" class="col-sm-4 control-label">Enable Rechurn</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" id="checkbox1">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="retry_att" class="col-sm-4 control-label">Retry Attempts</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" id="mob">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="sch_type" class="col-sm-4 control-label">Schedule Type</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" id="sch_type">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="validfrom" class="col-sm-4 control-label">Creation Time</label>
                              <div class="col-sm-8">
                                 <input type="email" class="form-control" id="validfrom">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="validtill" class="col-sm-4 control-label">Schedule Date</label>
                              <div class="col-sm-8">
                                 <input type="email" class="form-control" id="validtill">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">IVR Call Flow</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" id="tpin">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">Service No</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" id="service_no">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">Audio File</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" id="audio_file">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">Upload Status</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" id="checkbox1" checked="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">Max Agents</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" id="max_agent">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 text-center pt-3 pb-2">
                           <button type="submit" class="btn btn-primary">Save</button>										   
                           <button type="submit" class="btn btn-primary">Download Audio File</button>	
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-lg-6">
                  <div class="card card-box">
                     dddddddddddddddd
                  </div>
               </div> -->
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>  
<div class="modal fade" id="myModal1" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title ml-2">Add Campaign</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
         	<form action="" id="AddCampaign" method="post">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card card-box">
                     <div class="row">
                        <div class="col-md-4">
                           <header class="mbot"><b>Add Campaign</b></header>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="campaign_id" class="col-sm-4 control-label">Campaign ID</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" value="<?php echo uniqid(); ?>"id="campaign_id" readonly name="campaign_id" required="" style="text-transform: uppercase;" min="5" max="10" >
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="campaign_description" class="col-sm-4 control-label">Campaign Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" id="campaign_description" name="campaign_description">
                              </div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="retry_att" class="col-sm-4 control-label">Admin User Group</label>
                              <div class="col-lg-8">
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="CT">Select</option>
                                    <option value="CT">Admin</option>
                                    <option value="DE">All Admin User Group</option>
                                    <option value="FL">Agent-Agent</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="sch_type" class="col-sm-4 control-label">Active</label>
                              <div class="col-lg-8">
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="status" aria-hidden="true">
                                    <option value="Y">Y</option>
                                    <option value="N">N</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 text-center pt-3 pb-2">
                           <button type="submit" class="btn btn-primary">Save</button>		
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>