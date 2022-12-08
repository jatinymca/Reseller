<?php

	if (isset($_GET["senderid"]))       {$senderid=$_GET["senderid"];}
	elseif (isset($_POST["senderid"]))  {$senderid=$_POST["senderid"];}

?>


<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card card-box">
			<div class="card-head">
				<header>SenderID Status</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SenderID Status</a>
					</li>
				</ol>									
			</div>	
			<div class="card-body">
	            <div class="row">
	               <div class="col-md-12">
						 
	                	<div class="row">
	                     	<div class="col-sm-12" style="height: 400px; overflow-y: scroll; white-space: nowrap;">
	                        <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
	                           -->
	                        	<table class="table table-striped" id="example4">
	                           		<thead class="thead-light">
	                              		<tr role="row">
	                              			<?php 

			                                if($user_type=='admin'){
			                                	echo '<th> Action </th>';
			                                } 

			                                ?>
	                                		<th> SenderID </th>
	                                 		<th> Request Date </th>
			                                <th> Request Time </th>
			                                <th> Approve/Reject Date </th>
			                                <th> Approve/Reject Time </th>
			                                <th> Status </th>
			                                <th> Type </th>
			                                <th> DLT SenderID </th>
			                                <th> TelemarketingID </th>
			                                <th> EntityID </th>
			                                <th> Remarks </th>
	                              		</tr>
	                           		</thead>
	                           		<tbody id="fetch_sms_senderid">
	                           			<tr><td colspan="11">No Records</td></tr>
	                           		</tbody>
	                        	</table>
	                     	</div>
	                  	</div>
	               	</div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-md-12 col-sm-12">
		<div class="card card-box">
			<div class="card-head">
				<header> Request SenderID </header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request SenderID</a>
					</li>
				</ol>									
			</div>
			<div class="card-body">
			   	<div class="row">	
			   		<div class="col-md-6 col-sm-6">
				   		<form id="add_sms_senderid" class="add_sms_senderid"  action="" method="POST" >
			               
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="senderid" class="col-sm-4 control-label"> Enter SenderID* </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="senderid" id="senderid"  >
									</div>
								</div>											
						    </div>	
	                        <div class="col-md-12">
								<div class="form-group row">
									<label for="type" class="col-sm-4 control-label">Type</label>
									<div class="col-sm-8">
										<select class="form-control" name="type">
											<option value="">Select Type</option>
											<option value="SMS Transactional">SMS Transactional</option>
										</select>
									</div>
								</div>											
						    </div>	
													
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="telemarketingdltid" class="col-sm-4 control-label"> Telemarketing DLTID </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="telemarketingdltid" id="telemarketingdltid"  >
									</div>
								</div>											
						    </div>	

						    <div class="col-md-12">																			
								<div class="form-group row">
									<label for="entityid" class="col-sm-4 control-label"> EntityID* </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="entityid" id="entityid"  >
									</div>
								</div>											
						    </div>	
							 
						    <div class="col-md-12">
								<div class="form-group row text-center pt-3">
									<button type="submit" name="submit" class="btn btn-primary">SenderID Request</button>		
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="card card-box">
							<div class="card-body">
							    <div class="row">						               
									<div class="col-md-12 mb-4">
									    <a href="SenderIDSample.csv"  class="btn btn-success">Download Sample</a>
									</div>
								</div>		
				                <div class="row">
				                    <div class="col-lg-12">
									    <div class="panel tab-border card-box">
											<header class="panel-heading panel-heading-gray custom-tab ">
												<ul class="nav nav-tabs">
													<li class="nav-item" ><a href="#home" data-toggle="tab" class="active">Choose CSV File</a>
													</li>
													<!-- <li class="nav-item"><a href="#about" data-toggle="tab" class="">Upload</a>
													</li>
													<li class="nav-item"><a href="#profile" data-toggle="tab" class="">Cancel</a>
													</li> -->
												</ul>
											</header>
											<div class="panel-body">
												<div class="tab-content">
													<div class="tab-pane active" id="home">
														<form id="smssenderiduplform"  action="import_sms_senderid_csvdata.php" method="post" name="smssenderidupload_excel" enctype="multipart/form-data">
															<div class="row">						               
				                                                <div class="col-md-12">
																	<div class="form-group row">
																		<label for="lastnmae" class="col-sm-4 control-label">Csv File</label>
																		<div class="col-sm-8">
																			<input type="file" name='file' class="form-control" id="file">
																		</div>
																	</div>											
															    </div>
															</div>
															<div class="row">					
																<div class="col-md-12 text-center pt-3">
														   			<button type="submit" name="import" class="btn btn-primary">Upload </button>			
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>							
</div>




<div class="modal fade" id="SMSSenderIDAction" data-keyboard="false" data-backdrop="static">
   	<div class="modal-dialog">
      	<div class="modal-content">
         	<!-- Modal Header -->
         	<div class="modal-header card-head">
            	<h4 class="modal-title  ml-2">Action on SMS Sender ID</h4>
	            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
	         </div>
         	<!-- Modal body -->
         	<div class="modal-body">
	            <div class="row">
	               	<div class="col-lg-12">
	                  	<div class="card card-box">
	                     	<form action="" method="post" id="SMSSenderIDAction_form">
	                           	<div class="row">
	                           		<input type="hidden" name="SMSSenderIDAction_id" id="SMSSenderIDAction_id"> 
	                           		<div class="col-md-12">
	                                 	<div class="form-group row">
	                                    	<label for="active" class="col-sm-2 control-label">Action</label>
	                                    	<div class="col-sm-10">
		                                       	<select class="form-control" id="status" name="status">
		                                          	<option value="Pending">Pending</option>
		                                          	<option value="Approve">Approve</option>
		                                          	<option value="Reject">Reject</option>
		                                       	</select>
	                                    	</div>
	                                 	</div>
	                              	</div>
	                              	<div class="col-md-12">
	                                	<div class="form-group row">
	                                    	<label for="template_descreption" class="col-sm-2 control-label">Reason</label>
		                                    <div class="col-sm-10">
		                                       <input type="text" class="form-control" id="approvalremarks" name="approvalremarks">
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

