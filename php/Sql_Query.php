<?php
require('../configuration/c_config.php');
 
  
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["team_name"]))       {$team_name=$_GET["team_name"];}
elseif (isset($_POST["team_name"]))  {$team_name=$_POST["team_name"];}
if (isset($_GET["team_dec"]))       {$team_dec=$_GET["team_dec"];}
elseif (isset($_POST["team_dec"]))  {$team_dec=$_POST["team_dec"];}
if (isset($_GET["level_name"]))       {$level_name=$_GET["level_name"];}
elseif (isset($_POST["level_name"]))  {$level_name=$_POST["level_name"];}
if (isset($_GET["level_dec"]))       {$level_dec=$_GET["level_dec"];}
elseif (isset($_POST["level_dec"]))  {$level_dec=$_POST["level_dec"];}
if (isset($_GET["id"]))       {$id=$_GET["id"];}
elseif (isset($_POST["id"]))  {$id=$_POST["id"];}
if (isset($_GET["user_name"]))       {$user_name=$_GET["user_name"];}
elseif (isset($_POST["user_name"]))  {$user_name=$_POST["user_name"];}
if (isset($_GET["user_email"]))       {$user_email=$_GET["user_email"];}
elseif (isset($_POST["user_email"]))  {$user_email=$_POST["user_email"];}
if (isset($_GET["user_pass"]))       {$user_pass=$_GET["user_pass"];}
elseif (isset($_POST["user_pass"]))  {$user_pass=$_POST["user_pass"];}
if (isset($_GET["Process_id"]))       {$Process_id=$_GET["Process_id"];}
elseif (isset($_POST["Process_id"]))  {$Process_id=$_POST["Process_id"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["status"]))       {$status=$_GET["status"];}
elseif (isset($_POST["status"]))  {$status=$_POST["status"];}
if (isset($_GET["input_label"]))       {$input_label=$_GET["input_label"];}
elseif (isset($_POST["input_label"]))  {$input_label=$_POST["input_label"];}
if (isset($_GET["field_type"]))       {$field_type=$_GET["field_type"];}
elseif (isset($_POST["field_type"]))  {$field_type=$_POST["field_type"];}
if (isset($_GET["extra_values"]))       {$extra_values=$_GET["extra_values"];}
elseif (isset($_POST["extra_values"]))  {$extra_values=$_POST["extra_values"];}
if (isset($_GET["field_colm"]))       {$field_colm=$_GET["field_colm"];}
elseif (isset($_POST["field_colm"]))  {$field_colm=$_POST["field_colm"];}
if (isset($_GET["variable_value"]))       {$variable_value=$_GET["variable_value"];}
elseif (isset($_POST["variable_value"]))  {$variable_value=$_POST["variable_value"];}
if (isset($_GET["variable_name"]))       {$variable_name=$_GET["variable_name"];}
elseif (isset($_POST["variable_name"]))  {$variable_name=$_POST["variable_name"];}
if (isset($_GET["level_name"]))       {$level_name=$_GET["level_name"];}
elseif (isset($_POST["level_name"]))  {$level_name=$_POST["level_name"];}
if (isset($_GET["report_field"]))       {$report_field=$_GET["report_field"];}
elseif (isset($_POST["report_field"]))  {$report_field=$_POST["report_field"];} 
if (isset($_GET["report_name"]))       {$report_name=$_GET["report_name"];}
elseif (isset($_POST["report_name"]))  {$report_name=$_POST["report_name"];}
if (isset($_GET["report_dec"]))       {$report_dec=$_GET["report_dec"];}
elseif (isset($_POST["report_dec"]))  {$report_dec=$_POST["report_dec"];}
if (isset($_GET["user_id"]))       {$user_id=$_GET["user_id"];}
elseif (isset($_POST["user_id"]))  {$user_id=$_POST["user_id"];}
if (isset($_GET["report_type"]))       {$report_type=$_GET["report_type"];}
elseif (isset($_POST["report_type"]))  {$report_type=$_POST["report_type"];}
if (isset($_GET["user_group"]))       {$user_group=$_GET["user_group"];}
elseif (isset($_POST["user_group"]))  {$user_group=$_POST["user_group"];}
if($action=='create_team'){
  if(isset($id) && !empty($id)){
	  $smtp="UPDATE `create_team` SET  `team_name`='$team_name',`team_dec`='$team_dec' WHERE id='$id'";

	}else{
	  $smtp="INSERT INTO `create_team`(`team_name`, `team_dec`) VALUES ('$team_name','$team_dec')";

	}
	 
	if($row=mysqli_query($conn,$smtp)){
	  $smtp="INSERT INTO `permission_role`(`role_id`) VALUES('$team_name')";
	  mysqli_query($conn,$smtp);
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
	 

}
if($action=='create_level'){

	if(isset($id) && !empty($id)){
    echo $smtp="UPDATE `create_level` SET  `level_name`='$level_name',`level_dec`='$level_dec' WHERE id='$id'";

	}else{
echo $smtp="INSERT INTO `create_level`(`level_name`, `level_dec`,`Process_name`) VALUES ('$level_name','$level_dec','$Process_name')";

	}
	 
	if($row=mysqli_query($conn,$smtp)){
	  
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
	 

}
if($action=='create_team_delete'){

	  $smtp="DELETE FROM `create_team` WHERE id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='create_user'){
	$level_name=implode(',',$level_name);
	if(isset($user_id) && !empty($user_id)){

	  $smtp="UPDATE `user` SET  `user_name`='$user_name',`user_email`='$user_email',`user_pass`='$user_pass',`user_type`='$team_name', `level_name`='$level_name', user_group='$user_group' WHERE user_id='$user_id'";

	}else{
         $user_id=rand(00000,99999);

	   $smtp="INSERT INTO `user`(`user_id`,`user_name`, `user_email`, `user_pass`, `user_type`,`level_name`,`user_group`) VALUES ('$user_id','$user_name','$user_email','$user_pass','$team_name','$level_name','$user_group')";
	 	}
	if($row=mysqli_query($conn,$smtp)){
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 

if($action=='created_process_list'){
           
           $Process_name=str_replace(' ','',$Process_name);
	   $smtp="INSERT INTO `Process_list`(`Process_id`, `Process_name`, `created_date`, `status`) VALUES ('$Process_id','$Process_name','$today','$status')";
	 
	if($row=mysqli_query($conn,$smtp)){

				   $selQuery="CREATE TABLE  `Process_".$Process_name."`  LIKE Process_tb;";
				   mysqli_query($conn,$selQuery);
				    $selQuery="CREATE TABLE  `Process_".$Process_name."_log`  LIKE Process_log_tb;";
				   mysqli_query($conn,$selQuery);
				    echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 

if($action=='copy_process_list'){
           
       $Process_name=str_replace(' ','',$Process_name);
	   $smtp="CREATE TABLE Process_$Process_name LIKE Process_$Process_id";
	 
	if($row=mysqli_query($conn,$smtp)){
				$Process_id_1=rand(0000000,9999999);	
				  $smtp="INSERT INTO `Process_list`(`Process_id`, `Process_name`, `created_date`, `status`) VALUES ('$Process_id_1','$Process_name','$today','$status')";
				mysqli_query($conn,$smtp);
			 	$smtp="SELECT * FROM `table_field_list` WHERE  Process_name='$Process_id'";
				$res=mysqli_query($conn,$smtp);
				while($r1=mysqli_fetch_array($res)){

					$field_colm=$r1['field_colm'];
					$field_type=$r1['field_type'];
					$extra_values=$r1['extra_values'];
					$input_label=$r1['input_label'];
					$input_name=$r1['input_name'];
					$level=$r1['level'];
					 
					  $sm="INSERT INTO `table_field_list`(`Process_id`, `Process_name`, `field_colm`, `field_type`, `extra_values`, `input_label`, `input_name`, `user_id`, `level`) VALUES ('$Process_id_1','$Process_name','$field_colm','$field_type','$extra_values','$input_label','$input_name','$user_id','$level')";
					 mysqli_query($conn,$sm);

				}

 					echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='process_list_delete'){
 
	           $smtp="SELECT * FROM `Process_list` WHERE Process_id='$id'";
     if($row=mysqli_query($conn,$smtp)){
                $data=mysqli_fetch_array($row);
                $Process_name=$data['Process_name'];
                $smtp="DELETE FROM `table_field_list` WHERE Process_name='$Process_name';";
                $smtp.="DROP TABLE Process_$Process_name;";
                $smtp.="DELETE FROM `Process_list` WHERE Process_id='$id';";
                mysqli_multi_query($conn,$smtp);
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 


if($action=='create_field_table'){
           
           $field_colm=str_replace(' ','_',$field_colm);
	       $smtp="INSERT INTO `table_field_list`(`Process_id`,`Process_name`, `field_colm`, `field_type`, `extra_values`, `input_label`, `input_name`,`level`) VALUES ('$Process_id','$Process_name','$field_colm','$field_type','$extra_values','$input_label','$field_colm','$level_name')";
	 
	if($row=mysqli_query($conn,$smtp)){
		    $table_name='Process_'.$Process_name;
		    $smtp1="ALTER TABLE `".$table_name."` ADD `".$field_colm."` VARCHAR(250) NOT NULL";
		  mysqli_query($conn,$smtp1);
		   $table_name='Process_'.$Process_name.'_log';
		    $smtp1="ALTER TABLE `".$table_name."` ADD `".$field_colm."` VARCHAR(250) NOT NULL";
		  mysqli_query($conn,$smtp1);
           echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='create_field_table_edit'){
           
          
	        $smtp="UPDATE `table_field_list` SET `field_type`='$field_type',`extra_values`='$extra_values',`level`='$level_name' WHERE id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
		   echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='delete_process_list_field'){
 
	     $smtp="DELETE FROM `table_field_list` WHERE id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
					$table_name='Process_'.$Process_name;
					  $smtp1="ALTER TABLE `$table_name` DROP `$field_colm`;";
					mysqli_query($conn,$smtp1);
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='update_process_colume'){
          $variable_value=implode(',',$variable_value);
	      $smtp="UPDATE `table_field_list` SET $variable_name='$variable_value' WHERE  id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
				echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
} 
if($action=='permission'){
 
	      $smtp="UPDATE `permission_role` SET `$field_colm`='$status'  WHERE role_id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
					 
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
}

if($action=='company_profile_update'){
 
	     $smtp="UPDATE `company_profile` SET `variable_value`='$variable_value' WHERE `variable_name`='$variable_name'";
	 
	if($row=mysqli_query($conn,$smtp)){
					 
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
}
if($action=='report_list_create'){
 
	      $smtp="INSERT INTO `Process_report_list`(`report_name`, `report_dec`,`report_type`) VALUES ('$report_name','$report_dec','$report_type')";
	 
	if($row=mysqli_query($conn,$smtp)){
					 
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
}
if($action=='created_report_list'){
      
      $smtp="SELECT * FROM `Report_colume_name` WHERE report_name='$report_name' and Process_name='$Process_name' and report_field='$report_field'";
      $res=mysqli_query($conn,$smtp);
      $count=mysqli_num_rows($res);

      if($count==0){
      		  $smtp="INSERT INTO `Report_colume_name`(`report_name`, `Process_name`, `report_field`, `calculate_formula`) VALUES ('$report_name','$Process_name','$report_field','')";
      		if($row=mysqli_query($conn,$smtp)){
					 
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
               }else{

               	echo "Duplicate Entry";
               }

	  
	 
	
}
if($action=='report_field_delete'){
 
	       $smtp="DELETE FROM `Process_report_list` WHERE report_name='$report_name'";
	 
	if($row=mysqli_query($conn,$smtp)){
					 $smtp="DELETE FROM `Report_colume_name` WHERE  report_name='$report_name'";
					 mysqli_query($conn,$smtp);
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
}
if($action=='report_field_delete'){
 
	       $smtp="DELETE FROM `Report_colume_name` WHERE  id='$id'";
	 
	if($row=mysqli_query($conn,$smtp)){
			 
    			echo "Successfull";
			}else{
				echo "Error : UnSuccessfull";
				 
			}
}
