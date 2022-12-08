<?php 
require('../configuration/c_config.php');

if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}
if (isset($_GET["node"]))       {$node=$_GET["node"];}
elseif (isset($_POST["node"]))  {$node=$_POST["node"];}

$Sql_Query="SELECT * FROM `vertage_ivr_menu` WHERE IVR_id='$request_id' and Node_id='$node'";
$res = mysqli_query($conn, $Sql_Query);
$row=mysqli_fetch_array($res);
$count=mysqli_num_rows($res);
if($count>0){
  $node_name=$row['ivr_menu_name'];
  $input_timeout=$row['input_timeout'];
  $allowed_input=$row['allowed_input'];
  $audio=$row['audio'];
  $input_timeout=$row['input_timeout'];
  $language=$row['language'];
  $text_speak=$row['text_speak'];
  $gender=$row['gender'];
  $Wait_second_prompt=$row['Wait_second_prompt'];
  $event_callback=$row['event_callback'];
  $event_callback_url=$row['event_callback_url'];
}else{
  $node_name='IVR Menu_'.$node;

} 

$allowed_input_array=explode(',', $allowed_input);
$allowed_input_array_data=array('1','2','3','4','5','6','7','8','9','*','#','0'); 

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
      <form class="get-input-form" method="post" id="ivr_menu_post">
        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">Name</label>
          <input name="ivr_menu_name" type="hidden" value="ivr_menu" placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true"> 
          <input type="hidden" name="IVR_id" value="<?php echo $request_id; ?> ">
          <input type="hidden" name="NODE_id" value="<?php echo $node; ?> ">
          <input name="ivr_menu_name" type="text" value="<?php echo $node_name; ?>" placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group">
          <div tabindex="-1" role="group" class="bv-no-focus-ring">
            <label id="action-label" class="right-label _field-label">Allowed Inputs</label>
            <div class="form-group allowed-choices _field-label">
              <div tabindex="-1" role="group" class="bv-no-focus-ring">
                <div role="group" tabindex="-1" data-toggle="buttons" class="btn-group btn-group-md round-button-container-sm ">
                  <input type="hidden" name="allowed_input" value="<?php echo $allowed_input; ?>" id="allowed_input">
                  <?php 

                  foreach ($allowed_input_array_data as $key => $value) {
                  	# code...
                    if(in_array($value, $allowed_input_array)){

                     echo "<button type=\"button\"  value=\"$value\" class=\"btn btn-outline-primary __btn-circle ml-1 mt-1 btn_input selected_button\"> $value </button>";
                   }else{
                     echo "<button type=\"button\"  value=\"$value\" class=\"btn btn-outline-primary __btn-circle ml-1 mt-1 btn_input\"> $value </button>";

                   }
                 }
                 ?>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="form-group">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <label id="timeout-label" class="_field-label mt-4">Input Timeout in seconds</label>
          <input id="timeout" name="input_timeout" value="<?php echo $input_timeout; ?>" type="number" placeholder="60" class="inline small-input _field-value form-control form-control-sm" data-vv-id="_9eamwsecj" aria-required="false" aria-invalid="false">
          <div id="input-feedback" class="invalid-feedback"></div>
          <div class="invalid-feedback-save"></div>
        </div>
      </div>

      <div class="form-group">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <div class="_field-label form-check">
            <input type="checkbox" name="interrupt" class="form-check-input" value="true">
            <label class="form-check-label"> Interrupt Audio on Input </label>
          </div>
        </div>
      </div>

      <div class="form-group  ">
        <div tabindex="-1" role="group" class="bv-no-focus-ring">
          <div>
            <h4 class="mt-4 mb-3 _field-label">Prompt</h4>
            <div class="steps pt-3">
              <ul class="steps-wrapper">
                <li class="steps-item addfield">
                  <span class="step-label">STEP 1</span>
                  <div>
                    <div class="card auto-width-tabs">
                      <div class="card-body">
                        <div class="tabs_field-label">

                          <div class="tabs_field-label-Nav ">
                            <ul role="tablist" class="nav nav-pills">
                              <li role="presentation" class="nav-item active">
                                <a role="tab" tabindex="-1" aria-selected="false" aria-setsize="2" aria-posinset="2" href="#upload_file_1" target="_self" class="nav-link active">Upload File / URL</a>
                              </li>
                              <li role="presentation" class="nav-item">
                                <a role="tab" aria-selected="true" aria-setsize="2" aria-posinset="1" href="#speak_text_1" target="_self" class="nav-link active">Speak Text</a>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-content">
                            <div id="speak_text_1" role="speak_text1" aria-hidden="false" class="tab-pane" style="display: none;">
                              <div class="form-group">
                                <div tabindex="-1" role="group" class="bv-no-focus-ring">

                                  <div class="mt-3 mb-3 mr-0 ml-0">
                                    <span> Text to speech processor: &nbsp;&nbsp;&nbsp;</span>
                                    <div role="radiogroup" tabindex="-1" class="_field-label d-inline bv-no-focus-ring">
                                      <div class="form-check form-check-inline">
                                        <input type="radio" name="tab" value="igotnone" onclick="show2();">
                                        <label class="form-check-label">Basic </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input type="radio" name="tab" value="igotnone" onclick="show1();">
                                        <label class="form-check-label">Amazon Polly</label>
                                      </div>
                                    </div>
                                  </div>

                                  <div data-vv-name="text to speak for step 1" class="mt-2" data-vv-id="_y1jpy2nmi" aria-required="true" aria-invalid="false">
                                    <div class="complete-box">
                                      <textarea id="v-textcomplete-6nkkz2ii" rows="4" class="v-textcomplete__inner textcomplete" style="line-height: 20px;" name="text_speak" value="<?php if(isset($text_speak)){echo $text_speak;} ?>" ></textarea>
                                      <div id="autocomplete-6nkkz2ii" class="autocomplete transition" style="display: none;">
                                        <ul></ul>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div>
                                <div id="div1" class="hide mb-2">
                                  <div class="row width100 ">
                                    <div class="col-md-6">
                                      <div id="lang-label" class="form-group _field-label mb-2">
                                        <legend id="lang-label__BV_label_" tabindex="-1" class="bv-no-focus-ring floatnone col-form-label pt-0"> Language </legend>
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring floatnone">
                                          <select class="_field-value custom-select custom-select-sm" name="language">
                                            <option selected="selected" value=" <?php if(isset($language)){echo $language; } ?> ">  <?php echo $language; ?> </option>
                                            <option  value="Dutch"> Dutch </option>
                                            <option  value=" English (Australia)"> English (Australia) </option>
                                            <option  value="English (United Kingdom) "> English (United Kingdom) </option>
                                            <option  value="English (United States)"> English (United States) </option>
                                            <option  value="French"> French </option>
                                            <option  value="German"> German </option>
                                            <option  value="Italian"> Italian </option>
                                            <option  value="Polish"> Polish </option>
                                            <option  value="Portuguese (Brazil)"> Portuguese (Brazil) </option>
                                            <option  value="Spanish"> Spanish </option>
                                            <option  value="Spanish (United States)"> Spanish (United States) </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div id="voice-label" class="form-group _field-label mb-2">
                                        <legend id="voice-label__BV_label_" tabindex="-1" class="bv-no-focus-ring  floatnone col-form-label pt-0"> Voice </legend>
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring floatnone">
                                          <select class="_field-value custom-select custom-select-sm" name="gender">
                                            <option value="<?php if(isset($gender)){echo $gender; } ?> ">  <?php echo $gender; ?>     </option>
                                            <option value="WOMEN"> Women </option>
                                            <option value="MEN"> Men </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="upload_file_1" role="upload_file1" aria-hidden="true" class="tab-pane active" >
                              <div data-vv-name="url for file to play in step 1">
                                <div> 
                                  <a href="javascript:void(0)" onclick="audio_modal('audio_1')" > 
                                   <div id="dropzone" class="vue-dropzone dropzone dz-clickable">
                                    <div class="dz-default dz-message"> 
                                      <button class="dz-button" type="button">Drop files here to upload</button>
                                    </div>
                                  </div></a>
                                  URL:<input type="text" name="audio" id="play_file_name_one" class="form-control" value="<?php if(isset($audio)){ echo $audio; }else{echo $play_file_name_one;}?>">

                                  <div class="m-2" > 
                                    <div class="row">
                                      <div class="audio-images col-2">
                                        <img src="docs/img/wav.svg">
                                        <img src="docs/img/mp3.svg">
                                      </div>
                                      <div class="upload-info col-10">Drag an audio file or click on box to upload a file. <br> Max size 15MB in mp3 or wav file format. </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group bv-ring mt-2 mb-0">
                            <div tabindex="-1" role="group" class="bv-no-focus-ring">
                              <label id="timeout-first-label" class="_field-label"> Wait for </label>
                              <input id="timeout" type="number" placeholder="60" min="0" class="inline small-input _field-value form-control form-control-sm" data-vv-name="delay for step 1" aria-required="true"  name="Wait_second_prompt">
                              <label id="timeout-second-label" class="_field-label"> seconds before prompt.</label>
                              <div id="input-feedback" class="invalid-feedback"></div>
                            </div>
                          </div>

                          <div class="clearfix">
                            <button type="button" class="btn pull-right __btn-text pr-0 btn-secondary">
                              <i class="fa fa-cog" aria-hidden="true"></i>
                              <span>Settings</span>
                            </button>
                          </div>
                          <div id="test"></div>

                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="steps-item">
                    <span class="step-label _add add">+ ADD</span>
                    <input type="hidden" value="1" id="total_chq">
                  </li>
                </ul>
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
                      <div class="card-body">
                        <div role="group" class="input-group flex">
                          <div class="input-group-prepend">
                            <select class="_field-value event-type-selector custom-select custom-select-sm" name="event_callback">
                              <option value="<?php if(isset($event_callback)){echo $event_callback; } ?> ">  <?php echo $event_callback; ?>     </option> 
                              <option value="all">all</option>
                              <option value="digits">digits</option>
                            </select>
                          </div>
                          <div class="_field-value" aria-required="false" aria-invalid="false">
                            <div class="complete-box">
                              <input id="text" autocomplete="off" placeholder="Enter a Url" rows="1" value="<?php if(isset($event_callback_url)){echo $event_callback_url; } ?>"  name="event_callback_url" class="v-textcomplete__inner textcomplete" style="line-height: 20px;">
                              <div id="autocomplete-97apqryo" class="autocomplete transition" style="display: none;">
                                <ul div></ul>
                              </div>
                            </div>
                          </div>
                          <div class="invalid-feedback" style="display: none;"> Please provide a valid url or variable </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="steps-item">
                    <span class="step-label _add disabled  "> + Add Event </span> 

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
    <div id="tab2">
      <div class="markdown-container">
        <h1 id="ivr-menu">IVR Menu</h1>

        <p>1 Node : Worng Input </p>
        <p>2 Node : No Input </p>
        <p>IVR Menu component receives input on an ongoing-call and branches the execution by evaluating the input. Optionally, it can play a message before receiving the input.</p>
        <h2 id="options">Options</h2>

        <ul>
          <li><h3 id="prompts">Prompts</h3>
            <p>List of messages to be played on the call. <code>Speak Text</code> and <code>Play Audio</code> are the types of messages. In a <code>Speak Text</code> message, the <code>message</code> to speak, <code>language</code> and <code>voice</code> can be configured. In a <code>Play Audio</code> message, a <code>url</code> to an audio or an <code>audio file</code> can be configured.</p>
          </li>
          <li><h3 id="input">Input</h3>
            <p><code>Allowed Choices</code> is the list of choices that the IVR menu can accept. The choices are limited to <code>0-9</code> digits, <code>#</code>, <code>*</code>.</p>
            <p><code>Input Timeout</code> is the time (in seconds) within which a user should start giving an input. Default value is 5 seconds.</p>
            <p>By default, the message played will be interrupted when an input is entered. Deselect the <code>Interrupt Audio on Input</code> option to play the complete message before the accepting the input.</p>
          </li>
        </ul>

        <h2 id="states">States</h2>
        <p>A new state (with the choice as the name) is added to the node for each choice selected in <code>Allowed Choices</code>.</p>
        <p><code>No Input</code> and <code>Wrong Input</code> states present by default. <code>No Input</code> is set when an input is not provided within the input timeout. <code>Wrong Input</code> is set when the provided input is not in allowed choices.</p>
        <h2 id="variables">Variables</h2>

        <ul>
          <li><p><code>digits</code></p>
            <p>Input entered by user.</p>
          </li>
          <li><p><code>input_type</code></p>
            <p>Input type is set to <code>digits</code>.</p>
          </li>
        </ul>

      </div>
    </div>
  </section>
