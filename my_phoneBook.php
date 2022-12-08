 <div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>My Phone Book</header>

								   <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
									<li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Contacts</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li><a class="parent-item" href="" style="color:#fff">Phone Book</a>
									</li>
									
								</ol>									
							</div>
							<div class="card-body">
							    <div class="row">
								    <div class="col-lg-6">
								        <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Users
                                            </label>
                                            <div class="col-lg-8">
                                                
                                                   <select class="form-control  select2">
																  <?php 
                                        $smtp="SELECT * FROM `users` WHERE 1 $permission_username";
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
								</div>
							   
								<!-- <div class="row">									
									<div class="col-md-12">									   
										<div class="table-scrollable">	
											<div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">												
											    <h4 class="ml-3"><b>Phone Book Lists </b></h4>
												<hr class="mt-0">
												<table class="table table-striped dataTable no-footer" id="example4">																												 
													  <thead>
													 
                                    <tr>
                                         
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Contact Lists</th>
                                         <th>Level</th>
                                        <th>Parent Group</th>
                                        <th>International</th>
                                        <th>Landline</th> 
                                        <th>Create Date</th>
                                        <th>Total Contacts</th>
                                        <th>Process Upload</th>
                                        <th>Is Public</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    <?php  $smtp="SELECT COUNT(vl.list_id) AS Total,vl.list_id,vl.campaign_id,vl.entry_date,u.user_id FROM vertage_list as vl INNER JOIN vertage_lists as u ON vl.list_id=u.list_id GROUP by vl.list_id";
                                        $res=mysqli_query($conn,$smtp);
                                        $i=1;
                                        while($row=mysqli_fetch_array($res)){  
             
             
                                          ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['list_id']; ?></td>
                                    <td><?php echo $row['entry_date']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td><?php echo $row['campaign_id']; ?></td>
                                    <td>
                                       
                                    </td>
                                     
                                     
                                
                               
                                        <td>
                                            <a href="add_plan.php?plan_id=<?php echo $data['plan_id']; ?>" class="btn btn-default btn-xs m-r-5"><i class="fa fa-pencil font-14"></i></a>
                                            <button class="btn btn-default btn-xs" ><i class="fa fa-trash font-14"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++;} ?>
                                     
                                </tbody>
												</table>										
												
											</div>
												
										</div>
									   
									</div>
								</div>	 -->
								   <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-scrollable">
                     <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                                 -->
                              <table class="table table-striped" id="obd_voice_datatable">
                                 <thead>
                                    <tr>
                                       <th>Camp_ID</th>
                                       <th>List_ID</th>
                                       <th>User</th>
                                       <th>Msg</th>
                                       <th>Info</th>
                                       <th>Refund</th>
                                       <th>Credits</th>
                                       <th>Schedule</th>
                                       <th>Status</th>
                                       <th>Dial</th>
                                       <th>Ans</th>
                                       <th>NA</th>
                                       <th>BZ</th>
                                       <th>CG</th>
                                       <th>FL</th>
                                       <th>BL</th>
                                       <th>Action</th>
                                    </tr>
                                   
                                 </thead>
                                 <tbody  id="obd_voice">
                          
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
				</div>

				<?php
  include 'model/add_bill_plan.php';
				?>