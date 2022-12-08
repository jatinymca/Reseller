<?php

	if (isset($_GET["contact_id"]))       {$contact_id=$_GET["contact_id"];}
	elseif (isset($_POST["contact_id"]))  {$contact_id=$_POST["contact_id"];}

?>


<div class="row">
	
	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header> <?php  if($contact_id){ echo 'Modify'; }else { echo 'Create'; } ?> Contact</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Phonebook</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Create Contact</a>
					</li>
				</ol>									
			</div>
			<div class="card-body">
			   	<div class="row">	
			   		<div class="col-md-12">
				   		<form id="add_sms_contact" class="add_sms_contact"  action="" method="POST" >

				   			<?php

				   				if($contact_id){ 
					   				echo '<input type="hidden" name="contact_id" class="form-control" id="contact_id" value="'.$contact_id.'" >'; 

					   				$sqlsc = "SELECT * FROM `sms_contact` where contact_id='$contact_id'";
								    $ressc = mysqli_query($conn, $sqlsc);
								    $rowsc=mysqli_fetch_array($ressc);	
								    							 
				   				}
				   			?>
				   			
				   			<div class="col-md-12">
				   				<div class="form-group row">
									<label for="firstname" class="col-sm-4 control-label"> List Name</label>
									<div class="col-sm-8">
										 <select name="group_id" class="form-control">
										 	<option value="">Select List</option>
										 	<?php 

										 	$sql = "SELECT group_id,group_name FROM `vertage_sms_phonebook_groups` where username='$login_id'";
							                    $res = mysqli_query($conn, $sql);
							                    $rowscount = mysqli_num_rows($res);
							                    while($row=mysqli_fetch_array($res)){ 
						                    
						                     	$group_id=$row['group_id'];
						                     	$group_name=$row['group_name'];
							                     	
												?>
													<option value="<?php echo $group_id; ?>" <? if($contact_id){if($rowsc["group_id"]==$group_id){ ?>selected="true"<? }}?>><?php echo $group_name; ?></option>
												<?php

												

										      } ?>
										</select>
									</div>
								</div>	
				   			</div>				               
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="firstname" class="col-sm-4 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="firstname" id="firstname" value="<?php  if($contact_id){ echo $rowsc["firstname"]; }else{echo ' ';}?>" >
									</div>
								</div>											
						    </div>	
	                        <div class="col-md-12">
								<div class="form-group row">
									<label for="lastnmae" class="col-sm-4 control-label">Last Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="lastname" id="lastname" value="<?php  if($contact_id){ echo $rowsc["lastname"]; }else{echo ' ';}?>">
									</div>
								</div>											
						    </div>	
													
							<div class="col-md-12">
								<div class="form-group row">
									<label for="mob" class="col-sm-4 control-label">Mobile No.</label>
									<div class="col-sm-8">
										<input type="text" name="mobile" class="form-control" id="mob" value="<?php  if($contact_id){ echo $rowsc["mobile"]; }else{echo ' ';}?>"  >
									</div>
								</div>											
						    </div>
							<div class="col-md-12">
								<div class="form-group row">
									<label for="email" class="col-sm-4 control-label">EmailId</label>
									<div class="col-sm-8">
										<input type="text" name="email" class="form-control" id="email" value="<?php  if($contact_id){ echo $rowsc["email"]; }else{echo ' ';}?>"  >
									</div>
								</div>											
						    </div>
							<div class="col-md-12">
								<div class="form-group row">
									<label for="overwritecontact" class="col-sm-4 control-label">OverWrite Contacts</label>
									<div class="col-sm-8">
										<input type="checkbox" value="1"  name="overwritecontact" class="form-control" id="checkbox1" <?php  if($contact_id){ if($rowsc["overwritecontact"]==1) {echo 'checked';}else{ echo '';} }?> >
									</div>
								</div>											
						    </div>
													
							<div class="col-md-12">
								<div class="form-group row">
									<label for="validtill" class="col-sm-4 control-label">Desc</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="3" name="desc"><?php  if($contact_id){ echo $rowsc["desc"]; }else{echo ' ';}?></textarea>
									</div>
								</div>											
						    </div>
							 
						    <div class="col-md-12">
								<div class="form-group row text-center pt-3">
									<button type="submit" class="btn btn-primary">Save</button>		
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>							
								 
						
	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header>Upload Contacts</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Contact</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Upload Contact</a>
					</li>
					
				</ol>									
			</div>
			<div class="card-body">
			    <div class="row">						               
					<div class="col-md-12 mb-4">
					    <a href="ContactSample.csv"  class="btn btn-success">Download Sample</a>
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
										<form id="smscontactuplform"  action="import_sms_contatct_csvdata.php" method="post" name="smscontactupload_excel" enctype="multipart/form-data">
											<div class="row">						               
						                        <div class="col-md-12">
													<div class="form-group row">
														<label for="firstname" class="col-sm-4 control-label">List Name</label>
														<div class="col-sm-8">
															<select name="group_id" class="form-control">
																<option value="">Select List</option>
															 	<?php 
															 		$sql = "SELECT group_id,group_name FROM `vertage_sms_phonebook_groups` where username='$login_id'";
												                    $res = mysqli_query($conn, $sql);
												                    $rowscount = mysqli_num_rows($res);
												                    while($row=mysqli_fetch_array($res)){ 
												                     	$group_id=$row['group_id'];
												                     	$group_name=$row['group_name'];

																	echo "<option value='".$group_id."'>".$row['group_name']."</option>";
															      } ?>
															</select>
														</div>
													</div>											
											    </div> 	
                                                <div class="col-md-12">
													<div class="form-group row">
														<label for="lastnmae" class="col-sm-4 control-label">Csv File</label>
														<div class="col-sm-8">
															<input type="file" name='file' class="form-control" id="file">
														</div>
													</div>								
											    </div>
											    <div class="col-md-12">
													<div class="form-group row">
														<label for="overwritecontact" class="col-sm-4 control-label">OverWrite Contacts</label>
														<div class="col-sm-8">
															<input type="checkbox" value="1" name='overwritecontact' class="form-control" id="overwritecontact">
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
									<div class="tab-pane" id="about">
										<p>You'll. His have you'll day make beginning good, herb. Can't place lights
												was evening let his itself. His
												seas unto replenish may every said midst him. Night to air behold tree
												years sixth waters. Unto together
												can't darkness sixth heaven it. Fruit. Image. Winged, a own.</p>
									</div>
									<div class="tab-pane" id="profile">
										<p>It is a long established fact that a reader will be distracted by the
											readable content of a page when
											looking at its layout. The point of using Lorem Ipsum is that it has a
											more-or-less normal distribution of
											letters, as opposed to using 'Content here, content here', making it
											look like readable English.</p>
										
									</div>
								</div>
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
				<header>List Contact</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Phonebook</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Contact List</a>
					</li>
				</ol>									
			</div>	
			<div class="card-body">
	            <div class="row">
	               <div class="col-md-12">
						<div class="row">						               
	                        <div class="col-md-12">
								<div class="form-group row">
									<label for="" class="col-sm-2 control-label"><b>Select PhoneBook List : </b></label>
									<div class="col-sm-4">
										<select name="group_id" id="sms_phonebook_group_id" onchange="getSMS_phonebook_group_id(this);"  class="form-control">
											<option value="">Select List</option>
										 	<?php $sql = "SELECT group_id,group_name FROM `vertage_sms_phonebook_groups` where username='$login_id'";
							                     $res = mysqli_query($conn, $sql);
							                     $rowscount = mysqli_num_rows($res);
							                     while($row=mysqli_fetch_array($res)){ 
							                     	$group_id=$row['group_id'];
							                     	$group_name=$row['group_name'];

											echo "<option value='".$group_id."'>".$row['group_name']."</option>";
										      } ?>
										</select>
									</div>
								</div>											
						    </div>
						</div>
						 
	                	<div class="row">
	                     	<div class="col-sm-12">
	                        <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
	                           -->
	                        	<table class="table table-striped" id="example4">
	                           		<thead>
	                              		<tr role="row">
	                                		<th> First Name</th>
	                                 		<th>Last Name </th>
			                                <th> Mobile No. </th>
			                                <th> Email </th>
			                                <th> created Date </th>
			                                <th> Action </th>
	                              		</tr>
	                           		</thead>
	                           		<tbody id="fetch_sms_contact_group">
	                           			<tr><td colspan="7">No Records</td></tr>
	                           		</tbody>
	                        	</table>
	                     	</div>
	                  	</div>
	               	</div>
	            </div>
	        </div>
	    </div>
	    <br><br>
	</div>
</div>