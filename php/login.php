<?php
require_once('../configuration/c_config.php');
  
   if (isset($_GET["login_id"]))       {$login_id=$_GET["login_id"];}
   elseif (isset($_POST["login_id"]))  {$login_id=$_POST["login_id"];}
   if (isset($_GET["password"]))       {$password=$_GET["password"];}
   elseif (isset($_POST["password"]))  {$password=$_POST["password"];}
   if (isset($_GET["username"]))       {$username=$_GET["username"];}
   elseif (isset($_POST["username"]))  {$username=$_POST["username"];}

   if (isset($_GET["user_type"]))       {$user_type=$_GET["user_type"];}
   elseif (isset($_POST["user_type"]))  {$user_type=$_POST["user_type"];}

      $smtp="SELECT * FROM `users` WHERE `login_id`='$login_id' AND `password`='$password'";
   $checkAdmin=mysqli_query($conn,$smtp);
	 $adminData=mysqli_fetch_assoc($checkAdmin);
   $user_type=$adminData['user_type'];
 
 if(isset($_POST['login_admin'])){
    if(mysqli_num_rows($checkAdmin)>0){
       $_SESSION['act_user']=$adminData;
      
        echo "<script>
                      alert('You are successfully logged in');
                      window.location.href='../index.php';
       </script>";
      exit();
     }else{
       header("location:../login.php");
     } 
}
 
 
 //header("location:../login.php");
?>