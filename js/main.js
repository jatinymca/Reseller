var page_name;
var action;
var targets;
var GSM_Gateway;

var baseurl = window.location.origin;


//setTimeout(function() { send_mail_function(); }, 5000);

// const interval = setInterval(function() {
//  send_mail_function();
// }, 5000);


// function send_mail_function(){

// 	var url="php/process_email.php";
// 	var data_html= {'action':'send_schedule_email'};

// 	$.ajax({
//      type:'POST',
//      url:url,
//      data:data_html,
//      success:function(data){
//              // record_responce(data,roll);

//          }
//      });
// }

switch(page_name) {

    case "email_request_senderid":
    load_email_sender_id();
    break;

    case "email_campaign":
    load_email_campaign();
    break;
    
    case "obd_voice":
    obd_voice_datatable();
    break;
    
    case "my_phoneBook":
    obd_voice_datatable();
    break;
    
    case "view_email_template":
    load_email_template();
    break;
    
    case "channel_setting":
    fetch_channel();
    break;

    case "email_list":
    load_email_list();
    break;

    case "emailbook_list":
        //load_sms_phonebook_group();
        break;

        case "send_email_list":
        load_send_email_list();
        break;

        case "sms_phonebook":
        load_sms_phonebook_group();
        break;

        case "sms_export_report":
        get_sms_export_report();
        break;

        case "sms_approved_api":
        load_sms_api()
        break;

        case "get_sms_api_key":
        load_sms_api_key();
        break;

        case "sms_my_campaign":
        load_sms_campaign();
        break;

        case "sms_request_senderid":
        load_sms_senderid();
        break;

        case "sms_rejected_template":
        load_reject_sms_template();
        break;

        case "sms_request_template":
        load_sms_template();
        break;

        case "obd_my_campaign":
        load_campaign();
        break;

        case "ivr_report":  
        load_data_callback();
        break;
 
        case "my_group":
        load_group();
        break;

        case "my_group_modify":
        load_audio1();
        break;
        
        case "announcement":
        load_audio();
        break;

        case "user_master":
        load_users();
        break;

        case "bill_plan_history":
        get_all_plan();
        break;

        case "obd_credit_allocation":
        obd_credit_display();
        break;
        
        case "compaign_invoice_list":
        generate_invoice();
        break;

        case "generate_invoice":
        action = "generate_invoice";
        targets = [0,7];
        break;

        case "obd_credit_allocation":
        action = "credit_allocation";
        targets = [0,7];
        break;

        case "compaign_invoice_list":
        action = "invoice_list";
        targets = [0,12];
        break;

        case "my_carrier":
        get_carrier();
        break;

        case "ivr":
        display_ivr();
        break;

        case "credit_request":
        load_credit_request();
        break;

        

       

        default:
        text = "I have never heard of that fruit..."; 
    }


    function notTyping()
    {
        var data_html= {'sessionid':session_id,'receive_id':receive_id};
        var url="{{ url('/chats/notTyping') }}";
        Ajax_call(data_html,url);

    }



    function gettemplateid(id){
        var template_id = id;
        var data_html= {'action':'gettemplatecontent','template_id':template_id};
        var url="php/html_data.php";
        get_html_data(data_html,url,'gettemplatecontent');
    }


    function send_verification_email(sender_email_address,token_url){

        var data_html= {'action':'send_verification_email','sender_email_address':sender_email_address,'token_url':token_url};
        var url="php/send_verification_email.php";
        insert_record(data_html,url,'send_verification_email');


    }




    function load_sms_campaign(){
        var data_html= {'action':'fetch_sms_campaign'};
        var url="php/html_data.php";
        get_html_data(data_html,url,'fetch_sms_campaign');
    }



//############################## Email Sender ID ############################## ////////////


function load_email_sender_id(){
  var data_html= {'action':'fetch_email_sender_id'};
  var url="php/html_data.php";
  get_html_data(data_html,url,'fetch_email_sender_id');
}


$("#add_email_sender_id").submit(function(event){
    event.preventDefault();
    var data_html=$('#add_email_sender_id').serialize()+'&action=add_email_sender_id';
    var url="controller/email_senderid_controller.php";
    insert_record(data_html,url,'add_email_sender_id');
});

function email_sender_ideditbtn(set) {

    var id=set.getAttribute('data-id');
    var name=set.getAttribute('data-name');
    var email=set.getAttribute('data-email');

    $('#edit_sender_id').val(id);  
    $('#edit_sender_name').val(name);  
    $('#edit_sender_email').val(email);  
}



$("#modify_email_sender_id").submit(function(event){
 event.preventDefault();
 var data_html=$('#modify_email_sender_id').serialize()+'&action=modify_email_sender_id';
 var url="controller/email_senderid_controller.php";
 insert_record(data_html,url,'modify_email_sender_id');
});

function email_sender_id_delete(set){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'email_sender_id_delete','sender_id':id};
   var url="controller/email_senderid_controller.php";
   insert_record(data_html,url,'email_sender_id_delete');
}





//############################## Email History ############################## ////////////

