 
<div class="sidebar-container">
	<div class="sidemenu-container navbar-collapse collapse fixed-menu">
		<div id="remove-scroll" class="left-sidemenu">
			<ul id="sub-menu" class="sub-menu sidemenu page-header-fixed slimscroll-style" data-keep-expanded="false"
			data-auto-scroll="true" data-slide-speed="200">
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler">
					<span></span>
				</div>
			</li>

			<li class="nav-item active">
				<a href="?page_name=dashboard" class="nav-link nav-toggle"> 
					<span class="title">Dashboard</span>
				</a>
			</li>

			<li class="nav-item <?php if(isset($menu_name) && $menu_name=='USER'){ echo 'open'; } ?>">
				<a href="javascript:void(0);" class="nav-link nav-toggle">
					<!-- <img alt="logo" class="icom_img" src="assets/img/user.png"> -->
					<span class="title">User</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu" <?php if(isset($menu_name) && $menu_name=='USER'){ echo 'style="display: block;"'; } ?>>
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
							<!-- <img alt="logo" class="icom_img" src="assets/img/manage.png"> --> Manage
							<span class="arrow"></span>
						</a>
						<ul id="sub-menu" class="sub-menu <?php if(isset($sub_menu_name) && $sub_menu_name=='manage'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='manage'){ echo 'style="display: block;"'; } ?>>

							<li class="nav-item">
								<a href="?page_name=user_profile" class="nav-link">
									<i class="fa fa-file-pdf-o"></i> User Profile</a>
								</li>
								<li class="nav-item">
									<a href="?page_name=user_master" class="nav-link">
										<i class="fa fa-rss"></i> User Master</a>
									</li>
									<li class="nav-item">
										<a href="?page_name=user_onboarding" class="nav-link">
											<i class="fa fa-hdd-o"></i> User OnBoarding</a>
										</li>
										<li class="nav-item">
											<a href="?page_name=bill_plan_history" class="nav-link">
												<i class="fa fa-file-pdf-o"></i> Bill Plan History </a>
											</li>
											<li class="nav-item">
												<a href="?page_name=obd_credit_allocation" class="nav-link">
													<i class="fa fa-file-pdf-o"></i> Credit Allocation</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>

								<li class="nav-item">

									<?php

									if($user_type!="admin")
									{
										if($sms_enable=="1")
										{
											?>

											<a href="javascript:void(0);" class="nav-link nav-toggle">

												<span class="title">SMS</span>
												<span class="arrow "></span>
											</a>

											<?php
										}

									}
									else{
										?>
										<a href="javascript:void(0);" class="nav-link nav-toggle">

											<span class="title">SMS</span>
											<span class="arrow "></span>
										</a>

										<?php
									}

									?>

									<ul id="sub-menu" class="sub-menu"  <?php if(isset($menu_name) && $menu_name=='SMS'){ echo 'style="display: block;"'; } ?> >
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
												<i class="fa fa-university"></i> Campaign
												<span class="arrow"></span>
											</a>
											<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'style="display: block;"'; } ?>>

												<li class="nav-item ">
													<a href="?page_name=create_sms_campaign" class="nav-link">
														<i class="fa fa-file-pdf-o"></i>Create SMS Campaign</a>
													</li>
													<li class="nav-item ">
														<a href="?page_name=sms_my_campaign" class="nav-link">
															<i class="fa fa-file-pdf-o"></i> My Campaign</a>
														</li>

													</ul>
												</li>

												<li class="nav-item">
													<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
														<i class="fa fa-flag"></i> Report
														<span class="arrow"></span>
													</a>
													<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Report'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Report'){ echo 'style="display: block;"'; } ?>>

														<li class="nav-item ">
															<a href="?page_name=sms_export_report" class="nav-link">
																<i class="fa fa-file-pdf-o"></i>Export Reports</a>
															</li>
															<li class="nav-item ">
																<a href="?page_name=sms_generate_report" class="nav-link">
																	<i class="fa fa-file-pdf-o"></i> Generate Reports</a>
																</li>

															</ul>
														</li>
														<li class="nav-item">
															<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																<i class="fa fa-university"></i> Request
																<span class="arrow"></span>
															</a>
															<ul class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Request'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Request'){ echo 'style="display: block;"'; } ?> >

																<li class="nav-item ">
																	<a href="?page_name=sms_request_senderid" class="nav-link">
																		<i class="fa fa-file-pdf-o"></i>Request SenderID</a>
																	</li>
																	<li class="nav-item ">
																		<a href="?page_name=sms_request_template" class="nav-link">
																			<i class="fa fa-file-pdf-o"></i> Request Template</a>
																		</li>


																	</ul>
																</li>


																<li class="nav-item">
																	<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																		<i class="fa fa-university"></i> Approvals
																		<span class="arrow"></span>
																	</a>
																	<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Approvals'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Approvals'){ echo 'style="display: block;"'; } ?> >

																		<li class="nav-item">
																			<a href="?page_name=sms_rejected_template" class="nav-link">
																				<i class="fa fa-file-pdf-o"></i> Rejected Template</a>
																			</li>
																		</ul>
																	</li>

																	<li class="nav-item">
																		<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																			<i class="fa fa-address-book"></i> PhoneBook
																			<span class="arrow"></span>
																		</a>
																		<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='PhoneBook'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='PhoneBook'){ echo 'style="display: block;"'; } ?> >

																			<li class="nav-item ">
																				<a href="?page_name=sms_phonebook" class="nav-link">
																					<i class="fa fa-file-pdf-o"></i>My PhoneBook</a>
																				</li>
																				<li class="nav-item ">
																					<a href="?page_name=sms_contact" class="nav-link">
																						<i class="fa fa-file-pdf-o"></i> My Contact</a>
																					</li>

																				</ul>
																			</li>

																			<li class="nav-item">
																				<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																					<i class="fa fa-university"></i> My Account
																					<span class="arrow"></span>
																				</a>
																				<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Account'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Account'){ echo 'style="display: block;"'; } ?> >

																					<li class="nav-item">
																						<a href="?page_name=sms_approved_api" class="nav-link">
																							<i class="fa fa-file-pdf-o"></i> Approved Api </a>
																						</li>
																						<li class="nav-item">
																							<a href="?page_name=get_sms_api_key" class="nav-link">
																								<i class="fa fa-file-pdf-o"></i> Get Api Key </a>
																							</li>
																						</ul>
																					</li>

																					<li class="nav-item">
																						<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																							<i class="fa fa-sliders"></i> Manage
																							<span class="arrow"></span>
																						</a>
																						<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Manage'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Manage'){ echo 'style="display: block;"'; } ?> >

																							<li class="nav-item">
																								<a href="?page_name=sms_link_manager" class="nav-link">
																									<i class="fa fa-file-pdf-o"></i> Smart Link Manager </a>
																								</li>
																								<li class="nav-item">
																									<a href="?page_name=sms_link_dashboard" class="nav-link">
																										<i class="fa fa-file-pdf-o"></i> Smart Link Dashboard </a>
																									</li>
																								</ul>
																							</li>
																						</ul>
																					</li>

																					<li class="nav-item">

																						<a href="javascript:void(0);" class="nav-link nav-toggle">
																							<!-- <img alt="logo" class="icom_img" src="assets/img/obd.png"> -->
																							<span class="title">Email</span>
																							<span class="arrow "></span>
																						</a>


																						<ul id="sub-menu" class="sub-menu"  <?php if(isset($menu_name) && $menu_name=='Email'){ echo 'style="display: block;"'; } ?> >
																							<li class="nav-item">
																								<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																									<i class="fa fa-university"></i> Campaign
																									<span class="arrow"></span>
																								</a>
																								<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'style="display: block;"'; } ?>>

																									<li class="nav-item ">
																										<a href="?page_name=email_campaign" class="nav-link">
																											<i class="fa fa-file-pdf-o"></i> Add Campaign</a>
																										</li>

																									</ul>
																								</li>


																								<li class="nav-item">
																									<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
																										<i class="fa fa-university"></i> Request
																										<span class="arrow"></span>
																									</a>
																									<ul class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Request'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Request'){ echo 'style="display: block;"'; } ?> >

																										<li class="nav-item ">
																											<a href="?page_name=email_request_senderid" class="nav-link">
																												<i class="fa fa-file-pdf-o"></i>Request SenderID</a>
																											</li>
																											<li class="nav-item ">
																												<a href="?page_name=email_request_template" class="nav-link">
																													<i class="fa fa-file-pdf-o"></i> Request Template</a>
																												</li>
																												<li class="nav-item ">
																													<a href="?page_name=view_email_template" class="nav-link">
																														<i class="fa fa-file-pdf-o"></i> View Template</a>
																													</li>
								<!-- <li class="nav-item ">
									<a href="?page_name=email_request_templatedemo" class="nav-link">
										<i class="fa fa-file-pdf-o"></i> Request Template Demo</a>
									</li> -->
								</ul>
							</li>

							<li class="nav-item">
								<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
									<i class="fa fa-address-book"></i> EmailBook
									<span class="arrow"></span>
								</a>
								<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='EmailBook'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='EmailBook'){ echo 'style="display: block;"'; } ?> >

									<li class="nav-item ">
										<a href="?page_name=email_list" class="nav-link">
											<i class="fa fa-list"></i>My List</a>
										</li>
										<li class="nav-item ">
											<a href="?page_name=emailbook_list" class="nav-link">
												<i class="fa fa-envelope"></i> Email Address</a>
											</li>
										</ul>
									</li>

									<li class="nav-item">
										<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
											<i class="fa fa-history"></i> Email Histroy
											<span class="arrow"></span>
										</a>
										<ul id="sub-menu" class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='EmailHistory'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='EmailHistory'){ echo 'style="display: block;"'; } ?> >

											<li class="nav-item ">
												<a href="?page_name=send_email_list" class="nav-link">
													<i class="fa fa-paper-plane"></i>Send Mail List</a>
												</li>

											</ul>
										</li>

									</ul>
								</li>


								<li class="nav-item <?php if(isset($menu_name) && $menu_name=='OBD'){ echo 'open'; } ?>">
									<?php 

									if($user_type!="admin")
									{
										if($obd_enable=="1")
										{
											?>

											<a href="javascript:void(0);" class="nav-link nav-toggle">
												<!-- <img alt="logo" class="icom_img" src="assets/img/obd.png"> -->
												<span class="title">OBD</span>
												<span class="arrow "></span>
											</a>

											<?php
										}

									}
									else{
										?>
										<a href="javascript:void(0);" class="nav-link nav-toggle">
											<!-- <img alt="logo" class="icom_img" src="assets/img/obd.png"> -->
											<span class="title">OBD</span>
											<span class="arrow "></span>
										</a>

										<?php
									}

									?>
									<ul id="sub-menu" class="sub-menu"  <?php if(isset($menu_name) && $menu_name=='OBD'){ echo 'style="display: block;"'; } ?> >
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
												<i class="fa fa-university"></i> Campaign
												<span class="arrow"></span>
											</a>
											<ul class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='campaign'){ echo 'style="display: block;"'; } ?>>

												<li class="nav-item ">
													<a href="?page_name=obd_my_campaign" class="nav-link">
														<i class="fa fa-file-pdf-o"></i> My Campaign</a>
													</li>
								<!-- <li class="nav-item ">
									<a href="?page_name=my_group" class="nav-link">
										<i class="fa fa-file-pdf-o"></i> My Group</a>
									</li> -->

								</ul>
							</li>
							<li class="nav-item" <?php if(isset($menu_name) && $menu_name=='OBD'){ echo 'open'; } ?>>
								<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
									<i class="fa fa-university"></i> Report
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='Report'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='Report'){ echo 'style="display: block;"'; } ?>>
									<li class="nav-item">
										<a href="?page_name=obd_generate_reports" class="nav-link">
											<i class="fa fa-file-pdf-o"></i> Generate Reports</a>
										</li>
										<li class="nav-item " >
											<a href="?page_name=compaign_invoice_list" class="nav-link">
												<i class="fa fa-file-pdf-o"></i>Invoice</a>
											</li> 
											<li class="nav-item">
												<a href="?page_name=obd_export_reports" class="nav-link">
													<i class="fa fa-file-pdf-o"></i> Export Reports</a>
												</li>
											</ul>
										</li>
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
												<i class="fa fa-university"></i> Announcement
												<span class="arrow"></span>
											</a>
											<ul class="sub-menu">

												<li class="nav-item">
													<a href="?page_name=announcement" class="nav-link">
														<i class="fa fa-file-pdf-o"></i> Sound Album</a>
													</li>
												</ul>
											</li>
						<!-- <li class="nav-item">
							<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
								<i class="fa fa-university"></i> Credit Allocation
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								
								
							</ul>
						</li> -->
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
								<i class="fa fa-university"></i> Phone Book
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu  <?php if(isset($sub_menu_name) && $sub_menu_name=='contacts'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='contacts'){ echo 'style="display: block;"'; } ?> >
								
								<li class="nav-item">
									<a href="?page_name=my_phoneBook" class="nav-link">
										<i class="fa fa-file-pdf-o"></i> My PhoneBook </a>
									</li>
									<li class="nav-item">
										<a href="?page_name=my_contacts" class="nav-link">
											<i class="fa fa-file-pdf-o"></i> My Contacts </a>
										</li>
									</ul>
								</li>
								
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
										<i class="fa fa-university"></i> Manage
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										
										<li class="nav-item">
											<a href="obd_allocate_service_no.html" class="nav-link">
												<i class="fa fa-file-pdf-o"></i> Allocate Service No </a>
											</li>
											<li class="nav-item">
												<a href="obd_user_map_with_custField.html" class="nav-link">
													<i class="fa fa-file-pdf-o"></i> User Map With CustField </a>
												</li>
											</ul>
										</li>

									</ul>

								</li>

								<li class="nav-item <?php if(isset($menu_name) && $menu_name=='IVRS'){ echo 'open'; } ?>">
									<?php 

									if($user_type!="admin")
									{
										if($ivr_enable=="1")
										{
											?>

											<li class="nav-item">
												<a href="?page_name=ivr" class="nav-link nav-toggle">
													<span class="title"> IVRS</span>
													<span class="arrow "></span>
												</a>
											</li>

											<?php
										}

									}
									else{
										?>
										<li class="nav-item">
											<a href="?page_name=ivr" class="nav-link nav-toggle">
												<span class="title"> IVRS</span>
												<span class="arrow "></span>
											</a>
										</li>

										<?php
									}

									?>   
								</li>
								<ul id="sub-menu" class="sub-menu"  <?php if(isset($menu_name) && $menu_name=='ivr'){ echo 'style="display: block;"'; } ?> >
									<li class="nav-item">
										<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
											<i class="fa fa-university"></i> welcome
											<span class="arrow"></span>
										</a> 

									</li>  													 	
								</ul>
								
								

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link nav-toggle">

										<span class="title">Setting</span>
										<span class="arrow "></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
												<!-- <img alt="logo" class="icom_img" src="assets/img/manage.png"> --> Manage
												<span class="arrow"></span>
											</a>
											<ul class="sub-menu">

												<li class="nav-item">
													<a href="?page_name=my_group" class="nav-link">
														<i class="fa fa-file-pdf-o"></i> Group</a>
													</li>
													<li class="nav-item">
														<a href="?page_name=my_carrier" class="nav-link">
															<i class="fa fa-rss"></i>Carrier </a>
														</li>
														<li class="nav-item">
															<a href="?page_name=channel_setting" class="nav-link">
																<i class="fa fa-hdd-o"></i> Channel</a>
															</li>
														</ul>
													</li>
												</ul>
											</li>
											<li class="nav-item <?php if(isset($menu_name) && $menu_name=='Request'){ echo 'open'; } ?>">
												<a href="javascript:void(0);" class="nav-link nav-toggle">
													<!-- <img alt="logo" class="icom_img" src="assets/img/user.png"> -->
													<span class="title">Request</span>
													<span class="arrow "></span>
												</a>
												<ul class="sub-menu" <?php if(isset($menu_name) && $menu_name=='Request'){ echo 'style="display: block;"'; } ?>>
													<li class="nav-item">
														<a href="javascript:void(0);" class="nav-link nav-toggle sub_parent">
															<!-- <img alt="logo" class="icom_img" src="assets/img/manage.png"> --> Manage
															<span class="arrow"></span>
														</a>
														<ul id="sub-menu" class="sub-menu <?php if(isset($sub_menu_name) && $sub_menu_name=='manage'){ echo 'open'; } ?>" <?php if(isset($sub_menu_name) && $sub_menu_name=='manage'){ echo 'style="display: block;"'; } ?>>

															<li class="nav-item">
																<a href="?page_name=credit_request" class="nav-link">
																	<i class="fa fa-file-pdf-o"></i> Credit Request</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>