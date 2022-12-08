
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>User Profile</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">My Account</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">User Profile</a>
               </li>               
            </ol>                         
         </div>
         <div class="card-body">
            <form action="" id="user_form" method="POST">
               <input type="hidden" name="action" value="add_user">
               <div class="row">
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="checkbox1" class="col-sm-4 control-label">Enable User</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" value="1" name="status" id="status">
                              </div>
                           </div>                                 
                        </div>  
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="usertype" class="col-sm-4 control-label">User Type *</label>
                              <div class="col-sm-8">
                                 <select class="form-control" name="user_type" id="user_type">
                                    <?php 
                                    if($user_type=='admin'){ ?>

                                          <option value="">Select User Type</option>
                                          <option value="Reseller">Reseller</option>
                                          <option value="User">User</option>

                                    <?php   }
                                       else{
                                          echo '<option value="User">User</option>';
                                       }?>
                                    
                                 </select>
                              </div>
                           </div>                                 
                        </div>  
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="loginId" class="col-sm-4 control-label">Login ID *</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="login_id" id="login_id" >
                              </div>
                           </div>                                 
                        </div>

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="uesername" class="col-sm-4 control-label">User Name *</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="username" id="username" >
                              </div>
                           </div>                                 
                        </div>

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="pass" class="col-sm-4 control-label">Password *</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" name="password" id="password" >
                              </div>
                           </div>                                 
                        </div>

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="conf_pass" class="col-sm-4 control-label">Conf Password *</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" name="conf_pass" id="conf_pass" >
                              </div>
                           </div>                                 
                        </div>

                        <!-- <div class="col-md-12">                                                        
                           <div class="form-group row">
                              <label for="bill_plan" class="col-sm-4 control-label">Bill Plan Type</label>
                              <div class="col-lg-8">
                                 <select class="form-control select2 select2-hidden-accessible" name="bill_plan_type" id="bill_plan_type" required="" tabindex="-1" aria-hidden="true">
                                    <option value="">Select a state</option>
                                   <?php
                                      $sql = "SELECT * FROM `vertage_voice_plan_list` where plan_status='Y'";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row=mysqli_fetch_array($res)){

                                          echo '<option value="'.$row['plan_id'].'">'.$row['plan_name'].' ('.$row['plan_pulse'].' Sec/'.$row['plan_rate'].' Paisa)</option>';
                                       }
                                    ?>
                                 </select>
                              </div>
                           </div>                              
                        </div> -->

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="first_name" class="col-sm-4 control-label">First Name *</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="first_name" id="first_name">
                              </div>
                           </div>                                 
                        </div>  

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="last_name" id="last_name" >
                              </div>
                           </div>                                 
                        </div>  
                                       
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="mob" class="col-sm-4 control-label">Mobile No. *</label>
                              <div class="col-sm-8">
                                 <input type="text" minlength="0" maxlength="9" class="form-control" name="mobile_no" id="mobile_no" >
                              </div>
                           </div>                                 
                        </div>
                        
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="email" class="col-sm-4 control-label">Email Id *</label>
                              <div class="col-sm-8">
                                 <input type="email" class="form-control" name="email" id="email" >
                              </div>
                           </div>                                 
                        </div>
                        
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="mob" class="col-sm-4 control-label">Address</label>
                              <div class="col-sm-8">
                                 <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                              </div>
                           </div>                                 
                        </div>
                        
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="company_name" class="col-sm-4 control-label">Company Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="company_name" id="company_name" >
                              </div>
                           </div>                                 
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12">                                                         
                           <div class="form-group row">
                              <label for="checkbox1" class="col-sm-4 control-label">Enable API</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" value="1" name="enable_api" id="enable_api">
                              </div>
                           </div>                                 
                        </div>  

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="api_pass" class="col-sm-4 control-label">Api Password</label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" name="api_pass" id="api_pass">
                              </div>
                           </div>                              
                        </div>

                        <!-- <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="customername" class="col-sm-4 control-label">Valid From</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="valid_from" id="valid_from" autocomplete="off">
                              </div>
                           </div>                                 
                        </div>  
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="usernmae" class="col-sm-4 control-label">Valid Till</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="valid_till" id="valid_till" autocomplete="off">
                              </div>
                           </div>                                 
                        </div>  --> 
                        
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="email" class="col-sm-4 control-label">Desc</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="description" id="description" >
                              </div>
                           </div>                                 
                        </div>
                        <div class="col-md-12">                                                        
                           <div class="form-group row">
                              <label for="acc_name" class="col-sm-4 control-label">Acc Mgr Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="acc_mgr_name" id="acc_mgr_name">
                              </div>
                           </div>                              
                        </div>
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="validfrom" class="col-sm-4 control-label">Acc Mgr PhoneNo</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="acc_mgr_phone" id="acc_mgr_phone" >
                              </div>
                           </div>                                 
                        </div>
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="acc_emailid" class="col-sm-4 control-label">Acc Mgr EmailID</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="acc_mgr_email" id="acc_mgr_email">
                              </div>
                           </div>                              
                        </div>
                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">TelemarketingID</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="telemarketing_id" id="telemarketing_id">
                              </div>
                           </div>                              
                        </div>

                        <div class="col-md-12">                                                       
                           <div class="form-group row">
                              <label for="tpin" class="col-sm-4 control-label">Entity Id</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="entity_id" id="entity_id">
                              </div>
                           </div>                              
                        </div>
                        <div class="col-md-12">                                                         
                           <div class="form-group row">
                              <label for="checkbox1" class="col-sm-4 control-label">Lock/Unlock</label>
                              <div class="col-sm-8">
                                 <input type="checkbox" class="form-control" value="1" name="lockunlock" id="lockunlock">
                              </div>
                           </div>                                 
                        </div>  
                        <div class="col-md-12">                                 
                           <div class="form-group row has-warning">
                              <label class="control-label col-md-4" for="inputWarning">Upload Logo</label>
                              <div class="col-md-8">
                                 <input type="file" class="form-control" name="upload_img" id="upload_img">
                              </div>
                           </div>
                        </div>

                        <!-- <div class="col-md-12 text-center pt-3">
                           <button type="submit" class="btn btn-primary"> Upload Logo </button>   
                           <button type="submit" class="btn btn-primary"> Enable Logo </button>
                        </div> -->
                     </div>
                     
                  </div>
               </div>    
               <div class="row">               
                  <div class="col-md-12 text-center pt-3">
                     <button type="submit" class="btn btn-primary">Save</button>      
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