function load_send_email_list(){

   var data_html= {'action':'fetch_send_email_list'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_send_email_list');
}


//############################## Email Template ############################## ////////////


$("#add_email_template").submit(function(event){
 event.preventDefault();
 var data = CKEDITOR.instances.editor.getData();
 $('#editor12').val(data);
 var data_html=$('#add_email_template').serialize()+'&action=add_email_template';
    //console.log(data_html);

    var url="controller/email_controller.php";
    insert_record(data_html,url,'add_email_template');
});


function load_email_template(){

   var data_html= {'action':'fetch_email_template'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_email_template');
}



//############################## Email Campaign ############################## ////////////


$("#send_test_mail_form").submit(function(event){
 event.preventDefault();
 var data_html=$('#send_test_mail_form').serialize()+'&action=send_test_mail_form';
 var url="controller/email_controller.php";
 insert_record(data_html,url,'send_test_mail_form');
});

function send_unschedule_mail(){

  var url="php/process_email.php";
  var data_html= {'action':'send_unschedule_mail'};

  $.ajax({
     type:'POST',
     url:url,
     data:data_html,
     success:function(data){
                 // record_responce(data,roll);

             }
         });


}

$("#send_email_form").submit(function(event){
 event.preventDefault();
 var data_html=$('#send_email_form').serialize()+'&action=send_email_form';
 var url="controller/email_controller.php";
 insert_record(data_html,url,'send_email_form');
});

$("#create_email_form").submit(function(event){
 event.preventDefault();
 var data_html=$('#create_email_form').serialize()+'&action=create_email_form';
 var url="controller/email_controller.php";
 insert_record(data_html,url,'create_email_form');
});

function load_email_campaign(){

   var data_html= {'action':'fetch_email_campaign'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_email_campaign');
}



function gettemplateview(sel)
{       
    var template_id = sel.value;
    var data_html= {'action':'gettemplatecontent','template_id':template_id};
    var url="php/html_data.php";
    get_html_data(data_html,url,'gettemplateview'); 

}

//############################## Email Book ############################## ////////////


function load_email_list(){

   var data_html= {'action':'fetch_email_list'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_email_list');
}


$("#add_email_list").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_email_list').serialize()+'&action=add_email_list';
 var url="controller/email_controller.php";
 insert_record(data_html,url,'add_email_list');
});

function emaillisteditbtn(set) {

    var campaign=set.getAttribute('data-campaign');
    var id=set.getAttribute('data-id');
    var name=set.getAttribute('data-name');
    var descreption=set.getAttribute('data-descreption');
    var active=set.getAttribute('data-active');

    $('#campaign_id').val(campaign);  
    $('#edit_list_id').val(id);  
    $('#edit_list_name').val(name);  
    $('#edit_list_descreption').val(descreption);  
    $('#edit_active').val(active); 
}



$("#modify_email_list").submit(function(event){
 event.preventDefault();
 var data_html=$('#modify_email_list').serialize()+'&action=modify_email_list';
 var url="controller/email_controller.php";
 insert_record(data_html,url,'modify_email_list');
});

function email_list_delete(set){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'email_list_delete','list_id':id};
   var url="controller/email_controller.php";
   insert_record(data_html,url,'email_list_delete');
}


function get_email_list(sel)
{       
    var list_id = sel.value;
    var data_html= {'action':'fetch_email_listing','list_id':list_id};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_email_listing'); 

}




$("#add_email_contact").submit(function(event){

 event.preventDefault();
 var data_html=$('#add_email_contact').serialize()+'&action=add_email_contact';
 var url="controller/email_contact_controller.php";
 insert_record(data_html,url,'add_email_contact');
});


function email_contact_delete(set){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'email_contact_delete','contact_id':id};
   var url="controller/email_controller.php";
   insert_record(data_html,url,'email_contact_delete');
}


//############################## Generate SMS Report ############################## ////////////


$("#generate_report_form").submit(function(event){

    event.preventDefault();
    var data_html=$('#generate_report_form').serialize()+'&action=generate_report_form';
    var url="controller/sms_report_controller.php";
    insert_record(data_html,url,'generate_report_form');
});


function get_sms_export_report(){

   var data_html= {'action':'fetch_sms_export_report'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_sms_export_report');
}


$("#phone_no_wise_report").submit(function(event){

    event.preventDefault();
    var data_html=$('#phone_no_wise_report').serialize()+'&action=phone_no_wise_report';
    var url="php/html_data.php";
    get_html_data(data_html,url,'phone_no_wise_report');
});


//############################## SMS Request Sender ID ############################## ////////////



$("#updateOnBoarding_form").submit(function(event){

    event.preventDefault();
    var data_html=$('#updateOnBoarding_form').serialize()+'&action=updateOnBoarding_form';
    var url="controller/user_controller.php";
    insert_record(data_html,url,'updateOnBoarding_form');
});


$("#obd_my_contact").submit(function(event){ 
    event.preventDefault();
    var data_html=$('#obd_my_contact').serialize()+'&action=obd_my_contact';
    var url="php/reseller.php";
    insert_record(data_html,url,'obd_my_contact');
});

$("#caller_id_post").submit(function(event){ 
    event.preventDefault();
    var data_html=$('#caller_id_post').serialize()+'&action=caller_id_post';
    var url="php/reseller.php";
    insert_record(data_html,url,'caller_id_post');
});


//############################## SMS Request Sender ID ############################## ////////////



$("#add_sms_senderid").submit(function(event){

 event.preventDefault();
 var data_html=$('#add_sms_senderid').serialize()+'&action=add_sms_senderid';
 var url="controller/sms_senderid_controller.php";
 insert_record(data_html,url,'add_sms_senderid');
});



function load_sms_senderid(){
    var data_html= {'action':'fetch_sms_senderid'};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_sms_senderid');
}



$("#SMSSenderIDAction_form").submit(function(event){
    event.preventDefault();
    var data_html=$('#SMSSenderIDAction_form').serialize()+'&action=SMSSenderIDAction_form';
    var url="controller/sms_senderid_controller.php";
    insert_record(data_html,url,'SMSSenderIDAction_form');
});


//############################## SMS Request Template ############################## ////////////



$("#add_sms_template").submit(function(event){

 event.preventDefault();
 var data_html=$('#add_sms_template').serialize()+'&action=add_sms_template';
 var url="controller/sms_template_controller.php";
 insert_record(data_html,url,'add_sms_template');
});




function load_sms_template(){
    var data_html= {'action':'fetch_sms_template'};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_sms_template');
}

function load_reject_sms_template(){
    var data_html= {'action':'fetch_reject_sms_template'};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_reject_sms_template');
}


$("#SMSTemplateAction_form").submit(function(event){
    event.preventDefault();
    var data_html=$('#SMSTemplateAction_form').serialize()+'&action=SMSTemplateAction_form';
    var url="controller/sms_template_controller.php";
    insert_record(data_html,url,'SMSTemplateAction_form');
});



//############################## SMS API ############################## ////////////


function load_sms_api(){

   var data_html= {'action':'fetch_sms_api'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_sms_api');
}


$("#add_api_form").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_api_form').serialize()+'&action=add_sms_api';
 var url="controller/api_controller.php";
 insert_record(data_html,url,'add_sms_api');
});




