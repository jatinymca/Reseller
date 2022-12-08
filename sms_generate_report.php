 
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



<div class="row">
   <div class="col-lg-12">
      <div class="borderBox light bordered card-box">
         <div class="borderBox-title tabbable-line">
            <div class="caption">                                                   
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a href="#borderBox_tab15" data-toggle="tab" class="active"> Reports </a>
                  </li>
                  <li class="nav-item">
                     <a href="#borderBox_tab14" data-toggle="tab" > Phone No. Wise Reports </a>
                  </li>
                  <li class="nav-item">
                     <a href="#borderBox_tab13" data-toggle="tab" >API Reports  </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="borderBox-body">
            <div class="tab-content">
               <div class="tab-pane active boder_tab" id="borderBox_tab15">
                  <div class="card-head">
                     <header>SMS Reports</header>
                     <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">Reports</a>
                        </li>               
                     </ol>                         
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <form class="form-horizontal row" id="generate_report_form" action="" method="post">
                              <div class="col-md-12 mt-3 fadeInLeft animated">
                                 <fieldset>                                
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="report_name">Select Report </label>
                                       <div class="col-md-5">
                                          <select class="form-control" name="report_name">
                                             <option value="Account Wise Summary Report">Account Wise Summary Report</option>
                                             <option value="Campaign Detail Report" selected>Campaign Detail Report</option>
                                             <option value="Campaign Summary Report">Campaign Summary Report</option>
                                             <option value="Credit Usage Detail Report">Credit Usage Detail Report</option>
                                             <option value="Credit Usage Summary Report">Credit Usage Summary Report</option>
                                             <option value="Reseller Credit Report">Reseller Credit Report</option>
                                             <option value="SmartLink Detail Report">SmartLink Detail Report</option>
                                          </select>
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="">Show Only Delivered </label>
                                       <div class="col-md-5">
                                          <input type="checkbox" name="show_deliverd_status" class="form-control">
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="campaign_name">Campaign </label>
                                       <div class="col-md-5">
                                          <select class="form-control" name="campaign_name">
                                             <option value="All">All</option>
                                             <option value="More">More...</option>
                                          </select>
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="request_fromdatetime">Date From</label>
                                       <div class="col-md-5">
                                          <input type="text" name="request_fromdatetime" class="form-control datetimepicker_from" required="" id="date_from"   placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="request_todatetime">Date To</label>
                                       <div class="col-md-5">
                                          <input type="text" name="request_todatetime" class="form-control datetimepicker_to" required="" id="date_to"   placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>                                
                                    <hr>

                                    <div class="form-group row">
                                       <div class="col-md-12 text-left">
                                          <button type="submit" class="btn btn-primary" > Generate Report</button>       
                                       </div>
                                    </div>
                                 </fieldset>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane boder_tab" id="borderBox_tab14">
                  <div class="card-head">
                     <header>Phone No. Wise Reports </header>
                     <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">Phone No. Wise Reports </a>
                        </li>               
                     </ol>                         
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <form class="form-horizontal row" id="phone_no_wise_report" action="" method="post">
                              <div class="col-md-12 mt-3 fadeInLeft animated">
                                 <fieldset>                                
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="">Mobile No. </label>
                                       <div class="col-md-5">
                                          <input type="text" name="numbers" placeholder="Enter Mobile Number" class="form-control">
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="">Date From</label>
                                       <div class="col-md-5">
                                          <input type="text" name="date_from" class="form-control datetimepicker_from" placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="">Date To</label>
                                       <div class="col-md-5">
                                          <input type="text" name="date_to" class="form-control datetimepicker_to" placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                      
                                    <hr>

                                    <div class="form-group row">
                                       <div class="col-md-12 text-left">
                                          <button type="submit" class="btn btn-primary" > Show Data</button>       
                                       </div>
                                    </div>
                                 </fieldset>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="row pt-5" >
                        <div class="col-sm-12" style="overflow: hidden;overflow-x: scroll;"> 
                           <table class="table  table-striped table_fetch_phoneno_wise__report" id="example4">
                              <thead class="thead-light">
                                 <tr role="row">
                                    <th> Phone No </th>
                                    <th> Status </th>
                                    <th> Language </th>
                                    <th> SenderId </th>
                                    <th> Campaign Name </th>
                                    <th> Template Name </th>
                                    <th> Template Content </th>
                                    <th> Credit Type </th>
                                    <th> Schedule </th>
                                    <th> Schedule Date </th>
                                    <th> Schedule Time </th>
                                    <th> Create Date </th>
                                    <th> Create Time </th>
                                    <th> User Name </th>
                                    <th> Ref No. </th>
                                    <th> Description </th>
                                 </tr>
                              </thead>
                              <tbody id="fetch_phoneno_wise__report">
                                  
                              </tbody>
                           </table>
                        </div>
                        <div class="col-sm-8 text-right pt-2 pb-2">
                           <span class="btn btn-success " onclick="phone_wise_csv_report()">Export</span>
                        </div>                  
                        <div class="col-sm-4 text-right"></div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane boder_tab" id="borderBox_tab13">
                  <div class="card-head">
                     <header>API Reports</header>
                     <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">Reports</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="" style="color:#fff">API Reports</a>
                        </li>               
                     </ol>                         
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <form class="form-horizontal row" id="generate_report_form" action="" method="post">
                              <div class="col-md-12 mt-3 fadeInLeft animated">
                                 <fieldset>                                
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="report_name">Select Report </label>
                                       <div class="col-md-5">
                                          <select class="form-control" name="report_name">
                                             <option value="Account Wise Summary Report">Account Wise Summary Report</option>
                                             <option value="Campaign Detail Report" selected>Campaign Detail Report</option>
                                             <option value="Campaign Summary Report">Campaign Summary Report</option>
                                             <option value="Credit Usage Detail Report">Credit Usage Detail Report</option>
                                             <option value="Credit Usage Summary Report">Credit Usage Summary Report</option>
                                             <option value="Reseller Credit Report">Reseller Credit Report</option>
                                             <option value="SmartLink Detail Report">SmartLink Detail Report</option>
                                          </select>
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="">Show Only Delivered </label>
                                       <div class="col-md-5">
                                          <input type="checkbox" name="show_deliverd_status" class="form-control">
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="campaign_name">Campaign </label>
                                       <div class="col-md-5">
                                          <select class="form-control" name="campaign_name">
                                             <option value="All">All</option>
                                             <option value="More">More...</option>
                                          </select>
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="request_fromdatetime">Date From</label>
                                       <div class="col-md-5">
                                          <input type="text" name="request_fromdatetime" class="form-control datetimepicker_from" required="" id="date_from"   placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label" for="request_todatetime">Date To</label>
                                       <div class="col-md-5">
                                          <input type="text" name="request_todatetime" class="form-control datetimepicker_to" required="" id="date_to"   placeholder="yyyy-dd-mm hh:MM TT" />
                                       </div>
                                       <div class="col-md-4"></div>
                                    </div>                                
                                    <hr>

                                    <div class="form-group row">
                                       <div class="col-md-12 text-left">
                                          <button type="submit" class="btn btn-primary" > Generate Report</button>       
                                       </div>
                                    </div>
                                 </fieldset>
                              </div>
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



<script type="text/javascript">
   
    
      $('.datetimepicker_from').datetimepicker({
         uiLibrary: 'bootstrap4',
         modal: true,
         format: 'yyyy-mm-dd HH:MM:ss',
         footer: true,
         
     });

      $('.datetimepicker_to').datetimepicker({
         uiLibrary: 'bootstrap4',
         modal: true,
         format: 'yyyy-mm-dd HH:MM:ss',
         footer: true,
         
     });



  </script>