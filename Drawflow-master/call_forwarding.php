<?php 
require('../configuration/c_config.php');

if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}
if (isset($_GET["node"]))       {$node=$_GET["node"];}
elseif (isset($_POST["node"]))  {$node=$_POST["node"];}



$Sql_Query="SELECT * FROM `vertage_call_forwarding` WHERE IVR_id='$request_id' and Node_id='$node'";
$res = mysqli_query($conn, $Sql_Query);
$row=mysqli_fetch_array($res);
$count=mysqli_num_rows($res);
if($count>0){

  $node_name=$row['call_forwarding']; 
  $fromm=$row['fromm']; 
  $Phone_number=$row['Phone_number']; 
  $send_digits=$row['send_digits']; 
  $ring_timeout_call=$row['ring_timeout_call']; 
  $event_callback=$row['event_callback']; 
  $event_callback_url=$row['event_callback_url'];  
  $forwarding_option=$row['forwarding_option'];  
  $Acd_call_forwarding=$row['Acd_call_forwarding'];   

}else{
  $node_name='Initiate Call_'.$node;

} 

?>
<div class="card tabs-nav">
  <ul>
    <li class="head_panel active">
      <a href="#tab1">Configuration</a>
    </li>
    <li class="head_panel">
      <a href="#tab2">Information</a>
    </li>
  </ul>
  <a class="btn-closed" href="#!" onclick="hide()">X</a>
  <!-- Tab panes -->
  <section class="tabs-content">
    <div id="tab1" class="show">
      <form class="get-input-form"  id="get_call_forwarding">
        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">Name</label>

          <input  type="hidden"   placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true"> 
          <input type="hidden" id="IVR_id" name="IVR_id" value="<?php echo $request_id; ?> ">
          <input type="hidden" id="NODE_id" name="NODE_id" value="<?php echo $node; ?> ">

          <input name="call_forwarding" type="text" value="<?php echo $node_name; ?>" placeholder="Enter value"
          class="_field-value form-control form-control-sm" aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">From</label>
          <input name="fromm" type="text" placeholder="Enter value"  value="<?php if(isset($fromm)){echo $fromm; } ?>" class="_field-value form-control form-control-sm"
          aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

          <div class="form-group ">
          <label id="action-label" class="right-label _field-label">Acd-call-forwarding</label>
        <div class="radio_xml">
              <div id="input-feedback" class="invalid-feedback"> 
            <input type="radio" id="RrMemory" name="Acd_call_forwarding" value="RrMemory"<?php echo ($Acd_call_forwarding== 'RrMemory') ?  "checked" : ""?> >
            <label for="RrMemory">RrMemory</label>
            <input type="radio" id="RingAll" name="Acd_call_forwarding" value="RingAll"  <?php echo ($Acd_call_forwarding== 'RingAll') ?  "checked" : ""?> >
            <label for="RingAll">RingAll</label><br>
            <input type="radio" id="RoundRobin" name="Acd_call_forwarding" value="RoundRobin" <?php echo ($Acd_call_forwarding== 'RoundRobin') ?  "checked" : ""?> >
            <label for="RoundRobin">RoundRobin</label>
            <input type="radio" id="Random" name="Acd_call_forwarding" value="Random"<?php echo ($Acd_call_forwarding== 'Random') ?  "checked" : ""?> >
            <label for="Random">Random</label>
          </div>
       </div>
        </div>

        <div class="form-group">
          <div class="bv-no-focus-ring">
            <label id="timeout-label" class="_field-label mt-4">To</label> 
            <div class="input_fields_wrap delete_php">
              <button class="add_field_button">Add More Phone Number </button><!-- 

              <div class=" addInput flex"><input type="text" name="phone_text" value="<?php if(isset($Phone_number)){echo $Phone_number; } ?>" placeholder="Phone Number"  class="_field-value form-control form-control-sm"></div> -->
              <?php 
               $Sql_Query1="SELECT `phone_text`,`priority` FROM `vertage_call_forwarding_phoneno` WHERE IVR_id='$request_id' and Node_id='$node'";
              $res1 = mysqli_query($conn, $Sql_Query1); 
              $count=mysqli_num_rows($res1);
              if($count>0){
                while ($row1=mysqli_fetch_array($res1)) { 
                  $phone_text=$row1['phone_text'];    
                  $priority=$row1['priority'];   ?>

               <div class=" addInput flex"><select name="priority[]"><option selected value="<?php if(isset($priority)){echo $priority; } ?>"><?php echo $priority; ?></option><option value="1">1</option><option value="2">  2</option><option value="3"> 3</option><option value="4"> 4</option><option value="5"> 5</option><option value="5"> 5</option><option value="7"> 7</option><option value="8"> 8</option><option value="9"> 9</option></select><input type="text" id="input_val"name="phone_text[]" value="<?php if(isset($phone_text)){echo $phone_text; } ?>" placeholder="Phone Number"  class="_field-value form-control form-control-sm"><a href="#" class="remove_field delete">X</a></div>
               
             <?php    } }?>
           </div> 

         </div>
       </div>

       <div class="form-group">
        <div class="bv-no-focus-ring">
          <div class="_field-label form-check">
            <input type="checkbox" name="interrupt" class="form-check-input" value="true">
            <label class="form-check-label"> Validate Caller ID </label>
          </div>
        </div>
      </div>
      <div class="form-group">

        <div class="bv-no-focus-ring">
          <label id="action-label" class="right-label _field-label">Settings</label>
          <div>

            <div class="form-group mb-0 ml-2">

              <div class="bv-no-focus-ring">
                <label id="timeout-label" class="_field-label"> Disconnect call after ringing for
                (seconds)</label>
                <input id="timeout" name="ring_timeout_call" type="number" value="<?php if(isset($ring_timeout_call)){echo $ring_timeout_call; } ?>"
                class="inline small-input _field-value form-control form-control-sm" data-vv-id="_ho7oa7pd7"
                aria-required="true" aria-invalid="false">
                <div id="input-feedback" class="invalid-feedback">
                </div>


              </div>
            </div>
            <div class="form-group mb-0 ml-2">

              <div class="bv-no-focus-ring">
                <label class="_field-label">Make calls to multiple destinations in</label>
                <select
                name="forwarding_option" class="inline _field-value custom-select custom-select-sm" placeholder="">
                <option value="<?php if(isset($forwarding_option)){echo $forwarding_option; } ?> ">  <?php echo $forwarding_option; ?>     </option>
                <option value="sequential">sequence</option>
                <option value="parallel">parallel</option>
              </select>

            </div>
          </fieldset>

        </div>

      </div>
    </div>
    <div class="form-group">
      <div class="bv-no-focus-ring">
        <div class="mt-3 mb-3 mr-0 ml-0">
          <span class="_field-label"><strong> Record Calls </strong></span>
          <div role="radiogroup" class="_field-label d-inline bv-no-focus-ring">
            <div class="form-check form-check-inline">
              <input type="radio" name="tab" value="igotnone" onclick="Always();">
              <label class="form-check-label">Always </label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="tab" value="igotnone" onclick="Dynamic();">
              <label class="form-check-label">Dynamic</label>
            </div>
          </div>
        </div>
        <div class="mt-2" data-vv-id="_y1jpy2nmi" aria-required="true" aria-invalid="false">
          <div id="record-value" class="form-group _field-label">

            <div id="Dynamic" class="bv-no-focus-ring ">
              <div size="sm" class="_field-value">
                <div class="complete-box">
                  <input autocomplete="off" name="alwy_dynamic_url" placeholder="The audio will record only if this variable is true"
                  rows="1" class="v-textcomplete__inner form-control textcomplete" c style="line-height: 20px;">
                </div>
              </div>
              <div id="input-feedback" class="invalid-feedback"></div>
            </div>
          </div>
        </div>
      </div>
    </div>



    

    <div class="right-action-container">
      <div class="form-group mt-4">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <button type="submit" id="ivr_menu_data" class="btn __btn-uno position-relative btn-secondary">
            <span>Validate</span>
            <div class="v-spinner" style="display: none;">
              <div class="v-pulse v-pulse1" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.12s;"></div>
              <div class="v-pulse v-pulse2" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.24s;"></div>
              <div class="v-pulse v-pulse3" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.36s;"></div>
            </div>
          </button>
          <button type="button" class="btn ml-2 __btn-dos _stroked btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div id="tab2" class="show hide">
  <h3>Call Forward</h3>
  <p>Node 1 : Answered </p>
  <p>Node 2 : No-Answered </p>
  <p>Node 3 : Busy/Reject </p>
  <p>Node 4 : Failed </p>

  <h1>Automatic Call Distribution</h1>

  <p><b>Rotational call distribution :</b> Call is distributed on rotational way like first caller is attended by first agent , second caller is attended by second agent , and so on This strategy is commonly used when call center want agents to have equal volumes of workload.</p>

  <p><b>Fixed order call distribution:</b> In this type the calls are distributed to first agents on the list and sent to the next agent if the previous one is busy. This strategy is good if the agents are more experienced and can resolve the issue faster than others.</p>

  <p><b>Simultaneous call distribution :</b> In this , all the agents received the incoming call at the same time and the first agent that picks the call attend the customer. This strategy is preferred when the call center want to reduce the waiting time.</p>

  <p><b>Talk-time call distribution: </b>The systems select the agent with the least talk time and assign the next call in the queue. This help to balance the workload between the team and making sure each agent has worked an equal amount of time</p>

  <p><b>Time-based call distribution:</b> This type of distribution assign the calls based on agents’ availability. The system will alert only to agents that are available and route the call directly or send to voicemail if no agents are available. This is good , If the call center prefers not to take calls after office hours.</p>

  <p><b>Skills-based routing:</b> In skills-based routing, the ACD prioritizes an agent based on certain skill sets like language proficiency, efficiency, expertise, response time and so on. With this routing strategy, callers will be routed directly to the agent with the most relevant skills.</p>
</div>
</section>
</div>
<script>

 $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper         = $(".input_fields_wrap"); //Fields wrapper 
  var add_button      = $(".add_field_button"); //Add button ID
  var NODE_id         = $('#NODE_id').val();
  var IVR_id         = $('#IVR_id').val();
  console.log(NODE_id);
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="addInput flex"><select id="select_value" name="priority[]"><option value="1" > 1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select><input type="text" name="phone_text[]" placeholder="Phone Number"  class="_field-value form-control form-control-sm"/><a href="#" class="remove_field">X</a></div>'); //add input box
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault();
     x--;
      var id=$(this).parent('div').children('#input_val').val();
     // var select_id=$(this).parent('div').children('#select_value').val();
      
      delete_num(id,NODE_id,IVR_id);
    $(this).parent('div').remove();

  })

  
});
</script>