function load_sms_api_key(){
    var data_html= {'action':'fetch_sms_api_key'};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_sms_api_key');
}



//############################## SMS PhoneBook ############################## ////////////


function load_sms_phonebook_group(){

   var data_html= {'action':'fetch_sms_phonebook_group'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_sms_phonebook_group');
}


$("#add_sms_phonebook_group").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_sms_phonebook_group').serialize()+'&action=add_sms_phonebook_group';
 var url="controller/sms_phonebook_controller.php";
 insert_record(data_html,url,'add_sms_phonebook_group');
});

function smsphonebookgroupeditbtn(set) {

    var id=set.getAttribute('data-id');
    var name=set.getAttribute('data-name');
    var descreption=set.getAttribute('data-descreption');
    var active=set.getAttribute('data-active');


    $('#edit_group_id').val(id);  
    $('#edit_group_name').val(name);  
    $('#edit_group_descreption').val(descreption);  
    $('#edit_active').val(active); 
}



$("#modify_sms_phonebook_group").submit(function(event){
 event.preventDefault();
 var data_html=$('#modify_sms_phonebook_group').serialize()+'&action=modify_sms_phonebook_group';
 var url="controller/sms_phonebook_controller.php";
 insert_record(data_html,url,'modify_sms_phonebook_group');
});

function sms_phonebook_group_delete(set){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'sms_phonebook_group_delete','group_id':id};
   var url="controller/sms_phonebook_controller.php";
   insert_record(data_html,url,'sms_phonebook_group_delete');
}







//############################## SMS Contact ############################## ////////////



$("#add_sms_contact").submit(function(event){

 event.preventDefault();
 var data_html=$('#add_sms_contact').serialize()+'&action=add_sms_contact';
 var url="controller/sms_contact_controller.php";
 insert_record(data_html,url,'add_sms_contact');
});




function sms_contact_delete(set){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'sms_contact_delete','contact_id':id};
   var url="controller/sms_contact_controller.php";
   insert_record(data_html,url,'sms_contact_delete');
}



function getSMS_phonebook_group_id(sel)
{   
    var group_id = sel.value;
    var data_html= {'action':'fetch_sms_contact','group_id':group_id};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_sms_contact'); 
    

}

function getSMS_phonebook_contact_list(group_id)
{   
    var group_id = group_id;
    var data_html= {'action':'fetch_sms_contact','group_id':group_id};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_sms_contact'); 
    

}


//############################## campaign ############################## ////////////

function load_campaign(){

   var data_html= {'action':'fetch_campaign'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_campaign');


}
 



$("#AddCampaign").submit(function(event){
 event.preventDefault();
 var data_html=$('#AddCampaign').serialize()+'&action=AddCampaign';
 var url="controller/campaign_controller.php";
 insert_record(data_html,url,'AddCampaign');

});

$("#obd_Reschedule").submit(function(event){  
 event.preventDefault();
 var data_html=$('#obd_Reschedule').serialize()+'&action=obd_Reschedule';
 var url="controller/campaign_controller.php";
 insert_record(data_html,url,'obd_Reschedule');

});

//######################### group ############################


function getusertype(sel)
{
    var sel_user_type = sel.value;
    var data_html= {'action':'fetch_users_type','sel_user_type':sel_user_type};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_users_type');

}



function load_group(){

   var data_html= {'action':'fetch_group'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_group');


}

function campaign_delete(set){
   if(confirm("Aru you sure you want to delete this campaign ?")){
       var id=set.getAttribute('data-id');
       var data_html= {'action':'campaign_delete','group_id':id};
       var url="controller/campaign_controller.php";
       insert_record(data_html,url,'campaign_delete');
       load_campaign();
   }
}

function reset_campaign(set){
   if(confirm("Aru you sure you want to delete this campaign?")){
       var id=set.getAttribute('data-id');
       var data_html= {'action':'reset_campaign','group_id':id};
       var url="controller/campaign_controller.php";
       insert_record(data_html,url,'reset_campaign');
   }
}



function verify_audio(set){ 
    var set=set.getAttribute('id');
        $.ajax({
     type:'POST',
     url:'php/verify_audio.php',
     data:{'set':set},
     dataType: "json",
     success:function(data){
        if(data=="0"){
            alert("un-verifed");
        }else{
            alert("verifed"); 
        }
  }
});
}


function group_delete(set){ 
   if(confirm("Aru you sure you want to delete this Audio?")){
   var id=set.getAttribute('data-id');
   var data_html= {'action':'delete_group','group_id':id};
   var url="controller/campaign_controller.php";
   insert_record(data_html,url,'group_delete');
 }
  load_audio();
}

$('#missed_call_report_search').submit(function(event){
    event.preventDefault();
    $('#missed_call_report_tab').DataTable().destroy();
    load_missed_callback();
});
$("#add_group").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_group').serialize()+'&action=add_group';
 var url="controller/campaign_controller.php";
 insert_record(data_html,url,'add_group');

});

