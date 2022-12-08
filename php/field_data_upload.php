<?php
require('../configuration/c_config.php');
 function clean($string) {
   $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
   $string = str_replace('-', '_', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}
function rt_xl($string){

   $string = str_replace(' ','_', $string); 
   return $string;
}
  
if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["field_data"]))       {$field_data=$_GET["field_data"];}
elseif (isset($_POST["field_data"]))  {$field_data=$_POST["field_data"];} 

if($action=='upload_field'){


 foreach ($field_data as $key => $value){
           $value=strtolower($value);
           $value=clean($value);
           $value=preg_replace("/\s+/", " ",$value);
           $value=rt_xl($value);
           $value=trim($value);
           $field[$key]=clean($value);
           
   }
 
  print_r($field);
}
$dublicate=array_count_values($field);
 foreach ($dublicate as $key => $value) {
   if($value>1){

 //   echo $key;
   }
  
 }
?>