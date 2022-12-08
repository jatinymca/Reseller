<?php 
include('configuration/c_config.php');
include('configuration/function.php'); 


 
	$total_count = 0;		
	
	if (isset($_POST["import"])) {

  	$fileName = $_FILES["file"]["tmp_name"];
		
		$flag = true;
	
		if ($_FILES["file"]["size"] > 0) {
		
		  	$file = fopen($fileName, "r");
      
     	while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {

  					if($flag) { $flag = false; continue; }		

  					$senderid	= $emapData[0];
  					$type	= $emapData[1];
  					$entityid	= $emapData[2];
  					$telemarketingdltid	= $emapData[3];

  					$sql = "INSERT INTO sms_senderid (`senderid`, `status`,`type`,`dltsenderid`,`telemarketingdltid`,`entityid`,`remarks`,`request_datetime`,`username`) VALUES ('$senderid','process','$type','$dltsenderid','$telemarketingdltid','$entityid','','$now','$login_id')";
   					 
		 		 		$result = mysqli_query($conn,$sql);
			 		
			 			$total_count++;
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
	alert("<?php echo $total_count ?> Request Inserted Successfully");
	window.location.href = 'index.php?page_name=sms_request_senderid';
</script> 