$("#modify_group_record").submit(function(event){
 event.preventDefault();
 var data_html=$('#modify_group_record').serialize()+'&action=modify_group_record';
 var url="controller/campaign_controller.php";
 insert_record(data_html,url,'modify_group_record');

});

//##################### audio file ##########################

function load_audio1(){

   var data_html= {'action':'fetch_announcement1'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_announcement1');


}

function load_audio(){

   var data_html= {'action':'fetch_announcement'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_announcement');


}

 //################################ Credit Request ####################
 

 function load_credit_request(){
   var data_html= {'action':'fetch_credit_request'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'fetch_credit_request'); 
}

$("#add_Credit_Request").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_Credit_Request').serialize()+'&action=add_Credit_Request';
 var url="php/reseller.php";
 insert_record(data_html,url,'add_Credit_Request');

});


 //#####################  IVRS ##########################

 $("#create_ivr").submit(function(event){
 event.preventDefault();
 var data_html=$('#create_ivr').serialize()+'&action=create_ivr';
 var url="php/reseller.php";
 insert_record(data_html,url,'create_ivr');

});

 //##################### channel file ##########################

 function fetch_channel(){

   var data_html= {'action':'PRI_Card_html','trunk_type':GSM_Gateway};
   var url="configartion_gateway_ajax.php";
   get_html_data(data_html,url,'fetch_channel');


}

    function get_all_channel(trunk_type,getwayid){ 

       var data_html= {'action':'get_all_channel','trunk_type':trunk_type,'gateway_id':getwayid};
       var url="configartion_gateway_ajax.php";
       get_html_data(data_html,url,'get_all_chanel');
       $('#all_fetch_channel').show();
    }

$("#PRI_Card_form").submit(function(event){
 event.preventDefault();
 var data_html=$('#PRI_Card_form').serialize()+'&action=add_PRI_Card';
 var url="configartion_gateway_ajax.php";
 insert_record(data_html,url,'add_PRI_Card');

});
$("#add_GSM_Gateway").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_GSM_Gateway').serialize()+'&action=add_GSM_Gateway';
 var url="configartion_gateway_ajax.php";
 insert_record(data_html,url,'add_GSM_Gateway');

});
$("#add_PRI_Gateway").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_PRI_Gateway').serialize()+'&action=add_PRI_Gateway';
 var url="configartion_gateway_ajax.php";
 insert_record(data_html,url,'add_PRI_Gateway');

});
function delete_channel(trunk_type,getwayid){
    if(confirm("Aru you sure you want to delete this credits?")){
   var data_html= {'action':'delete_channel','trunk_type':trunk_type,'gateway_id':getwayid};
   var url="configartion_gateway_ajax.php";
   get_html_data(data_html,url,'get_all_chanel');
   fetch_channel();
}
}
function get_carrier(){
   var data_html= {'action':'fetch_carrier'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'get_all_carrier');

}

function display_ivr(){
   var data_html= {'action':'display_ivr'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'get_all_ivr'); 
}

$("#add_carrier").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_carrier').serialize()+'&action=add_carrier';
 var url="php/reseller.php";
 insert_record(data_html,url,'add_carrier');
 //get_carrier();
});


function delete_carrier(id){ 
    if(confirm("Aru you sure you want to delete this credits?")){
   var data_html= {'action':'delete_carrier','delete_id':id};
   var url="php/reseller.php";
   get_html_data(data_html,url,'get_all_chanel');
   get_carrier();
 }
}

function delete_ivr(id){
    if(confirm("Aru you sure you want to delete this credits?")){
   var data_html= {'action':'delete_ivr','delete_id':id};
   var url="php/reseller.php";
   get_html_data(data_html,url,'get_all_chanel');
   display_ivr();
 }
}

//#######################  voice plan ##############################
$("#addplan").submit(function(event){
 event.preventDefault();
 var data_html=$('#addplan').serialize()+'&action=add_plan';
 var url="php/reseller.php";
 insert_record(data_html,url,'add_plan');

});

$("#add_credit").submit(function(event){
 event.preventDefault();
 var data_html=$('#add_credit').serialize()+'&action=add_credit';
 var url="php/reseller.php";
 insert_record(data_html,url,'add_credit');

});

function get_all_plan(){ 
   var data_html= {'action':'fetch_billplan'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'get_plan'); 
} 

// jatin7sep 
function obd_credit_display(){ 
   var data_html= {'action':'obd_credit_display'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'obd_credit_display'); 
}

