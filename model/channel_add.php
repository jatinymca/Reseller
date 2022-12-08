<div class="modal fade" id="add_chaneel">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header card-head">
          <h4 class="modal-title ml-2 ">Add Channel</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             <div class="row">
			    <div class="col-lg-12">
				    <div class="card card-box">
						 <div class="panel tab-border card-box">
                     <header class="panel-heading panel-heading-gray custom-tab ">
                        <ul class="nav nav-tabs">
                           <li class="nav-item"><a href="#home" data-toggle="tab" class="">PRI Card </a>
                           </li>
                           <li class="nav-item"><a href="#about" data-toggle="tab" class="">GSM Gateway </a>
                           </li>
                           <li class="nav-item"><a href="#profile" data-toggle="tab" class="active">PRI Gateway </a>
                           </li>
                        </ul>
                     </header>
                     <div class="panel-body">
                        <div class="tab-content" class="col-md-12">
                           <div class="tab-pane" id="home">
                              <form action="" method="POST" id="PRI_Card_form">
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Enter  Pilot No</label>
                                    <input type="text" class="form-control" placeholder="Enter Pilot No" id="pilot_no" name="pilot_number" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">DID  Start</label>
                                    <input type="text" class="form-control" placeholder="Enter  DID Start" id="did_start" name="did_start" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">DID End </label>
                                    <input type="text" class="form-control" placeholder="Enter DID End" id="did_end" name="did_end" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Channel Name</label>
                                    <input type="text" class="form-control" placeholder="Channel Name" name="dialable_channel"  id="dialable_channel" required="" value="">
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Group:</label>
                                    <select class="form-control"  id="group_id" name="group_id" required="">
                                     <?php
                                      $sql = "SELECT * FROM `vertage_groups` where active='Y'";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row=mysqli_fetch_array($res)){

                                          echo '<option value="'.$row['group_id'].'">'.$row['group_name'].'</option>';
                                       }
                                    ?>
                                    </select>
                                 </div>
                                  
                                 <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                           </div>
                           <div class="tab-pane" id="about">
                              <form action="" id="add_GSM_Gateway">
                                 <div class="form-group col-md-12">
                                    <label for="email">Enter SIP NO </label>
                                    <input type="text" class="form-control" placeholder="1111" id="SIP_no" name="SIP_no" >
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="email">Channel Name</label>
                                    <input type="text" class="form-control" placeholder="SIP/1111" name="dialable_channel"  id="dialable_channel" required="" value="">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="email">Group:</label>
                                    <select class="form-control"  id="group_id" name="group_id">
                                       <?php
                                      $sql = "SELECT * FROM `vertage_groups` where active='Y'";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row=mysqli_fetch_array($res)){

                                          echo '<option value="'.$row['group_id'].'">'.$row['group_name'].'</option>';
                                       }
                                    ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-12 ">
                                    <label for="email">No Of Channel</label>
                                    <input type="number" class="form-control" placeholder="No Of Channel" name="channel_number"  id="channel_number" value="0">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="prefix">Prefix</label>
                                    <input type="number" class="form-control" placeholder="91" name="prefix"  id="prefix"   value="0">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="gateway_ip">Gateway IP</label>
                                    <input type="text" class="form-control" placeholder="Gateway IP" name="ip_address"  id="ip_address" value="" required="">
                                 </div>
                                 <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                           </div>
                           <div class="tab-pane active" id="profile">
                              <form action="" method="POST" id="add_PRI_Gateway">
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Enter  Pilot No</label>
                                    <input type="text" class="form-control" placeholder="Enter Pilot No" id="pilot_no" name="pilot_number" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">DID  Start</label>
                                    <input type="text" class="form-control" placeholder="Enter  DID Start" id="did_start" name="did_start" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">DID End </label>
                                    <input type="text" class="form-control" placeholder="Enter DID End" id="did_end" name="did_end" required="" >
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Channel Name</label>
                                    <input type="text" class="form-control" placeholder="Channel Name" name="dialable_channel"  id="dialable_channel" required="" value="">
                                 </div>
                                 <div class=" col-md-12 form-group">
                                    <label for="email">Group:</label>
                                    <select class="form-control"  id="group_id" name="group_id" required="">
                                        <?php
                                      $sql = "SELECT * FROM `vertage_groups` where active='Y'";
                                       $res = mysqli_query($conn, $sql);
                                       $rowscount = mysqli_num_rows($res);
                                       while($row=mysqli_fetch_array($res)){

                                          echo '<option value="'.$row['group_id'].'">'.$row['group_name'].'</option>';
                                       }
                                    ?>
                                    </select>
                                 </div>
                                  
                                 <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
							</div>
				</div>
			    
			 </div>
        </div>
        
     
      </div>
    </div>
  </div>