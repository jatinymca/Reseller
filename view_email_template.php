	<!-- <script src="js/tinymce/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#pclu-textarea',branding: false });</script> -->
 
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
 <!-- <link rel="stylesheet" href="ckeditor/samples/css/samples.css"> -->
<link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card card-box">
			<div class="card-head">
				<header>Request Template</header>
                <ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Request Template</a>
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
	                           		<thead class="thead-light">
	                              		<tr role="row">
	                                		<th> Template Name </th>
	                                		<!-- <th style="width: 400px !important;"> Template Text </th> -->
	                                 		<th> Request Date </th>
			                                <th> Request Time </th>
			                                <th> Approve/Reject Date </th>
			                                <th> Approve/Reject Time </th>
			                                <th> Status </th>
			                                <th> Approval Remarks </th>
			                                <th> Username </th>
			                                <th> Preview </th>
	                              		</tr>
	                           		</thead>
	                           		<tbody id="fetch_email_template">
	                           			<tr><td colspan="13">No Records</td></tr>
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




<div class="modal fade" id="template_preview" data-keyboard="false" data-backdrop="static">
   	<div class="modal-dialog modal-lg">
      	<div class="modal-content">
         	<!-- Modal Header -->
         	<div class="modal-header card-head">
            	<h4 class="modal-title  ml-2">Template Preview</h4>
            	<button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
         	</div>
         	<!-- Modal body -->
         	<div class="modal-body">
            	<div class="row">
               		<div class="col-lg-12">
                  		<div class="card card-box">
                  			<div id="template_content_preview" style="padding: 15px;">
                  				
                  			</div>
                  		</div>
               		</div>
            	</div>
         	</div>
      	</div>
   	</div>
</div>

<script type="text/javascript">
	
	function languageradios(){

		var language_radioval = $('input[name="language_radio"]:checked').val();
    
        if(language_radioval==1)   
        {  
            $(".language_div").css({"display": "block"});
        }
        else
        {
            $(".language_div").css({"display": "none"});
        }

	}

</script>

<script>
	initSample();
</script>

