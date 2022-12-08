<?php 

include('../configuration/configuration.php');

if(isset($_POST["action"])){
	 	 $action = $_POST["action"];

 if($action=='AddDispositionFast'){
		 $add_dispo			 = new Idata();
		  $tablName			 = "vert_age_disposition";	
		$campaign_id = validate_input($_POST['campaign_id']);	

		if($_POST['status']!=''	&& $_POST['status_name']!='')
		{
		$data['status']		 = validate_input($_POST['status']);
		$data['list_name']		 = validate_input($_POST['list_name']);
		$data['status_name']	 = validate_input($_POST['status_name']);
		$data['selectable']	 = validate_input($_POST['selectable']);
		$data['campaign_id']  = validate_input($_POST['campaign_id']);	
				
			$cfield 	= "status";
			$cfieldData = $data['status'];
			$_match_field_old="campaign_id='$campaign_id'";
			 
			$execute 	= $add_dispo->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old,$_rRecordId_old='');
			$acount 	= $add_dispo->icount;			
			if($acount<=0){
				 $execute  = $add_dispo->insert_data($tablName, $data);
				 $query	  = $add_dispo->sqlquery;
				$sqlError = $add_dispo->sError;	
				echo '3301';			
			}else{
				echo '3302';
				}	


				 
		}
	 }


	 if($action=='AddDispositionSecound'){
		 $add_dispo			 = new Idata();
		 $tablName			 = "vert_age_disposition_second";	
		  $campaign_id = validate_input($_POST['campaign_id']);	

		if($_POST['Fast_dispo']!=''	&& $_POST['dispo_name']!='')
		{
		$data['Fast_dispo']		 = validate_input($_POST['Fast_dispo']);
		$data['Secound_dispo']		 = validate_input($_POST['Secound_dispo']);
		$data['dispo_name']	 = validate_input($_POST['dispo_name']);
		$data['campaign_id']  = validate_input($_POST['campaign_id']);	
				
			$cfield 	= "Secound_dispo";
			$cfieldData = $data['Secound_dispo'];
			$_match_field_old="campaign_id='$campaign_id' ";
			 
			$execute 	= $add_dispo->check_duplicate_record($tablName,$cfield,$cfieldData,$_match_field_old,$_rRecordId_old='');
			$acount 	= $add_dispo->icount;			
			if($acount<=0){
				 $execute  = $add_dispo->insert_data($tablName, $data);
				 $query	  = $add_dispo->sqlquery;
				$sqlError = $add_dispo->sError;	
				echo '3301';			
			}else{
				echo '3302';
				}	


				 
		}
	 }
}

?>