<?php 

function input_type_text($field_colm,$input_label,$extra_values,$value_eit){

 
  if($input_label=='Y'){ $readonly='readonly';}else{ $readonly='';}

$html='<input type="text" name="'. $field_colm.'"  class="maditry_field form-control plaintext '.$field_colm.' "   id="'.$field_colm.'"   data-id="'.$field_colm.'" value="'.$value_eit.'" '.$readonly.' >';
 

  return $html;                            


}
 
function input_type_radio($field_colm,$input_label,$extra_values,$value_eit){

 
        $impload=explode(',',$extra_values);
       foreach ($impload as $key => $value) {
        $html.='<input type="radio" name="'.$field_colm.'" id="'.$value.'" value="'.$value.'" class="with-gap">
                <label for="'.$value.'">'.$value.'</label>';
        } 
    


  return $html;                            


}

function input_type_checkbox($field_colm,$input_label,$extra_values,$value_eit,$readonly){

 
 $impload=explode(',',$extra_values);
 foreach ($impload as $key => $value) {
$html.='<input type="checkbox" id="'.$key.'" name="'.$field_colm.'" class="filled-in" value="'.$value.'" > '; 
 
 
}

  return $html;                            


}
function input_type_textarea($field_colm,$input_label,$extra_values,$value_eit){

  
$html='<textarea  name="'.$field_colm.'" name="'.$field_colm.'" class="form-control no-resize" placeholder="Please type ..." value=""  >'.$value_eit.'</textarea>';
 
 
return $html;                            


}
 
function input_type_date($field_colm,$input_label,$extra_values,$value_eit){

 
$html='<input type="text" name="'. $field_colm.'"  class="form-control plaintext dtpickerdemo" id="'.$field_colm.'" value="'.$value_eit.'" placeholder="MM/DD/YYYY">';
 

  return $html;                            


} 
 function input_type_time($field_colm,$input_label,$extra_values,$value_eit){

 
$html='<input type="text" name="'. $field_colm.'"  class="form-control plaintext timepicker" id="'.$field_colm.'" value="'.$value_eit.'" placeholder="HH:MM:AM">';
 

  return $html;                            


} 

 function input_type_datetime($field_colm,$input_label,$extra_values,$value_eit){

 
$html='<input type="datetime-local" name="'. $field_colm.'"  class="form-control plaintext  '.$field_colm.'" data-id="'.$field_colm.'"    value="'.$value_eit.'" placeholder="HH:MM:AM h:i:s">';
 

  return $html;                            


} 
function input_type_select($field_colm,$input_label,$extra_values,$value_eit){

 
$html='<select  name="'. $field_colm.'" class="form-control show-tick '.$field_colm.'" data-id="'.$field_colm.'"   id="'.$field_colm.'"   >';
 if(!empty($value_eit)){
  $html.='<option value="'.$value_eit.'">'.$value_eit.'</option>';
}
$impload=explode(',',$extra_values);
  foreach ($impload as $key => $value) {
$html.='<option value="'.$value.'">'.$value.'</option>';
 }
$html.='</select>';
 

  return $html;                            


}  

 

 
?>