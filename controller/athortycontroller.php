<?php 

include('../configuration/configuration.php');

if(isset($_POST["action"])){
	 	$action = $_POST["action"];
 
 
	if($action=='ADD_ROLE')
	{

		$list_add			 = new Idata();
		 $tablName			 = "vert_age_role";		
		if($_POST['ROLENAME']!='')
		{
		$data['ROLENAME']		 = validate_input($_POST['ROLENAME']);
		 
		$cfield 	= "ROLENAME";
		$cfieldData = $_POST['ROLENAME'];
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
						$data1['event_section']='ADD ROLE';
						$data1['event_type']='ADD';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $list_add->insert_data($tablName1, $data1);
						$query	  = $list_add->sqlquery;
					}
				}
		}
		 
	}


	if($action=='ADD_DELETE')
	{
		$addrole= new Udata();
		  $tablName="vert_age_role";
		$cfield  ="id";
		$cfieldData=$_POST['id'];
		 $addrole->delete_record($tablName,$cfield,$cfieldData,$ANDQuery='');
		$input=8023;
		echo json_encode($input);

		if($logs_text=='Y'){active_log($now,$user,get_client_ip(),$cfield,$action,'ADD',$query);}

					if($logs_sql=='Y'){

							$list_add= new Idata();
						$tablName1			 = "vert_age_admin_log";
						$data1['event_date']=$now;
						$data1['user']=$user;
						$data1['ip_address']=get_client_ip();
						$data1['event_section']='DNC ROLE';
						$data1['event_type']='ADD';
						$data1['event_sql']=str_replace("'", '"', $query);
						$execute  = $list_add->insert_data($tablName1, $data1);
						$query	  = $list_add->sqlquery;
					}
	}

	 
}
	
?>