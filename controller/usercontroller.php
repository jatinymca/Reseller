


<?php 

include('../configuration/configuration.php');

if(isset($_POST["action"])){
		$action = $_POST["action"];

 if($action=='adduser'){
		 $aduser			 = new Idata();
		 $tablName			 = "vert_age_users";		
		if($_POST['user']!=''	&& $_POST['pass']!='')
		{
		$data['user']		 = validate_input($_POST['user']);
		$data['pass']		 = validate_input($_POST['pass']);
		$data['full_name']	 = validate_input($_POST['full_name']);
		$data['user_level']	 = validate_input($_POST['user_level']);
		$data['user_group']  = validate_input($_POST['user_group']);	
				
			$cfield 	= "user";
			$cfieldData = $data['user'];
			$execute 	= $aduser->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old='',$_rRecordId_old='');
			$acount 	= $aduser->icount;			
			if($acount<=0){
				$execute  = $aduser->insert_data($tablName, $data);
				$query	  = $aduser->sqlquery;
				$sqlError = $aduser->sError;	
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
						$execute  = $aduser->insert_data($tablName1, $data1);
						$query	  = $aduser->sqlquery;
					}
				}//end activity logs	
		}
	 }
	
	// user delete 
	 if($action=='userdelete'){
 	 
					$Duser   	= new Udata();
					$tablName	= "vert_age_users";	
					$cfield	    = "user";
					$cfieldData = $_POST['user_id'];
					 $Duser->delete_record($tablName, $cfield, $cfieldData, $ANDQuery='');
					$query	  = $Duser->sqlquery;		
					$input = 3301; //rendom key
					echo json_encode($input);	 	
			      
			  $aduser			 = new Idata();
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
						$execute  = $aduser->insert_data($tablName1, $data1);
						$query	  = $aduser->sqlquery;
					}
	 }


	 	// user ModifyUser 
	 if($action=='ModifyUser'){
 	 
					$Duser   	= new Udata();
					$tablName	= "vert_age_users";	
					$cfield	    = "user";
					$aData['pass'] = $_POST['pass'];
					$aData['full_name'] = $_POST['full_name'];
					$aData['user_level'] = $_POST['user_level'];
					$aData['user_group'] = $_POST['user_group'];
					$aData['agent_phone_no'] = $_POST['agent_phone_no'];
					$aData['did_no'] = $_POST['did_no'];

					$_iRecId=$_POST['user'];
					 $Duser->update_data($tablName, $cfield, $aData, $_iRecId, $md5='', $ANDQuery='');
					$query	  = $Duser->sqlquery;		
					$input = 3301; //rendom key
					echo json_encode($input);	 	
			      
			  $aduser			 = new Idata();
		 	  $tablName			 = "vert_age_users";	
			 // activity log text and sql table
				 
		 	if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'UPDATE',$query);}

					if($logs_sql=='Y'){
						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']=$cfield;
						$data1['event_type']='UPDATE';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $aduser->insert_data($tablName1, $data1);
						$query	  = $aduser->sqlquery;
					}
	 }
}
	
?>