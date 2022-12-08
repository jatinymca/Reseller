<?php
   require_once('../inc/config.php');
   $pageName = "Report";
   $menu = "obd";
   $submenu = "obd_call_report";
   
    if(!isset($_SESSION['act_user'])){
       $_SESSION['toast']['msg']="Please log In to continue.";
       header('location:sign-in.php');
       exit();
   }
    
   
   ?>
<!DOCTYPE html>
<html lang=en>
   <head>
      <title><?php echo $pageName;?> |   Admin Panel</title>
      <?php include_once("includes/head.php"); ?>
   </head>
   <body>
      <div class="loader-bg"></div>
      <div class="loader">
         <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
               <div class="circle-clipper left">
                  <div class="circle"></div>
               </div>
               <div class="gap-patch">
                  <div class="circle"></div>
               </div>
               <div class="circle-clipper right">
                  <div class="circle"></div>
               </div>
            </div>
            <div class="spinner-layer spinner-teal lighten-1">
               <div class="circle-clipper left">
                  <div class="circle"></div>
               </div>
               <div class="gap-patch">
                  <div class="circle"></div>
               </div>
               <div class="circle-clipper right">
                  <div class="circle"></div>
               </div>
            </div>
            <div class="spinner-layer spinner-yellow">
               <div class="circle-clipper left">
                  <div class="circle"></div>
               </div>
               <div class="gap-patch">
                  <div class="circle"></div>
               </div>
               <div class="circle-clipper right">
                  <div class="circle"></div>
               </div>
            </div>
            <div class="spinner-layer spinner-green">
               <div class="circle-clipper left">
                  <div class="circle"></div>
               </div>
               <div class="gap-patch">
                  <div class="circle"></div>
               </div>
               <div class="circle-clipper right">
                  <div class="circle"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="mn-content fixed-sidebar">
         <?php include_once("includes/navigation.php"); ?>
         <main class="mn-inner inner-active-sidebar">
            <div class="row no-m-t no-m-b">
               <div class="col s4 m4 l4">
                  <div class="card">
                     <div class="card-content">
                        <span class="card-title">  Channel Trunk Total  <span style="font-size: 22px;"> <?php $smtp=" SELECT count(*) as total FROM channel_config_gateway ";
                                    $dataQ1 = mysqli_query($conn,$smtp);
                                    $row=mysqli_fetch_assoc($dataQ1);
                                   echo $count=$row['total'];

                                    ?></span></span>
                        <form  id="trunk_type_form">
                           <div class="row">
                              <div class="input-field col s12 m12 l12">
                                 <select class="form-control" id="trunk_type" name="trunk_type" onchange="select_trunk()">
                                    <option value="">Select trunk</option>
                                    <option value="PRI_Card" >PRI Card</option>
                                    <option value="IAX2" >IAX2</option>
                                    <option value="GSM_Gateway" >GSM Gateway</option>
                                    <option value="PRI_Gateway" >PRI Gateway</option>
                                 </select>
                              </div>
                              <div class="input-field col s12 m12 l12">
                                   <button type="submit" class="btn theme-bg waves-effect waves-light"> Search</button> 
               
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col s4 m4 l4 section" id="PRI_Card_section" style="display: none;">
                  <div class="card" style="padding: 20px; text-align: left;">
                     <span class="card-title">PRI Card Configuration </span>
                     <form action="" method="POST" id="PRI_Card_form">
                        <div class="col s6 m6 l6form-group">
                           <label for="email">Enter Start Pilot No</label>
                           <input type="text" class="form-control" placeholder="Enter PRI Pilot No" id="pilot_no" name="pilot_no" required="" >
                        </div>
                        <div class=" col s6 m6 l6form-group">
                           <label for="email">Enter End Pilot No</label>
                           <input type="text" class="form-control" placeholder="Enter PRI Pilot No" id="pilot_no_end" name="pilot_no_end" required="" >
                        </div>
                         <div class="form-group">
                           <label for="email">Channel Name</label>
                           <input type="text" class="form-control" placeholder="Channel Name" name="channel_name"  id="channel_name" required="" value="">
                        </div>
                        <div class="form-group">
                           <label for="email">Group:</label>
                           <select class="form-control"  id="group_no" name="group_no" required="">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                           </select>
                        </div>
                        
                        <div class="form-group">
                           <label for="email">No Of Channel</label>
                           <input type="number" class="form-control" placeholder="No Of Channel" name="channel_number"  id="channel_number" required="" value="0">
                        </div>
                         <div class="form-group">
                           <label for="prefix">Prefix</label>
                           <input type="number" class="form-control" placeholder="Prefix" name="prefix"  id="prefix"   value="0">
                        </div> 
                        <button type="submit" class="btn btn-default">Submit</button>
                     </form>
                  </div>
               </div>
               <div class="col s4 m4 l4 section" id="GSM_Gateway_section" style="display: none;">
                  <div class="card" style="padding: 20px; text-align: left;">
                     <span class="card-title">GSM Gateway Configuration </span>
                     <form action="" id="GSM_Gateway_form">
                        <div class="form-group">
                           <label for="email">Enter SIP NO </label>
                           <input type="text" class="form-control" placeholder="Enter SIP No" id="SIP_no" name="SIP_no" >
                        </div>
                        <div class="form-group">
                           <label for="email">Channel Name</label>
                           <input type="text" class="form-control" placeholder="Channel Name" name="channel_name"  id="channel_name" required="" value="">
                        </div>
                        <div class="form-group">
                           <label for="email">Group:</label>
                           <select class="form-control"  id="group_no" name="group_no">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="email">No Of Channel</label>
                           <input type="number" class="form-control" placeholder="No Of Channel" name="channel_number"  id="channel_number" value="0">
                        </div>
                        <div class="form-group">
                           <label for="prefix">Prefix</label>
                           <input type="number" class="form-control" placeholder="Prefix" name="prefix"  id="prefix"   value="0">
                        </div> 
                        <div class="form-group">
                           <label for="gateway_ip">Gateway IP</label>
                           <input type="text" class="form-control" placeholder="Gateway IP" name="gateway_ip"  id="gateway_ip" value="" required="">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                     </form>
                  </div>
               </div>
               <div class="col s4 m4 l4 section" id="PRI_Gateway_section" style="display: none;">
                  <div class="card" style="padding: 20px; text-align: left;">
                     <span class="card-title">PRI Gateway Configuration </span>
                     <form action="" id="PRI_Gateway_form">
                        <div class="form-group">
                           <label for="email">Enter SIP NO </label>
                           <input type="text" class="form-control" placeholder="Enter SIP No" id="SIP_no" name="SIP_no" >
                        </div>
                        <div class="form-group">
                           <label for="email">Channel Name</label>
                           <input type="text" class="form-control" placeholder="Channel Name" name="channel_name"  id="channel_name" required="" value="">
                        </div>
                        <div class="form-group">
                           <label for="email">Group:</label>
                           <select class="form-control"  id="group_no" name="group_no">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="email">No Of Channel</label>
                           <input type="number" class="form-control" placeholder="No Of Channel" name="channel_number"  id="channel_number" value="0" required="">
                        </div>
                        <div class="form-group">
                           <label for="prefix">Prefix</label>
                           <input type="number" class="form-control" placeholder="Prefix" name="prefix"  id="prefix"   value="0">
                        </div> 
                        <div class="form-group">
                           <label for="email">Gateway IP</label>
                           <input type="text" class="form-control" placeholder="Gateway IP" name="gateway_ip"  id="gateway_ip" value="" required="">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
             <div class="row no-m-t no-m-b">
              <div class="col s12 m12 l12">
                <div class="card">
                  <div class="card-content">
                    <div class="responsive-table"  id="table_html">
      
                  </div>
                  </div>
           
                  
                </div>
              
            </div>
          </div>
         </main>
      </div>
      <?php include_once("includes/scripts.php"); ?>    
      <?php include_once("../inc/functions.php"); ?>  
      <script type="text/javascript">
         var trunk_type_name;
           function select_trunk(){
            trunk_type_name=$('#trunk_type').val();
                $('.section').hide();
                $('#'+trunk_type_name+'_section').show();
           }
         
            $('#trunk_type_form').on('submit', function(e) {
               e.preventDefault();
            var data_html= $('#trunk_type_form').serialize()+'&action=PRI_Card_html';
             form_post_ajax(data_html);
           });
         
             $('#PRI_Card_form').on('submit', function(e) {
               e.preventDefault();
            var data_html= $('#PRI_Card_form').serialize()+'&action=add_PRI_Card&trunk_type='+trunk_type_name;
             form_post_ajax(data_html);
           });
             $('#GSM_Gateway_form').on('submit', function(e) {
               e.preventDefault();
            var data_html= $('#GSM_Gateway_form').serialize()+'&action=add_GSM_Gateway&trunk_type='+trunk_type_name;
             form_post_ajax(data_html);
           });
         
          $('#PRI_Gateway_form').on('submit', function(e) {
               e.preventDefault();
            var data_html= $('#PRI_Gateway_form').serialize()+'&action=add_PRI_Gateway&trunk_type='+trunk_type_name;
             form_post_ajax(data_html);
           });
            function  form_post_ajax(data_html){
           var returnValue;
                $.ajax({
               url: 'configartion_gateway_ajax.php',
               type: 'post',
               data: data_html,
               success: function(response){
                  
                  $('#table_html').html(response);
                  alert('successfully');
                 
                   }
               
             });
              
           }
          
      </script>
   </body>
</html>