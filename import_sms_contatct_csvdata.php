<?php 
include('configuration/c_config.php');
include('configuration/function.php'); 

if (isset($_GET["group_id"]))					{$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))		{   $group_id=$_POST["group_id"];}	
if (isset($_GET["overwritecontact"]))					{$overwritecontact=$_GET["overwritecontact"];}
elseif (isset($_POST["overwritecontact"]))				{$overwritecontact=$_POST["overwritecontact"];}	

 
	$total_count = 0;	
	$fail_total_count = 0;	

 
$duration=50;;
 
$smtp="SELECT * FROM `vertage_voice_plan_list` WHERE plan_id='$sms_bill_plan_type'";
$res=mysqli_query($conn,$smtp);
$row=mysqli_fetch_array($res);
$plan_pulse=$row['plan_pulse']; // 1
$plan_rate=$row['plan_rate']; //   .20
$rupes_count_per=($plan_rate*$plan_pulse); // 0.20

  $rupes_count_per_round= round($rupes_count_per,4); // // 0.20
  $tptal_numbur_of_record=$sms_promo_allocate_unit/$rupes_count_per_round;  // 100/0.20== 500
  $no_of_pulse=ceil($duration/$plan_pulse);


	if (isset($_POST["import"])) {

  	$fileName = $_FILES["file"]["tmp_name"];
		
		$flag = true;
	
		if ($_FILES["file"]["size"] > 0) {
		
		  	$file = fopen($fileName, "r");
      
     	while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {

  					if($flag) { $flag = false; continue; }		

  					$firstname	= $emapData[0];
  					$lastname	= $emapData[1];
  					$mobile	= $emapData[2];
  					$email	= $emapData[3];
  					$desc	= $emapData[4];
  				 if(floor($tptal_numbur_of_record)>$total_count){
  				 	
		      	$sql = "INSERT INTO sms_contact (`group_id`,`firstname`,`lastname`,`mobile`,`email`,`overwritecontact`,`desc`,`amount`,`sms_Rate`,`no_of_sms`,`created_date`,`username`) VALUES ('$group_id','$firstname','$lastname','$mobile','$email','$overwritecontact','$desc','$rupes_count_per_round','$plan_rate','$plan_pulse','$now','$login_id')";
   					 
		 		 		$result = mysqli_query($conn,$sql);

		 		 		$sql = "UPDATE `users` SET `sms_promo_allocate_unit`=sms_promo_allocate_unit-$rupes_count_per_round WHERE login_id='$login_id'";
                     $result = mysqli_query($conn,$sql);
			 		
			 			$total_count++;

			 		}
			 		else{

			 			$fail_total_count++;
			 		}	
	    }

    	/*if($result>0){
    		echo "$total_count - Record Inserted Successfully";
    	}*/
    	
			fclose($file);	        
			mysqli_close($link); 



 	} 		 

}
 
?>
  <script type="text/javascript">
	alert("<?php echo $total_count; ?>Record Inserted Successfully | <?php echo $fail_total_count; ?>Record not Inserted ");

	window.location.href = 'index.php?page_name=sms_contact';
</script> 