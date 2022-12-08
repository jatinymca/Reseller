<?php

   if (isset($_GET["campaign_id"]))       {$campaigns_id=$_GET["campaign_id"];}
   elseif (isset($_POST["campaign_id"]))  {$campaigns_id=$_POST["campaign_id"];}


      $email_query = "SELECT * FROM `email_campaign` where id='$campaigns_id' and username='$login_id'";    
      $email_res = mysqli_query($conn, $email_query);
      
      while($email_row=mysqli_fetch_array($email_res)){

        $campaign_id=$email_row['id'];
        $campaign_name=$email_row['campaign_name'];
      }

      

?>

   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card card-box">
      <div class="card-head">
        <header>Send Email</header>
        <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
          <li>
            <i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a class="parent-item" href="" style="color:#fff">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a class="parent-item" href="" style="color:#fff">Send Email</a>
          </li>               
        </ol>                         
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal row" action="" id="send_email_form" method="post">
              <div class="col-md-12 mt-3 fadeInLeft animated">
                <fieldset>                                                 
                  <div class="form-group row">
                    <label class="col-md-3 control-label" for="">Campaign Name </label>
                      <div class="col-md-5">
                        <input type="hidden" name="campaign_id" value="<?php echo $campaign_id; ?>">
                        <input type="text" value="<?php echo $campaign_name; ?>" readonly class="form-control" >
                      </div>
                    <div class="col-md-4"></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 control-label" for="">List Name (Total Email Address) </label>
                    <div class="col-md-5">
                      <div class="row">
                        <?php

                        $list_query="SELECT count(emailcontact.contact_id) as totalemailaddress,emaillist.list_id,emaillist.list_name FROM `email_contact` as emailcontact inner join email_list as emaillist inner join email_campaign as emailcamp where emailcamp.id=emaillist.email_campaign_id and emaillist.list_id=emailcontact.list_id and emailcontact.username='$login_id' and emailcamp.id='$campaign_id' GROUP by emaillist.list_id";

                          $list_res = mysqli_query($conn, $list_query);
                           while($list_row=mysqli_fetch_array($list_res)){

                               $totalemailaddress=$list_row['totalemailaddress'];
                               $list_name=$list_row['list_name'];
                               $list_id=$list_row['list_id'];

                               echo '<div class="col-md-6"><input type="checkbox" name="list_id[]" value="'.$list_id.'"> <span>'.$list_name.'('.$totalemailaddress.')</span></div>';
                            }
                          ?>
                      </div>  
                    </div>
                    <div class="col-md-4"></div>
                   </div>


                           <div class="form-group row">
                              <label class="col-md-3 control-label" for=""> Select Sender ID  </label>
                              <div class="col-md-5">
                                 <select class="form-control" id="email_sender_id" name="email_sender_id" >
                                    <option value="">Select Sender ID</option>
                                    <?php

                                       $verify_email_query = "SELECT * FROM `email_sender_id` where status='1' and username='$login_id'";    
                                       $verify_email_res = mysqli_query($conn, $verify_email_query);
                                        while($verify_email_row=mysqli_fetch_array($verify_email_res)){

                                            $email_sender_id=$verify_email_row['id'];
                                            $from_name=$verify_email_row['from_name'];
                                            $from_email_address=$verify_email_row['from_email_address'];

                                            echo '<option value="'.$email_sender_id.'">'.$from_email_address.'</option>';
                                         }

                                    ?>
                                 </select>
                              </div>
                              <div class="col-md-4"></div>
                           </div>

                           <div class="form-group row">
                              <label class="col-md-3 control-label" for=""> Select Template  </label>
                              <div class="col-md-5">
                                 <select class="form-control" id="template_id" name="template_id" onchange="gettemplateview(this);" >
                                    <option value="">Select Template</option>
                                    <?php

                                       $email_query = "SELECT * FROM `email_template` where  username='$login_id'";    
                                       $email_res = mysqli_query($conn, $email_query);
                                        while($email_row=mysqli_fetch_array($email_res)){

                                            $template_id=$email_row['id'];
                                            $templatename=$email_row['templatename'];

                                            echo '<option value="'.$template_id.'">'.$templatename.'</option>';
                                         }

                                    ?>
                                 </select>
                              </div>
                              <div class="col-md-4"></div>
                              <div class="col-md-3"></div>
                              
                              <div class="col-md-5" id="showtemplate">
                                 
                              </div>

                              <div class="col-md-4"></div>
                           </div>

                             <hr>

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
                                  <button type="submit" class="btn btn-primary">Send Mail</button>
                                  <button type="button" class="btn btn-primary" id="send_test_mail_btn" data-toggle="modal" data-target="#send_test_mail_modal" onclick="getsendemaildata();" > Send Test Mail </button>     
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







<div class="modal fade" id="send_test_mail_modal" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header card-head">
        <h4 class="modal-title  ml-2">Send Test Mail</h4>
        <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
      </div>
         <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-box">
              <form action="" method="post" id="send_test_mail_form">
                <div class="form-group row">
                   <div class="col-md-9">
                     <p>Showing data here what you select in back page.</p>
                   </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 control-label" for="">Campaign Name </label>
                  <div class="col-md-9">
                    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id; ?>">
                    <input type="text" value="<?php echo $campaign_name; ?>" readonly class="form-control" >
                  </div>
                </div>  
                <div class="form-group row">
                  <label class="col-md-3 control-label" for="">Enter Email Address*</label>
                  <div class="col-md-9">
                    <div class="row">
                      <input type="text" name="test_mail_email_address" id="test_mail_email_address" placeholder="Enter Email Address" class="form-control" >
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 control-label" for=""> Select Sender ID  </label>
                  <div class="col-md-9">
                    <input type="hidden" name="email_sender_id" id="input_test_mail_email_sender_id">
                    <select class="form-control" disabled  id="select_test_mail_email_sender_id" >
                      <option value="">Select Sender ID</option>
                        <?php

                           $verify_email_query = "SELECT * FROM `email_sender_id` where status='1' and username='$login_id'";    
                           $verify_email_res = mysqli_query($conn, $verify_email_query);
                            while($verify_email_row=mysqli_fetch_array($verify_email_res)){

                                $email_sender_id=$verify_email_row['id'];
                                $from_name=$verify_email_row['from_name'];
                                $from_email_address=$verify_email_row['from_email_address'];

                                echo '<option value="'.$email_sender_id.'">'.$from_email_address.'</option>';
                             }

                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 control-label" for=""> Select Template  </label>
                  <div class="col-md-9">
                    <input type="hidden" name="template_id" id="input_test_mail_template_id">
                    <select class="form-control" disabled  id="select_test_mail_template_id">
                      <option value="">Select Template</option>
                        <?php

                          $email_query = "SELECT * FROM `email_template` where  username='$login_id'";    
                          $email_res = mysqli_query($conn, $email_query);
                          
                          while($email_row=mysqli_fetch_array($email_res)){

                            $template_id=$email_row['id'];
                            $templatename=$email_row['templatename'];

                            echo '<option value="'.$template_id.'">'.$templatename.'</option>';
                          }

                        ?>
                    </select>
                  </div>
                </div>
                <hr>
                
                <div class="form-group row">
                  <div class="col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                  </div>
                </div>
              </form>
            </div>
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


    $('.datetimepicker_from').datetimepicker({
         uiLibrary: 'bootstrap4',
         modal: true,
         format: 'yyyy-mm-dd HH:MM:ss',
         footer: true,
         
     });


</script>