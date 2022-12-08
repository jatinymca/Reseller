<?php 
include('configuration/c_config.php');
include('configuration/function.php'); 

if (isset($_GET["list_id"]))					{$list_id=$_GET["list_id"];}
elseif (isset($_POST["list_id"]))		{   $list_id=$_POST["list_id"];}	
if (isset($_GET["overwritecontact"]))					{$overwritecontact=$_GET["overwritecontact"];}
elseif (isset($_POST["overwritecontact"]))				{$overwritecontact=$_POST["overwritecontact"];}	

 
	$total_count = 0;	
	$fail_total_count = 0;	

 
$duration=50;;
 
$smtp="SELECT * FROM `vertage_voice_plan_list` WHERE plan_id='$email_bill_plan_type'";
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
  					  $email	= $emapData[2];
  					$desc	= $emapData[3];
  				 
  				 	if(!empty($email)){

		      	 	$sql = "INSERT INTO email_contact (`list_id`,`firstname`,`lastname`,`email`,`overwritecontact`,`desc`,`amount`,`email_Rate`,`no_of_email`,`created_date`,`username`) VALUES ('$list_id','$firstname','$lastname','$email','$overwritecontact','$desc','$rupes_count_per_round','$plan_rate','$plan_pulse','$now','$login_id')";
   					 
		 		 		$result = mysqli_query($conn,$sql);
					

		 		 		$sql = "UPDATE `users` SET `email_promo_allocate_unit`=email_promo_allocate_unit-$rupes_count_per_round WHERE login_id='$login_id'";
                        $result = mysqli_query($conn,$sql);
			 		
			 			$total_count++;
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

	window.location.href = 'index.php?page_name=emailbook_list';
</script> 