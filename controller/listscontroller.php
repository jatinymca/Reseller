<?php 

include('../configuration/configuration.php');

if(isset($_POST["action"])){
	 	$action = $_POST["action"];

 if($action=='listsadd'){
		 $list_add			 = new Idata();
		 $tablName			 = "vert_age_lists";		
		if($_POST['list_id']!=''	&& $_POST['active']!='')
		{
		$data['list_id']		 = validate_input($_POST['list_id']);
		$data['list_name']		 = validate_input($_POST['list_name']);
		$data['list_description']	 = validate_input($_POST['list_description']);
		$data['active']	 = validate_input($_POST['active']);
		$data['campaign_id']  = validate_input($_POST['campaign_id']);	
				
			$cfield 	= "list_id";
			$cfieldData = $data['list_id'];
			$execute 	= $list_add->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old='',$_rRecordId_old='');
			$acount 	= $list_add->icount;			
			if($acount<=0){
				$execute  = $list_add->insert_data($tablName, $data);
			 

					$Duser   	= new Udata();
					$tablName	= "vert_age_campaigns";	
					$cfield	    = "campaign_id";
					$aData['assign_list']		 = validate_input($_POST['list_id']);
					$_iRecId="'".$_POST['campaign_id']."'";
					$Duser->update_data($tablName, $cfield, $aData, $_iRecId, $md5='', $ANDQuery='');
					$query	  = $Duser->sqlquery;		
				 
				$query	  = $list_add->sqlquery;
				$sqlError = $list_add->sError;	
				echo '3301';			
			}else{
				echo '3302';
				}	


				// activity log text and sql table
				if($acount<=0){
					if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'ADD',$query);}

					if($logs_sql=='Y'){
						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']=$cfield;
						$data1['event_type']='ADD';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $list_add->insert_data($tablName1, $data1);
						$query	  = $list_add->sqlquery;
					}
				}//end activity logs	
		}
	 }
	
	// List delete 
	 if($action=='list_delete'){
 	 
					$Dlist   	= new Udata();
					$tablName	= "vert_age_lists";	
					$cfield	    = "list_id";
					$cfieldData = $_POST['list_id'];
					$Dlist->delete_record($tablName, $cfield, $cfieldData, $ANDQuery='');
					$query	  = $Dlist->sqlquery;		
					$input = 8023; //rendom key
					echo json_encode($input);	 	
			      
			  $adlist			 = new Idata();
		 	  $tablName			 = "vert_age_users";	
			 // activity log text and sql table
				 
		 	if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'DELETE',$query);}

					if($logs_sql=='Y'){
						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']=$cfield;
						$data1['event_type']='DELETE';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $adlist->insert_data($tablName1, $data1);
						$query	  = $adlist->sqlquery;
					}
	 }

