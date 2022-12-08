<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>Manage   Channel</header>
            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_chaneel">
            Add Channel
            </button>     
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="#!" style="color:#fff"  >voice</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Campaign</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Manage voice Data</a>
               </li>
            </ol>
         </div>
         <div class="card-body">
            <div class="row">
               
       <!--          
               <div class="col-md-3">
                  <div class="row">
                     <div class="col-sm-12">
                      
                        form  id="trunk_type_form">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <select class="form-control" id="trunk_type" name="trunk_type" onchange="select_trunk()">
                                    <option value="">Select trunk</option>
                                    <option value="PRI_Card" >PRI Card</option>
                                    <option value="IAX2" >IAX2</option>
                                    <option value="GSM_Gateway" >GSM Gateway</option>
                                    <option value="PRI_Gateway" >PRI Gateway</option>
                                 </select>
                              </div>
                              
                           </div>
                        </form>
                     </div>
                  </div>
               </div> -->
               <div class="col-lg-12">
                  <div class="table-responsive" id="fetch_channel"  style="overflow-y:scroll; overflow-x: none; max-height: 500px;">
                              
                  </div>
               </div>
            </div>
              
         </div>

         <div class="card-body">
            <div class="row">
               <div class="col-lg-9">
                  <div class="table-responsive" id="all_fetch_channel"  style="overflow-y:scroll; overflow-x: none; max-height: 500px;">
                              
                   </div>
               </div>
            </div> 
         </div>
      </div>
   </div>
</div>

<?php 
include('model/channel_add.php');
?>
<!-- <script type="text/javascript">
     function select_trunk(){
            trunk_type_name=$('#trunk_type').val();
             channel_fetch(trunk_type_name);
             $('#all_fetch_channel').hide();
               
           }
</script> -->