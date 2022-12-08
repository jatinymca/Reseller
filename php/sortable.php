<?php
require('../configuration/c_config.php');
 if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
 if (isset($_GET["Process_id"]))       {$Process_id=$_GET["Process_id"];}
elseif (isset($_POST["Process_id"]))  {$Process_id=$_POST["Process_id"];}
 if (isset($_GET["data"]))       {$data=$_GET["data"];}
elseif (isset($_POST["data"]))  {$data=$_POST["data"];}
 
 $someArray = json_decode($data, true);
 
foreach ($someArray as $key => $value) {
	   
	     $smtp="UPDATE `table_field_list` SET Preposition='$key' WHERE field_colm='$value' and Process_id='$Process_id' and Process_name='$Process_name'";
	   mysqli_query($conn,$smtp);

}

?>