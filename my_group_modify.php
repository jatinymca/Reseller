<?php
$campaign_id=$_GET['campaign_id'];
$smtp="SELECT * FROM `vertage_campaign` WHERE campaign_id='$campaign_id' "; 
$row=mysqli_query($conn,$smtp);
$fetch_record=array();
while($data=mysqli_fetch_assoc($row)){
     $campaign_id=$data['campaign_id'];
     $campaign_description=$data['campaign_description'];
     $status=$data['status'];
     $group_descreption=$data['campaign_description'];

     $record_file_enable_one=$data['record_file_enable_one']; 
     $play_file_name_one=$data['play_file_name_one'];

     $record_file_enable_two=$data['record_file_enable_two']; 
     $play_file_name_two=$data['play_file_name_two'];

     $record_file_enable_three=$data['record_file_enable_three']; 
     $play_file_name_three=$data['play_file_name_three'];

     $record_file_enable_four=$data['record_file_enable_four']; 
     $play_file_name_four=$data['play_file_name_four'];

     $record_file_enable_five=$data['record_file_enable_five']; 
     $play_file_name_five=$data['play_file_name_five'];

     $record_file_enable_six=$data['record_file_enable_six']; 
     $play_file_name_six=$data['play_file_name_six'];

      $plain_text=$data['plain_text'];  
    
}
 
foreach ($fetch_record[0] as $key => $value) {
   ${$key}=$value;;
}
//$fetch_record=array();
// $smtp="SELECT * FROM `vertage_survey` WHERE group_id='$group_id' order by group_id desc limit 1";
// $row=mysqli_query($conn,$smtp);
// while($data=mysqli_fetch_assoc($row)){
//    $fetch_record[]=$data;
// }
 
// foreach ($fetch_record[0] as $key => $value) {
//    ${$key}=$value;
// }
?>
<div class="row">
   <div class="col-md-8 col-sm-8">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage Group Modify</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">voice</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage voice Data</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <form action="" method="post" id="modify_group_record" >
                  <input type="hidden" name="group_id" value="<?php echo $campaign_id; ?>">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="campaignname" class="col-sm-4 control-label">Group Name</label>
                                 <div class="col-sm-8">
                                    <span> <?php echo $campaign_id; ?></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="group_descreption" class="col-sm-4 control-label">Group Descreption</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" id="group_descreption" name="group_descreption" value="<?php if(isset($campaign_id)){echo $campaign_description;}?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="retry_att" class="col-sm-4 control-label">Status</label>
                                 <div class="col-sm-8">
                                    <select class="form-control" name="active">
                                       <option value="Y" <?php echo($status=="Y")?"selected":""; ?>>Y</option>
                                       <option value="N" <?php echo($status=="N")?"selected":""; ?>>N</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="retry_att" class="col-sm-4 control-label">Plain Text</label>
                                 <div class="col-sm-8">
                                    <select class="form-control" name="plain_text">
                                       <option value="Y" <?php echo($plain_text=="Y")?"selected":""; ?>>Y</option>
                                       <option value="N" <?php echo($plain_text=="N")?"selected":""; ?>>N</option>
                                       <option value="N" <?php echo($plain_text=="T")?"selected":""; ?>>T</option>
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>A1</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable One</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_one">
                                            
                                             <option value="N" <?php echo($record_file_enable_one=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_one=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                               
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_one" class="col-sm-4 control-label">Play File Name One</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_one" name="play_file_name_one" readonly value="<?php echo $play_file_name_one;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_1')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset style="border-radius: 4px;">
                                 <legend>A2</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable Two</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_two">
                                              <option value="N" <?php echo($record_file_enable_two=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_two=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div> 
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_two" class="col-sm-4 control-label">Play File Name Two</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_two" name="play_file_name_two" readonly value="<?php echo $play_file_name_two;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_2')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>A3</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable Three</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_three">
                                             <option value="N" <?php echo($record_file_enable_three=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_three=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div> 
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_three" class="col-sm-4 control-label">Play File Name Three</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_three" name="play_file_name_three" readonly  value="<?php echo $play_file_name_three;?>">
                                       </div>
                                       <div class="col-sm-3"> <a href="javascript:void(0)" onclick="audio_modal('audio_3')";> Audio chooser </a> </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div> 
                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>D1</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable four</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_four"> 
                                             <option value="N" <?php echo($record_file_enable_four=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_four=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div> 
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_four" class="col-sm-4 control-label">Play File Name four</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_four" name="play_file_name_four" readonly value="<?php echo $play_file_name_four;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_4')";> Audio chooser </a></div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>

                                <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>D2</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable five</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_five"> 
                                             <option value="N" <?php echo($record_file_enable_five=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_five=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div> 
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_five" class="col-sm-4 control-label">Play File Name five</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_five" name="play_file_name_five" readonly value="<?php echo $play_file_name_five;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_5')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>

                                <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>D3</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="retry_att" class="col-sm-4 control-label">Record File Enable six</label>
                                       <div class="col-sm-8">
                                          <select class="form-control" name="record_file_enable_six"> 
                                             <option value="N" <?php echo($record_file_enable_six=="N")?"selected":""; ?>>N</option>
                                             <option value="Y" <?php echo($record_file_enable_six=="Y")?"selected":""; ?>>Y</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div> 

                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_six" class="col-sm-4 control-label">Play File Name six</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_six" name="play_file_name_six" readonly value="<?php echo $play_file_name_six;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_6')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>

 <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>Text To Speech</legend>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       
                                       <div class="col-sm-8">
                                          <textarea class="form-control" style="height:200px" cols="45" name="text_to_speech" ></textarea>
                                       </div>
                                    </div>
                                 </div> 
                                 
                                 
                              </fieldset>
                           </div>
                           <div class="col-md-12 text-center pt-3 pb-2">
                              <button type="submit" class="btn btn-primary">Save</button>    
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php                     
include 'model/audio_model.php';
?>