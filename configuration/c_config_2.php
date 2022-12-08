<?php
//@ob_start();
 
   $localhost='localhost';
   $username='root';
   $password='xspl#!#!@123';
   $db_name='vertage';
   $tconn=mysqli_connect($localhost,$username,$password,$db_name);
   mysqli_set_charset($tconn, 'utf8');
   
   if(!$tconn) {
      die('Could not connect: ' . mysqli_error());
   }   


?>