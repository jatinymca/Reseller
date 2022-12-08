<?php
require('../configuration/c_config.php');
 
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["colume_name"]))       {$colume_name=$_GET["colume_name"];}
elseif (isset($_POST["colume_name"]))  {$colume_name=$_POST["colume_name"];}  
if (isset($_GET["method"]))       {$method=$_GET["method"];}
elseif (isset($_POST["method"]))  {$method=$_POST["method"];}

if (isset($_GET["method_name"]))       {$method_name=$_GET["method_name"];}
elseif (isset($_POST["method_name"]))  {$method_name=$_POST["method_name"];}
if (isset($_GET["method_value"]))       {$method_value=$_GET["method_value"];}
elseif (isset($_POST["method_value"]))  {$method_value=$_POST["method_value"];}
if (isset($_GET["Methods_massage"]))       {$Methods_massage=$_GET["Methods_massage"];}
elseif (isset($_POST["Methods_massage"]))  {$Methods_massage=$_POST["Methods_massage"];}

 
if(isset($method)){
 
	  $smtp="SELECT * FROM `process_validation` WHERE Process_name='$Process_name' and colume_name='$colume_name' and field_key='$method_name'";
     $res=mysqli_query($conn,$smtp);
     $count=mysqli_num_rows($res);
     if($count==0){
                 
                 $smtp="INSERT INTO `process_validation`( `Process_name`, `colume_name`, `field_key`, `field_key_value`, `field_error_massges`) VALUES ('$Process_name','$colume_name','$method_name','$method_value','$Methods_massage')";
                mysqli_query($conn,$smtp);
                 
			 }else{

 	           	$smtp="UPDATE `process_validation` SET `field_key_value`='$method_value',`field_error_massges`='$Methods_massage' WHERE Process_name='$Process_name' and colume_name='$colume_name' and field_key='$method_name'";
                mysqli_query($conn,$smtp);

			 }
} 

 