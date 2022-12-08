<style type="text/css">
.show_api{
  background-color: #f5f5f5; 
  padding: 10px;
}

</style>
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="card card-box">
         <div class="card-head">
            <header>API Key</header> 
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">SMS</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">My Account</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li><a class="parent-item" href="" style="color:#fff">Get API Key </a>
               </li>
            </ol>
         </div>
        <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <!-- <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle dataTable no-footer" id="example4" role="grid" aria-describedby="example4_info">
                           -->
                        <table class="table table-striped" id="example4">
                           <thead>
                              <tr role="row">
                                 <th> Login ID </th>
                                 <th> Full Name </th>
                                 <th> Mobile </th>
                                 <th> Email </th>
                                 <th> Api Key </th>
                                 <th> Copy Api Key </th>
                                 <th> Status </th>
                                 
                              </tr>
                           </thead>
                           <tbody id="fetch_api_key">
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


<script type="text/javascript">
  
  function copyButton(set){  
      
      var value=set.getAttribute('data-id');  
      
      var $temp = $("<input>");

      $("body").append($temp);
      $temp.val(value).select();
      document.execCommand("copy");
      $temp.remove();
      
      set.innerHTML='Copied';
  }



    

</script>