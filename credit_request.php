<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Credit Request</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCredit_Request">
            Add Credit Request
            </button>     
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Credit Request</a>
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
                                 <th>Request Id</th>
                                 <th>Request Name</th>
                                 <th>Request Type </th>
                                 <th>Request Amount</th>
                                 <th> Status </th>
                                 <th> Username </th>
                                 <th> Create Date & Time </th>
                                 
                                 <?php
                                 if($user_type=='admin'){
                                 	echo '<th> Action </th>';
                                 } ?>
                                 
                              </tr>
                           </thead>
                           <tbody id="get_credit_request">
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

<div class="modal fade" id="AddCredit_Request" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Add Credit Request</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
               	<div class="card card-box">
                  	<form action="" method="post" id="add_Credit_Request">
                     	<div class="row">
                        	<div class="col-md-12">
                          	   <div class="form-group row">
                                 <label for="request_name" class="col-sm-4 control-label">Request Name</label>
                                 <div class="col-sm-8"> 
                                    <input type="hidden" class="form-control" id="login_id" value="<?php echo $login_id; ?>" name="login_id" required="">
                                    <input type="text" class="form-control" id="request_name" name="request_name" required="">
                                 </div>
                           	</div>
                        	</div>
                        	<div class="col-md-12">
                          	   <div class="form-group row">
                                 <label for="request_type" class="col-sm-4 control-label">Request Type</label>
                                 <div class="col-sm-8">
                                    <select class="form-control"  name="request_type">
                                       <option value="">Select Service Request</option>
                                       <option value="SMS">SMS</option>
                                       <option value="Voice">Voice</option>
                                       <option value="Email">Email</option>
                                    </select>
                                 </div>
                           	</div>
                        	</div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="group_name" class="col-sm-4 control-label">Request Amount</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" id="request_amount" name="request_amount" required="">
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