// list update 

	  if($action=='listUpdate'){
 	 
					$Duser   	= new Udata();
					$tablName	= "vert_age_lists";	
					$cfield	    = "list_id";
					$aData['list_name']		 = validate_input($_POST['list_name']);
					$aData['list_description']		 = validate_input($_POST['list_description']);
					$aData['campaign_id']		 = validate_input($_POST['campaign_id']);
					$aData['active']		 = validate_input($_POST['active']);
					$RData['assign_list']		 = '';
					$UData['assign_list']		 = validate_input($_POST['list_id']);
					$_iRecId="'".$_POST['list_id']."'";
					$RecId="'".$_POST['campaign_id']."'";
					$Duser->update_data($tablName, $cfield, $aData, $_iRecId, $md5='', $ANDQuery='');
					$Duser->update_data('vert_age_campaigns', 'assign_list', $RData, $_iRecId, $md5='', $ANDQuery='');
					$Duser->update_data('vert_age_campaigns', 'campaign_id', $UData, $RecId, $md5='', $ANDQuery='');
					$query	  = $Duser->sqlquery;	 	
			      	$input = 3312; //rendom key
					echo json_encode($input);	
		 	  
			 // activity log text and sql table
				 
		 	if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'MODIFY',$query);}

					if($logs_sql=='Y'){
			 			 $adlist			 = new Idata();
						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']=$cfield;
						$data1['event_type']='MODIFY';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $adlist->insert_data($tablName1, $data1);
						$query	  = $adlist->sqlquery;
					}
	 }

	 //#####################################################
	 //##################### GUI Create ####################
	 //#####################################################

	 	if($action=='GuiCreate')
	 			{
 	 
					  	
					     $list_add	= new Idata();
						if($_POST['list_id']!='')
						{
						$list_id		 = validate_input($_POST['list_id']);
						$field_position	 = validate_input($_POST['field_position']);
						$field_name	 = validate_input($_POST['field_name']);
						$type_field	 = validate_input($_POST['type_field']);
						$field_lenght  = validate_input($_POST['field_lenght']);
						$data1['campaign_id']=$list_id;
						$data1['field']=$field_name;
						$data1['input_type']=validate_input($_POST['input_type']);

						$crt_table='vert_age_custom_'.$list_id;
						$crt_table_crm ='vert_age_crm_data_'.$list_id;
						$tablName1='vert_age_lists_type';
						$execute  = $list_add->alter_table($crt_table,$field_name,$type_field,$field_lenght,$field_position); 
						$execute  = $list_add->alter_table($crt_table_crm,$field_name,$type_field,$field_lenght,$field_position);
						$execute  = $list_add->insert_data($tablName1, $data1); 
						$count   = $list_add->icount;
						if($count==0)
						{
								 echo '3301'; 
 						}else{

 							echo '3302';
 						}
						

						}

				}

		if ($action=="GUIfeilddelete") {


					$list_id = $_POST['list_id'];
					$Dlist   	= new Udata();
					$tablName	= "vert_age_custom_$list_id";	
					$tablName1	= "vert_age_crm_data_$list_id";	
					$field = $_POST['field'];
					$Dlist->ALTER_delete($tablName,$field);
					$Dlist->ALTER_delete($tablName1,$field); 
					$cfield	    = "list_id";
					$cfieldData = $_POST['list_id'];
					$Dlist->delete_record('vert_age_lists_type', $cfield, $cfieldData, $ANDQuery=' and field="'.$field.'"');
					$query	  = $Dlist->sqlquery;		
					$input = 8023; //rendom key
					echo json_encode($input);	 	
			      
			  
					 
				} 

	 //#####################################################
	 //##################### DN DATA ####################
	 //#####################################################
	if($action=='ADD_DN')
	{

		$list_add			 = new Idata();
		 $tablName			 = "vert_age_dnc";		
		if($_POST['name']!=''	&& $_POST['phone']!='')
		{
		$data['name']		 = validate_input($_POST['name']);
		$data['phone_number']		 = validate_input($_POST['phone']);
		$cfield 	= "phone_number";
		$cfieldData = $_POST['phone'];
		$execute 	= $list_add->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old='',$_rRecordId_old='');
			$acount 	= $list_add->icount;			
			if($acount<=0){
				$execute  = $list_add->insert_data($tablName, $data);
				$query	  = $list_add->sqlquery;
				$sqlError = $list_add->sError;	
				echo '3301';			
			}else{
				echo '3302';
				}	

			if($acount<=0){		
				if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'ADD',$query);}

					if($logs_sql=='Y'){


						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']='DNC Number';
						$data1['event_type']='ADD';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $list_add->insert_data($tablName1, $data1);
						$query	  = $list_add->sqlquery;
					}
				}
		}
		 
	}


	if ($action=="dn_phone_delete") {

					if($_POST['phone_number']!='')
					{
					$phone_number = $_POST['phone_number'];
					$Dlist   	= new Udata();
				    $cfield	    = "phone_number";
					$cfieldData = $_POST['phone_number'];
					$Dlist->delete_record('vert_age_dnc', $cfield, $cfieldData, $ANDQuery='');
					$query	  = $Dlist->sqlquery;		
					$input = 8023; //rendom key
					echo json_encode($input);	

					 if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'DELETE',$query);}

					if($logs_sql=='Y'){
						$list_add			 = new Idata();

						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']='DNC Number';
						$data1['event_type']='DELETE';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $list_add->insert_data($tablName1, $data1);
						$query	  = $list_add->sqlquery;
					}

					} 	
			      
			  
					 
				} 
}
	
?>