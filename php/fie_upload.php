<?php
require('../configuration/c_config.php');
 require('dynamic_sql_command.php');
if (isset($_GET["colume_name"]))       {$colume_name=$_GET["colume_name"];}
elseif (isset($_POST["colume_name"]))  {$colume_name=$_POST["colume_name"];}
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["case_id"])) {  $case_id=$_GET["case_id"];}
elseif (isset($_POST["case_id"])) {$case_id=$_POST["case_id"];}


if(isset($_POST)){
    //generate unique file name
    $fileName = time().'_'.basename($_FILES["file"]["name"]);
    
    //file upload path
    $targetDir = "../upload/document/";
    $targetFilePath = $targetDir . $fileName;
    
    //allow certain file formats
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf','csv','xls');
    
    if(in_array($fileType, $allowTypes)){
        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $data['Process_name']=$Process_name;
            $data['case_id']=$case_id;
            $data['colume_name']=$colume_name;
            $data['file_name']=$fileName;
            insert_data('document',$data,$conn);
            $response['status'] = 'ok';
        }else{
            $response['status'] = 'err';
        }
    }else{
        $response['status'] = 'type_err';
    }
    
    //render response data in JSON format
    echo json_encode($response);
}