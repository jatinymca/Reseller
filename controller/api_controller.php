<?php

require('../configuration/c_config.php');
require('../configuration/function.php');
require('../php/dynamic_sql_command.php');

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["status"]))       {$status=$_GET["status"];}
elseif (isset($_POST["status"]))  {$status=$_POST["status"];}
if (isset($_GET["username"]))       {$username=$_GET["username"];}
elseif (isset($_POST["username"]))  {$username=$_POST["username"];}
if (isset($_GET["api_url"]))       {$api_url=$_GET["api_url"];}
elseif (isset($_POST["api_url"]))  {$api_url=$_POST["api_url"];}
if (isset($_GET["delete_id"]))       {$delete_id=$_GET["delete_id"];}
elseif (isset($_POST["delete_id"]))  {$delete_id=$_POST["delete_id"];}




if($action=="add_sms_api"){

	if(!empty($api_url)){
		
		$sql = "SELECT id FROM sms_api WHERE api_url='$api_url'";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);

		if($count==0){

			$q = "INSERT INTO sms_api (`api_url`,`created_date`,`username`) VALUES ('$api_url','$now','$login_id')";
			if(mysqli_query($conn, $q)){
				$data       = "API insert successfully";
				$response   = "200";
			}
			else{
				$data       = "Something Wrong!";
				$response   = "400";
			}
		}
		else{
				$data       = "API Url already exist, Kindly enter another URL.";
				$response   = "400";
			}
			
	}
	else{
		$data       = "Kindly insert url value!";
		$response   = "400";
	}

}


if($action=="delete_api"){

	if(!empty($delete_id)){
		$sql = "DELETE FROM sms_api WHERE api_id='$delete_id'";
		if(mysqli_query($conn, $sql)){
			$data       = "API deleted successfully";
			$response   = "200";
		}else{
			$data       = "Something Wrong!";
			$response   = "400";
		}
	}else{
		$data       = "Something Wrong!";
		$response   = "400";
	}


}


$output	= array("Response"=>$response,"message"=>$data);


echo json_encode($output);

?>





