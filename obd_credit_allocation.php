<?php

if($request_login_id && $request_id){

	$req_query = "SELECT user_type,username FROM `users` where login_id='$request_login_id'";
    $req_res = mysqli_query($conn, $req_query);
    $req_data  = mysqli_fetch_array($req_res);
    $req_user_type = $req_data['user_type'];
    $req_username = $req_data['username'];

    $req2_query = "SELECT request_type,request_amount FROM `credit_request` where username='$request_login_id'";
    $req2_res = mysqli_query($conn, $req2_query);
    $req2_data  = mysqli_fetch_array($req2_res);
    $req2_request_promo_type = $req2_data['request_type'];
    $req2_request_amount = $req2_data['request_amount'];
}

?>

	      <div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Allocate Credits</header>

								   <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
									<li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Approvals</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Allocate Credit</a>
									</li>
									
								</ol>									
							</div>
							<div class="card-body">
							    
							    <div class="row">
								    <div class="col-lg-6">
								        <form class="form-horizontal" id="add_credit">

								        	<input type="hidden" name="credit_request_id" value="<?php if($request_id){ echo $request_id; } ?>">
								        	<input type="hidden" name="login_id" value="<?php  echo $login_id;  ?>">

										    <div class="row">
								                <div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Select User Type</label>
														<div class="col-lg-8">
															<select class="form-control" required onchange="getusertype(this);" name="user_type">

																<?php

																	if($req_user_type)
																	{

																		echo '<option value="'.$req_user_type.'" selected>'.$req_user_type.'</option>';
																	}
																	else
																	{ 
																		echo '<option value="">Select User Type</option>';

																		if($user_type=="admin")
																			{ 
																				echo '<option value="Reseller">Reseller</option>';
																				echo '<option value="User">User</option>';
																			}
																			else{ 
																				echo '<option value="User">User</option>';
																			} 
																		 
																	}

																?>
																 
															</select>
														</div>
													</div>
												</div>
												 
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Select User
														</label>
														<div class="col-lg-8">
															<select class="form-control select2" id="fetch_user_id" required name="user_id">

																<?php 
																	if($request_login_id){

																		echo '<option value="'.$request_login_id.'">'.$request_login_id.'('.$req_username.')</option>';
																	}
																	else{
																		echo '<option value="">Select User</option>';
																	}

																?>
																
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Voice Credit Validitys</label>
														<div class="col-lg-8">
															<input type="date" class="form-control" required id="voice_credit_validity" name="voice_credit_validity">
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Payment</label>
														<div class="col-lg-8">
															<select class="form-control  select2" id="status" required name="status">
 															<option value="Paid">Paid</option>
															<option value="Unpaid">Unpaid</option>
														</select>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group row">
														<label for="plan-status" class="col-sm-4 control-label">Plan-Type</label>
														<div class="col-sm-8">
															<select class="form-control"   name="plan_type">
																<option value="">Select Plan Type</option>
																<option value="Promotional">Promotional</option>
																<option value="Tranactional">Tranactional</option>
															</select>
														</div>
													</div>											
												</div>
												<div class="col-md-12">
													<div class="form-group row">
														<label for="promotion_type" class="col-sm-4 control-label">Promotion-Type</label>
														<div class="col-sm-8">
															<select class="form-control"   name="promotion_type">
																<?php

																if($req2_request_promo_type){
																	echo '<option value="'.$req2_request_promo_type.'">'.$req2_request_promo_type.'</option>';
																}
																else{
																	echo '<option value="">Select Promotion Type</option>';
																	echo '<option value="Voice">Voice</option>';
																	echo '<option value="SMS">SMS</option>';
																	echo '<option value="Email">Email</option>';
																}

																?>
															</select>
														</div>
													</div>											
												</div>
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Credit Units</label>
														<div class="col-lg-8">
															<?php

																if($req2_request_amount){
																	echo '<input type="text" readonly class="form-control" id="credit_amount" value="'.$req2_request_amount.'" name="credit_amount" >';
																}
																else{
																	echo '<input type="text" class="form-control" id="credit_amount" name="credit_amount" required> ';
																}
																?>
															
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Payment Remark</label>
														<div class="col-lg-8">
															<input type="text" class="form-control" id="payment_remark" name="payment_remark">
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group row">
														<label class="col-lg-4 control-label">Note</label>
														<div class="col-lg-8">
															 
															<textarea class="form-control" id="note" name="note"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">									
									            <div class="col-md-12 mt-4" style="text-align: center;">
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
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Credit Allocation</header>

								<ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
									<li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Voice </a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Approvals</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Allocate Credit</a>
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
													 
								                                <table class="table table-striped " id="credit_allocation">	
										                                <thead>
										                                    <tr>
										                                        <th>SN</th>
										                                        <th>User Id</th>
										                                        <th>Amount</th>
										                                        <th>Validity</th>
										                                        <th>Type</th>
										                                        <th>Status</th>
										                                        <th>Invoice Date</th>
										                                        <th>Payment_remark</th>
 										                                        <th>Action</th>
										                                    </tr>
										                                </thead>
										                                <tbody id="obd_credit_display">
										                                	
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
								

					