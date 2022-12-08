<?php 
 session_start();
 
require('configuration/c_config.php');
//echo $path='/var/www/html/Reseller/audio/1665490300_Dheemthanana(PaglaSongs).mp3';
// $re= shell_exec('lame --decode $path.mp3 - | sox -v 0.5 -t wav - -t wav -b 16 -r 8000 -c 1 $path.wav');

  error_reporting( E_ALL );
  $user_id=$_SESSION['act_user']['login_id'];
  if (isset($_GET["duration"]))       {$duration=$_GET["duration"];}
  elseif (isset($_POST["duration"]))  {$duration=$_POST["duration"];}

  if(isset($_POST['audio_file_upload'])){
  $tmp = $_FILES['audiofile']['tmp_name'];
            $username=$login_id;
            $valid_formats1 = array("mp3", "ogg", "flac"); //list of file extention to be accepted
            $file1 = str_replace(' ','_',trim($_FILES['audiofile']['name'])); //input file name in this code is file1
            $audio_filesize = $_FILES['audiofile']['size'];
            $audio_filename=pathinfo($file1, PATHINFO_FILENAME);
            $audio_format= pathinfo($file1, PATHINFO_EXTENSION);
            $audio_length='';
            $audio_epoch='';
            $time=time();
            $duration=$duration;
            $path="audio/".$time."_".$file1;
            $path1=$time."_".$audio_filename;
            if(move_uploaded_file($tmp, $path))
                            {
 
                     $query="INSERT INTO `audio_store_details`(`audio_filename`, `audio_format`, `audio_filesize`, `audio_epoch`, `duration`,`username`) VALUES ('$path1','$audio_format','$audio_filesize','$audio_epoch','$duration','$user_id')";
                    mysqli_query($conn,$query);
                       
                 header('location:index.php?page_name=announcement');
                 exit();
 
 
                   }

 }
header('location:index.php?page_name=announcement');
exit();

?>