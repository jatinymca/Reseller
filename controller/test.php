<?php

include('../configuration/configuration.php');

if(isset($_POST["action"]))
{
	 	$action = $_POST["action"];
	 	$campaign_id = $_POST["campaign_id"];
	 	$assign_user = $_POST["assign_user"];

  foreach ($assign_user as $key => $value)
   {
	 	 			$Duser   	= new Udata();
					$tablName	= "vert_age_users";	
					$cfield	    = "user";
					$aData['campaign_id'] = $_POST['campaign_id'];
					 

					$_iRecId=$value;
					 $Duser->update_data($tablName, $cfield, $aData, $_iRecId, $md5='', $ANDQuery='');
					$query	  = $Duser->sqlquery;		
					$input = 3301; //rendom key
					echo json_encode($input); 

	}
	 	
}

	 	?>