<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Create Email Campaign</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Create Email Campaign</a>
               </li>               
            </ol>                         
         </div>
         <div class="card-body">
            
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal row" action="" id="create_email_form" method="post">
                     <div class="col-md-12 mt-3 fadeInLeft animated">
                        <fieldset>                      

                           <input type="hidden" name="action" value="Create_Email_Campaign">          
                           

                           <!-- <div class="form-group row">
                              <label class="col-md-3 control-label" for="">Language </label>
                              <div class="col-md-4">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="language_radio" type="radio" value="0"  class="form-control" checked="Checked"></span>
                                          <span class="col-md-9"><label for="english">English</label></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="row">
                                          <span class="col-md-3"><input id="" name="language_radio" type="radio" value="2"  class="form-control"></span>
                                          <span class="col-md-9"><label for="multiLingual">MultiLingual</label></span>
                                       </div>
                                    </div>
                                 </div>                                 
                              </div>
                              <div class="col-md-5"></div>
                           </div>
 -->
                           

                           <div class="form-group row">
                              <label class="col-md-2 control-label" for="">Campaign Name* </label>
                              <div class="col-md-5">
                                 <input type="text" name="campaign_name" class="form-control" placeholder="Campaign Name">
                              </div>
                              <div class="col-md-5"></div>
                           </div>
                           <!-- <div class="senderID_div" style="display:none;">
                              <div class="form-group row">
                                 <label class="col-md-3 control-label" for="senderid">SenderID</label>
                                 <div class="col-md-5">
                                    <select class="form-control" name="senderid">
                                       <option value="">Select SenderID</option>
                                       <option value="GOMRKT">GOMRKT</option>
                                    </select>
                                 </div>
                                 <div class="col-md-4"></div>
                              </div>
                           </div> -->
                              
                           <!-- <div class="form-group row">
                              <label class="col-md-3 control-label" for="sms_template">SMS Content </label>
                              <div class="col-md-5">
                                 <select class="form-control" name="sms_template">
                                    <option value="">Select Template</option>
                                    <option value="Login">Login</option>
                                 </select>
                              </div>
                              <div class="col-md-4"></div>
                           </div> -->

                           <!-- <div class="form-group row">
                                 <div class="col-md-3">
                                    <textarea id="" class="form-control" readonly style="min-height: 100px; max-height: 100px;color:red;" cols="20" rows="3" placeholder="">(160 characters are counted as 1 SMS in case of English language and 70 in other language. Check your SMS count before pushing SMS)</textarea>
                                 </div>
                                 <div class="col-md-5">
                                    <textarea id="" class="form-control" style="max-height: 120px; min-height: 120px;" name="sms_text_content" cols="20" rows="3" placeholder=""></textarea>
                                    <label id=""> 0 Character(s) 1 SMS Message(s) </label>
                                 </div>
                                 <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SMSEditBtn"> Edit</button>
                                 </div>
                             </div>  -->

                             <hr>

                           
                           
                           <div class="form-group row">
                              <div class="col-md-12 text-left">
                                 <button type="submit" class="btn btn-primary">Save</button>  
                              </div>
                           </div>
                        </fieldset>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div class="card card-box">
         <div class="card-head">
            <header>Manage Email Campaign</header>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage Email</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                           -->
                        <table class="table table-striped" id="example4">
                           <thead>
                              <tr role="row">
                                 <th> Campaign ID </th>
                                 <th> Campaign Name </th>
                                 <th>Create Date </th>
                                 <th> Username </th>
                                 <th> Action </th>
                              </tr>
                           </thead>
                           <tbody id="fetch_email_campaign">
                              

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <br>
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
</script>