<?php
   require_once('configuration/c_config.php');
     require('php/dynamic_sql_command.php');
    $pagename='dashboard';
     $primary_process=$_SESSION['act_user']['primary_process'];
     $Process_name=$_SESSION['act_user']['primary_process'];
     $user_group=$_SESSION['act_user']['user_group'];
     $field_number=10;
        require_once('configuration/function.php');
     echo $smtp="SELECT * FROM `create_level` WHERE Process_name='$Process_name' and level_name IN($level_graph)";
    
            
   
            
   
 
            $level=implode(' " , "',$level_name_array);
            $data=implode(' , ',$total_count);
       print_r($data);
?>