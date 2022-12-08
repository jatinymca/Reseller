<?php
if (isset($_GET["edit_id"]))       {$edit_id=$_GET["edit_id"];}
elseif (isset($_POST["edit_id"]))  {$edit_id=$_POST["edit_id"];}

if(isset($edit_id)){
   $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_login_id='$edit_id'");
   $row = mysqli_fetch_array($sql);
}
?>
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage User Profile</header>

               <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li> 
               <li><a class="parent-item" href="" style="color:#fff">Manage</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">User Profile</a>
               </li>
               
            </ol>                         
         </div>
         <div class="card-body">
            <div class="row">                         
               <div class="col-md-12">                            
                  <div class="table-scrollable">
                     <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                           <div class="row">
                              <div class="col-sm-12">
                                 <table class="table table-striped " id="usertable">
                                    <thead>
                                       <tr role="row">
                                          <th>Company Logo</th>
                                          <th > Login Id </th>
                                          <th > Username </th>
                                          <th> Name </th>
                                          <th > Mobile </th>
                                          <th > Email </th>
                                          <th >Bill Plan Type</th> 
                                          <th >Total credit </th>  
                                          <th >Joining Date</th>
                                          <th > Status </th>
                                          <th> Action </th>
                                       </tr>
                                    </thead>
                                    <tbody id="fetch_users">
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                              <!-- <div class="row">
                              <div class="col-sm-12 col-md-5">
                              <div class="dataTables_info" id="example4_info" role="status" aria-live="polite">Showing 1 to 10 of 14 entries</div>
                              </div><div class="col-sm-12 col-md-7">
                              <div class="dataTables_paginate paging_simple_numbers" id="example4_paginate">
                              <ul class="pagination">
                              <li class="paginate_button page-item previous disabled" id="example4_previous">
                              <a href="#" aria-controls="example4" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                              </li>
                              <li class="paginate_button page-item active">
                              <a href="#" aria-controls="example4" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                              </li>
                              <li class="paginate_button page-item ">
                              <a href="#" aria-controls="example4" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                              <li class="paginate_button page-item next" id="example4_next">
                              <a href="#" aria-controls="example4" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                              </li>
                              </ul>
                              </div>
                              </div>
                              </div> -->
                              </div>
                           </div> 
                  
               </div>
            </div>    
            <div class="row">             
               <div class="col-md-12 text-center pt-3">
                  <!-- <button type="submit" class="btn btn-primary">Save</button>   -->                             
               </div>
            </div>
         
         </div>
      </div>
   </div>
