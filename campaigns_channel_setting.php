<?php
require_once("../inc/config.php");
$pageName="Add Category";
$menu="Campaigns";
$submenu="addcampaign";
$PHP_SELF=$_SERVER['PHP_SELF'];
$PHP_Query=$_SERVER['QUERY_STRING'];

if(isset($_GET['campaign_id'])){
	$campaign_id= mysqli_real_escape_string($conn, $_GET['campaign_id']);
}

if(!isset($_SESSION['act_user'])){
    $_SESSION['toast']['msg']="Please log In to continue.";
    header('location:sign-in.php');
    exit();
}
 if(isset($_GET['Remove_id'])){
	$Remove_id= mysqli_real_escape_string($conn, $_GET['Remove_id']);

  $smtp="DELETE FROM `trunk_selection` WHERE id='$Remove_id'";
  $row=mysqli_query($conn,$smtp);
  header('location:campaigns_channel_setting.php?campaign_id='.$campaign_id); 
 } 
		 
	 
//add/edit profile...
if(isset($_POST['submit_campaign'])){
	   $campaign_id=$_POST['campaign_id'];
	   $channel_start=$_POST['channel_start'];
	   $channel_end=$_POST['channel_end'];
	  
 
 $actionQ='';
	  foreach ($_POST['channel_name'] as $key => $value) {
		 	$channel_name=$_POST['channel_name'][$key];
		 	$channel_start=$_POST['channel_start'][$key];
		 	$channel_end=$_POST['channel_end'][$key];
		 	$gateway_ip=$_POST['gateway_ip'][$key];
		 	$pilot_no=$_POST['pilot_no'][$key];
		 	$pilot_no_end=$_POST['pilot_no_end'][$key];
	  	 
		 $smtp="SELECT * FROM `trunk_selection` WHERE campaign_id='$campaign_id' and channel_name='$channel_name'";
		 $row=mysqli_query($conn,$smtp);
		 if(mysqli_num_rows($row)>0){
		 	   $actionQ.="UPDATE `trunk_selection` SET `campaign_id`='$campaign_id', `channel_name`='$channel_name',`channel_start`='$channel_start',`channel_end`='$channel_end' WHERE `campaign_id`='$campaign_id' and gateway_ip='$gateway_ip' and channel_name='$channel_name';";
		 }else{

		 	    $actionQ.="INSERT INTO `trunk_selection`(`campaign_id`, `channel_name`,`channel_start`,`channel_end`,`gateway_ip`,`pilot_no`,`pilot_no_end`) VALUES ('$campaign_id','$channel_name','$channel_start','$channel_end','$gateway_ip','$pilot_no','$pilot_no_end');";
		 }
	  }
	 
		 
		$insert=0;
 
 
	if(mysqli_multi_query($conn, $actionQ)==true){
		if($insert===1){
			$id=mysqli_insert_id($conn);
		}
           $_SESSION['toast']['msg']="Data successfully saved.";
	}else{
		$_SESSION['toast']['msg']="Something went wrong, Please try again.";
	}
	 header('location:campaigns_channel_setting.php?campaign_id='.$campaign_id); 
}


 
?>
 <?php include_once("../inc/functions.php"); ?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title><?php echo $pageName ; ?></title>
	<?php include_once("includes/head.php"); ?>
</head>
<body>
	<div class="loader-bg"></div>
	<div class="loader">
		<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-teal lighten-1">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-yellow">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
			<div class="spinner-layer spinner-green">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
	</div>
<div class="mn-content fixed-sidebar">
	<?php include_once("includes/navigation.php"); ?>
	
	<main class="mn-inner">
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="card">
					<div class="card-content">
						<span class="card-title ">Add Channel Setting</span>
						<div class="divider"></div>
						<form method="post" enctype="multipart/form-data">
							 <?php $i=0;
									   
                              			$smtp=" SELECT channel_name ,trunk_type ,gateway_ip,pilot_no,pilot_no_end FROM channel_config_gateway group by trunk_type,channel_name";
                              			$dataQ1 = mysqli_query($conn,$smtp);
                              			while($row=mysqli_fetch_assoc($dataQ1)){ 

	                              			$channel_name=$row['channel_name'];
                              				$trunk_type=$row['trunk_type'];
                              				$gateway_ip=$row['gateway_ip'];
                              				$pilot_no=$row['pilot_no'];
                              				$pilot_no_end=$row['pilot_no_end'];
                              				  $smtp="SELECT * FROM `trunk_selection` WHERE `campaign_id`='$campaign_id' and  gateway_ip='$gateway_ip' and channel_name='$channel_name'";
                              			 	$dataQ2 = mysqli_query($conn,$smtp);
                              			 	$data=mysqli_fetch_assoc($dataQ2);
                              			 	$Remove_id=$data["id"];
                              				?>
							<div class="row">
								 <div class="input-field col s3 m3 l3">
							    <input type="checkbox" class="filled-in"<?php if(!empty($data["channel_name"])){ echo 'checked=""'; } ?>  id="channel_name<?php echo $i; ?>" name="channel_name[<?php echo $i; ?>]" value="<?php echo $channel_name; ?>">
							    <label for="channel_name<?php echo $i; ?>">  </label>
							    <span><?php echo $trunk_type.' ('.$row["channel_name"].')';?></span>
							  </div>
								 <div class="input-field col s3 m3">
									<input type="text" id="channel_start<?php echo $i; ?>" name="channel_start[<?php echo $i; ?>]" value="<?php if(isset($_GET['campaign_id'])){ echo $data['channel_start'];}?>">
									<label for="channel_start">Start channel </label>
								</div>
								 <div class="input-field col s3 m3">
									<input type="text" id="channel_end<?php echo $i; ?>" name="channel_end[<?php echo $i; ?>]" value="<?php if(isset($_GET['campaign_id'])){ echo $data['channel_end'];}?>">
									<label for="channel_end">End channel </label>
								</div>
								<div class="input-field col s2 m2">
									<a href="?campaign_id=<?php echo $campaign_id; ?>&Remove_id=<?php echo $Remove_id; ?>">Gateway Remove For This Campaign</a>
								</div>
								<input type="hidden" name="gateway_ip[]" value="<?php echo $gateway_ip; ?>">
								<input type="hidden" name="pilot_no[]" value="<?php echo $pilot_no; ?>">
								<input type="hidden" name="pilot_no_end[]" value="<?php echo $pilot_no_end; ?>">
							</div>

<?php $i++; } ?>
							<input type="hidden" name="campaign_id" value="<?php echo $campaign_id; ?>">
						  
							<div class="row">
								<button type="submit" name="submit_campaign" class="btn theme-bg waves-effect waves-light">Save changes</button>
							</div>
						</form>
						 
 								  

                              			   
					</div>
				</div>
			</div>
			 
		</div>
	</main>
</div> 
						     
						  </div>
<?php include_once("includes/scripts.php"); ?>
<script type="text/javascript">
 $(document).ready(function(){
	$('.audioclick').on('click', function() {
       var file=$(this).data('name');
       $("#audio_file").val(file); 
       
        }); 
	});
</script>
</body>
</html>