// function obd_voice(){ 
//    var data_html= {'action':'obd_voice'};
//    var url="php/html_data.php";
//    get_html_data(data_html,url,'obd_voice'); 
// }

function generate_invoice(){ 
   var data_html= {'action':'generate_invoice'};
   var url="php/html_data.php";
   get_html_data(data_html,url,'generate_invoice'); 
}  

function deleteplan(delete_id){
    if(confirm("Aru you sure you want to delete this user?")){
        var data_html= {'action':'delete_plan','delete_id':delete_id};
        var url="controller/user_controller.php";
        insert_record(data_html,url,'delete_user');
    }
}


//Alok 
$("#user_form").submit(function(event){
    event.preventDefault();
    var url="controller/user_controller.php";
    var data = new FormData(this);
    
    $.ajax({
        type        : 'POST', 
        url         : url,
        data        : data,
        dataType    : 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function (result) {
            if(result.Response==200){
                alert(result.message);
                location.reload();
            }else{
                alert(result.message);
            }
        }
    });
});

$("#obd_report_generate").submit(function(event){
    event.preventDefault();
    var url="controller/user_controller.php";
    var data = new FormData(this);
    
    $.ajax({
        type        : 'POST', 
        url         : url,
        data        : data,
        dataType    : 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function (result) {
            if(result.Response==200){
                alert(result.message);
                location.reload();
            }else{
                alert(result.message);
            }
        }
    });
});


$("#valid_from1").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_till1").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_from2").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_till2").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_from3").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_till3").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_from4").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_till4").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  
$("#valid_from5").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  

$("#valid_till5").datepicker({  
    showWeek:true,  
    yearSuffix:"-CE",  
    showAnim: "explode"  
});  
$("#datepicker-2").datepicker({  
 showWeek:true,  
 yearSuffix:"-CE",  
 showAnim: "explode"  
});  
$("#datepicker-1").datepicker({  
 showWeek:true,  
 yearSuffix:"-CE",  
 showAnim: "explode"  
});  

$("#strt-1").datepicker({  
 showWeek:true,  
 yearSuffix:"-CE",  
 showAnim: "explode"  
});  


function load_users(){
    var data_html= {'action':'fetch_users'};
    var url="php/html_data.php";
    get_html_data(data_html,url,'fetch_users');
}

// function load_users(){
//     var data_html= {'action':'fetch_users'};
//     var url="php/html_data.php";
//     get_html_data(data_html,url,'fetch_users');
// }
function deleteuser(delete_id){
    if(confirm("Aru you sure you want to delete this user?")){
        var data_html= {'action':'delete_user','delete_id':delete_id};
        var url="controller/user_controller.php";
        insert_record(data_html,url,'delete_user');
    }
}
// jatin
function delete_billplan(delete_id){
    if(confirm("Aru you sure you want to delete this bill plan?")){
        var data_html= {'action':'delete_billplan','delete_id':delete_id};
        var url="controller/user_controller.php";
        insert_record(data_html,url,'delete_billplan');
    }
}

function delete_credits(delete_id){
    if(confirm("Aru you sure you want to delete this credits?")){
        var data_html= {'action':'delete_credits','delete_id':delete_id};
        var url="controller/user_controller.php";
        insert_record(data_html,url,'delete_credits');
    }
    obd_credit_display();
}

function get_html_data(data_html,url,roll){ 
    $.ajax({
     type:'POST',
     url:url,
     data:data_html,
     success:function(data){
      record_responce(data,roll);

  }
});
}
function insert_record(data_html,url,roll){ 
    $.ajax({
     type:'POST',
     url:url,
     data:data_html,
     dataType: "json",
     success:function(data){
      record_responce(data,roll);

  }
});
}


function record_responce(data,roll){
    console.log(data);
    console.log(roll);

    if(roll=='fetch_credit_request'){
      $('#get_credit_request').html(data);
  }        

  if(roll=='fetch_sms_campaign'){
    $('#sms_my_campaign').html(data);
}

if(roll=='ivr_report'){
    $('#ivr_report').html(data);
}

if(roll=='obd_credit_display'){
    $('#obd_credit_display').html(data);
}

if(roll=='add_email_sender_id'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_request_senderid';                
        send_verification_email(data.sender_email_address,data.token_url);
    }
    else{
     alert(data.message);
 }
}

if(roll=='obd_my_contact'){

    if(data.response_code=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=my_contacts';          
    }
    else{
     alert(data.message);
 }
}

if(roll=='fetch_email_sender_id'){
    $('#fetch_email_sender_data').html(data);
}

if(roll=='generate_invoice'){
    $('#generate_invoice').html(data);
}

if(roll=='modify_email_sender_id'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_request_senderid';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='email_sender_id_delete'){ 
    if(data.Response=='200'){
        alert(data.message);
        load_email_sender_id(); 
    }
    else{
     alert(data.message);
 }
}

if(roll=='fetch_send_email_list'){
   $('#fetch_send_email').html(data);
} 



if(roll=='send_test_mail_form'){
    if(data.Response=='200'){
        send_unschedule_mail();
        alert(data.message);
        $('#send_test_mail_modal').modal('hide'); 
    }
    else{
     alert(data.message);
 }
}


if(roll=='send_email_form'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_campaign';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='gettemplateview'){
  if (data == ""){
    $("#showtemplate").css({"border": ""});
}
else{
    $('#showtemplate').html(data);
    $("#showtemplate").css({"border": "2px solid black"});
}  

} 

