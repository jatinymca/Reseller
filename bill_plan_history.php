 <div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Bill Plan History</header>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#add_bill_plan">
												Add Bill Plan
											  </button>		
              
								   <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
									<li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">SMS/OBD</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Bill Plan History</a>
									</li>
									
								</ol>									
							</div>
							<div class="card-body">
							    <!-- <div class="row">
								    <div class="col-lg-6">
								        <form class="form-horizontal">
	                                        <div class="form-group row">
	                                            <label class="col-lg-4 control-label">Users
	                                            </label>
	                                            <div class="col-lg-8">
	                                                <select class="form-control  select2">
														  <?php 
				                                        $smtp="SELECT * FROM `users` WHERE user_type!='Admin'";
				                                        $row=mysqli_query($conn,$smtp);
				                                        $i=1;
				                                        while($data=mysqli_fetch_array($row)){
				                                            $login_id=$data['login_id'];
				                                            $username=$data['username'];
				                                        ?>
				                                             <option  value="<?php echo $login_id; ?>" ><?php echo $login_id; ?>(<?php echo $username; ?>)</option>
				                                        <?php } ?>
	                                                </select>
	                                            </div>
	                                        </div>
                                    	</form>
								    </div>
								</div> -->
							   
								<div class="row">									
									<div class="col-md-12">									   
										<div class="table-scrollable">	
											<div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">												
											    <h4 class="ml-3"><b>Current Bill Plan</b></h4>
												<hr class="mt-0">
												<table class="table table-striped dataTable no-footer" id="example4">																												 
													  <thead>
                                    <tr>
                                         
                                        <th>#</th>
                                        <th>My Plan Id</th>
                                        <th>Plan Name</th>
                                        <th>Plan Type</th>
                                        <th>Promotion Type</th>
                                        <th>Plan Status</th>
                                        <th>Pulse (Sec/Credit)</th>
                                        <th>Pulse Rate (Paisa)</th>
                                        <th>Assign Date</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="get_all_plan">
                                    
                                     
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

				<?php
  include 'model/add_bill_plan.php';
				?>