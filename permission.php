<?php
 

   $sel="SELECT login_id FROM `users` where user_id='$login_id'";
$qry=mysqli_query($conn,$sel); 
$user_list[]=$login_id;
while($row=mysqli_fetch_array($qry)){

$user_list[]=$row['login_id'];
}

 
$user_list=implode("','",$user_list);
 

if($user_type=="admin"){

		$permission_username="";
	 
}elseif($user_type="Reseller"){
  	 
	$permission_username="AND username IN ('$user_list')";

	 
}
elseif($user_type=="User"){

	 $permission_username="AND username IN ('$user_list')";

}

 
?>