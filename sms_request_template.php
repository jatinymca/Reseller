

<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card card-box">
			<div class="card-head">
				<header>Request Template</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request Template</a>
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

	                                		<th> Template Name </th>
	                                		<th> Template SMS </th>
	                                 		<th> Request Date </th>
			                                <th> Request Time </th>
			                                <th> Approve/Reject Date </th>
			                                <th> Approve/Reject Time </th>
			                                <th> Credit Type </th>
			                                <th> Encode Type </th>
			                                <th> Status </th>
			                                <th> Approval Remarks </th>
			                                <th> Language </th>
			                                <th> DLT Template </th>
			                                <th> TelemarketingID </th>

	                              		</tr>
	                           		</thead>
	                           		<tbody id="fetch_sms_template">
	                           			<tr><td colspan="13">No Records</td></tr>
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
				<header> Request Template </header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request Template</a>
					</li>
				</ol>									
			</div>
			<div class="card-body">
			   	<div class="row">	
			   		<div class="col-md-6 col-sm-6">
				   		<form id="add_sms_template" class="add_sms_template"  action="" method="POST" >
							<div class="col-md-12">																	
								<div class="form-group row">
									<label for="templatename" class="col-sm-4 control-label"> Template Name </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="templatename" id="templatename"  >
									</div>
								</div>					
						    </div>
	                        <div class="col-md-12">
								<div class="form-group row">
									<label for="credittype" class="col-sm-4 control-label">Type</label>
									<div class="col-sm-8">
										<select class="form-control" name="credittype">
											<option value="">Select CreditType</option>
											<option value="SMS Transactional">SMS Transactional</option>
											<option value="Service Implicit">Service Implicit</option>
										</select>
									</div>
								</div>											
						    </div>
						    <div class="col-md-12">
								<div class="form-group row">
									<label for="senderid" class="col-sm-4 control-label">SenderID*</label>
									<div class="col-sm-8">
										<select class="form-control" name="senderid">
											<option value="">Select SenderID</option>
											<?php 

	                                       $sql = "SELECT id,senderid FROM `sms_senderid` where username='$login_id'";
	                                               $res = mysqli_query($conn, $sql);
	                                               $rowscount = mysqli_num_rows($res);
	                                               while($row=mysqli_fetch_array($res)){ 
	                                            
	                                                $id=$row['id'];
	                                                $senderid=$row['senderid'];
	                                                   
	                                          ?>
	                                             <option value="<?php echo $id; ?>" ><?php echo $senderid; ?></option>
	                                          <?php
	                                          } ?>
										</select>
									</div>
								</div>											
						    </div>	
						    <div class="col-md-12">
						    	<div class="form-group row">
                              		<label class="col-md-4 control-label" for="">Language </label>
                              		<div class="col-md-8">
                                 		<div class="row">
                                    		<div class="col-md-6">
                                       			<div class="row">
                                          			<span class="col-md-3"><input id="" name="language_radio" type="radio" value="0"  class="form-control" checked="Checked" onchange="languageradios(this);"></span>
                                          			<span class="col-md-9"><label for="english">English</label></span>
                                       			</div>
                                    		</div>
                                    		<div class="col-md-6">
                                       			<div class="row">
                                          			<span class="col-md-3"><input id="" name="language_radio" type="radio" value="1"  class="form-control" onchange="languageradios(this);"></span>
                                          			<span class="col-md-9"><label for="multiLingual">MultiLingual</label></span>
                                       			</div>
                                    		</div>
                                 		</div>                                 
    	                          	</div>
	                           	</div>
                           	</div>
							<div class="col-md-12 language_div" style="display:none;">
								<div class="form-group row">
									<label for="language" class="col-sm-4 control-label">Select Language</label>
									<div class="col-sm-8">
										<select class="form-control" name="language">
											<option value="">Select Language</option>
											<option value="Hindi">Hindi</option>
											<option value="Punjabi">Punjabi</option>
											<option value="Tamil">Tamil</option>
											<option value="Bengali">Bengali</option>
										</select>
									</div>
								</div>											
						    </div>	
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="dlttemplate" class="col-sm-4 control-label"> Template DLTID* </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="dlttemplate" id="dlttemplate"  >
									</div>
								</div>											
						    </div>
						    <div class="col-md-12">																			
								<div class="form-group row">
									<label for="templatesms" class="col-sm-4 control-label"> Template SMS </label>
									<div class="col-sm-8">
										<textarea class="form-control" onkeyup="characterscount();" name="templatesms" id="temp_content"  cols="20" rows="7" ></textarea>
										<label id=""> <span id="characterscount">0</span> Character(s) <span id="msgcount">1</span> SMS Message(s) </label>
										
										<textarea id="" class="form-control" readonly style="min-height: 70px; max-height: 70px;color:red;" cols="20" rows="3" >Note:- Please replace {#var#} with <arg1>, <arg2> & so on for template having variable fields. Value should not be greater then 30 chr</textarea>
									</div>
								</div>											
						    </div>					
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="telemarketingid" class="col-sm-4 control-label"> Telemarketing DLTID* </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="telemarketingid" id="telemarketingid"  >
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
									<button type="submit" name="submit" class="btn btn-primary">Save</button>		
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="card card-box">
							<div class="card-head">
								<header> Upload SenderID and Template </header>
							</div>
							<div class="card-body">
							    <div class="row">						               
									<div class="col-md-12 mb-4">
									    <a href="TemplateSample.csv"  class="btn btn-success">Download Sample</a>
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
														<form id="smsrequestuplform"  action="import_sms_request_csvdata.php" method="post" name="smsrequestupload_excel" enctype="multipart/form-data">
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




<div class="modal fade" id="SMSTemplateAction" data-keyboard="false" data-backdrop="static">
   	<div class="modal-dialog">
      	<div class="modal-content">
         	<!-- Modal Header -->
         	<div class="modal-header card-head">
            	<h4 class="modal-title  ml-2">Action on SMS Template</h4>
	            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
	         </div>
         	<!-- Modal body -->
         	<div class="modal-body">
	            <div class="row">
	               	<div class="col-lg-12">
	                  	<div class="card card-box">
	                     	<form action="" method="post" id="SMSTemplateAction_form">
	                           	<div class="row">
	                           		<input type="hidden" name="SMSTemplateAction_id" id="SMSTemplateAction_id"> 
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


<script type="text/javascript">
	
	function languageradios(){

		var language_radioval = $('input[name="language_radio"]:checked').val();
    
        if(language_radioval==1)   
        {  
            $(".language_div").css({"display": "block"});
        }
        else
        {
            $(".language_div").css({"display": "none"});
        }

	}

</script>