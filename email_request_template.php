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
				<header> Request Template </header>
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
			   		<div class="col-md-12 col-sm-12">
				   		<form id="add_email_template" class="add_email_template"  action="" method="POST" >
							<div class="col-md-12">																	
								<div class="form-group row">
									<label for="templatename" class="col-sm-2 control-label"> Template Name (Subject) </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="templatename" id="templatename"  >
										<textarea name="templatetext"  id="editor12" style="display: none;" > </textarea>
									</div>
								</div>
						    </div>
						    <div class="col-md-12">																	
								<div class="form-group row">
									<label for="templatetype" class="col-sm-2 control-label"> Template Type </label>
									<div class="col-sm-10">
										<div class="row">
											<div class="col-sm-4">
												<div class="row">
													<div class="col-sm-2">
														<input type="radio" value="1" name="templatetype" onclick="getcheckedvalue();" checked="checked" class="form-control">
													</div>
													<label for="" class="col-sm-10 control-label"> Template Text </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="row">
													<div class="col-sm-2">
														<input type="radio" value="2" name="templatetype" onclick="getcheckedvalue();" class="form-control">
													</div>
													<label for="" class="col-sm-4 control-label"> Drag & Drop </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="row">
													<div class="col-sm-2">
														<input type="radio" value="3" name="templatetype" onclick="getcheckedvalue();" class="form-control">
													</div>
													<label for="" class="col-sm-4 control-label"> Copy / Pase </label>
												</div>
											</div>
										</div>	
									</div>
								</div>					
						    </div>

						    <div class="ckeditordiv">
		                        <div class="col-md-12">
									<div class="form-group row">
										<label for="credittype" class="col-sm-2 control-label">Template Text</label>
										<div class="col-sm-10">
											<textarea   id="editor" class="form-control animated" > </textarea>
										</div>
									</div>											
							    </div>
						    </div>

						    <!-- <div class="dragndropdiv">
		                        <div class="col-md-12">
									<div class="form-group row">
										<label for="credittype" class="col-sm-2 control-label">Drag & Drop</label>
										<div class="col-sm-10">
											<textarea id="" class="form-control animated" > </textarea>
										</div>
									</div>											
							    </div>
						    </div>

						    <div class="textareadiv">
		                        <div class="col-md-12">
									<div class="form-group row">
										<label for="credittype" class="col-sm-2 control-label">Copy/Paste</label>
										<div class="col-sm-10">
											<textarea id="" class="form-control animated" > </textarea>
										</div>
									</div>											
							    </div>
						    </div> -->
						     
						    <div class="col-md-12">
								<div class="form-group row text-center pt-3">
									<button type="submit" name="submit" class="btn btn-primary">Save</button>		
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>							
</div>


<script type="text/javascript">
	
	 
	/*window.onload = function() {
  		getcheckedvalue();
	};*/


	/*function getcheckedvalue(){

		var templatetype_radioval = $('input[name="templatetype"]:checked').val();
    
        if(templatetype_radioval==1)   
        {  
            $(".ckeditordiv").css({"display": "block"});
            $(".dragndropdiv").css({"display": "none"});
            $(".textareadiv").css({"display": "none"});


        }
        else if(templatetype_radioval==2)   
        {  
            $(".ckeditordiv").css({"display": "none"});
            $(".dragndropdiv").css({"display": "block"});
            $(".textareadiv").css({"display": "none"});

        }
        else if(templatetype_radioval==3)   
        {  	
        	
            $(".ckeditordiv").css({"display": "none"});
            $(".dragndropdiv").css({"display": "none"});
            $(".textareadiv").css({"display": "block"});
        }
        

	}
*/


</script>

<script>
	initSample();
</script>
