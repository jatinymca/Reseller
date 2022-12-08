<?php 
require('../configuration/c_config.php');

if (isset($_GET["request_id"]))       {$request_id=$_GET["request_id"];}
elseif (isset($_POST["request_id"]))  {$request_id=$_POST["request_id"];}
if (isset($_GET["node"]))       {$node=$_GET["node"];}
elseif (isset($_POST["node"]))  {$node=$_POST["node"];}

$Sql_Query="SELECT * FROM `vertage_set_time` WHERE IVR_id='$request_id' and Node_id='$node'";
$res = mysqli_query($conn, $Sql_Query);
$row=mysqli_fetch_array($res);
$count=mysqli_num_rows($res);
if($count>0){
  $node_name=$row['set_time_name']; 
  $monday=$row['monday']; 
  $mon_stime=$row['mon_stime']; 
  $mon_etime=$row['mon_etime'];

  $tuesday=$row['tuesday']; 
  $tue_stime=$row['tue_stime']; 
  $tue_etime=$row['tue_etime'];

  $wednesday=$row['wednesday']; 
  $wed_stime=$row['wed_stime']; 
  $wed_etime=$row['wed_etime']; 

  $thursday=$row['thursday']; 
  $thurs_stime=$row['thurs_stime']; 
  $thurs_etime=$row['thurs_etime']; 

  $friday=$row['friday']; 
  $fri_stime=$row['fri_stime']; 
  $fri_etime=$row['fri_etime']; 

  $saturday=$row['saturday']; 
  $sat_stime=$row['sat_stime']; 
  $sat_etime=$row['sat_etime']; 

  $sunday=$row['sunday'];  
  $sun_stime=$row['sun_stime'];  
  $sun_etime=$row['sun_etime'];  
}else{
  $node_name='Set time'.$node;

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
            <form class="get-input-form" id="get_set_time">
                <div class="form-group  IVR-Menu  ">
                    <label id="action-label" class="right-label _field-label">Name</label>
                    <input name="set_time_name" type="hidden" value="ivr_menu" placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true"> 
                    <input type="hidden" name="IVR_id" value="<?php echo $request_id; ?> ">
                    <input type="hidden" name="NODE_id" value="<?php echo $node; ?> ">
                    <input name="set_time_name" type="text" value="<?php echo $node_name; ?>" placeholder="Enter value"
                    class="_field-value form-control form-control-sm" aria-required="true">
                    <div id="input-feedback" class="invalid-feedback"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group  weekday_Menu ">
                            <label>Week days</label>
                            <div id="weekday">
                                <input type="checkbox"  id="weekday-1" name="monday" value="Mon" <?php if(isset($monday)){ echo ($row['monday']=='Mon')?"checked":""; } ?> class="change-status" >
                                <label id="weekday" for="weekday-1">Monday</label>
                                <input type="time"   name="mon_stime" value="<?php if(isset($mon_stime)){echo $mon_stime;} ?>" class="stime cst-input">
                                <input type="time"   name="mon_etime" value="<?php if(isset($mon_etime)){echo $mon_etime;} ?>" class="etime cst-input">
                            </div>

                            <div id="weekday">
                                <input type="checkbox" id="weekday-1" name="tuesday" value="Tue"  <?php if(isset($tuesday)){ echo ($row['tuesday']=='Tue')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-1">Tuesday</label>
                                <input type="time"value="<?php if(isset($tue_stime)){echo $tue_stime;} ?>"  name="tue_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($tue_etime)){echo $tue_etime;} ?>" name="tue_etime" class="etime cst-input">
                            </div>

                            <div id="weekday">
                                <input type="checkbox" id="weekday-1" name="wednesday" value="Wed"  <?php if(isset($wednesday)){ echo ($row['wednesday']=='Wed')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-1">Wednesday</label>
                                <input type="time"value="<?php if(isset($wed_stime)){echo $wed_stime;} ?>" name="wed_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($wed_etime)){echo $wed_etime;} ?>" name="wed_etime" class="etime cst-input">
                            </div>
                            <div id="weekday">
                                <input type="checkbox" id="weekday-1" name="thursday" value="Thu"  <?php if(isset($thursday)){ echo ($row['thursday']=='Thu')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-1">Thursday</label>
                                <input type="time"value="<?php if(isset($thurs_stime)){echo $thurs_stime;} ?>" name="thurs_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($thurs_etime)){echo $thurs_etime;} ?>" name="thurs_etime" class="etime cst-input">
                            </div>
                            <div id="weekday">
                                <input type="checkbox" id="weekday-1" name="friday" value="Fri"  <?php if(isset($friday)){ echo ($row['friday']=='Fri')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-1">Friday</label>
                                <input type="time"value="<?php if(isset($fri_stime)){echo $fri_stime;} ?>" name="fri_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($fri_etime)){echo $fri_etime;} ?>" name="fri_etime" class="etime cst-input">
                            </div>
                            <div id="weekday">
                                <input type="checkbox" id="weekday-2" name="saturday" value="Sat"  <?php if(isset($saturday)){ echo ($row['saturday']=='Sat')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-2">Saturday</label>
                                <input type="time"value="<?php if(isset($sat_stime)){echo $sat_stime;} ?>" name="sat_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($sat_etime)){echo $sat_etime;} ?>" name="sat_etime" class="etime cst-input">
                            </div>
                            <div id="weekday">
                                <input type="checkbox" id="weekday-3" name="sunday" value="Sun"  <?php if(isset($sunday)){ echo ($row['sunday']=='Sun')?"checked":""; } ?> class="change-status">
                                <label id="weekday" for="weekday-3">Sunday</label>
                                <input type="time"value="<?php if(isset($sun_stime)){echo $sun_stime;} ?>" name="sun_stime" class="stime cst-input">
                                <input type="time" value="<?php if(isset($sun_etime)){echo $sun_etime;} ?>" name="sun_etime" class="etime cst-input">
                            </div>
                        </div>

                    </div>

                </div>
            
                    <div class="right-action-container">
                <div class="form-group mt-4">
                  <div  role="group" class="bv-no-focus-ring">
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
 
          <button type="submit" class="btn ml-2 __btn-dos _stroked btn-secondary">Cancel</button>
             </div>
       </div>
      </div>
        </div>
    </form>
</div>
<div id="tab2" class="show hide">
    <h3>Second Tab</h3>
    <p>We don't have anything but happy trees here. See. We take the corner of the brush and let it play
        back-and-forth. You can work and carry-on and put lots of little happy things in here. Without washing
        the
        brush, I'm gonna go right into some Van Dyke Brown, some Burnt Umber, and a little bit of Sap Green.
        This is a
        fantastic little painting. The first step to doing anything is to believe you can do it. See it finished
        in your
    mind before you ever start.</p>
</div>
</section>
</div>		


<script type="text/javascript">

    $('.change-status').change(function() {

        if($(this).is(":checked")) {

            
            $(this).parent().find('.stime').val('00:00'); 
            $(this).parent().find('.etime').val('23:59'); 

        }else{
             
            $(this).parent().find('.stime').val('00:00'); 
            $(this).parent().find('.etime').val('00:00'); 


        }

    });
</script>			