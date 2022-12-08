<?php 
 include('configuration/c_config.php');
  error_reporting( E_ALL );
// if(!isset($_SESSION['act_user'])){
//     $_SESSION['toast']['msg']="Please log In to continue.";
//     header('location:sign-in.php');
//     exit();
// }
 
if(isset($_POST['audio_file_upload']))
    {
  
$valid_formats1 = array("mp3", "ogg", "flac"); //list of file extention to be accepted
 
            $file1 = $_FILES['audiofile']['name']; //input file name in this code is file1
            $size = $_FILES['audiofile']['size'];
             echo $name=pathinfo($file1, PATHINFO_FILENAME);

        if(strlen($file1))
            {
                
                         
                          $tmp = $_FILES['audiofile']['tmp_name'];
                          
                        if(move_uploaded_file($tmp, "uploads/".$file1))
                            {
                               $query="INSERT INTO `audio_store_details`(`audio_name`, `audio_ext`, `audio_size`, `entry_date`) VALUES ('$name','$file1','$size','$now')";
                              
                              mysqli_query($conn,$query);
                              $_SESSION['toast']['msg']= "Successfully upload.";
                              header('location:audio_store.php');
                               exit();
                            }
                        else{
                                    $_SESSION['toast']['msg']= "Something went wrong, Please try again";
                                    header('location:audio_store.php');
                                  exit();
                           }
                   
        }
   
}
//Price audio file 
 
$output = shell_exec('sox audio/0b5d5740fc9803c17e692ce4360f3077.mp3 -n stat');
echo "<pre>$output</pre>";
?>