if(roll=='gettemplatecontent'){
    $('#template_content_preview').html(data);
} 

if(roll=='add_email_template'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_request_template';                
    }
    else{
     alert(data.message);
 }
}  

if(roll=='modify_group_record'){
    if(data.response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=modify_group_record';                
    }
    else{
     alert(data.message);
 }
}


if(roll=='fetch_email_template'){
    $('#fetch_email_template').html(data);
}


if(roll=='create_email_form'){
    if(data.response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_campaign';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='add_Credit_Request'){
    if(data.response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=credit_request';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='fetch_email_campaign'){
    $('#fetch_email_campaign').html(data);
}

if(roll=='fetch_reject_sms_template'){
    $('#fetch_reject_sms_template').html(data);

}


if(roll=='fetch_email_list'){
    $('#fetch_email_list').html(data);

}

if(roll=='add_email_list'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_list';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='modify_email_list'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=email_list';                
    }
    else{
     alert(data.message);
 }
}




if(roll=='email_list_delete'){

    if(data.Response=='200'){
        alert(data.message);
        load_email_list();

    }
    else{
     alert(data.message);
 }

}

if(roll=='add_email_contact'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=emailbook_list';                
    }
    else{
     alert(data.message);
 }
}


if(roll=='fetch_email_listing'){
    $('#fetch_email_contact').html(data);
}


if(roll=='fetch_users_type'){
    $('#fetch_user_id').html(data);
}


if(roll=='generate_report_form'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=sms_generate_report';                
    }
    else{
     alert(data.message);
 }
}

if(roll=='fetch_sms_export_report'){
  $('#sms_export_report').html(data);
}

if(roll=='phone_no_wise_report'){  
    $('#fetch_phoneno_wise__report').html(data);
}

if(roll=='updateOnBoarding_form'){
    if(data.Response=='200'){
        alert(data.message);
        window.location.href = 'index.php?page_name=user_onboarding';                
    }
    else{
     alert(data.message);
 }
}


if(roll=='add_sms_senderid'){
    if(data.Response=='200'){
        alert(data.message); 
        window.location.href = 'index.php?page_name=sms_request_senderid'; 
        load_sms_senderid();             
    }
    else{
     alert(data.message);
 }
}

if(roll=='SMSSenderIDAction_form'){
    if(data.Response=='200'){
        alert(data.message);                
        load_sms_senderid();

    }else{
     alert(data.message);
 }
}

if(roll=='getsmstemplatecontent'){

    var trimdata = $.trim(data);
    $('#temp_content').val(trimdata);
    $('#temp_content').html(trimdata);
    alert_temp_content();
}


if(roll=='fetch_sms_senderid'){
  $('#fetch_sms_senderid').html(data);
}


if(roll=='add_sms_template'){
    if(data.Response=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=sms_request_template'; 
        load_sms_template();

    }else{
     alert(data.message);
 }
}

if(roll=='create_ivr'){
    if(data.response=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=user_onboarding'; 
       

    }else{
     alert(data.message);
 }
}

if(roll=='fetch_sms_template'){
  $('#fetch_sms_template').html(data);
}

// if(roll=='obd_voice'){
//   $('#obd_voice').html(data);
// }


if(roll=='add_sms_contact'){
    if(data.Response=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=sms_contact';

    }else{
     alert(data.message);
 }
}

if(roll=='obd_Reschedule'){
    if(data.response=='200'){
        alert(data.message);     

    }else{
     alert(data.message);
 }
}


if(roll=='caller_id_post'){
    if(data.response=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=user_onboarding';  

    }else{
     alert(data.message);
 }
}

if(roll=='SMSTemplateAction_form'){
    if(data.Response=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=sms_request_template'; 
        load_sms_template();

    }else{
     alert(data.message);
 }
}

if(roll=='add_PRI_Gateway'){
    if(data.response_code=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=channel_setting'; 
        load_sms_template();

    }else{
     alert(data.message);
 }
}
if(roll=='add_GSM_Gateway'){
    if(data.response_code=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=channel_setting'; 
        load_sms_template();

    }else{
     alert(data.message);
 }
}

if(roll=='add_PRI_Card'){
    if(data.response_code=='200'){
        alert(data.message);                
        window.location.href = 'index.php?page_name=channel_setting'; 
        load_sms_template();

    }else{
     alert(data.message);
 }
}

if(roll=='fetch_sms_contact'){
  $('#fetch_sms_contact_group').html(data);
}

if(roll=='sms_contact_delete'){

    if(data.Response=='200'){
        alert(data.message);
        var group_id = $('#sms_phonebook_group_id').find(":selected").val();
        getSMS_phonebook_contact_list(group_id);

    }else{
     alert(data.message);
 }

}



