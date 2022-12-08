
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Create SMS Campaign</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Create SMS Campaign</a>
               </li>               
            </ol>                         
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal row" action="" id="CreateSMSCampaign" method="post">
                     <div class="col-md-12 mt-3 fadeInLeft animated">
                        <fieldset>                      

                           <input type="hidden" name="action" value="Create_SMS_Campaign">          
                           <div class="form-group row">
                              <label class="col-md-2 control-label" for="">Upload Data </label>
                              <div class="col-md-10">
                                 <div class="row">
                                    <div class="col-md-2">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="upload_radio" type="radio" value="2"  class="form-control" checked="Checked" onchange="typeUploadDate(this);"></span>
                                          <span class="col-md-9"><label for="manual_entry">Manual Entry</label></span>
                                       </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="upload_radio" type="radio" value="0"  class="form-control" onchange="typeUploadDate(this);"></span>
                                          <span class="col-md-9"><label for="excel_file">Excel File</label></span>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="upload_radio" type="radio" value="1"  
                                          class="form-control" onchange="typeUploadDate(this);"></span>
                                          <span class="col-md-9"><label for="dynamic_excel_file">Dynamic Excel File</label></span>
                                       </div>
                                    </div> -->
                                    <div class="col-md-2">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="upload_radio" type="radio" value="3"  class="form-control" onchange="typeUploadDate(this);"></span>
                                          <span class="col-md-9"><label for="contact_list">Contact List</label></span>
                                       </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="upload_radio" type="radio" value="4"  class="form-control" onchange="typeUploadDate(this);"></span>
                                          <span class="col-md-9"><label for="previous_campaign">Previous Campaign</label></span>
                                       </div>
                                    </div> -->
                                 </div>                                 
                              </div>
                           </div>
                           
                           <div class="manual_entry_div" style="display: block;">
                              <div class="form-group row" >
                                 <label class="col-md-2 control-label" for="">Enter Mobile Number* </label>
                                 <div class="col-md-5">
                                 	<input type="text" class="form-control" name="numbers">
                                    <!-- <textarea id=""  class="form-control" style="max-height: 120px; min-height: 120px;" name="numbers" cols="20" rows="3" placeholder="Enter in new line and max 10000"></textarea> -->
                                 </div>
                                 <div class="col-md-5">
                                    <label id="" class="" style="color: red; margin-top:0px!important;">Please Enter 10 digit Numbers</label>
                                 </div>
                              </div>
                           </div>

                           <div class="contact_list_div" style="display: none;">
                              <div class="form-group row">
                                 <label class="col-md-2 control-label" for="">Select Contact Group </label>
                                 <div class="col-md-3">
                                    <select name="contact_number_list" class="form-control">
                                       <option value="">Select Contact Group</option>

                                       <?php 

                                       $sql = "SELECT group_id,group_name FROM `vertage_sms_phonebook_groups` where username='$login_id'";
                                               $res = mysqli_query($conn, $sql);
                                               $rowscount = mysqli_num_rows($res);
                                               while($row=mysqli_fetch_array($res)){ 
                                            
                                                $group_id=$row['group_id'];
                                                $group_name=$row['group_name'];
                                                   
                                          ?>
                                             <option value="<?php echo $group_id; ?>" <? if($contact_id){if($rowsc["group_id"]==$group_id){ ?>selected="true"<? }}?>><?php echo $group_name; ?></option>
                                          <?php
                                          } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-7">
                                 </div>
                              </div>
                           </div>
                           
                           <div class="previous_campaign_div" style="display: none;">   
                              <div class="form-group row">
                                 <label class="col-md-2 control-label" for="">Select Previous Camp </label>
                                 <div class="col-md-3">
                                    <select name="" class="form-control">
                                       <option value="">Select Previous Camp</option>
                                    </select>
                                 </div>
                                 <div class="col-md-7">
                                 </div>
                              </div>
                           </div>

                           <div class="excel_file_div" style="display: none;">
                              <div class="form-group row">
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-md-2">
                                          <a href="uploadSample.xlsx" class="btn btn-success" >Download Sample</a>
                                       </div>
                                    </div>   
                                 </div>
                              </div>

                              <div class="form-group row">
                                 <div class="col-md-10">
                                    <div class="row bg-danger p-1">
                                       <div class="col-md-2"><a class="btn btn-primary" href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;  Choose xls File</a></div>
                                       <div class="col-md-1"><button type="button" class="btn btn-primary"> Upload</button></div>
                                       <div class="col-md-1"><button type="button" class="btn btn-primary"> Cancel</button></div>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                 </div> 
                                 <div class="col-md-10" style="min-height: 100px;border: 1px solid black;"></div>
                                 <div class="col-md-2"></div>

                              </div>
                           </div>

                           <div class="dynamic_excel_file_div" style="display: none;">
                              <div class="form-group row">
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-md-2">
                                          <a href="uploadTrans.xlsx" class="btn btn-success">Download Sample</a>
                                       </div>
                                       <label id="" class="col-md-10" style="color: red; margin-top:0px!important;">For customize SMS with variable fields, please download the sample file</label>
                                    </div>   
                                 </div>
                              </div>

                              <div class="form-group row">
                                 <div class="col-md-10">
                                    <div class="row bg-danger p-1">
                                       <div class="col-md-2"><a class="btn btn-primary" href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;  Choose xls File</a></div>
                                       <div class="col-md-1"><button type="button" class="btn btn-primary"> Upload</button></div>
                                       <div class="col-md-1"><button type="button" class="btn btn-primary"> Cancel</button></div>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                 </div> 
                                 <div class="col-md-10" style="min-height: 100px;border: 1px solid black;"></div>
                                 <div class="col-md-2"></div>

                              </div>
                           </div>   

                           <hr>
                            
                           <div class="form-group row">
                              <label class="col-md-3 control-label" for="">Language </label>
                              <div class="col-md-4">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="language_radio" type="radio" value="0"  class="form-control" checked="Checked" onchange="languageradios(this);"></span>
                                             <span class="col-md-9"><label for="english">English</label></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="language_radio" type="radio" value="1"  class="form-control" onchange="languageradios(this);"></span>
                                          <span class="col-md-9"><label for="multiLingual">MultiLingual</label></span>
                                       </div>
                                    </div>
                                 </div>                                 
                              </div>
                              <div class="col-md-5"></div>
                           </div>
                           <div class="language_div" style="display:none;">
                              <div class="form-group row">
                                 <label for="language" class="col-sm-3 control-label">Select Language</label>
                                 <div class="col-sm-5">
                                    <select class="form-control" name="language">
                                       <option value="">Select Language</option>
                                       <option value="Hindi">Hindi</option>
                                       <option value="Punjabi">Punjabi</option>
                                       <option value="Tamil">Tamil</option>
                                       <option value="Bengali">Bengali</option>
                                    </select>
                                 </div>
                                 <div class="col-md-4"></div>         
                              </div>                                 
                            </div>
                           <div class="form-group row">
                              <label class="col-md-3 control-label" for="">Campaign Type </label>
                              <div class="col-md-5">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="campaign_type_radio" type="radio" value="2"  class="form-control" onchange="campaign_type(this);"></span>
                                          <span class="col-md-9"><label for="english">SMS Transactional</label></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="campaign_type_radio" type="radio" value="7"  class="form-control" onchange="campaign_type(this);"></span>
                                          <span class="col-md-9"><label for="service_implicit">Service Implicit</label></span>
                                       </div>
                                    </div>
                                    
                                 </div>  
                                 <div class="col-md-4"></div>                            
                              </div>
                           </div>

                           <div class="form-group row">
                              <label class="col-md-3 control-label" for="">Campaign Name* </label>
                              <div class="col-md-5">
                                 <input type="text" name="campaign_name" class="form-control" placeholder="Campaign Name">
                              </div>
                              <div class="col-md-4"></div>
                           </div>
                           <div class="senderID_div" style="display:none;">
                              <div class="form-group row">
                                 <label class="col-md-3 control-label" for="senderid">SenderID*</label>
                                 <div class="col-md-5">
                                    <select class="form-control" name="senderid">
                                       <option value="">Select SenderID</option>
                                       <option value="GOMRKT">GOMRKT</option>
                                    </select>
                                 </div>
                                 <div class="col-md-4"></div>
                              </div>
                           </div>
                              
                           <div class="form-group row">
                              <label class="col-md-3 control-label" for="sms_template">SMS Content* </label>
                              <div class="col-md-5">
                                 <select class="form-control" onchange="getsmstemplate(this);" name="sms_template">
                                    <option value="">Select Template</option>
                                    
                                    	<?php

                                    		$temp_Query="Select * from sms_template where username='$login_id'";
                                    		$temp_res = mysqli_query($conn, $temp_Query);

                                    		while($temp_rows=mysqli_fetch_array($temp_res)){
                                    			 	$template_id = $temp_rows['id'];
                                    			 	$template_name = $temp_rows['templatename'];

                                    			 	echo '<option value="'.$template_id.'">'.$template_name.'</option>';
                                    		}
                                    	?>
                                 </select>
                              </div>
                              <div class="col-md-4"></div>
                           </div>

                             <div class="form-group row">
                                 <div class="col-md-3">
                                    <textarea id="" class="form-control" readonly style="min-height: 100px; max-height: 100px;color:red;" cols="20" rows="3" placeholder="">(160 characters are counted as 1 SMS in case of English language and 70 in other language. Check your SMS count before pushing SMS)</textarea>
                                 </div>
                                 <div class="col-md-5">
                                    <textarea id="temp_content" onkeyup="characterscount();" class="form-control" style="max-height: 120px; min-height: 120px;" name="sms_text_content" cols="20" rows="3" placeholder=""></textarea>
                                    <label id=""> <span id="characterscount">0</span> Character(s) <span id="msgcount">1</span> SMS Message(s) </label>
                                 </div>
                                 <div class="col-md-2">
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SMSEditBtn"> Edit</button> -->
                                 </div>
                             </div> 
                             <hr>

                             <div class="form-group row">
                              <label class="col-md-2 control-label" for="">Remove Duplicate </label>
                              <div class="col-md-10">
                                 <input id="" name="remove_duplicate" type="checkbox" value="2"  class="form-control">
                              </div>
                           </div>


                           <div class="form-group row">
                              <label class="col-md-2 control-label" for="">Schedule </label>
                              <div class="col-md-5">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-2"><input id="" name="schedule_radio_type" type="radio" value="0"  class="form-control" checked="Checked" onchange="schedule_radio(this);"></span>
                                          <span class="col-md-10"><label for="now">Now</label></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-2"><input id="" name="schedule_radio_type" type="radio" value="1"  class="form-control" onchange="schedule_radio(this);"></span>
                                          <span class="col-md-10"><label for="later">Later</label></span>
                                       </div>
                                    </div>
                                 </div>                                 
                              </div>
                              <div class="col-md-5"></div>
                           </div>

                           <div class="scheduledate_div" style="display:none;">
                              <div class="form-group row">
                                 <label class="col-md-2 control-label" for="scheduledate">Schedule Date </label>
                                 <div class="col-md-5">
                                    <input id="date_from" name="scheduledate" type="text"   class="form-control datetimepicker_from" placeholder="yyyy-dd-mm hh:MM TT" />
                                 </div>
                                 <div class="col-md-5"></div>
                              </div>
                           </div>
                              
                           <div class="form-group row">
                              <label class="col-md-2 control-label" for="descr">Desc </label>
                              <div class="col-md-5">
                                 <input id="" name="descr" type="text" class="form-control">
                              </div>
                              <div class="col-md-5"></div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-md-12 text-left">
                                 <button type="submit" class="btn btn-primary">Send</button>  <!-- 
                                 <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#SMSCampaignSendBtn">Send</button>   -->     
                                <!--  <button type="SUBMIT" class="btn btn-primary">Preview </button> -->
                              </div>
                           </div>
                        </fieldset>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


   <div class="modal fade show" id="SMSCampaignSendBtn" data-keyboard="false" data-backdrop="static" aria-modal="true">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
     
              <!-- Modal Header -->
            <div class="modal-header card-head">
               <div><span style="color: white; margin-left: 20px;">Confirmation</span></div>
               <button type="button" class="btn btn-dark close" data-dismiss="modal"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
            </div>
       
              <!-- Modal body -->
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12 p-3">
                        Do You Want to Send Messages!
                  </div>
               </div>
               <hr>
            </div>
             <div class="modal-footer">
               <input type="button" value="Yes" class="btn btn-primary" id="Create_SMS_Campaign_btn" />
               <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
       
         </div>
      </div>
   </div>



   <div class="modal fade show" id="SMSEditBtn" data-keyboard="false" data-backdrop="static" aria-modal="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
     
              <!-- Modal Header -->
            <div class="modal-header card-head">
               <div><span style="color: white; margin-left: 20px;">Edit Dynamic Template</span></div>
               <button type="button" class="btn btn-dark close" data-dismiss="modal"><span><i class="fa fa-times" aria-hidden="true"></i></span></button>
            </div>
       
              <!-- Modal body -->
            <div class="modal-body">
               <div class="modal-body">
                  <div class="row">
                     <label class="col-md-12" id=""> Message Template </label>
                     <div class="col-md-12">
                        <textarea id="" class="form-control" style="max-height: 120px; min-height: 120px;" name="" cols="20" rows="3" placeholder=""></textarea>
                     </div>
                     <div class="col-md-12 pt-2"><button class="btn btn-primary" name="">Edit</button></div>
                  </div>
                  
                  <div class="row" style="padding-bottom: 40px;">
                     <label class="col-md-12" id=""> Original Text </label>
                     <div class="col-md-12">
                        <textarea id="" class="form-control" style="max-height: 100px; min-height: 100px;" name="" cols="20" rows="3" placeholder=""></textarea>
                     </div>
                     <div class="col-md-12 pt-2"><button class="btn btn-primary" name="">Replace</button></div>
                  </div>
               </div>
            </div>
            
       
         </div>
      </div>
   </div>


