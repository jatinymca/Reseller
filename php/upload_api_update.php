<?php
require('../configuration/c_config.php');
 
  
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["Unique_id_name"]))       {$Unique_id_name=$_GET["Unique_id_name"];}
elseif (isset($_POST["Unique_id_name"]))  {$Unique_id_name=$_POST["Unique_id_name"];}
 

//########################### UNIQ ID GET ##################################
    $smtp="Select field_colm,Unique_key  from table_field_list where Process_name='$Process_name' and Queue_key='Y' order by Preposition  asc limit 1 ";

$res=mysqli_query($conn,$smtp);
$row=mysqli_fetch_array($res);
  $Unique_key=$row['field_colm'];
 
if($action=='upload_file'){
  $sql_colum='';
  foreach ($_POST['csv_field'] as $key => $value) {

  	   $sql_colum.=$value.',';
  	   $sql_colum_count++;
   }
 foreach ($_POST['db_field'] as $key => $value) {
    	$col_str.=$value.',';
      $update_value[$value]=$_POST['csv_field'][$key];
    }   

  	$sql_colum=substr($sql_colum,0,-1);
    $col_str=substr($col_str,0,-1);
    $sql_colum_count;
    $smtp="SELECT id,C1,C2,C3,C4,C5,".$sql_colum." FROM excel_table where 1 limit 100  ";
    $res= mysqli_query($conn,$smtp);
    $sql_count=0;
    while($row=mysqli_fetch_array($res)){
    
      $smtp1='';
      $smtp1.='UPDATE Process_'.$Process_name.' SET ' ;	
      foreach ($update_value as $key => $value) {
    		$value_sql.=$key."='".$row[$value]."',"; 
        
      }
      
    	 $smtp1.=substr($value_sql,0,-1);

    	 $smtp1.='WHERE '.$Unique_key.'="'.$row[$Unique_id_name].'"';	
    	  
    	 
    	if($sql_count!=0){
        
 
         $res1= mysqli_query($conn,$smtp1);
         $affected_row=mysqli_affected_rows($conn);
             $sq="SELECT case_id FROM Process_".$Process_name." WHERE $Unique_key='".$row[$Unique_id_name]."'"; 
         $rt=mysqli_query($conn,$sq);
         $ct=mysqli_fetch_array($rt);
         $case_id=$ct['case_id'];
           $Query="UPDATE `vertage_list` SET status='".$row['C1']."', case_owner='".$row['C2']."', level_name='".$row['C3']."', vendor_lead_code='".$row[$Unique_id_name]."', Branch1='".$row['C4']."', Region1='".$row['C5']."' WHERE case_id='$case_id'";
         mysqli_query($conn,$Query);
 

        $sql_count++;
        }else{   $sql_count++;}
       

       }
             $smtp2="DELETE FROM `excel_table` WHERE  1";
       mysqli_query($conn,$smtp2);

}

?>