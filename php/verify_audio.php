<?php 
require('../configuration/c_config.php');
require('../configuration/function.php');



if (isset($_GET["set"]))       {$set=$_GET["set"];}
elseif (isset($_POST["set"]))  {$set=$_POST["set"];}

  $sel="SELECT   `verift_audio` FROM `audio_store_details` WHERE id='$set'";
 $query=mysqli_query($conn,$sel);
  $arry=mysqli_fetch_array($query);
  $count=$arry['verift_audio'];
 if($count=="1"){
 	   $upd="UPDATE `audio_store_details` SET `verift_audio`='0' WHERE  id='$set'";
   mysqli_query($conn,$upd);
   echo "0";
 }else{

   $upd="UPDATE `audio_store_details` SET `verift_audio`='1' WHERE  id='$set'";
   mysqli_query($conn,$upd);
   echo "1";
}
?>