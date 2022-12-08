<?php 
include('configuration/c_config.php');
include('configuration/function.php'); 

if (isset($_GET["campaign_id"]))					{$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))		{   $campaign_id=$_POST["campaign_id"];}	
if (isset($_GET["list_id"]))					{$list_id=$_GET["list_id"];}
elseif (isset($_POST["list_id"]))				{$list_id=$_POST["list_id"];}	




$duration=100;;

// $smtp="SELECT * FROM `vertage_voice_plan_list` WHERE plan_id='$bill_plan_type'"; 
// $res=mysqli_query($conn,$smtp);
// $row=mysqli_fetch_array($res);
//   $plan_pulse=$row['plan_pulse'];
//   $plan_rate=$row['plan_rate'];
// $rupes_count_per=(($plan_rate/$plan_pulse)*$duration)/100;


//   $rupes_count_per_round= round($rupes_count_per,3);
//   $tptal_numbur_of_record=$voice_credit_amount/$rupes_count_per_round;
//    $no_of_pulse=ceil($duration/$plan_pulse); 

// SHOW FIELDS FROM DEFAULT TABLE VICIDIAL LIST

$default_export_fields = rtrim($Fields,',');
$list_id 	=	       rand(000000,999999);
$total_count = 0;		
$filename = $_FILES["file"]["tmp_name"];

if($_FILES["file"]["size"] > 0){			
$file = fopen($filename, "r");		
$line = 0; 
	 	// $smtp="INSERT INTO `vertage_lists`(`list_id`, `user_id`, `user_name`) VALUES ('$list_id','$login_id','')";
	 	// mysqli_query($conn,$smtp);
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){	
	$sql = '';	

	$excel_vici_value='';
	$excel_custom_value='';


			//if($line > 0){				
	if($line >0){				
		$pulldate=		          date("Y-m-d H:i:s");
		$entry_date 	=	      "$pulldate";
		$modify_date 	=	      "";
		$status 		=		  "NEW";
		$source_id		=		  "";
		$gmt_offset_now	=		  "0";
		$country_code	=		  "";
		$province		=		  "";
		$phone_number			= $emapData[0];
		$first_name			= $emapData[1];
		 
		$A1					= $emapData[2];
		$A2					= $emapData[3];
		$A3					= $emapData[4];
		$D1					= date('Y-m-d',strtotime($emapData[5]));
		$D2					= date('Y-m-d',strtotime($emapData[6]));
		$D3					= date('Y-m-d',strtotime($emapData[7]));
		$owner			= $emapData[$m];
		$user               = $login_id;
		$line1 = 0;
 
		$tptal_numbur_of_record=0;
	 
		$sql = "INSERT INTO `vertage_list`(`campaign_id`, `entry_date`, `modify_date`, `status`, `username`, `vendor_lead_code`, `source_id`, `list_id`, `gmt_offset_now`, `called_since_last_reset`, `phone_code`, `phone_number`, `first_name`,`A1`,`A2`,`A3`,`D1`,`D2`,`D3`) VALUES ('$campaign_id', '$entry_date', '$modify_date', '$status', '$user', '$vendor_lead_code', '$source_id', '$list_id', '$gmt_offset_now', '$called_since_last_reset', '$phone_code', '$phone_number', '$first_name','$A1','$A2','$A3','$D1','$D2','$D3')";


		$result = mysqli_query($conn,$sql);
		 		//  $sql = "UPDATE `users` SET `voice_credit_amount`=voice_credit_amount-$rupes_count_per_round WHERE login_id='$login_id'";
     //  $result = mysqli_query($conn,$sql);
		$total_count++;	 

					//}

	}

	$line++;}
	if($result>0 || $resultA>0){
		echo "$total_count - Record Inserted Successfully";
	}
	fclose($file);	        
	mysqli_close($link); 
} 		 

?>
<script type="text/javascript">
	alert("<?php echo $total_count ?>Record Inserted Successfully");
	window.location.href = 'index.php?page_name=my_contacts';
</script> 