<?php 

if (isset($_GET["user_edit_id"]))       {$user_edit_id=$_GET["user_edit_id"];}
elseif (isset($_POST["user_edit_id"]))  {$user_edit_id=$_POST["user_edit_id"];}

if(isset($user_edit_id)){
    $Query="SELECT plan_id,bill_plan_type,caller_id FROM users WHERE unique_login_id='$user_edit_id'";
  $sql = mysqli_query($conn,$Query);
  $row = mysqli_fetch_array($sql);
  $edit_bill_plan_type = $row['bill_plan_type'];
  $plan_id = $row['plan_id']; 
  $caller_id = $row['caller_id']; 

  $caller_id_array=explode('|',$caller_id);
  $caller_id_array[]=$login_id;





} 
?>
<div class="row"> 
   <div class="col-md-4 col-sm-4">
      <div class="card card-box">
         <div class="card-head">
            <header>UserOnBoarding</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i> </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i> </li>
               <li><a class="parent-item" href="" style="color:#fff">User Details</a></li>
            </ol>                         
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-6">   
                  <form action="">
                     <div class="form-group row">
                        <label for="loginid" class="col-lg-4 control-label">User</label>
                        <div class="col-lg-6">
                           <select class="form-control" onchange="userpermission(this);" id="change" name="user">
                              <option value="">Select User</option> 

                              <?php

                              $sqli = "SELECT * FROM users WHERE 1 $permission_username";
                              $resi = mysqli_query($conn, $sqli);

                              while($rowi=mysqli_fetch_array($resi)){
                                 $ids = $rowi['id'];
                                 $unique_login_id = $rowi['unique_login_id'];
                                 $user_login_id = $rowi['login_id'];
                                 $first_names =   $rowi['first_name'];
                                 $last_names =    $rowi['last_name'];
                                 $user_type =    $rowi['user_type'];
                                 ?>
                                 <option value="<?php echo $unique_login_id; ?>" <?php if($unique_login_id==$user_edit_id){ ?>selected="true"<?php } ?> ><?php echo $first_names.' '.$last_names.'('.$user_type.')';?></option>
                                 <?php                                 
                              }
                              ?>
                           </select>

                            
                        </div>
                     </div>
                  </form>
               </div>
            </div>

            <div class="row mt-4" id="late" >
               <div class="col-lg-12">
                  <form action="" method="POST" id="updateOnBoarding_form">
                     <fieldset style="border-radius: 4px;">
                        <legend>Products</legend>
                        <input type="hidden" name="user_edit_id" value="<?php echo $user_edit_id; ?>" >
                        <div class="col-md-12">
                           <div class="form-group row">
                              <label for="sms_bill_plan_type" class="col-sm-3 control-label">Plan</label>
                              <div class="col-sm-4">
                                 <select class="form-control select2"  name="plan_id">
                                    <option value="">Select Plan</option>

                                    <?php

                                    $sqlp = "SELECT * FROM vertage_voice_plan_list WHERE promotion_type='Voice' $permission_username";
                                    $resp = mysqli_query($conn, $sqlp);
                                    while($rowp=mysqli_fetch_array($resp)){

                                       $plan_id1 = $rowp['plan_id'];
                                       $plan_name = $rowp['plan_name'];
                                       $promotion_type = $rowp['promotion_type'];
                                       $plan_pulse = $rowp['plan_pulse'];
                                       $plan_rate = $rowp['plan_rate'];
                                       ?>

                                       <option value="<?php echo $plan_id1; ?>"  <?php if($plan_id1) { if($plan_id==$plan_id1){  ?> selected="true" <?php } } ?> ><?php echo $plan_name;?> | <?php echo $promotion_type;?> (<?php echo $plan_pulse;?> SMS /<?php echo $plan_rate;?>  Paisa)</option>

                                       <?php
                                    }
                                    ?>

                                 </select>
                              </div>
                           </div>


                        </div>  
                     </fieldset>
                       <fieldset style="border-radius: 4px;">
                        <legend>Caller Id</legend>
                        <input type="hidden" name="user_edit_id" value="<?php echo $user_edit_id; ?>" >
                        <div class="col-md-12">
                           <div class="form-group row">
                               
                                 

                                    <?php

                                    $sqlp = "SELECT unique_id,extension , ivr_name,username FROM inbound_dids WHERE 1 $permission_username";
                                    $resp = mysqli_query($conn, $sqlp);
                                    while($row=mysqli_fetch_array($resp)){
                                       $unique_id=$row[0];
                                       $caller_id=$row[1];
                                       $ivr_name=$row[2];
                                       $username=$row[3];
                                      if(in_array($caller_id,$caller_id_array)){
                                       $checked="checked";
                                      }else{
                                         $checked="";
                                      }
                                       
                                       echo "<div class=\"col-sm-12\">";
                                       echo "<input type='checkbox' name='caller_id[]' value='$caller_id' $checked /> Caller ID <b class=''>$caller_id </b> Caller Name  <b> $ivr_name </b> Assine User <b>$username</b>";
                                       echo "<br/>";
                                       echo "</div>";
                                       }
                                       ?>
 

                                 
                           </div>


                        </div>  
                         
                     </fieldset>
                     <div class="row">               
                        <div class="col-md-12 text-center pt-3">
                           <button type="submit" class="btn btn-primary">Save</button>                               
                        </div>
                     </div>  
                  </form>      
               </div>
            </div>

            <div class="row mt-4" id="late" >
               <div class="col-lg-12">
                  <form action="" method="POST" id="updateOnBoarding_form">
                   
                      
                  </form>      
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="col-md-4 col-sm-4">
      <div class="card card-box">
         <div class="card-head">
            <header>Voice Caller ID</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i> </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i> </li>
               <li><a class="parent-item" href="" style="color:#fff">User Details</a></li>
            </ol>                         
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-6">   
                  <form id="create_ivr"> 
                        <div class="form-group row">
                              <label for="caller_id" class="col-sm-4 control-label">Caller ID</label>
                              <div class="col-sm-8">
                                 <input type="number" name='extension' class="form-control" >  
                              </div>
                              <input type="hidden" class="form-control" id="Campaign" name="username" value="<?php echo $login_id; ?>">
                        </div> 
                        <div class="form-group row">
                              <label for="caller_id" class="col-sm-4 control-label">Caller Name</label>
                              <div class="col-sm-8">
                                 <input type="text" name='ivr_name' class="form-control" >  
                              </div>
                               
                        </div>     
                  <div class="col-md-12 text-center pt-3">
                     <button type="submit" class="btn btn-primary">Save</button>                               
                  </div> 
               </form>
         </div>
      </div>


   </div>
   <script type="text/javascript">


     function userpermission(sel){
      var baseurls = window.location.origin;
      var user_id = sel.value;
      window.location.href ='index.php?page_name=user_onboarding&user_edit_id='+user_id; 
   }


</script>