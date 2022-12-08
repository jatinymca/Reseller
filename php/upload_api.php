<?php

 
require('../configuration/c_config.php');
require('../configuration/c_config_2.php');
 
 
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["Unique_id_name"]))       {$Unique_id_name=$_GET["Unique_id_name"];}
elseif (isset($_POST["Unique_id_name"]))  {$Unique_id_name=$_POST["Unique_id_name"];} 
 
if($action=='upload_file'){
  $sql_colum='';
  foreach ($_POST['csv_field'] as $key => $value) {

  	   $sql_colum.=$value.',';
  	   $sql_colum_count++;
   }
 foreach ($_POST['db_field'] as $key => $value) {
    	$col_str.=$value.',';
    }   

  	$sql_colum=substr($sql_colum,0,-1);
    $col_str=substr($col_str,0,-1);
    $sql_colum_count;
        $smtp="SELECT id,".$sql_colum." FROM excel_table where 1  ";
    $res= mysqli_query($conn,$smtp);
    $sql_count=0;
    while($row=mysqli_fetch_array($res)){
      $id=$row[0]; 
      $status='NEW'; 
      $Unique_id_name;
       if($Process_name=='Insurance'){
      $list_id='272727';

    }else{
      $list_id='282828';

    }
     /* $case_owner=$row[2]; 
      $level_name=$row[3]; 
      $Branch1  =$row[4]; 
      $Region1=$row[5]; 
    	$feadback=$row[6];*/
       $vendor_lead_code=$row[$Unique_id_name]; 
       if($vendor_lead_code!=''){
        $smtp2="INSERT INTO `vertage_list`(`entry_date`,`status`,`vendor_lead_code`,`Process_name`,`case_owner`,`level_name`) VALUE('$now','$status','$vendor_lead_code','$Process_name','$case_owner','Level_First')";
        $res2=mysqli_query($conn,$smtp2);
      $case_id=mysqli_insert_id($conn);

        $sql="INSERT INTO vicidial_list SET phone_number='$vendor_lead_code', gmt_offset_now='0',user='$user',status='$status',entry_date='$now',modify_date='',list_id='$list_id',vendor_lead_code='$case_id'";
         mysqli_query($tconn,$sql);
 
      	$smtp1='INSERT INTO `Process_'.$Process_name.'`(`case_id`,' ;	
    	$smtp1.=$col_str;	
    	$smtp1.=") VALUE('".$case_id."',";
    	$value_sql='';	
    	for ($i=1; $i <=$sql_colum_count; $i++) { 
    		$value_sql.="'".$row[$i]."',"; 
    	}
    	 $smtp1.=substr($value_sql,0,-1);

    	$smtp1.=')';	
    	      $smtp1;
    	    $sql_count;
    	if($sql_count!=0){  $res1= mysqli_query($conn,$smtp1); $sql_count++; }else{ echo $sql_count++;}
        if($res1){
            
        	 $smtp2="DELETE FROM `excel_table` WHERE id='$id'";
          mysqli_query($conn,$smtp2);
          }else{
            //echo $smtp1;
          }

       }
            $smtp2="DELETE FROM `excel_table` WHERE  1";
        mysqli_query($conn,$smtp2);

}
}
?>