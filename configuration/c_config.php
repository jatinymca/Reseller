<?php
//@ob_start();
session_start();
date_default_timezone_set('asia/calcutta');
$now = date('Y-m-d h:i:s');
$now24hrs = date('Y-m-d H:i:s');
$today = date('Y-m-d');
$time=date('h:i:s');
$current_month=date('F');
$month_year=date('F').'_'.date('Y');
$HTTP_HOST=$_SERVER['HTTP_HOST']; 
$HTTP_ORIGIN=$_SERVER['HTTP_ORIGIN']; 


   $localhost='localhost';
   $username='root';
   $password='xspl#!#!@123';
   $db_name='vertage';
   $conn=mysqli_connect($localhost,$username,$password,$db_name);
   mysqli_set_charset($conn, 'utf8');
   
   if(!$conn) {
      die('Could not connect: ' . mysqli_error());
   }   
 
 

?>