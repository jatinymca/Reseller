<?php 
include('configuration/c_config.php');
include('configuration/logs.php');
if (isset($_GET["campaign_id"]))					{$campaign_id=$_GET["campaign_id"];}
elseif (isset($_POST["campaign_id"]))		{   $campaign_id=$_POST["campaign_id"];}
 // output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=File_Format_'.$campaign_id.'.csv');

//create a file pointer connected to the output stream
$output = fopen('php://output', 'w'); 
 

// SHOW FIELDS FROM DEFAULT TABLE VICIDIAL LIST
$stmt="SHOW columns FROM vertage_list;";
$rslt=mysqli_query($conn,$stmt);
$get_fields = mysqli_num_rows($rslt);
$get_fields_count = $get_fields;
$get_vici_count = $get_fields_count -16;

$a =0;
$vici_cnt=0;
while ($a < $get_fields)
{
	$row=mysqli_fetch_array($rslt);
	if("$row[0]" == "lead_id"){
			$row[0]="";
		}elseif("$row[0]" == "source_id"){
			$row[0]="";
		}elseif("$row[0]" == "entry_date"){
			$row[0]="";
		}elseif("$row[0]" == "modify_date"){
			$row[0]="";
		}elseif("$row[0]" == "status"){
			$row[0]="";
		}elseif("$row[0]" == "list_id"){
			$row[0]="";
		}elseif("$row[0]" == "gmt_offset_now"){
			$row[0]="";
		}elseif("$row[0]" == "called_since_last_reset"){
			$row[0]="";
		}elseif("$row[0]" == "user"){
			$row[0]="";
		}elseif("$row[0]" == "country_code"){
			$row[0]="";
		}elseif("$row[0]" == "province"){
			$row[0]="";
		}elseif("$row[0]" == "security_phrase"){
			$row[0]="";
		}elseif("$row[0]" == "called_count"){
			$row[0]="";
		}elseif("$row[0]" == "last_local_call_time"){
			$row[0]="";
		}elseif("$row[0]" == "rank"){
			$row[0]="";
		}elseif("$row[0]" == "phone_code"){
			$row[0]="";
		}elseif("$row[0]" == "campaign_id"){
			$row[0]="";
		}
		elseif("$row[0]" == "vendor_lead_code"){
			$row[0]="";
		}
		else{
		$Fields .= "$row[0],";
		$field3[]="$row[0]";
		$vici_cnt++;
		}
	$a++; 	
}
 
 

 
 fputcsv($output, $field3);
 

?>