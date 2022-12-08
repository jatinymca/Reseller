<?php
require('../configuration/c_config.php');
require('../configuration/function.php');
 

if (isset($_GET["action"]))       {$action=$_GET["action"];}
elseif (isset($_POST["action"]))  {$action=$_POST["action"];}
if (isset($_GET["report_id"]))       {$report_id=$_GET["report_id"];}
elseif (isset($_POST["report_id"]))  {$report_id=$_POST["report_id"];}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Report.csv');


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
$head=array(
    'Report Id',
    'Request Time',
    'From Date',
    'To Date',
    'Campaign Name',
    'Report Name'
    );


fputcsv($output, $head);


$q="select * from sms_reports where id='$report_id'";
    
    if ($result = mysqli_query($conn, $q)) 
    { 
      while ($row = mysqli_fetch_array($result)) 
      { 
        $row1=array( 
            $row['report_request_id'],
            date('Y-m-d h:i:s',strtotime($row['request_datetime'])),
            $row['request_fromdatetime'],
            $row['request_todatetime'],
            $row['campaign_name'],
            $row['report_name'],

            );  

        fputcsv($output, $row1);
      }
    }
    else
    {
        echo "Result Not Found";
    }




 ?>