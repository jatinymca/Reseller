<?php
require('../configuration/c_config.php');
require('dynamic_sql_command.php');
require('../configuration/function.php');

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];} 
if (isset($_GET["parent_id"]))       {$parent_id=$_GET["parent_id"];}
elseif (isset($_POST["parent_id"]))  {$parent_id=$_POST["parent_id"];} 
if (isset($_GET["exportdata"]))       {$exportdata=$_GET["exportdata"];}
elseif (isset($_POST["exportdata"]))  {$exportdata=$_POST["exportdata"];} 
if (isset($_GET["data_tbl"]))       {$data_tbl=$_GET["data_tbl"];}
elseif (isset($_POST["data_tbl"]))  {$data_tbl=$_POST["data_tbl"];}
if (isset($_GET["id"]))       {$id=$_GET["id"];}
elseif (isset($_POST["id"]))  {$id=$_POST["id"];} 
if (isset($_GET["campaign_id"]))       {$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))  {$campaign_id=$_POST["campaign_id"];} 
if (isset($_GET["user_id"]))       {$user_id=$_GET["user_id"];}
elseif (isset($_POST["user_id"]))  {$user_id=$_POST["user_id"];}  
if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];} 
if (isset($_GET["credit_request_id"]))       {$credit_request_id=$_GET["credit_request_id"];}
elseif (isset($_POST["credit_request_id"]))  {$credit_request_id=$_POST["credit_request_id"];} 

if (isset($_GET["request_name"]))       {$request_name=$_GET["request_name"];}
elseif (isset($_POST["request_name"]))  {$request_name=$_POST["request_name"];} 
if (isset($_GET["request_type"]))       {$request_type=$_GET["request_type"];}
elseif (isset($_POST["request_type"]))  {$request_type=$_POST["request_type"];}  
if (isset($_GET["group_name"]))       {$group_name=$_GET["group_name"];}
elseif (isset($_POST["group_name"]))  {$group_name=$_POST["group_name"];}  


$exportdata1=addslashes($exportdata);

$Sql_Query="UPDATE `inbound_dids` SET `flow_diagram`='$exportdata1' WHERE unique_id='$request_id'";
$res = mysqli_query($conn, $Sql_Query);

$Sql_Query="DELETE  FROM `flow_chart_ivr` WHERE ivr_id='$request_id'";
$res = mysqli_query($conn, $Sql_Query);

$result=json_decode($exportdata);
echo "<pre>";
$flow=$result->drawflow->Home->data;
//print_r($flow);
$node_input=array();
$node_output=array();

foreach ($flow as $key => $value) {

  $node=$key;
  $node_name=$value->name;  
  $node_input[$key]=$value->inputs;  
  $node_output[$key]=$value->outputs;  

  $sql="INSERT INTO `flow_chart_ivr`( `ivr_id`, `node_name`, `node`, `input_node`, `output_node_1`, `output_node_2`, `output_node_3`, `output_node_4`) VALUES ('$request_id','$node_name','$node','','','','','')";
  $res = mysqli_query($conn, $sql);



         foreach ($node_input as $key => $value) { 
             $input_node=$value->input_1;  
             foreach ($input_node as $key => $value) { 
                    $input_node=$input_node->connections ;  
             }
             foreach ($input_node as $key => $value) {  
                    $input_node=$value->node ;  
                    $sql="UPDATE flow_chart_ivr SET `input_node` =$input_node WHERE node='$node'";
                    $res = mysqli_query($conn, $sql); 
             }
       }

       foreach ($node_output as $key => $value) { 
             $output_node_1=$value->output_1;
             $output_node_2=$value->output_2;
             $output_node_3=$value->output_3;
             $output_node_4=$value->output_4; 
       }


###################################################output_node_1################################################################
      foreach ($output_node_1 as $key => $value) {  
             $output_node_1=$output_node_1->connections ;  
      }
      foreach ($output_node_1 as $key => $value) {  
           
             $output_node_1=$value->node ;  
             echo $sql="UPDATE flow_chart_ivr SET `output_node_1` =$output_node_1 WHERE node='$node'";
             $res = mysqli_query($conn, $sql); 
      }

###################################################output_node_2 ###############################################################
      foreach ($output_node_2 as $key => $value) {  
             $output_node_2=$output_node_2->connections ;  
      }
      foreach ($output_node_2 as $key => $value) {  
             
             $output_node_2=$value->node ;   
             echo $sql="UPDATE flow_chart_ivr SET `output_node_2` =$output_node_2 WHERE node='$node'";
             $res = mysqli_query($conn, $sql);  
      }

################################################## output_node_3 ###############################################################
      foreach ($output_node_3 as $key => $value) {  
             $output_node_3=$output_node_3->connections ;  
      }
      foreach ($output_node_3 as $key => $value) {  
             
             $output_node_3=$value->node ;  
             echo $sql="UPDATE flow_chart_ivr SET `output_node_3` =$output_node_3 WHERE node='$node'";
             $res = mysqli_query($conn, $sql); 
      }

################################################## output_node_4 ###############################################################
      foreach ($output_node_4 as $key => $value) {  
             $output_node_4=$output_node_4->connections ;   
      }
      foreach ($output_node_4 as $key => $value) {  

             $output_node_4=$value->node ;  
             echo $sql="UPDATE flow_chart_ivr SET `output_node_4` =$output_node_4 WHERE node='$node'";
             $res = mysqli_query($conn, $sql);
      } 

}
print_r($result);




