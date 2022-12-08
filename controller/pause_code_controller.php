<?php 

include('../configuration/configuration.php');

if(isset($_POST["action"])){
	 	  $action = $_POST["action"];

 if($action=='pause_code_add'){
		 $list_add			 = new Idata();
		 $tablName			 = "vert_age_pause_codes";		
		if($_POST['campaign_id']!=''	&& $_POST['pause_code']!='')
		{
		$data['pause_code']		 = validate_input($_POST['pause_code']);
		$data['pause_code_name']		 = validate_input($_POST['pause_code_name']);
		$data['billable']	 = validate_input($_POST['billable']);
		$data['time_limit']	 = validate_input($_POST['time_limit']);
		$data['exceed_action']	 = validate_input($_POST['exceed_action']); 
		$data['campaign_id']  = validate_input($_POST['campaign_id']);	
				
			 $cfield 	= "pause_code";
			$cfieldData = $data['pause_code'];
			$_match_field_old="campaign_id='".$_POST['campaign_id']."'";
			$_rRecordId_old= $_POST['campaign_id'];
			$execute 	= $list_add->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old,$_rRecordId_old='');
			$acount 	= $list_add->icount;			
			if($acount<=0){
				$execute  = $list_add->insert_data($tablName, $data);
			 
 
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
	
	 
}
	
?>