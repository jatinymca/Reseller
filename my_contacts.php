					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Create Contact</header>
                                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
										<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
										</li>
										<li><a class="parent-item" href="" style="color:#fff">Voice</a>&nbsp;<i class="fa fa-angle-right"></i>
										</li>
										<li><a class="parent-item" href="" style="color:#fff">Phonebook</a>&nbsp;<i class="fa fa-angle-right"></i>
										</li>
											<li><a class="parent-item" href="" style="color:#fff">Create Contact</a>
										</li>
										
									</ol>									
								</div>
								<div class="card-body">
								<form   id="obd_my_contact">	
								   	<div class="row">						               
						                        <div class="col-md-12">																			
													<div class="form-group row">
														<label for="firstname" class="col-sm-4 control-label">Campaign</label>
														<div class="col-sm-8">
															 <select name="campaign_id" class="form-control">
															 	<?php $sql = "SELECT campaign_id,campaign_description FROM `vertage_campaign` where 1 $permission_username";
												                     $res = mysqli_query($conn, $sql);
												                     $rowscount = mysqli_num_rows($res);
												                     while($row=mysqli_fetch_array($res)){ 
												                     	$campaign_id=$row['campaign_id'];
												                     	$campaign_description=$row['campaign_description']; 
																echo "<option value='$campaign_id'>".$campaign_id." - ".$campaign_description."</option>";
															      } ?>
															</select>														</div>
															<input type="hidden" class="form-control" id="Campaign" name="username" value="<?php echo $login_id; ?>">
													</div>											
											    </div>	
                                                <div class="col-md-12">																			
													<div class="form-group row">
														<label for="lastnmae" class="col-sm-4 control-label">Phone</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="lastnmae" name="phone_number">
														</div>
													</div>											
											    </div>	 
									</div>	 
								    <div class="row">					
										<div class="col-md-12 text-center pt-3">
										   <button type="submit" class="btn btn-primary">Save</button>		
											<button type="submit" class="btn btn-primary">New</button>
											<button type="submit" class="btn btn-primary">Delete</button>										   
										  
										</div>
									</div>
							</form>
								</div>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Upload Contacts</header>
                                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
										<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
										</li>
										<li><a class="parent-item" href="" style="color:#fff">Voice</a>&nbsp;<i class="fa fa-angle-right"></i>
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
										    <a href="file_formate.php"  class="btn btn-success">Download Sample</a>
										</div>
									</div>		
                                    <div class="row">
                                        <div class="col-lg-12">
										    <div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab ">
									<ul class="nav nav-tabs">
										<li class="nav-item" ><a href="#home" data-toggle="tab" class="active">Choose xls File</a>
										</li>
										<li class="nav-item"><a href="#about" data-toggle="tab" class="">Upload</a>
										</li>
										<li class="nav-item"><a href="#profile" data-toggle="tab" class="">Cancel</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane active" id="home">
											 <form id="uplform"  action="import_csvdata.php" method="post" name="upload_excel" enctype="multipart/form-data">
											<div class="row">						               
						                        <div class="col-md-12">	 
													<div class="form-group row">
													   <label for="firstname" class="col-sm-4 control-label">Campaign Id</label>
														<div class="col-sm-8">
															 <select name="campaign_id" class="form-control">
															 	<?php $sql = "SELECT campaign_id,campaign_description FROM `vertage_campaign` where 1 $permission_username ";
												                     $res = mysqli_query($conn, $sql);
												                     $rowscount = mysqli_num_rows($res);
												                     while($row=mysqli_fetch_array($res)){ 
												                     	$campaign_id=$row['campaign_id'];
												                     	$campaign_description=$row['campaign_description']; 
																echo "<option value='$campaign_id'>".$campaign_id." - ".$campaign_description."</option>";
															      } ?>
															</select>
														</div>
													</div>											
											    </div>	
                                                <div class="col-md-12">	 
													<div class="form-group row">
														<label for="lastnmae" class="col-sm-4 control-label">File</label>
														<div class="col-sm-8">
															<input type="file" name='file' class="form-control" id="lastnmae">
														</div>
													</div>											
											    </div>	
												 </div>
												   <div class="row">					
										<div class="col-md-12 text-center pt-3">
										   <button type="submit" class="btn btn-primary">Upload </button> 
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
					</div>