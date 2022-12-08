<?php
     
if(!isset($_POST['login'])){
    if(!isset($_SESSION['act_user'])){
        header("location:login.php");
    }
} 

if(isset($_SESSION['act_user'])){ 
    $login_id= $_SESSION['act_user']['login_id'];
    $smtp="SELECT * FROM `users` WHERE login_id='$login_id' ";
    $row=mysqli_query($conn,$smtp);
    while($data=mysqli_fetch_assoc($row)){
        $role_array=$data;
    } 
    foreach ($role_array as $key => $value){
        ${$key}=$value;
    }
}


 

function audio_file_name($table_name,$colume,$condition,$conn){

    $smtp="SELECT $colume FROM $table_name WHERE $condition";
    $res=mysqli_query($conn,$smtp);
    $row=mysqli_fetch_array($res);

    return $row[$colume]; 

} 


function special_characters($srting){

  $srting=str_replace("'", '' ,$srting);
  return $srting;
}


?>