</div>
<?php
if(isset($edit_id)){
 
?>
   <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="card card-box">
               <div class="card-head">
                  <header>User Details</header>

                     <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
                     <li><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                  <form action="" id="user_form" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="action" value="add_user">
                     <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                     <input type="hidden" name="edit_image_name" value="<?php echo $row['upload_img']; ?>">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="row">
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="checkbox1" class="col-sm-4 control-label">Enable User</label>
                                    <div class="col-sm-8">
                                       <input type="checkbox" class="form-control" value="1" name="status" id="status" <?php echo ($row['status']=='1')?"checked":""; ?>>
                                    </div>
                                 </div>                                 
                              </div>  

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="usertype" class="col-sm-4 control-label">User Type *</label>
                                    <div class="col-sm-8">
                                        <?php echo $row['user_type'];?> 
                                          
                                    </div>
                                 </div>                                 
                              </div>
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="loginId" class="col-sm-4 control-label">Login ID *</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="login_id" value="<?php if(isset($edit_id)){echo $row['login_id'];} ?>" id="login_id" readonly>
                                    </div>
                                 </div>                                 
                              </div>

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="uesername" class="col-sm-4 control-label">User Name *</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="username" value="<?php if(isset($edit_id)){echo $row['username'];} ?>" id="username" readonly>
                                    </div>
                                 </div>                                 
                              </div>

                              

                              <!-- <div class="col-md-12">                                                        
                                 <div class="form-group row">
                                    <label for="bill_plan" class="col-sm-4 control-label">Bill Plan Type</label>
                                    <div class="col-lg-8">
                                       <select class="form-control select2 select2-hidden-accessible" name="bill_plan_type" id="bill_plan_type" tabindex="-1" aria-hidden="true">
                                           
                                          
                                     <?php
                                     $plan_id=$row1['plan_id'];
                                       $sql = "SELECT * FROM `vertage_voice_plan_list` where plan_id='$plan_id' ";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row1=mysqli_fetch_array($res)){
                                          echo '<option value="'.$row1['plan_id'].'" selected>'.$row1['plan_name'].' ('.$row1['plan_pulse'].' Sec/'.$row1['plan_rate'].' Paisa)</option>';
                                       }
                                    ?>
                                    <?php
                                      $sql = "SELECT * FROM `vertage_voice_plan_list` where plan_status='Y'";
                                       $res1 = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res1);
                                       while($row1=mysqli_fetch_array($res1)){
                                             
                                          echo '<option value="'.$row1['plan_id'].'">'.$row1['plan_name'].' ('.$row1['plan_pulse'].' Sec/'.$row1['plan_rate'].' Paisa)</option>';
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
                                       <input type="text" class="form-control" name="first_name" value="<?php if(isset($edit_id)){echo $row['first_name'];} ?>" id="first_name">
                                    </div>
                                 </div>                                 
                              </div>  

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="last_name" value="<?php if(isset($edit_id)){echo $row['last_name'];} ?>" id="last_name" >
                                    </div>
                                 </div>                                 
                              </div>  
                                             
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="mob" class="col-sm-4 control-label">Mobile No. *</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="mobile_no" value="<?php if(isset($edit_id)){echo $row['mobile_no'];} ?>" id="mobile_no" >
                                    </div>
                                 </div>                                 
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="row">
                              
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="email" class="col-sm-4 control-label">Email Id *</label>
                                    <div class="col-sm-8">
                                       <input type="email" class="form-control" name="email" value="<?php if(isset($edit_id)){echo $row['email'];} ?>" id="email" >
                                    </div>
                                 </div>                                 
                              </div>
                              
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="mob" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                       <textarea class="form-control" name="address" id="address" rows="3"><?php if(isset($edit_id)){echo $row['address'];} ?></textarea>
                                    </div>
                                 </div>                                 
                              </div>
                              
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="company_name" class="col-sm-4 control-label">Company Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="company_name" value="<?php if(isset($edit_id)){echo $row['company_name'];} ?>" id="company_name" >
                                    </div>
                                 </div>                                 
                              </div>

                              <div class="col-md-12">                                                         
                                 <div class="form-group row">
                                    <label for="checkbox1" class="col-sm-4 control-label">Enable API</label>
                                    <div class="col-sm-8">
                                       <input type="checkbox" class="form-control" value="1" name="enable_api" id="enable_api" <?php echo ($row['enable_api']=='1')?"checked":""; ?>>
                                    </div>
                                 </div>                                 
                              </div>  

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="api_pass" class="col-sm-4 control-label">Api Password</label>
                                    <div class="col-sm-8">
                                       <input type="password" class="form-control" name="api_pass" value="<?php if(isset($edit_id)){echo $row['api_pass'];} ?>" id="api_pass">
                                    </div>
                                 </div>                              
                              </div>

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="email" class="col-sm-4 control-label">Desc</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="description" value="<?php if(isset($edit_id)){echo $row['description'];} ?>" id="description" >
                                    </div>
                                 </div>                                 
                              </div>

                              <!-- <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="customername" class="col-sm-4 control-label">Valid From</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="valid_from" id="valid_from" autocomplete="off" value="<?php echo date('m/d/Y', strtotime($row['valid_from'])); ?>">
                                    </div>
                                 </div>                                 
                              </div>  
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="usernmae" class="col-sm-4 control-label">Valid Till</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="valid_till" id="valid_till" autocomplete="off" value="<?php echo date('m/d/Y', strtotime($row['valid_till'])); ?>">
                                    </div>
                                 </div>                                 
                              </div> -->  
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="row">
                              
                              <div class="col-md-12">                                                        
                                 <div class="form-group row">
                                    <label for="acc_name" class="col-sm-4 control-label">Acc Mgr Name</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="acc_mgr_name" value="<?php if(isset($edit_id)){echo $row['acc_mgr_name'];} ?>" id="acc_mgr_name">
                                    </div>
                                 </div>                              
                              </div>
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="validfrom" class="col-sm-4 control-label">Acc Mgr PhoneNo</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="acc_mgr_phone" value="<?php if(isset($edit_id)){echo $row['acc_mgr_phone'];} ?>" id="acc_mgr_phone" >
                                    </div>
                                 </div>                                 
                              </div>
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="acc_emailid" class="col-sm-4 control-label">Acc Mgr EmailID</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="acc_mgr_email" value="<?php if(isset($edit_id)){echo $row['acc_mgr_email'];} ?>" id="acc_mgr_email">
                                    </div>
                                 </div>                              
                              </div>
                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="tpin" class="col-sm-4 control-label">TelemarketingID</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="telemarketing_id" value="<?php if(isset($edit_id)){echo $row['telemarketing_id'];} ?>" id="telemarketing_id">
                                    </div>
                                 </div>                              
                              </div>

                              <div class="col-md-12">                                                       
                                 <div class="form-group row">
                                    <label for="tpin" class="col-sm-4 control-label">Entity Id</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="entity_id" value="<?php if(isset($edit_id)){echo $row['entity_id'];} ?>" id="entity_id">
                                    </div>
                                 </div>                              
                              </div>
                              <div class="col-md-12">                                                         
                                 <div class="form-group row">
                                    <label for="checkbox1" class="col-sm-4 control-label">Lock/Unlock</label>
                                    <div class="col-sm-8">
                                       <input type="checkbox" class="form-control" value="1" name="lockunlock" id="lockunlock" <?php echo ($row['lockunlock']=='1')?"checked":""; ?>>
                                    </div>
                                 </div>                                 
                              </div>  
                              <div class="col-md-12">                                 
                                 <div class="form-group row has-warning">
                                    <label class="control-label col-md-4" for="file">Upload Logo</label>
                                    <div class="col-md-8">
                                       <input type="file" class="form-control" name="upload_img" id="upload_img">
                                    </div>
                                 </div>
                              </div>               
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
<?php
}
?>