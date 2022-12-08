  <div class="modal fade" id="add_bill_plan" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header card-head">
          <h4 class="modal-title ml-2">Add Bill Plan</h4>
          <button type="button" class="btn btn-dark close" data-dismiss="modal"><span>x</span></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
		        <div class="col-lg-12">
				    <div class="card card-box mt-2">	
				    		<form action="" method="post" id="addplan">			      
						<div class="row">
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="plan-name" class="col-sm-4 control-label">Plan-id*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="plan_id" required id="plan-name" value="<?php echo rand(); ?>" >
									</div>
								</div>											
							</div>
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="plan-name" class="col-sm-4 control-label">Plan-Name*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="plan-name" required name="plan_name" >
									</div>
								</div>											
							</div>
							
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="plan-rate" class="col-sm-4 control-label">Plan Pulse (Sec/Credit)*</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="plan-rate" required name="plan_pulse" >
									</div>
								</div>											
							</div>
							
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="paisa" class="col-sm-4 control-label">Plan Rate (Paisa)*</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="paisa" required name="plan_rate">
									</div>
								</div>											
							</div>
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="plan-status" class="col-sm-4 control-label">Plan-Type*</label>
									<div class="col-sm-8">
										<select class="form-control"  required name="plan_type">
											<option value="">Select Plan Type</option>
											<option value="Promotional">Promotional</option>
											<option value="Tranactional">Tranactional</option>
										</select>
									</div>
								</div>											
							</div>
							<div class="col-md-12">																			
								<div class="form-group row">
									<label for="promotion_type" class="col-sm-4 control-label">Promotion-Type*</label>
									<div class="col-sm-8">
										<select class="form-control" required  name="promotion_type">
											<option value="">Select Promotion Type</option>
											<option value="Voice">Voice</option>
											<option value="SMS">SMS</option>
											<option value="Email">Email</option>
										</select>
									</div>
								</div>											
							</div>		
              <div class="col-md-12">																			
								<div class="form-group row">
									<label for="plan-status" class="col-sm-4 control-label">Plan-Status*</label>
									<div class="col-sm-8">
										<select class="form-control" required name="plan_status">
 											<option value="Y">Yes</option>
											<option value="N">No</option>
										</select>
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