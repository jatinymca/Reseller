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

  					$templatename	= $emapData[0];
  					$templatesms	= $emapData[1];
  					$credittype	= $emapData[2];
  					$senderid	= $emapData[3];
  					$language	= $emapData[4];
  					$dlttemplate	= $emapData[5];
  					$telemarketingid	= $emapData[6];
  					$entityid	= $emapData[7];
 
  					$sql = "INSERT INTO sms_template (`templatename`,`credittype`,`senderid`, `dlttemplate`,`language`,`templatesms`,`telemarketingid`,`entityid`,`status`,`request_datetime`,`username`) VALUES ('$templatename','$credittype','$senderid','$dlttemplate','$language','$templatesms','$telemarketingid','$entityid','Process','$now','$login_id')";

   					 
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
	window.location.href = 'index.php?page_name=sms_request_template';
</script> 