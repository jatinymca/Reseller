<?php 
 require('../configuration/c_config.php');

if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}

   $Sql_Query="SELECT * FROM `inbound_dids` WHERE unique_id='$request_id'";
 $res = mysqli_query($conn, $Sql_Query);
 $row=mysqli_fetch_array($res);
 
   $flow_diagram=$row['flow_diagram'];
 if(empty($flow_diagram)){ 
   	$flow_diagram="''";
 }
 
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drawflow</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/gh/jerosoler/Drawflow/dist/drawflow.min.js"></script>
    <script src="drawflow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="src/drawflow.css" />
    <link rel="stylesheet" type="text/css" href="docs/beautiful.css" />
    <link rel="stylesheet" type="text/css" href="docs/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <style></style>
    <header>
      <h2>Draw IVR Flow</h2>
      <!--  <div class="github-link"><a href="https://github.com/jerosoler/Drawflow" target="_blank"><i class="fab fa-github fa-3x"></i></a></div> -->
        <div class="btn-export" onclick="Export()">Publish </div>
          <div class="btn-clear" onclick="editor.clearModuleSelected()">Clear</div>
         
    </header>
    <div class="wrapper">
      <div class="col-sm-3">
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="start_call">
          <span> Start Call </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="ivr_menu">
          <span> IVR Menu </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="Get_input">
          <span> Get Input </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="initial_call">
          <span> Initial call </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="call_forwarding">
          <span> Call Forwarding</span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="Hangup">
          <span> Hangup </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="play_audio">
          <span> Play Audio </span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="recard_audio">
          <span> Record Audio</span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="Set_Time">
          <span> Set Time</span>
        </div>
       <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="multiple">
          <span> Set Time</span>
        </div>
        <div class="drag-drawflow" draggable="true" ondragstart="drag(event)" data-node="Set_Time">
          <span> Set Time</span>
        </div>
      </div>
      <div class="col-right">
        <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">
        
          <div class="btn-lock">
            <i id="lock" class="fas fa-lock" onclick="editor.editor_mode='fixed'; changeMode('lock');"></i>
            <i id="unlock" class="fas fa-lock-open" onclick="editor.editor_mode='edit'; changeMode('unlock');" style="display:none;"></i>
          </div>
          <div class="bar-zoom">
            <i class="fas fa-search-minus" onclick="editor.zoom_out()"></i>
            <i class="fas fa-search" onclick="editor.zoom_reset()"></i>
            <i class="fas fa-search-plus" onclick="editor.zoom_in()"></i>
          </div>
        </div>
        <div class="super-container">
          <div class="slide-container">
              
           </div>
           
          

        </div>
      </div>
    </div>
    <?php include('../model/audio_model_ivr.php') ?>
    <script>
    	var data=<?php echo $flow_diagram; ?>;
      var id = document.getElementById("drawflow");
      const editor = new Drawflow(id);
      editor.reroute = true;
      editor.reroute_fix_curvature = true;
      editor.force_first_input = false;
      /* editor.createCurvature = function(start_pos_x, start_pos_y, end_pos_x, end_pos_y, curvature_value, type) {
         var center_x = ((end_pos_x - start_pos_x)/2)+start_pos_x;
         return ' M ' + start_pos_x + ' ' + start_pos_y + ' L '+ center_x +' ' +  start_pos_y  + ' L ' + center_x + ' ' +  end_pos_y  + ' L ' + end_pos_x + ' ' + end_pos_y;
       } */
      if(data==''){
		const dataToImport = {}
     	editor.start();
      }else{
      	const dataToImport = data;
      editor.start();
      editor.import(dataToImport);
      }
      

     // editor.import(dataToImport);
       
      editor.on('nodeCreated', function(id) {
        console.log("Node created " + id);
      })
      editor.on('moduleCreated', function(name) {
        console.log("Node removed " + id);
      })
      editor.on('nodeSelected', function(id) {
        var node_name = $('#drawflow').children('.drawflow').children('.parent-node').children('#node-' + id).attr('class');
        node_name1 = node_name.split(" ");
         $('.super-container').show();

           GetIvr_html(id,node_name1[1]);
 
      })
      editor.on('moduleCreated', function(name) {
        console.log("Module Created " + name);
      })
      editor.on('moduleChanged', function(name) {
        console.log("Module Changed " + name);
      })
      editor.on('connectionCreated', function(connection) {
        console.log('Connection created');
        console.log(connection);
      })
      editor.on('connectionRemoved', function(connection) {
        console.log('Connection removed');
        console.log(connection);
      })
      /*
          editor.on('mouseMove', function(position) {
            console.log('Position mouse x:' + position.x + ' y:'+ position.y);
          })
      */
      editor.on('nodeMoved', function(id) {
        console.log("Node moved " + id);
      })
      editor.on('zoom', function(zoom) {
        console.log('Zoom level ' + zoom);
      })
      editor.on('translate', function(position) {
        console.log('Translate x:' + position.x + ' y:' + position.y);
      })
      editor.on('addReroute', function(id) {
        console.log("Reroute added " + id);
      })
      editor.on('removeReroute', function(id) {
        console.log("Reroute removed " + id);
      })
      /* DRAG EVENT */
      /* Mouse and Touch Actions */
      var elements = document.getElementsByClassName('drag-drawflow');
      for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('touchend', drop, false);
        elements[i].addEventListener('touchmove', positionMobile, false);
        elements[i].addEventListener('touchstart', drag, false);
      }
      var mobile_item_selec = '';
      var mobile_last_move = null;

      function positionMobile(ev) {
        mobile_last_move = ev;
      }

      function allowDrop(ev) {
        ev.preventDefault();
      }

      function drag(ev) {
        if (ev.type === "touchstart") {
          mobile_item_selec = ev.target.closest(".drag-drawflow").getAttribute('data-node');
        } else {
          ev.dataTransfer.setData("node", ev.target.getAttribute('data-node'));
        }
      }

      function drop(ev) {
        if (ev.type === "touchend") {
          var parentdrawflow = document.elementFromPoint(mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY).closest("#drawflow");
          if (parentdrawflow != null) {
            addNodeToDrawFlow(mobile_item_selec, mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY);
          }
          mobile_item_selec = '';
        } else {
          ev.preventDefault();
          var data = ev.dataTransfer.getData("node");
          addNodeToDrawFlow(data, ev.clientX, ev.clientY);
        }
      }

      function addNodeToDrawFlow(name, pos_x, pos_y) {
        if (editor.editor_mode === 'fixed') {
          return false;
        }
        pos_x = pos_x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)) - (editor.precanvas.getBoundingClientRect().x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)));
        pos_y = pos_y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)) - (editor.precanvas.getBoundingClientRect().y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)));
        switch (name) {
          case 'start_call':
            var start_call = `<div><div class="title-box"> Start Call </div></div>`;
            editor.addNode('start_call', 0, 1, pos_x, pos_y, 'start_call', {}, start_call);
            break;
        case 'ivr_menu':
         var ivr_menu=`<div><div class="title-box"> <smap> IVR Menu <smap> <div class=""> <p> Worng Input </p><p> No Input </p><p> Input 1</p><p> Input 2 </p><p> Input 3 </p><p> Input 4</p>  <p>Input 5</p> </div>  </div></div>`;
            editor.addNode('ivr_menu', 1, 7, pos_x, pos_y, 'ivr_menu', {}, ivr_menu);
            break;
          case 'Get_input':
          var Get_input=`<div><div class="title-box"> Get Input <div class=""> <p> Sucessfully Input </p><p> No Input </p> </div>  </div></div>`;    
            editor.addNode('Get_input', 1, 2, pos_x, pos_y, 'Get_input', {}, Get_input);      
            break;
          case 'initial_call':  
          var initial_call=`<div><div class="title-box"> initial_call <div class=""> <p> Answerd   </p><p>  No-Answerd </p> <p>Busy/Reject</p> <p>Failed</p></div> </div></div>`;
           editor.addNode('initial_call', 1, 4, pos_x, pos_y, 'initial_call', {}, initial_call);      
            break;
          case 'call_forwarding':
            var call_forwarding=`<div><div class="title-box"> Call Forwarding  <div class=""> <p> Answerd   </p><p>  No-Answerd </p> <p>Busy/Reject</p> <p>Failed</p></div>  </div></div>`;
           editor.addNode('call_forwarding', 1, 4, pos_x, pos_y, 'call_forwarding', {}, call_forwarding);      
            break;
          case 'Set_Time':
            var Set_Time=`<div><div class="title-box"> Set_Time <div class=""> <p> On Time  </p> <p>Off Time</p> </div> </div></div>`;
           editor.addNode('Set_Time', 1, 2, pos_x, pos_y, 'Set_Time', {}, Set_Time);      
            break;
             case 'Hangup':    
            var Hangup=`<div><div class="title-box"> Hangup  </div> </div>`;
           editor.addNode('Hangup', 1, 0, pos_x, pos_y, 'Hangup', {}, Hangup);      
            break;
            case 'play_audio':
            var play_audio=`<div><div class="title-box"> play_audio <div><p>Prompt completed</p></div></div></div>`;
           editor.addNode('play_audio', 1, 1, pos_x, pos_y, 'play_audio', {}, play_audio);      
            break;
            case 'recard_audio':
            var recard_audio=`<div><div class="title-box"> recard_audio  <div><p>Recording Completed</p></div> </div></div>`;
           editor.addNode('recard_audio', 1, 2, pos_x, pos_y, 'recard_audio', {}, recard_audio);      
            break;
            case 'multiple':
            var multiple=`<div><div class="title-box"> multiple </div></div>`;
           editor.addNode('multiple', 1, 2, pos_x, pos_y, 'multiple', {}, multiple);      
            break;
            case 'personalized':
            var personalized=`<div><div class="title-box"> personalized </div></div>`;
           editor.addNode('personalized', 1, 2, pos_x, pos_y, 'personalized', {}, personalized);      
            break;
             case 'dbclick':
            var dbclick=`<div><div class="title-box"> dbclick </div></div>`;
           editor.addNode('dbclick', 1, 2, pos_x, pos_y, 'dbclick', {}, dbclick);      
            break;
          default:
        }
      }
      var transform = '';

      function showpopup(e) {
        e.target.closest(".drawflow-node").style.zIndex = "9999";
        e.target.children[0].style.display = "block";
        //document.getElementById("modalfix").style.display = "block";
        //e.target.children[0].style.transform = 'translate('+translate.x+'px, '+translate.y+'px)';
        transform = editor.precanvas.style.transform;
        editor.precanvas.style.transform = '';
        editor.precanvas.style.left = editor.canvas_x + 'px';
        editor.precanvas.style.top = editor.canvas_y + 'px';
        console.log(transform);
        //e.target.children[0].style.top  =  -editor.canvas_y - editor.container.offsetTop +'px';
        //e.target.children[0].style.left  =  -editor.canvas_x  - editor.container.offsetLeft +'px';
        editor.editor_mode = "fixed";
      }

      function closemodal(e) {
        e.target.closest(".drawflow-node").style.zIndex = "2";
        e.target.parentElement.parentElement.style.display = "none";
        //document.getElementById("modalfix").style.display = "none";
        editor.precanvas.style.transform = transform;
        editor.precanvas.style.left = '0px';
        editor.precanvas.style.top = '0px';
        editor.editor_mode = "edit";
      }

   
      function changeModule(event) {
        var all = document.querySelectorAll(".menu ul li");
        for (var i = 0; i < all.length; i++) {
          all[i].classList.remove('selected');
        }
        event.target.classList.add('selected');
      }

      function changeMode(option) {
        console.log(lock.id);
        if (option == 'lock') {
          lock.style.display = 'none';
          unlock.style.display = 'block';
        } else {
          lock.style.display = 'block';
          unlock.style.display = 'none';
        }
      }
      var burger = $(".hamburger-box");


      burger.on("click", function(e) {
        $(this).toggleClass("active");
        $('.js-nav').parent().find('.menu').toggleClass('active');
      });



      $('.slide-container').on('click','.tabs_field-label-Nav ul li a',function() {
        // Check for active
        $('.tabs_field-label-Nav ul li').removeClass('active');
        $(this).parent().addClass('active');
        // Display active tab
        let currentTab = $(this).attr('href');
        $('.tab-content .tab-pane').hide();
        $(currentTab).show();
        return false;
      });



      $('.slide-container').on('click','.tabs-nav .head_panel a',function() {
        // Check for active
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');
        // Display active tab
        let currentTab = $(this).attr('href');
        $('.tabs-content .show').hide();
        $(currentTab).show();
        return false;
      });
      

      function show1() { 
        document.getElementById('div1').style.display = 'none';
      }

      function show2() {
        document.getElementById('div1').style.display = 'block';
      } 
      function audio() {
         alert();
      }
 

   function Always() {
    document.getElementById('Dynamic').style.display = 'none';
  }

  function Dynamic() {
    document.getElementById('Dynamic').style.display = 'block';
  }
     function hide(){
      $('.super-container').hide();
     } 


