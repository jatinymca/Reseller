<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner ">
		<!-- logo start -->
		<div class="page-logo">
			<!-- <a href="index.html">
				<span class="logo-icon material-icons fa-rotate-45">school</span>
				<span class="logo-default">Smart</span> </a> -->
			<a href="?page_name=dashboard">
			<!-- <span class="logo-icon material-icons fa-rotate-45" style="color: #212529;">school</span>
			 -->
			<?php 
			if(!empty($upload_img)){ ?>
				<span class="logo-default"><img alt="logo" class="header-brand-img main-logo" src="upload/<?php echo $upload_img; ?>" style="height: 40px; width: auto; cursor: default;">
			</span>
			<?php }
			else{ ?>

				<span class="logo-default"><img alt="logo" class="header-brand-img main-logo" src="assets/img/logo.png" style="cursor: default;">
			</span>

		<?php	}	?>
			</a>
		</div>
		<!-- logo end -->
		<ul class="nav navbar-nav navbar-left in">
			<li><a href="#" class="menu-toggler sidebar-toggler"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
		</ul>
		
		<div class="row">
		    <div class="col-md-11">
				<div class="d-flex justify-content-center">
					<div class="p-1 mt-1 bg-info mr-1 bor_rad"><p class="m-0 pro_s">AccountID: <?php echo $login_id; ?></p></div>
					<div class="p-1 mt-1 bg-warning mr-1 bor_rad"><p class="m-0 pro_s">Voice   Credit : <?php if(!empty($voice_credit_amount)){ echo round($voice_credit_amount,3); }else {echo "0"; } ?></p></div>
					<div class="p-1 mt-1 bg-primary mr-1 bor_rad"><p class="m-0 pro_s">SMS   Credit :  <?php if(!empty($sms_promo_allocate_unit)){ echo round($sms_promo_allocate_unit,3); }else {echo "0"; } ?></p></div>				
					<div class="p-1 mt-1 bg-primary mr-1 bor_rad"><p class="m-0 pro_s">Email  Credit :  <?php if(!empty($email_promo_allocate_unit)){ echo round($email_promo_allocate_unit,3); }else {echo "0"; } ?></p></div>
					<div class="p-1 mt-1 bg-info mr-1 bor_rad"><p class="m-0 pro_s">ChangePassword</p></div>
					<div class="p-1 mt-1 bg-warning mr-1 bor_rad"><p class="m-0 pro_s">Welcome! <?php echo ucfirst($username); ?></p></div>
				
				</div>
		    </div>
		
		
		    <div class="col-md-1">
				<div class="top-menu">
					
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-user">
							<a href="php/logout.php" data-close-others="true">
							 <i class="fa fa-sign-in" aria-hidden="true" title="logout"></i>
							</a>
						</li>
					
						
					</ul>
				</div>
		    </div>
		</div>
	</div>
</div>