if(roll=='add_sms_api'){
   if(data.Response=='200'){
     alert(data.message);
               $('#AddAPI_model').modal('hide'); // Hide modal
               load_sms_api();
           }else{
             alert(data.message);
              $('#AddAPI_model').modal('show'); // Hide modal
          }

      }

      if(roll=='fetch_sms_api'){
          $('#fetch_api_data').html(data);
      }

      if(roll=='fetch_sms_api_key'){
          $('#fetch_api_key').html(data);
      }


      if(roll=='add_sms_phonebook_group'){
       if(data.Response=='200'){
         alert(data.message);
               $('#AddSMSPhonebookGroup_model').modal('hide'); // Hide modal
               load_sms_phonebook_group();
           }else{
             alert(data.message);
              $('#AddSMSPhonebookGroup_model').modal('show'); // Hide modal
          }

      }


      if(roll=='modify_sms_phonebook_group'){
       if(data.Response=='200'){
         alert(data.message);
               $('#ModifySMSPhonebookGroup_model').modal('hide'); // Hide modal
               load_sms_phonebook_group();
           }else{
             alert(data.message);
              $('#ModifySMSPhonebookGroup_model').modal('show'); // Hide modal
          }

      }

      if(roll=='fetch_sms_phonebook_group'){
          $('#fetch_sms_phonebook_group').html(data);
      }

      if(roll=='sms_phonebook_group_delete'){

        if(data.Response=='200'){
            alert(data.message);
            load_sms_phonebook_group();
        }else{
         alert(data.message);
     }

 }


 if(roll=='AddCampaign')
 {
   if(data.Response=='200'){
     alert(data.message);
               $('#myModal1').modal('hide'); // Hide modal
               load_campaign();
           }else{
             alert(data.message);
              $('#myModal1').modal('show'); // Hide modal
          }

      }
      if(roll=='fetch_campaign'){
          $('#fetch_campaign').html(data);
      }
/// group 


if(roll=='add_credit'){
   if(data.response=='200'){
     alert(data.message); 
       window.location.href ='?page_name=obd_credit_allocation'; 
 }else{
     alert(data.message);
 }

}

if(roll=='add_group'){
   if(data.Response=='200'){
     alert(data.message);
               $('#AddGroup_model').modal('hide'); // Hide modal
               load_group();
           }else{
             alert(data.message);
              $('#AddGroup_model').modal('show'); // Hide modal
          }

      }
 //      if(roll=='group_delete'){
 //       if(data.response=='200'){
 //         alert(data.message);
 //         load_audio();
 //     }else{
 //         alert(data.message);

 //     }

 // }

 if(roll=='fetch_group'){
  $('#fetch_group').html(data);
}

        // audio file 

        if(roll=='fetch_announcement'){
          $('#fetch_announcement').html(data);
      }

        if(roll=='fetch_announcement1'){
          $('#fetch_announcement1').html(data);
      }
      if(roll=='fetch_channel'){

          $('#fetch_channel').html(data);

      }
      if(roll=='get_all_chanel'){

          $('#all_fetch_channel').html(data);

      }
      if(roll=='get_all_carrier'){

          $('#fetch_carrier').html(data);

      } 

      if(roll=='get_all_ivr'){

          $('#display_ivr').html(data);

      } 

      if(roll=='add_carrier'){
          if(data.response=='200'){
            alert(data.message);
            window.location.href ='?page_name=my_carrier';
        }
        else{
            alert(data.message);
        }


    } 

         //Alok
         if(roll=='fetch_users'){
          $('#fetch_users').html(data);
      }

      if(roll=='delete_user'){
          if(data.Response=='200'){
              alert(data.message);
              load_users();
          }else{
              alert(data.message);
          }
      }
      if(roll=='delete_billplan'){
          if(data.Response=='200'){
              alert(data.message);
              location.reload();
             // load_users();
         }else{
          alert(data.message);
      }
  }
      //  if(roll=='delete_credits'){
      //     if(data.Response=='200'){
      //         alert(data.message);
      //         location.reload();
      //        // load_users();
      //     }else{
      //         alert(data.message);
      //     }
      // }

      if(roll=='fetch_credit_alloction'){
        $('#fetch_credit_alloction').html(data);
    }
    
    if(roll=='add_plan'){
        $('#fetch_credit_alloction').html(data);
        alert(data.message);
        $('#add_bill_plan').hide();
        $('.close').click();
        get_all_plan();
    }

    if(roll=='get_plan'){
        $('#get_all_plan').html(data);
    }
      //Alok

 // if(roll='modify_group_record'){ 
 //  alert();
 // }



}

$(document).ready( function () {
    $('#usertable').DataTable({
        "order": [],
        "aoColumnDefs": [
        { 
            "bSortable": false, 
                "aTargets": [0,7,8] // <-- gets last column and turns off sorting
            } 
            ]
        });
});

$(document).ready( function () {
    $('#datatable').DataTable({
        "order": [],
        "aoColumnDefs": [
        { 
            "bSortable": false, 
                "aTargets": [0,7,8] // <-- gets last column and turns off sorting
            } 
            ]
        });
}); 

function audio_modal(audio_id)
{
  $("#hide_audio_id").val(audio_id);
  $('#audio_model').modal('show');
}

function audio_chooser(audio_name){
    var hide_audio_id = $("#hide_audio_id").val();
    if(hide_audio_id=='audio_1'){
        $("#play_file_name_one").val(audio_name);
    }
    if(hide_audio_id=='audio_2'){
        $("#play_file_name_two").val(audio_name);
    }
    if(hide_audio_id=='audio_3'){
        $("#play_file_name_three").val(audio_name);
    }
    if(hide_audio_id=='audio_4'){
        $("#play_file_name_four").val(audio_name);
    }
    if(hide_audio_id=='audio_5'){
        $("#play_file_name_five").val(audio_name);
    }
    if(hide_audio_id=='audio_6'){
        $("#play_file_name_six").val(audio_name);
    }
    $('#audio_model').modal('hide');
}


 //alert(datatablename);
 load_data();

 function load_data()
 {

    var dataTable = $("#"+action).DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
          url:"datatable/datatables.php?action="+action,
          type:"POST",
      },
      "columnDefs":[
      {
          "targets":targets,
          "orderable":false,
      },
      ],
      "createdRow": function (row, data, index) {
          var info = dataTable.page.info();
          $('td', row).eq(0).html(index + 1 + info.page * info.length);
      },
  });
}





