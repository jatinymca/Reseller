<?php
require('../configuration/c_config.php');
  require('dynamic_sql_command.php');
$Process_name=$_SESSION['act_user']['primary_process'];
 $agency_name_session=$_SESSION['act_user']['agency_name'];
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["columne_name"]))       {$columne_name=$_GET["columne_name"];}
elseif (isset($_POST["columne_name"]))  {$columne_name=$_POST["columne_name"];} 
if (isset($_GET["Queue_key_result"]))       {$Queue_key_result=$_GET["Queue_key_result"];}
elseif (isset($_POST["Queue_key_result"]))  {$Queue_key_result=$_POST["Queue_key_result"];}  
if (isset($_GET["case_status"]))       {$case_status=$_GET["case_status"];}
elseif (isset($_POST["case_status"]))  {$case_status=$_POST["case_status"];}  
if (isset($_GET["status"]))       {$status=$_GET["status"];}
elseif (isset($_POST["status"]))  {$status=$_POST["status"];}  
if (isset($_GET["level_name"]))       {$level_name=$_GET["level_name"];}
elseif (isset($_POST["level_name"]))  {$level_name=$_POST["level_name"];}   
if (isset($_GET["function_name"]))       {$function_name=$_GET["function_name"];}
elseif (isset($_POST["function_name"]))  {$function_name=$_POST["function_name"];}   
if (isset($_GET["column_values"]))       {$column_values=$_GET["column_values"];}
elseif (isset($_POST["column_values"]))  {$column_values=$_POST["column_values"];}  

if (isset($_GET["case_id"]))       {$case_id=$_GET["case_id"];}
elseif (isset($_POST["case_id"]))  {$case_id=$_POST["case_id"];} 

 if($action=='auto_populated_data_requerd'){
 
          if($columne_name=='login_status'){
                    if($column_values='FTNR'){
                       $result['gst_number']= 'required';
                    }else{
                       $result['login_date_time']= 'required';
                      }
              }
  

  
 
 
}
 echo json_encode($result);
?>


 