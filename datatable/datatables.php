<?php
require('../configuration/c_config.php');
require('../configuration/function.php');
 
if(isset($_POST['action'])){$action=$_POST['action'];}
elseif(isset($_GET['action'])){$action=$_GET['action'];}

if($action=='credit_allocation'){ 
	$column = array("","userid","credit_amount","Validity","status","payment_remark","cureent_date");


	//$query = "SELECT * FROM vertage_voice_credit WHERE 1";

	$query = "SELECT * FROM `sms_template` where username='$login_id'";

	if(isset($_POST["order"])){
 		$query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	}else{
 		$query .= ' ORDER BY id DESC ';
	}

	$query1 = '';

	if($_POST["length"] != 1){
 		$query1 .= 'LIMIT '.$_POST['start'].','.$_POST['length'];
	}
	//echo $query;die;
	$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
	$result = mysqli_query($conn, $query.$query1);
	
	$finalArray = array();
	while($row=mysqli_fetch_array($result)){
		$dataArray = array();
		if($row['status']=='unpaid'){
			$status = "<span class=\"text-danger\">".$row['status']."</span>";
		}else{
			$status = "<span class=\"text-success\">".$row['status']."</span>";
		}
		$dataArray[] = "";
		$dataArray[] = $row['user_id'];
		$dataArray[] = "₹".$row['credit_amount'];
		$dataArray[] = $row['voice_credit_validity'];
		$dataArray[] = $row['promotion_type'];
		$dataArray[] = $status;
		$dataArray[] = date('d M Y', strtotime($row['cureent_date']));
		$dataArray[] = $row['payment_remark'];
		$dataArray[] = "<td><a href=\"javascript:void(0)\"  class=\"btn btn-danger btn-xs\" ><i class=\"fa fa-trash-o\"></i></button></td>";
		$finalArray[] = $dataArray;
	}
	
	function get_all_data($conn)
	{
		 $query = "SELECT * FROM `vertage_voice_credit` WHERE 1";
		 $result = mysqli_query($conn, $query);
		 return mysqli_num_rows($result);
	}

	$output = array(
				"draw"    => intval($_POST["draw"]),
				"recordsTotal"  =>  get_all_data($conn),
				"recordsFiltered" => $number_filter_row,
				"data"    => $finalArray
			);
	echo json_encode($output);
}

if($action=='invoice_list'){ 
	$column = array("","userid","credit_amount","Validity","status","payment_remark","cureent_date");
	$query = "SELECT count(lead_id) as Total,list_id,Duration,sum(amount)as amount,redu,palus_rate,No_of_Pulse,entry_date,user_id,entry_date FROM vertage_list  where 1 group by list_id,redu ";
 
	if(isset($_POST["order"])){
 		$query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	}else{
 		$query .= ' ORDER BY lead_id DESC ';
	}

	$query1 = '';

	if($_POST["length"] != 1){
 		$query1 .= 'LIMIT '.$_POST['start'].','.$_POST['length'];
	}
 //echo $query;die;
	$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
	$result = mysqli_query($conn, $query.$query1);
	
	$finalArray = array();
	while($row=mysqli_fetch_array($result)){
		$dataArray = array();
		if($row['status']=='Deduct'){
			$status = "<span class=\"text-danger\">".$row['redu']."</span>";
		}else{
			$status = "<span class=\"text-success\">".$row['redu']."</span>";
		}
		$dataArray[] = "";
		$dataArray[] = $row['list_id'];
		$dataArray[] = $row['list_id'];
		$dataArray[] = '';
		$dataArray[] = $row['Duration'];
 		$dataArray[] = '';
		$dataArray[] = $row['Total'];
		$dataArray[] = $row['user_id'];
		$dataArray[] = $row['No_of_Pulse'];
		$dataArray[] = '₹ '.round($row['palus_rate'],2);
		$dataArray[] = '₹ '.round($row['amount'],2);
		$dataArray[] = $status;
		$dataArray[] = date('d M Y', strtotime($row['entry_date']));
		$dataArray[] = $row['No_of_Pulse'];
 		$finalArray[] = $dataArray;
		$sub_array = array();
 
	}
	function get_all_data($conn)
	{
		 $query = "SELECT * FROM `vertage_voice_credit` WHERE 1";
		 $result = mysqli_query($conn, $query);
		 return mysqli_num_rows($result);
	}

	$output = array(
				"draw"    => intval($_POST["draw"]),
				"recordsTotal"  =>  get_all_data($conn),
				"recordsFiltered" => $number_filter_row,
				"data"    => $finalArray
			);
	echo json_encode($output);
}
?>


