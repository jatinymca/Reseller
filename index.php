<?php
require('configuration/c_config.php');
require('configuration/function.php');
require('permission.php');


if (isset($_GET["page_name"]))       {$page_name=$_GET["page_name"];}
elseif (isset($_POST["page_name"]))  {$page_name=$_POST["page_name"];}
if (isset($_GET["group_id"]))       {$group_id=$_GET["group_id"];}
elseif (isset($_POST["group_id"]))  {$group_id=$_POST["group_id"];}
if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}
if (isset($_GET["request_login_id"]))       {$request_login_id=$_GET["request_login_id"];}
elseif (isset($_POST["request_login_id"]))  {$request_login_id=$_POST["request_login_id"];}

switch ($page_name) {

   case 'dashboard':
   $page_name_include='dashboard.php';
   $menu_name='dashboard';
         //$sub_menu_name='campaign';
       //  $thrd_menu_name='userprofile';
   break;

   case 'email_campaign':
   $page_name_include='email_campaign.php';
   $menu_name='Email';
   $sub_menu_name='campaign';
       //  $thrd_menu_name='userprofile';
   break;

   case 'sendemail':
   $page_name_include='sendemail.php';
   $menu_name='Email';
   $sub_menu_name='campaign';
       //  $thrd_menu_name='userprofile';
   break;
   

   case 'email_request_senderid':
   $page_name_include='email_request_senderid.php';
   $menu_name='Email';
   $sub_menu_name='Request';
         //$thrd_menu_name='userprofile';
   break;
   
   case 'email_request_template':
   $page_name_include='email_request_template.php';
   $menu_name='Email';
   $sub_menu_name='Request';
         //$thrd_menu_name='userprofile';
   break;

   case 'email_request_templatedemo':
   $page_name_include='email_request_templatedemo.php';
   $menu_name='Email';
   $sub_menu_name='Request';
         //$thrd_menu_name='userprofile';
   break;

   case 'view_email_template':
   $page_name_include='view_email_template.php';
   $menu_name='Email';
   $sub_menu_name='Request';
       //  $thrd_menu_name='userprofile';
   break;
   
   case 'email_list':
   $page_name_include='email_list.php';
   $menu_name='Email';
   $sub_menu_name='EmailBook';
         //$thrd_menu_name='userprofile';
   break;

   case 'emailbook_list':
   $page_name_include='emailbook_list.php';
   $menu_name='Email';
   $sub_menu_name='EmailBook';
         //$thrd_menu_name='userprofile';
   break;

   case 'send_email_list':
   $page_name_include='send_email_list.php';
   $menu_name='Email';
   $sub_menu_name='EmailHistory';
         //$thrd_menu_name='userprofile';
   break;


   case 'bill_plan_history':
   $page_name_include='bill_plan_history.php';
   $menu_name='USER';
   $sub_menu_name='manage';
   $thrd_menu_name='userprofile';
   break;

   case 'obd_credit_allocation':
   $page_name_include='obd_credit_allocation.php';
   $menu_name='USER';
   $sub_menu_name='manage';
   $thrd_menu_name='userprofile';
   break;

   case 'user_onboarding':
   $page_name_include='user_onboarding.php';
   $menu_name='USER';
   $sub_menu_name='manage';
   $thrd_menu_name='user_onboarding';
   break;


   case 'obd_my_campaign':
   $page_name_include='obd_my_campaign.php';
   $menu_name='OBD';
   $sub_menu_name='campaign';
   $thrd_menu_name='mycampaign'; 
   break;

   case 'my_group':
   $page_name_include='my_group.php';
   $menu_name='OBD';
   $sub_menu_name='campaign';
   $thrd_menu_name='mygroup';
   break;
   case 'survey':
   $page_name_include='survey.php';
   $menu_name='OBD';
   $sub_menu_name='campaign';
   $thrd_menu_name='survey';
   break;

   case 'my_group_modify':
   $page_name_include='my_group_modify.php';
   $menu_name='OBD';
   $sub_menu_name='campaign';
   $thrd_menu_name='mygroup';
   break;

   case 'announcement':
   $page_name_include='announcement.php';
   $menu_name='OBD';
   $sub_menu_name='contacts';
   $thrd_menu_name='mycampaign';
   break;
   case 'my_contacts':
   $page_name_include='my_contacts.php';
   $menu_name='OBD';
   $sub_menu_name='contacts';
   $thrd_menu_name='mycampaign';

   break;	
   case 'channel_setting':
   $page_name_include='channel_setting.php';
   $menu_name='OBD';
   $sub_menu_name='contacts';
   $thrd_menu_name='mycampaign';
   break;		

   case 'user_profile':
   $page_name_include='user_profile.php';
   $menu_name='USER';
   $sub_menu_name='manage';
   $thrd_menu_name='userprofile';
   break;

   case 'user_master':
   $page_name_include='user_master.php';
   $menu_name='USER';
   $sub_menu_name='manage';
   $thrd_menu_name='userprofile';
   break;		



   case 'my_phoneBook':
   $page_name_include='my_phoneBook.php';
   $menu_name='OBD';
   $sub_menu_name='phonebook';
   $thrd_menu_name='userprofile';
   break;
   case 'my_carrier':
   $page_name_include='my_carrier.php';
   $menu_name='setting';
   $sub_menu_name='manage';
   $thrd_menu_name='my_carrier';
   break;	

   case 'compaign_invoice_list':
   $page_name_include='obd_invoice.php';
   $menu_name='OBD';
   $sub_menu_name='Report';
   $thrd_menu_name='obd_invoice';
   break;  

   case 'voice_invoice_list':
   $page_name_include='voice_invoice_list.php';
   $menu_name='OBD';
   $sub_menu_name='Report';
   $thrd_menu_name='invoice_list';
   break; 



   case 'create_sms_campaign':
   $page_name_include='create_sms_campaign.php';
   $menu_name='SMS';
   $sub_menu_name='campaign';
   $thrd_menu_name='create_sms_campaign';
   break;

   case 'sms_my_campaign':
   $page_name_include='sms_my_campaign.php';
   $menu_name='SMS';
   $sub_menu_name='campaign';
   $thrd_menu_name='sms_my_campaign';
   break; 

   case 'sms_my_campaign':
   $page_name_include='sms_my_campaign.php';
   $menu_name='SMS';
   $sub_menu_name='campaign';
   $thrd_menu_name='sms_my_campaign';
   break; 

   case 'sms_export_report':
   $page_name_include='sms_export_report.php';
   $menu_name='SMS';
   $sub_menu_name='Report';
   $thrd_menu_name='sms_export_report';
   break; 

   case 'sms_generate_report':
   $page_name_include='sms_generate_report.php';
   $menu_name='SMS';
   $sub_menu_name='Report';
   $thrd_menu_name='sms_generate_report';
   break; 

   case 'sms_request_senderid':
   $page_name_include='sms_request_senderid.php';
   $menu_name='SMS';
   $sub_menu_name='Request';
   $thrd_menu_name='sms_request_senderid';
   break;   

   case 'sms_request_template':
   $page_name_include='sms_request_template.php';
   $menu_name='SMS';
   $sub_menu_name='Request';
   $thrd_menu_name='sms_request_template';
   break;                  


   case 'sms_rejected_template':
   $page_name_include='sms_rejected_template.php';
   $menu_name='SMS';
   $sub_menu_name='Approvals';
   $thrd_menu_name='sms_rejected_template';
   break;                  


   case 'sms_phonebook':
   $page_name_include='sms_phonebook.php';
   $menu_name='SMS';
   $sub_menu_name='PhoneBook';
   $thrd_menu_name='sms_phonebook';
   break; 

   case 'sms_contact':
   $page_name_include='sms_contact.php';
   $menu_name='SMS';
   $sub_menu_name='PhoneBook';
   $thrd_menu_name='sms_contact';
   break;


   case 'sms_approved_api':
   $page_name_include='sms_approved_api.php';
   $menu_name='SMS';
   $sub_menu_name='Account';
   $thrd_menu_name='sms_approved_api';
   break;

   case 'get_sms_api_key':
   $page_name_include='get_sms_api_key.php';
   $menu_name='SMS';
   $sub_menu_name='Account';
   $thrd_menu_name='get_sms_api_key';
   break;   



   case 'sms_bill_plan_history':
   $page_name_include='sms_bill_plan_history.php';
   $menu_name='SMS';
   $sub_menu_name='BillPlan';
   $thrd_menu_name='sms_bill_plan_history';
   break; 


   case 'sms_link_manager':
   $page_name_include='sms_link_manager.php';
   $menu_name='SMS';
   $sub_menu_name='Manage';
   $thrd_menu_name='sms_link_manager';
   break; 


   case 'sms_link_dashboard':
   $page_name_include='sms_link_dashboard.php';
   $menu_name='SMS';
   $sub_menu_name='Manage';
   $thrd_menu_name='sms_link_dashboard';
   break;

   case 'credit_request':
   $page_name_include='credit_request.php';
   $menu_name='Request';
   $sub_menu_name='manage';
   $thrd_menu_name='credit_request';
   break;

   case 'obd_export_reports':
   $page_name_include='obd_export_reports.php';
   $menu_name='OBD';
   $sub_menu_name='Report';
   $thrd_menu_name='obd_export_reports';
   break;  

   case 'obd_generate_reports':
   $page_name_include='obd_generate_reports.php';
   $menu_name='OBD';
   $sub_menu_name='Report';
   $thrd_menu_name='obd_generate_reports';
   break;

   case 'obd_voice':
   $page_name_include='obd_voice.php';
   $menu_name='OBD';
   $sub_menu_name='Report';
   $thrd_menu_name='report';
   break;

   case 'ivr':
   $page_name_include='ivr.php'; 
   $menu_name='ivr';
   $sub_menu_name='Report';
   break;

   case 'create_ivr':
   $page_name_include='create_ivr.php'; 
   break;
   case 'ivr':
   $page_name_include='ivr.php'; 
   $menu_name='ivr';
   $sub_menu_name='Report';
   break;

   case 'missed_call_report':
   $page_name_include='missed_call_report.php'; 
   $menu_name='Report';
   $sub_menu_name='';
   break;

   case 'ivr_report':
   $page_name_include='ivr_report.php'; 
   $menu_name='Report';
   $sub_menu_name='';
   break;

    case 'Reschedule':
   $page_name_include='Reschedule.php'; 
   $menu_name=' ';
   $sub_menu_name='';
   break;
   
   default:
   $page_name_include='dashboard.php';
   $menu_name='';
   $sub_menu_name='';
   $thrd_menu_name='';

   break;



}






?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php';?>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
      <?php include 'include/header.php';?> 
      <!-- end header -->
      <!-- start color quick setting -->

      <!-- end color quick setting -->
      <!-- start page container -->
      <div class="page-container">
         <!-- start sidebar menu -->
         <?php include 'include/left_menu.php';?>
         <!-- end sidebar menu -->
         <!-- start page content -->
         <div class="page-content-wrapper">
           <div class="page-content">

             <?php 

             include $page_name_include;


             ?>


          </div>
       </div>


    </div>
    <script type="text/javascript">
     var page_name='<?php echo $page_name; ?>';
 //  console.log(page_name);
</script>
<?php include 'include/footer.php';?>
<!-- end js include path -->
</body>
</html>