<!-- jatin -->
<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header>Upload Audio</header>
				<ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Voice</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Contact</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Upload Contact</a>
					</li> 
				</ol>									
			</div>
			<div class="card-body">
				<div class="row">						               
					<div class="col-md-12 mb-4">
						<form id="uplform"  action="audio_file_process.php" method="post" name="upload_excel" enctype="multipart/form-data">
							<div class="row">	 
								<div class="col-md-6">																			
									<div class="form-group row">
										<label for="lastnmae" class="col-sm-4 control-label">File</label>
										<div class="col-sm-8">
											<input type="file" name='audiofile' class="form-control" id="file"> 
											<input type="hidden" name ='duration' class="form-control" id="duration">
											<audio id="audio"></audio>
										</div>
									</div>											
								</div>	 		
								<div class="col-md-6 text-center pt-3">
									<button type="submit" name="audio_file_upload" class="btn btn-primary">Upload</button>	 
								</div>
							</div>
						</form>
					</div>
				</div>	 
			</div>
		</div>
	</div> 
	<div class="col-md-6 col-sm-6">
		<div class="card card-box">
			<div class="card-head">
				<header> Sound Album</header>
				<ol class="breadcrumb page-breadcrumb pull-right" style="font-size: 12px;">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="?page_name=dashboard" style="color:#fff">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Voice</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Contact</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="" style="color:#fff">Upload Contact</a>
					</li> 
				</ol>									
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive" style="overflow-y:scroll; overflow-x: none; max-height: 500px;">
							<table class="table table-striped" id="example4">
								<thead>
									<tr role="row">
										<th>File Name</th>
										<th> Format</th>
										<th>Size </th>
										<th> Play </th> 
										<th colspan="2"> Action </th> 
									</tr>
								</thead>
								<tbody  id="fetch_announcement">

								</tbody>
							</table>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div> 
</div>

