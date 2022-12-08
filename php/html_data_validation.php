<?php
require('../configuration/c_config.php');
require('form_function.php'); 
if (isset($_GET["Process_name"]))       {$Process_name=$_GET["Process_name"];}
elseif (isset($_POST["Process_name"]))  {$Process_name=$_POST["Process_name"];}
if (isset($_GET["colume_name"]))       {$colume_name=$_GET["colume_name"];}
elseif (isset($_POST["colume_name"]))  {$colume_name=$_POST["colume_name"];}  
if (isset($_GET["method"]))       {$method=$_GET["method"];}
elseif (isset($_POST["method"]))  {$method=$_POST["method"];}

if (isset($_GET["method_name"]))       {$method_name=$_GET["method_name"];}
elseif (isset($_POST["method_name"]))  {$method_name=$_POST["method_name"];}
if (isset($_GET["method_value"]))       {$method_value=$_GET["method_value"];}
elseif (isset($_POST["method_value"]))  {$method_value=$_POST["method_value"];}
if (isset($_GET["Methods_massage"]))       {$Methods_massage=$_GET["Methods_massage"];}
elseif (isset($_POST["Methods_massage"]))  {$Methods_massage=$_POST["Methods_massage"];}


            echo '<table  id="method_value_table" class="table table-bordered">
            <tr>
              <td>Methods Select d</td>
              <td>Methods Name</td>
              <td>Methods Value</td>
              <td>Methods Message</td>
              <td>Action</td>
            </tr>';
             

           

           $smtp="SELECT * FROM validation_methods WHERE 1 ";
           $res=mysqli_query($conn,$smtp);
           $i=1;
           while ($row=mysqli_fetch_array($res)) {

                $Methods_name=$row['field_key'];
                $Methods_massage=$row['field_error_massges'];

           		$smtp1="SELECT * FROM process_validation WHERE colume_name='$colume_name' and Process_name='$Process_name' and field_key='$Methods_name'";
				$res1=mysqli_query($conn,$smtp1);
          		$count=mysqli_num_rows($res1);
          		$row1=mysqli_fetch_array($res1);

          		if($count==1){
          			$checked='checked=""';
                    $Methods_massage=$row1['field_error_massges'];


          			}else{ $checked="";}
                $id=$row['id'];
                $Methods_value=$row[''];
                $field_colm='method_value';
                $extra_values=$row['extra_values'];
                $field_type=$row['field_type'];
                $input_label=$row['extra_values'];
                $input_type_dynamic='input_type_'.$field_type;
                $value_eit=$row1['field_key_value'];

            echo '<tr class="section'.$id.'">';      
            echo '<td><input type="checkbox" Name="method" value="'.$count.'" '.$checked.'></td>';
            echo '<td><input type="hidden" Name="method_name" value="'.$Methods_name.'">'.ucfirst($Methods_name).'</td>';
            echo '<td>'.$input_type_dynamic($field_colm,$input_label,$extra_values,$value_eit).'</td>';
            echo '<td><input type="text" name="Methods_massage" value="'.$Methods_massage.'" class="form-control plaintext"></td>';
            echo '<td><button data-id="'.$id.'" class="buton">Save</button></td>';
             echo '</tr>';      
           }
               
           ?>
            <tr>
              
            </tr>
          </table>
 

  