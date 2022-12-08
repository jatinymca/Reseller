<?php 
require('../configuration/c_config.php');

if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}
if (isset($_GET["node"]))       {$node=$_GET["node"];}
elseif (isset($_POST["node"]))  {$node=$_POST["node"];}

$Sql_Query="SELECT * FROM `vertage_initial_call` WHERE IVR_id='$request_id' and Node_id='$node'";
$res = mysqli_query($conn, $Sql_Query);
$row=mysqli_fetch_array($res);
$count=mysqli_num_rows($res);
if($count>0){

  $node_name=$row['initial_call']; 
  $fromm=$row['fromm']; 
  $too=$row['too']; 
  $send_digits=$row['send_digits']; 
  $ring_timeout=$row['ring_timeout']; 
  $event_callback=$row['event_callback']; 
  $event_callback_url=$row['event_callback_url']; 

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
      <form class="get-input-form" id="get_initial_call">
        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">Name</label>
          <input  type="hidden"   placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true"> 
          <input type="hidden" name="IVR_id" value="<?php echo $request_id; ?> ">
          <input type="hidden" name="NODE_id" value="<?php echo $node; ?> ">

          <input name="initial_call" value="<?php echo $node_name; ?>" type="text" placeholder="Enter value"
          class="_field-value form-control form-control-sm" aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">From</label>
          <input  type="text" name="fromm" value="<?php if(isset($fromm)){echo $fromm; } ?>" placeholder="Enter value" class="_field-value form-control form-control-sm"
          aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group">
          <div tabindex="-1" role="group" class="bv-no-focus-ring">
            <label id="timeout-label" class="_field-label mt-4">To</label>
            <textarea rows="4" name="too" value="<?php if(isset($too)){echo $too; } ?>" cols="50" class="form-control">
            </textarea>
            <div id="input-feedback" class="invalid-feedback"></div>
            <div class="invalid-feedback-save"></div>
          </div>
        </div>
        <div class="form-group">
          <div tabindex="-1" role="group" class="bv-no-focus-ring">
            <div class="_field-label form-check">
              <input type="checkbox" name="interrupt" class="form-check-input" value="true">
              <label class="form-check-label"> Validate Caller ID </label>
            </div>
          </div>
        </div>
        <div class="form-group">

          <div tabindex="-1" role="group" class="bv-no-focus-ring">
            <label id="action-label" class="right-label _field-label">Settings</label>
            <div>
              <div aria-describedby="" class="form-group mb-0 ml-2">

                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                  <label id="timeout-label" class="_field-label"> Send as input when call is answered</label>
                  <input id="timeout" name="send_digits" value="<?php if(isset($send_digits)){echo $send_digits; } ?>" type="text" class="inline small-input _field-value form-control form-control-sm"
                  data-vv-id="_aw4fgexbw"
                  aria-required="false" aria-invalid="false">
                  <div id="input-feedback" class="invalid-feedback">
                  </div>
                  <div class="invalid-feedback-save"></div>

                </div>
              </div>
              <div aria-describedby="" class="form-group mb-0 ml-2">

                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                  <label id="timeout-label" class="_field-label"> Disconnect call after ringing for
                  (seconds)</label><input id="timeout" name="ring_timeout" value="<?php if(isset($ring_timeout)){echo $ring_timeout; } ?>" type="number"
                  class="inline small-input _field-value form-control form-control-sm" data-vv-id="_ho7oa7pd7"
                  aria-required="true" aria-invalid="false">
                  <div id="input-feedback" class="invalid-feedback">
                  </div>
                  <div class="invalid-feedback-save"></div>

                </div>
              </div>
              <div aria-describedby="" class="form-group mb-0 ml-2">

                <div tabindex="-1" role="group" class="bv-no-focus-ring">

                  <div class="_field-label form-check"><input type="checkbox" name="detect_voicemail"
                    class="form-check-input" value="true" id="__BVID__351"><label class="form-check-label"
                    for="__BVID__351">
                    Enable Voicemail Detection
                  </label>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="form-group">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <div class="mt-3 mb-3 mr-0 ml-0">
            <span class="_field-label"><strong> Record Calls </strong></span>
            <div role="radiogroup" tabindex="-1" class="_field-label d-inline bv-no-focus-ring">
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
            <div id="record-value" aria-describedby="" class="form-group _field-label">

              <div id="Dynamic" class="bv-no-focus-ring ">
                <div size="sm" class="_field-value">

                  <div class="complete-box">
                    <input autocomplete="off" placeholder="The audio will record only if this variable is true"
                    rows="1" class="v-textcomplete__inner form-control textcomplete" c style="line-height: 20px;">

                  </div>
                </div>
                <div id="input-feedback" class="invalid-feedback"></div>

              </div>
            </div>
            <div class="complete-box">
              <label id="action-label" class="right-label _field-label">Custom Headers</label>
              <textarea id="v-textcomplete-6nkkz2ii" rows="4" class="v-textcomplete__inner textcomplete"
              style="line-height: 20px;"></textarea>

            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <div value="[object Object]">
            <h4 class="mt-4 mb-4 ml-0 _section-label">Event Callbacks</h4>
            <div class="steps events-url-steps">
              <ul class="steps-wrapper">
                <li class="steps-item head-step">
                  <span class="step-label">Event URL</span>
                </li>
                <li class="steps-item">
                  <div class="card auto-width-tabs">
                    <div class="card auto-width-tabs">
                      <div class="card-body">
                        <div role="group" class="input-group flex">
                          <div class="input-group-prepend">
                            <select class="_field-value event-type-selector custom-select custom-select-sm" name="event_callback">
                             <option value="<?php if(isset($event_callback)){echo $event_callback; } ?> ">  <?php echo $event_callback; ?>     </option>
                             <option value="all">all</option>
                             <option value="digits">digits</option>
                           </select>
                         </div>
                         <div class="_field-value " aria-required="false" aria-invalid="false">
                          <div class="complete-box">
                            <input id="text" autocomplete="off" placeholder="Enter a Url" rows="1" value="<?php if(isset($event_callback_url)){echo $event_callback_url; } ?>"  name="event_callback_url"
                            class="v-textcomplete__inner textcomplete" style="line-height: 20px;">
                            <div id="autocomplete-97apqryo" class="autocomplete transition" style="display: none;">
                              <ul div></ul>
                            </div>
                          </div>
                        </div>
                        <div class="invalid-feedback" style="display: none;"> Please provide a valid url or variable
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="steps-item">
                  <span class="step-label _add disabled"> + Add Event </span>
                </li>
              </ul>
              <div class="invalid-feedback-save"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="right-action-container">
        <div class="form-group mt-4">
          <div tabindex="-1" role="group" class="bv-no-focus-ring">
            <button type="submit" class="btn __btn-uno position-relative btn-secondary">
              <span>Validate</span>
              <div class="v-spinner" style="display: none;">
                <div class="v-pulse v-pulse1"
                style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.12s;">
              </div>
              <div class="v-pulse v-pulse2"
              style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.24s;">
            </div>
            <div class="v-pulse v-pulse3"
            style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.36s;">
          </div>
        </div>
      </button>
      <button type="button" class="btn ml-2 __btn-dos _stroked btn-secondary">Cancel</button>
    </div>
  </div>
</div>
</form>
</div>
<div id="tab2" class="show hide">
  <h3>Initiate Call</h3>
  <p>Node 1 : Answered </p>
  <p>Node 2 : No-Answered </p>
  <p>Node 3 : Busy/Reject </p>
  <p>Node 4 : Failed </p>

  <samp>Initiate call component makes a single call or bulk outbound calls to Phone numbers or SIP endpoints.</samp>

</div>
</section>
</div>