<script type="text/javascript">
   
   	function typeUploadDate(){
      var uploadval = $('input[name="upload_radio"]:checked').val();

      	if(uploadval==0)
      	{  
         	$(".manual_entry_div").css({"display": "none"});
         	$(".contact_list_div").css({"display": "none"});
         	$(".previous_campaign_div").css({"display": "none"});
         	$(".excel_file_div").css({"display": "block"});
         	$(".dynamic_excel_file_div").css({"display": "none"});
      	}
      	if(uploadval==1)
      	{
        	$(".manual_entry_div").css({"display": "none"});
         	$(".contact_list_div").css({"display": "none"});
         	$(".previous_campaign_div").css({"display": "none"});
         	$(".excel_file_div").css({"display": "none"});
         	$(".dynamic_excel_file_div").css({"display": "block"});  
      	}
      	if(uploadval==2)
      	{
         	$(".manual_entry_div").css({"display": "block"});
         	$(".contact_list_div").css({"display": "none"});
         	$(".previous_campaign_div").css({"display": "none"});
         	$(".excel_file_div").css({"display": "none"});
         	$(".dynamic_excel_file_div").css({"display": "none"});
      	}
      	if(uploadval==3)
      	{
         	$(".manual_entry_div").css({"display": "none"});
         	$(".contact_list_div").css({"display": "block"});
         	$(".previous_campaign_div").css({"display": "none"});
         	$(".excel_file_div").css({"display": "none"});
         	$(".dynamic_excel_file_div").css({"display": "none"});
      	}
      	if(uploadval==4)
      	{
         	$(".manual_entry_div").css({"display": "none"});
         	$(".contact_list_div").css({"display": "none"});
         	$(".previous_campaign_div").css({"display": "block"});
         	$(".excel_file_div").css({"display": "none"});
         	$(".dynamic_excel_file_div").css({"display": "none"});
      	}
   	}


   	function campaign_type(){
      var campaign_typeval = $('input[name="campaign_type_radio"]:checked').val();

      	if(campaign_typeval)
      	{  
         	$(".senderID_div").css({"display": "block"});
      	}
      
   	}

   	function schedule_radio(){
    	var schedule_radioval = $('input[name="schedule_radio_type"]:checked').val();

      	if(schedule_radioval==1)   
      	{  
         	$(".scheduledate_div").css({"display": "block"});
      	}
      	else
      	{
         	$(".scheduledate_div").css({"display": "none"});
      	}
      
   	}


      function languageradios(){

         var language_radioval = $('input[name="language_radio"]:checked').val();
       
           if(language_radioval==1)   
           {  
               $(".language_div").css({"display": "block"});
           }
           else
           {
               $(".language_div").css({"display": "none"});
           }

      }


   $('.datetimepicker_from').datetimepicker({
         uiLibrary: 'bootstrap4',
         modal: true,
         format: 'yyyy-mm-dd HH:MM:ss',
         footer: true,
         
     });   

</script>