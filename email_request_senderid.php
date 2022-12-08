<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Sender List</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmailSender_model">
            Add Sender ID
            </button>     
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Sender</a>
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
                                 <th>Sender Id</th>
                                 <th>Sender Name</th>
                                 <th>Sender Email Address </th>
                                 <th> Status </th>
                                 <th> Username </th>
                                 <th> Action </th>
                              </tr>
                           </thead>
                           <tbody id="fetch_email_sender_data">
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

<div class="modal fade" id="AddEmailSender_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Add Sender ID</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  	<div class="card card-box">
                     	<form action="" method="post" id="add_email_sender_id">
                           	<div class="row">
                              	<div class="col-md-12">
                                	   <div class="form-group row">
	                                    <label for="from_name" class="col-sm-4 control-label">From Name</label>
	                                    <div class="col-sm-8">
	                                       <input type="text" class="form-control" id="from_name" name="from_name" required="">
	                                    </div>
                                 	</div>
                              	</div>
                              	<div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="from_email_address" class="col-sm-4 control-label">From Email Address</label>
                                       <div class="col-sm-8">
                                          <input type="text" class="form-control" id="from_email_address" name="from_email_address" required="">
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

<div class="modal fade" id="ModifyEmailSender_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Modify Sender ID</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
                  	<div class="card card-box">
                     	<form action="" method="post" id="modify_email_sender_id">
                           <div class="row">
                        		<input type="hidden" name="sender_id" id="edit_sender_id" value="">
                           	<div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="from_name" class="col-sm-4 control-label">From Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="edit_sender_name" name="from_name" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="from_email_address" class="col-sm-4 control-label">From Email Address</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="edit_sender_email" name="from_email_address" required="">
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