</div>
<script> 

// $('.add').on('click', add); 


$('.btn_input').click(function(){
 let allowed_input = [];
 var findclass=$(this).hasClass('selected_button');
 var allowed_input_value=$(this).val();
 console.log(findclass);
 if(findclass){
  $(this).removeClass('selected_button');
}else{
  $(this).addClass('selected_button');
  allowed_input.push(allowed_input_value); 
}

$(".selected_button").each(function() {
 var allowed_input_value=$(this).val();
 allowed_input.push(allowed_input_value);
});

$('#allowed_input').val(allowed_input);



});

$(document).ready(function(){
  $(".add").click(function(){
  var new_chq_no = parseInt($('#total_chq').val()) + 1;
     $(".addfield").append('<div id="remove"><span class="step-label  ">STEP '+new_chq_no+'</span><span class="step-label _add delete">- Delete</span><input type="hidden" value="'+new_chq_no+'" id="delete_chq"><div><div class="card auto-width-tabs"><div class="card-body"><div class="tabs_field-label"><div class="tabs_field-label-Nav "><ul role="tablist" class="nav nav-pills"><li role="presentation" class="nav-item active"><a role="tab" tabindex="-1" aria-selected="false" aria-setsize="2" aria-posinset="2" href="#upload_file_'+new_chq_no+'" target="_self" class="nav-link active">Upload File / URL</a></li><li role="presentation" class="nav-item"><a role="tab" aria-selected="true" aria-setsize="2" aria-posinset="1" href="#speak_text_'+new_chq_no+'" target="_self" class="nav-link active">Speak Text</a></li></ul></div><div class="tab-content"><div id="speak_text_'+new_chq_no+'" role="speak_text1" aria-hidden="false" class="tab-pane" style="display: none;"><div class="form-group"><div tabindex="-1" role="group" class="bv-no-focus-ring"> <div class="mt-3 mb-3 mr-0 ml-0"><span> Text to speech processor: &nbsp;&nbsp;&nbsp;</span><div role="radiogroup" tabindex="-1" class="_field-label d-inline bv-no-focus-ring"><div class="form-check form-check-inline"><input type="radio" name="tab" value="igotnone" onclick="show2();"><label class="form-check-label">Basic </label></div><div class="form-check form-check-inline"><input type="radio" name="tab" value="igotnone" onclick="show1();"><label class="form-check-label">Amazon Polly</label></div></div></div><div data-vv-name="text to speak for step 1" class="mt-2" data-vv-id="_y1jpy2nmi" aria-required="true" aria-invalid="false"><div class="complete-box"><textarea id="v-textcomplete-6nkkz2ii" rows="4" class="v-textcomplete__inner textcomplete" style="line-height: 20px;" name="text_speak" value=""></textarea><div id="autocomplete-6nkkz2ii" class="autocomplete transition" style="display: none;"><ul></ul></div></div></div> </div></div><div><div id="div1" class="hide mb-2"><div class="row width100 "><div class="col-md-6"><div id="lang-label" class="form-group _field-label mb-2"><legend id="lang-label__BV_label_" tabindex="-1" class="bv-no-focus-ring floatnone col-form-label pt-0"> Language </legend><div tabindex="-1" role="group" class="bv-no-focus-ring floatnone"><select class="_field-value custom-select custom-select-sm" name="language"><option selected="selected" value="  ">   </option><option value="Dutch"> Dutch </option><option value=" English (Australia)"> English (Australia) </option><option value="English (United Kingdom) "> English (United Kingdom) </option><option value="English (United States)"> English (United States) </option><option value="French"> French </option><option value="German"> German </option><option value="Italian"> Italian </option><option value="Polish"> Polish </option><option value="Portuguese (Brazil)"> Portuguese (Brazil) </option><option value="Spanish"> Spanish </option><option value="Spanish (United States)"> Spanish (United States) </option></select></div></div></div><div class="col-md-6"><div id="voice-label" class="form-group _field-label mb-2"><legend id="voice-label__BV_label_" tabindex="-1" class="bv-no-focus-ring  floatnone col-form-label pt-0"> Voice </legend><div tabindex="-1" role="group" class="bv-no-focus-ring floatnone"><select class="_field-value custom-select custom-select-sm" name="gender"><option value=" ">       </option><option value="WOMEN"> Women </option><option value="MEN"> Men </option></select></div></div></div></div></div></div></div><div id="upload_file_'+new_chq_no+'" role="upload_file1" aria-hidden="true" class="tab-pane active"><div data-vv-name="url for file to play in step 1"><div> <a href="javascript:void(0)" onclick="audio_modal("audio_1")"> <div id="dropzone" class="vue-dropzone dropzone dz-clickable"><div class="dz-default dz-message">  <button class="dz-button" type="button">Drop files here to upload</button></div></div></a>URL:<input type="text" name="audio" id="play_file_name_one" class="form-control" value=""><div class="m-2"> <div class="row"><div class="audio-images col-2"><img src="docs/img/wav.svg"><img src="docs/img/mp3.svg"></div><div class="upload-info col-10">Drag an audio file or click on box to upload a file. <br> Max size 15MB in mp3 or wav file format. </div></div></div></div></div></div></div><div class="form-group bv-ring mt-2 mb-0"><div tabindex="-1" role="group" class="bv-no-focus-ring"><label id="timeout-first-label" class="_field-label"> Wait for </label><input id="timeout" type="number" placeholder="60" min="0" class="inline small-input _field-value form-control form-control-sm" data-vv-name="delay for step 1" aria-required="true" name="Wait_second_prompt"><label id="timeout-second-label" class="_field-label"> seconds before prompt.</label><div id="input-feedback" class="invalid-feedback"></div></div></div><div class="clearfix"><button type="button" class="btn pull-right __btn-text pr-0 btn-secondary"><svg class="svg-inline--fa fa-cog fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path></svg><!-- <i class="fa fa-cog" aria-hidden="true"></i> --><span>Settings</span></button></div><div id="test"></div></div></div></div></div></div>');

  $('#total_chq').val(new_chq_no);
  });
 

$('.addfield').on('click' ,'.delete',function(){  
     $(this).parent('div').remove(); 
      $('#total_chq').val(new_chq_no );
  })
});


</script>