<?php 
$campaign_id=$_GET['campaign_id'];

 ?>
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card card-box">
      <div class="card-head">
        <header>Reschedule</header> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
          <li>
            <i class="fa fa-home"></i>&nbsp; <a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a class="parent-item" href="" style="color:#fff">OBD</a>&nbsp; <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a class="parent-item" href="" style="color:#fff">Reschedule</a>&nbsp; <i class="fa fa-angle-right"></i>
          </li>
        </ol>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h4>
              <b>Reschedule</b>
            </h4>

          <form id="obd_Reschedule" method="post">
            <div class="row">
              <div class="col-md-12 no_time">
                <label>No of Attempts</label>
                <input type="number" name="attempts" value="0" placeholder="0">
                <input type="hidden" name="campaign_id" value="<?php echo $campaign_id; ?>" placeholder="0">
              </div>

              <div class="col-md-6">
                <input type="checkbox" id="Answered" name="disposition[]" value="Answered">
                <label for="Answered"> Answered</label>
                <br>
                <input type="checkbox" id="Busy" name="disposition[]" value="Busy">
                <label for="Busy"> Busy</label>
                <br>
                <input type="checkbox" id="Failed" name="disposition[]" value="Failed">
                <label for="Failed"> Failed</label>
                <br>
                <input type="checkbox" id="Timeout Duration" name="disposition[]" value="Timeout_Duration">
                <label for="Timeout_Duration"> Timeout Duration</label>
                <br>
                <input type="checkbox" id="DND" name="disposition[]" value="DND">
                <label for="DND"> DND</label>
                <br>
              </div>

              <div class="col-md-6">
                <input type="checkbox" id="No Answered" name="disposition[]" value="No_Answered">
                <label for="No Answered"> No Answered</label>
                <br>
                <input type="checkbox" id="Congestion" name="disposition[]" value="Congestion">
                <label for="Congestion"> Congestion</label>
                <br>
                <input type="checkbox" id="Hangup" name="disposition[]" value="Hangup">
                <label for="Hangup"> Hangup</label>
                <br>
                <input type="checkbox" id="Timeout Ring" name="disposition[]" value="Timeout_Ring">
                <label for="Timeout_Ring"> Timeout Ring</label>
                <br>
                <input type="checkbox" id="Others" name="disposition[]" value="Others">
                <label for="Others"> Others</label>
                <br>
              </div>
            <button type="submit">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>