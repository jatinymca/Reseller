// IVR MENU
$(".super-container").on('submit','#ivr_menu_post',function(event){
    event.preventDefault(); 
    var data_html=$('#ivr_menu_post').serialize()+'&action=ivr_menu';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'Add_ivr_menu')

});

// GET-INPUT-IVR 
$(".super-container").on('submit','#get_input_form',function(event){
    event.preventDefault(); 
    var data_html=$('#get_input_form').serialize()+'&action=get_input_form';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_input_form')

});

$(".super-container").on('submit','#get_set_time',function(event){
    event.preventDefault(); 
    var data_html=$('#get_set_time').serialize()+'&action=get_set_time';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get-set_time')

});

$(".super-container").on('submit','#get_initial_call',function(event){
    event.preventDefault(); 
    var data_html=$('#get_initial_call').serialize()+'&action=get_initial_call';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_initial_call')

}); 


$(".super-container").on('submit','#get_call_forwarding',function(event){ 
    event.preventDefault(); 
    var data_html=$('#get_call_forwarding').serialize()+'&action=get_call_forwarding';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_call_forwarding')

});

$(".super-container").on('submit','#get_hangup_call',function(event){
    event.preventDefault(); 
    var data_html=$('#get_hangup_call').serialize()+'&action=get_hangup_call';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_hangup_call')

});

$(".super-container").on('submit','#get_play_audio',function(event){
    event.preventDefault(); 
    var data_html=$('#get_play_audio').serialize()+'&action=get_play_audio';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_play_audio')

});

$(".super-container").on('submit','#get_record_audio',function(event){
    event.preventDefault(); 
    var data_html=$('#get_record_audio').serialize()+'&action=get_record_audio';
    var url="../php/reseller.php"; 
  insert_record(data_html,url,'get_record_audio')

});






function delete_num(data_html,NODE_id,IVR_id){
    
     $.ajax({
       type:'POST',
       url:"../php/reseller.php",
       data:{'action':'delete_num','phone_text':data_html,'NODE_id':NODE_id,'IVR_id':IVR_id},
       dataType: "json",
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



 

function audio_modal(audio_id)
{
  $("#hide_audio_id").val(audio_id);
  $('#audio_model').modal('show');
}

function audio_chooser(audio_name){ 
        $("#play_file_name_one").val(audio_name); 
}

function record_responce(data,roll){
    console.log(data);
    console.log(roll);

 

    if(roll=='Add_ivr_menu'){
        if(data.Response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_input_form'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_set_time'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_initial_call'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_call_forwarding'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_hangup_call'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_play_audio'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }

    if(roll=='get_record_audio'){
        if(data.response=='200'){
            alert(data.message); 
        }
        else{
                 alert(data.message);
            }
        }
}