function Export(){
    var  request_id='<?php echo $request_id; ?>';
    var url="../php/ivr_panel.php?request_id="+request_id;
    var exportdata = JSON.stringify(editor.export());
 
    var data ={exportdata};
    
    $.ajax({
        type        : 'POST', 
        url         : url,
        data        : data,
       
        
        success: function (result) {
            if(result.Response==200){
                alert(result.message);
                 
            }else{
                alert(result.message);
            }
        }
    });
}

function GetIvr_html(id,node_name){
 
    var  request_id='<?php echo $request_id; ?>';
    var url=node_name+".php?request_id="+request_id+"&node="+id;
  
    
    $.ajax({
        type        : 'POST', 
        url         : url,
        data        : data,
         success: function (result) {
           $('.slide-container').html(result);
        }
    });
}
 
// $('.remove').on('click', remove);
 
 function add() {
  alert();
  var new_chq_no = parseInt($('#total_chq').val()) + 1;
  var new_input = "<input type='text' id='new_" + new_chq_no + "'>";

  $('#test').append(new_input); 
  $('#total_chq').val(new_chq_no);
}




  

    </script>
    <script type="text/javascript">
      $(".btn-secondary").click(function () {
            $(".bv-ring").toggle();
        });
      
        $(".dz-button").click(function() {
  $(".popup").fadeIn(500);
});
$(".close").click(function() {
  $(".popup").fadeOut(500);
});
    </script>
      <script src="js/ivr.js"></script>
  </body>
</html>