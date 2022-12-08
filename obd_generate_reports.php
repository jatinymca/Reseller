
                <div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head mb-4">
								<header>OBD Reports</header>

								   <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
									<li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Voice</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Detail Report</a>
									</li>
									
								</ol>									
							</div>
							<div class="card-body">
							    <div class="row">
								    <div class="col-lg-6">
									    <div class="row">
											<div class="col-lg-12">
												<form class="form-horizontal" id="obd_report_generate" method="POST"> 
             											  <input type="hidden" name="action" value="obd_report">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Report Type</label>
														<div class="col-lg-8">
															 <input type="text" class="form-control" id=" " required="" name="report_type">
														</div>
													</div>
												 
											 </div>
											 <div class="col-md-12">	 
													<div class="form-group row">
														<label for="overwritecon" class="col-sm-4 control-label">All Campaign</label>
														<div class="col-sm-8">
															<select class="form-control  select2" name="Campaign_type">
																<option value="">Select Campaign</option>
															<?php 
															 	$sel="SELECT * FROM `vertage_campaign`where 1 $permission_username ORDER BY `id`  ASC";
															 	$re = mysqli_query($conn, $sel);

																while($ro=mysqli_fetch_array($re)) {
																echo "<option value='".$ro['campaign_id']."-".$ro['campaign_description']."'>".$ro['campaign_id']."--".$ro['campaign_description']."</option>"; 
																	}
											  ?></select>
															<!-- <input type="checkbox" class="form-control" id="checkbox1" name=""> -->
														</div>
													</div>											
											</div> 
                                        </div>
                                    
								    </div>
									<div class="col-lg-6">
									   		<div class="col-md-12">																			
												<div class="form-group row">
													<label for="sdate" class="col-sm-4 control-label">Start Date</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="s_date" placeholder="Start Date" required="" id="datepicker-1">
													</div>
												</div>											
											</div>
											
											<div class="col-md-12">																			
												<div class="form-group row">
													<label for="edate" class="col-sm-4 control-label">End Date</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="e_date" placeholder="End Date" required="" id="datepicker-2">
													</div>
												</div>											
											</div> 
									</div>
									
								</div>
							    <div class="row">
									<div class="col-md-12 text-center pt-4">
									   <button type="submit" class="btn btn-primary">Generate Report</button>	 
									</div> 
								</div>	
								</form>

                                								
								
							
							</div>
						</div>
					</div>
				</div>  
					
					
					
				 