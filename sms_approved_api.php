<style type="text/css">
.show_api{
  background-color: #f5f5f5; 
  padding: 10px;
}

.pdf_color{
  font-size:50px;
  color:red;
}

</style>
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card card-box">
      <div class="card-head">
        <header>API</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAPI_model">
          Add API
        </button>     
        <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
           <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
           </li>
           <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
           </li>
           <li><a class="parent-item" href="" style="color:#fff">My Account</a>&nbsp;<i class="fa fa-angle-right"></i>
           </li>
           <li><a class="parent-item" href="" style="color:#fff">API</a>
           </li>
        </ol>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped" id="example4">
                  <thead>
                    <tr role="row">
                      <th> Id </th>
                      <th> URL </th>
                      <th> Status </th>
                      <th> Create Date </th>
                      <th> Username </th>
                    </tr>
                  </thead>
                  <tbody id="fetch_api_data">
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

<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card card-box">
      <div class="card-head">
        <header>API Examples</header>
        <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i></li>
          <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i></li>
          <li><a class="parent-item" href="" style="color:#fff">My Account</a>&nbsp;<i class="fa fa-angle-right"></i></li>
          <li><a class="parent-item" href="" style="color:#fff">API</a></li>
        </ol>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-8 ">
                <legend for="api_url" class="col-sm-12 control-label"><b>SMS API Request and Response   </b></legend>
                <div class="row ">
                  <div class="col-sm-12 show_api">
                    <p style="white-space:pre-line;">
                      http://192.168.1.28/ResellerNew/api/CreateSMSCampaignPost.php
                         {
                              "msisdn":["98xxxxxxxx","74yyyyyyyy"],
                              "language":0,
                              "credittype":1,
                              "senderid":"ABCDEF",
                              "templateid":114,
                              "message":"Hello Every One",
                              "ukey":"1uwahgKyKoSbBbnLCZLNUtys4",
                              "isschd":1,
                              "schddate":"2018-02-15 12:57:00",
                              "isrefno":true,
                              "dlttemplateid":"DLTtemplateidjhgsdf"
                        } 

                         Success Response : 
                         {
                              "status":"success",
                              "leadid":676,
                              "inserted":3,
                              "rejected":1,
                              "creditused":3,
                              "ref_no":[{"98xxxxxxxx":"676_572_20_2018-09-01_163001",
                              "74yyyyyyyy":"676_572_18_2018-09-01_163001"}]
                         }

                          Failure Response :
                         {
                              "status":"failure",
                              "value":"ukey is not Valid"
                         }


                          2. language : English,Hindi
                          3. credittype : 1-Promo,2-Trans,7-Service Implicit
                          4. templateid : 0-Type Msg, templateid greater than 0- Get Msg from Template
                          5. isschd : 0- For Not Schedule,1-Not Schedule
                          6. schddate : yyyy-MM-dd HH:mm:ss
                          7. msisdn : For static Content
                          8. msisdnlist : for dynamic content
                    </p>
                  </div>  
                </div>  
              </div>
              <div class="col-sm-4 text-center">
                <h5 for="api_url" class="col-sm-12 control-label">Download Pdf  </h5>
                <div class="row">
                  <div class="col-sm-12 text-center pt-4">
                    <span><i class="fa fa-file-pdf-o pdf_color"></i></span>
                  </div>
                </div>
             </div>
            </div>
            <div class="row">
              <div class="col-sm-8 ">
                <legend for="api_url" class="col-sm-12 control-label"><b> SMS User Balance </b></legend>
                <div class="row ">
                  <div class="col-sm-12 show_api">
                    <p style="white-space:pre-line;">
                           http://192.168.1.28/ResellerNew/api/GetUserBalance.php 
                            {
                                "ukey":"1uwahgKyKoSbBbnLCZLNUtys4",
                                "producttype":1,
                                "credittype":1
                            }

                           Response : 
                           {
                                "status":"success",
                                "value":"465"
                           }

                           Description : 
                            1. producttype : 1 For SMS (Not be changed)
                            2. credittype : 1 For Promo and 2 For Trans 
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 text-center">
                <h5 for="api_url" class="col-sm-12 control-label">Download Pdf  </h5>
                <div class="row">
                  <div class="col-sm-12 text-center pt-4">
                    <span><i class="fa fa-file-pdf-o pdf_color"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
               <legend for="api_url" class="col-sm-12 control-label"><b> Get Sms Report </b></legend>
               <div class="col-sm-8 show_api">

                 <p style="white-space:pre-line;">
                     http://192.168.1.28/ResellerNew/api/GetReports
                     {
                         "ukey":"1uwahgKyKoSbBbnLCZLNUtys4",
                         "productid":1,
                         "reporttype":1,
                         "reportformat":2,
                         "selectReport":1,
                         "localleadid":2405,
                         "enableallcamp":false,
                         "fromdate":"2017-09-05 00:00:00",
                         "todate":"2018-09-05 23:00:00"
                     }

                     Responce : 
                     {
                            "status":"success"
                     }
                     </p>
                  
               </div>
            </div> -->
            <div class="row">
              <div class="col-sm-8 ">
                <legend for="api_url" class="col-sm-12 control-label"><b> Update/Cancel Schedule </b></legend>
                <div class="row ">
                  <div class="col-sm-12 show_api">
                    <p style="white-space:pre-line;">
                      http://192.168.1.28/ResellerNew/api/ScheduleCampaign.php 
                      {
                           "ukey":"1uwahgKyKoSbBbnLCZLNUtys4",
                           "isschd":1,
                           "schddate":"2021-07-26 21:59:59",
                           "campaign_id":2656
                      } 

                      {"status":"success","value":"Campaign Modify Successfully"}

                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 text-center">
                <h5 for="api_url" class="col-sm-12 control-label">Download Pdf  </h5>
                <div class="row">
                  <div class="col-sm-12 text-center pt-4">
                    <span><i class="fa fa-file-pdf-o pdf_color"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8 ">
                <legend for="api_url" class="col-sm-12 control-label"><b> Get Reference No </b></legend>
                  <div class="row ">
                    <div class="col-sm-12 show_api">
                      <p style="white-space:pre-line;">
                        http://192.168.1.28/ResellerNew/api/SMSStatusPost.php 
                        {
                             "ukey":"1uwahgKyKoSbBbnLCZLNUtys4",
                             "ref_no":"2631218011629"
                        } 

                        {"status":"success","value":"Delivered"}

                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 text-center">
                  <h5 for="api_url" class="col-sm-12 control-label">Download Pdf  </h5>
                  <div class="row">
                    <div class="col-sm-12 text-center pt-4">
                      <span><i class="fa fa-file-pdf-o pdf_color"></i></span>
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

<div class="modal fade" id="AddAPI_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Add API</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
               	<div class="card card-box">
                  	<form action="" method="post" id="add_api_form">
                        <div class="row">
                           <div class="col-md-12">
                             	<div class="form-group row">
                                 <label for="api_url" class="col-sm-4 control-label"><b>API Url</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" id="api_url" name="api_url" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 text-center pt-3 pb-2">
                          	   <button type="submit" class="btn btn-primary">Save</button>    
                        	</div>
                        </div>
               		</form>
               	</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="ModifyAPI_model" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header card-head">
            <h4 class="modal-title  ml-2">Modify API</h4>
            <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-12">
               	<div class="card card-box">
                  	<form action="" method="post" id="modify_api_form">
                     	<div class="row">
                     		<input type="hidden" name="api_id" id="edit_api_id" value="">
                        	<div class="col-md-12">
                           	<div class="form-group row">
                                 <label for="api_url" class="col-sm-4 control-label"><b>API Url</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" id="edit_api_url" readonly>
                                 </div>
                           	</div>
                        	</div>
                        	<div class="col-md-12 text-center pt-3 pb-2">
                          	   <button type="submit" class="btn btn-primary">Save</button>    
                        	</div>
                     	</div>
               		</form>
               	</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

