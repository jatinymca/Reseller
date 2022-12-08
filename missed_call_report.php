<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header> IVRS Report</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">IVRS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">IVR</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Missed Report</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <form id="missed_call_report_search">
                     <div class="row">
                        <div class="col-md-2">
                          <label for=" " class="col-lg-4 control-label dat">Caller ID </label>
                          <select class="form-control"  id="extension" name="extension">
                           <option value="">Select User</option> 

                           <?php

                           $sqli = "SELECT `extension` FROM inbound_log WHERE 1 $permission_username GROUP BY extension ";
                           $resi = mysqli_query($conn, $sqli);

                           while($rowi=mysqli_fetch_array($resi)){
                              $extension = $rowi[0]; 
                              ?>
                              <option value="<?php echo $extension; ?>" ><?php echo $extension;?></option>
                              <?php                                 
                           }
                           ?>
                        </select>
                     </div>

                     <div class="col-md-3"> 
                        <label for=" " class="col-lg-4 control-label dat">Start Time</label>
                        <input type="text" name="start_time" class="form-control start_time_ivr" id="strt-1">
                     </div>

                     <div class="col-md-3"> 
                      <label for=" " class="col-lg-4 control-label">End Time</label>
                      <input type="text" name="end_time" class="form-control end_time_ivr" id="datepicker-2">
                   </div>  
                   <div class="col-md-3  ">
                     <button type="submit" class="btn btn-primary">search</button> 
                     <button type="button" onclick="download_missed_report()" class="btn btn-danger">Download</button>                               
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>



</div>
<div class="card card-box">
   <div class="card-body">
      <div class="row">
         <div class="col-md-12">
            <div class="table-scrollable">
               <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                <div class="row">
                  <div class="col-sm-12">
                     <table class="table table-striped myTable" id="missed_call_report_tab" >
                        <thead>
                           <tr role="row">

                             <th>Customer Phone</th>
                             <th>Extension</th>
                             <th>Call Date</th>
                             <th>End Date</th>
                             <th>Duration</th> 
                          </tr>

                       </thead>
                       <tbody  id="missed_call_report" >

                       </tbody>
                    </table>
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