/*
$("#Create_SMS_Campaign_btn").click(function() {
    */

    $("#CreateSMSCampaign").submit(function(event){

        event.preventDefault();
        var url="controller/create_sms_campaign_controller.php";
        var data = new FormData(this);
   // var data=$('#CreateSMSCampaign').serialize();

   $.ajax({
    type        : 'POST', 
    url         : url,
    data        : data,
    dataType    : 'json',
    contentType: false,
    cache: false,
    processData:false,
    success: function (result) {
        console.log(result);
        if(result.Response==200){
            alert(result.message);
            location.reload();
        }else{
            alert(result.message);
        }
    }
});
});


/*
});
*/




function downloadlink(sel) {
    var sel_user_type = sel;        
    var data_html= {'action':'report_download','report_id':sel_user_type};
    var url="php/downloadreport.php";

    window.location.href = 'php/downloadreport.php?report_id='+sel_user_type; 


        /*$.ajax({
           type:'POST',
           url:url,
           data:data_html,
           success:function(data){
             console.log("result");

           }
       });*/


   } 



   function getsendemaildata(){
      test_sender_id =   $("#email_sender_id").val();
      test_template_id=  $("#template_id").val();

      $("#input_test_mail_email_sender_id").val(test_sender_id);
      $("#select_test_mail_email_sender_id").val(test_sender_id);
      $("#input_test_mail_template_id").val(test_template_id);
      $("#select_test_mail_template_id").val(test_template_id); 
  }

  function download_missed_report(){
      var extension =   $("#extension").val();      
      var start_time_ivr=  $(".start_time_ivr").val();
      var end_time_ivr=  $(".end_time_ivr").val();
      var url='missed_call_report_download.php';
     $.ajax({
         type:'POST',
         url:url,
         data:{'extension':extension,'start_time':start_time_ivr,'end_time':end_time_ivr},
         success:function(data){
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(data);
                hiddenElement.target = '_blank';
                
                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'missed_call_report.csv';
                hiddenElement.click();
                 }
             });

  }

  function getsmstemplate(sel)
  {       
    var template_id = sel.value;
    var data_html= {'action':'getsmstemplatecontent','template_id':template_id};
    var url="php/html_data.php";
    get_html_data(data_html,url,'getsmstemplatecontent'); 
}


function characterscount()
{  
  alert_temp_content();
}


function alert_temp_content()
{  
 temp_content =  $("#temp_content").val();
 total_length = temp_content.length;

 $("#characterscount").html(total_length);

 total_numof_sms = total_length/160;


 if (total_numof_sms == Math.floor(total_numof_sms)) {
   $("#msgcount").html(total_numof_sms);
} 
else{
   total_numof_sms = Math.floor(total_numof_sms)+1;
   $("#msgcount").html(total_numof_sms);
}


}

function gettemplateactionid(set) {
    var template_id=set.getAttribute('data-id');
    $('#SMSTemplateAction_id').val(template_id);  
}

function getsenderactionid(set) {
    var sender_id=set.getAttribute('data-id');
    $('#SMSSenderIDAction_id').val(sender_id);  
}


function phone_wise_csv_report(){
  var data =  $('#fetch_phoneno_wise__report').html();  
  console.log(data);

}
 function load_data_callback(){  
    $('#dynamic_table_callback').DataTable().destroy();
    load_data_callback1();
 }
 
   function load_data_callback1()
         {
           var dataTable = $('#dynamic_table_callback').DataTable({
           autoWidth:false,
           "pageLength":10, 
           "order":[],
           "ajax":{
           url:"datatable/dynamic_table.php?action=ivr_report",
           type:"POST",
           data:
             { 
              }
           },
           "columnDefs":[
             {
             "targets":[2],
             "orderable":false,
             },
           ],
           });
           
         }


  function obd_voice_datatable()
         {
           var dataTable = $('#obd_voice_datatable').DataTable({
            autoWidth:false,
           "pageLength":10, 
           "processing":true,
           "serverSide":true,
           "bLengthChange":false,
           "bFilter":false,
           "ordering":false,
           "order":[],
           "ajax":{
           url:"datatable/dynamic_table.php?action=obd_voice",
           type:"POST",
           data:
             { 
              }
           },
           "columnDefs":[
             {
             "targets":[2],
             "orderable":false,
             },
           ],
           });
           
         }

      function load_missed_callback()
         {  
            var extension=$('#extension').val();
            var end_time=$('.end_time_ivr').val();
            var start_time=$('.start_time_ivr').val();
           var dataTable = $('#missed_call_report_tab').DataTable({
            autoWidth:false,
           "pageLength":10, 
           "order":[],
           "ajax":{
           url:"datatable/dynamic_table.php?action=missed_call_report",
           type:"POST",
           data:
             { 
                'start_time':start_time,
                'end_time':end_time,
                'extension':extension,

              }
           },
           "columnDefs":[
             {
             "targets":[2],
             "orderable":false,
             },
           ],
           });
           
         }
