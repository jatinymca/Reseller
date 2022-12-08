<?php
$smtp="SELECT * FROM `vertage_groups` WHERE group_id='$group_id' order by group_id desc limit 1";
$row=mysqli_query($conn,$smtp);
$fetch_record=array();
while($data=mysqli_fetch_assoc($row)){
   $fetch_record[]=$data;
}
 
foreach ($fetch_record[0] as $key => $value) {
   ${$key}=$value;;
}
$fetch_record=array();
$smtp="SELECT * FROM `vertage_survey` WHERE group_id='$group_id' order by group_id desc limit 1";
$row=mysqli_query($conn,$smtp);
while($data=mysqli_fetch_assoc($row)){
   $fetch_record[]=$data;
}
 
foreach ($fetch_record[0] as $key => $value) {
   ${$key}=$value;
}
?>
<div class="row">
   <div class="col-md-8 col-sm-8">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage Group Modify</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                  <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="campaignname" class="col-sm-4 control-label">Campaing  Name</label>
                                 <div class="col-sm-8">
                                    <span> <?php echo $campaign_id; ?></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="group_descreption" class="col-sm-4 control-label">Group Descreption</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" id="group_descreption" name="group_descreption" value="<?php if(isset($group_id)){echo $group_descreption;}?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group row">
                                 <label for="retry_att" class="col-sm-4 control-label">Status</label>
                                 <div class="col-sm-8">
                                    <select class="form-control" name="active">
                                       <option value="Y" <?php echo($active=="Y")?"selected":""; ?>>Y</option>
                                       <option value="N" <?php echo($active=="N")?"selected":""; ?>>N</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>1</legend>
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
                                       <label for="group_descreption" class="col-sm-4 control-label">Play Time Start One</label>
                                       <div class="col-sm-8">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_start_one" placeholder="Start Time" name="play_time_start_one" value="<?php if(!empty($play_time_start_one) or (date(strtotime($play_time_start_one)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_start_one));} ?>">
                                             </div>
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_end_one" placeholder="End Time" name="play_time_end_one" value="<?php if(!empty($play_time_end_one) or (date(strtotime($play_time_end_one)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_end_one));} ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_one" class="col-sm-4 control-label">Play File Name One</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_one" name="play_file_name_one" value="<?php echo $play_file_name_one;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_1')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>2</legend>
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
                                       <label for="group_descreption" class="col-sm-4 control-label">Play Time Start Two</label>
                                       <div class="col-sm-8">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_start_two" placeholder="Start Time" name="play_time_start_two" value="<?php if(!empty($play_time_start_two) or (date(strtotime($play_time_start_two)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_start_two));} ?>">
                                             </div>
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_end_two" placeholder="End Time" name="play_time_end_two" value="<?php if(!empty($play_time_end_two) or (date(strtotime($play_time_end_two)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_end_two));} ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_one" class="col-sm-4 control-label">Play File Name Two</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_two" name="play_file_name_two" value="<?php echo $play_file_name_two;?>">
                                       </div>
                                       <div class="col-sm-3"><a href="javascript:void(0)" onclick="audio_modal('audio_2')";> Audio chooser </a>  </div>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset style="    border-radius: 4px;">
                                 <legend>3</legend>
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
                                       <label for="group_descreption" class="col-sm-4 control-label">Play Time Start Three</label>
                                       <div class="col-sm-8">
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_start_three" placeholder="Start Time" name="play_time_start_three" value="<?php if(!empty($play_time_start_three) or (date(strtotime($play_time_start_three)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_start_three));} ?>">
                                             </div>
                                             <div class="col-sm-6">
                                                <input type="datetime-local" class="form-control" id="play_time_end_three" placeholder="End Time" name="play_time_end_three" value="<?php if(!empty($play_time_end_three) or (date(strtotime($play_time_end_three)))>0){echo date("Y-m-d\TH:m:s", strtotime($play_time_end_three));} ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <label for="play_file_name_one" class="col-sm-4 control-label">Play File Name Three</label>
                                       <div class="col-sm-5">
                                          <input type="text" class="form-control" id="play_file_name_three" name="play_file_name_three" value="<?php echo $play_file_name_three;?>">
                                       </div>
                                       <div class="col-sm-3"> <a href="javascript:void(0)" onclick="audio_modal('audio_3')";> Audio chooser </a> </div>
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
