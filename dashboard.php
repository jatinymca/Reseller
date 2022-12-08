<style>
	.push-bottom{
		background:#cc4546;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="card card-box">

			<?php 
			$sq="SELECT * FROM `users` WHERE login_id='$login_id' and status='1'";
			$re = mysqli_query($conn, $sq);
			$ro=mysqli_fetch_array($re);
			$obd_permission=$ro['obd_enable'];
			if($obd_permission=='0'){

			}else{
			 	$sql1 ="SELECT status,count(*) FROM `vertage_list` where 1 $permission_username group by status";
				$res1 = mysqli_query($conn, $sql1);



				while($row1=mysqli_fetch_array($res1)){ 
					$status=$row1[0]; 
					$data_call[$status]=$row1[1];
					$rowscount_total+=$row1[1];  
				}
				$rowscount_pending+=$data_call['NEW'];
				$rowscount_answer+=$data_call['ANSWER'];
				$rowscount_dial=$rowscount_total-$rowscount_pending;
				?> 
				<!-- start widget -->
				<div class="state-overview">
					<div class="row">
						<div class="col-xl-3 col-md-3 col-12">
							<div class="info-box bg-b-green">
								<span class="info-box-icon push-bottom"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Total Calls</span>
									<span class="info-box-number"><?php echo $rowscount_total; ?> </span>
									<div class="progress">
										<div class="progress-bar" style="width: 45%"></div>
									</div> 
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div> 
						<div class="col-xl-3 col-md-3 col-12 ind">
							<div class="info-box bg-b-blue">
								<span class="info-box-icon push-bottom"><img src="assets/img/202606-200.png" alt="" class="img_r"></span>
								<div class="info-box-content">
									<span class="info-box-text">Dial Call</span>
									<span class="info-box-number"><?php echo $rowscount_dial; ?></span>
									<div class="progress">
										<div class="progress-bar" style="width: 85%"></div>
									</div> 
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-xl-3 col-md-3 col-12 ind">
							<div class="info-box bg-b-pink">
								<span class="info-box-icon push-bottom"><img src="assets/img/icon-crm.png" alt="" class="img_r1"></span>
								<div class="info-box-content">
									<span class="info-box-text">Pending</span>
									<span class="info-box-number"> <?php echo $rowscount_pending; ?></span> 
									<div class="progress">
										<div class="progress-bar" style="width: 50%"></div>
									</div>  
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<!-- /.col -->
						<div class="col-xl-3 col-md-3 col-12 ind">
							<div class="info-box bg-b-yellow">
								<span class="info-box-icon push-bottom"><img src="assets/img/reci.png" alt="" class="img_r"></span>
								<div class="info-box-content">
									<span class="info-box-text">Receive Call</span>
									<span class="info-box-number"><?php echo $rowscount_answer; ?></span>
									<div class="progress">
										<div class="progress-bar" style="width: 40%"></div>
									</div> 
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
					</div>
				</div>					
			<?php } ?> 

			 
		</div>
	</div>
</div>							
